<?php

require_once get_template_directory() . '/inc/php/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {
	$source = 'https://stage.t42it.info/wp-content/plugins/';

	$plugins = [
		[
			'name'     => 'Kirki',
			'slug'     => 'kirki',
			'required' => true,
		],
		[
			'name'     => 'Advanced Custom Fields PRO',
			'slug'     => 'advanced-custom-fields-pro',
			'source'   => esc_url( $source . 'advanced-custom-fields-pro.zip' ),
			'required' => true
		],
		[
			'name'     => 'WP Rocket',
			'slug'     => 'wp-rocket',
			'source'   => esc_url( $source . 'wp-rocket.zip' ),
			'required' => false
		],
		[
			'name'     => 'Slots Launch',
			'slug'     => 'slotslaunch-sc',
			'source'   => esc_url( $source . 'slotslaunch-sc.zip' ),
			'required' => false
		],
		[
			'name'     => 'SC Addons Helpers',
			'slug'     => 'sc-addons-helpers',
			'source'   => esc_url( $source . 'sc-addons-helpers.zip' ),
			'required' => false
		],
		[
			'name'     => 'SC SeoTech Demo Content',
			'slug'     => 'sc-seotech-demo-content',
			'source'   => esc_url( $source . 'sc-seotech-demo-content.zip' ),
			'required' => false
		],
		[
			'name' => 'Yoast SEO',
			'slug' => 'wordpress-seo'
		],
		[
			'name' => 'Classic Editor',
			'slug' => 'classic-editor'
		],
		[
			'name' => 'Cyr-To-Lat',
			'slug' => 'cyr2lat'
		],
		[
			'name'     => 'Svg Support',
			'slug'     => 'svg-support',
			'required' => false,
		],
		[
			'name'     => 'WPvivid Backup Plugin',
			'slug'     => 'wpvivid-backuprestore',
			'required' => false,
		],
		[
			'name'     => 'WPS Hide Login',
			'slug'     => 'wps-hide-login',
			'required' => false,
		]
	];

	$config = [
		'id'           => 'my_theme',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	];

	tgmpa( $plugins, $config );
}
