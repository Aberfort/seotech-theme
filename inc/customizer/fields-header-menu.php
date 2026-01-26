<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'slider',
	'settings'  => 'header_menu_font_size',
	'label'     => esc_html__( 'Menu Font Size', 'seotech' ),
	'section'   => 'header_menu_section',
	'default'   => 20,
	'choices'   => [
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	],
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--header-menu-font-size',
			'units'    => 'px',
		],
	],
] );

/**
 * Menu Link Color
 */
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'header_menu_color',
	'label'     => esc_html__( 'Menu Link Color', 'seotech' ),
	'section'   => 'header_menu_section',
	'default'   => '#fff',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => '.site-header .main-nav__list a, .wpml-ls ul li a',
			'property' => '--header-menu-color',
		],
	],
] );

/**
 * Menu Hover Color
 */
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'header_menu_hover_color',
	'label'     => esc_html__( 'Menu Hover Color', 'seotech' ),
	'section'   => 'header_menu_section',
	'default'   => '#ffffff',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--header-menu-hover-color',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'image',
	'settings'  => 'sc_menu_item_icon',
	'label'     => esc_html__( 'Menu Item Icon', 'seotech' ),
	'section'   => 'header_menu_section',
	'default'   => get_stylesheet_directory_uri() . '/ing/img/default-menu-icon.png',
	'choices'   => [
		'save_as' => 'id',
	],
	'transport' => 'refresh',
] );

/**
 * Dropdown Menu Background
 */
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'dropdown_bg_color',
	'label'     => esc_html__( 'Dropdown Menu Background', 'seotech' ),
	'section'   => 'header_menu_section',
	'default'   => '#0D1826',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--dropdown-bg-color',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'dropdown_bg_hover_color',
	'label'     => esc_html__( 'Dropdown Menu Hover Background', 'seotech' ),
	'section'   => 'header_menu_section',
	'default'   => '#14273E',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => ':root',
			'property' => '--dropdown-bg-hover-color',
		],
	],
] );