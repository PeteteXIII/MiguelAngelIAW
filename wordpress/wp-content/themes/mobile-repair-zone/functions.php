<?php
/**
 * Mobile Repair Zone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mobile Repair Zone
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Mobile_Repair_Zone_Loader.php' );

$Mobile_Repair_Zone_Loader = new \WPTRT\Autoload\Mobile_Repair_Zone_Loader();

$Mobile_Repair_Zone_Loader->mobile_repair_zone_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$Mobile_Repair_Zone_Loader->mobile_repair_zone_register();

if ( ! function_exists( 'mobile_repair_zone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mobile_repair_zone_setup() {

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

        add_image_size('mobile-repair-zone-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','mobile-repair-zone' ),
	        'footer'=> esc_html__( 'Footer Menu','mobile-repair-zone' ),
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
		add_theme_support( 'custom-background', apply_filters( 'mobile_repair_zone_custom_background_args', array(
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
		add_action('wp_ajax_mobile_repair_zone_dismissable_notice', 'mobile_repair_zone_dismissable_notice');
	}
endif;
add_action( 'after_setup_theme', 'mobile_repair_zone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mobile_repair_zone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mobile_repair_zone_content_width', 1170 );
}
add_action( 'after_setup_theme', 'mobile_repair_zone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mobile_repair_zone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mobile-repair-zone' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'mobile-repair-zone' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Single Product Page Sidebar', 'mobile-repair-zone' ),
		'id'            => 'woocommerce-single-product-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Page Sidebar', 'mobile-repair-zone' ),
		'id'            => 'woocommerce-shop-page-sidebar',
		'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'mobile-repair-zone' ),
		'id'            => 'mobile-repair-zone-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'mobile-repair-zone' ),
		'id'            => 'mobile-repair-zone-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'mobile-repair-zone' ),
		'id'            => 'mobile-repair-zone-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'mobile_repair_zone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mobile_repair_zone_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'Lato',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'montserrat',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);
 
	wp_enqueue_style(
		'poppins',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'mobile-repair-zone-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css',get_template_directory_uri() . '/assets/css/bootstrap.css');

    wp_enqueue_style( 'owl.carousel-css',get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'mobile-repair-zone-style', get_stylesheet_uri());
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'mobile-repair-zone-style',$mobile_repair_zone_theme_css );

	wp_style_add_data('mobile-repair-zone-basic-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-style',get_template_directory_uri().'/assets/css/fontawesome/css/all.css' );

    wp_enqueue_script('mobile-repair-zone-theme-js',get_template_directory_uri() . '/assets/js/theme-script.js', array('jquery'), '', true );

    wp_enqueue_script('owl.carousel-js',get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mobile_repair_zone_scripts' );

/**
 * Enqueue S Header.
 */
function mobile_repair_zone_sticky_header() {

	$mobile_repair_zone_sticky_header = get_theme_mod('mobile_repair_zone_sticky_header');

	$mobile_repair_zone_custom_style= "";

	if($mobile_repair_zone_sticky_header != true){

		$mobile_repair_zone_custom_style .='.stick_header{';

			$mobile_repair_zone_custom_style .='position: static;';

		$mobile_repair_zone_custom_style .='}';
	}

	wp_add_inline_style( 'mobile-repair-zone-style',$mobile_repair_zone_custom_style );

}
add_action( 'wp_enqueue_scripts', 'mobile_repair_zone_sticky_header' );

/**
 * Enqueue theme color style.
 */
function mobile_repair_zone_theme_color() {

    $mobile_repair_zone_theme_color_css = '';
    $mobile_repair_zone_preloader_bg_color = get_theme_mod('mobile_repair_zone_preloader_bg_color');
    $mobile_repair_zone_preloader_dot_1_color = get_theme_mod('mobile_repair_zone_preloader_dot_1_color');
    $mobile_repair_zone_preloader_dot_2_color = get_theme_mod('mobile_repair_zone_preloader_dot_2_color');
    $mobile_repair_zone_logo_max_height = get_theme_mod('mobile_repair_zone_logo_max_height');

  	if(get_theme_mod('mobile_repair_zone_logo_max_height') == '') {
		$mobile_repair_zone_logo_max_height = '24';
	}

    if(get_theme_mod('mobile_repair_zone_preloader_bg_color') == '') {
			$mobile_repair_zone_preloader_bg_color = '#000';
	}
	if(get_theme_mod('mobile_repair_zone_preloader_dot_1_color') == '') {
		$mobile_repair_zone_preloader_dot_1_color = '#fff';
	}
	if(get_theme_mod('mobile_repair_zone_preloader_dot_2_color') == '') {
		$mobile_repair_zone_preloader_dot_2_color = '#f10026';
	}

	$mobile_repair_zone_theme_color_css = '
		.custom-logo-link img{
			max-height: '.esc_attr($mobile_repair_zone_logo_max_height).'px;
	 	}
		.loading{
			background-color: '.esc_attr($mobile_repair_zone_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($mobile_repair_zone_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($mobile_repair_zone_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'mobile-repair-zone-style',$mobile_repair_zone_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'mobile_repair_zone_theme_color' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
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
require get_template_directory() . '/inc/team-meta.php';

/* TGM. */
require get_parent_theme_file_path( '/inc/tgm.php' );

/*radio button sanitization*/
function mobile_repair_zone_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//SELECT
function mobile_repair_zone_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/*dropdown page sanitization*/
function mobile_repair_zone_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/*checkbox sanitization*/
function mobile_repair_zone_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function mobile_repair_zone_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function mobile_repair_zone_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function mobile_repair_zone_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function mobile_repair_zone_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function mobile_repair_zone_remove_sections( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('display_header_text');
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_setting('header_textcolor');
}
add_action( 'customize_register', 'mobile_repair_zone_remove_sections');


/**
 * Get CSS
 */

function mobile_repair_zone_getpage_css($hook) {
	wp_register_script( 'admin-notice-script', get_template_directory_uri() . '/inc/admin/js/admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script('admin-notice-script','mobile_repair_zone',
		array('admin_ajax'	=>	admin_url('admin-ajax.php'),'wpnonce'  =>	wp_create_nonce('mobile_repair_zone_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('admin-notice-script');

    wp_localize_script( 'admin-notice-script', 'mobile_repair_zone_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
	if ( 'appearance_page_mobile-repair-zone-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'mobile-repair-zone-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'mobile_repair_zone_getpage_css' );

if ( ! defined( 'MOBILE_REPAIR_ZONE_CONTACT_SUPPORT' ) ) {
define('MOBILE_REPAIR_ZONE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/mobile-repair-zone/','mobile-repair-zone'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_REVIEW' ) ) {
define('MOBILE_REPAIR_ZONE_REVIEW',__('https://wordpress.org/support/theme/mobile-repair-zone/reviews/','mobile-repair-zone'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_LIVE_DEMO' ) ) {
define('MOBILE_REPAIR_ZONE_LIVE_DEMO',__('https://demo.themagnifico.net/mobile-repair-zone/','mobile-repair-zone'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_GET_PREMIUM_PRO' ) ) {
define('MOBILE_REPAIR_ZONE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/phone-repair-wordpress-theme','mobile-repair-zone'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_PRO_DOC' ) ) {
define('MOBILE_REPAIR_ZONE_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/mobile-repair-zone-doc/','mobile-repair-zone'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_FREE_DOC' ) ) {
define('MOBILE_REPAIR_ZONE_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/mobile-repair-zone-free-doc/','mobile-repair-zone'));
}

add_action('admin_menu', 'mobile_repair_zone_themepage');
function mobile_repair_zone_themepage(){

	$mobile_repair_zone_theme_test = wp_get_theme();

	$theme_info = add_theme_page( __('Theme Options','mobile-repair-zone'), __('Theme Options','mobile-repair-zone'), 'manage_options', 'mobile-repair-zone-info.php', 'mobile_repair_zone_info_page' );
}

function mobile_repair_zone_info_page() {
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap mobile-repair-zone-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','mobile-repair-zone'); ?><?php echo esc_html( $theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "mobile-repair-zone"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Mobile Repair Zone , feel free to contact us for any support regarding our theme.", "mobile-repair-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "mobile-repair-zone"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "mobile-repair-zone"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "mobile-repair-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
							<?php esc_html_e("Get Premium", "mobile-repair-zone"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "mobile-repair-zone"); ?></h3>
						<p><?php esc_html_e("If You love Mobile Repair Zone theme then we would appreciate your review about our theme.", "mobile-repair-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "mobile-repair-zone"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Free Documentation", "mobile-repair-zone"); ?></h3>
						<p><?php esc_html_e("Our guide is available if you require any help configuring and setting up the theme. Easy and quick way to setup the theme.", "mobile-repair-zone"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_FREE_DOC ); ?>" class="button button-primary get">
							<?php esc_html_e("Free Documentation", "mobile-repair-zone"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php esc_html_e("Free Vs Premium","mobile-repair-zone"); ?></h2>
		<div class="mobile-repair-zone-button-container">
			<a target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "mobile-repair-zone"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "mobile-repair-zone"); ?>
			</a>
		</div>

		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "mobile-repair-zone"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "mobile-repair-zone"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "mobile-repair-zone"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "mobile-repair-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "mobile-repair-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "mobile-repair-zone"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Premium Support", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "mobile-repair-zone"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="mobile-repair-zone-button-container">
			<a target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_GET_PREMIUM_PRO ); ?>" class="button button-primary get prem">
				<?php esc_html_e("Go Premium", "mobile-repair-zone"); ?>
			</a>
		</div>
	</div>
	<?php
}

//Admin Notice For Getstart
function mobile_repair_zone_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function mobile_repair_zone_deprecated_hook_admin_notice() {

    $dismissed = get_user_meta(get_current_user_id(), 'mobile_repair_zone_dismissable_notice', true);
    if ( !$dismissed) { ?>
        <div class="updated notice notice-success is-dismissible notice-get-started-class" data-notice="get_started" style="background: #f7f9f9; padding: 20px 10px; display: flex;">
	    	<div class="tm-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
	    	<div class="tm-admin-content" style="padding-left: 30px; align-self: center">
	    		<h2 style="font-weight: 600;line-height: 1.3; margin: 0px;"><?php esc_html_e('Thank You For Choosing ', 'mobile-repair-zone'); ?><?php echo wp_get_theme(); ?><h2>
	    		<p style="color: #3c434a; font-weight: 400; margin-bottom: 30px;"><?php _e('Get Started With Theme By Clicking On Getting Started.', 'mobile-repair-zone'); ?><p>
	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=mobile-repair-zone-info.php' )); ?>"><?php esc_html_e( 'Get started', 'mobile-repair-zone' ) ?></a>
	        	<a class="admin-notice-btn button button-primary button-hero" target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation', 'mobile-repair-zone' ) ?></a>
	        	<span style="padding-top: 15px; display: inline-block; padding-left: 8px;">
	        	<span class="dashicons dashicons-admin-links"></span>
	        	<a class="admin-notice-btn"	 target="_blank" href="<?php echo esc_url( MOBILE_REPAIR_ZONE_LIVE_DEMO ); ?>"><?php esc_html_e( 'View Demo', 'mobile-repair-zone' ) ?></a>
	        	</span>
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'mobile_repair_zone_deprecated_hook_admin_notice' );

function mobile_repair_zone_switch_theme() {
    delete_user_meta(get_current_user_id(), 'mobile_repair_zone_dismissable_notice');
}
add_action('after_switch_theme', 'mobile_repair_zone_switch_theme');
function mobile_repair_zone_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'mobile_repair_zone_dismissable_notice', true);
    die();
}