<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'sc_theme_config', [
	'type'         => 'repeater',
	'label'        => esc_html__( 'Partners', 'seotech' ),
	'section'      => 'footer_partners_section',
	'row_label'    => [
		'type'  => 'text',
		'value' => esc_html__( 'Partner', 'seotech' ),
	],
	'button_label' => esc_html__( 'Add new Partner', 'seotech' ),
	'settings'     => 'sc_footer_partners',
	'default'      => [],
	'transport'    => 'refresh',
	'fields'       => [
		'partner_logo' => [
			'type'    => 'image',
			'label'   => esc_html__( 'Partner Logo', 'seotech' ),
			'default' => '',
			'choices' => [
				'save_as' => 'id',
			],
		],
		'partner_link' => [
			'type'    => 'link',
			'label'   => esc_html__( 'Partner Link', 'seotech' ),
			'default' => '#',
		],
	],
] );
