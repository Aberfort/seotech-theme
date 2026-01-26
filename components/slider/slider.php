<?php
/**
 * Swiper Slider Block Template
 *
 */

$slider_bg_type     = get_sub_field( 'slider_bg_type' );
$slider_left_color  = get_sub_field( 'slider_left_color' );
$slider_right_color = get_sub_field( 'slider_right_color' );
$slider_bg_image    = get_sub_field( 'slider_bg_image' );
$slider_solid_color = get_sub_field( 'slider_solid_color' );
$slider_content_bg  = get_sub_field( 'content_bg' );
$slider_bg_color    = get_sub_field( 'content_bg_color' );

$slider_nav_type = get_sub_field( 'slider_navigation_type' );
$slider_nav_bg   = get_sub_field( 'slider_navigation_bg' );

$slider_class = 'my-swiper';
$slider_class .= ' my-swiper--nav-' . esc_attr( $slider_nav_type );
$slider_class .= $slider_nav_bg ? ' my-swiper--nav-with-bg' : ' my-swiper--nav-no-bg';

$slider_style = '';
if ( $slider_bg_type === 'gradient' && $slider_left_color && $slider_right_color ) {
	$slider_style = sprintf(
		'style="background: linear-gradient(135deg, %1$s 0%%, %2$s 100%%);"',
		esc_attr( $slider_left_color ),
		esc_attr( $slider_right_color )
	);
} elseif ( $slider_bg_type === 'image' && ! empty( $slider_bg_image ) ) {
	$bg_url = $slider_bg_image['url'];
	if ( $bg_url ) {
		$slider_style = sprintf(
			'style="background: url(%1$s) center/cover no-repeat;"',
			esc_url( $bg_url )
		);
	}
} else {
	$color        = ( ! empty( $slider_solid_color ) ) ? $slider_solid_color : '#0a0f1e';
	$slider_style = sprintf(
		'style="background-color: %s;"',
		esc_attr( $color )
	);
}

$content_box_style = '';
if ( $slider_content_bg === 'solid' && ! empty( $slider_bg_color ) ) {
	$rgba_color = hex_to_rgba( $slider_bg_color, .6 );

	$content_box_style = sprintf(
		'style="background-color:%s;"',
		esc_attr( $rgba_color )
	);
}

$content_box_class = ( $slider_content_bg === 'solid' )
	? 'my-swiper__content--with-bg'
	: 'my-swiper__content--no-bg';

if ( have_rows( 'slides' ) ) : ?>
    <section class="my-swiper-wrapper" <?php echo $slider_style; ?>>
        <div class="<?php echo esc_attr( $slider_class ); ?> swiper-container">
            <div class="swiper-wrapper">
				<?php while ( have_rows( 'slides' ) ) : the_row();
					$slide_image     = get_sub_field( 'slide_image' );
					$slide_logo      = get_sub_field( 'slide_logo' );
					$slide_content     = get_sub_field( 'content' );
					$slide_btn1      = get_sub_field( 'slide_btn1' );
					$slide_btn1_type = get_sub_field( 'slide_btn1_type' );
					$slide_btn2      = get_sub_field( 'slide_btn2' );
					$slide_btn2_type = get_sub_field( 'slide_btn2_type' );
					?>
                    <div class="swiper-slide my-swiper__slide">
                        <div class="my-swiper__content-box <?php echo esc_attr( $content_box_class ); ?>" <?php echo $content_box_style; ?>>
							<?php if ( ! empty( $slide_logo['url'] ) ) : ?>
                                <div class="my-swiper__logo">
                                    <img src="<?php echo esc_url( $slide_logo['url'] ); ?>"
                                         alt="<?php echo esc_attr( $slide_logo['alt'] ); ?>">
                                </div>
							<?php endif; ?>

							<?php if ( $slide_content ): ?>
                                <div class="my-swiper__title"><?php echo wp_kses_post( $slide_content ); ?></div>
							<?php endif; ?>

                            <div class="my-swiper__buttons">
								<?php if ( ! empty( $slide_btn1['url'] ) ) :
									$btn1_class = 'btn-' . ( $slide_btn1_type ?: 'default' ); ?>
                                    <a href="<?php echo esc_url( do_shortcode( $slide_btn1['url'] ) ); ?>"
                                       class="btn <?php echo esc_attr( $btn1_class ); ?>">
										<?php echo esc_html( $slide_btn1['title'] ); ?>
                                    </a>
								<?php endif; ?>

								<?php if ( ! empty( $slide_btn2['url'] ) ) :
									$btn2_class = 'btn-' . ( $slide_btn2_type ?: 'default' ); ?>
                                    <a href="<?php echo esc_url( do_shortcode( $slide_btn2['url'] ) ); ?>"
                                       class="btn <?php echo esc_attr( $btn2_class ); ?>">
										<?php echo esc_html( $slide_btn2['title'] ); ?>
                                    </a>
								<?php endif; ?>
                            </div>
                        </div>

						<?php if ( ! empty( $slide_image['url'] ) ) : ?>
                            <div class="my-swiper__image">
                                <img src="<?php echo esc_url( $slide_image['url'] ); ?>"
                                     alt="<?php echo esc_attr( $slide_image['alt'] ); ?>">
                            </div>
						<?php endif; ?>
                    </div>
				<?php endwhile; ?>
            </div>

			<?php if ( $slider_nav_type === 'arrows' ) : ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
			<?php endif; ?>

			<?php if ( $slider_nav_type === 'dots' || $slider_nav_type === 'lines' ): ?>
                <div class="swiper-pagination"></div>
			<?php endif; ?>
        </div>
    </section>
<?php endif; ?>
