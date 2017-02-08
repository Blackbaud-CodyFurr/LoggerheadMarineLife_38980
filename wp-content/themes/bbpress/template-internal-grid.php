<?php
/**
 * Template Name: Internal Grid Template
 */
?>




		<div class="main-content <?php if(get_field('page_layout') == "Full Width") { ?>no-sidebar<?php } else { ?>with-sidebar<?php } ?>">
			<?php while (have_posts()) : the_post(); ?>	  
			  <?php get_template_part('templates/c_content', 'page'); ?>
			<?php endwhile; ?>	

			<?php for ($i = 1; $i <= get_field('categories_number'); $i++) { ?>
				<section class="internal-grid">
					<?php if(get_field('section_'.$i.'_title')) { ?>
						<h3 class="grid-section-title"><?php the_field('section_'.$i.'_title'); ?></h3>
					<?php } ?>
				
					<?php $cat = get_field('choose_category_'.$i); $posts_per_row = get_field('items_per_row_'.$i);
						query_posts(array('post_type' => 'Misc Posts', 'misc_post_category' => $cat, 'posts_per_page' => 99, 'orderby' => 'menu_order', 'order' => 'asc' ) ); ?>
					<div class="grid-row">
						<?php $r = 1; while ( have_posts() ) { the_post(); ?>
							<div class="grid-block <?php if($posts_per_row == 5) { ?>block-five<?php } else if($posts_per_row == 4) { ?>block-four<?php } else if($posts_per_row == 3) { ?>block-three<?php } ?>">
								<?php get_template_part('templates/c__misc-post'); ?>
							</div>
							<?php // if multiple of 3 close div and open a new div
 							//if($r % $posts_per_row == 0) {echo '</div><div class="grid-row row">';} ?>
				        <?php $r++; } wp_reset_query(); ?>
			    	</div>
				</section>
			<?php } ?>					
		</div>
		<?php if(get_field('page_layout') !== "Full Width") { ?>
			<?php get_template_part('templates/c__sidebar'); ?>
		<?php } ?>


