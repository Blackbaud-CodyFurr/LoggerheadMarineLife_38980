<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<?php the_field('custom_fonts', 'option'); ?>
	  <meta charset="utf-8">
	  <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= esc_url(get_feed_link()); ?>">
	  <?php wp_head(); ?>

	  	<!-- GOOGLE ANALYTICS SCRIPT -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', '<?php the_field("tracking_id", "option"); ?>', 'auto');
		  ga('send', 'pageview');

		</script>
	  
	  	
		<!-- BBI NAMESPACE -->
	  	
	  	<?php get_template_part('templates/m__bbi-master'); ?>

	  	<!-- Add This -->
		<?php if(get_field('add_this', 'option')) { ?>
			<!-- Go to www.addthis.com/dashboard to customize your tools -->
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-560836c39c4b92fc" async="async"></script>
		<?php } ?>


		<!-- Share This -->
		 <?php if(get_field('share_this', 'option')) { ?>
		 	<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">stLight.options({publisher: "ee58908c-a614-4dd4-972d-8e4b8272c3e6", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>		
		 <?php } ?> 

	</head>
