<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/RouteX/wp-load.php' );

header("Content-type: text/css");

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

.footer-logo {
    --footer-logo: url('<?php echo $footer_logo; ?>');
}

.social-media-facebook {
    --facebook-logo: url('<?php echo esc_url($facebook_logo); ?>');
    --facebook-url: '<?php echo esc_url($facebook_url); ?>';
}

.social-media-instagram {
    --instagram-logo: url('<?php echo esc_url($instagram_logo); ?>');
    --instagram-url: '<?php echo esc_url($instagram_url); ?>';
}

.social-media-linkedin {
    --linkedin-logo: url('<?php echo esc_url($linkedin_logo); ?>');
    --linkedin-url: '<?php echo esc_url($linkedin_url); ?>';
}

.social-media-x {
    --x-logo: url('<?php echo esc_url($x_logo); ?>');
    --x-url: '<?php echo esc_url($x_url); ?>';
}