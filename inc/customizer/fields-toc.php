<?php
/**
 * fields-toc.php
 *
 * Fields for styling tables using Kirki.
 */

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'radio-buttonset',
	'settings' => 'toc_view_mode',
	'label'    => esc_html__( 'TOC View Mode', 'seotech' ),
	'section'  => 'global_toc_section',
	'default'  => 'chips',
	'choices'  => [
		'chips'   => esc_html__( 'Chips', 'seotech' ),
		'list'    => esc_html__( 'List', 'seotech' ),
		'bullet'  => esc_html__( 'Bullet', 'seotech' ),
		'numbers' => esc_html__( 'Numbers', 'seotech' ),
	],
] );


/*==============================
= TOC Background for Items
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'color',
	'settings'  => 'toc_item_bg_color',
	'label'     => esc_html__( 'Toc Item Background Color', 'seotech' ),
	'section'   => 'global_toc_section',
	'default'   => '#14273e',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'background-color',
		],
	],
] );

/*==============================
= TOC Border
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'dimension',
	'settings'  => 'toc_border_radius',
	'label'     => esc_html__( 'Toc Border Radius', 'seotech' ),
	'section'   => 'global_toc_section',
	'default'   => '12',
	'transport' => 'auto',
	'output'    => [
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'border-radius',
			'units'    => 'px',
		],
	],
] );

/*==============================
= TOC Heading Typography
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'typography',
	'settings'  => 'toc_heading_typography',
	'label'     => esc_html__( 'Toc Heading Typography', 'seotech' ),
	'section'   => 'global_toc_section',
	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => '600',
		'font-size'      => '26px',
		'line-height'    => '1.3',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
		'color'          => '#e4e9f1',
	],
	'transport' => 'refresh',
	'output'    => [
		[
			'element'  => '.sc-toc-title',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => '.sc-toc-title',
			'property' => 'font-size',
			'choice'   => 'font-size',
			'units'    => 'px',
		],
		[
			'element'  => '.sc-toc-title',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => '.sc-toc-title',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => '.sc-toc-title',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => '.sc-toc-title, .sc-toc-toggle',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );

/*==============================
= Toc Item Typography
==============================*/
Kirki::add_field( 'sc_theme_config', [
	'type'      => 'typography',
	'settings'  => 'toc_content_typography',
	'label'     => esc_html__( 'Toc Item Typography', 'seotech' ),
	'section'   => 'global_toc_section',
	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'line-height'    => '1.4',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
		'color'          => '#a9bdd1',
	],
	'transport' => 'refresh',
	'output'    => [
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'font-size',
			'choice'   => 'font-size',
			'units'    => 'px',
		],
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => '.sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-chips .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-list .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-bullet .sc-toc-chip, .sc-toc-chips-wrapper.sc-toc-mode-numbers .sc-toc-chip',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );
