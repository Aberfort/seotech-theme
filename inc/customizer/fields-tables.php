<?php
/**
 * fields-tables.php
 *
 * Fields for styling tables using Kirki.
 */

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/*==============================
= Table Background for Headings
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'table_heading_bg_color',
	'label'     => esc_html__( 'Table Heading Background Color', 'seotech' ),
	'section'   => 'global_tables_section',
	'default'   => '#6B8DB31A',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => 'table thead th',
			'property' => 'background-color',
		],
	],
] );

/*==============================
= Overall Table Background Color
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'table_overall_bg_color',
	'label'     => esc_html__( 'Table Overall Background Color', 'seotech' ),
	'section'   => 'global_tables_section',
	'default'   => '#060f2100',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => 'table',
			'property' => 'background-color',
		],
	],
] );

/*==============================
= Table Border
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'dimension',
	'settings'  => 'table_border_radius',
	'label'     => esc_html__( 'Table Border Radius', 'seotech' ),
	'section'   => 'global_tables_section',
	'default'   => '16',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => '.my-table-wrapper',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'table_border_color_outside',
	'label'     => esc_html__( 'Table Border Color Outside', 'seotech' ),
	'section'   => 'global_tables_section',
	'default'   => '#6B8DB3',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => '.my-table-wrapper',
			'property' => 'border-color',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'table_border_color_inside',
	'label'     => esc_html__( 'Table Border Color Inside', 'seotech' ),
	'section'   => 'global_tables_section',
	'default'   => '#14273E',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => 'table th, table td',
			'property' => 'border-color',
		],
	],
] );

/*==============================
= Table Heading Typography
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'typography',
	'settings'  => 'table_heading_typography',
	'label'     => esc_html__( 'Table Heading Typography', 'seotech' ),
	'section'   => 'global_tables_section',
	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => '700',
		'font-size'      => '16px',
		'line-height'    => '1.4',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
		'color'          => '#E4E9F1',
	],
	'transport' => 'refresh',
	'output'    => [
		[
			'element'  => 'table thead th',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => 'table thead th',
			'property' => 'font-size',
			'choice'   => 'font-size',
			'units'    => 'px',
		],
		[
			'element'  => 'table thead th',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => 'table thead th',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => 'table thead th',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => 'table thead th',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );

/*==============================
= Table Content Typography
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'typography',
	'settings'  => 'table_content_typography',
	'label'     => esc_html__( 'Table Content Typography', 'seotech' ),
	'section'   => 'global_tables_section',
	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.4',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
		'color'          => '#88A2BF',
	],
	'transport' => 'refresh',
	'output'    => [
		[
			'element'  => 'table tbody, table tbody td, table tbody th',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => 'table tbody, table tbody td, table tbody th',
			'property' => 'font-size',
			'choice'   => 'font-size',
			'units'    => 'px',
		],
		[
			'element'  => 'table tbody, table tbody td, table tbody th',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => 'table tbody, table tbody td, table tbody th',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => 'table tbody, table tbody td, table tbody th',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => 'table tbody, table tbody td, table tbody th',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );
