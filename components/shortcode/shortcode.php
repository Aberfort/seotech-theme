<?php
$toc_shortcode = get_sub_field( 'shortcode_field' );

if ( $toc_shortcode ) {
	echo '<section class="toc-section">';
	echo do_shortcode( $toc_shortcode );
	echo '</section>';
}
