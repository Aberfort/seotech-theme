<?php
/**
 * fields-typography.php
 *
 */

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/*==================================================
= BODY
==================================================*/

/**
 * 1) BODY - Typography
 */
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'typography',
	'settings' => 'body_typography',
	'label'    => esc_html__( 'Body Typography', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'color'          => '#fff',
	],
	'transport' => 'refresh',

	'choices' => [
		'google' => [
			'load_all_variants' => true,
		],
	],
	'output'  => [
		// font-family
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		// line-height
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		// letter-spacing
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		// text-transform
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		// color
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );

/**
 * BODY FONT-SIZE - DESKTOP
 */
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'body_font_size_desktop',
	'label'    => esc_html__( 'Body Font Size (Desktop)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 16,
	'choices'   => [
		'min'  => 8,
		'max'  => 40,
		'step' => 1,
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

/**
 * BODY FONT-SIZE - TABLET
 */
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'body_font_size_tablet',
	'label'    => esc_html__( 'Body Font Size (Tablet ≤1024px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 15,
	'choices'   => [
		'min'  => 8,
		'max'  => 40,
		'step' => 1,
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 1024px)',
		],
	],
] );

/**
 * BODY FONT-SIZE - MOBILE
 */
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'body_font_size_mobile',
	'label'    => esc_html__( 'Body Font Size (Mobile ≤768px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 14, // px
	'choices'   => [
		'min'  => 8,
		'max'  => 40,
		'step' => 1,
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'body, p, ul li, ol li, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 768px)',
		],
	],
] );

/*==================================================
= H1
==================================================*/

/**
 * H1 Typography
 */
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'typography',
	'settings' => 'h1_typography',
	'label'    => esc_html__( 'H1 Typography', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => '700',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'color'          => '#fff',
	],
	'choices'   => [
		'google' => [ 'load_all_variants' => true ],
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h1',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => 'h1',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => 'h1',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => 'h1',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => 'h1',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );

/**
 * H1 Font-Size: Desktop / Tablet / Mobile
 */

// Desktop
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h1_font_size_desktop',
	'label'    => esc_html__( 'H1 Font Size (Desktop)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 36,
	'choices'   => [
		'min'  => 8,
		'max'  => 120,
		'step' => 1,
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h1',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

// Tablet
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h1_font_size_tablet',
	'label'    => esc_html__( 'H1 Font Size (Tablet ≤1024px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 30,
	'choices'   => [
		'min'  => 8,
		'max'  => 120,
		'step' => 1,
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h1',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 1024px)',
		],
	],
] );

// Mobile
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h1_font_size_mobile',
	'label'    => esc_html__( 'H1 Font Size (Mobile ≤768px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 24,
	'choices'   => [
		'min'  => 8,
		'max'  => 120,
		'step' => 1,
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h1',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 768px)',
		],
	],
] );


/*==================================================
= H2
==================================================*/

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'typography',
	'settings' => 'h2_typography',
	'label'    => esc_html__( 'H2 Typography', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => '700',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'color'          => '#fff',
	],
	'choices'   => [
		'google' => [ 'load_all_variants' => true ],
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h2',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => 'h2',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => 'h2',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => 'h2',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => 'h2',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );

// H2 Font Size: Desktop/Tablet/Mobile
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h2_font_size_desktop',
	'label'    => esc_html__( 'H2 Font Size (Desktop)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 32,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h2',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h2_font_size_tablet',
	'label'    => esc_html__( 'H2 Font Size (Tablet ≤1024px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 28,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h2',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 1024px)',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h2_font_size_mobile',
	'label'    => esc_html__( 'H2 Font Size (Mobile ≤768px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 24,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h2',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 768px)',
		],
	],
] );


/*==================================================
= H3
==================================================*/

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'typography',
	'settings' => 'h3_typography',
	'label'    => esc_html__( 'H3 Typography', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => '700',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'color'          => '#fff',
	],
	'choices'   => [
		'google' => [ 'load_all_variants' => true ],
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h3',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => 'h3',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => 'h3',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => 'h3',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => 'h3',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );

// H3 Font Size: Desktop/Tablet/Mobile
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h3_font_size_desktop',
	'label'    => esc_html__( 'H3 Font Size (Desktop)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 26,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h3',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h3_font_size_tablet',
	'label'    => esc_html__( 'H3 Font Size (Tablet ≤1024px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 22,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h3',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 1024px)',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h3_font_size_mobile',
	'label'    => esc_html__( 'H3 Font Size (Mobile ≤768px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 18,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h3',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 768px)',
		],
	],
] );


/*==================================================
= H4
==================================================*/

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'typography',
	'settings' => 'h4_typography',
	'label'    => esc_html__( 'H4 Typography', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => [
		'font-family'    => 'Open Sans',
		'variant'        => '700',
		'line-height'    => '1.2',
		'letter-spacing' => '0',
		'text-transform' => 'none',
		'color'          => '#fff',
	],
	'choices'   => [
		'google' => [ 'load_all_variants' => true ],
	],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h4',
			'property' => 'font-family',
			'choice'   => 'font-family',
		],
		[
			'element'  => 'h4',
			'property' => 'line-height',
			'choice'   => 'line-height',
		],
		[
			'element'  => 'h4',
			'property' => 'letter-spacing',
			'choice'   => 'letter-spacing',
			'units'    => 'px',
		],
		[
			'element'  => 'h4',
			'property' => 'text-transform',
			'choice'   => 'text-transform',
		],
		[
			'element'  => 'h4',
			'property' => 'color',
			'choice'   => 'color',
		],
	],
] );

// H4 Font Size: Desktop/Tablet/Mobile
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h4_font_size_desktop',
	'label'    => esc_html__( 'H4 Font Size (Desktop)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 24,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'  => 'h4',
			'property' => 'font-size',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h4_font_size_tablet',
	'label'    => esc_html__( 'H4 Font Size (Tablet ≤1024px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 20,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h4',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 1024px)',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'h4_font_size_mobile',
	'label'    => esc_html__( 'H4 Font Size (Mobile ≤768px)', 'seotech' ),
	'section'  => 'global_typography_section',

	'default'   => 18,
	'choices'   => [ 'min' => 8, 'max' => 120, 'step' => 1 ],
	'transport' => 'refresh',

	'output' => [
		[
			'element'     => 'h4',
			'property'    => 'font-size',
			'units'       => 'px',
			'media_query' => '@media (max-width: 768px)',
		],
	],
] );



/** UL, OL */
Kirki::add_field('sc_theme_config', [
    'type' => 'image',
    'settings' => 'ul_ol_custom_marker',
    'label' => esc_html__('Custom ul/ol marker', 'seotech'),
    'section' => 'global_typography_section',
    'default' => '',
    'transport' => 'refresh',
    'output' => [
        [
            'element' => 'ol li:before, ul li:before',
            'property' => 'background-image',
        ],
    ],
]);