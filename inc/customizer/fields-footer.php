<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

// Footer background color
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'footer_background_color',
	'label'     => esc_html__( 'Footer Background Color', 'seotech' ),
	'section'   => 'footer_section',
	'default'   => '#030508',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--footer-background-color',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'footer_text_color',
	'label'     => esc_html__( 'Footer Text Color', 'seotech' ),
	'section'   => 'footer_section',
	'default'   => '#a9bdd1',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--footer-text-color',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'footer_copy_color',
	'label'     => esc_html__( 'Footer Copyright Color', 'seotech' ),
	'section'   => 'footer_section',
	'default'   => '#456487',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--footer-copy-color',
		],
	],
] );

// Footer Logo
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'image',
	'settings'  => 'sc_footer_logo',
	'label'     => esc_html__( 'Footer Logo', 'seotech' ),
	'section'   => 'footer_section',
	'default'   => '',
	'choices'   => [
		'save_as' => 'id',
	],
	'transport' => 'refresh',
] );

// Footer Description
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'textarea',
	'settings'  => 'sc_footer_description',
	'label'     => esc_html__( 'Footer Description (first row)', 'seotech' ),
	'section'   => 'footer_section',
	'default'   => esc_html__( 'Ми підтримуємо відповідальну гру ...', 'seotech' ),
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'sc_footer_copyright',
	'label'     => esc_html__( 'Footer Copyright', 'seotech' ),
	'section'   => 'footer_section',
	'default'   => esc_html__( '2025 © Company.name', 'seotech' ),
	'transport' => 'auto',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'textarea',
	'settings'  => 'sc_footer_disclaimer',
	'label'     => esc_html__( 'Footer Disclaimer', 'seotech' ),
	'section'   => 'footer_section',
	'default'   => esc_html__( 'На цьому інформаційному ресурсі...', 'seotech' ),
	'transport' => 'refresh',
] );
