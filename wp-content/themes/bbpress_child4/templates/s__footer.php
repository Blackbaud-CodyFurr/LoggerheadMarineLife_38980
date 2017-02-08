
<footer id="bb-footer">
	<div class="bb-footer__social">
		<div class="bb-footer__wrap">
			<div class="bb-footer__inner connect">
				<div class="bb-footer__bucket footer-bucket-1">
					<h4><?php the_field('social_tagline' ,'option'); ?></h4>
				</div>
				<div class="bb-footer__bucket footer-bucket-2">
					<a href="<?php the_field('give_link' ,'option'); ?>">Give Today<i class="fa fa-chevron-right"></i></a>
				</div>
				<div class="bb-footer__bucket footer-bucket-3">
					<h4>Connect with us:</h4>
					<?php
						if (has_nav_menu('social_navigation')) :
							wp_nav_menu(['theme_location' => 'social_navigation', 'menu_class' => 'bb-nav__social-nav']);
						endif;
					?>				</div>
			</div>
		</div>
	</div>
	<div class="bb-footer__wrap">
		<div class="bb-footer__inner">
			<div class="bb-footer__bucket footer-bucket-1">
				<h4>Loggerhead Marinelife Center</h4>
				<span class="address"><?php the_field('address_line_1', 'option') ?></span>
				<span class="phone"><?php the_field('primary_phone', 'option') ?></span>
				<span class="email"><a href="mailto:<?php the_field('contact_email', 'option') ?>"><?php the_field('contact_email', 'option') ?></a></span>
				<span class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></span>
				<span class="site-credit">Site design by <a href="http://blackbaud.com" target="_blank">Blackbaud</a></span>
			</div>
			<div class="bb-footer__bucket footer-bucket-2">
				<nav class="bb-nav__footer-admin-wrap">
					<?php
						if (has_nav_menu('footer_admin_navigation')) :
							wp_nav_menu(['theme_location' => 'footer_admin_navigation', 'menu_class' => 'bb-nav__footer-admin']);
						endif;
					?>
				</nav>
			</div>
			<div class="bb-footer__bucket footer-bucket-3">
				<h4><?php the_field('newsletter_headline' , 'option'); ?></h4>
				<?php the_field('newsletter_text' ,'option'); ?>
			</div>
		</div>
	</div>
</footer>


