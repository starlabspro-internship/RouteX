<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package routexTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<img class="thumbnail-img" src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="Blog Image" />

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				$fname = get_the_author_meta('nickname');
				$user_icon = is_singular() ? 'user-icon-green.svg' : 'user-icon.svg';
				$date_icon = is_singular() ? 'date-icon-green.svg' : 'date-icon.svg';
				?>

				<p><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo $user_icon; ?>" alt="user-icon" />By <?php echo $fname; ?></p>

				<?php
				$date = get_the_date('F j, Y');
				?>

				<p><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/<?php echo $date_icon; ?>" alt="date-icon" /><?php echo $date; ?></p>
			</div>
		<?php endif; 

		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header>

	<div class="entry-content">
		<?php
		if ( is_singular() ) :
			the_content(
				sprintf(
					wp_kses(
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'routextheme' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'routextheme' ),
					'after'  => '</div>',
				)
			);
		else :
			the_excerpt();
		endif; ?>
	</div>
	
	<?php
	if ( !is_singular() ) : ?>
		<div class="entry-button">
			<a class="entry-button-link" href="<?= esc_url( get_permalink() ) ?>" rel="bookmark"><button>Learn More <img src="<?= get_template_directory_uri(); ?>/assets/icons/right-arrow-white-bigger-tale.svg" alt="date-icon" /></button></a>
		</div>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
