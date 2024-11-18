<?php
// elona
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
//engjell 
// require_once( $_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-load.php' );
//leka
// require_once( $_SERVER['DOCUMENT_ROOT'] . '/RouteX/wp-load.php' );

header("Content-type: text/css");

// Fetch the fonts group from ACF
$fonts = get_field('fonts', 'options'); // Adjust field name if necessary

if ($fonts) {
    // Output @import rules for primary and secondary fonts
    if (!empty($fonts['primary_font']['font_url'])) {
        $primary_font_url = esc_url($fonts['primary_font']['font_url']); // Ensure URL is safe
        echo "@import url('$primary_font_url');\n"; // Import primary font
    }
    
    if (!empty($fonts['secondary_font']['font_url'])) {
        $secondary_font_url = esc_url($fonts['secondary_font']['font_url']); // Ensure URL is safe
        echo "@import url('$secondary_font_url');\n"; // Import secondary font
    }

    // Define primary and secondary font families
    $primary_font_family = esc_attr($fonts['primary_font']['font_name']); // Get primary font name
    $secondary_font_family = esc_attr($fonts['secondary_font']['font_name']); // Get secondary font name

}
?>

:root {
--primary-font-family: '<?php echo  $primary_font_family; ?>', sans-serif;
--secondary-font-family: '<?php echo $secondary_font_family; ?>', sans-serif;
}