<time class="post-date updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time>

<div class="byline post-author vcard"><?= __(' | By', 'sage'); ?> 
	<?php if(get_field('show_author_info')) { ?><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php } ?>
		<?= get_the_author(); ?>
	<?php if(get_field('show_author_info')) { ?></a><?php } ?>
</div>

<div class="post-taxonomy">
	<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) )) { ?>
		<div class="post-categories">
		  <span>Categories: </span><?php the_category(', ') ?>
		</div>
	<?php } ?>

	<?php if(has_tag()) { ?>
		<div class="post-tags">
	  		| <span>Tags: </span><?php the_tags('') ?>
	  	</div>
	<?php } ?>
</div>

