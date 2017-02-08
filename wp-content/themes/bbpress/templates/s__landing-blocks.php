<?php if(has_post_thumbnail()) { ?>
	<a class="bb-subpage__section" href="<?php the_permalink(); ?>">
	 	<div class="bb-subpage__outer">		
	 		<div class="bb-subpage__image">	     					
			    <?php if(get_field('grid_image')) { ?>
	        		<?php $gridImg = get_field('slider-img'); $size = 'grid-template'; $thumb1 = $gridImg['sizes'][ $size ]; ?>
					<img src="<?php echo $thumb1; ?>" />
				<?php } else { ?>
					<?php the_post_thumbnail('slider-img'); ?>
				<?php } ?>
	 		</div>
	 		<div class="bb-subpage__info"> 			
	 			<h2><?php the_title(); ?></h2>
	 			<p class="bb-subpage__excerpt">
	 				<?php the_field('landing_excerpt'); ?>
	 			</p>
	 			<div class="bb-subpage__cta">learn more</div>
	 		</div>	 	
	 	</div>
	</a>
<?php } ?>