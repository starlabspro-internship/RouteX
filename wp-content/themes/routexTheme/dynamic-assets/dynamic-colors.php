<?php
//elona
//engjell & leka
 require_once( $_SERVER['DOCUMENT_ROOT'] . '/wordpress/wp-load.php' );

header("Content-type: text/css");

// Fetch ACF field values
$brand_colors = get_field('brand_colors', 'options');
// Sanitize each color
$primary_color = esc_attr($brand_colors['primary']);
$secondary_color = esc_attr($brand_colors['secondary']);
$base_color = esc_attr($brand_colors['base']);
$contrast_color = esc_attr($brand_colors['contrast']);
$light_color = esc_attr($brand_colors['light']);
$dark_color = esc_attr($brand_colors['dark']);
$accent_color = esc_attr($brand_colors['accent']);
$negatives_color = esc_attr($brand_colors['negatives']);
$neutrals_color = esc_attr($brand_colors['neutrals']);
$positives_color = esc_attr($brand_colors['positives']);

?>

:root {
--primary-color: <?php echo $primary_color; ?>;
--secondary-color: <?php echo $secondary_color; ?>;
--base-color: <?php echo $base_color; ?>;
--contrast-color: <?php echo $contrast_color; ?>;
--light-color: <?php echo $light_color; ?>;
--dark-color: <?php echo $dark_color; ?>;
--accent-color: <?php echo $accent_color; ?>;
--negatives-color: <?php echo $negatives_color; ?>;
--neutrals-color: <?php echo $neutrals_color; ?>;
--positives-color: <?php echo $positives_color; ?>;
}