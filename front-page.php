<?php
/**
 * front-page.php — صفحه اصلی قالب کارن سافت.
 */
get_header();
?>

	<section class="hero" aria-label="بخش هیرو">
		<div class="container">
			<div class="hero-eyebrow"><?php echo esc_html( get_theme_mod( 'karen_soft_hero_eyebrow', 'استودیو مهندسی دیجیتال' ) ); ?></div>
			<h1><?php echo esc_html( get_theme_mod( 'karen_soft_hero_title', 'فردا را امروز می‌سازیم' ) ); ?></h1>
			<p><?php echo esc_html( get_theme_mod( 'karen_soft_hero_subtitle', 'خدمات طراحی سایت، نرم‌افزار اختصاصی و اتوماسیون هوشمند برای رشد کسب‌وکارهای شما.' ) ); ?></p>
			<div class="hero-actions">
				<a href="<?php echo esc_url( home_url( '/خدمات' ) ); ?>" class="button">شروع یک همکاری</a>
				<a href="<?php echo esc_url( home_url( '/نمونه‌کارها' ) ); ?>" class="button button-outline">مشاهده کارها</a>
			</div>
		</div>
	</section>

	<section class="stats" aria-label="آمار کارن سافت">
		<div class="container">
			<div class="stats-grid">
				<div class="stat-item">
					<div class="stat-value">۱۴۰۴</div>
					<div class="stat-label"><?php esc_html_e( 'آغاز یک مسیر تازه', 'karen-soft' ); ?></div>
				</div>
				<div class="stat-item">
					<div class="stat-value">۱۲۰+</div>
					<div class="stat-label"><?php esc_html_e( 'پروژه تحویل‌شده', 'karen-soft' ); ?></div>
				</div>
				<div class="stat-item">
					<div class="stat-value">۱۱</div>
					<div class="stat-label"><?php esc_html_e( 'محصول نرم‌افزاری', 'karen-soft' ); ?></div>
				</div>
				<div class="stat-item">
					<div class="stat-value">۹۸%</div>
					<div class="stat-label"><?php esc_html_e( 'رضایت مشتریان', 'karen-soft' ); ?></div>
				</div>
			</div>
		</div>
	</section>

	<section class="section" id="services" aria-label="خدمات">
		<div class="container">
			<div class="section-eyebrow"><?php esc_html_e( 'what we do', 'karen-soft' ); ?></div>
			<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'karen_soft_services_title', 'تکنولوژی، در خدمت ایده‌های بزرگ' ) ); ?></h2>
			<p class="section-lead"><?php echo esc_html( get_theme_mod( 'karen_soft_services_subtitle', 'هر چالش فرصتی برای ساختن چیزی بهتر است. ما از طراحی تا اجرا، کنار شما هستیم.' ) ); ?></p>
			<div class="grid-3">
				<?php
				$services = new WP_Query( array(
					'post_type'      => 'karen_service',
					'posts_per_page' => 3,
					'post_status'    => 'publish',
				) );
				if ( $services->have_posts() ) :
					while ( $services->have_posts() ) : $services->the_post();
						?>
						<div class="card">
							<div class="card-icon">&#128221;</div>
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							<div class="card-meta"><?php esc_html_e( 'مشاهده خدمت', 'karen-soft' ); ?></div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					// نمونه پیش‌فرض اگر هیچ خدمتی ثبت نشده باشد
					$default_services = array(
						array(
							'title' => __( 'توسعه وب', 'karen-soft' ),
							'text'  => __( 'وب‌سایت‌های سریع، سئوپسند و واکنش‌گرا با معماری مدرن.', 'karen-soft' ),
						),
						array(
							'title' => __( 'نرم‌افزار اختصاصی', 'karen-soft' ),
							'text'  => __( 'نرم‌افزارهای مدیریتی دقیقاً متناسب با فرایندهای کسب‌وکار شما.', 'karen-soft' ),
						),
						array(
							'title' => __( 'اتوماسیون هوشمند', 'karen-soft' ),
							'text'  => __( 'حذف کارهای تکراری با اتوماسیون اداری و دستیارهای هوش مصنوعی.', 'karen-soft' ),
						),
					);
					foreach ( $default_services as $svc ) :
						?>
						<div class="card">
							<div class="card-icon">&#128221;</div>
							<h3><?php echo esc_html( $svc['title'] ); ?></h3>
							<p><?php echo esc_html( $svc['text'] ); ?></p>
							<div class="card-meta"><?php esc_html_e( 'مشاهده خدمت', 'karen-soft' ); ?></div>
						</div>
						<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</section>

	<section class="section" id="products" aria-label="محصولات" style="background:var(--ks-surface-soft);">
		<div class="container">
			<div class="section-eyebrow"><?php esc_html_e( 'our products', 'karen-soft' ); ?></div>
			<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'karen_soft_products_title', 'ابزارهایی که کار می‌کنند' ) ); ?></h2>
			<p class="section-lead"><?php echo esc_html( get_theme_mod( 'karen_soft_products_subtitle', 'برای هر صنعت، پاسخی دقیق. مجموعه‌ای از محصولات کاربردی، ساخته‌شده با درک نیاز شما.' ) ); ?></p>
			<div class="grid-3">
				<?php
				$products = new WP_Query( array(
					'post_type'      => 'karen_product',
					'posts_per_page' => 6,
					'post_status'    => 'publish',
					'orderby'        => 'menu_order',
				) );
				if ( $products->have_posts() ) :
					while ( $products->have_posts() ) : $products->the_post();
						?>
						<div class="card">
							<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium', array( 'class' => 'attachment-medium size-medium' ) ); endif; ?>
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" class="card-meta"><?php esc_html_e( 'مشاهده محصول', 'karen-soft' ); ?></a>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</section>

	<section class="section" id="about" aria-label="درباره ما">
		<div class="container">
			<div class="section-eyebrow"><?php esc_html_e( 'the story', 'karen-soft' ); ?></div>
			<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'karen_soft_about_title', 'پشت هر خط کد، یک باور است' ) ); ?></h2>
			<div class="about-inner" style="display:flex; flex-wrap:wrap; gap:2rem; align-items:center;">
				<div class="about-text" style="flex:1 1 320px;">
					<p><?php echo esc_html( get_theme_mod( 'karen_soft_about_text', 'کارن سافت با ایده ساده‌ای شکل گرفت: فناوری باید مسائل واقعی را حل کند، نه اینکه پیچیدگی تازه بسازد.' ) ); ?></p>
					<a href="<?php echo esc_url( home_url( '/درباره ما' ) ); ?>" class="button"><?php esc_html_e( 'بیشتر درباره ما', 'karen-soft' ); ?></a>
				</div>
				<div class="about-image" style="flex:1 1 320px; min-height:260px; background:var(--ks-surface-soft); border:1px solid var(--ks-border); border-radius:var(--ks-radius); display:flex; align-items:center; justify-content:center; color:var(--ks-muted); font-size:0.95rem;">
					<?php esc_html_e( 'آیا لوگو یا تصویر این بخش اضافه نشده است؛ آن را از مدیریت رسانه آپلود کنید.', 'karen-soft' ); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="section" id="contact" aria-label="تماس با ما">
		<div class="container">
			<div class="section-eyebrow"><?php esc_html_e( 'let\'s build together', 'karen-soft' ); ?></div>
			<h2 class="section-title"><?php echo esc_html( get_theme_mod( 'karen_soft_contact_title', 'پروژه بعدی می‌تواند مال شما باشد' ) ); ?></h2>
			<p class="section-lead"><?php echo esc_html( get_theme_mod( 'karen_soft_contact_subtitle', 'ایده‌ای دارید؟ درباره‌اش حرف بزنیم. از اولین گفت‌وگو تا آخرین خط کد، اینجا هستیم.' ) ); ?></p>
			<div class="contact-form-wrap">
				<?php echo do_shortcode( '[karen_contact_form]' ); ?>
			</div>
		</div>
	</section>

<?php
get_footer();
