			 		
<div class="main-content">
	<?php while (have_posts()) : the_post(); ?>
	  <article <?php post_class(); ?>>
	    <header>
	      <h1 class="entry-title"><?php the_title(); ?></h1>
	    </header>
	    <div class="entry-content">
	      <?php the_content(); ?>
	      <?php if(get_field('form_code')) { ?>
	      	<?php the_field('form_code'); ?>
	      <?php } ?>
	    </div>
	  </article>
	<?php endwhile; ?>

</div>
<aside class="bb-sidebar1 bb-aside">
	<div class="inner-sidebar">
		<?php dynamic_sidebar( 'sidebar-events' ); ?>
	</div>
</aside>
	
