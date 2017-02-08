<div id="pages-toolbar">
	<div class="bb-section__wrap">	
		<div class="bb-section__outer">	
			<?php if(get_field('show_breadcrumbs', 'option')) { get_template_part('templates/m__breadcrumbs'); } ?>

			<?php if(get_field('show_font_resizer', 'option')) {  get_template_part('templates/m__font', 'resizer'); } ?>

			<?php if(get_field('show_google_translate', 'option')) {   get_template_part('templates/m__google', 'translate'); } ?>	

			<?php if(get_field('show_social_sharing', 'option')) { get_template_part('templates/m__social', 'sharing'); } ?>
		</div>
	</div>
</div>

