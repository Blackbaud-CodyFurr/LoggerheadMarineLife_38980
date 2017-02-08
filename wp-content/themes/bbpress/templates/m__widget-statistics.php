<?php if( have_rows('statistics', $widget->ID) ): ?>
	<div class="bb-widget-statistics">
		<div class="bb-widget-statistics__wrap">
			<?php while( have_rows('statistics', $widget->ID) ): the_row(); 
				$content = get_sub_field('stat_description');
				$value = get_sub_field('stat_value');
			?>
				<div class="bb-widget-statistics__inner">
					<div class="bb-statistic-value"><h1><?php echo $value; ?></h1></div>
				    <div class="bb-statistic-content"><?php echo $content; ?></div>
				</div>

			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>