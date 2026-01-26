<?php
get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
	    <?php if ( ! is_front_page() && ! is_home() ) : ?>
            <div class="container">
			    <?php
			    if ( function_exists( 'yoast_breadcrumb' ) ) {
				    yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
			    }
			    ?>
            </div>
	    <?php endif; ?>
        <?php
		// Start the Loop
		while ( have_posts() ) : the_post();
			?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( have_rows( 'page_blocks' ) ) : ?>
					<?php
					while ( have_rows( 'page_blocks' ) ) : the_row();

						if ( get_row_layout() === 'main_banner' ) {
							get_template_part( 'components/main-banner/main-banner' );

						} elseif ( get_row_layout() === 'content_banner' ) {
							get_template_part( 'components/content-banner/content-banner' );
						} elseif ( get_row_layout() === 'sticky_banner' ) {
							get_template_part( 'components/sticky-banner/sticky-banner' );
						} elseif ( get_row_layout() === 'slider' ) {
							get_template_part( 'components/slider/slider' );
						} elseif ( get_row_layout() === 'faq' ) {
							get_template_part( 'components/faq/faq' );
						} elseif ( get_row_layout() === 'testimonials' ) {
							get_template_part( 'components/testimonials/testimonials' );
						} elseif ( get_row_layout() === 'blockquotes' ) {
							get_template_part( 'components/blockquotes/blockquotes' );
						} elseif ( get_row_layout() === 'advantages' ) {
							get_template_part( 'components/advantages/advantages' );
						} elseif ( get_row_layout() === 'buttons_block' ) {
							get_template_part( 'components/buttons-block/buttons-block' );
						} elseif ( get_row_layout() === 'content' ) {
							get_template_part( 'components/content/content' );
						} elseif ( get_row_layout() === 'shortcode' ) {
							get_template_part( 'components/shortcode/shortcode' );
						}
					endwhile;
					?>
				<?php endif; ?>

            </article>
		<?php
		endwhile; // end of the loop
		?>
    </div>
</main>

<?php get_footer(); ?>
