<footer id="bb-footer">
	<div class="bb-footer__top">
		<div class="bb-footer__top-wrap">	
			<div class="bb-footer__top-inner">		
				<div class="footer-bucket-1">
					<?php dynamic_sidebar("sidebar-footer-1"); ?>
				</div>
				<div class="footer-bucket-2">
					<?php dynamic_sidebar("sidebar-footer-2"); ?>
				</div>
				<div class="footer-bucket-3">
					<?php dynamic_sidebar("sidebar-footer-3"); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="bb-footer__bottom">
		<div class="bb-footer__bottom-wrap">
			<div class="bb-footer__bottom-inner">
				<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
				<nav class="bb-nav-footer-admin-wrap">
					<?php
						if (has_nav_menu('footer_admin_navigation')) :
							wp_nav_menu(['theme_location' => 'footer_admin_navigation', 'menu_class' => 'bb-nav-footer-admin menu-social-nav-container']);
						endif;
					?>
				</nav>
			</div>
		</div>
	</div>
</footer>


