<div class="inner-cont">
	<div class="img-cont"><?php the_post_thumbnail('grid-internal'); ?></div>
	
	
		<div class="box-info">
			<strong><?php the_title(); ?></strong><br/>
			<?php for ($i = 1; $i <= 3; $i++) { ?>
				<?php if(get_field('info_line_'.$i)) { ?><i><?php the_field('info_line_'.$i); ?></i><br/><?php } ?>
			<?php } ?>

			<?php if(get_field('add_link')) { ?>
				<?php if(get_field('link_style') == 'Email Button') { ?>
					<a class="bb-callout" href="mailto:<?php the_field('email_address'); ?>" target="_blank">
						<i class="fa fa-envelope-o"></i>&nbsp;&nbsp;
						 <?php the_field('link_text'); ?>
					</a>
				<?php } else { ?>
					<a <?php if(get_field('link_style') == 'Button with Icon' || get_field('link_style') == 'Button') { ?>class="bb-callout"<?php } ?>
						<?php if(get_field('link_to') == "Current Site") { ?> 
								href="<?php the_field('choose_page'); ?>" 
							<?php } else if(get_field('link_to') == "External Site") { ?> 
								href="<?php the_field('external_link'); ?>"<?php } ?> <?php if(get_field('link_target')) { ?>target="_blank"<?php } ?>>
						
						<?php if(get_field('link_style') == 'Button with Icon') { ?><?php the_field('choose_icon'); ?>&nbsp;&nbsp;<?php } ?>
						<?php the_field('link_text'); ?>
					</a>
				<?php } ?>
			<?php } ?>
		</div>	
	
	
</div>