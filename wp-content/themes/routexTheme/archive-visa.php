<?php
/**
 * Template Name: Visa Archive
 */
get_header();
echo top_banner();
?>

<div class="visa-section top-bottom-small">
    <div class="row">
        <?php
        $args = array(
            'post_type'      => 'visa',
            'posts_per_page' => 6,
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        );
        $visa_query = new WP_Query($args);

        if ($visa_query->have_posts()) :
            while ($visa_query->have_posts()) : $visa_query->the_post();
                $visa_title = get_the_title();
                $visa_short_text = get_field('visa_short_text'); 
                $visa_icon = get_field('visa_icon');
                $visa_icon_url = wp_get_attachment_image_url($visa_icon, 'visa-icon');
        ?>
            <div class="col-md-6">
                <div class="visa-card">
                    <div class="col-lg-6">
                        <div class="visa-image">
                            <img src="<?php the_post_thumbnail_url('visa-category-img') ?>" alt="Visa Image" class="img-fluid">
                        </div>
                    </div>
                
                    <?php if ($visa_title || $visa_short_text || $visa_icon) : ?>
                    <div class="col-lg-6">
                        <div class="visa-content">
                            <?php if ($visa_title) : ?>
                                <h2 class="text-center visa-card-title"><?php echo esc_html($visa_title); ?></h2>
                            <?php endif; ?>

                            <?php if ( $visa_short_text) : ?>
                                <h5><?php echo esc_html( $visa_short_text); ?></h5>
                            <?php endif; ?>

                            <?php if ($visa_icon) : ?>
                            <div class="card-bottom-layout">
                                <div class="link-container">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo file_get_contents(get_template_directory() . '/assets/icons/upright-arrow-light-green.svg');?>
                                    </a>
                                </div>

                                <?php if ($visa_icon) : ?>
                                <div class="visa-icon-container">
                                    <div class="behind-circle"></div>
                                    <?php echo file_get_contents($visa_icon_url);?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
            endwhile;
        else :
        ?>
            <p class="text-center">No visas found.</p>
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
        'total'   => $visa_query->max_num_pages,
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
