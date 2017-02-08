<?php
	global $ai1ec_registry;
	$date_system = $ai1ec_registry->get( 'date.system' );
	$search = $ai1ec_registry->get('model.search');

	// gets localized time
	$local_date = $ai1ec_registry->get( 'date.time', $date_system->current_time(), 'sys.default' );

	//sets start time to today
	$start_time = clone $local_date;
	$start_time->set_time( 0, 0, 0 );
	
	//sets end time to a year from today 
	$end_time = clone $start_time;
	$end_time->adjust_month( 12 );
		
	$events_result = $search->get_events_between($start_time, $end_time, array(), true); ?>
		
	<?php if(!empty($events_result)) {
		$event_count = '0';
		foreach($events_result as $event) {
			if($event_count < '2') {
				$event_count ++;
				$event_long_date   = $event->get( 'start' );
				$long_date = $ai1ec_registry->get('view.event.time')->get_long_date($event_long_date);
				$short_date = $ai1ec_registry->get('view.event.time')->get_short_date($event_long_date);
				$event_title   = $event->get( 'post' )->post_title;
				$eventID = $event->post->ID;
				$event_img = get_post_thumbnail_id( $eventID );
				$eventURL = get_permalink($eventID);
				$postid   = $event->get( 'post_id' ); 
				$home_feat = get_field('home_featured', $eventID);
				?>

				<?php if($home_feat) { ?>
					<a class="page-item" href="<?php echo $eventURL; ?>">						
						<?php $grid_img = wp_get_attachment_image_src( $event_img, 'home-grid'); ?>
						<img src="<?php echo $grid_img[0]; ?>" />					
						<div class="event-info">
							<span class="title"><?php echo $event_title; ?></span>
							<span class="date"><?php echo $short_date; ?></span>
						</div>
					</a>
				<?php } ?>	
			
	<?php } } } ?>