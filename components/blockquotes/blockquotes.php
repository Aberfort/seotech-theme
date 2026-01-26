<?php
/**
 * Quote Banner Template
 *
 */

$banner_content  = get_sub_field( 'content' );
$banner_bg_color = get_sub_field( 'bg_color' );
$left_icon       = get_sub_field( 'left_icon' );
$right_icon      = get_sub_field( 'right_icon' );

$style_attr = '';
if ( $banner_bg_color ) {
	$style_attr = 'style="background-color:' . esc_attr( $banner_bg_color ) . ';"';
}
?>
<section class="quote-banner <?php echo $banner_bg_color ? 'quote-banner--bg' : '' ?>" <?php echo $style_attr; ?>>
    <div class="quote-banner__inner">
		<?php if ( ! empty( $left_icon['url'] ) ): ?>
            <div class="quote-banner__left-icon">
                <img src="<?php echo esc_url( $left_icon['url'] ); ?>"
                     alt="<?php echo esc_attr( $left_icon['alt'] ); ?>">
            </div>
		<?php endif; ?>

        <blockquote class="quote-banner__content">
			<?php
			echo wp_kses_post( $banner_content );
			?>
        </blockquote>

		<?php if ( ! empty( $right_icon['url'] ) ): ?>
            <div class="quote-banner__right-icon">
                <img src="<?php echo esc_url( $right_icon['url'] ); ?>"
                     alt="<?php echo esc_attr( $right_icon['alt'] ); ?>">
            </div>
		<?php endif; ?>
    </div>
</section>
