<div class="bb-search__result">
	<?php if (!have_posts()) : ?>
	  <div class="alert alert-warning">
	    <?php _e('Sorry, no results were found.', 'sage'); ?>
	  </div>
	  <?php get_search_form(); ?>
	<?php endif; ?>

	<section>
		<h1>Search result for: <?php the_search_query(); ?></h1>
		<?php while (have_posts()) { the_post(); ?>	
	          
	          <?php get_template_part('templates/c_content', 'search'); ?>	
	     <?php } ?>
	</section>
	<?php wp_bootstrap_pagination(); ?>
</div>

