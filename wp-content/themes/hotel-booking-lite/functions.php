<?php
/**
 * Hotel Booking Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hotel Booking Lite
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Hotel_Booking_Lite_Loader.php' );

$Hotel_Booking_Lite_Loader = new \WPTRT\Autoload\Hotel_Booking_Lite_Loader();

$Hotel_Booking_Lite_Loader->hotel_booking_lite_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Hotel_Booking_Lite_Loader->hotel_booking_lite_register();

if ( ! function_exists( 'hotel_booking_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function hotel_booking_lite_setup() {

		add_theme_support( 'woocommerce' );
		add_theme_support( "responsive-embeds" );
		add_theme_support( "align-wide" );
		add_theme_support( "wp-block-styles" );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('hotel-booking-lite-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','hotel-booking-lite' ),
	        'footer'=> esc_html__( 'Footer Menu','hotel-booking-lite' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'hotel_booking_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'hotel_booking_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hotel_booking_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hotel_booking_lite_content_width', 1170 );
}
add_action( 'after_setup_theme', 'hotel_booking_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hotel_booking_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hotel-booking-lite' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'hotel-booking-lite' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'hotel_booking_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hotel_booking_lite_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'outfit',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'hotel-booking-lite-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

// load bootstrap css
  wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');

  wp_enqueue_style( 'owl.carousel-css',get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'hotel-booking-lite-style', get_stylesheet_uri() );

	wp_style_add_data('hotel-booking-lite-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('hotel-booking-lite-theme-js', get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hotel_booking_lite_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Meta Feild
 */
require get_template_directory() . '/inc/popular-room-meta.php';

/*radio button sanitization*/
function hotel_booking_lite_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/*dropdown page sanitization*/
function hotel_booking_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*checkbox sanitization*/
function hotel_booking_lite_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function hotel_booking_lite_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function hotel_booking_lite_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function hotel_booking_lite_remove_sections( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_setting('header_textcolor');
}
add_action( 'customize_register', 'hotel_booking_lite_remove_sections');

/**
 * Get CSS
 */

function hotel_booking_lite_getpage_css($hook) {
	if ( 'appearance_page_hotel-booking-lite-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'hotel-booking-lite-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'hotel_booking_lite_getpage_css' );

add_action('after_switch_theme', 'hotel_setup_options');

function hotel_setup_options () {
	wp_redirect( admin_url() . 'themes.php?page=hotel-booking-lite-info.php' );
}

if ( ! defined( 'HOTEL_BOOKING_LITE_CONTACT_SUPPORT' ) ) {
define('HOTEL_BOOKING_LITE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/hotel-booking-lite','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_REVIEW' ) ) {
define('HOTEL_BOOKING_LITE_REVIEW',__('https://wordpress.org/support/theme/hotel-booking-lite/reviews/#new-post','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_LIVE_DEMO' ) ) {
define('HOTEL_BOOKING_LITE_LIVE_DEMO',__('https://themagnifico.net/demo/hotel-booking/','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_GET_PREMIUM_PRO' ) ) {
define('HOTEL_BOOKING_LITE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/hotel-booking-wordpress-theme/','hotel-booking-lite'));
}
if ( ! defined( 'HOTEL_BOOKING_LITE_PRO_DOC' ) ) {
define('HOTEL_BOOKING_LITE_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/hotel-booking-pro-doc/','hotel-booking-lite'));
}

add_action('admin_menu', 'hotel_booking_lite_themepage');
function hotel_booking_lite_themepage(){
	$theme_info = add_theme_page( __('Theme Options','hotel-booking-lite'), __('Theme Options','hotel-booking-lite'), 'manage_options', 'hotel-booking-lite-info.php', 'hotel_booking_lite_info_page' );
}

function hotel_booking_lite_info_page() {
	$user = wp_get_current_user();
	$hotel_booking_lite_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap hotel-booking-lite-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','hotel-booking-lite'); ?><?php echo esc_html( $hotel_booking_lite_theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "hotel-booking-lite"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Hotel Booking Lite , feel free to contact us for any support regarding our theme.", "hotel-booking-lite"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "hotel-booking-lite"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "hotel-booking-lite"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "hotel-booking-lite"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "hotel-booking-lite"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "hotel-booking-lite"); ?></h3>
						<p><?php esc_html_e("If You love Hotel Booking Lite theme then we would appreciate your review about our theme.", "hotel-booking-lite"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "hotel-booking-lite"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","hotel-booking-lite"); ?></h2>
		<div class="hotel-booking-lite-button-container">
			<a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "hotel-booking-lite"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "hotel-booking-lite"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "hotel-booking-lite"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "hotel-booking-lite"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "hotel-booking-lite"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "hotel-booking-lite"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "hotel-booking-lite"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "hotel-booking-lite"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "hotel-booking-lite"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="hotel-booking-lite-button-container">
			<a target="_blank" href="<?php echo esc_url( HOTEL_BOOKING_LITE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "hotel-booking-lite"); ?>
			</a>
		</div>
	</div>
	<?php
}
