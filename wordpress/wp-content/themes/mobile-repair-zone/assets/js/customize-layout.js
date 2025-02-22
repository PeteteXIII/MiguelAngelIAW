(function( $ ) {
	wp.customize.bind( 'ready', function() {

		var optPrefix = '#customize-control-mobile_repair_zone_options-';
		
		// Label
		function mobile_repair_zone_customizer_label( id, title ) {

			// Colors

			if ( id === 'mobile_repair_zone_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'mobile_repair_zone_email_icon' || id === 'mobile_repair_zone_phone_icon' || id === 'mobile_repair_zone_location_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'mobile_repair_zone_preloader_hide' || id === 'mobile_repair_zone_sticky_header' || id === 'mobile_repair_zone_scroll_hide' || id === 'mobile_repair_zone_woocommerce_single_product_page_sidebar') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Woocommerce product sale Setting

			if ( id === 'mobile_repair_zone_woocommerce_product_sale' || id === 'mobile_repair_zone_woocommerce_related_product_show_hide') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'mobile_repair_zone_facebook_icon' || id === 'mobile_repair_zone_twitter_icon' || id === 'mobile_repair_zone_intagram_icon'|| id === 'mobile_repair_zone_linkedin_icon'|| id === 'mobile_repair_zone_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}


			// Slider

			if ( id === 'mobile_repair_zone_top_slider_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
			// Team

			if ( id === 'mobile_repair_zone_team_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'mobile_repair_zone_show_hide_footer' || id === 'mobile_repair_zone_show_hide_copyright') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'mobile_repair_zone_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Comment Setting

			if ( id === 'mobile_repair_zone_single_post_comment_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'mobile_repair_zone_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'mobile_repair_zone_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-mobile_repair_zone_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}

		// Colors
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_theme_color', 'Theme Color' );
		mobile_repair_zone_customizer_label( 'background_color', 'Colors' );
		mobile_repair_zone_customizer_label( 'background_image', 'Image' );

		// Site Identity
		mobile_repair_zone_customizer_label( 'custom_logo', 'Logo Setup' );
		mobile_repair_zone_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_email_icon', 'Email' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_phone_icon', 'Phone' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_location_icon', 'Location' );

		// General Setting
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_preloader_hide', 'Preloader' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_sticky_header', 'Sticky Header' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_scroll_hide', 'Scroll To Top' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_woocommerce_single_product_page_sidebar', 'woocommerce Setting' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_woocommerce_product_sale', 'Woocommerce Product Sale' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_woocommerce_related_product_show_hide', 'Woocommerce Related Products' );

		// Social Icon
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_facebook_icon', 'Facebook' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_twitter_icon', 'Twitter' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_intagram_icon', 'Intagram' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_linkedin_icon', 'Linkedin' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_pintrest_icon', 'Pintrest' );

		//Slider
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_top_slider_setting', 'Slider' );

		//Header Image
		mobile_repair_zone_customizer_label( 'header_image', 'Header Image' );

		//Team
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_team_setting', 'Team' );

		//Footer
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_show_hide_footer', 'Footer' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_show_hide_copyright', 'Copyright' );

		//Single Post Setting
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_single_post_thumb', 'Single Post Setting' );
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_single_post_comment_title', 'Single Post Comment' );

		// Post Setting
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_post_page_title', 'Post Setting' );

		// Page Setting
		mobile_repair_zone_customizer_label( 'mobile_repair_zone_single_page_title', 'Page Setting' );
	
	});

})( jQuery );
