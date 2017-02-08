<?php if( have_rows('featured_pages', $widget->ID) ): ?>
	<?php $count = 1; while( have_rows('featured_pages', $widget->ID) ): the_row(); 
		$title = get_sub_field('page_title');
		$image = get_sub_field('page_thumbnail');
		$link = get_sub_field('page_link');

	?>

	<a class="item<?php echo $count; ?> page-item" href="<?php echo $link; ?>">
		<?php  $size = 'home-grid'; $thumb = $image['sizes'][ $size ]; ?>
		<img src="<?php echo $thumb; ?>" />
		<h3><?php echo $title; ?></h3>
	</a>

	<?php $count++; endwhile; ?>
<?php endif; ?>


