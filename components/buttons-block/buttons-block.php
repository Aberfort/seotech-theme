<?php
/**
 * Buttons Block
 *
 */
$position       = get_sub_field( 'buttons_position' );
$chosen_buttons = get_sub_field( 'buttons' );

$primary_link   = get_sub_field( 'primary_link' );
$secondary_link = get_sub_field( 'secondary_link' );
$default_link   = get_sub_field( 'default_link' );
$bordered_link  = get_sub_field( 'bordered_link' );

$align_class = 'btn-row--left';
if ( $position === 'center' ) {
	$align_class = 'btn-row--center';
} elseif ( $position === 'right' ) {
	$align_class = 'btn-row--right';
}

if ( empty( $chosen_buttons ) ) {
	return;
}

?>
<div class="btn-row <?php echo esc_attr( $align_class ); ?>">
	<?php
	if ( is_array( $chosen_buttons ) && in_array( 'primary', $chosen_buttons ) && ! empty( $primary_link['url'] ) ):
		?>
        <a href="<?php echo esc_url( do_shortcode( $primary_link['url'] ) ); ?>"
           class="btn btn-primary"
           target="<?php echo esc_attr( $primary_link['target'] ?: '_self' ); ?>">
			<?php echo esc_html( $primary_link['title'] ?: 'Primary' ); ?>
        </a>
	<?php
	endif;

	if ( is_array( $chosen_buttons ) && in_array( 'secondary', $chosen_buttons ) && ! empty( $secondary_link['url'] ) ):
		?>
        <a href="<?php echo esc_url( do_shortcode( $secondary_link['url'] ) ); ?>"
           class="btn btn-secondary"
           target="<?php echo esc_attr( $secondary_link['target'] ?: '_self' ); ?>">
			<?php echo esc_html( $secondary_link['title'] ?: 'Secondary' ); ?>
        </a>
	<?php
	endif;

	if ( is_array( $chosen_buttons ) && in_array( 'default', $chosen_buttons ) && ! empty( $default_link['url'] ) ):
		?>
        <a href="<?php echo esc_url( do_shortcode( $default_link['url'] ) ); ?>"
           class="btn btn-default"
           target="<?php echo esc_attr( $default_link['target'] ?: '_self' ); ?>">
			<?php echo esc_html( $default_link['title'] ?: 'Default' ); ?>
        </a>
	<?php
	endif;

	if ( is_array( $chosen_buttons ) && in_array( 'bordered', $chosen_buttons ) && ! empty( $bordered_link['url'] ) ):
		?>
        <a href="<?php echo esc_url( do_shortcode( $bordered_link['url'] ) ); ?>"
           class="btn btn-bordered"
           target="<?php echo esc_attr( $bordered_link['target'] ?: '_self' ); ?>">
			<?php echo esc_html( $bordered_link['title'] ?: 'Bordered' ); ?>
        </a>
	<?php
	endif;
	?>
</div>
