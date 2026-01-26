<?php

require_once get_stylesheet_directory() . '/vendor/autoload.php';
require_once get_stylesheet_directory() . '/builder-scripts/inc/adder-source.php';
require_once get_stylesheet_directory() . '/inc/php/lib/breadcrumbs.php';
require_once get_stylesheet_directory() . '/inc/php/acf/option-pages.php';
require_once get_stylesheet_directory() . '/inc/php/acf/acf_adding_json_settings.php';
require_once get_stylesheet_directory() . '/inc/php/custom-types/custom-types.php';
require_once get_stylesheet_directory() . '/inc/php/function/function.php';
require_once get_stylesheet_directory() . '/inc/php/shortcodes/shortcodes.php';
require_once get_stylesheet_directory() . '/inc/php/tgm-plugin-activation/tgm-config.php';
require_once get_stylesheet_directory() . '/inc/customizer/customizer.php';
require_once get_stylesheet_directory() . '/inc/php/class/class-sc-header-menu-walker.php';
require_once get_stylesheet_directory() . '/inc/php/class/class-sc-theme-updater.php';

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
