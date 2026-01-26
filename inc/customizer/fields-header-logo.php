<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * Tablet Logo
 */
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'image',
	'settings'  => 'sc_logo_tablet',
	'label'     => esc_html__( 'Tablet Logo', 'seotech' ),
	'section'   => 'header_logo_section',
	'default'   => '',
	'choices'   => [
		'save_as' => 'id',
	],
	'transport' => 'refresh',
] );

/**
 * Mobile Logo
 */
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'image',
	'settings'  => 'sc_logo_mobile',
	'label'     => esc_html__( 'Mobile Logo', 'seotech' ),
	'section'   => 'header_logo_section',
	'default'   => '',
	'choices'   => [
		'save_as' => 'id',
	],
	'transport' => 'refresh',
] );