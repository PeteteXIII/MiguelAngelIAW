<?php

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function mobile_repair_zone_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Magnify – Suggestive Search', 'mobile-repair-zone' ),
			'slug'             => 'magnify-suggestive-search',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'mobile_repair_zone_register_recommended_plugins' );