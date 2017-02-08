<?php $cats = get_field('posts_category', $widget->ID); 
$num = get_field('posts_number', $widget->ID);
?>
<div id="widget-blog-feed">
	

	<?php if($cats) { foreach( $cats as $cat ) { ?>
		<?php $args = array( 'post_type' => 'post','numberposts' => $num, 'cat' => $cat ); ?>
	<?php } } else { ?>
		<?php $args = array( 'post_type' => 'post','numberposts' => $num ); ?>
	<?php } ?>
<ul class="blog-feed <?php if(get_field('hide_date', $widget->ID)) {echo 'no-date'; } ?> <?php if(get_field('hide_excerpt',$widget->ID)) { echo 'no-excerpt'; } ?> <?php if(get_field('date_format', $widget->ID) == "Long") { echo 'long-date'; } ?>" >

	
<?php
	
	$recent_posts = wp_get_recent_posts( $args ); 
	foreach( $recent_posts as $recent ){ ?>
		<li>
			<span class="date long">
				<?php echo get_the_time('F j, Y', $recent["ID"]); ?>
			</span>
			<span class="date short">
				<?php the_time('m/d/y'); ?>
			</span>
  			<a class="title" href="<?php echo get_permalink($recent["ID"]); ?>"><?php echo get_the_title($recent["ID"]); ?></a>
  			<div class="excerpt">
  				<?php echo $recent["post_excerpt"]; ?>
  				<?php echo get_the_excerpt($recent); ?>
  				<?php the_excerpt($recent["ID"]); ?>
  				<?php $my_excerpt = get_excerpt_by_id($recent["ID"]); echo $my_excerpt; ?>
  			</div>
	<?php }
?>
</ul>

</div>
