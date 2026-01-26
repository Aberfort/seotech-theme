<?php
// fields-links.php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

// Links Color
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'links_color',
	'label'     => esc_html__( 'Links color', 'seotech' ),
	'section'   => 'global_links_section',
	'default'   => '#A9BDD1',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--links-color',
		],
	],
]);

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'links_hover_color',
	'label'     => esc_html__( 'Links hover color', 'seotech' ),
	'section'   => 'global_links_section',
	'default'   => '#FFBD00',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--links-hover-color',
		],
	],
]);

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'radio-buttonset',
	'settings'  => 'links_text_decoration',
	'label'     => esc_html__( 'Links Underline', 'seotech' ),
	'section'   => 'global_links_section',
	'default'   => 'none',
	'choices'   => [
		'underline' => esc_html__( 'Underline', 'seotech' ),
		'none'      => esc_html__( 'No Underline', 'seotech' ),
	],
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => 'a',
			'property' => 'text-decoration',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'radio-buttonset',
	'settings'  => 'links_border',
	'label'     => esc_html__( 'Links Border', 'seotech' ),
	'section'   => 'global_links_section',
	'default'   => 'none',
	'choices'   => [
		'1px solid currentColor' => esc_html__( 'Bordered', 'seotech' ),
		'none'                  => esc_html__( 'No Border', 'seotech' ),
	],
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => 'p a',
			'property' => 'border',
		],
	],
] );
