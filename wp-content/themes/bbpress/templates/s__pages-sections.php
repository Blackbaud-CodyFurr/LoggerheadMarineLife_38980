<?php $posts = get_field('choose_section'); if( $posts ) { ?>
    <?php $count = 2; foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post);  ?>
        <section id="home-section<?php echo $count; ?>" <?php if(get_field('background_image')) { ?>style="background:url('<?php the_field('background_image'); ?>');" class="home-section bg-img" <?php } else { ?>class="home-section"  style="background:<?php the_field('background_color'); ?>"<?php } ?>>
        	<div class="bb-section__wrap">
        		<div class="bb-section__outer">
		        	<h1><?php the_title(); ?></h1>
		        	<?php if(get_field('content_type') == 'Home Features') { ?>
		        		<?php if(get_field('show_title')) { ?>
		        			<div class="bb-home-section__title">
		        				<h1><?php the_title(); ?></h1>
		        			</div>
		        		<?php } ?>
		        		<?php if(get_field('add_top_info')) { ?>
		        			<div class="bb-home-section__top-info">
		        				<div class="small-cont"><?php the_field('top_info'); ?></div>
		        			</div>
						<?php } ?>

		        		<?php get_template_part('templates/s__features'); ?>

		        		<?php if(get_field('add_bottom_info')) { ?>
		        			<div class="bb-home-section__bottom-info">
		        				<div class="small-cont"><?php the_field('bottom_info'); ?></div>
		        			</div>
						<?php } ?>

					<?php } else if(get_field('content_type') == 'Custom text') { ?>
							<div class="bb-home-section__custom">
		        				<div class="small-cont"><?php the_field('custom_text'); ?></div>
		        			</div>
		        	<?php } else if(get_field('content_type') == 'Image and Text') { ?>
							<div class="bb-home-section__text-img">
		        				<div class="small-cont block-img">
		        					<div class="bb-section__outer">
		        						<div class="bb-img-wrap">
		        							<img class="left-img" src="<?php the_field('left_image'); ?>" />
		        						</div>
		        						<div class="bb-text-wrap">
		        							<?php the_field('right_copy'); ?>
		        						</div>
		        					</div>
		        				</div>
		        			</div>
		        	<?php } ?>
		        </div>
	        </div>
       	</section>  			
    <?php $count++; endforeach; wp_reset_postdata(); ?>
<?php } ?>