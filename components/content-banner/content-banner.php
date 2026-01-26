<?php
/**
 * Another Content banner Template
 */

$bg_type              = get_sub_field( 'bg_type' );
$left_gradient_color  = get_sub_field( 'left_gradient_color' );
$right_gradient_color = get_sub_field( 'right_gradient_color' );
$bg_image             = get_sub_field( 'bg_image' );
$main_image           = get_sub_field( 'main_image' );
$solid_bg_color       = get_sub_field( 'solid_bg_color' );

$content_type = get_sub_field( 'content_type' );

$content = get_sub_field( 'content' );
$button  = get_sub_field( 'button' );

$content_secondary = get_sub_field( 'content_secondary' );
$button_secondary  = get_sub_field( 'button_secondary' );

$button_type           = get_sub_field( 'button_type' );
$button_secondary_type = get_sub_field( 'button_secondary_type' );

$block_class = 'another-block';

$block_class .= ' another-block--' . esc_attr( $content_type );


$block_style = '';
if ( $bg_type === 'gradient' && $left_gradient_color && $right_gradient_color ) {
	$block_style = sprintf(
		'style="background: linear-gradient(135deg, %1$s 0%%, %2$s 100%%);"',
		esc_attr( $left_gradient_color ),
		esc_attr( $right_gradient_color )
	);
} elseif ( $bg_type === 'image' && ! empty( $bg_image ) ) {
	$bg_url = $bg_image['url'];
	if ( $bg_url ) {
		$block_style = sprintf(
			'style="background: url(%1$s) center/cover no-repeat;"',
			esc_url( $bg_url )
		);
	}
} else {
	$color       = ! empty( $solid_bg_color ) ? $solid_bg_color : '#14273E';
	$block_style = sprintf(
		'style="background-color: %s;"',
		esc_attr( $color )
	);
}

?>
<section class="<?php echo esc_attr( $block_class ); ?>" <?php echo $block_style; ?>>
    <div class="another-block__inner">
        <div class="another-block__left-col">
			<?php if ( ! empty( $content ) ) : ?>
                <div class="another-block__title"><?php echo wp_kses_post( $content ); ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $button['url'] ) ) :
				$btn_class = ( ! empty( $button_type ) ) ? 'btn-' . esc_attr( $button_type ) : 'btn-default';
				?>
                <a href="<?php echo esc_url( do_shortcode( $button['url'] ) ); ?>" class="btn <?php echo $btn_class; ?>">
					<?php echo esc_html( $button['title'] ); ?>
                </a>
			<?php endif; ?>
			<?php if ( $content_type === 'left' && ! empty( $main_image['url'] ) ) : ?>
                <div class="another-block__image">
                    <img src="<?php echo $main_image['url'] ?>" alt="<?php echo $main_image['alt'] ?>"/>
                </div>
			<?php endif; ?>
        </div>

        <?php if ($content_type === 'center' && !empty($main_image['url'])) : ?>
            <div class="another-block__center-col">
                <div class="another-block__image">
                    <img src="<?php echo $main_image['url'] ?>" alt="<?php echo $main_image['alt'] ?>"/>
                </div>
            </div>
        <?php endif; ?>

        <div class="another-block__right-col">
			<?php if ( ! empty( $content_secondary ) ) : ?>
                <div class="another-block__title"><?php echo wp_kses_post( $content_secondary ); ?></div>
			<?php endif; ?>
			<?php if ( ! empty( $button_secondary['url'] ) ) :
				$btn_class2 = ( ! empty( $button_secondary_type ) ) ? 'btn-' . esc_attr( $button_secondary_type ) : 'btn-default';
				?>
                <a href="<?php echo esc_url( do_shortcode( $button_secondary['url'] ) ); ?>" class="btn <?php echo $btn_class2; ?>">
					<?php echo esc_html( $button_secondary['title'] ); ?>
                </a>
			<?php endif; ?>

			<?php if ( $content_type === 'right' && ! empty( $main_image['url'] ) ) : ?>
                <div class="another-block__image">
                    <img src="<?php echo $main_image['url'] ?>" alt="<?php echo $main_image['alt'] ?>"/>
                </div>
			<?php endif; ?>
        </div>
    </div>
</section>
