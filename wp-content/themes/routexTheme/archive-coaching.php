<?php
/**
 * Template Name: Coaching Archive
 */

get_header();
?>

<?php echo top_banner(); ?>

<div class="coaching-archive-container container py-5">
    <div class="row gx-4 gy-5">
        <?php
        $args = array(
            'post_type'      => 'coaching',
            'posts_per_page' => 9,
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        );
        $coaching_query = new WP_Query($args);

        if ($coaching_query->have_posts()) :
            while ($coaching_query->have_posts()) : $coaching_query->the_post();
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="custom-coaching-card d-flex flex-row">
                    <img src="<?php echo esc_url($featured_img_url); ?>" class="custom-card-img" alt="<?php the_title(); ?>">
                    <div class="custom-card-body">
                        <h5 class="custom-card-title"><?php the_title(); ?></h5>
                        <p class="custom-card-text">
                            <?php echo wp_trim_words(get_the_content(), 8, '...'); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>" class="custom-card-link">
    Read More
    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/upright-arrow-lightgreen.svg'); ?>" alt="button-upright-arrow">
</a>

                    </div>
                </div>
            </div>
        <?php
            endwhile;
        else :
        ?>
            <p class="text-center">No coaching posts found.</p>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php
$pagination_links = paginate_links(array(
    'base'    => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
    'format'  => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total'   => $coaching_query->max_num_pages,
    'type'    => 'array',
    'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/icons/left-arrow-green-noTail.svg" alt="Previous" />',
    'next_text' => '<img src="' . get_template_directory_uri() . '/assets/icons/right-arrow-green-noTail.svg" alt="Next" />',
));

if (!empty($pagination_links)) :
    echo '<div class="custom-pagination">';
    echo '<div class="custom-pagination-container">';
    foreach ($pagination_links as $link) {
        echo '<div class="page-item">' . $link . '</div>';
    }
    echo '</div></div>';
endif;
?>

<?php get_footer(); ?>