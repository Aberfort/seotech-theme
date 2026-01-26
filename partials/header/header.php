<?php
$show_login           = get_theme_mod( 'show_login_btn', true );
$show_register        = get_theme_mod( 'show_registration_btn', true );
$show_login_mobile    = get_theme_mod( 'show_login_btn_mobile', true );
$show_register_mobile = get_theme_mod( 'show_registration_btn_mobile', true );

$sticky_enabled = get_theme_mod( 'header_sticky', false );

// Tablet & Mobile logos
$logo_tablet_id = get_theme_mod( 'sc_logo_tablet' );
$logo_mobile_id = get_theme_mod( 'sc_logo_mobile' );

// Button types
$login_btn_type    = get_theme_mod( 'sc_login_btn_type', 'default' );
$register_btn_type = get_theme_mod( 'sc_register_btn_type', 'secondary' );

// Button text and URL
$login_btn_text    = get_theme_mod( 'sc_login_btn_text', 'Login' );
$login_btn_url     = get_theme_mod( 'sc_login_btn_url', '#' );
$register_btn_text = get_theme_mod( 'sc_register_btn_text', 'Register' );
$register_btn_url  = get_theme_mod( 'sc_register_btn_url', '#' );
?>
<header class="site-header <?php echo $sticky_enabled ? 'sticky' : ''; ?>">
    <div class="site-logo">
        <button class="burger-btn" aria-label="Open mobile menu">
            <span></span><span></span><span></span><span></span>
        </button>
		<?php
		// Desktop logo
		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

		// Tablet logo
		if ( $logo_tablet_id ) {
			echo wp_get_attachment_image( $logo_tablet_id, 'medium', false, [ 'class' => 'header-logo-tablet' ] );
		}
		?>
    </div>

    <nav class="main-nav">
		<?php
		wp_nav_menu( [
			'theme_location' => 'header_menu',
			'container'      => false,
			'menu_class'     => 'main-nav__list',
			'walker'         => new SC_Header_Menu_Walker(),
		] );
		?>
    </nav>

    <div class="header-buttons">
		<?php do_action( 'wpml_add_language_selector' ); ?>

		<?php if ( $show_login ) : ?>
            <a
                class="btn login-btn btn-<?php echo esc_attr( $login_btn_type ); ?><?php echo $show_login_mobile ? '' : ' hide-on-mobile'; ?>"
                href="<?php echo esc_url( do_shortcode( $login_btn_url ) ); ?>">
				<?php echo esc_html( $login_btn_text ); ?>
            </a>
		<?php endif; ?>

		<?php if ( $show_register ) : ?>
            <a
                class="btn register-btn btn-<?php echo esc_attr( $register_btn_type ); ?><?php echo $show_register_mobile ? '' : ' hide-on-mobile'; ?>"
                href="<?php echo esc_url( do_shortcode( $register_btn_url ) ); ?>">
				<?php echo esc_html( $register_btn_text ); ?>
            </a>
		<?php endif; ?>
    </div>
</header>

<div class="mobile-nav-overlay"></div>

<div class="mobile-menu">
    <div class="mobile-menu__top-row">
        <div class="mobile-menu__logo">
			<?php
			if ( $logo_mobile_id ) {
				echo wp_get_attachment_image( $logo_mobile_id, 'medium', false );
			} else {
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}
			}
			?>
        </div>
        <div class="mobile-menu__lang">
			<?php do_action( 'wpml_add_language_selector' ); ?>
        </div>
        <button class="mobile-menu__close" aria-label="Close menu">
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="mobile-menu__buttons-row">
        <div class="header-buttons">
			<?php if ( $show_login ) : ?>
                <a
                    class="btn login-btn btn-<?php echo esc_attr( $login_btn_type ); ?>"
                    href="<?php echo do_shortcode( $login_btn_url ); ?>">
					<?php echo esc_html( $login_btn_text ); ?>
                </a>
			<?php endif; ?>

			<?php if ( $show_register ) : ?>
                <a
                    class="btn register-btn btn-<?php echo esc_attr( $register_btn_type ); ?>"
                    href="<?php echo do_shortcode( $register_btn_url ); ?>">
					<?php echo esc_html( $register_btn_text ); ?>
                </a>
			<?php endif; ?>
        </div>
    </div>

    <div class="mobile-menu__inner">
		<?php
		wp_nav_menu( [
			'theme_location' => 'header_menu',
			'container'      => false,
			'menu_class'     => 'mobile-menu__list',
			'walker'         => new SC_Header_Menu_Walker(),
		] );
		?>
    </div>
</div>
