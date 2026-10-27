<?php
/**
 * 404.php — صفحه یافت نشد.
 */
get_header();
?>

	<div class="container section" style="text-align:center; padding:5rem 1rem;">
		<h1 style="font-size:clamp(3rem, 8vw, 5rem); line-height:1.2;">۴۰۴</h1>
		<p style="font-size:1.25rem; color:var(--ks-muted); max-width:48ch; margin:1rem auto 2rem;">
			<?php esc_html_e( 'صفحه‌ای که می‌خواستید پیدا نشد.', 'karen-soft' ); ?>
		</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button"><?php esc_html_e( 'بازگشت به صفحه اصلی', 'karen-soft' ); ?></a>
	</div>

<?php
get_footer();
