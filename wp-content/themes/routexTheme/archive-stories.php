<?php
/**
 * Template Name: Stories Archive
 */

get_header();
?>

    <?php
        echo top_banner();
    ?>

<div class="container my-5 story-archive-container">
    <div class="row">
        <?php
        // WP_Query to fetch the custom post type 'stories'
        $args = array(
            'post_type'      => 'stories', // Correct post type here
            'posts_per_page' => 6, // Number of posts per page
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // Pagination
        );
        $story_query = new WP_Query($args);

        if ($story_query->have_posts()) :
            $counter = 0;
            while ($story_query->have_posts()) : $story_query->the_post();
                $counter++;

                // Fetch custom fields for the story
                $story_excerpt = get_field('story_excerpt'); 
                $person_story_icon = get_field('person_story_icon'); 
                $person_story_name = get_field('person_story_name');
                $person_story_position = get_field('person_story_position');
        ?>
                <div class="col-md-6 mb-4 story-rows">
                    <?php
                    // Determine card class based on counter value
                    if ($counter === 1 || $counter === 4 || $counter === 5) {
                        $card_class = 'primary';
                    } elseif ($counter === 2 || $counter === 3 || $counter === 6 || $counter === 7) {
                        $card_class = 'contrast';
                    } else {
                        $card_class = ($counter % 2 === 0) ? 'contrast' : 'primary';
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="story-card-link">
                        <div class="card story-card p-4 text-center card-<?php echo $card_class; ?>">

                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/quotation-green.svg" alt="Quotation" class="mb-3">

                            <p class="story-text mb-3">
                                <?php echo wp_trim_words($story_excerpt, 40, '...'); ?>
                            </p>

                            <div class="story-card-details">
                                <img class="story-card-icon" src="<?php echo esc_url($person_story_icon); ?>" alt="Person Icon" class="story-icon mb-3">
                                <div class="story-card-person">
                                    <p class="story-card-person-name"><strong><?php echo esc_html($person_story_name); ?></strong></p>
                                    <p class="story-card-person-position"><?php echo esc_html($person_story_position); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        <?php
            endwhile;
        else :
        ?>
            <p class="text-center">No stories found.</p>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>

    <?php
    // Pagination
    $big = 999999999; // Unique number to be replaced by page number in pagination links
    $pagination_links = paginate_links( array(
        'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'  => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total'   => $story_query->max_num_pages,
        'type'    => 'array',
        'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/icons/left-arrow-green-noTail.svg" alt="left-arrow-green-noTail" />',
        'next_text' => '<img src="' . get_template_directory_uri() . '/assets/icons/right-arrow-green-noTail.svg" alt="right-arrow-green-noTail" />',
    ) );

    if ( !empty( $pagination_links ) ) :
        echo '<div class="custom-pagination">';
        echo '<div class="custom-pagination-container">';
        foreach ( $pagination_links as $link ) {
            echo '<div class="page-item">' . $link . '</div>';
        }
        echo '</div>';
        echo '</div>';
    endif;
    ?>
</div>

<?php get_footer(); ?>
