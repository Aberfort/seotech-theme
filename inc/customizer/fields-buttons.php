<?php
// fields-buttons.php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

function sc_add_button_color_field( $typeName, $state, $label, $default, $priority = 50 ) {
	$setting_id = "btn_{$typeName}";
	if ( $state ) {
		$setting_id .= "_{$state}";
	}
	$setting_id .= "_color";

	$property_name = "--btn-{$typeName}";
	if ( $state ) {
		$property_name .= "-{$state}";
	}
	$property_name .= "-color";

	Kirki::add_field( 'sc_theme_config', [
		'type'      => 'color',
		'settings'  => $setting_id,
		'label'     => esc_html( $label ),
		'section'   => 'buttons_section',
		'default'   => $default,
		'transport' => 'auto',
		'priority'  => $priority,
		'output'    => [
			[
				'element'  => ':root',
				'property' => $property_name,
			],
		],
	] );
}

// Divider for Primary Buttons
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'custom',
	'settings' => 'btn_primary_heading',
	'label'    => '',
	'section'  => 'buttons_section',
	'default'  => '<hr><h3>' . esc_html__( 'Primary Button Settings', 'seotech' ) . '</h3>',
	'priority' => 10,
] );

// PRIMARY BUTTON FIELDS
sc_add_button_color_field( 'primary', '', 'Primary BG Color', '#FFBD00', 11 );
sc_add_button_color_field( 'primary_text', '', 'Primary Text Color', '#0D1826', 12 );

sc_add_button_color_field( 'primary', 'hover', 'Primary BG Hover', '#CC9700', 13 );
sc_add_button_color_field( 'primary_text', 'hover', 'Primary Text Hover', '#0D1826', 14 );

sc_add_button_color_field( 'primary', 'focus', 'Primary BG Focus', '#CC9700', 15 );
sc_add_button_color_field( 'primary_text', 'focus', 'Primary Text Focus', '#0D1826', 16 );

sc_add_button_color_field( 'primary', 'active', 'Primary BG Active', '#997100', 17 );
sc_add_button_color_field( 'primary_text', 'active', 'Primary Text Active', '#0D1826', 18 );

sc_add_button_color_field( 'primary', 'disabled', 'Primary BG Disabled', '#656A75', 19 );
sc_add_button_color_field( 'primary_text', 'disabled', 'Primary Text Disabled', '#414349', 20 );


// Divider for Secondary Buttons
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'custom',
	'settings' => 'btn_secondary_heading',
	'label'    => '',
	'section'  => 'buttons_section',
	'default'  => '<hr><h3>' . esc_html__( 'Secondary Button Settings', 'seotech' ) . '</h3>',
	'priority' => 30,
] );

// SECONDARY BUTTON FIELDS
sc_add_button_color_field( 'secondary', '', 'Secondary BG Color', '#FC1418', 31 );
sc_add_button_color_field( 'secondary_text', '', 'Secondary Text Color', '#FCFCFD', 32 );

sc_add_button_color_field( 'secondary', 'hover', 'Secondary BG Hover', '#D90306', 33 );
sc_add_button_color_field( 'secondary_text', 'hover', 'Secondary Text Hover', '#FCFCFD', 34 );

sc_add_button_color_field( 'secondary', 'focus', 'Secondary BG Focus', '#A60205', 35 );
sc_add_button_color_field( 'secondary_text', 'focus', 'Secondary Text Focus', '#FCFCFD', 36 );

sc_add_button_color_field( 'secondary', 'active', 'Secondary BG Active', '#A60205', 37 );
sc_add_button_color_field( 'secondary_text', 'active', 'Secondary Text Active', '#FCFCFD', 38 );

sc_add_button_color_field( 'secondary', 'disabled', 'Secondary BG Disabled', '#656A75', 39 );
sc_add_button_color_field( 'secondary_text', 'disabled', 'Secondary Text Disabled', '#414349', 40 );


// Divider for Default Buttons
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'custom',
	'settings' => 'btn_default_heading',
	'label'    => '',
	'section'  => 'buttons_section',
	'default'  => '<hr><h3>' . esc_html__( 'Default Button Settings', 'seotech' ) . '</h3>',
	'priority' => 50,
] );

// DEFAULT BUTTON FIELDS
sc_add_button_color_field( 'default', '', 'Default BG Color', '#2E4A6B', 51 );
sc_add_button_color_field( 'default_text', '', 'Default Text Color', '#FCFCFD', 52 );

sc_add_button_color_field( 'default', 'hover', 'Default BG Hover', '#14273E', 53 );
sc_add_button_color_field( 'default_text', 'hover', 'Default Text Hover', '#FCFCFD', 54 );

sc_add_button_color_field( 'default', 'focus', 'Default BG Focus', '#14273E', 55 );
sc_add_button_color_field( 'default_text', 'focus', 'Default Text Focus', '#FCFCFD', 56 );

sc_add_button_color_field( 'default', 'active', 'Default BG Active', '#1C3654', 57 );
sc_add_button_color_field( 'default_text', 'active', 'Default Text Active', '#FCFCFD', 58 );

sc_add_button_color_field( 'default', 'disabled', 'Default BG Disabled', '#656A75', 59 );
sc_add_button_color_field( 'default_text', 'disabled', 'Default Text Disabled', '#414349', 60 );


// Divider for Bordered Buttons
Kirki::add_field( 'sc_theme_config', [
	'type'     => 'custom',
	'settings' => 'btn_bordered_heading',
	'label'    => '',
	'section'  => 'buttons_section',
	'default'  => '<hr><h3>' . esc_html__( 'Bordered Button Settings', 'seotech' ) . '</h3>',
	'priority' => 70,
] );

// BORDERED BUTTON FIELDS
sc_add_button_color_field( 'bordered', '', 'Bordered Text/Border Color', '#FFBD00', 71 );
sc_add_button_color_field( 'bordered', 'hover', 'Bordered Hover Text/Border', '#CC9700', 72 );
sc_add_button_color_field( 'bordered', 'focus', 'Bordered Focus Text/Border', '#CC9700', 73 );
sc_add_button_color_field( 'bordered', 'active', 'Bordered Active Text/Border', '#997100', 74 );
sc_add_button_color_field( 'bordered', 'disabled', 'Bordered Disabled Text/Border', '#1C1B1E', 75 );
