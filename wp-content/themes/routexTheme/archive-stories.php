<?php
/**
 * Template Name: Stories Archive
 */

get_header();
?>

    <?php
        echo top_banner();
    ?>

<div class="story-archive-container top-bottom-small">
    <div class="row">
        <?php
        $args = array(
            'post_type'      => 'stories',
            'posts_per_page' => 6,
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        );
        $story_query = new WP_Query($args);

        if ($story_query->have_posts()) :
            $counter = 0;
            while ($story_query->have_posts()) : $story_query->the_post();
                $counter++;

                $person_story_icon = get_field('person_story_icon'); 
                $success_story_small_img_url = wp_get_attachment_image_url($person_story_icon, 'success-story-small-img');
                $person_story_name = get_field('person_story_name');
                $person_story_position = get_field('person_story_position');
        ?>
            <div class="col-md-6">
                <?php
                if ($counter === 1 || $counter === 4 || $counter === 5) {
                    $card_class = 'primary';
                } elseif ($counter === 2 || $counter === 3 || $counter === 6 || $counter === 7) {
                    $card_class = 'contrast';
                } else {
                    $card_class = ($counter % 2 === 0) ? 'contrast' : 'primary';
                }
                ?>
                <div class="story-card-contaiener">
                    <a href="<?php the_permalink(); ?>" class="story-card-link">
                        <div class="story-card card-<?php echo $card_class; ?>">
                            <div>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/quotation-green.svg" alt="Quotation">

                                <p class="story-text">
                                    <?php echo substr(get_the_excerpt(), 0, 70) . '...'; ?>
                                </p>
                            </div>

                        <div class="story-card-details">
                            <img class="story-card-icon" src="<?php echo esc_url($success_story_small_img_url); ?>" alt="Person Icon" class="story-icon">
                            <div class="story-card-person">
                                <p class="story-card-person-name"><strong><?php echo esc_html($person_story_name); ?></strong></p>
                                <p class="story-card-person-position"><?php echo esc_html($person_story_position); ?></p>
                            </div>
                        </div>
                        </div>
                    </a>
                </div>
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
