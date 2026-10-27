<?php
/**
 * index.php — خط′-基 پیش‌فرض (فALLBACK).
 */
get_header();
?>

	<div class="container section">
		<?php if ( have_posts() ) : ?>
			<div class="grid-3">
				<?php
				while ( have_posts() ) : the_post();
					?>
					<div class="card">
						<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium', array( 'class' => 'attachment-medium size-medium' ) ); endif; ?>
						<h3><?php the_title(); ?></h3>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="card-meta"><?php esc_html_e( 'مشاهده ادامه', 'karen-soft' ); ?></a>
					</div>
					<?php
				endwhile;
				?>
			</div>
			<?php
			the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( 'صفحه قبل', 'karen-soft' ),
				'next_text' => __( 'صفحه بعد', 'karen-soft' ),
			) );
		else :
			echo '<p>' . esc_html__( 'مطلبی پیدا نشد.', 'karen-soft' ) . '</p>';
		endif;
		?>
	</div>

<?php
get_footer();
