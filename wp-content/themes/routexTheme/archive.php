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
				<?php
					echo top_banner();
				?>
			</header><!-- .page-header -->
			
			<div class="col-12">
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
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

			if ( !empty( $pagination_links ) ) {
				echo '<div class="custom-pagination">';
				echo '<div class="custom-pagination-container">';
				foreach ( $pagination_links as $link ) {
					echo '<div class="page-item">' . $link . '</div>';
				}
				echo '</div>';
				echo '</div>';
			};

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
