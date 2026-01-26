<?php

use builderScripts\inc\AdderBundles;

function add_critical() {

	$source = new AdderBundles();
	$source->print_critical_style(get_the_ID());

}

add_action('wp_head', 'add_critical');

function add_source() {

	$source = new AdderBundles();
	$source->print_source('css', get_the_ID() );
	$source->print_source('js', get_the_ID() );

}

add_action('wp_head', 'add_source');