<?php
/*
Plugin Name: ACF Merge Group Tabs
Plugin URI:  https://github.com/yarcheeck/acf-merge-group-tabs/
Description: Merge ACF Tabs from different groups
Author: Martin Jarcik
Version: 1.0
Author URI: http://yarcheek.com

How it works:
Small JavaScript is placed at the end of the document
and run instatntly without waiting for loaded DOM,
so changes are done before ACF starts manipulating
with postboxes.

The script merges all postboxes containing "tab field"
to the first one and removes left empty wrappers.
*/


add_action('admin_footer', function() {

	$screen = get_current_screen();
	if ( $screen->base == 'post' ) {
		echo '
		<!-- ACF Merge Tabs -->
		<script>		

			var $boxes = jQuery("#postbox-container-2 .postbox .field_type-tab").parent(".inside");

			if ( $boxes.length > 1 ) {

			    var $firstBox = $boxes.first();

			    $boxes.not($firstBox).each(function(){
				    jQuery(this).children().appendTo($firstBox);
				    jQuery(this).parent(".postbox").remove();				    
			    });
				
			}
			
		</script>';
	}
	
});


?>
