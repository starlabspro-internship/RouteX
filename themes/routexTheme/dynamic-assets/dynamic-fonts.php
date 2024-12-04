<?php

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/');
  }
  
require_once(ABSPATH . '/wp-load.php');

header("Content-type: text/css");

$fonts = get_field('fonts', 'options');

if ($fonts) {
    if (!empty($fonts['primary_font']['font_url'])) {
        $primary_font_url = esc_url($fonts['primary_font']['font_url']);
        echo "@import url('$primary_font_url');\n";
    }
    
    if (!empty($fonts['secondary_font']['font_url'])) {
        $secondary_font_url = esc_url($fonts['secondary_font']['font_url']);
        echo "@import url('$secondary_font_url');\n";
    }

    $primary_font_family = esc_attr($fonts['primary_font']['font_name']);
    $secondary_font_family = esc_attr($fonts['secondary_font']['font_name']);

}
?>

:root {
--primary-font-family: '<?php echo  $primary_font_family; ?>', sans-serif;
--secondary-font-family: '<?php echo $secondary_font_family; ?>', sans-serif;
}