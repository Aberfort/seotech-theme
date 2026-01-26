<?php
/**
 * Content Sections Template
 *
 */

if ( have_rows( 'content_section' ) ) : ?>
    <section class="my-sections">
		<?php
		while ( have_rows( 'content_section' ) ) : the_row();
			$count = get_sub_field( 'columns_count' );
			$col1  = get_sub_field( 'column_1_content' );
			$col2  = get_sub_field( 'column_2_content' );
			$col3  = get_sub_field( 'column_3_content' );

			if ( ! empty( $col1 ) ) {
				$col1 = sc_acf_add_heading_ids( $col1, '2,3' );
			}
			if ( ! empty( $col2 ) ) {
				$col2 = sc_acf_add_heading_ids( $col2, '2,3' );
			}
			if ( ! empty( $col3 ) ) {
				$col3 = sc_acf_add_heading_ids( $col3, '2,3' );
			}

			$vertical_scroll = get_sub_field( 'vertical_scroll' );
			$block_height    = get_sub_field( 'block_height' );

			$section_class = 'my-section my-section--' . (int) $count . 'col';

			if ( $vertical_scroll === 'on' ) {
				$section_class .= ' my-section--scroll';
			}

			$style_attr = '';
			if ( $vertical_scroll === 'on' && ! empty( $block_height ) ) {
				$height_value = is_numeric( $block_height ) ? $block_height . 'px' : $block_height;

				$style_attr = 'style="max-height:' . esc_attr( $height_value ) . ';"';
			}
			?>
            <div class="<?php echo esc_attr( $section_class ); ?>" <?php echo $style_attr; ?>>
				<?php
				if ( $count >= 1 && $col1 ) : ?>
                    <div class="my-section__col my-section__col1">
						<?php echo wp_kses_post( $col1 ); ?>
                    </div>
				<?php endif; ?>

				<?php if ( $count >= 2 && $col2 ) : ?>
                    <div class="my-section__col my-section__col2">
						<?php echo wp_kses_post( $col2 ); ?>
                    </div>
				<?php endif; ?>

				<?php if ( $count == 3 && $col3 ) : ?>
                    <div class="my-section__col my-section__col3">
						<?php echo wp_kses_post( $col3 ); ?>
                    </div>
				<?php endif; ?>
            </div>
		<?php endwhile; ?>
    </section>
<?php endif;
