<?php
/**
 * Mobile Repair Zone Theme Customizer
 *
 * @link: https://developer.wordpress.org/themes/customize-api/customizer-objects/
 *
 * @package Mobile Repair Zone
 */

if ( ! defined( 'MOBILE_REPAIR_ZONE_URL' ) ) {
define('MOBILE_REPAIR_ZONE_URL',__('https://www.themagnifico.net/products/phone-repair-wordpress-theme','mobile-repair-zone'));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_TEXT' ) ) {
    define( 'MOBILE_REPAIR_ZONE_TEXT', __( 'Mobile Repair Pro','mobile-repair-zone' ));
}
if ( ! defined( 'MOBILE_REPAIR_ZONE_BUY_TEXT' ) ) {
    define( 'MOBILE_REPAIR_ZONE_BUY_TEXT', __( 'Buy Mobile Repair Pro','mobile-repair-zone' ));
}

use WPTRT\Customize\Section\Mobile_Repair_Zone_Button;

add_action( 'customize_register', function( $manager ) {

    $manager->register_section_type( Mobile_Repair_Zone_Button::class );

    $manager->add_section(
        new Mobile_Repair_Zone_Button( $manager, 'mobile_repair_zone_pro', [
           'title'       => esc_html( MOBILE_REPAIR_ZONE_TEXT,'mobile-repair-zone' ),
            'priority'    => 0,
            'button_text' => __( 'GET PREMIUM', 'mobile-repair-zone' ),
            'button_url'  => esc_url( MOBILE_REPAIR_ZONE_URL )
        ] )
    );

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_script(
        'mobile-repair-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
        [ 'customize-controls' ],
        $version,
        true
    );

    wp_enqueue_style(
        'mobile-repair-zone-customize-section-button',
        get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
        [ 'customize-controls' ],
        $version
    );

} );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mobile_repair_zone_customize_register($wp_customize){

    // Pro Version
    class Mobile_Repair_Zone_Customize_Pro_Version extends WP_Customize_Control {
        public $type = 'pro_options';

        public function render_content() {
            echo '<span>For More <strong>'. esc_html( $this->label ) .'</strong>?</span>';
            echo '<a href="'. esc_url($this->description) .'" target="_blank">';
                echo '<span class="dashicons dashicons-info"></span>';
                echo '<strong> '. esc_html( MOBILE_REPAIR_ZONE_BUY_TEXT,'mobile-repair-zone' ) .'<strong></a>';
            echo '</a>';
        }
    }

    // Custom Controls
    function Mobile_Repair_Zone_sanitize_custom_control( $input ) {
        return $input;
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    //Logo
    $wp_customize->add_setting('mobile_repair_zone_logo_max_height',array(
        'default'   => '24',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_number_absint'
    ));
    $wp_customize->add_control('mobile_repair_zone_logo_max_height',array(
        'label' => esc_html__('Logo Width','mobile-repair-zone'),
        'section'   => 'title_tagline',
        'type'      => 'number'
    ));
    
    $wp_customize->add_setting('mobile_repair_zone_logo_title', array(
        'default' => true,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_logo_title',array(
        'label'          => __( 'Enable Disable Title', 'mobile-repair-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'mobile_repair_zone_logo_title',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_theme_description', array(
        'default' => false,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_theme_description',array(
        'label'          => __( 'Enable Disable Tagline', 'mobile-repair-zone' ),
        'section'        => 'title_tagline',
        'settings'       => 'mobile_repair_zone_theme_description',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_logo_title_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mobile_repair_zone_logo_title_color', array(
        'label'    => __('Site Title Color', 'mobile-repair-zone'),
        'section'  => 'title_tagline'
    )));

    $wp_customize->add_setting('mobile_repair_zone_logo_tagline_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mobile_repair_zone_logo_tagline_color', array(
        'label'    => __('Site Tagline Color', 'mobile-repair-zone'),
        'section'  => 'title_tagline'
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_logo', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_logo', array(
        'section'     => 'title_tagline',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    // General Settings
    $wp_customize->add_section('mobile_repair_zone_general_settings',array(
        'title' => esc_html__('General Settings','mobile-repair-zone'),
        'priority'   => 30,
    ));

    $wp_customize->add_setting('mobile_repair_zone_site_width_layout',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_site_width_layout',array(
        'label'       => esc_html__( 'Site Width Layout','mobile-repair-zone' ),
        'type' => 'radio',
        'section' => 'mobile_repair_zone_general_settings',
        'choices' => array(
            'Full Width' => __('Full Width','mobile-repair-zone'),
            'Wide Width' => __('Wide Width','mobile-repair-zone'),
            'Container Width' => __('Container Width','mobile-repair-zone')
        ),
    ) );

    $wp_customize->add_setting('mobile_repair_zone_sticky_header', array(
        'default' => false,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_sticky_header',array(
        'label'          => __( 'Show Sticky Header', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_general_settings',
        'settings'       => 'mobile_repair_zone_sticky_header',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_preloader_hide', array(
        'default' => false,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_preloader_hide',array(
        'label'          => __( 'Show Theme Preloader', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_general_settings',
        'settings'       => 'mobile_repair_zone_preloader_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting( 'mobile_repair_zone_preloader_bg_color', array(
        'default' => '#000',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_repair_zone_preloader_bg_color', array(
        'label' => esc_html__('Preloader Background Color','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_general_settings',
        'settings' => 'mobile_repair_zone_preloader_bg_color'
    )));

    $wp_customize->add_setting( 'mobile_repair_zone_preloader_dot_1_color', array(
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_repair_zone_preloader_dot_1_color', array(
        'label' => esc_html__('Preloader First Dot Color','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_general_settings',
        'settings' => 'mobile_repair_zone_preloader_dot_1_color'
    )));

    $wp_customize->add_setting( 'mobile_repair_zone_preloader_dot_2_color', array(
        'default' => '#f10026',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_repair_zone_preloader_dot_2_color', array(
        'label' => esc_html__('Preloader Second Dot Color','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_general_settings',
        'settings' => 'mobile_repair_zone_preloader_dot_2_color'
    )));

    $wp_customize->add_setting('mobile_repair_zone_scroll_hide', array(
        'default' => false,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_scroll_hide',array(
        'label'          => __( 'Show Theme Scroll To Top', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_general_settings',
        'settings'       => 'mobile_repair_zone_scroll_hide',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_scroll_top_position',array(
        'label'       => esc_html__( 'Scroll To Top Positions','mobile-repair-zone' ),
        'type' => 'radio',
        'section' => 'mobile_repair_zone_general_settings',
        'choices' => array(
            'Right' => __('Right','mobile-repair-zone'),
            'Left' => __('Left','mobile-repair-zone'),
            'Center' => __('Center','mobile-repair-zone')
        ),
    ) );

    $wp_customize->add_setting( 'mobile_repair_zone_scroll_bg_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_repair_zone_scroll_bg_color', array(
        'label' => esc_html__('Scroll Top Background Color','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_general_settings',
        'settings' => 'mobile_repair_zone_scroll_bg_color'
    )));

    $wp_customize->add_setting( 'mobile_repair_zone_scroll_color', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mobile_repair_zone_scroll_color', array(
        'label' => esc_html__('Scroll Top Color','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_general_settings',
        'settings' => 'mobile_repair_zone_scroll_color'
    )));

    $wp_customize->add_setting('mobile_repair_zone_scroll_font_size',array(
        'default'   => '16',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_scroll_font_size',array(
        'label' => __('Scroll Top Font Size','mobile-repair-zone'),
        'description' => __('Put in px','mobile-repair-zone'),
        'section'   => 'mobile_repair_zone_general_settings',
        'type'      => 'number'
    ));

    $wp_customize->add_setting( 'mobile_repair_zone_scroll_to_top_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'mobile_repair_zone_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'mobile_repair_zone_scroll_to_top_border_radius', array(
        'label'       => esc_html__( 'Scroll To Top Border Radius','mobile-repair-zone' ),
        'section'     => 'mobile_repair_zone_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    //Woocommerce Single Product page Sidebar
    $wp_customize->add_setting('mobile_repair_zone_woocommerce_single_product_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_woocommerce_single_product_page_sidebar',array(
        'label'          => __( 'Hide Single Product Page Sidebar', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_general_settings',
        'settings'       => 'mobile_repair_zone_woocommerce_single_product_page_sidebar',
        'type'           => 'checkbox',
    )));

  $wp_customize->add_setting('mobile_repair_zone_single_product_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_single_product_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Single Product Page Sidebar','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','mobile-repair-zone'),
            'Right Sidebar' => __('Right Sidebar','mobile-repair-zone'),
        ),
    ) );

    //Woocommerce shop page Sidebar
    $wp_customize->add_setting('mobile_repair_zone_woocommerce_shop_page_sidebar', array(
        'default' => true,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_woocommerce_shop_page_sidebar',array(
        'label'          => __( 'Hide Shop Page Sidebar', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_general_settings',
        'settings'       => 'mobile_repair_zone_woocommerce_shop_page_sidebar',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_shop_page_sidebar_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_shop_page_sidebar_layout',array(
        'type' => 'select',
        'label' => __('Woocommerce Shop Page Sidebar','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_general_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','mobile-repair-zone'),
            'Right Sidebar' => __('Right Sidebar','mobile-repair-zone'),
        ),
    ) );

    $wp_customize->add_setting('mobile_repair_zone_woocommerce_product_sale',array(
        'default' => 'Left',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_woocommerce_product_sale',array(
        'label'       => esc_html__( 'Woocommerce Product Sale Positions','mobile-repair-zone' ),
        'type' => 'radio',
        'section' => 'mobile_repair_zone_general_settings',
        'choices' => array(
            'Right' => __('Right','mobile-repair-zone'),
            'Left' => __('Left','mobile-repair-zone'),
            'Center' => __('Center','mobile-repair-zone')
        ),
    ) );

    $wp_customize->add_setting( 'mobile_repair_zone_woo_product_sale_border_radius', array(
        'default'              => '',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'mobile_repair_zone_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'mobile_repair_zone_woo_product_sale_border_radius', array(
        'label'       => esc_html__( 'Woocommerce Product Sale Border Radius','mobile-repair-zone' ),
        'section'     => 'mobile_repair_zone_general_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    // Related Product
    $wp_customize->add_setting('mobile_repair_zone_woocommerce_related_product_show_hide', array(
        'default' => true,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_woocommerce_related_product_show_hide',array(
        'label'          => __( 'Show / Hide Related product', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_general_settings',
        'settings'       => 'mobile_repair_zone_woocommerce_related_product_show_hide',
        'type'           => 'checkbox',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_general_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_general_setting', array(
        'section'     => 'mobile_repair_zone_general_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    // Top Header
    $wp_customize->add_section('mobile_repair_zone_top_header',array(
        'title' => esc_html__('Top Header','mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_email_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_email_icon',array(
        'label' => esc_html__('Add Email Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_top_header',
        'setting' => 'mobile_repair_zone_email_icon',
        'type'  => 'text',
        'default' => 'fas fa-envelope',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-envelope','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_email',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email'
    ));
    $wp_customize->add_control('mobile_repair_zone_email',array(
        'label' => esc_html__('Add Email','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_top_header',
        'setting' => 'mobile_repair_zone_email',
        'type'  => 'text'
    ));

    $wp_customize->add_section('mobile_repair_zone_top_header',array(
        'title' => esc_html__('Top Header','mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_phone_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_phone_icon',array(
        'label' => esc_html__('Add Phone Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_top_header',
        'setting' => 'mobile_repair_zone_phone_icon',
        'type'  => 'text',
        'default' => 'fas fa-phone',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-phone','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_phone',array(
        'default' => '',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_phone_number'
    ));
    $wp_customize->add_control('mobile_repair_zone_phone',array(
        'label' => esc_html__('Add Phone Number','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_top_header',
        'setting' => 'mobile_repair_zone_phone',
        'type'  => 'text'
    ));

    $wp_customize->add_setting('mobile_repair_zone_location_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_location_icon',array(
        'label' => esc_html__('Add Location Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_top_header',
        'setting' => 'mobile_repair_zone_location_icon',
        'type'  => 'text',
        'default' => 'fas fa-map-marker-alt',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fas fa-map-marker-alt','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_location',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_location',array(
        'label' => esc_html__('Add Location','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_top_header',
        'setting' => 'mobile_repair_zone_location',
        'type'  => 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_header_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_header_setting', array(
        'section'     => 'mobile_repair_zone_top_header',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    // Social Link
    $wp_customize->add_section('mobile_repair_zone_social_link',array(
        'title' => esc_html__('Social Links','mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_socail_icon_setting', array(
        'default' => 0,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_socail_icon_setting',array(
        'label'          => __( 'Enable Disable Social Icon', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_social_link',
        'settings'       => 'mobile_repair_zone_socail_icon_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_facebook_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_facebook_icon',array(
        'label' => esc_html__('Facebook Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_facebook_icon',
        'type'  => 'text',
        'default' => 'fab fa-facebook-f',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-facebook-f','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_facebook_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('mobile_repair_zone_facebook_url',array(
        'label' => esc_html__('Facebook Link','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_facebook_url',
        'type'  => 'url'
    ));


    $wp_customize->add_setting('mobile_repair_zone_twitter_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_twitter_icon',array(
        'label' => esc_html__('Twitter Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_twitter_icon',
        'type'  => 'text',
        'default' => 'fab fa-twitter',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-twitter','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_twitter_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('mobile_repair_zone_twitter_url',array(
        'label' => esc_html__('Twitter Link','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_twitter_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('mobile_repair_zone_intagram_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_intagram_icon',array(
        'label' => esc_html__('Intagram Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_intagram_icon',
        'type'  => 'text',
        'default' => 'fab fa-instagram',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-instagram','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_intagram_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('mobile_repair_zone_intagram_url',array(
        'label' => esc_html__('Intagram Link','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_intagram_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('mobile_repair_zone_linkedin_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_linkedin_icon',array(
        'label' => esc_html__('Linkedin Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_linkedin_icon',
        'type'  => 'text',
        'default' => 'fab fa-linkedin-in',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-linkedin-in','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_linkedin_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('mobile_repair_zone_linkedin_url',array(
        'label' => esc_html__('Linkedin Link','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_linkedin_url',
        'type'  => 'url'
    ));

    $wp_customize->add_setting('mobile_repair_zone_pintrest_icon',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_pintrest_icon',array(
        'label' => esc_html__('Pinterest Icon','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_pintrest_icon',
        'type'  => 'text',
        'default' => 'fab fa-pinterest-p',
        'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v5/search?m=free">Click Here</a> for select icon. for eg:-fab fa-pinterest-p','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_pintrest_url',array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('mobile_repair_zone_pintrest_url',array(
        'label' => esc_html__('Pinterest Link','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_social_link',
        'setting' => 'mobile_repair_zone_pintrest_url',
        'type'  => 'url'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_social_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_social_setting', array(
        'section'     => 'mobile_repair_zone_social_link',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    //Menu Settings
    $wp_customize->add_section('mobile_repair_zone_menu_settings',array(
        'title' => esc_html__('Menus Settings','mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_menu_font_size',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_menu_font_size',array(
        'label' => esc_html__('Menu Font Size','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_menu_settings',
        'type'  => 'number'
    ));

    $wp_customize->add_setting('mobile_repair_zone_nav_menu_text_transform',array(
        'default'=> 'Uppercase',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_nav_menu_text_transform',array(
        'type' => 'radio',
        'label' => esc_html__('Menu Text Transform','mobile-repair-zone'),
        'choices' => array(
            'Uppercase' => __('Uppercase','mobile-repair-zone'),
            'Capitalize' => __('Capitalize','mobile-repair-zone'),
            'Lowercase' => __('Lowercase','mobile-repair-zone'),
        ),
        'section'=> 'mobile_repair_zone_menu_settings',
    ));

    $wp_customize->add_setting('mobile_repair_zone_nav_menu_font_weight',array(
        'default'=> '400',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_nav_menu_font_weight',array(
        'type' => 'number',
        'label' => esc_html__('Menu Font Weight','mobile-repair-zone'),
        'input_attrs' => array(
            'step'             => 100,
            'min'              => 100,
            'max'              => 1000,
        ),
        'section'=> 'mobile_repair_zone_menu_settings',
    ));

    //Slider
    $wp_customize->add_section('mobile_repair_zone_top_slider',array(
        'title' => esc_html__('Slider Option','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_top_slider_setting', array(
        'default' => 0,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_top_slider_setting',array(
        'label'          => __( 'Enable Disable Slider', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_top_slider',
        'settings'       => 'mobile_repair_zone_top_slider_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_slider_title_setting', array(
        'default' => 1,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_slider_title_setting',array(
        'label'          => __( 'Enable Disable Slider Title', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_top_slider',
        'settings'       => 'mobile_repair_zone_slider_title_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_slider_content_setting', array(
        'default' => 1,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_slider_content_setting',array(
        'label'          => __( 'Enable Disable Slider Content', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_top_slider',
        'settings'       => 'mobile_repair_zone_slider_content_setting',
        'type'           => 'checkbox',
    )));

    $wp_customize->add_setting('mobile_repair_zone_slider_button_setting', array(
        'default' => 1,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_slider_button_setting',array(
        'label'          => __( 'Enable Disable Slider Button', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_top_slider',
        'settings'       => 'mobile_repair_zone_slider_button_setting',
        'type'           => 'checkbox',
    )));

    for ( $count = 1; $count <= 3; $count++ ) {
        $wp_customize->add_setting( 'mobile_repair_zone_top_slider_page' . $count, array(
            'default'           => '',
            'sanitize_callback' => 'mobile_repair_zone_sanitize_dropdown_pages'
        ) );
        $wp_customize->add_control( 'mobile_repair_zone_top_slider_page' . $count, array(
            'label'    => __( 'Select Slide Page', 'mobile-repair-zone' ),
            'description' => __('Slider image size (1400 x 860)','mobile-repair-zone'),
            'section'  => 'mobile_repair_zone_top_slider',
            'type'     => 'dropdown-pages'
        ) );
    }

    $wp_customize->add_setting('mobile_repair_zone_slider_content_layout',array(
        'default'=> 'Left',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_slider_content_layout',array(
        'type' => 'radio',
        'label' => esc_html__('Slider Content Layout','mobile-repair-zone'),
        'choices' => array(
            'Left' => __('Left','mobile-repair-zone'),
            'Center' => __('Center','mobile-repair-zone'),
            'Right' => __('Right','mobile-repair-zone'),
        ),
        'section'=> 'mobile_repair_zone_top_slider',
    ));

    $wp_customize->add_setting('mobile_repair_zone_slider_excerpt_length',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_number_range',
        'default'  => 40,
    ));
    $wp_customize->add_control('mobile_repair_zone_slider_excerpt_length',array(
        'label'       => esc_html__('Slider Excerpt Length', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_top_slider',
        'type'        => 'range',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 1,
            'max'  => 50,
        ),
    ));

    //Slider button text
    $wp_customize->add_setting('mobile_repair_zone_slider_button_text',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_slider_button_text',array(
        'label' => __('Slider Button Text','mobile-repair-zone'),
        'section'=> 'mobile_repair_zone_top_slider',
        'type'=> 'text'
    ));

    //Opacity
    $wp_customize->add_setting('mobile_repair_zone_slider_opacity_color',array(
      'default' => '0.9',
      'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));

    $wp_customize->add_control( 'mobile_repair_zone_slider_opacity_color', array(
    'label'       => esc_html__( 'Slider Image Opacity','mobile-repair-zone' ),
    'section'     => 'mobile_repair_zone_top_slider',
    'type'        => 'select',
    'choices' => array(
      '0' =>  esc_attr('0','mobile-repair-zone'),
      '0.1' =>  esc_attr('0.1','mobile-repair-zone'),
      '0.2' =>  esc_attr('0.2','mobile-repair-zone'),
      '0.3' =>  esc_attr('0.3','mobile-repair-zone'),
      '0.4' =>  esc_attr('0.4','mobile-repair-zone'),
      '0.5' =>  esc_attr('0.5','mobile-repair-zone'),
      '0.6' =>  esc_attr('0.6','mobile-repair-zone'),
      '0.7' =>  esc_attr('0.7','mobile-repair-zone'),
      '0.8' =>  esc_attr('0.8','mobile-repair-zone'),
      '0.9' =>  esc_attr('0.9','mobile-repair-zone')
    ),
    ));

    //Slider height
    $wp_customize->add_setting('mobile_repair_zone_slider_img_height',array(
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_slider_img_height',array(
        'label' => __('Slider Height','mobile-repair-zone'),
        'description'   => __('Add the slider height in px(eg. 500px).','mobile-repair-zone'),
        'input_attrs' => array(
            'placeholder' => __( '500px', 'mobile-repair-zone' ),
        ),
        'section'=> 'mobile_repair_zone_top_slider',
        'type'=> 'text'
    ));

     // Pro Version
    $wp_customize->add_setting( 'pro_version_slider_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_slider_setting', array(
        'section'     => 'mobile_repair_zone_top_slider',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    // Team Section
    $wp_customize->add_section('mobile_repair_zone_team_post',array(
        'title' => esc_html__('Team Section','mobile-repair-zone')
    ));

    $wp_customize->add_setting('mobile_repair_zone_team_setting', array(
        'default' => 0,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'mobile_repair_zone_team_setting',array(
        'label'          => __( 'Enable Disable Team', 'mobile-repair-zone' ),
        'section'        => 'mobile_repair_zone_team_post',
        'settings'       => 'mobile_repair_zone_team_setting',
        'type'           => 'checkbox',
        'priority' => 1,
    )));

    $wp_customize->add_setting('mobile_repair_zone_team_heading', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mobile_repair_zone_team_heading', array(
        'label' => __('Add Heading', 'mobile-repair-zone'),
        'section' => 'mobile_repair_zone_team_post',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('mobile_repair_zone_team_heading_text', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mobile_repair_zone_team_heading_text', array(
        'label' => __('Add Text', 'mobile-repair-zone'),
        'section' => 'mobile_repair_zone_team_post',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('mobile_repair_zone_team_btn_text', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mobile_repair_zone_team_btn_text', array(
        'label' => __('Add Button Text', 'mobile-repair-zone'),
        'section' => 'mobile_repair_zone_team_post',
        'priority' => 1,
        'type' => 'text',
    ));

    $wp_customize->add_setting('mobile_repair_zone_team_btn_link', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('mobile_repair_zone_team_btn_link', array(
        'label' => __('Add Button Link', 'mobile-repair-zone'),
        'section' => 'mobile_repair_zone_team_post',
        'priority' => 1,
        'type' => 'url',
    ));

    $wp_customize->add_setting('mobile_repair_zone_team_post_loop',array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('mobile_repair_zone_team_post_loop',array(
        'label' => esc_html__('No of Team post','mobile-repair-zone'),
        'section'   => 'mobile_repair_zone_team_post',
        'type'      => 'number',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 0,
            'max'              => 12,
        ),
    ));

    $team_post_loop = get_theme_mod('mobile_repair_zone_team_post_loop');

    $mobile_repair_zone_args = array('numberposts' => -1);
    $post_list = get_posts($mobile_repair_zone_args);
    $i = 1;
    $pst_sls[]= __('Select','mobile-repair-zone');
    foreach ($post_list as $key => $p_post) {
        $pst_sls[$p_post->ID]=$p_post->post_title;
    }
    for ( $i = 1; $i <= $team_post_loop; $i++ ) {
        $wp_customize->add_setting('mobile_repair_zone_other_team_post_section'.$i,array(
            'sanitize_callback' => 'mobile_repair_zone_sanitize_choices',
        ));
        $wp_customize->add_control('mobile_repair_zone_other_team_post_section'.$i,array(
            'type'    => 'select',
            'choices' => $pst_sls,
            'label' => __('Select Post','mobile-repair-zone'),
            'section' => 'mobile_repair_zone_team_post',
        ));
    }
    wp_reset_postdata();

    // Pro Version
    $wp_customize->add_setting( 'pro_version_team_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_team_setting', array(
        'section'     => 'mobile_repair_zone_team_post',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    // Footer
    $wp_customize->add_section('mobile_repair_zone_site_footer_section', array(
        'title' => esc_html__('Footer', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_show_hide_footer',array(
        'default' => true,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control('mobile_repair_zone_show_hide_footer',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Footer','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_site_footer_section',
        'priority' => 1,
    ));

    $wp_customize->add_setting('mobile_repair_zone_footer_bg_image',array(
        'default'   => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'mobile_repair_zone_footer_bg_image',array(
        'label' => __('Footer Background Image','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_site_footer_section',
        'priority' => 1,
    )));

    $wp_customize->add_setting('mobile_repair_zone_footer_bg_image_position',array(
        'default'=> 'scroll',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_footer_bg_image_position',array(
        'type' => 'select',
        'label' => __('Footer Background Image Position','mobile-repair-zone'),
        'choices' => array(
            'fixed' => __('fixed','mobile-repair-zone'),
            'scroll' => __('scroll','mobile-repair-zone'),
        ),
        'section'=> 'mobile_repair_zone_site_footer_section',
    ));

    $wp_customize->add_setting('mobile_repair_zone_footer_widget_heading_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_footer_widget_heading_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading Alignment','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_site_footer_section',
        'choices' => array(
            'Left' => __('Left','mobile-repair-zone'),
            'Center' => __('Center','mobile-repair-zone'),
            'Right' => __('Right','mobile-repair-zone')
        ),
    ) );

    $wp_customize->add_setting('mobile_repair_zone_footer_widget_content_alignment',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_footer_widget_content_alignment',array(
        'type' => 'select',
        'label' => __('Footer Widget Content Alignment','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_site_footer_section',
        'choices' => array(
            'Left' => __('Left','mobile-repair-zone'),
            'Center' => __('Center','mobile-repair-zone'),
            'Right' => __('Right','mobile-repair-zone')
        ),
    ) );

    $wp_customize->add_setting('mobile_repair_zone_show_hide_copyright',array(
        'default' => true,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control('mobile_repair_zone_show_hide_copyright',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Copyright','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_site_footer_section',
    ));

    $wp_customize->add_setting('mobile_repair_zone_footer_text_setting', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mobile_repair_zone_footer_text_setting', array(
        'label' => __('Replace the footer text', 'mobile-repair-zone'),
        'section' => 'mobile_repair_zone_site_footer_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('mobile_repair_zone_copyright_content_alignment',array(
        'default' => 'Right',
        'transport' => 'refresh',
        'sanitize_callback' => 'mobile_repair_zone_sanitize_choices'
    ));
    $wp_customize->add_control('mobile_repair_zone_copyright_content_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Content Alignment','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_site_footer_section',
        'choices' => array(
            'Left' => __('Left','mobile-repair-zone'),
            'Center' => __('Center','mobile-repair-zone'),
            'Right' => __('Right','mobile-repair-zone')
        ),
    ) );

    $wp_customize->add_setting('mobile_repair_zone_copyright_background_color', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mobile_repair_zone_copyright_background_color', array(
        'label'    => __('Copyright Background Color', 'mobile-repair-zone'),
        'section'  => 'mobile_repair_zone_site_footer_section',
    )));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_footer_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_footer_setting', array(
        'section'     => 'mobile_repair_zone_site_footer_section',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    // Post Settings
     $wp_customize->add_section('mobile_repair_zone_post_settings',array(
        'title' => esc_html__('Post Settings','mobile-repair-zone'),
        'priority'   =>40,
    ));

    $wp_customize->add_setting('mobile_repair_zone_post_page_title',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_post_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Title', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable title on post page.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_post_page_thumb',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_post_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Thumbnail', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable thumbnail on post page.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting( 'mobile_repair_zone_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'mobile_repair_zone_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'mobile_repair_zone_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Post Page Image Border Radius','mobile-repair-zone' ),
        'section'     => 'mobile_repair_zone_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('mobile_repair_zone_post_page_btn',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_post_page_btn',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Button', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable button on post page.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_post_page_content',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Content', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable content on post page.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_post_page_excerpt_length',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_number_range',
        'default'           => 30,
    ));
    $wp_customize->add_control('mobile_repair_zone_post_page_excerpt_length',array(
        'label'       => esc_html__('Post Page Excerpt Length', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ));

    $wp_customize->add_setting('mobile_repair_zone_post_page_excerpt_suffix',array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '[...]',
    ));
    $wp_customize->add_control('mobile_repair_zone_post_page_excerpt_suffix',array(
        'type'        => 'text',
        'label'       => esc_html__('Post Page Excerpt Suffix', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('For Ex. [...], etc', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_post_page_pagination',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_post_page_pagination',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Post Page Pagination', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable pagination on post page.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_single_post_thumb',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_single_post_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Thumbnail', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable post thumbnail on single post.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting( 'mobile_repair_zone_single_post_page_image_border_radius', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'mobile_repair_zone_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'mobile_repair_zone_single_post_page_image_border_radius', array(
        'label'       => esc_html__( 'Single Post Page Image Border Radius','mobile-repair-zone' ),
        'section'     => 'mobile_repair_zone_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting( 'mobile_repair_zone_single_post_page_image_box_shadow', array(
        'default'              => '0',
        'transport'            => 'refresh',
        'sanitize_callback'    => 'mobile_repair_zone_sanitize_number_range'
    ) );
    $wp_customize->add_control( 'mobile_repair_zone_single_post_page_image_box_shadow', array(
        'label'       => esc_html__( 'Single Post Page Image Box Shadow','mobile-repair-zone' ),
        'section'     => 'mobile_repair_zone_post_settings',
        'type'        => 'range',
        'input_attrs' => array(
            'step'             => 1,
            'min'              => 1,
            'max'              => 50,
        ),
    ) );

    $wp_customize->add_setting('mobile_repair_zone_single_post_title',array(
            'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_single_post_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Title', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable title on single post.', 'mobile-repair-zone'),
    ));

     $wp_customize->add_setting('mobile_repair_zone_single_post_page_content',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_single_post_page_content',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Page Content', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable content on single post page.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_single_post_tags',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_single_post_tags',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Post Tags', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_post_settings',
        'description' => esc_html__('Check this box to enable tags on single post.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_single_post_navigation_show_hide',array(
        'default' => true,
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox'
    ));
    $wp_customize->add_control('mobile_repair_zone_single_post_navigation_show_hide',array(
        'type' => 'checkbox',
        'label' => __('Show / Hide Post Navigation','mobile-repair-zone'),
        'section' => 'mobile_repair_zone_post_settings',
    ));

    $wp_customize->add_setting('mobile_repair_zone_single_post_comment_title',array(
        'default'=> 'Leave a Reply',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('mobile_repair_zone_single_post_comment_title',array(
        'label' => __('Add Comment Title','mobile-repair-zone'),
        'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'mobile-repair-zone' ),
        ),
        'section'=> 'mobile_repair_zone_post_settings',
        'type'=> 'text'
    ));

    $wp_customize->add_setting('mobile_repair_zone_single_post_comment_btn_text',array(
        'default'=> 'Post Comment',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('mobile_repair_zone_single_post_comment_btn_text',array(
        'label' => __('Add Comment Button Text','mobile-repair-zone'),
        'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'mobile-repair-zone' ),
        ),
        'section'=> 'mobile_repair_zone_post_settings',
        'type'=> 'text'
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_post_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_post_setting', array(
        'section'     => 'mobile_repair_zone_post_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));

    // Page Settings
    $wp_customize->add_section('mobile_repair_zone_single_page_settings',array(
        'title' => esc_html__('Page Settings','mobile-repair-zone'),
        'priority'   =>50,
    ));

    $wp_customize->add_setting('mobile_repair_zone_single_page_title',array(
            'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
            'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_single_page_title',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Title', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_single_page_settings',
        'description' => esc_html__('Check this box to enable title on single page.', 'mobile-repair-zone'),
    ));

    $wp_customize->add_setting('mobile_repair_zone_single_page_thumb',array(
        'sanitize_callback' => 'mobile_repair_zone_sanitize_checkbox',
        'default'           => 1,
    ));
    $wp_customize->add_control('mobile_repair_zone_single_page_thumb',array(
        'type'        => 'checkbox',
        'label'       => esc_html__('Enable Single Page Thumbnail', 'mobile-repair-zone'),
        'section'     => 'mobile_repair_zone_single_page_settings',
        'description' => esc_html__('Check this box to enable page thumbnail on single page.', 'mobile-repair-zone'),
    ));

    // Pro Version
    $wp_customize->add_setting( 'pro_version_single_page_setting', array(
        'sanitize_callback' => 'Mobile_Repair_Zone_sanitize_custom_control'
    ));
    $wp_customize->add_control( new Mobile_Repair_Zone_Customize_Pro_Version ( $wp_customize,'pro_version_single_page_setting', array(
        'section'     => 'mobile_repair_zone_single_page_settings',
        'type'        => 'pro_options',
        'label'       => esc_html__( 'Customizer Options', 'mobile-repair-zone' ),
        'description' => esc_url( MOBILE_REPAIR_ZONE_URL ),
        'priority'    => 100
    )));
}
add_action('customize_register', 'mobile_repair_zone_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mobile_repair_zone_customize_partial_blogname(){
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mobile_repair_zone_customize_partial_blogdescription(){
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mobile_repair_zone_customize_preview_js(){
    wp_enqueue_script('mobile-repair-zone-customizer', esc_url(get_template_directory_uri()) . '/assets/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'mobile_repair_zone_customize_preview_js');

/*
** Load dynamic logic for the customizer controls area.
*/
function mobile_repair_zone_panels_js() {
    wp_enqueue_style( 'mobile-repair-zone-customizer-layout-css', get_theme_file_uri( '/assets/css/customizer-layout.css' ) );
    wp_enqueue_script( 'mobile-repair-zone-customize-layout', get_theme_file_uri( '/assets/js/customize-layout.js' ), array(), '1.2', true );
}
add_action( 'customize_controls_enqueue_scripts', 'mobile_repair_zone_panels_js' );

