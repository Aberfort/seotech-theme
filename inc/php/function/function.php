<?php

function check_webp_support( $classes ) {
	if ( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) !== false || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) !== false ) {
		$classes[] = 'webp_support';
	}

	return $classes;
}

add_filter( 'body_class', 'check_webp_support', 10, 2 );

function sc_theme_setup() {
	register_nav_menus( [
		'header_menu'        => esc_html__( 'Header Menu', 'seotech' ),
		'footer_first_menu'  => esc_html__( 'Footer First Menu', 'seotech' ),
		'footer_second_menu' => esc_html__( 'Footer Second Menu', 'seotech' ),
		'footer_third_menu'  => esc_html__( 'Footer Third Menu', 'seotech' ),
	] );

	add_theme_support( 'custom-logo', [
		'height'      => 100,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	] );
}

add_action( 'after_setup_theme', 'sc_theme_setup' );

function sc_custom_body_classes( $classes ) {
	if ( ! get_theme_mod( 'links_underline', true ) ) {
		$classes[] = 'no-links-underline';
	} else {
		$classes[] = 'links-underline-enabled';
	}

	if ( ! get_theme_mod( 'links_bordered', true ) ) {
		$classes[] = 'no-links-border';
	} else {
		$classes[] = 'links-border-enabled';
	}

	return $classes;
}

add_filter( 'body_class', 'sc_custom_body_classes' );

function sc_get_all_wp_menus() {
	$menus   = wp_get_nav_menus();
	$choices = [];
	foreach ( $menus as $menu ) {
		$choices[ $menu->term_id ] = $menu->name;
	}

	return $choices;
}

/**
 *
 * @param int $attachment_id ID вкладення (attachment).
 *
 * @return string HTML-код SVG (якщо знайдено), або порожній рядок.
 */
function sc_get_svg_code_by_id( $attachment_id ) {
	$file_path = get_attached_file( $attachment_id );

	if ( ! $file_path || ! file_exists( $file_path ) ) {
		return '';
	}

	$mime = get_post_mime_type( $attachment_id );
	if ( 'image/svg+xml' !== $mime ) {
		return '';
	}

	$svg_code = file_get_contents( $file_path );
	if ( ! $svg_code ) {
		return '';
	}

	return $svg_code;
}

add_filter( 'kirki_output_inline_styles_priority', 'my_kirki_styles_priority' );
function my_kirki_styles_priority( $priority ) {
	return 99999;
}

function hex_to_rgba( $hex, $alpha = 1.0 ) {
	$hex = ltrim( $hex, '#' );
	if ( strlen( $hex ) === 3 ) {
		$r = hexdec( str_repeat( substr( $hex, 0, 1 ), 2 ) );
		$g = hexdec( str_repeat( substr( $hex, 1, 1 ), 2 ) );
		$b = hexdec( str_repeat( substr( $hex, 2, 1 ), 2 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}

	return sprintf( 'rgba(%d, %d, %d, %.2f)', $r, $g, $b, $alpha );
}

function company_year_shortcode() {
	$current_year = date( 'Y' );
	$site_name    = get_bloginfo( 'name' );

	return $current_year . ' &copy; ' . $site_name;
}

add_shortcode( 'company_year', 'company_year_shortcode' );

function sc_global_popup_render() {
	$enable = get_field( 'enable', 'option' );
	if ( $enable === 'on' ) {
		get_template_part( 'components/popup/popup' );
	}
}

add_action( 'wp_footer', 'sc_global_popup_render' );

function my_acf_admin_styles() {
	wp_enqueue_style(
		'my-acf-admin-styles',
		get_stylesheet_directory_uri() . '/inc/admin/css/acf.css',
		array(),
		'1.0'
	);
}

add_action( 'acf/input/admin_enqueue_scripts', 'my_acf_admin_styles' );

add_filter( 'kirki/field/checkbox/enable_rounded_elements/value', function ( $value ) {
	return $value ? '16' : '4';
} );

/**
 * Gathers HTML from an ACF flexible content (or simple field)
 * that we want to parse for headings.
 *
 * @param string $field_name The ACF field name, e.g. 'page_blocks'
 * @param int    $post_id If needed, or defaults to current post
 *
 * @return string
 */
function sc_get_acf_html_for_toc( $field_name, $post_id = 0 ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}
	if ( ! $post_id ) {
		return '';
	}

	$blocks = get_field( $field_name, $post_id );
	if ( empty( $blocks ) || ! is_array( $blocks ) ) {
		return '';
	}

	$full_html = '';
	foreach ( $blocks as $block ) {
		if ( isset( $block['acf_fc_layout'] ) ) {
			switch ( $block['acf_fc_layout'] ) {
				case 'content':
					if ( ! empty( $block['content_section'] ) && is_array( $block['content_section'] ) ) {
						foreach ( $block['content_section'] as $section ) {
							if ( ! empty( $section['column_1_content'] ) ) {
								$full_html .= "\n" . $section['column_1_content'] . "\n";
							}
							if ( ! empty( $section['column_2_content'] ) ) {
								$full_html .= "\n" . $section['column_2_content'] . "\n";
							}
							if ( ! empty( $section['column_3_content'] ) ) {
								$full_html .= "\n" . $section['column_3_content'] . "\n";
							}
						}
					}
					break;
			}
		}
	}

	return $full_html;
}

/**
 * Adds an id="..." to headings (e.g., <h2> or <h3>) in the provided HTML,
 * preserving their original level and attributes.
 *
 * @param string $html The HTML to parse and modify.
 * @param string $levels Comma-separated list of heading levels, e.g. "2,3".
 *
 * @return string The modified HTML with headings now having an id.
 */
function sc_acf_add_heading_ids( $html, $levels = '2,3' ) {
	$levels_array   = array_map( 'trim', explode( ',', $levels ) );
	$levels_pattern = implode( '|', $levels_array );

	$pattern = '/<h(' . $levels_pattern . ')([^>]*)>(.*?)<\/h\1>/is';

	if ( preg_match_all( $pattern, $html, $matches, PREG_SET_ORDER ) ) {
		$replacements = [];

		foreach ( $matches as $m ) {
			$heading_level = $m[1];
			$heading_attrs = $m[2];
			$heading_html  = $m[3];

			$heading_text = wp_strip_all_tags( $heading_html );

			$anchor_id = sanitize_title( $heading_text );

			$attrs_with_space = trim( $heading_attrs );
			if ( ! empty( $attrs_with_space ) ) {
				$attrs_with_space = ' ' . $attrs_with_space;
			}

			$new_heading = sprintf(
				'<h%s%s id="%s">%s</h%s>',
				$heading_level,
				$attrs_with_space,
				$anchor_id,
				$heading_html,
				$heading_level
			);

			$replacements[ $m[0] ] = $new_heading;
		}

		$html = str_replace( array_keys( $replacements ), array_values( $replacements ), $html );
	}

	return $html;
}

if (!function_exists('transform_link_with_shortcode_to_link')) {
    function transform_link_with_shortcode_to_link($link_with_shortcode)
    {
        if (!$link_with_shortcode || $link_with_shortcode === '#') {
            return $link_with_shortcode;
        }

        preg_match('/\[[^\]]+\]/', $link_with_shortcode, $matches);

        $link = $matches[0];

        if (!isset($link)) {
            return $link_with_shortcode;
        }

        // replace %20 to spaces in shortcodes
        if (str_contains($link, '%20')) {
            $link = str_replace('%20', ' ', $link);
        }

        return do_shortcode($link);
    }
}