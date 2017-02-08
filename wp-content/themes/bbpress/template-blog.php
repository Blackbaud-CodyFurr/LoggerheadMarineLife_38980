<?php
/**
 * Template Name: Blog Template
 */
?>

<?php $selected = get_field('blog_options'); $list = implode(' ', $selected ); $lower = strtolower($list);  ?>
<?php $cats = get_field('posts_category'); ?>
<div class="blog-cont main-content <?php if( in_array('no-sidebar', $selected) ) { ?>no-border<?php } else { ?>with-sidebar<?php } ?> <?php echo $lower; ?>">	
		<?php rewind_posts(); $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; if($cats) {foreach( $cats as $cat ) {$args= array('post_type' => 'post', 'paged' => $paged, 'cat' => $cat);}} else {$args= array('post_type' => 'post', 'paged' => $paged);} query_posts($args); ?>
		<?php if (!have_posts()) : ?>
		  <div class="alert alert-warning">
		    <?php _e('Sorry, no results were found.', 'sage'); ?>
		  </div>
		  <?php get_search_form(); ?>
		<?php endif; ?>

		<div class="post-row<?php if(get_field('blog_layout') == 'Masonry layout') { ?>masonry <?php } else if(get_field('blog_layout') == 'With Image') { ?>post-img<?php } ?>">
			<?php while (have_posts()) : the_post(); ?>					
			  	<?php get_template_part('templates/c_content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			<?php endwhile; ?>
		</div>
		<?php wp_bootstrap_pagination(); wp_reset_query(); ?>
</div>
<?php if( !in_array('no-sidebar', $selected) ) { ?>
	<?php get_template_part('templates/c__sidebar'); ?>        
<?php } ?>