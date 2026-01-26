<?php
// fields-colors.php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'primary_color',
	'label'     => esc_html__( 'Primary color', 'seotech' ),
	'section'   => 'global_colors_section',
	'default'   => '#FFBD00',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--primary-color',
		],
	],
]);

// Background Color
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'body_background_color',
	'label'     => esc_html__( 'Body Background Color', 'seotech' ),
	'section'   => 'global_colors_section',
	'default'   => '#030508',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--body-background-color',
		],
	],
] );

// Borders Color
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'borders_color',
	'label'     => esc_html__( 'Borders Color', 'seotech' ),
	'section'   => 'global_colors_section',
	'default'   => '#1c3654',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--borders-color',
		],
	],
]);

// Scroll Color
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'scroll_color',
	'label'     => esc_html__( 'Scroll Color', 'seotech' ),
	'section'   => 'global_colors_section',
	'default'   => '#1C3654',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--scroll-color',
		],
	],
]);

// Scroll Bg Color
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'scroll_bg_color',
	'label'     => esc_html__( 'Scroll Bg Color', 'seotech' ),
	'section'   => 'global_colors_section',
	'default'   => '#414349',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--scroll-bg-color',
		],
	],
]);
