<?php
/**
 * Advantages Block Template
 *
 */

$item_bg_color = get_sub_field( 'item_bg_color' );
$left_icon     = get_sub_field( 'left_icon' );
$right_icon    = get_sub_field( 'right_icon' );

$bg_style = '';
if ( $item_bg_color ) {
	$bg_style = 'style="--adv-bg-color: ' . esc_attr( $item_bg_color ) . ';"';
}

if ( have_rows( 'advantages_list' ) ): ?>
    <section class="advantages-block <?php echo $item_bg_color ? 'advantages-block--bg' : '' ?>" <?php echo $bg_style; ?>>
        <div class="advantages-block__inner">
            <div class="advantages-block__row">

				<?php
				$row_index = 0;
				while ( have_rows( 'advantages_list' ) ) : the_row();
					$title      = get_sub_field( 'title' );
					$list_type  = get_sub_field( 'list_type' );
					$list_icon  = get_sub_field( 'list_icon' );
					$list_items = get_sub_field( 'list' );

					$row_index ++;
					$icon_data = null;
					if ( $row_index === 1 && ! empty( $left_icon['url'] ) ) {
						$icon_data = $left_icon;
					} elseif ( $row_index === 2 && ! empty( $right_icon['url'] ) ) {
						$icon_data = $right_icon;
					}

					$box_classes = 'advantage-box';
					if ( ! $icon_data ) {
						$box_classes .= ' advantage-box--no-icon';
					}

                    if (!$title) {
                        $box_classes .= ' advantage-box--no-title';
                    }

                    // skip iteration if no title and no list items
                    if (!$title && !$list_items) {
                        continue;
                    }
					?>
                    <div class="<?php echo esc_attr( $box_classes ); ?>">
						<?php if ( $icon_data ) : ?>
                            <div class="advantage-box__icon">
                                <img src="<?php echo esc_url( $icon_data['url'] ); ?>"
                                     alt="<?php echo esc_attr( $icon_data['alt'] ); ?>">
                            </div>
						<?php endif; ?>

						<?php if ( $title ) : ?>
                            <h3 class="advantage-box__title"><?php echo esc_html( $title ); ?></h3>
						<?php endif; ?>

						<?php
						if ( $list_items ) : ?>
                            <ul class="advantage-box__list advantage-box__list--<?php echo esc_attr( $list_type ); ?>">
								<?php while ( have_rows( 'list' ) ) : the_row();
									$text_item = get_sub_field( 'item' );
									if ( ! $text_item ) {
										continue;
									} ?>

                                    <li class="advantage-box__list-item">
										<?php
										if ( $list_type === 'icons' && ! empty( $list_icon['url'] ) ) {
											echo '<img class="advantage-box__list-icon" src="' . esc_url( $list_icon['url'] ) . '" alt="">';
										}
										echo esc_html( $text_item );
										?>
                                    </li>
								<?php endwhile; ?>
                            </ul>
						<?php endif; ?>

                    </div>
				<?php
				endwhile; ?>

            </div>
        </div>
    </section>
<?php
else:
	echo '<p>No advantages found.</p>';
endif;
