<?php
/**
 * archive.php — بایگانی نوشته‌ها/محصولات/نمونه‌کارها.
 */
get_header();
?>

	<div class="container section">
		<header class="archive-header">
			<h1 class="archive-title">
				<?php
				if ( is_post_type_archive() ) :
					echo esc_html( get_post_type_object( get_post_type() )->labels->name );
				elseif ( is_category() ) :
					echo esc_html( single_cat_title( '', false ) );
				elseif ( is_tag() ) :
					echo esc_html( single_tag_title( '', false ) );
				else :
					esc_html_e( 'بایگانی', 'karen-soft' );
				endif;
				?>
			</h1>
			<?php the_archive_description( '<div class="archive-description">%s</div>' ); ?>
		</header>

		<div class="grid-3">
			<?php
			if ( have_posts() ) :
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
			else :
				echo '<p class="lead">' . esc_html__( 'مطلبی یافت نشد.', 'karen-soft' ) . '</p>';
			endif;
			?>
		</div>

		<?php
		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => __( 'صفحه قبل', 'karen-soft' ),
			'next_text' => __( 'صفحه بعد', 'karen-soft' ),
		) );
		?>
	</div>

<?php
get_footer();
