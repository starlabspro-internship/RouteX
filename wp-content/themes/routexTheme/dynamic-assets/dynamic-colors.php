<?php
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/');
}

require_once(ABSPATH . '/wp-load.php');

header("Content-type: text/css");

$brand_colors = get_field('brand_colors', 'options');
$dark_mode = get_field('dark_mode', 'options') ?: false;  

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
$extra_color = esc_attr($brand_colors['extra_color']);

?>

/* Dark mode styles */
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
  --extra-color: <?php echo $extra_color; ?>;
}

body.dark-mode {
  --primary-color: <?php echo $positives_color; ?>;
  --secondary-color: <?php echo $accent_color; ?>;
  --base-color: <?php echo $accent_color; ?>;
  --contrast-color: <?php echo $secondary_color; ?>;
  --light-color: <?php echo $light_color; ?>;
  --dark-color: <?php echo $dark_color; ?>;
  --accent-color: <?php echo $accent_color; ?>;
  --negatives-color: <?php echo $negatives_color; ?>;
  --neutrals-color: <?php echo $neutrals_color; ?>;
  --positives-color: <?php echo $positives_color; ?>;
  --extra-color: <?php echo $extra_color; ?>;
}


body.dark-mode img[src*="passport-icon.svg"], 
body.dark-mode img[src*="green-checkmark.svg"], 
body.dark-mode img[src*="subtitle-icon-3.svg"], 
body.dark-mode img[src*="right-arrow-light-green-without-tale.svg"], 
body.dark-mode img[src*="downwards-arrow-no-tail.svg"], 
body.dark-mode img[src*="button-upright-arrow-white.svg"], 
body.dark-mode img[src*="right-arrow-white-bigger-tale.svg"], 
body.dark-mode img[src*="button-upright-arrow.svg"], 
body.dark-mode img[src*="left-arrow.svg"], 
body.dark-mode img[src*="right-arrow.svg"],
body.dark-mode img[src*="subtitle-icon-2.svg"],
body.dark-mode img[src*="right-arrow-green-noTail.svg"],
body.dark-mode img[src*="upright-arrow-green-noTail.svg"],
body.dark-mode img[src*="date-icon.svg"],
body.dark-mode img[src*="user-icon.svg"],
body.dark-mode svg-link, 
body.dark-mode svg-link2 {
  filter: brightness(0) invert(1);
  color: white;
}

body.dark-mode .entry-title a,
body.dark-mode .country-single,
body.dark-mode .custom-card-text,
body.dark-mode .entry-meta p{
  color: var(--accent-color);
}


/* For inline SVGs in dark mode */
body.dark-mode .decorative-icon svg,
body.dark-mode #dark-mode-toggle svg,
body.dark-mode .card-bottom-layout .svg-link:hover path{
    filter: brightness(0) invert(1);
}

body.dark-mode .arrow-icon.default-img {
  filter: brightness(0) invert(1);
}

body.dark-mode .footer__area-common{
  background-color: var(--secondary-color);
}

body.dark-mode .footer__copyright-menu ul li a:hover,
body.dark-mode .footer__link ul li a:hover{
  color: var(--primary-color);
}


/* Dark Mode Image Adjustment */
body.dark-mode .client-img {
  filter: invert(5) brightness(5); /* Example dark mode filter */
}

body.dark-mode .countries-archive-section .continents-list .list-group-item.active a{
  color: var(--contrast-color);
}

body.dark-mode .process-overview-item{
  background-color: var(--accent-color);
  span{
    color: var(--positives-color);
  }
  h5{
    color: var(--positives-color);
  }
  p{
    color: var(--positives-color);
  }
}

body.dark-mode .recent-blog-item-text,
body.dark-mode .contact-card .card-body,
body.dark-mode .card1,
body.dark-mode .visa-card,
body.dark-mode .available-countries-item,
body.dark-mode .our-coaching-section-container .card-container .card{
  border-color: var(--accent-color);
}

body.dark-mode .continents-list hr{
  background-color: var(--accent-color);
}

body.dark-mode .available-countries-item:hover {
    box-shadow: 0px 1px 20px var(--accent-color);
}

body.dark-mode .appointment-button:hover,
body.dark-mode #dark-mode-toggle:hover,
body.dark-mode .hero-section .btn-wrapper .btn-transparent:hover,
body.dark-mode .entry-button button:hover,
body.dark-mode .countries-swiper-slide-single-content-button a:hover,
body.dark-mode .available-countries-section-button:hover,
body.dark-mode .countries-section-button:hover,
body.dark-mode .story-card{
  background-color: var(--contrast-color);
  color: var(--accent-color);
}

body.dark-mode .story-buttons a{
  color: var(--positives-color);
  &:hover{
    color: var(--accent-color);
  }
}

body.dark-mode #primary-menu li a:hover,
body.dark-mode #primary-menu .menu-item-has-children > .sub-menu > li > a:hover,
body.dark-mode .hero-section .btn-wrapper .video-text{
  transition: ease 0.5s;
  color: var(--contrast-color);
}

body.dark-mode .footer__link ul li a:hover,
body.dark-mode .footer__copyright-menu ul li a:hover{
  transition: ease 0.5s;
  color: var(--extra-color);
}


body.dark-mode {
  background-color: var(--primary-color);
  color: var(--contrast-color);
}
