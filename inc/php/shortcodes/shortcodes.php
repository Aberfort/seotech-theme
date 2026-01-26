<?php
/**
 * Shortcode [sc_toc] - builds a chip-based ToC from ACF flexible content
 */
function sc_toc_chips_acf_shortcode( $atts ) {
	$view_mode  = get_theme_mod( 'toc_view_mode', 'chips' );
	$mode_class = 'sc-toc-mode-' . $view_mode;

	$acf_field_name = 'page_blocks';
	$full_html      = sc_get_acf_html_for_toc( $acf_field_name );

	$full_html = sc_acf_add_heading_ids( $full_html, '2,3' );

	if ( empty( $full_html ) ) {
		return '';
	}

	$defaults = [
		'title'  => 'Зміст сторінки',
		'levels' => '2,3',
	];
	$atts     = shortcode_atts( $defaults, $atts, 'sc_toc' );

	$levels_array   = array_map( 'trim', explode( ',', $atts['levels'] ) );
	$levels_pattern = implode( '|', $levels_array );

	$pattern = '/<h(' . $levels_pattern . ')([^>]*)id="([^"]+)"([^>]*)>(.*?)<\/h\1>/is';

	if ( ! preg_match_all( $pattern, $full_html, $matches, PREG_SET_ORDER ) ) {
		return '';
	}

	$chips_html = '';
	foreach ( $matches as $match ) {
		$heading_level = (int) $match[1];
		$anchor_id     = $match[3];
		$heading_html  = $match[5];
		$heading_text  = wp_strip_all_tags( $heading_html );

		$chips_html .= sprintf(
			'<a class="sc-toc-chip sc-toc-lvl-%d" href="#%s">%s</a>',
			$heading_level,
			esc_attr( $anchor_id ),
			esc_html( $heading_text )
		);
	}

	$html = '<div class="sc-toc-chips-wrapper ' . esc_attr( $mode_class ) . '">';
	$html .= '  <div class="sc-toc-header">';
	$html .= '    <div class="sc-toc-title">' . esc_html( $atts['title'] ) . '</div>';
	$html .= '    <button type="button" class="sc-toc-toggle" data-toggle="collapse">[Згорнути]</button>';
	$html .= '  </div>';

	$html .= '  <div class="sc-toc-chips-container">';
	$html .= $chips_html;
	$html .= '  </div>';
	$html .= '</div>';

	return $html;
}

add_shortcode( 'sc_toc', 'sc_toc_chips_acf_shortcode' );
