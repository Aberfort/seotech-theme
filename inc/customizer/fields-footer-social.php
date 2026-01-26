<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

require_once get_template_directory() . '/inc/customizer/theme-icons.php';

$all_icons    = sc_get_social_icons_library();
$icon_choices = [
	'' => esc_html__( 'Select Icon', 'seotech' ),
];
foreach ( $all_icons as $slug => $svg ) {
	$icon_choices[ $slug ] = ucfirst( $slug );
}

// Footer Social Repeater
Kirki::add_field( 'sc_theme_config', [
	'type'         => 'repeater',
	'label'        => esc_html__( 'Social Icons', 'seotech' ),
	'section'      => 'footer_social_section',
	'priority'     => 10,
	'row_label'    => [
		'type'  => 'field',
		'field' => 'icon_label',
	],
	'button_label' => esc_html__( 'Add new Social Icon', 'seotech' ),
	'settings'     => 'sc_social_icons_fixed',
	'default'      => [],
	'fields'       => [
		'icon_label'        => [
			'type'    => 'text',
			'label'   => esc_html__( 'Icon Name', 'seotech' ),
			'default' => '',
		],
		'icon_slug'         => [
			'type'    => 'select',
			'label'   => esc_html__( 'Select Icon', 'seotech' ),
			'default' => '',
			'choices' => $icon_choices,
		],
		'icon_color'        => [
			'type'    => 'color',
			'label'   => esc_html__( 'Icon Color', 'seotech' ),
			'default' => '#A9BDD1',
		],
		'icon_color_bg'     => [
			'type'    => 'color',
			'label'   => esc_html__( 'Icon Color Background', 'seotech' ),
			'default' => '#0D1826',
		],
		'icon_color_border' => [
			'type'    => 'color',
			'label'   => esc_html__( 'Icon Color Border', 'seotech' ),
			'default' => '#2E4A6B',
		],
		'icon_link'         => [
			'type'    => 'link',
			'label'   => esc_html__( 'Social Link', 'seotech' ),
			'default' => '#',
		],
	],
] );
