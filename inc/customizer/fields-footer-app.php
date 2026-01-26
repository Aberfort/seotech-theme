<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'sc_footer_app_heading',
	'label'     => esc_html__( 'App Column Heading', 'seotech' ),
	'section'   => 'footer_app_section',
	'default'   => esc_html__( 'Завантажити додаток', 'seotech' ),
	'transport' => 'refresh',
] );

// App Store logo + link
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'link',
	'settings' => 'sc_footer_appstore_link',
	'label'    => esc_html__( 'App Store Link', 'seotech' ),
	'section'  => 'footer_app_section',
	'default'  => '#',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'image',
	'settings'  => 'sc_footer_appstore_logo',
	'label'     => esc_html__( 'App Store Logo', 'seotech' ),
	'section'   => 'footer_app_section',
	'default'   => '',
	'choices'   => [
		'save_as' => 'id',
	],
	'transport' => 'refresh',
] );

// Google Play logo + link
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'link',
	'settings' => 'sc_footer_playstore_link',
	'label'    => esc_html__( 'Google Play Link', 'seotech' ),
	'section'  => 'footer_app_section',
	'default'  => '#',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'image',
	'settings'  => 'sc_footer_playstore_logo',
	'label'     => esc_html__( 'Google Play Logo', 'seotech' ),
	'section'   => 'footer_app_section',
	'default'   => '',
	'choices'   => [
		'save_as' => 'id',
	],
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'textarea',
	'settings'  => 'sc_footer_app_text',
	'label'     => esc_html__( 'App Column Text', 'seotech' ),
	'section'   => 'footer_app_section',
	'default'   => esc_html__( 'Участь в азартних іграх може викликати ...', 'seotech' ),
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'select',
	'settings'  => 'footer_app_btn_type',
	'label'     => esc_html__( 'Footer App Button Type', 'seotech' ),
	'section'   => 'footer_app_section',
	'default'   => 'primary',
	'choices'   => [
		'primary'   => esc_html__( 'Primary', 'seotech' ),
		'secondary' => esc_html__( 'Secondary', 'seotech' ),
		'default'   => esc_html__( 'Default', 'seotech' ),
		'bordered'  => esc_html__( 'Bordered', 'seotech' ),
	],
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'footer_app_btn_title',
	'label'     => esc_html__( 'Footer App Button Title', 'seotech' ),
	'section'   => 'footer_app_section',
	'default'   => esc_html__( 'Download Now', 'seotech' ),
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'footer_app_btn_url',
	'label'     => esc_html__( 'Footer App Button Link', 'seotech' ),
	'section'   => 'footer_app_section',
	'default'   => '#',
	'transport' => 'refresh',
] );
