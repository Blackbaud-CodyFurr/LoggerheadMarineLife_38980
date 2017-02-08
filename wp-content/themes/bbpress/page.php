
<div class="main-content">
	
	<?php while (have_posts()) : the_post(); ?>
	  <?php get_template_part('templates/c_content', 'page'); ?>
	<?php endwhile; ?>
	
</div>

