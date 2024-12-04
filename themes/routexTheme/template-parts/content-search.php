<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package routexTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<img src="<?php the_post_thumbnail_url('blog-large'); ?>" alt="Blog Image" />

		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">

				<p><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/user-icon.svg" alt="user-icon" />By <?php the_author(); ?></p>

				<?php
				$date =  get_the_date('F j, Y')
				?>

				<p><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/date-icon.svg" alt="date-icon" /><?php echo $date ?></p>
			</div>
		<?php endif; 
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php
	if ( !is_singular() ) : ?>
		<div class="entry-button">
			<a class="entry-button-link" href="<?= esc_url( get_permalink() ) ?>" rel="bookmark"><button>Learn More <img src="<?= get_template_directory_uri(); ?>/assets/icons/right-arrow-white-bigger-tale.svg" alt="date-icon" /></button></a>
		</div>
	<?php endif; ?>

	<footer class="entry-footer">
		<?php //routextheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
