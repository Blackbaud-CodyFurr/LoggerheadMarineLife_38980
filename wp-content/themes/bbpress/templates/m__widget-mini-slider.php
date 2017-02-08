
<?php if( have_rows('slides', $widget->ID) ): ?>

	<div id="widget-mini-slider" class="mini-slider carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php $count = 1; while( have_rows('slides', $widget->ID) ): the_row(); 
				$content = get_sub_field('slide_content');
				$title = get_sub_field('slide_title');
			?>

			<div class="item slider-item <?php if($count == 1) { ?>active<?php } ?>">
				<?php if($title) { ?><h1><?php echo $title; ?></h1><?php } ?>
			    <p><?php echo $content; ?></p>
			</div>

			<?php $count++; endwhile; ?>
		</div>
		<!-- Controls -->
	  	<div class="slider-controls">
		  <a class="left carousel-control" href="#widget-mini-slider" data-slide="prev">
		    <i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right carousel-control" href="#widget-mini-slider" data-slide="next">
		    <i class="fa fa-angle-right"></i>
		  </a>
		</div>
		
	</div>

<?php endif; ?>


