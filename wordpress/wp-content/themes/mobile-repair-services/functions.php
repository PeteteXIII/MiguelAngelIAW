<?php
/**
 * Mobile Repair Services functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mobile Repair Services
 */

if ( ! defined( 'MOBILE_REPAIR_ZONE_URL' ) ) {
    define( 'MOBILE_REPAIR_ZONE_URL', esc_url( 'https://www.themagnifico.net/products/mobile-repair-wordpress-theme', 'mobile-repair-services') );
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_TEXT' ) ) {
    define( 'MOBILE_REPAIR_ZONE_TEXT', __( 'Mobile Services Pro','mobile-repair-services' ));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_CONTACT_SUPPORT' ) ) {
define('MOBILE_REPAIR_ZONE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/mobile-repair-services','mobile-repair-services'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_REVIEW' ) ) {
define('MOBILE_REPAIR_ZONE_REVIEW',__('https://wordpress.org/support/theme/mobile-repair-services/reviews/#new-post','mobile-repair-services'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_LIVE_DEMO' ) ) {
define('MOBILE_REPAIR_ZONE_LIVE_DEMO',__('https://demo.themagnifico.net/mobile-repair-services/','mobile-repair-services'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_GET_PREMIUM_PRO' ) ) {
define('MOBILE_REPAIR_ZONE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/products/mobile-repair-wordpress-theme','mobile-repair-services'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_PRO_DOC' ) ) {
define('MOBILE_REPAIR_ZONE_PRO_DOC',__('https://demo.themagnifico.net/eard/wathiqa/mobile-repair-services-doc/ ','mobile-repair-services'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_BUY_TEXT' ) ) {
    define( 'MOBILE_REPAIR_ZONE_BUY_TEXT', __( 'Buy Mobile Services Pro','mobile-repair-services' ));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_FREE_DOC' ) ) {
define('MOBILE_REPAIR_ZONE_FREE_DOC',__('https://demo.themagnifico.net/eard/wathiqa/mobile-repair-services-free-doc/','mobile-repair-services'));
}

function mobile_repair_services_enqueue_styles() {

    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.css');
    $mobile_repair_services_parentcss = 'mobile-repair-zone-style';
    $mobile_repair_services_theme = wp_get_theme(); wp_enqueue_style( $mobile_repair_services_parentcss, get_template_directory_uri() . '/style.css', array(), $mobile_repair_services_theme->parent()->get('Version'));
    wp_enqueue_style( 'mobile-repair-services-style', get_stylesheet_uri(), array( $mobile_repair_services_parentcss ), $mobile_repair_services_theme->get('Version'));
    wp_enqueue_script('mobile-repair-services-child-theme-js', esc_url(get_theme_file_uri()) . '/assets/js/child-theme-script.js', array( 'jquery' ), true );
    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );  
}

add_action( 'wp_enqueue_scripts', 'mobile_repair_services_enqueue_styles' );

function mobile_repair_services_admin_scripts() {
    // demo CSS
    wp_enqueue_style( 'mobile-repair-services-demo-css', get_theme_file_uri( 'assets/css/demo.css' ) );
}
add_action( 'admin_enqueue_scripts', 'mobile_repair_services_admin_scripts' );

function mobile_srepair_services_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function mobile_repair_services_customize_register($wp_customize){

    // Pro Version
    class Mobile_Repair_Services_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( MOBILE_REPAIR_ZONE_BUY_TEXT,'mobile-repair-services' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Mobile_Repair_Services_sanitize_custom_control( $input ) {
        return $input;
    }

   // Best Destination
    global $wp_customize;

    $wp_customize->add_section('mobile_srepair_services_our_services',array(
        'title' => esc_html__('Services','mobile-repair-services'),
        'description' => esc_html__('Here you have to select category which will display Services in the home page. Note: Image Dimensions 450 x 300 px','mobile-repair-services')
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting('mobile_srepair_services_our_services_category',array(
        'default'   => 'select',
        'sanitize_callback' => 'mobile_srepair_services_sanitize_select',
    ));
    $wp_customize->add_control('mobile_srepair_services_our_services_category',array(
        'type'    => 'select',
        'choices' => $cat_post,
        'label' => __('Select category to display latest properties','mobile-repair-services'),
        'section' => 'mobile_srepair_services_our_services',
    ));


     // Pro Version
    $wp_customize->add_setting( 'pro_version_services_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Services_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Services_Customize_Pro_Version ( $wp_customize,'pro_version_services_setting', array(
        'section'     => 'mobile_srepair_services_our_services',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-services' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'mobile_repair_services_customize_register');

if ( ! function_exists( 'mobile_repair_services_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mobile_repair_services_setup() {

        add_theme_support( 'responsive-embeds' );

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

        add_image_size('mobile-repair-services-featured-header-image', 2000, 660, true);

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
            'default-color' => '',
            'default-image' => '',
        ) ) );

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

        add_theme_support( 'align-wide' );

        add_theme_support( 'wp-block-styles' );
    }
endif;
add_action( 'after_setup_theme', 'mobile_repair_services_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mobile_repair_services_widgets_init() {
        register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'mobile-repair-services' ),
        'id'            => 'sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'mobile-repair-services' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'mobile_repair_services_widgets_init' );

function mobile_repair_services_remove_customize_register() {
    global $wp_customize;
    $wp_customize->remove_setting( 'mobile_repair_zone_slider_opacity_color' );
    $wp_customize->remove_control( 'mobile_repair_zone_slider_opacity_color' );
    $wp_customize->remove_setting('mobile_repair_zone_slider_content_setting');
    $wp_customize->remove_control('mobile_repair_zone_slider_content_setting');
    $wp_customize->remove_setting('mobile_repair_zone_slider_excerpt_length');
    $wp_customize->remove_control('mobile_repair_zone_slider_excerpt_length');
}

add_action( 'customize_register', 'mobile_repair_services_remove_customize_register', 11 );