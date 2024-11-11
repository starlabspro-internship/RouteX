<?php
get_header();

if (have_rows('sections')) :
    ?>
    <main id="primary" class="site-main">
    <?php
    while (have_rows('sections')) : the_row();

        // Banner Section
        if (get_row_layout() == 'banner') :
            get_template_part('template-parts/flexible-content/hero-section'); //
        endif;
        
        // Cards Section
        if (get_row_layout() == 'cards') :
            get_template_part('template-parts/flexible-content/cards-section'); // works
        endif;
        
        // Why Choose Us Section
        if (get_row_layout() == 'why_choose_us') :
            get_template_part('template-parts/flexible-content/why-choose-us-section'); // works
        endif;
        
        // Client Section
        if (get_row_layout() == 'logos') :
            get_template_part('template-parts/flexible-content/client-section'); // 
        endif;
        
        // Countries Section
        if (get_row_layout() == 'our_countries') :
            get_template_part('template-parts/flexible-content/countries-section'); // works
        endif;
        
        // Visa Section
        if (get_row_layout() == 'visa_category') :
            get_template_part('template-parts/flexible-content/visa-section'); // works
        endif;
        
        // CTA Section
        if (get_row_layout() == 'cta') :
            get_template_part('template-parts/flexible-content/cta-section'); // works
        endif;
        
        // Our Coaching Section
        if (get_row_layout() == 'our_coaching') :
            get_template_part('template-parts/flexible-content/our-coaching-section'); // works
        endif;
        
        // Testimonial Section
        if (get_row_layout() == 'testimonial') :
            get_template_part('template-parts/flexible-content/testimonial-section'); // works
        endif;
        
        // Available Countries Section
        if (get_row_layout() == 'available_countries') :
            get_template_part('template-parts/flexible-content/available-countries-section'); // works
        endif;
        
        // Coaching Section
        if (get_row_layout() == 'supporting_coaching') :
            get_template_part('template-parts/flexible-content/coaching-section'); // works
        endif;
        
        // Process Overview Section
        if (get_row_layout() == 'process_overview') :
            get_template_part('template-parts/flexible-content/process-overview-section'); // works
        endif;
        
        // Recent Blogs Section
        if (get_row_layout() == 'recent_blogs') :
            get_template_part('template-parts/flexible-content/recent-blogs-section'); // works
        endif;

    endwhile; 
?>
    </main>
<?php
    endif;
get_footer();
?>