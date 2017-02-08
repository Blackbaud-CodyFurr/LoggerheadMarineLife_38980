
		 		
<div class="main-content blog-cont">
	<?php while (have_posts()) : the_post(); ?>
	  
	 <?php get_template_part('templates/c_content-single', get_post_type()); ?>
	  <?php comments_template('/templates/m__comments.php'); ?>
	<?php endwhile;  ?>
	<?php if(get_field('show_author_info')) { ?>
		<hr>
		<div id="authorarea">				
			<h4>About <?= get_the_author(); ?></h4>			
			<div class="authorinfo">
				<p><?php the_author_meta( 'description' ); ?></p>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">View all posts by <?= get_the_author(); ?> <span class="meta-nav">&rarr;</span></a>
			</div>
		</div>
	<?php } ?>

</div>
<?php get_template_part('templates/c__sidebar'); ?>        

