
<!-- Home Slider -->
<?php if(get_field('display_slider') == "Yes" || get_field('display_slider') == "No" && get_field('show_a_banner_image') == true) { ?>
	<section id="bb-home-slider-section">
		<div class="bb-section__wrap">

		 	<div class="bb-section__outer">
		 		<div class="bb-section__inner">
		 			<?php if(get_field('display_slider') == "Yes") { ?>
		 				<?php get_template_part('templates/s__home-slider'); ?>
					<?php } else if ( get_post_meta($post->ID, 'show_a_banner_image', true) ) { ?>
						<div class="bg-img">
							<img  src="<?php the_field('banner_image'); ?>" />
							<?php if(get_field('add_caption')) { ?>
				  				<div class="carousel-caption <?php if(get_field('caption_position') == "Right") { ?>caption-right<?php } ?>">
									<div class="img-caption">
										<?php the_field('banner_caption'); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>	
	</section>
<?php } ?>

<?php 

/*
| CTA's
*/   

if ( get_post_meta($post->ID, 'show_ctas', true) ) :

   get_template_part('templates/s__ctas');

endif;

/*
| Info
*/

if ( get_post_meta($post->ID, 'add_page_info', true) ) :
   
   get_template_part('templates/s__info');

endif;
   
/*
| Features
*/

if ( get_post_meta($post->ID, 'show_home_features', true) ) :

   get_template_part('templates/s__features');

endif; 
   
/*
| Widgets
*/

if ( get_post_meta($post->ID, 'add_widgets', true) ) :

   get_template_part('templates/s__widgets');
			
endif;

/*
| Latest Posts
*/   

if ( get_post_meta($post->ID, 'show_latest_posts', true) ) :
	
	
   get_template_part('templates/s__news-items');
	
endif;
   
/*
| Testimonials
*/

if ( get_post_meta($post->ID, 'show_testimonial', true) ) :
   
   get_template_part('templates/s__testimonials');

endif;