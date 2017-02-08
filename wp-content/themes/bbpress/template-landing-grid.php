<?php
/**
 * Template Name: Landing Template
 */
?>


			 		
		<div class="main-content <?php if(get_field('add_sidebar')) { ?>with-sidebar<?php } else { ?>no-border<?php } ?>">
			<?php while (have_posts()) : the_post(); ?>
			  <?php get_template_part('templates/c_content', 'page'); ?>
			<?php endwhile; ?>

			<div class="custom-grid">
				<?php if(get_field('items_per_row') == "3") {$col = 'three'; } else if(get_field('items_per_row') == "4") { $col = 'four';} else if(get_field('items_per_row') == "5") { $col = 'five';} ?>
				<?php if ( get_post_meta($post->ID, 'show_subpages', true) ) { ?>
					<div class="grid-row">
						<?php $subs = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', "posts_per_page" => 24 ));
					    if( $subs->have_posts() ) : while( $subs->have_posts() ) : $subs->the_post(); ?>
					   
						       <a href="<?php the_permalink(); ?>" class="grid-item  item-<?php echo $col; ?>">
				                  
			                   	
						        	<div class="item-wrap">
						        		<?php if(get_field('grid_image')) { ?>
							        		<?php $gridImg = get_field('grid_image'); $size = 'grid-template'; $thumb1 = $gridImg['sizes'][ $size ]; ?>
											<img src="<?php echo $thumb1; ?>" />
										<?php } else { ?>
											<?php the_post_thumbnail('home-grid'); ?>
										<?php } ?>
						            	<h4><?php the_title(); ?></h4>
						            </div>
						       
				                  
				                
				           		</a>

			      		<?php endwhile; endif;  wp_reset_postdata(); ?>

	         		</div>

	         	<?php } else { ?>

					<?php 

					$posts = get_field('choose_pages');

					if( $posts ): ?>
					   	<div class="grid-row">
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>			        
					             
							       <a href="<?php the_permalink(); ?>" class="grid-item  item-<?php echo $col; ?>">
					           			                   	
							        	<div class="item-wrap">
							        		<?php if(get_field('grid_image')) { ?>
								        		<?php $gridImg = get_field('grid_image'); $size = 'grid-template'; $thumb1 = $gridImg['sizes'][ $size ]; ?>
												<img src="<?php echo $thumb1; ?>" />
											<?php } else { ?>
												<?php the_post_thumbnail('home-grid'); ?>
											<?php } ?>
							            	<h4><?php the_title(); ?></h4>
							            </div>
							       				                
					           		</a>

				      		<?php endforeach; endif;  wp_reset_postdata(); ?>

	         			</div>

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
