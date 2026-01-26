<?php
/**
 * FAQ Block Template
 */

$item_bg_color       = get_sub_field( 'item_bg_color' );
$item_bg_hover_color = get_sub_field( 'item_bg_hover_color' );
$item_icon           = get_sub_field( 'item_icon' );
$title               = get_sub_field( 'title' );
?>
<section class="faq-block"
         style="
             --faq-item-bg: <?php echo esc_attr( $item_bg_color ?: '#2E4A6B' ); ?>;
             --faq-item-bg-hover: <?php echo esc_attr( $item_bg_hover_color ?: '#14273E' ); ?>;
             --faq-icon: url('<?php echo esc_url( $item_icon['url'] ?? '' ); ?>');
             "
         itemscope itemtype="https://schema.org/FAQPage"
>
    <div class="faq-block__inner">

		<?php if ( ! empty( $title ) ): ?>
            <h2><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>

		<?php if ( have_rows( 'faq_items' ) ) : ?>
            <div class="faq-accordion" id="faqAccordion">
				<?php
				$index = 0;
				while ( have_rows( 'faq_items' ) ) :
					the_row();
					$faq_icon     = get_sub_field( 'faq_icon' );
					$faq_question = get_sub_field( 'faq_question' );
					$faq_answer   = get_sub_field( 'faq_answer' );

					$icon_html = '';
					if ( ! empty( $faq_icon['url'] ) ) {
						$icon_html = '<img src="' . esc_url( $faq_icon['url'] ) . '" alt="' . esc_attr( $faq_icon['alt'] ) . '">';
					}

					$index ++;
					?>
                    <div class="faq-item"
                         data-faq-index="<?php echo $index; ?>"
                         itemscope
                         itemprop="mainEntity"
                         itemtype="https://schema.org/Question"
                    >
                        <div class="faq-item__header">
                            <div class="faq-item__icon">
								<?php echo $icon_html; ?>
                            </div>

                            <div class="faq-item__question" itemprop="name">
								<?php echo esc_html( $faq_question ); ?>
                            </div>

                            <div class="faq-item__toggle" aria-label="Toggle FAQ Item"></div>
                        </div>

                        <div class="faq-item__content"
                             itemscope
                             itemprop="acceptedAnswer"
                             itemtype="https://schema.org/Answer"
                        >
                            <div class="faq-item__answer" itemprop="text">
								<?php echo wp_kses_post( $faq_answer ); ?>
                            </div>
                        </div>
                    </div>
				<?php endwhile; ?>
            </div>
		<?php else: ?>
            <p><?php esc_html_e( 'No FAQ items found.', 'seotech' ); ?></p>
		<?php endif; ?>

    </div>
</section>
