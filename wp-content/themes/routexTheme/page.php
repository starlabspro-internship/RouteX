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
        // get_template_part('template-parts/hero-section'); 
        ?>
        <?php 
        get_template_part('template-parts/countries-section');
         ?>
    </div>

    <!-- <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Slide 1</div>
            <div class="swiper-slide">Slide 2</div>
            <div class="swiper-slide">Slide 3</div>
        </div>
        
        <div class="swiper-pagination"></div>

        
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div> -->

</main>

<?php
// get_sidebar();
get_footer();