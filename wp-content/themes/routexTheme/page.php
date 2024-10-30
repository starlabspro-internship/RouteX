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

    <?php get_template_part('template-parts/flexible-content/hero-section'); ?>
    <?php get_template_part('template-parts/flexible-content/cards-section'); ?>
    <?php get_template_part('template-parts/flexible-content/client-section'); ?>


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
    the_post();
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
    endwhile; // End of the loop.
	?>


    <script src="<?php echo get_template_directory_uri(); ?>/app.js"></script>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();