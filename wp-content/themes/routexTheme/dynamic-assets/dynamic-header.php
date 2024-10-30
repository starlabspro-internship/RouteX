<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/RouteX/wp-load.php' );

header("Content-type: text/css");

// Fetch ACF field values
$header_logo = get_field('header_logo', 'options');

// Get the image URL from the returned array
// $header_logo_url = $header_logo['url'];

?>

.header-logo {
    --header-logo: url('<?php echo $header_logo; ?>');
}