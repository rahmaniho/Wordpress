<?php
/**
 * page.php — نمایش برگه‌ها.
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
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</article>
			<?php
		endwhile;
		?>
	</div>

<?php
get_footer();
