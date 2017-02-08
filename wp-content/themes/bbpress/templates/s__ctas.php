<section id="bb-ctas-section">
	<div class="bb-section__wrap">
 	  <div class="bb-section__outer">
<?php $posts = get_field('choose_ctas'); if( $posts ) { ?>
    <?php $t = count($posts); $count = 1; foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post);  ?>
    	<div class="cta-<?php echo $count; ?> cta-item <?php if(get_field('add_icon')) { ?> has-fa-icon<?php } ?><?php if($t == 4 ) { ?>cta-four<?php } else { ?>cta-three<?php } ?>">
    		<a onClick="_gaq.push(['_trackEvent', 'CTA Button', 'Click', 'Home <?php the_title(); ?>']);" <?php if(get_field('link_type') == "Current site") { ?>
    			href="<?php the_field('cta_link'); ?>" 
    			<?php } else if(get_field('link_type') == "External site") { ?>
    			href="<?php the_field('external_url'); ?>" <?php if ( get_field('link_target')) { ?>target="_blank"<?php } ?>
    		<?php } ?>>
    			<h4><?php the_title(); ?></h4>
    			<?php if(get_field('add_icon')) { ?>
					  <?php the_field('font_awesome_icon'); ?>
	  			<?php } ?>
    			<?php if ( get_post_meta($post->ID, 'add_description', true) ) { ?>
    				<span><?php the_field('description'); ?></span>
    			<?php } ?>
    		</a>
    	</div>
    <?php $count++; endforeach; wp_reset_postdata(); ?>
<?php } ?>			
      </div>
   </div>
</section>