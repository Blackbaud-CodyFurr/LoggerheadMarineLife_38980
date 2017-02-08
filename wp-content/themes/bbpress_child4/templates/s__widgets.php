<section id="bb-widgets-section" <?php if(get_field('widgets_background')) { ?>style="background:url('<?php the_field("widgets_background") ?>');"<?php } ?>>
	<div class="bb-section__wrap">
	 	<div class="bb-section__outer">
         <div class="bb-widget-section-title"><?php the_field('widgets_headline'); ?></div>
         <div class="bb-widget-bg">
         	<div class="new-row">
         		<?php $widgets = get_field('choose_widgets'); if( $widgets ){ ?>
         			<?php foreach( $widgets as $widget ) : // variable must NOT be called $post (IMPORTANT) ?>
         				<div class="home-widget">
         					<h2><?php echo get_the_title( $widget->ID ); ?></h2>	
         
         					<!-- Twitter Feed -->		
         					<?php if(get_field('widget_type', $widget->ID) == "Twitter Feed") { ?>
         						<?php include('m__widget-twitter.php'); ?>
         
         
         					<!-- Facebook Feed -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Facebook Feed") { ?>
         						<?php include('m__widget-facebook.php'); ?>
         
         
         					<!-- All in one Upcoming Events -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Upcoming Events Small Calendar") { ?>
         						<?php include('m__widget-ai1ec.php'); ?>
         
         					<!-- ALL in One Events with Features Image -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Upcoming Events with Featured Image") { ?>
         						<?php include('m__widget-ai1ec-with-image.php'); ?>
         					
         
         					<!-- Instagram Feed -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Instagram Feed") { ?>
         						<?php include('m__widget-instagram.php'); ?>
         
         
         					<!-- Newsletter Signup Form -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Newsletter Field") { ?>
         						<?php include('m__widget-newsletter.php'); ?>
         
         
         					<!-- Pages with Thumnbs -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Pages with Thumbnails") { ?>
         						<?php include('m__widget-pages-with-thumbs.php'); ?>
         
         
         					<!-- Mini Slider -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Mini Slider") { ?>
         						<?php include('m__widget-mini-slider.php'); ?>
         
         
         					<!-- Custom Text and Media -->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Custom Text and Media") { ?>
         
         						<?php include('m__widget-custom.php'); ?>
         						 
         					<!-- Blog Feed-->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Blog Feed") { ?>
         						<?php include('m__widget-blog-feed.php'); ?>
         
         					<!-- Gallery-->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Images Gallery") { ?>
         						<?php include('m__widget-gallery.php'); ?>
         
         					<!-- Image Carousel-->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Image Carousel") { ?>
         						<?php include('m__widget-image-carousel.php'); ?>
         
         					<!-- Statistics-->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Statistics") { ?>
         						<?php include('m__widget-statistics.php'); ?>
         
         					<!-- Menu-->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Menu") { ?>
         						<?php the_field( 'choose_menu', $widget->ID); ?>
         
         					<!-- Logo Slider-->
         					<?php } else if(get_field('widget_type', $widget->ID) == "Logo Slider") { ?>
         						<?php include('widgets/m__widget-logo-slider.php'); ?>
         
         					<?php } ?>
         
         
         					<?php if ( get_field('add_button', $widget->ID ) ) { ?>
         						<div class="bb-widget-btn">
         							<div class="bb-widget-btn-wrap">
         								<a class="bb-widget-callout" <?php if(get_field('link_type', $widget->ID) == "Current site") { ?>
         					    			href="<?php the_field('page_link', $widget->ID); ?>" onClick="_gaq.push(['_trackEvent', '<?php the_field('button_title', $widget->ID); ?>', 'Click', '<?php the_field('page_link', $widget->ID); ?>']);" class="button"
         					    			<?php } else if(get_field('link_type', $widget->ID) == "External site") { ?>
         					    			href="<?php the_field('external_link', $widget->ID); ?>" onClick="_gaq.push(['_trackEvent', '<?php the_field('button_title', $widget->ID); ?>', 'Click', '<?php the_field('external_link', $widget->ID); ?>']);" <?php if ( get_field('link_target', $widget->ID, true) ) { ?>target="_blank"<?php } ?> class="button"
         					    		<?php } ?>>
         					    			<?php if ( get_field('add_button_icon', $widget->ID, true) ) {
         					    				the_field('button_icon', $widget->ID); 
         					    			} ?>
         
         					    			<?php if ( get_field('button_title', $widget->ID, true) ) { ?>
         					    				<?php the_field('button_title', $widget->ID); ?>
         					    			<?php } else { ?>
         					    				Read More
         					    			<?php } ?>
         					    		</a>
         					    	</div>
         				    	</div>
         					<?php } ?>
         				</div>
         			<?php endforeach; ?>
         
         		<?php } ?>
         	</div>
         </div>
      </div>
	</div>
</section>

			
