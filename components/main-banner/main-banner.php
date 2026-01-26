<?php
/**
 * Banner Block Template
 */

$background_type       = get_sub_field( 'background_type' );
$gradient_left_color   = get_sub_field( 'gradient_left_color' );
$gradient_right_color  = get_sub_field( 'gradient_right_color' );
$background_image      = get_sub_field( 'background_image' );
$background_color      = get_sub_field( 'background_color' );
$bg_for_text           = get_sub_field( 'bg_for_text' );
$color_for_bg          = get_sub_field( 'color_for_bg' );
$logo                  = get_sub_field( 'logo' );
$main_image            = get_sub_field( 'main_image' );
$content               = get_sub_field( 'content' );
$color_for_content     = get_sub_field( 'color_for_content' );
$primary_btn           = get_sub_field( 'primary_btn' );
$type_of_primary_btn   = get_sub_field( 'type_of_primary_btn' );
$secondary_btn         = get_sub_field( 'secondary_btn' );
$type_of_secondary_btn = get_sub_field( 'type_of_secondary_btn' );
$main_image_position   = get_sub_field( 'main_image_position' );

$banner_class = 'banner';

if ( $bg_for_text === 'yes' ) {
	$banner_class .= ' banner--with-text-bg';
}

$banner_style = '';

if ( $background_type === 'gradient' && $gradient_left_color && $gradient_right_color ) {
	$banner_style = sprintf(
		'style="background: linear-gradient(135deg, %1$s 0%%, %2$s 100%%);"',
		esc_attr( $gradient_left_color ),
		esc_attr( $gradient_right_color )
	);
} elseif ( $background_type === 'image' && $background_image ) {
	$bg_img_url = $background_image['url'];

	if ( $bg_img_url ) {
		$banner_style = sprintf(
			'style="background: url(%1$s) center/cover no-repeat;"',
			esc_url( $bg_img_url )
		);
	}
} else {
	$color        = ( $background_color ) ? $background_color : '#14273E';
	$banner_style = sprintf(
		'style="background-color: %s;"',
		esc_attr( $color )
	);
}

$image_position_class = ( $main_image_position === 'center' )
	? 'banner__image--center'
	: 'banner__image--right';

?>
<section
    class="<?php echo esc_attr( $banner_class ); ?> <?php echo esc_attr( $image_position_class ); ?>" <?php echo $banner_style; ?>>
    <div class="banner__content"
		<?php if ( $bg_for_text === 'yes' && ! empty( $color_for_bg ) ) :
			$rgba_color = hex_to_rgba( $color_for_bg, .6 );
			?>
            style="background-color: <?php echo esc_attr( $rgba_color ); ?>;
                backdrop-filter: blur(4px);"
		<?php endif; ?>
    >
		<?php
		if ( ! empty( $logo ) ) :
			$logo_url = $logo['url'];

			if ( $logo_url ) : ?>
                <div class="logo">
                    <img src="<?php echo esc_url( $logo_url ); ?>" alt="Logo">
                </div>
			<?php endif;
		endif; ?>

		<?php if ( ! empty( $content ) ) : ?>
            <div class="banner__title" <?php echo $color_for_content ? 'style="color: ' . esc_attr($color_for_content) . ';"' : ''; ?>><?php echo wp_kses_post( $content ); ?></div>
		<?php endif; ?>

		<?php if ( ! empty( $primary_btn ) || ! empty( $secondary_btn ) ) : ?>
            <div class="banner__buttons">
				<?php if ( ! empty( $primary_btn ) ) :
					$btn_class = ( ! empty( $type_of_primary_btn ) ) ? 'btn-' . esc_attr( $type_of_primary_btn ) : 'btn-default';
					?>
                    <a href="<?php echo esc_url( do_shortcode( $primary_btn['url'] ) ); ?>" class="btn <?php echo $btn_class; ?>">
						<?php echo esc_html( $primary_btn['title'] ); ?>
                    </a>
				<?php endif; ?>

				<?php if ( ! empty( $secondary_btn ) ) :
					$btn_class2 = ( ! empty( $type_of_secondary_btn ) ) ? 'btn-' . esc_attr( $type_of_secondary_btn ) : 'btn-default';
					?>
                    <a href="<?php echo esc_url( do_shortcode( $secondary_btn['url'] ) ); ?>" class="btn <?php echo $btn_class2; ?>">
						<?php echo esc_html( $secondary_btn['title'] ); ?>
                    </a>
				<?php endif; ?>
            </div>
		<?php endif; ?>
    </div>

	<?php
	if ( ! empty( $main_image ) ) :
		$main_img_url = $main_image['url'];

		if ( $main_img_url ) : ?>
            <div class="banner__image">
                <img src="<?php echo esc_url( $main_img_url ); ?>" alt="banner image">
            </div>
		<?php endif;
	endif; ?>
</section>
