<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package routexTheme
 */

 // Fetch ACF field values
$footer_logo = get_field('footer_logo', 'options');

// Fetch the 'social_media' group field
$social_media = get_field('social_media', 'options'); // Assuming 'options' page

// Initialize variables for each social media platform
$facebook_url = $instagram_url = $linkedin_url = $x_url = '';
$facebook_logo = $instagram_logo = $linkedin_logo = $x_logo = '';

// Check if the 'social_media' group field exists
if ($social_media) {
    // Facebook
    if (isset($social_media['facebook'])) {
        $facebook = $social_media['facebook'];
        $facebook_url = $facebook['facebook_link'];
        $facebook_logo = $facebook['facebook_logo'];
    }

    // Instagram
    if (isset($social_media['instagram'])) {
        $instagram = $social_media['instagram'];
        $instagram_url = $instagram['instagram_link'];
        $instagram_logo = $instagram['instagram_logo'];
    }

    // LinkedIn
    if (isset($social_media['linkedin'])) {
        $linkedin = $social_media['linkedin'];
        $linkedin_url = $linkedin['linkedin_link'];
        $linkedin_logo = $linkedin['linkedin_logo'];
    }

    // X (formerly Twitter)
    if (isset($social_media['x'])) {
        $x = $social_media['x'];
        $x_url = $x['x_link'];
        $x_logo = $x['x_logo'];
    }
}

?>

	<footer id="colophon" class="site-footer">

		<!-- <div class="site-info">
			<a href="<?php 
            // echo esc_url( __( 'https://wordpress.org/', 'routextheme' ) );
             ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				// printf( esc_html__( 'Proudly powered by %s', 'routextheme' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				// printf( esc_html__( 'Theme: %1$s by %2$s.', 'routextheme' ), 'routextheme', '<a href="http://underscores.me/">Underscores.me</a>' );
				?>
		</div> -->
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
