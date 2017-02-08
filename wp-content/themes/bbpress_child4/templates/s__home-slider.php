<div id="carousel-example-generic" class="home-slider carousel slide <?php if(get_field('transition_effect') == "Fade") { ?>carousel-fade<?php } ?>" data-ride="carousel" <?php if(!get_field('pause_on_hover')) { ?>data-pause="false"<?php } ?> data-interval="<?php the_field('transition_speed'); ?>">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  	<?php query_posts(array('post_type' => 'Home Slider', 'posts_per_page' => 5, 'orderby' => 'menu_order', 'order' => 'asc' ) ); ?>
  	<?php $count = 1; while ( have_posts() ) : the_post(); ?>
	    <div class="item <?php if($count == 1) { ?>active<?php } ?>">
	    	<?php if(get_field('add_link') && get_field('link_option') == "Whole Slide") { ?>
	    		<a <?php if(get_field('link_type') == "Current Site") { ?> 
						href="<?php the_field('page_link'); ?>" 
					<?php } else if(get_field('link_type') == "External Site") { ?> 
						href="<?php the_field('external_link'); ?>" target="_blank"<?php } ?>>
			<?php } ?>
	      	<?php the_post_thumbnail('slider-img-xl'); ?>
	      	
	      	<?php if(get_field('add_caption')) { ?>
			  	<div class="carousel-caption <?php if(get_field('caption_position') == "Right") { ?>caption-right<?php } else if(get_field('caption_position') == "Left") { ?>caption-left<?php } ?>">
			  		<div class="caption-wrap">
				  		<?php if(get_field('caption_heading')) { ?>
				  			<h1><?php the_field('caption_heading'); ?></h1>
				  		<?php } ?>
				  		<div class="inner-caption">
					  		<?php if(get_field('caption_line_1')) { ?>
								<span><?php the_field('caption_line_1'); ?></span>
							<?php } ?>
							<?php if(get_field('caption_line_2')) { ?>
								<span><?php the_field('caption_line_2'); ?></span>
							<?php } ?>
							<?php if(get_field('caption_line_3')) { ?>
								<span><?php the_field('caption_line_3'); ?></span>
							<?php } ?>
						</div>
						<?php if(get_field('add_link') && get_field('link_option') == "Button") { ?>
							<a class="bb-caption-callout" onClick="_gaq.push(['_trackEvent', 'Home Slider', 'Click', '<?php the_title(); ?>']);" 
								<?php if(get_field('link_type') == "Current Site") { ?> 
									href="<?php the_field('page_link'); ?>" 
								<?php } else if(get_field('link_type') == "External Site") { ?> 
									href="<?php the_field('external_link'); ?>" target="_blank"<?php } ?>>
								<?php the_field('button_text'); ?>
							</a>
						<?php } else { ?>
							<div class="bb-caption-callout"><?php the_field('button_text'); ?></div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			<?php if(get_field('add_link') && get_field('link_option') == "Whole Slide") { ?></a><?php } ?>
		</div>
    <?php $count++; endwhile; wp_reset_query(); ?>	
  </div>

  <!-- Indicators -->
   <?php query_posts(array('post_type' => 'Home Slider', 'posts_per_page' => 5, 'orderby' => 'menu_order' ) ); ?>
   	<?php if ( get_post_meta($post->ID, 'show_indicators', true) ) { ?>
	  <ol class="carousel-indicators">
	  	<?php $count = 0; $count1 = 1; while ( have_posts() ) : the_post(); ?>
		    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count; ?>" class="<?php if(get_field('caption_position') == "Right") { ?>caption-right<?php } ?><?php if($count == 0) { ?>active<?php } ?>"><?php echo $count1; ?></li>
	    <?php $count++; $count1++; endwhile; wp_reset_query(); ?>	
	  </ol>
	<?php } ?>
  
 
  <!-- Controls -->
  	<?php if ( get_post_meta($post->ID, 'show_arrows', true) ) { ?>
	  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	    <i class="fa fa-chevron-left"></i>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	    <i class="fa fa-chevron-right"></i>
	  </a>
	<?php } ?>
</div> <!-- Carousel -->
			
