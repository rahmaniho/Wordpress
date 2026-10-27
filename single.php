<?php
/**
 * single.php — نمایش نوشته/محصول/نمونه‌کار تکی.
 */
get_header();
?>

	<div class="container section">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article class="post-<?php the_ID(); ?>" id="post-<?php the_ID(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="page-featured" style="margin-bottom:2rem;">
						<?php the_post_thumbnail( 'large', array( 'class' => 'attachment-large size-large wp-post-image' ) ); ?>
					</div>
				<?php endif; ?>

				<header class="entry-header">
					<?php if ( is_singular( array( 'karen_product', 'karen_portfolio', 'karen_service' ) ) ) : ?>
						<p class="entry-eyebrow" style="font-size:.8rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--ks-brand);margin-bottom:.6rem;">
							<?php echo esc_html( get_post_type_object( get_post_type() )->labels->name ); ?>
						</p>
					<?php endif; ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<?php if ( is_singular( 'post' ) && ( comments_open() || get_comments_number() ) ) : ?>
					<section class="comments-wrap" style="margin-top:3rem;">
						<?php comments_template(); ?>
					</section>
				<?php endif; ?>
			</article>

			<nav class="post-navigation" style="margin-top:2.5rem; display:flex; gap:1rem; justify-content:space-between;">
				<div class="nav-previous">
					<?php previous_post_link( '%link', '&larr; %title' ); ?>
				</div>
				<div class="nav-next">
					<?php next_post_link( '%link', '%title &rarr;' ); ?>
				</div>
			</nav>
			<?php
		endwhile;
		?>
	</div>

<?php
get_footer();
