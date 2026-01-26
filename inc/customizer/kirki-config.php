<?php
// kirki-config.php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config( 'sc_theme_config', [
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
] );
