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

    <div class="template-home">
        <?php 
            get_template_part('template-parts/flexible-content/hero-section');
            get_template_part('template-parts/flexible-content/cards-section');
            get_template_part('template-parts/flexible-content/client-section');
            get_template_part('template-parts/flexible-content/countries-section');
            get_template_part('template-parts/flexible-content/visa-section');
            get_template_part('template-parts/flexible-content/available-countries-section');
            get_template_part('template-parts/flexible-content/coaching-section');
         ?>
    </div>

</main>

<?php
// get_sidebar();
get_footer();