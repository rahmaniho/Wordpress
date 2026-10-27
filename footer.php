<?php
/**
 * footer.php — پاورقی سایت قالب کارن سافت.
 */
?>
	</main>

	<footer class="site-footer" id="colophon">
		<div class="container">
			<div class="footer-grid">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : dynamic_sidebar( 'footer-1' ); endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : dynamic_sidebar( 'footer-2' ); endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : dynamic_sidebar( 'footer-3' ); endif; ?>
			</div>

			<div class="footer-bottom">
				<div class="flex-row">
					<div class="footer-copyright">
						<?php echo esc_html( get_theme_mod( 'copyright_text', 'کارن سافت © ۱۴۰۴ — امروز' ) ); ?>
					</div>
					<nav class="footer-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer',
							'container'      => false,
							'items_wrap'     => '<ul class="footer-menu">%3$s</ul>',
							'fallback_cb'    => false,
						) );
						?>
					</nav>
				</div>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
