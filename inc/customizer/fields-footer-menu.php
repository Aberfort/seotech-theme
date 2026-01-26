<?php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

$all_wp_menus = function_exists( 'sc_get_all_wp_menus' ) ? sc_get_all_wp_menus() : [];

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'sc_footer_menu_1_title',
	'label'     => esc_html__( 'First Menu Title', 'seotech' ),
	'section'   => 'footer_menu_title_section',
	'default'   => esc_html__( 'Про нас', 'seotech' ),
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'select',
	'settings'  => 'sc_footer_menu_1_id',
	'label'     => esc_html__( 'Select First Menu', 'seotech' ),
	'section'   => 'footer_menu_title_section',
	'choices'   => $all_wp_menus,
	'default'   => '',
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'sc_footer_menu_2_title',
	'label'     => esc_html__( 'Second Menu Title', 'seotech' ),
	'section'   => 'footer_menu_title_section',
	'default'   => esc_html__( 'Бонусні програми', 'seotech' ),
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'select',
	'settings'  => 'sc_footer_menu_2_id',
	'label'     => esc_html__( 'Select Second Menu', 'seotech' ),
	'section'   => 'footer_menu_title_section',
	'choices'   => $all_wp_menus,
	'default'   => '',
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'text',
	'settings'  => 'sc_footer_menu_3_title',
	'label'     => esc_html__( 'Third Menu Title', 'seotech' ),
	'section'   => 'footer_menu_title_section',
	'default'   => esc_html__( 'Інформація', 'seotech' ),
	'transport' => 'refresh',
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'select',
	'settings'  => 'sc_footer_menu_3_id',
	'label'     => esc_html__( 'Select Third Menu', 'seotech' ),
	'section'   => 'footer_menu_title_section',
	'choices'   => $all_wp_menus,
	'default'   => '',
	'transport' => 'refresh',
] );
