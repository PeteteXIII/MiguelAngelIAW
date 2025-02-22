<?php

    $mobile_repair_zone_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $mobile_repair_zone_scroll_position = get_theme_mod( 'mobile_repair_zone_scroll_top_position','Right');
    if($mobile_repair_zone_scroll_position == 'Right'){
        $mobile_repair_zone_theme_css .='#button{';
            $mobile_repair_zone_theme_css .='right: 20px;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_scroll_position == 'Left'){
        $mobile_repair_zone_theme_css .='#button{';
            $mobile_repair_zone_theme_css .='left: 20px;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_scroll_position == 'Center'){
        $mobile_repair_zone_theme_css .='#button{';
            $mobile_repair_zone_theme_css .='right: 50%;left: 50%;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $mobile_repair_zone_scroll_to_top_border_radius = get_theme_mod('mobile_repair_zone_scroll_to_top_border_radius');
    $mobile_repair_zone_scroll_bg_color = get_theme_mod('mobile_repair_zone_scroll_bg_color');
    $mobile_repair_zone_scroll_color = get_theme_mod('mobile_repair_zone_scroll_color');
    $mobile_repair_zone_scroll_font_size = get_theme_mod('mobile_repair_zone_scroll_font_size');
    if($mobile_repair_zone_scroll_to_top_border_radius != false || $mobile_repair_zone_scroll_bg_color != false || $mobile_repair_zone_scroll_color != false || $mobile_repair_zone_scroll_font_size != false){
        $mobile_repair_zone_theme_css .='#colophon a#button{';
            $mobile_repair_zone_theme_css .='border-radius: '.esc_attr($mobile_repair_zone_scroll_to_top_border_radius).'px; background-color: '.esc_attr($mobile_repair_zone_scroll_bg_color).'; color: '.esc_attr($mobile_repair_zone_scroll_color).' !important; font-size: '.esc_attr($mobile_repair_zone_scroll_font_size).'px;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Slider Opacity -------------------*/

    $mobile_repair_zone_theme_lay = get_theme_mod( 'mobile_repair_zone_slider_opacity_color','0.9');
    if($mobile_repair_zone_theme_lay == '0'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.1'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.1';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.2'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.2';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.3'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.3';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.4'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.4';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.5'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.5';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.6'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.6';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.7'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.7';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.8'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.8';
        $mobile_repair_zone_theme_css .='}';
        }else if($mobile_repair_zone_theme_lay == '0.9'){
        $mobile_repair_zone_theme_css .='.slider-box img{';
            $mobile_repair_zone_theme_css .='opacity:0.9';
        $mobile_repair_zone_theme_css .='}';
        }

    /*---------------------------Slider Height ------------*/

    $mobile_repair_zone_slider_img_height = get_theme_mod('mobile_repair_zone_slider_img_height');
    if($mobile_repair_zone_slider_img_height != false){
        $mobile_repair_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $mobile_repair_zone_theme_css .='height: '.esc_attr($mobile_repair_zone_slider_img_height).';';
        $mobile_repair_zone_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $mobile_repair_zone_single_post_navigation_show_hide = get_theme_mod('mobile_repair_zone_single_post_navigation_show_hide',true);
    if($mobile_repair_zone_single_post_navigation_show_hide != true){
        $mobile_repair_zone_theme_css .='.nav-links{';
            $mobile_repair_zone_theme_css .='display: none;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $mobile_repair_zone_product_sale = get_theme_mod( 'mobile_repair_zone_woocommerce_product_sale','Right');
    if($mobile_repair_zone_product_sale == 'Right'){
        $mobile_repair_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $mobile_repair_zone_theme_css .='left: auto; right: 15px;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_product_sale == 'Left'){
        $mobile_repair_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $mobile_repair_zone_theme_css .='left: 15px; right: auto;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_product_sale == 'Center'){
        $mobile_repair_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $mobile_repair_zone_theme_css .='right: 50%;left: 50%;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Border Radius -------------------*/

    $mobile_repair_zone_woo_product_sale_border_radius = get_theme_mod('mobile_repair_zone_woo_product_sale_border_radius');
    if($mobile_repair_zone_woo_product_sale_border_radius != false){
        $mobile_repair_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $mobile_repair_zone_theme_css .='border-radius: '.esc_attr($mobile_repair_zone_woo_product_sale_border_radius).'px;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Woocommerce Related Products -------------------*/

    $mobile_repair_zone_woocommerce_related_product_show_hide = get_theme_mod('mobile_repair_zone_woocommerce_related_product_show_hide',true);
    if($mobile_repair_zone_woocommerce_related_product_show_hide != true){
        $mobile_repair_zone_theme_css .='.related.products{';
            $mobile_repair_zone_theme_css .='display: none;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $mobile_repair_zone_single_post_page_image_box_shadow = get_theme_mod('mobile_repair_zone_single_post_page_image_box_shadow',0);
    if($mobile_repair_zone_single_post_page_image_box_shadow != false){
        $mobile_repair_zone_theme_css .='.single-post .entry-header img{';
            $mobile_repair_zone_theme_css .='box-shadow: '.esc_attr($mobile_repair_zone_single_post_page_image_box_shadow).'px '.esc_attr($mobile_repair_zone_single_post_page_image_box_shadow).'px '.esc_attr($mobile_repair_zone_single_post_page_image_box_shadow).'px #cccccc;';
        $mobile_repair_zone_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $mobile_repair_zone_single_post_page_image_border_radius = get_theme_mod('mobile_repair_zone_single_post_page_image_border_radius', 0);
    if($mobile_repair_zone_single_post_page_image_border_radius != false){
        $mobile_repair_zone_theme_css .='.single-post .entry-header img{';
            $mobile_repair_zone_theme_css .='border-radius: '.esc_attr($mobile_repair_zone_single_post_page_image_border_radius).'px;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $mobile_repair_zone_footer_bg_image_position = get_theme_mod( 'mobile_repair_zone_footer_bg_image_position','scroll');
    if($mobile_repair_zone_footer_bg_image_position == 'fixed'){
        $mobile_repair_zone_theme_css .='#colophon, .footer-widgets{';
            $mobile_repair_zone_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $mobile_repair_zone_theme_css .='}';
    }elseif ($mobile_repair_zone_footer_bg_image_position == 'scroll'){
        $mobile_repair_zone_theme_css .='#colophon, .footer-widgets{';
            $mobile_repair_zone_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $mobile_repair_zone_footer_widget_heading_alignment = get_theme_mod( 'mobile_repair_zone_footer_widget_heading_alignment','Left');
    if($mobile_repair_zone_footer_widget_heading_alignment == 'Left'){
        $mobile_repair_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $mobile_repair_zone_theme_css .='text-align: left;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_footer_widget_heading_alignment == 'Center'){
        $mobile_repair_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $mobile_repair_zone_theme_css .='text-align: center;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_footer_widget_heading_alignment == 'Right'){
        $mobile_repair_zone_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $mobile_repair_zone_theme_css .='text-align: right;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $mobile_repair_zone_footer_bg_image = get_theme_mod('mobile_repair_zone_footer_bg_image');
    if($mobile_repair_zone_footer_bg_image != false){
        $mobile_repair_zone_theme_css .='#colophon, .footer-widgets{';
            $mobile_repair_zone_theme_css .='background: url('.esc_attr($mobile_repair_zone_footer_bg_image).');';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $mobile_repair_zone_copyright_background_color = get_theme_mod('mobile_repair_zone_copyright_background_color');
    if($mobile_repair_zone_copyright_background_color != false){
        $mobile_repair_zone_theme_css .='.footer_info{';
            $mobile_repair_zone_theme_css .='background-color: '.esc_attr($mobile_repair_zone_copyright_background_color).' !important;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Featured Image Border Radius -------------------*/

    $mobile_repair_zone_post_page_image_border_radius = get_theme_mod('mobile_repair_zone_post_page_image_border_radius', 0);
    if($mobile_repair_zone_post_page_image_border_radius != false){
        $mobile_repair_zone_theme_css .='.article-box img{';
            $mobile_repair_zone_theme_css .='border-radius: '.esc_attr($mobile_repair_zone_post_page_image_border_radius).'px;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $mobile_repair_zone_logo_title_color = get_theme_mod('mobile_repair_zone_logo_title_color');
    if($mobile_repair_zone_logo_title_color != false){
        $mobile_repair_zone_theme_css .='p.site-title a, .navbar-brand a{';
            $mobile_repair_zone_theme_css .='color: '.esc_attr($mobile_repair_zone_logo_title_color).' !important;';
        $mobile_repair_zone_theme_css .='}';
    }

    $mobile_repair_zone_logo_tagline_color = get_theme_mod('mobile_repair_zone_logo_tagline_color');
    if($mobile_repair_zone_logo_tagline_color != false){
        $mobile_repair_zone_theme_css .='.logo p.site-description, .navbar-brand p{';
            $mobile_repair_zone_theme_css .='color: '.esc_attr($mobile_repair_zone_logo_tagline_color).'  !important;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $mobile_repair_zone_footer_widget_content_alignment = get_theme_mod( 'mobile_repair_zone_footer_widget_content_alignment','Left');
    if($mobile_repair_zone_footer_widget_content_alignment == 'Left'){
        $mobile_repair_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $mobile_repair_zone_theme_css .='text-align: left;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_footer_widget_content_alignment == 'Center'){
        $mobile_repair_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $mobile_repair_zone_theme_css .='text-align: center;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_footer_widget_content_alignment == 'Right'){
        $mobile_repair_zone_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $mobile_repair_zone_theme_css .='text-align: right;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $mobile_repair_zone_copyright_content_alignment = get_theme_mod( 'mobile_repair_zone_copyright_content_alignment','Right');
    if($mobile_repair_zone_copyright_content_alignment == 'Left'){
        $mobile_repair_zone_theme_css .='.footer-menu-left{';
        $mobile_repair_zone_theme_css .='text-align: left;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_copyright_content_alignment == 'Center'){
        $mobile_repair_zone_theme_css .='.footer-menu-left{';
            $mobile_repair_zone_theme_css .='text-align: center;';
        $mobile_repair_zone_theme_css .='}';
    }else if($mobile_repair_zone_copyright_content_alignment == 'Right'){
        $mobile_repair_zone_theme_css .='.footer-menu-left{';
            $mobile_repair_zone_theme_css .='text-align: right;';
        $mobile_repair_zone_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $mobile_repair_zone_nav_menu = get_theme_mod( 'mobile_repair_zone_nav_menu_text_transform','Uppercase');
    if($mobile_repair_zone_nav_menu == 'Capitalize'){
        $mobile_repair_zone_theme_css .='.main-navigation .menu > li > a{';
            $mobile_repair_zone_theme_css .='text-transform:Capitalize;';
        $mobile_repair_zone_theme_css .='}';
    }
    if($mobile_repair_zone_nav_menu == 'Lowercase'){
        $mobile_repair_zone_theme_css .='.main-navigation .menu > li > a{';
            $mobile_repair_zone_theme_css .='text-transform:Lowercase;';
        $mobile_repair_zone_theme_css .='}';
    }
    if($mobile_repair_zone_nav_menu == 'Uppercase'){
        $mobile_repair_zone_theme_css .='.main-navigation .menu > li > a{';
            $mobile_repair_zone_theme_css .='text-transform:Uppercase;';
        $mobile_repair_zone_theme_css .='}';
    }

    $mobile_repair_zone_menu_font_size = get_theme_mod( 'mobile_repair_zone_menu_font_size');
    if($mobile_repair_zone_menu_font_size != ''){
        $mobile_repair_zone_theme_css .='.main-navigation .menu > li > a{';
            $mobile_repair_zone_theme_css .='font-size: '.esc_attr($mobile_repair_zone_menu_font_size).'px;';
        $mobile_repair_zone_theme_css .='}';
    }

    $mobile_repair_zone_nav_menu_font_weight = get_theme_mod( 'mobile_repair_zone_nav_menu_font_weight',400);
    if($mobile_repair_zone_menu_font_size != ''){
        $mobile_repair_zone_theme_css .='.main-navigation .menu > li > a{';
            $mobile_repair_zone_theme_css .='font-weight: '.esc_attr($mobile_repair_zone_nav_menu_font_weight).';';
        $mobile_repair_zone_theme_css .='}';
    }

    /*------------------ Slider CSS -------------------*/

    $mobile_repair_zone_slider_content_layout = get_theme_mod( 'mobile_repair_zone_slider_content_layout','Left');
    if($mobile_repair_zone_slider_content_layout == 'Left'){
        $mobile_repair_zone_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $mobile_repair_zone_theme_css .='text-align : left;';
        $mobile_repair_zone_theme_css .='}';
    }
    if($mobile_repair_zone_slider_content_layout == 'Center'){
        $mobile_repair_zone_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $mobile_repair_zone_theme_css .='text-align : center;';
        $mobile_repair_zone_theme_css .='}';
    }
    if($mobile_repair_zone_slider_content_layout == 'Right'){
        $mobile_repair_zone_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $mobile_repair_zone_theme_css .='text-align : right;';
        $mobile_repair_zone_theme_css .='}';
    }