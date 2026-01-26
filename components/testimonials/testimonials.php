<?php
/**
 * Testimonials Slider Block Template
 *
 */

$card_bg_color  = get_sub_field( 'card_bg_color' );
$stars_bg_color = get_sub_field( 'stars_bg_color' );
$has_rating     = get_sub_field( 'rating' );
$has_quotes     = get_sub_field( 'quotes' );

if ( have_rows( 'items' ) ) : ?>
    <section class="testimonials-block"
             style="
                 --testimonial-bg-color: <?php echo esc_attr( $card_bg_color ?: '#2E4A6B' ); ?>;
                 --stars-bg-color: <?php echo esc_attr( $stars_bg_color ?: '#14273E' ); ?>;
                 ">
        <div class="testimonials-block__wrapper">
            <div class="testimonials-swiper swiper-container">
                <div class="swiper-wrapper">
					<?php
					while ( have_rows( 'items' ) ) : the_row();
						$item_rating      = get_sub_field( 'rating' );
						$item_quotes_icon = get_sub_field( 'quotes_icon' );
						$item_content     = get_sub_field( 'content' );
						$person_name      = get_sub_field( 'person_name' );
						$person_image     = get_sub_field( 'person_image' );
						$how_long_ago     = get_sub_field( 'how_long_ago' );

						$rating_html = '';
						if ( $has_rating == 'on' && $item_rating ) {
							$max_stars   = 5;
							$rating_html .= '<div class="testimonial-card__stars">';
							for ( $i = 1; $i <= $max_stars; $i ++ ) {
								if ( $i <= $item_rating ) {
									$rating_html .= '<span class="star star--active">★</span>';
								} else {
									$rating_html .= '<span class="star star--inactive">★</span>';
								}
							}
							$rating_html .= '</div>';
						}

						$quotes_html = '';
						if ( $has_quotes == 'on' && ! empty( $item_quotes_icon['url'] ) ) {
							$quotes_html = '<div class="testimonial-card__quotes-icon">'
							               . '<img src="' . esc_url( $item_quotes_icon['url'] ) . '" alt="quotes">'
							               . '</div>';
						}
						?>
                        <div class="swiper-slide testimonial-card <?php echo ( $has_quotes == 'on' ) ? 'has-quotes' : ''; ?>">
							<?php
							echo $rating_html;

							echo $quotes_html;
							echo $quotes_html;
							?>
                            <div class="testimonial-card__content">
								<?php echo wp_kses_post( $item_content ); ?>
                            </div>

                            <div class="testimonial-card__person">
								<?php if ( ! empty( $person_image['url'] ) ): ?>
                                    <div class="testimonial-card__avatar">
                                        <img src="<?php echo esc_url( $person_image['url'] ); ?>" alt="<?php echo esc_attr( $person_name ); ?>">
                                    </div>
								<?php endif; ?>

                                <div class="testimonial-card__person-info">
                                    <div class="testimonial-card__person-name">
										<?php echo esc_html( $person_name ); ?>
                                    </div>
                                </div>
								<?php if ( $how_long_ago ): ?>
                                    <div class="testimonial-card__how-long-ago">
										<?php echo esc_html( $how_long_ago ); ?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
						<?php
						$review_array = [
							"@context"   => 'https://schema.org/',
							'@type'      => 'Review',
							'reviewBody' => wp_strip_all_tags( $item_content ),
							'author'     => [
								'@type' => 'Person',
								'name'  => $person_name ?: 'Anonymous'
							]
						];

						if ( $has_rating === 'on' && $item_rating ) {
							$review_array['reviewRating'] = [
								'@type'       => 'Rating',
								'ratingValue' => (int) $item_rating,
								'bestRating'  => 5,
								'worstRating' => 1
							];
						}

						$reviews_schema[] = $review_array;
					endwhile; ?>
                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
	<?php
	if ( ! empty( $reviews_schema ) ) :
		$schema_ld = [
			'@context' => 'https://schema.org',
			'@graph'   => $reviews_schema,
		];
		?>
        <script type="application/ld+json">
            <?php echo wp_json_encode( $schema_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>



        </script>
	<?php
	endif;
	?>
<?php
else :
	echo '<p>' . esc_html__( 'No testimonials found.', 'seotech' ) . '</p>';
endif;
