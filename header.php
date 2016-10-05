<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width" initial-scale="1.0">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>

	</head>


	<body <?php body_class(); ?>>

	<div class="container">

		<!--Site-Header-->

		<header class="site-header">


			<hgroup id="site-title">
	        	<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
	        	<img src="<?php bloginfo( 'template_directory' ); ?>/Bilder/logosimona.png" alt="<?php bloginfo('name'); ?>" /></a>
	        </hgroup><!-- end site-title -->



			<!--Navigation-->
			
			<nav class="site-nav">
				<?php $args=array('theme_location'=>'primary');?>
				<?php wp_nav_menu($args); ?>
			</nav>

			<?php if (is_front_page() ) : ?>
				<div class="slideshow">
					<?php do_action('slideshow_deploy', '34'); ?>
				</div>
			<?php endif  ?>





			<?php if ( is_active_sidebar( 'sidebar-custom-header' ) ) : ?>
				<div id="sidebar-header">
					<?php dynamic_sidebar( 'sidebar-custom-header' ); ?>
				</div>

		</header>



<?php endif; ?>
