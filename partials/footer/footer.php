<?php
$footer_menu_1_title = get_theme_mod( 'sc_footer_menu_1_title', esc_html__( 'Про нас', 'seotech' ) );
$footer_menu_1_id    = get_theme_mod( 'sc_footer_menu_1_id', '' );

$footer_menu_2_title = get_theme_mod( 'sc_footer_menu_2_title', esc_html__( 'Бонусні програми', 'seotech' ) );
$footer_menu_2_id    = get_theme_mod( 'sc_footer_menu_2_id', '' );

$footer_menu_3_title = get_theme_mod( 'sc_footer_menu_3_title', esc_html__( 'Інформація', 'seotech' ) );
$footer_menu_3_id    = get_theme_mod( 'sc_footer_menu_3_id', '' );

$footer_logo        = get_theme_mod( 'sc_footer_logo' );
$social_icons       = get_theme_mod( 'sc_social_icons_fixed', [] );
$all_icons          = function_exists( 'sc_get_social_icons_library' ) ? sc_get_social_icons_library() : [];
$footer_description = get_theme_mod( 'sc_footer_description', '' );

$footer_app_heading    = get_theme_mod( 'sc_footer_app_heading', esc_html__( 'Завантажити додаток', 'seotech' ) );
$footer_appstore_link  = get_theme_mod( 'sc_footer_appstore_link', '#' );
$footer_appstore_logo  = get_theme_mod( 'sc_footer_appstore_logo' );
$footer_playstore_link = get_theme_mod( 'sc_footer_playstore_link', '#' );
$footer_playstore_logo = get_theme_mod( 'sc_footer_playstore_logo' );
$footer_app_text       = get_theme_mod( 'sc_footer_app_text', '' );

$partners = get_theme_mod( 'sc_footer_partners', [] );

$footer_copyright  = get_theme_mod( 'sc_footer_copyright', esc_html__( '[company_year]', 'seotech' ) );
$footer_disclaimer = get_theme_mod( 'sc_footer_disclaimer', '' );

$footer_app_btn_title = get_theme_mod( 'footer_app_btn_title', esc_html__( 'Download Now', 'seotech' ) );
$footer_app_btn_url   = get_theme_mod( 'footer_app_btn_url', esc_html__( '#', 'seotech' ) );
$footer_app_btn_type  = get_theme_mod( 'footer_app_btn_type', 'primary' );
?>

<footer class="site-footer">
    <div class="footer-row footer-row-1">
        <div class="footer-col footer-col-logo">
			<?php
			if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			} elseif ( $footer_logo ) {
				echo wp_get_attachment_image( $footer_logo, 'medium', false, [ 'class' => 'footer-logo' ] );
			}
			?>

			<?php if ( ! empty( $social_icons ) && is_array( $social_icons ) ) : ?>
                <div class="footer-social-icons">
					<?php foreach ( $social_icons as $icon ) :
						$slug = isset( $icon['icon_slug'] ) ? $icon['icon_slug'] : '';
						$color = isset( $icon['icon_color'] ) ? $icon['icon_color'] : '#a9bdd1';
						$color_bg = isset( $icon['icon_color_bg'] ) ? $icon['icon_color_bg'] : '#0D1826';
						$color_border = isset( $icon['icon_color_border'] ) ? $icon['icon_color_border'] : '#2E4A6B';
						$link = isset( $icon['icon_link'] ) ? $icon['icon_link'] : '#';
						$label = isset( $icon['icon_label'] ) ? $icon['icon_label'] : '';

						$svg = isset( $all_icons[ $slug ] ) ? $all_icons[ $slug ] : '';

						if ( empty( $svg ) ) {
							continue;
						}

                        $link = transform_link_with_shortcode_to_link($link);
						?>
                        <a
                            href="<?php echo esc_url( $link ); ?>"
                            class="social-icon"
                            target="_blank"
                            rel="noopener"
                            aria-label="<?php echo esc_attr( $label ); ?>"
                            style="
                                --icon-color: <?php echo esc_attr( $color ); ?>;
                                --icon-color-bg: <?php echo esc_attr( $color_bg ); ?>;
                                --icon-color-border: <?php echo esc_attr( $color_border ); ?>;
                                "
                        >
                            <div class="social-icon-inner">
								<?php
								echo $svg;
								?>
                            </div>
                        </a>
					<?php endforeach; ?>
                </div>
			<?php endif; ?>

            <div class="footer-description">
				<?php
				echo wp_kses_post( nl2br( $footer_description ) );
				?>
            </div>
        </div>
		<?php if ( ! empty( $footer_menu_1_title ) ) { ?>
            <div class="footer-col footer-col-about">
				<?php
				echo '<div class="footer__title">' . esc_html( $footer_menu_1_title ) . '</div>';
				$menu_1_id = get_theme_mod( 'sc_footer_menu_1_id', '' );
				if ( ! empty( $menu_1_id ) ) {
					wp_nav_menu( [
						'menu'       => absint( $menu_1_id ),
						'container'  => false,
						'menu_class' => 'footer-menu-list',
					] );
				}
				?>
            </div>
		<?php } ?>

		<?php if ( ! empty( $footer_menu_2_title ) ) { ?>
            <div class="footer-col footer-col-bonus">
				<?php
				echo '<div class="footer__title">' . esc_html( $footer_menu_2_title ) . '</div>';
				$menu_2_id = get_theme_mod( 'sc_footer_menu_2_id', '' );
				if ( ! empty( $menu_2_id ) ) {
					wp_nav_menu( [
						'menu'       => absint( $menu_2_id ),
						'container'  => false,
						'menu_class' => 'footer-menu-list',
					] );
				}
				?>
            </div>
		<?php } ?>

		<?php if ( ! empty( $footer_menu_3_title ) ) { ?>
            <div class="footer-col footer-col-info">
				<?php
				echo '<div class="footer__title">' . esc_html( $footer_menu_3_title ) . '</div>';
				$menu_3_id = get_theme_mod( 'sc_footer_menu_3_id', '' );
				if ( ! empty( $menu_3_id ) ) {
					wp_nav_menu( [
						'menu'       => absint( $menu_3_id ),
						'container'  => false,
						'menu_class' => 'footer-menu-list',
					] );
				}
				?>
            </div>
		<?php } ?>

        <div class="footer-col footer-col-app">
            <div class="footer__title"><?php echo esc_html( $footer_app_heading ); ?></div>
            <div class="footer-app-logos">
				<?php if ( $footer_appstore_logo ) : ?>
                    <a href="<?php echo esc_url( do_shortcode( $footer_appstore_link ) ); ?>">
						<?php echo wp_get_attachment_image( $footer_appstore_logo, 'medium', false ); ?>
                    </a>
				<?php endif; ?>
				<?php if ( $footer_playstore_logo ) : ?>
					<a href="<?php echo esc_url( do_shortcode( $footer_playstore_link ) ); ?>">
						<?php echo wp_get_attachment_image( $footer_playstore_logo, 'medium', false ); ?>
                    </a>
				<?php endif; ?>
            </div>
            <div class="footer-app-text">
				<?php echo wp_kses_post( nl2br( $footer_app_text ) ); ?>
            </div>
			<?php if ( ! empty( $footer_app_btn_title ) && ! empty( $footer_app_btn_url ) ) : ?>
                <div class="footer-app-button">
                    <a
                        class="btn btn-<?php echo esc_attr( $footer_app_btn_type ); ?>"
                        href="<?php echo esc_url( do_shortcode( $footer_app_btn_url ) ); ?>">
						<?php echo esc_html( $footer_app_btn_title ); ?>
                    </a>
                </div>
			<?php endif; ?>
        </div>
    </div>

    <div class="footer-row footer-row-2 footer-partners">
		<?php
		if ( is_array( $partners ) && ! empty( $partners ) ) :
			foreach ( $partners as $partner ) :
				$logo_id = isset( $partner['partner_logo'] ) ? $partner['partner_logo'] : '';
				$link = isset( $partner['partner_link'] ) ? $partner['partner_link'] : '#';

				if ( $logo_id ) : ?>
                    <a href="<?php echo esc_url( $link ); ?>" class="partner-logo" target="_blank" rel="noopener">
						<?php echo wp_get_attachment_image( $logo_id, 'thumbnail', false ); ?>
                    </a>
				<?php
				endif;
			endforeach;
		endif;
		?>
    </div>

    <div class="footer-row footer-row-3">
        <div class="footer-copyright">
			<?php echo do_shortcode( $footer_copyright ); ?>
        </div>
        <div class="footer-disclaimer">
			<?php echo wp_kses_post( nl2br( $footer_disclaimer ) ); ?>
        </div>
    </div>
</footer>
