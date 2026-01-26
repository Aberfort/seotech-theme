<?php get_header(); ?>

<main id="single-main">
    <div class="container">

		<?php if ( have_posts() ) { ?>
            <main class="single-page"><?php
			while ( have_posts() ) {
				the_post();
				the_content();
			} ?>
            </main><?php
		} else {
			get_404_template();
		} ?>

    </div>
</main>

<?php get_footer(); ?>
