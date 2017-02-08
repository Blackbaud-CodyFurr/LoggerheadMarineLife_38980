

  <aside class="bb-sidebar1 bb-aside">
	<?php if(get_field('show_sidebar_navigation')) { ?>
        <?php
			if (has_nav_menu('sidebar_navigation')) :
				wp_nav_menu(['theme_location' => 'sidebar_navigation', 'depth' => 5, 'menu_class' => 'nav nav-menu']);
			endif;
		?>
	<?php } ?> 
	<div class="inner-sidebar">
	    <?php if(get_field('2col_spsc')) { ?>
			<section class="2-col-template-spsc">
				<?php the_field('2nd_column'); ?>
			</section>
		<?php } ?>
		<?php if(get_field('show_home_widget')) { 
			get_template_part('templates/s__widgets');
		} ?>
		<?php if(get_field('2col_widgets')) { 
	    	dynamic_sidebar('sidebar-primary'); 

	    } else if(is_author() || is_home() || is_single() || is_category() || is_archive() || is_page_template('template-blog.php')) {
	    	dynamic_sidebar('sidebar-blog');
		} ?>  
	</div>          
  </aside><!-- /.sidebar -->

  
