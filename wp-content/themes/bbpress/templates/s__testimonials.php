<section id="bb-testimonials-section">
	<div class="bb-section__wrap">
	 	<div class="bb-section__outer">
	 		<div class="bb-section__inner">
	 			<?php if(get_field('add_description')) { ?>
	 				<div class="bb-section__title"><?php the_field('description'); ?></div>
	 			<?php } ?>				 			
				<?php 
					if(get_field('display_option') == 'Random') {
						$testimonials = query_posts(array('post_type' => 'Testimonials', 'posts_per_page' => 1, 'orderby' => 'rand' ) );
					} else {
						$testimonials = get_field('choose_testimonial');
					}
				if( $testimonials ): ?>
				   
				    <?php foreach( $testimonials as $testimonial): ?>
				       <?php $image = get_field('background_image', $testimonial->ID);  $size = 'slider-img'; $thumb = $image['sizes'][ $size ]; ?>
			 			<div class="bg-cont" <?php if (get_field('background_image', $testimonial->ID)) { ?>style="background:url('<?php echo $thumb; ?>');"<?php } ?>>
			 				<div class="bb-testimonial__wrap">
			 					<?php if(get_field('small_image', $testimonial->ID) && !get_field('background_image', $testimonial->ID)) { ?>
			 						<div class="bb-testimonial__img">					 			
						 				<img src="<?php the_field('small_image', $testimonial->ID); ?>" />					 			
					 				</div>
					 			<?php } ?>	
					 			<div class="<?php if(get_field('small_image', $testimonial->ID) && !get_field('background_image', $testimonial->ID)) { ?>bb-testimonial__copy<?php } else { ?>bb-testimonial__copy-no-img<?php } ?>">			
									<i class="fa fa-quote-left fa-3x fa-border"></i>
									<?php the_field('testimonial', $testimonial->ID); ?>
									<span class="bb-testimonial__author"><?php the_field('testimonial_author', $testimonial->ID); ?></span>	
								</div>
							</div>				
						</div>
				    <?php endforeach; ?>
				   
				<?php endif; ?>			
			</div>
		</div>
	</div>
</section>