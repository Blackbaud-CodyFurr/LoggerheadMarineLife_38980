<aside class="bb-aside bb-sidebar2">
	<div class="inner-sidebar">
	    <?php if(get_field('3col_spsc')) { ?>
			<section class="3-col-template-spsc">
				<?php the_field('3rd_column'); ?>
			</section>
		<?php } ?>
		<?php if(get_field('3col_widgets')) { ?>
	    	<?php dynamic_sidebar('sidebar-secondary'); ?>
		<?php } ?>  
	</div>          
</aside><!-- /.sidebar -->