<?php
// fields-layout.php

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'dimension',
	'settings' => 'container_width',
	'label'    => esc_html__( 'Container Width', 'seotech' ),
	'section'  => 'global_layout_section',
	'default'  => '1440px',
	'output'   => [
		[
			'element'  => ':root',
			'property' => '--container-width',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'     => 'slider',
	'settings' => 'section_padding',
	'label'    => esc_html__( 'Section Padding (px)', 'seotech' ),
	'section'  => 'global_layout_section',
	'default'  => 60,
	'choices'  => [
		'min'  => 0,
		'max'  => 200,
		'step' => 5,
	],
	'output'   => [
		[
			'element'  => ':root',
			'property' => '--section-padding',
			'units'    => 'px',
		],
	],
] );

Kirki::add_field( 'sc_theme_config', [
	'type'      => 'checkbox',
	'settings'  => 'enable_rounded_elements',
	'label'     => esc_html__( 'Enable Rounded Elements', 'seotech' ),
	'section'   => 'global_layout_section',
	'default'   => true,
	'transport' => 'refresh',
	'output'    => [
		[
			'element'  => '.wpcf7-form .wpcf7-form-control.wpcf7-submit, .wpcf7-form .wpcf7-form-control-wrap input[type=email], .wpcf7-form .wpcf7-form-control-wrap input[type=text], .wpcf7-form .wpcf7-form-control-wrap textarea, .wpcf7-form, .quote-banner, .btn, .my-swiper-wrapper, .my-swiper .swiper-slide.my-swiper__slide .my-swiper__content-box, .site-header .main-nav .main-nav__list>li:active>a, .site-header .main-nav .main-nav__list>li:hover>a, .site-header .main-nav .main-nav__list>li ul.sub-menu, .site-header .main-nav .main-nav__list>li ul.sub-menu li a, .another-block, .testimonial-card, .testimonial-card__stars, .testimonials-block .testimonials-swiper .swiper-button-next, .testimonials-block .testimonials-swiper .swiper-button-prev, .advantage-box, .faq-item, .site-header .main-nav .main-nav__list>li ul.sub-menu li:hover>a',
			'property' => 'border-radius',
			'callback' => function( $value ) {
				return $value ? '16px' : '4px';
			},
		],
	],
] );
