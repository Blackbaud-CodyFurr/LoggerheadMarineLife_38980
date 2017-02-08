<?php
/**
 * Template Name: 3 Column Template
 */
?>

	
<div class="main-content">
	<?php while (have_posts()) : the_post(); ?>
	  
	  <?php get_template_part('templates/c_content', 'page'); ?>
	<?php endwhile; ?>
</div>
<?php get_template_part('templates/c__sidebar'); ?>
<?php get_template_part('templates/c__sidebar-3col'); ?>
