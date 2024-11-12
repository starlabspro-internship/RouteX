<?php
get_header();

function has_non_empty_cards($cards) {
    foreach ($cards as $card) {
        foreach ($card as $index => $value) {
            if ($index === 'card_bullet_points') {
                if (has_non_empty_values($value)) {
                    return true;
                }
            } elseif (!empty($value)) {
                return true;
            }
        }
    }
    return false;
}

function has_non_empty_values($array) {
    foreach ($array as $item) {
        if (!empty($item['bullet_point_text'])) {
            return true;
        }
    }
    return false;
}

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
            get_template_part('template-parts/flexible-content/cards-section'); 
        endif;
        
        // Why Choose Us Section
        if (get_row_layout() == 'why_choose_us') :
            get_template_part('template-parts/flexible-content/why-choose-us-section'); 
        endif;
        
        // Client Section
        if (get_row_layout() == 'logos') :
            get_template_part('template-parts/flexible-content/client-section'); // 
        endif;
        
        // Countries Section
        if (get_row_layout() == 'our_countries') :
            get_template_part('template-parts/flexible-content/countries-section'); 
        endif;
        
        // Visa Section
        if (get_row_layout() == 'visa_category') :
            get_template_part('template-parts/flexible-content/visa-section'); 
        endif;
        
        // CTA Section
        if (get_row_layout() == 'cta') :
            get_template_part('template-parts/flexible-content/cta-section'); 
        endif;
        
        // Our Coaching Section
        if (get_row_layout() == 'our_coaching') :
            get_template_part('template-parts/flexible-content/our-coaching-section'); 
        endif;
        
        // Testimonial Section
        if (get_row_layout() == 'testimonial') :
            get_template_part('template-parts/flexible-content/testimonial-section'); 
        endif;
        
        // Available Countries Section
        if (get_row_layout() == 'available_countries') :
            get_template_part('template-parts/flexible-content/available-countries-section'); 
        endif;
        
        // Coaching Section
        if (get_row_layout() == 'supporting_coaching') :
            get_template_part('template-parts/flexible-content/coaching-section'); 
        endif;
        
        // Process Overview Section
        if (get_row_layout() == 'process_overview') :
            get_template_part('template-parts/flexible-content/process-overview-section'); 
        endif;
        
        // Recent Blogs Section
        if (get_row_layout() == 'recent_blogs') :
            get_template_part('template-parts/flexible-content/recent-blogs-section'); 
        endif;

    endwhile; 
?>
    </main>
<?php
    endif;
get_footer();
?>