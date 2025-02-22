<?php
/**
 * Displays top navigation
 *
 * @package Mobile Repair Services
 */

$mobile_repair_zone_sticky_header = get_theme_mod('mobile_repair_zone_sticky_header');
    $mobile_repair_zone_data_sticky = "false";
    if ($mobile_repair_zone_sticky_header) {
    $mobile_repair_zone_data_sticky = "true";
    }
?>
<div class="navigation_header py-2" data-sticky="<?php echo esc_attr($mobile_repair_zone_data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-4 col-sm-4 col-4 align-self-center">
                <div class="toggle-nav mobile-menu">
                    <button onclick="mobile_repair_zone_openNav()"><i class="fas fa-th"></i></button>
                </div>
                <div id="mySidenav" class="nav sidenav">
                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'mobile-repair-services' ); ?>">
                        <?php {
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'menu', 
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                    'fallback_cb' => 'wp_page_menu',
                                )
                            );
                        } ?>
                    </nav>
                    <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="mobile_repair_zone_closeNav()"><i class="fas fa-times"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-8 align-self-center">
               <?php if(get_theme_mod('mobile_repair_zone_socail_icon_setting') != ''){ ?>
                <div class="social-links text-end">
                  <?php if(get_theme_mod('mobile_repair_zone_facebook_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('mobile_repair_zone_facebook_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('mobile_repair_zone_facebook_icon') ); ?>"></i></a>
                  <?php }?>
                  <?php if(get_theme_mod('mobile_repair_zone_twitter_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('mobile_repair_zone_twitter_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('mobile_repair_zone_twitter_icon') ); ?>"></i></a>
                  <?php }?>
                  <?php if(get_theme_mod('mobile_repair_zone_intagram_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('mobile_repair_zone_intagram_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('mobile_repair_zone_intagram_icon') ); ?>"></i></a>
                  <?php }?>
                  <?php if(get_theme_mod('mobile_repair_zone_linkedin_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('mobile_repair_zone_linkedin_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('mobile_repair_zone_linkedin_icon') ); ?>"></i></a>
                  <?php }?>
                  <?php if(get_theme_mod('mobile_repair_zone_pintrest_url') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('mobile_repair_zone_pintrest_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('mobile_repair_zone_pintrest_icon') ); ?>"></i></a>
                  <?php }?>
                </div>
               <?php }?>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-6 align-self-center text-center">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="cart_box">
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','mobile-repair-services' ); ?>"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                <?php }?>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-6 align-self-center text-center">
                <span class="search-box"><a href="#"><i class="fas fa-search"></i></a></span>
            </div>
        </div>
        <div class="serach_outer">
            <div class="serach_inner">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</div>
