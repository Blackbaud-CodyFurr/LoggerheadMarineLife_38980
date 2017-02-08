<?php
/**
 * Template Name: Landing Alt Blocks
 */
?>

			 		
		<div class="main-content center <?php if(get_field('add_sidebar')) { ?>with-sidebar<?php } else { ?>no-border<?php } ?>">
			<?php while (have_posts()) : the_post(); ?>
			  <div class="small-cont"><?php get_template_part('templates/c_content', 'page'); ?></div>
			<?php endwhile; ?>

			<div class="landing-blocks">
				<?php if ( get_post_meta($post->ID, 'show_subpages', true) ) { ?>
					 
						<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', "posts_per_page" => 99 ));
					    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
					   
					    	<?php get_template_part('templates/s__landing-blocks'); ?>
						     	
			      	<?php endwhile; endif;  wp_reset_postdata(); wp_reset_query(); ?>

			    <?php } else { ?>

					<?php $posts = get_field('choose_pages');
					if( $posts ): ?>
					   
					    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>			        
				             <?php get_template_part('templates/s__landing-blocks'); ?>
			      	<?php endforeach; endif;  wp_reset_postdata(); ?>
	         			
				<?php } ?>
			</div>
			<?php if ( get_post_meta($post->ID, 'add_content', true) ) { ?>
				<div class="extra-cont">
					<?php the_field('content_below'); ?>
				</div>
			<?php } ?>
		</div>
		<?php if(get_field('add_sidebar')) { ?>
			<?php get_template_part('templates/c__sidebar'); ?>
		<?php } ?>
