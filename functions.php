<?php
/**
 * Karen Soft - functions.php
 *
 * یک قالب وردپرس کامل و فارسی (راست‌به‌چپ) برای سایت کارن سافت.
 * قابل بارگیری از گیت‌هاب به صورت ZIP و نصب از طریق بخش نمایش > قالب‌ها در وردپرس.
 *
 * @package Karen_Soft
 * @author  Karen Soft / rahmaniho
 */

/** اگر مستقیماً فراخوانی شود، دسترسی را مسدود می‌کند. */
defined( 'ABSPATH' ) || exit;

/**
 * ثابت‌های قالب.
 */
define( 'KAREN_SOFT_THEME_VERSION', '1.0.0' );
define( 'KAREN_SOFT_THEME_DIR', get_template_directory() );
define( 'KAREN_SOFT_THEME_URI', get_template_directory_uri() );

/**
 * است clásico: پشتیبانی‌های قالب.
 */
function karen_soft_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 260,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption', 'search-form' ) );
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background' );

	// منوها
	register_nav_menus( array(
		'primary'   => __( 'منوی اصلی', 'karen-soft' ),
		'footer'    => __( 'منوی پاورقی', 'karen-soft' ),
		'social'    => __( 'ایکون‌های شبکه‌های اجتماعی', 'karen-soft' ),
	) );

 // سایدبارها / ابزارک‌ها
	register_sidebar( array(
		'name'          => __( 'سایدبار اصلی', 'karen-soft' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'ناحیه ابزارک‌های سایدبار صفحات و نوشته‌ها.', 'karen-soft' ),
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'ابزارک پاورقی ۱', 'karen-soft' ),
		'id'            => 'footer-1',
		'description'   => __( 'ناحیه ابزارک اول پاورقی.', 'karen-soft' ),
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'ابزارک پاورقی ۲', 'karen-soft' ),
		'id'            => 'footer-2',
		'description'   => __( 'ناحیه ابزارک دوم پاورقی.', 'karen-soft' ),
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'ابزارک پاورقی ۳', 'karen-soft' ),
		'id'            => 'footer-3',
		'description'   => __( 'ناحیه ابزارک سوم پاورقی.', 'karen-soft' ),
		'before_widget' => '<section class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'after_setup_theme', 'karen_soft_theme_setup' );

/**
 * تایپ‌های محتوا سفارشی: محصولات و نمونه‌کارها.
 */
function karen_soft_post_types() {
	// محصولات
	register_post_type( 'karen_product', array(
		'label'                 => __( 'محصولات', 'karen-soft' ),
		'labels'                => array(
			'name'               => __( 'محصولات', 'karen-soft' ),
			'singular_name'      => __( 'محصول', 'karen-soft' ),
			'add_new'            => __( 'افزودن محصول', 'karen-soft' ),
			'add_new_item'       => __( 'افزودن محصول جدید', 'karen-soft' ),
			'edit_item'          => __( 'ویرایش محصول', 'karen-soft' ),
			'new_item'           => __( 'محصول جدید', 'karen-soft' ),
			'view_item'          => __( 'نمایش محصول', 'karen-soft' ),
			'search_items'       => __( 'جست‌وجوی محصولات', 'karen-soft' ),
			'not_found'          => __( 'محصولی یافت نشد', 'karen-soft' ),
			'not_found_in_trash' => __( 'محصولی در زباله‌دان یافت نشد', 'karen-soft' ),
		),
		'public'                => true,
		'has_archive'           => 'محصولات',
		'rewrite'               => array( 'slug' => 'محصولات' ),
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest'          => true,
		'menu_icon'             => 'dashicons-products',
		'menu_position'         => 25,
	) );

	// نمونه‌کارها / پورتfolyo
	register_post_type( 'karen_portfolio', array(
		'label'                 => __( 'نمونه‌کارها', 'karen-soft' ),
		'labels'                => array(
			'name'               => __( 'نمونه‌کارها', 'karen-soft' ),
			'singular_name'      => __( 'نمونه‌کار', 'karen-soft' ),
			'add_new'            => __( 'افزودن نمونه‌کار', 'karen-soft' ),
			'add_new_item'       => __( 'افزودن نمونه‌کار جدید', 'karen-soft' ),
			'edit_item'          => __( 'ویرایش نمونه‌کار', 'karen-soft' ),
			'new_item'           => __( 'نمونه‌کار جدید', 'karen-soft' ),
			'view_item'          => __( 'نمایش نمونه‌کار', 'karen-soft' ),
			'search_items'       => __( 'جست‌وجوی نمونه‌کارها', 'karen-soft' ),
			'not_found'          => __( 'نمونه‌کاری یافت نشد', 'karen-soft' ),
			'not_found_in_trash' => __( 'نمونه‌کاری در زباله‌دان یافت نشد', 'karen-soft' ),
		),
		'public'                => true,
		'has_archive'           => 'نمونه‌کارها',
		'rewrite'               => array( 'slug' => 'نمونه‌کارها' ),
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest'          => true,
		'menu_icon'             => 'dashicons-portfolio',
		'menu_position'         => 26,
	) );

	// خدمات
	register_post_type( 'karen_service', array(
		'label'                 => __( 'خدمات', 'karen-soft' ),
		'labels'                => array(
			'name'               => __( 'خدمات', 'karen-soft' ),
			'singular_name'      => __( 'خدمت', 'karen-soft' ),
			'add_new'            => __( 'افزودن خدمت', 'karen-soft' ),
			'add_new_item'       => __( 'افزودن خدمت جدید', 'karen-soft' ),
			'edit_item'          => __( 'ویرایش خدمت', 'karen-soft' ),
			'new_item'           => __( 'خدمت جدید', 'karen-soft' ),
			'view_item'          => __( 'نمایش خدمت', 'karen-soft' ),
			'search_items'       => __( 'جست‌وجوی خدمات', 'karen-soft' ),
			'not_found'          => __( 'خدمتی یافت نشد', 'karen-soft' ),
			'not_found_in_trash' => __( 'خدمتی در زباله‌دان یافت نشد', 'karen-soft' ),
		),
		'public'                => true,
		'has_archive'           => 'خدمات',
		'rewrite'               => array( 'slug' => 'خدمات' ),
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'          => true,
		'menu_icon'             => 'dashicons-admin-tools',
		'menu_position'         => 24,
	) );
}
add_action( 'init', 'karen_soft_post_types' );

/**
 * دسته‌بندی products و portfolio (تاکسونومی سفارشی).
 */
function karen_soft_taxonomies() {
	register_taxonomy( 'product_category', 'karen_product', array(
		'label'       => __( 'دسته محصول', 'karen-soft' ),
		'rewrite'     => array( 'slug' => 'دسته-محصول' ),
		'hierarchical' => true,
		'show_in_rest' => true,
	) );
	register_taxonomy( 'portfolio_category', 'karen_portfolio', array(
		'label'       => __( 'دسته نمونه‌کار', 'karen-soft' ),
		'rewrite'     => array( 'slug' => 'دسته-نمونه‌کار' ),
		'hierarchical' => true,
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'karen_soft_taxonomies' );

/**
 * سفارشی‌سازی (Customizer): رنگ، تماس، شبکه‌ها.
 */
function karen_soft_customize_register( $wp_customize ) {
	// بخش رنگ‌ها
	$wp_customize->add_section( 'karen_soft_colors', array(
		'title'    => __( 'رنگ‌ها و برند', 'karen-soft' ),
		'priority' => 35,
	) );

	$wp_customize->add_setting( 'brand_color', array(
		'default'           => '#3b6df6',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_color', array(
		'label'    => __( 'رنگ Principal برند', 'karen-soft' ),
		'section'  => 'karen_soft_colors',
	) ) );

	$wp_customize->add_setting( 'accent_color', array(
		'default'           => '#c9a96e',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'label'    => __( 'رنگ تأکیدی (طلایی)', 'karen-soft' ),
		'section'  => 'karen_soft_colors',
	) ) );

	// بخش تماس
	$wp_customize->add_section( 'karen_soft_contact', array(
		'title'    => __( 'اطلاعات تماس', 'karen-soft' ),
		'priority' => 40,
	) );

	foreach ( array( 'phone', 'email', 'address', 'city' ) as $field ) {
		$wp_customize->add_setting( 'contact_' . $field, array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( 'contact_' . $field, array(
			'label'    => ucfirst( $field ),
			'section'  => 'karen_soft_contact',
			'type'     => 'text',
		) );
	}

	$wp_customize->add_setting( 'contact_phone_display', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'contact_phone_display', array(
		'label'    => __( 'نمایش شماره تلفن', 'karen-soft' ),
		'section'  => 'karen_soft_contact',
		'type'     => 'text',
	) );

	// شبکه‌های اجتماعی
	$wp_customize->add_section( 'karen_soft_social', array(
		'title'    => __( 'شبکه‌های اجتماعی', 'karen-soft' ),
		'priority' => 45,
	) );
	foreach ( array( 'telegram', 'instagram' ) as $net ) {
		$wp_customize->add_setting( 'social_' . $net, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		) );
		$wp_customize->add_control( new WP_Customize_Url_Control( $wp_customize, 'social_' . $net, array(
			'label'    => ucfirst( $net ),
			'section'  => 'karen_soft_social',
		) ) );
	}

	// پیام verlorن به بالا / کپی‌رایت
	$wp_customize->add_setting( 'copyright_text', array(
		'default'           => 'کارن سافت © ۱۴۰۴ — امروز',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'copyright_text', array(
		'label'    => __( 'متن کپی‌رایت پاورقی', 'karen-soft' ),
		'section'  => 'karen_soft_contact',
		'type'     => 'text',
	) );
}
add_action( 'customize_register', 'karen_soft_customize_register' );

/**
 *اسکریپت‌ها و استایل‌ها.
 */
function karen_soft_assets() {
	wp_enqueue_style( 'karen-soft-style', get_stylesheet_uri(), array(), KAREN_SOFT_THEME_VERSION );
	// RTL استایل به صورت خودکار توسط وردپرس برای زبان‌های راست‌به‌چپ بارگذاری می‌شود (rtl.css).

	wp_enqueue_script( 'karen-soft-main', KAREN_SOFT_THEME_URI . '/assets/js/main.js', array( 'jquery' ), KAREN_SOFT_THEME_VERSION, true );

	wp_localize_script( 'karen-soft-main', 'karenSoft', array(
		'ajaxurl' => esc_url_raw( admin_url( 'admin-ajax.php' ) ),
		'nonce'   => wp_create_nonce( 'karen_contact_nonce' ),
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'karen_soft_assets' );

/**
 * convenient helper: مقدار تنظیمات تماس.
 */
function karen_soft_get_contact( $key, $default = '' ) {
	return apply_filters( 'karen_soft_contact_' . $key, get_theme_mod( 'contact_' . $key, $default ) );
}

/**
 * برگه escapar: فرم تماس با کوتاه‌کد [karen_contact_form].
 */
function karen_soft_contact_form_shortcode() {
	ob_start();
	$honeypot = 'karen_hp_' . uniqid();
	?>
	<form class="karen-contact-form" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="POST">
		<?php wp_nonce_field( 'karen_contact_nonce', 'karen_contact_nonce_field' ); ?>
		<input type="hidden" name="action" value="karen_soft_contact_form" />
		<input type="hidden" name="<?php echo esc_attr( $honeypot ); ?>" value="" />
		<label for="karen_contact_name"><?php _e( 'نام و نام‌خانوادگی', 'karen-soft' ); ?></label>
		<input type="text" id="karen_contact_name" name="karen_contact_name" required />

		<label for="karen_contact_email"><?php _e( 'پست الکترونیک', 'karen-soft' ); ?></label>
		<input type="email" id="karen_contact_email" name="karen_contact_email" required />

		<label for="karen_contact_subject"><?php _e( 'موضوع', 'karen-soft' ); ?></label>
		<input type="text" id="karen_contact_subject" name="karen_contact_subject" />

		<label for="karen_contact_message"><?php _e( 'پیام شما', 'karen-soft' ); ?></label>
		<textarea id="karen_contact_message" name="karen_contact_message" rows="5" required></textarea>

		<button type="submit" class="button button-primary"><?php _e( 'ارسال پیام', 'karen-soft' ); ?></button>
		<div class="karen-contact-response" aria-live="polite"></div>
	</form>
	<?php
	return ob_get_clean();
}
add_shortcode( 'karen_contact_form', 'karen_soft_contact_form_shortcode' );

/**
 * پردازش فرم تماس از طریق AJAX.
 */
function karen_soft_handle_contact_form() {
	check_ajax_referer( 'karen_contact_nonce', 'karen_contact_nonce_field' );

	$name    = isset( $_POST['karen_contact_name'] )    ? sanitize_text_field( $_POST['karen_contact_name'] ) : '';
	$email   = isset( $_POST['karen_contact_email'] )   ? sanitize_email( $_POST['karen_contact_email'] ) : '';
	$subject = isset( $_POST['karen_contact_subject'] ) ? sanitize_text_field( $_POST['karen_contact_subject'] ) : '';
	$message = isset( $_POST['karen_contact_message'] ) ? sanitize_textarea_field( $_POST['karen_contact_message'] ) : '';

	// Honeypot ساده: اگر فیلد مخفی پر شده، ربات است.
	$hp_keys = array_filter( array_keys( $_POST ), function( $k ) {
		return strpos( $k, 'karen_hp_' ) === 0;
	} );
	foreach ( $hp_keys as $hp_key ) {
		if ( '' !== $_POST[ $hp_key ] ) {
			wp_send_json_error( __( 'درخواست نامعتبر است.', 'karen-soft' ) );
		}
	}

	if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
		wp_send_json_error( __( 'لطفاً تمام فیلدهای الزامی را تکمیل کنید.', 'karen-soft' ) );
	}

	if ( ! is_email( $email ) ) {
		wp_send_json_error( __( 'آدرس ایمیل معتبر نیست.', 'karen-soft' ) );
	}

	$to      = karen_soft_get_contact( 'email', get_option( 'admin_email' ) );
	$subject = 'پیام جدید از سایت: ' . esc_html( $subject );
	$body    = "نام: $name\nایمیل: $email\nموضوع: $subject\n\nپیام:\n$message";
	$headers = array( 'From: ' . $name . ' <' . $email . '>', 'Reply-To: ' . $email );

	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( $sent ) {
		wp_send_json_success( __( 'پیام شما با موفقیت ارسال شد.', 'karen-soft' ) );
	} else {
		wp_send_json_error( __( 'خطا در ارسال پیام، لطفاً دوباره تلاش کنید.', 'karen-soft' ) );
	}
}
add_action( 'wp_ajax_karen_soft_contact_form', 'karen_soft_handle_contact_form' );
add_action( 'wp_ajax_nopriv_karen_soft_contact_form', 'karen_soft_handle_contact_form' );

/**
 * نوار مدیریت وردپرس را در سایت برای کاربران غیرمدیر مخفی می‌کند.
 */
function karen_soft_hide_admin_bar() {
	if ( ! current_user_can( 'manage_options' ) ) {
		show_admin_bar( false );
	}
}
add_action( 'after_setup_theme', 'karen_soft_hide_admin_bar' );
