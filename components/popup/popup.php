<?php
/**
 * Global Popup Template
 */

$bg_type     = get_field( 'bg_type', 'option' );
$left_color  = get_field( 'left_color', 'option' );
$right_color = get_field( 'right_color', 'option' );
$solid_color = get_field( 'solid_color', 'option' );
$bg_image    = get_field( 'bg_image', 'option' );

$title      = get_field( 'title', 'option' );
$logo       = get_field( 'logo', 'option' );
$content    = get_field( 'content', 'option' );
$main_image = get_field( 'main_image', 'option' );

$chosen_buttons = get_field( 'buttons', 'option' );
$primary_link   = get_field( 'primary_link', 'option' );
$secondary_link = get_field( 'secondary_link', 'option' );
$default_link   = get_field( 'default_link', 'option' );
$bordered_link  = get_field( 'bordered_link', 'option' );

$popup_bg_style = '';
if ( $bg_type === 'gradient' && $left_color && $right_color ) {
	$popup_bg_style = sprintf(
		'background: linear-gradient(135deg, %1$s 0%%, %2$s 100%%);',
		esc_attr( $left_color ),
		esc_attr( $right_color )
	);
} elseif ( $bg_type === 'solid' && $solid_color ) {
	$popup_bg_style = 'background-color:' . esc_attr( $solid_color ) . ';';
} elseif ( $bg_type === 'image' && $bg_image ) {
	$popup_bg_style = 'background: url(' . esc_url( $bg_image['url'] ) . ') center/cover no-repeat;';
}

?>

<div class="global-popup-overlay" id="global-popup-overlay">
    <div class="global-popup" id="global-popup" style="<?php echo esc_attr( $popup_bg_style ); ?>">
		<?php if ( $title ): ?>
            <div class="global-popup__header">
                <div class="global-popup__title"><?php echo esc_html( $title ); ?></div>
                <button class="popup-close" id="popup-close" aria-label="Close popup">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M17.3571 0.642822L0.642853 17.3571" stroke="#A9BDD1" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M0.642853 0.642822L17.3571 17.3571" stroke="#A9BDD1" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
		<?php endif; ?>

        <div class="global-popup__inner">
			<?php if ( $logo ): ?>
                <div class="global-popup__logo">
                    <img
                        src="<?php echo esc_url( $logo['url'] ); ?>"
                        alt="<?php echo esc_attr( $logo['alt'] ) ?>"
                    >
                </div>
			<?php endif; ?>
			<?php if ( $content ): ?>
                <div class="global-popup__content">
					<?php echo wp_kses_post( $content ); ?>
                </div>
			<?php endif; ?>

			<?php if ( $main_image ): ?>
                <div class="global-popup__image">
                    <img src="<?php echo esc_url( $main_image['url'] ); ?>" alt="<?php echo esc_attr( $main_image['alt'] ?? '' ); ?>">
                </div>
			<?php endif; ?>

            <div class="global-popup__buttons">
                <?php
                $buttons = [
                    'primary' => ['class' => 'btn-primary', 'link' => $primary_link, 'default' => 'Primary'],
                    'secondary' => ['class' => 'btn-secondary', 'link' => $secondary_link, 'default' => 'Secondary'],
                    'default' => ['class' => 'btn-default', 'link' => $default_link, 'default' => 'Default'],
                    'bordered' => ['class' => 'btn-bordered', 'link' => $bordered_link, 'default' => 'Bordered'],
                ];

                if (is_array($chosen_buttons)) {
                    foreach ($buttons as $key => $button) {
                        $link = $button['link'];
                        if (in_array($key, $chosen_buttons) && !empty($link['url'])) {
                            ?>
                            <a href="<?php echo esc_url(transform_link_with_shortcode_to_link($link['url'])); ?>"
                               class="btn <?php echo esc_attr($button['class']); ?>"
                               target="<?php echo esc_attr($link['target'] ?? '_self'); ?>">
                                <?php echo esc_html($link['title'] ?? $button['default']); ?>
                            </a>
                            <?php
                        }
                    }
                }
                ?>
            </div>


        </div>

    </div>
</div>
