<?php
/**
 * Sticky Block Template
 *
 */

$banner_type    = get_sub_field( 'banner_type' );
$gradient_left  = get_sub_field( 'gradient_color_left' );
$gradient_right = get_sub_field( 'gradient_color_right' );
$bg_image       = get_sub_field( 'bg_image' );
$solid_color    = get_sub_field( 'solid_color' );

$content = get_sub_field( 'content' );

$primary_button        = get_sub_field( 'primary_button' );
$primary_button_type   = get_sub_field( 'primary_button_type' );
$secondary_button      = get_sub_field( 'secondary_button' );
$secondary_button_type = get_sub_field( 'secondary_button_type' );

$main_image_type = get_sub_field( 'main_image_type' );
$image_left      = get_sub_field( 'image_left' );
$image_right     = get_sub_field( 'image_right' );
$button_type     = get_sub_field( 'button_type' );

$left_filled  = ! empty( $image_left['url'] );
$right_filled = ! empty( $image_right['url'] );

if ( $left_filled && $right_filled ) {
	$layout = 'both';
} elseif ( $left_filled ) {
	$layout = 'left';
} elseif ( $right_filled ) {
	$layout = 'right';
} else {
	$layout = 'none';
}

$sticky_class = 'sticky-block sticky-block--' . $layout;
$sticky_class .= ( $main_image_type === 'out' ) ? ' sticky-block--out' : ' sticky-block--in';
$sticky_class .= ( $button_type === 'along' ) ? ' sticky-block--btn-along' : ' sticky-block--btn-center';

$sticky_style = '';
if ( $banner_type === 'gradient' && $gradient_left && $gradient_right ) {
	$sticky_style = sprintf(
		'style="background: linear-gradient(135deg, %1$s 0%%, %2$s 100%%);"',
		esc_attr( $gradient_left ),
		esc_attr( $gradient_right )
	);
} elseif ( $banner_type === 'image' && ! empty( $bg_image ) ) {
	$bg_url = $bg_image['url'];
	if ( $bg_url ) {
		$sticky_style = sprintf(
			'style="background: url(%1$s) center/cover no-repeat;"',
			esc_url( $bg_url )
		);
	}
} else {
	$color        = ! empty( $solid_color ) ? $solid_color : '#14273E';
	$sticky_style = sprintf(
		'style="background-color: %s;"',
		esc_attr( $color )
	);
}

$text_in_left   = false;
$text_in_center = false;
$text_in_right  = false;

switch ( $layout ) {
	case 'both':
		$text_in_center = true;
		break;
	case 'left':
		$text_in_right = true;
		break;
	case 'right':
		$text_in_left = true;
		break;
	case 'none':
	default:
		$text_in_center = true;
}

$primary_in_left     = false;
$primary_in_center   = false;
$primary_in_right    = false;
$secondary_in_left   = false;
$secondary_in_center = false;
$secondary_in_right  = false;

if ( $button_type === 'center' ) {
	$primary_in_center   = true;
	$secondary_in_center = true;
} else {
	if ( $layout === 'both' ) {
		$primary_in_left    = true;
		$secondary_in_right = true;
	} elseif ( $layout === 'left' ) {
		$primary_in_right   = true;
		$secondary_in_right = true;
	} elseif ( $layout === 'right' ) {
		$primary_in_left   = true;
		$secondary_in_left = true;
	} else {
		$primary_in_center   = true;
		$secondary_in_center = true;
	}
}

?>
<div class="<?php echo esc_attr( $sticky_class ); ?>" <?php echo $sticky_style; ?>>
    <button class="sticky-block__close" aria-label="Close">&times;</button>

    <div class="sticky-block__inner">

        <div class="sticky-block__left-col">
			<?php if ( $left_filled ) : ?>
                <div class="sticky-block__image sticky-block__image--left">
                    <img src="<?php echo esc_url( $image_left['url'] ); ?>"
                         alt="<?php echo esc_attr( $image_left['alt'] ); ?>">
                </div>
			<?php endif; ?>

			<?php if ( $text_in_left ): ?>
				<?php if ( ! empty( $content ) ): ?>
                    <div class="sticky-block__title"><?php echo wp_kses_post( $content ); ?></div>
				<?php endif; ?>
			<?php endif; ?>

            <div class="sticky-block__buttons-left">
				<?php if ( $primary_in_left && ! empty( $primary_button['url'] ) ):
					$pbtn_class = 'btn-' . ( $primary_button_type ?: 'default' ); ?>
                    <a href="<?php echo esc_url( do_shortcode( $primary_button['url']) ); ?>" class="btn <?php echo esc_attr( $pbtn_class ); ?>">
						<?php echo esc_html( $primary_button['title'] ); ?>
                    </a>
				<?php endif; ?>

				<?php if ( $secondary_in_left && ! empty( $secondary_button['url'] ) ):
					$sbtn_class = 'btn-' . ( $secondary_button_type ?: 'default' ); ?>
                    <a href="<?php echo esc_url( do_shortcode( $secondary_button['url']) ); ?>" class="btn <?php echo esc_attr( $sbtn_class ); ?>">
						<?php echo esc_html( $secondary_button['title'] ); ?>
                    </a>
				<?php endif; ?>
            </div>
        </div>

        <div class="sticky-block__center-col">
			<?php if ( $text_in_center ): ?>
				<?php if ( ! empty( $content ) ): ?>
                    <h2 class="sticky-block__title"><?php echo wp_kses_post( $content ); ?></h2>
				<?php endif; ?>
			<?php endif; ?>

            <div class="sticky-block__buttons-center">
				<?php if ( $primary_in_center && ! empty( $primary_button['url'] ) ):
					$pbtn_class = 'btn-' . ( $primary_button_type ?: 'default' ); ?>
                    <a href="<?php echo esc_url( do_shortcode( $primary_button['url']) ); ?>" class="btn <?php echo esc_attr( $pbtn_class ); ?>">
						<?php echo esc_html( $primary_button['title'] ); ?>
                    </a>
				<?php endif; ?>

				<?php if ( $secondary_in_center && ! empty( $secondary_button['url'] ) ):
					$sbtn_class = 'btn-' . ( $secondary_button_type ?: 'default' ); ?>
                    <a href="<?php echo esc_url( do_shortcode( $secondary_button['url']) ); ?>" class="btn <?php echo esc_attr( $sbtn_class ); ?>">
						<?php echo esc_html( $secondary_button['title'] ); ?>
                    </a>
				<?php endif; ?>
            </div>
        </div>

        <div class="sticky-block__right-col">
			<?php if ( $right_filled ): ?>
                <div class="sticky-block__image sticky-block__image--right">
                    <img src="<?php echo esc_url( $image_right['url'] ); ?>"
                         alt="<?php echo esc_attr( $image_right['alt'] ); ?>">
                </div>
			<?php endif; ?>

			<?php if ( $text_in_right ): ?>
				<?php if ( ! empty( $content ) ): ?>
                    <h2 class="sticky-block__title"><?php echo wp_kses_post( $content ); ?></h2>
				<?php endif; ?>
			<?php endif; ?>

            <div class="sticky-block__buttons-right">
				<?php if ( $primary_in_right && ! empty( $primary_button['url'] ) ):
					$pbtn_class = 'btn-' . ( $primary_button_type ?: 'default' ); ?>
                    <a href="<?php echo esc_url( do_shortcode( $primary_button['url']) ); ?>" class="btn <?php echo esc_attr( $pbtn_class ); ?>">
						<?php echo esc_html( $primary_button['title'] ); ?>
                    </a>
				<?php endif; ?>

				<?php if ( $secondary_in_right && ! empty( $secondary_button['url'] ) ):
					$sbtn_class = 'btn-' . ( $secondary_button_type ?: 'default' ); ?>
                    <a href="<?php echo esc_url( do_shortcode( $secondary_button['url']) ); ?>" class="btn <?php echo esc_attr( $sbtn_class ); ?>">
						<?php echo esc_html( $secondary_button['title'] ); ?>
                    </a>
				<?php endif; ?>
            </div>
        </div>

    </div>
</div>
