<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'typography',
	'settings'  => 'footer_menu_typography',
	'label'     => esc_html__( 'Footer Menu Typography', 'seotech' ),
	'section'   => 'footer_menu_typography_section',
	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.4',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
		'color'          => '#A9BDD1',
	],
	'transport' => 'auto',
	'output'    => [
		[
			'element' => '.footer-menu-list li a',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'footer_menu_hover_color',
	'label'     => esc_html__( 'Footer Menu Hover Color', 'seotech' ),
	'section'   => 'footer_menu_typography_section',
	'default'   => '#FFBD00',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--footer-menu-hover-color',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'typography',
	'settings'  => 'footer_title_typography',
	'label'     => esc_html__( 'Footer Title Typography', 'seotech' ),
	'section'   => 'footer_menu_typography_section',
	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => 'bold',
		'font-size'      => '18px',
		'line-height'    => '1.3',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
		'color'          => '#FCFCFD',
	],
	'transport' => 'auto',
	'output'    => [
		[
			'element' => '.footer__title',
		],
	],
] );
