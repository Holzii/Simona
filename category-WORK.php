<?php

get_header();

?>

<main>



	<div class="beitragsbox">

		
			<?php 
				if (have_posts()):
				while (have_posts()):the_post();  
			?> 

		<div class="innerbox1">        

	        <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { the_post_thumbnail('post-thumb'); } ?>				
			<div class="innerbox1_title">
 								<?php $category_id = get_cat_ID( 'paintings' );
    							$category_link = get_category_link( $category_id );?>

    			<?php the_excerpt(); ?> 	

			<h2><a href="<?php echo esc_url( $category_link ); ?>" title=""><?php the_title();?></a></h2>

			</div>


		</div> 


	        <?php endwhile; ?>
	                
	        <?php else: ?>	                
	            <p>No content has been posted to this page.</p>	                    
	         <?php endif; ?>      
	   

	</div>

	

</main>