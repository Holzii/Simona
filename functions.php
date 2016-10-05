<?php

function Simona_resources(){

	wp_enqueue_style('style', get_stylesheet_uri());}

	add_action('wp_enqueue_scripts', 'Simona_resources');


//ID-Anzeige in Beiträgen

	add_filter('manage_posts_columns', 'kb_posts_columns_id', 4);
	add_action('manage_posts_custom_column', 'kb_posts_custom_id_columns', 4, 2);

	add_filter('manage_pages_columns', 'kb_posts_columns_id', 4);
	add_action('manage_pages_custom_column', 'kb_posts_custom_id_columns', 4, 2);

	function kb_posts_columns_id($defaults){
	    $defaults['kb_wps_post_id'] = __('ID');
	    return $defaults;
	}

	function kb_posts_custom_id_columns($kb_column_name, $id){
	        if($kb_column_name === 'kb_wps_post_id'){
	        echo $id;
	    }
	}


//ID-Anzeige der Kategorien

	add_filter( 'manage_edit-category_columns', 'we_categoriesColumnsHeader' );
	add_filter( 'manage_category_custom_column', 'we_categoriesColumnsRow', 10, 3 );
	/**
	* Add Category ID column in admin
	*
	*/
	function we_categoriesColumnsHeader($columns) {
		$columns['catID'] = __('ID');
		return $columns;
	}
	function we_categoriesColumnsRow($argument, $columnName, $categoryID){
		if($columnName == 'catID'){
			return $categoryID;
		}
	}


//Navigationsmenü

	register_nav_menus(array('primary'=> __('primary menu'),));


	function SimonaDeflorin_widgets_init() {

	    register_sidebar( array(

	        'name'          => __( 'Custom Widget Area Header', 'SimonaDeflorin' ),

	        'id'            => 'sidebar-custom-header',

	        'description'   => __( 'Custom widget area for the header of my theme', 'SimonaDeflorin' ),

	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',

	        'after_widget'  => '</aside>',

	        'before_title'  => '<h3 class="widget-title">',
	    ) );}


	add_action( 'widgets_init', 'SimonaDeflorin_widgets_init' );


//bildbeitrag
	
	add_theme_support('post-thumbnails');

	function my_multi_col($content) {

		$columns = explode('<h2>', $content);
		$i = 0;

		foreach ($columns as $column) {
			if (($i % 2) == 0) {
				$return .= '<div class="innerbox1">'."\n";
				if ($i > 1) {
					$return .= "<h2>";
				} 
				$return .= $column;
				$return .= '</p></div>';
				$i++;
			}
			if(isset($columns[1])) {
		    		$content = wpautop($return);
			} else {
		    		$content = wpautop($content);
			}
			echo $content;
		}
	}
	add_filter('the_content', 'my_multi_col');



//feste bildgröße mit soft crop

	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumb', 600,380, true);



//Subkategorien

function print_post_title() {
global $post;
$thePostID = $post->ID;
$post_id = get_post($thePostID);
$title = $post_id->post_title;
$perm = get_permalink($post_id);
$post_keys = array(); $post_val = array();
$post_keys = get_post_custom_keys($thePostID);

if (!empty($post_keys)) {
foreach ($post_keys as $pkey) {
if ($pkey=='external_url') {
$post_val = get_post_custom_values($pkey);
}
}
if (empty($post_val)) {
$link = $perm;
} else {
$link = $post_val[0];
}
} else {
$link = $perm;
}
echo '<h2><a href="'.$link.'" rel="bookmark" title="'.$title.'">'.$title.'</a></h2>';
}


    






























