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

			<div class="container">
				<div class="row">
					<!-- Main Content (col-md-8) -->
					<div class="col-12 col-md-8">
								
									<?php
									while ( have_posts() ) :
										the_post();

										get_template_part( 'template-parts/content', get_post_type() );

									endwhile; 
									?>
					</div>

						<?php get_template_part('blog-sidebar'); ?>
						
					</div>
			</div>

	</main><!-- #main -->

<?php
get_footer();
