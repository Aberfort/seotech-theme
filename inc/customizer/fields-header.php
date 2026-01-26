<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

// Header background color
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'header_background_color',
	'label'     => esc_html__( 'Header Background Color', 'seotech' ),
	'section'   => 'header_section',
	'default'   => '#030508',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--header-background-color',
		],
	],
] );

// Sticky header
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'switch',
	'settings' => 'header_sticky',
	'label'    => esc_html__( 'Sticky Header', 'seotech' ),
	'section'  => 'header_section',
	'default'  => false,
	'choices'  => [
		'on'  => esc_html__( 'Enable', 'seotech' ),
		'off' => esc_html__( 'Disable', 'seotech' ),
	],
] );

// Show login button
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'toggle',
	'settings' => 'show_login_btn',
	'label'    => esc_html__( 'Show Login Button', 'seotech' ),
	'section'  => 'header_section',
	'default'  => true,
] );

// Show registration button
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'toggle',
	'settings' => 'show_registration_btn',
	'label'    => esc_html__( 'Show Registration Button', 'seotech' ),
	'section'  => 'header_section',
	'default'  => true,
] );

// Show login button on mobile
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'toggle',
	'settings' => 'show_login_btn_mobile',
	'label'    => esc_html__( 'Show Login Button Mobile', 'seotech' ),
	'section'  => 'header_section',
	'default'  => true,
] );

// Show registration button on mobile
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'toggle',
	'settings' => 'show_registration_btn_mobile',
	'label'    => esc_html__( 'Show Registration Button Mobile', 'seotech' ),
	'section'  => 'header_section',
	'default'  => true,
] );

// Login Button Type
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'radio-buttonset',
	'settings' => 'sc_login_btn_type',
	'label'    => esc_html__( 'Login Button Type', 'seotech' ),
	'section'  => 'header_section',
	'default'  => 'default',
	'choices'  => [
		'primary'   => esc_html__( 'Primary', 'seotech' ),
		'secondary' => esc_html__( 'Secondary', 'seotech' ),
		'default'   => esc_html__( 'Default', 'seotech' ),
		'bordered'  => esc_html__( 'Bordered', 'seotech' ),
	],
	'transport'=> 'refresh',
] );

// Register Button Type
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'radio-buttonset',
	'settings' => 'sc_register_btn_type',
	'label'    => esc_html__( 'Register Button Type', 'seotech' ),
	'section'  => 'header_section',
	'default'  => 'secondary',
	'choices'  => [
		'primary'   => esc_html__( 'Primary', 'seotech' ),
		'secondary' => esc_html__( 'Secondary', 'seotech' ),
		'default'   => esc_html__( 'Default', 'seotech' ),
		'bordered'  => esc_html__( 'Bordered', 'seotech' ),
	],
	'transport'=> 'refresh',
] );

// Login Button Text
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'sc_login_btn_text',
	'label'     => esc_html__( 'Login Button Text', 'seotech' ),
	'section'   => 'header_section',
	'default'   => esc_html__( 'Login', 'seotech' ),
	'transport' => 'refresh',
] );

// Login Button URL
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'url',
	'settings'  => 'sc_login_btn_url',
	'label'     => esc_html__( 'Login Button URL', 'seotech' ),
	'section'   => 'header_section',
	'default'   => '#',
	'transport' => 'refresh',
] );

// Register Button Text
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'sc_register_btn_text',
	'label'     => esc_html__( 'Register Button Text', 'seotech' ),
	'section'   => 'header_section',
	'default'   => esc_html__( 'Register', 'seotech' ),
	'transport' => 'refresh',
] );

// Register Button URL
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'url',
	'settings'  => 'sc_register_btn_url',
	'label'     => esc_html__( 'Register Button URL', 'seotech' ),
	'section'   => 'header_section',
	'default'   => '#',
	'transport' => 'refresh',
] );
