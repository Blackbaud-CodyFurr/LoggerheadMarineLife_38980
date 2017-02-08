
<?php if(get_field('events_number', $widget->ID) == "4") { ?>
	<?php echo do_shortcode('[ai1ec events_limit="4" view="agenda"]'); ?>
<?php } else if(get_field('events_number', $widget->ID) == "5") { ?>
	<?php echo do_shortcode('[ai1ec events_limit="5" view="agenda"]'); ?>
<?php } else { ?>
	<?php echo do_shortcode('[ai1ec events_limit="3" view="agenda"]'); ?>
<?php } ?>