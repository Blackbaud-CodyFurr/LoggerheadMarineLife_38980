<?php
/**
 * Template Name: 2 Column Template
 */
?>

	 		
		<div class="main-content with-sidebar">
			<?php while (have_posts()) : the_post(); ?>
			  
			  <?php get_template_part('templates/c_content', 'page'); ?>
			<?php endwhile; ?>
		</div>
		<?php get_template_part('templates/c__sidebar'); ?>
