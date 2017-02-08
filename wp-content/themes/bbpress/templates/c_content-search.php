<article <?php post_class(); ?>>
	<div class="bb-search-post__wrap">
	  <div class="bb-search-post__outer">
	    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    <?php if(has_post_thumbnail()) { ?>
	    	<div class="bb-search-post__with-img">
	    		<div class="bb-search-post-img-wrap">
	    			<?php the_post_thumbnail('full'); ?>
	    		</div>
	    		<div class="bb-search-post-excerpt">
	    			<?php the_excerpt(); ?>
	    		</div>
	    	</div>
	    <?php } else { ?>	    
	    	<?php the_excerpt(); ?>
	    <?php } ?>	    
	  </div>
	</div>
</article><br/>