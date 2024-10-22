<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package routexTheme
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- This is a bootstrap test you can remove the next 2 rows -->
    <div class="alert alert-success" role="alert"> This is a success alert—check it out!</div>
    <button type="button" class="btn btn-primary">Primary Button</button>

    <?php
		while ( have_posts() ) :
			the_post();?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php get_template_part( 'template-parts/content', 'page' ); ?>
            </div>
        </div>
    </div>
    <?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();