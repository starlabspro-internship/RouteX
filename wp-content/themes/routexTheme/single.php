<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package routexTheme
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php 
		echo top_banner();
	?>
    <div class="container single-post-container">
        <div class="row single-post-row">
            <div class="single-post-content col-12">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="single-post-thumbnail">
                                    <?php the_post_thumbnail( 'large', ['class' => 'img-fluid'] ); ?>
                                </div>
                            <?php endif; ?>

                            <div class="single-post-meta">
                                <span class="meta-item">
                                    <i class="bi bi-person"></i> <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/user-icon-green.svg" class="img-fluid" alt="User Icon">
									By <?php the_author(); ?>
                                </span>
                                <span class="meta-item">
                                    <i class="bi bi-calendar"></i> <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/calendar-icon-green.svg" class="img-fluid" alt="Calendar Icon">
									<?php the_date(); ?>
                                </span>
                            </div>

                            <h1 class="single-post-title"><?php the_title(); ?></h1>

                            <div class="single-post-body">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php endwhile;
                else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'text-domain' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>


<?php
get_footer();
