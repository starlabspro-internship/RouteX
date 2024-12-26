<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package routexTheme
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php if ( have_posts() ) : ?>
        <header class="page-header">
            <?php echo top_banner(); ?>
        </header>
		<div class="archive-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', get_post_type() );
                        endwhile;

                        global $wp_query;
                        $big = 999999999;

                        $pagination_links = paginate_links( array(
                            'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                            'format'  => '?paged=%#%',
                            'current' => max( 1, get_query_var( 'paged' ) ),
                            'total'   => $wp_query->max_num_pages,
                            'type'    => 'array',
                            'prev_text' => '<img src="' . get_template_directory_uri() . '/assets/icons/left-arrow-green-noTail.svg" alt="left-arrow-green-noTale" />',
                            'next_text' => '<img src="' . get_template_directory_uri() . '/assets/icons/right-arrow-green-noTail.svg" alt="right-arrow-green-noTale" />',
                        ) );

                        if ( !empty( $pagination_links ) ) :
                            echo '<div class="custom-pagination">';
                            echo '<div class="custom-pagination-container">';
                            foreach ( $pagination_links as $link ) :
                                echo '<div class="page-item">' . $link . '</div>';
                            endforeach;
                            echo '</div>';
                            echo '</div>';
                        endif;
                        ?>
                    </div>
                    <?php get_template_part('blog-sidebar'); ?>
                </div>
            </div>
        </div>
    <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

    <?php endif; ?>
</main>

<?php
get_footer();
?>
