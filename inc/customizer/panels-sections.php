<?php
// panels-sections.php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_panel( 'global_styles_panel', [
	'priority' => 10,
	'title'    => esc_html__( 'Global Styles', 'seotech' ),
] );

Kirki::add_section( 'global_colors_section', [
	'title'    => esc_html__( 'Colors', 'seotech' ),
	'panel'    => 'global_styles_panel',
	'priority' => 10,
] );

Kirki::add_section( 'global_typography_section', [
	'title'    => esc_html__( 'Typography', 'seotech' ),
	'panel'    => 'global_styles_panel',
	'priority' => 20,
] );

Kirki::add_section( 'global_layout_section', [
	'title'    => esc_html__( 'Layout', 'seotech' ),
	'panel'    => 'global_styles_panel',
	'priority' => 30,
] );

Kirki::add_section( 'global_links_section', [
	'title'    => esc_html__( 'Links', 'seotech' ),
	'panel'    => 'global_styles_panel',
	'priority' => 40,
] );

Kirki::add_section( 'global_tables_section', [
	'title'    => esc_html__( 'Tables', 'seotech' ),
	'panel'    => 'global_styles_panel',
	'priority' => 50,
] );

Kirki::add_section( 'global_toc_section', [
	'title'    => esc_html__( 'TOC', 'seotech' ),
	'panel'    => 'global_styles_panel',
	'priority' => 60,
] );

Kirki::add_panel( 'header_panel', [
	'priority'    => 15,
	'title'       => esc_html__( 'Header', 'seotech' ),
	'description' => esc_html__( 'Settings for site header', 'seotech' ),
] );

Kirki::add_section( 'header_section', [
	'title'    => esc_html__( 'Main Header Options', 'seotech' ),
	'panel'    => 'header_panel',
	'priority' => 10,
] );

Kirki::add_section( 'header_menu_section', [
	'title'    => esc_html__( 'Main Header Menu Options', 'seotech' ),
	'panel'    => 'header_panel',
	'priority' => 15,
] );

Kirki::add_section( 'header_logo_section', [
	'title'    => esc_html__( 'Main Header Logo', 'seotech' ),
	'panel'    => 'header_panel',
	'priority' => 20,
] );

Kirki::add_panel( 'footer_panel', [
	'priority'    => 15,
	'title'       => esc_html__( 'Footer', 'seotech' ),
	'description' => esc_html__( 'Settings for site footer', 'seotech' ),
] );

Kirki::add_section( 'footer_section', [
	'title'    => esc_html__( 'Main Footer Options', 'seotech' ),
	'panel'    => 'footer_panel',
	'priority' => 10,
] );

Kirki::add_section( 'footer_menu_title_section', [
	'title'    => esc_html__( 'Footer Menu', 'seotech' ),
	'panel'    => 'footer_panel',
	'description' => esc_html__( 'If the title is empty, the menu does not show.' , 'seotech' ),
	'priority' => 15,
] );

Kirki::add_section( 'footer_menu_typography_section', [
	'title'    => esc_html__( 'Footer Typography', 'seotech' ),
	'panel'    => 'footer_panel',
	'priority' => 20,
] );

Kirki::add_section( 'footer_app_section', [
	'title'    => esc_html__( 'Footer App Section', 'seotech' ),
	'panel'    => 'footer_panel',
	'priority' => 25,
] );

Kirki::add_section( 'footer_social_section', [
	'title'    => esc_html__( 'Footer Social Section', 'seotech' ),
	'panel'    => 'footer_panel',
	'priority' => 30,
] );

Kirki::add_section( 'footer_partners_section', [
	'title'    => esc_html__( 'Footer Partners Section', 'seotech' ),
	'panel'    => 'footer_panel',
	'priority' => 35,
] );

Kirki::add_panel( 'buttons_panel', [
	'priority'    => 25,
	'title'       => esc_html__( 'Buttons', 'seotech' ),
	'description' => esc_html__( 'Settings for site buttons', 'seotech' ),
] );

Kirki::add_section( 'buttons_section', [
	'title'    => esc_html__( 'Main Buttons Options', 'seotech' ),
	'panel'    => 'buttons_panel',
	'priority' => 10,
] );
