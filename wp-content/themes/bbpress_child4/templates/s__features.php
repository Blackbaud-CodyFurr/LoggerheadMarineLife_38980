<section id="bb-features-section">
<div class="bb-section__wrap">
 	<div class="bb-section__outer">
   <?php if ( get_post_meta($post->ID, 'features_headline', true) ) { ?>
   	<div class="headline">
   		<?php the_field('features_headline'); ?>
   	</div>
   <?php } ?>
   <?php $features = get_field('choose_home_features'); if( $features ) { ?>
   	<?php $count = 1;  foreach( $features as $feature): // variable must be called $post (IMPORTANT) ?>
   	    
   	    <?php if(get_field('add_link', $feature->ID) && get_field('link_style', $feature->ID) !== "Add Button") { ?>
   	    	<a onClick="_gaq.push(['_trackEvent', 'Home Feature <?php echo get_the_title( $feature->ID ); ?>', 'Click', '<?php the_field('page_link', $feature->ID); ?>']);" class="home-feature-item-<?php echo $count; ?> feat-item"
   				<?php if(get_field('link_type', $feature->ID) == "Current site") { ?>
       				href="<?php the_field('page_link', $feature->ID); ?>" 
       			<?php } else if(get_field('link_type', $feature->ID) == "External site") { ?>
       				href="<?php the_field('external_link', $feature->ID); ?>" target="_blank"
       		<?php } ?>>
   	    <?php } else { ?>
   			<div class="home-feature-item-<?php echo $count; ?> feat-item">
   		<?php } ?>
   				<div class="inner-block">
   					<div class="img-wrap">
   						<h2><?php echo get_the_title( $feature->ID ); ?></h2>
   
   						<?php if(get_field('feature_type', $feature->ID) == "Image") { ?>
   							<?php 
   								if(get_field('image_format', $feature->ID) == "Landscape") {
   									$image = get_field('image_landscape', $feature->ID); $size = 'home-grid'; 
   								} else if(get_field('image_format', $feature->ID) == "Square") {
   									$image = get_field('image_square', $feature->ID); $size = 'grid-template'; 
   								}
   							$thumb1 = $image['sizes'][ $size ]; ?>
   							<img src="<?php echo $thumb1; ?>" />
   						<?php } else if(get_field('feature_type', $feature->ID) == "Video") { ?>
   							<div class="videoWrapper"><?php the_field('video', $feature->ID); ?></div><br/>
   						<?php } else if(get_field('feature_type', $feature->ID) == "Icon") { ?>
   							<?php the_field('icon', $feature->ID); ?>
   						<?php } ?>
   					
   
   					<?php if (get_field('subtitle', $feature->ID) ) { ?>
   						<h4><?php the_field('subtitle', $feature->ID); ?></h4>
   					<?php } ?>
   					<?php if (get_field('intro_text', $feature->ID) ) { ?>
   						<p><?php the_field('intro_text', $feature->ID); ?></p>
   					<?php } ?>
   
   					<?php if(get_field('add_link', $feature->ID) && get_field('link_style', $feature->ID) == "Add Button") { ?>
   						<a onClick="_gaq.push(['_trackEvent', 'Home Feature <?php echo get_the_title( $feature->ID ); ?>', 'Click', '<?php the_field('page_link', $feature->ID); ?>']);" class="bb-feature-link"
   							<?php if(get_field('link_type', $feature->ID) == "Current site") { ?>
   			    				href="<?php the_field('page_link', $feature->ID); ?>" 
   			    			<?php } else if(get_field('link_type', $feature->ID) == "External site") { ?>
   			    				href="<?php the_field('external_link', $feature->ID); ?>" target="_blank"
   			    		<?php } ?>>
   			    			<?php the_field('button_title', $feature->ID); ?>
   			    		</a>
   					<?php } ?>
   
   					<?php if(get_field('show_resources', $feature->ID) && get_field('link_style', $feature->ID) !== "Whole Block") { ?>
   						<div class="resources-cont">
   						  	<h3><?php the_field('resources_title', $feature->ID); ?></h3>
   						  	<?php if(get_field('resources_location', $feature->ID) == "Current Site") { ?>
   							  	<?php $resources = get_field('choose_resources', $feature->ID); if( $resources ) { ?> 
   								  <ul>
   								  	<?php foreach( $resources as $post): ?>
   								    	<li>
   								    		<a href="<?php the_permalink(); ?>">
   								    			<?php the_title(); ?>
   								    		</a>
   								    	</li>
   								    <?php endforeach; wp_reset_postdata(); ?>
   								  </ul>
   								<?php } ?>
   							<?php } else if(get_field('resources_location', $feature->ID) == "Current and External") { ?>
   								<?php the_field('external_links', $feature->ID); ?>
   							<?php } ?>
   						</div>
   					<?php } ?>
   				</div>
   				</div>
   		<?php if(get_field('add_link', $feature->ID) && get_field('link_style', $feature->ID) !== "Add Button") { ?>
   			</a>
   		<?php } else { ?>
   			</div>
   		<?php } ?>
   	<?php $count++; endforeach;  ?>
   <?php } ?>
	</div>
</div>
</section>