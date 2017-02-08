<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<div id="bb-banner" <?php if(get_field('banner_type') !== "Image") { ?><?php if(get_field('banner_type') == "Full Width Background Image") {?>class="img-bg" style="background:url('<?php echo $image[0]; ?>');"<?php } else if(get_field('banner_type') == "Background Color") { ?>class="color-bg" style="background:<?php the_field('background_color'); } ?>;"<?php } ?>>
	<div class="bb-banner__wrap">
		<div class="bb-banner__img">
			<?php if(get_field('banner_type') == "Image") {
				the_post_thumbnail('banner-img'); 
			} ?>
			<?php if(get_field('display_caption')) { $parents = get_post_ancestors( $post->ID ); ?>
				<div class="bb-caption <?php if(get_field('caption_position') == "Left") { ?>bb-caption__left<?php } else if(get_field('caption_position') == "Right") { ?>bb-caption__right<?php } else { ?>bb-caption__center<?php } ?>">
					<div class="caption-wrap">
						<?php if(get_field('caption_type') == "Custom Caption") { ?>
							<h1><?php the_field('banner_caption'); ?></h1>	
						<?php } else { ?>
							<?php if(get_field('caption_type') == "Parent and Current Titles") { ?>
								<h1><?php echo apply_filters( "the_title", get_the_title( end ( $parents ) ) ); ?></h1>
								<h2><?php the_title(); ?></h2>
							<?php } else if(get_field('caption_type') == "Current Page Title Only") { ?>
								<h1><?php the_title(); ?></h1>
							<?php } else if(get_field('caption_type') == "Parent Page Title Only") { ?>
								<h1><?php echo apply_filters( "the_title", get_the_title( end ( $parents ) ) ); ?></h1>
							<?php } ?>
						<?php } ?>	
					</div>			
				</div>
			<?php } ?>
		</div>
	</div>
</div>

<?php if(get_field('activate_toolbar', 'option')) {
	get_template_part('templates/s__pages-toolbar'); 
} ?>