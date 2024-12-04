<?php
/**
 * routexTheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package routexTheme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.2' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function routextheme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on routexTheme, use a find and replace
		* to change 'routextheme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'routextheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'routextheme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'routextheme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'routextheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function routextheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'routextheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'routextheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function routextheme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'routextheme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'routextheme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'routextheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function routextheme_scripts() {

	// Enqueue Bootstrap Grid CSS from CDN
    wp_enqueue_style('bootstrap-grid', 'https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css', [], null, 'all');
	
   
	// Enqueue Swiper CSS and JS
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);

	// // Enqueue theme navigation script
	wp_enqueue_script('routextheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	wp_register_style('style', get_template_directory_uri() . '/dist/app.css', [], '_S_VERSION', 'all');
    wp_enqueue_style('style');

	wp_enqueue_script('jquery');

	wp_register_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery'], '_S_VERSION', true);
    wp_enqueue_script('app');

	// Enqueue dynamic colors CSS
	wp_register_style('dynamic-colors', get_template_directory_uri() . '/dynamic-assets/dynamic-colors.php', [], '_S_VERSION', 'all');
    wp_enqueue_style('dynamic-colors');

	wp_enqueue_style('dynamic-fonts', get_template_directory_uri() . '/dynamic-assets/dynamic-fonts.php');
}
add_action( 'wp_enqueue_scripts', 'routextheme_scripts');



add_filter('use_block_editor_for_post', '__return_false');
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function add_google_fonts() {
    wp_enqueue_style( 'plus-jakarta-sans', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'add_google_fonts', 1);

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point($path) {
    // Update the path to save the JSON file in your theme folder
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point($paths) {
    unset($paths[0]);

    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $classes = 'sub-menu';
        $class_names = esc_attr($classes);

        $output .= "\n$indent<ul class=\"$class_names\">\n";
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat("\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'has-children'; // Custom class for styling
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $arrow = $has_children ? '<img src="' . get_template_directory_uri() . '/assets/icons/downwards-arrow-no-tail.svg" alt="Arrow" class="submenu-arrow" />' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= $arrow;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}



if(function_exists('acf_add_options_page')){
	acf_add_options_page(
		array(
			'page_title' => 'Theme Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug' => 'theme-settings',
			'capability' => 'edit_posts'
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Global Settings',
			'menu_title' => 'Global Settings',
			'parent_slug' => 'theme-settings'
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Header Settings',
			'menu_title' => 'Header Settings',
			'parent_slug' => 'theme-settings'
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Footer Settings',
			'menu_title' => 'Footer Settings',
			'parent_slug' => 'theme-settings'
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title' => 'Company Settings',
			'menu_title' => 'Company Settings',
			'parent_slug' => 'theme-settings'
		)
	);
}

function has_non_empty_cards($cards) {
    foreach ($cards as $card) {
        foreach ($card as $index => $value) {
            if ($index === 'card_bullet_points') {
                if (has_non_empty_values($value)) {
                    return true;
                }
			} elseif (!empty($value)) {
                return true;
            } 
        }
    }
    return false;
}

function has_non_empty_text($cards) {
    foreach ($cards as $card) {
        if (!empty($card['service_link_text'])) {
            return true;
        } elseif (!empty($card['link_text'])) {
            return true;
        } elseif (!empty($card['menu_link_text'])) {
            return true;
        }
    }
    return false;
}

function has_non_empty_values($array) {
    foreach ($array as $item) {
        if (!empty($item['bullet_point_text'])) {
            return true;
        }
    }
    return false;
}

function top_banner() {
    ob_start();

    if (is_home() || is_front_page()) {
        return; 
    } else {
        if (is_404()) {
            $error_page = get_field("404", "options");
            $title = $error_page['title'] ?? 'Page Not Found'; 
        } elseif (is_archive()) {
            $title = get_the_archive_title();

            if (is_category()) {
                $title = single_cat_title('', false); 
            }

            $title = str_replace('Archives: ', '', $title); 
            $title = wp_strip_all_tags($title); 
        } elseif (is_singular()) {
            $title = get_the_title(); 
        }
    }
    ?>

    <div class="top-banner">
        <div class="container">
            <h1 class="banner-title"><?php echo esc_html($title); ?></h1> 
        </div>
    </div>

    <?php
    return ob_get_clean(); 
}

add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function ($form) {
    $icon_email = get_template_directory_uri() . '/assets/icons/paper-airplane-darkgreen.svg';
    $icon_phone = get_template_directory_uri() . '/assets/icons/telephone-darkgreen.svg';
    $icon_address = get_template_directory_uri() . '/assets/icons/location-pin-darkgreen.svg';
    $icon_message = get_template_directory_uri() . '/assets/icons/mail-darkgreen.svg';

    $form = preg_replace(
        '/(<input[^>]*name="your-email"[^>]*>)/',
        '<span class="inline-field-wrapper">$1<div class="inline-fields-icon"><img src="' . $icon_email . '" alt="email icon" class="input-icon"></div></span>',
        $form
    );
    
    $form = preg_replace(
        '/(<input[^>]*name="your-phone"[^>]*>)/',
        '<span class="inline-field-wrapper">$1<div class="inline-fields-icon"><img src="' . $icon_phone . '" alt="phone icon" class="input-icon"></div></span>',
        $form
    );

    $form = preg_replace(
        '/(<input[^>]*name="your-address"[^>]*>)/',
        '<span class="inline-field-wrapper">$1<div class="inline-fields-icon"><img src="' . $icon_address . '" alt="address icon" class="input-icon"></div></span>',
        $form
    );

    $form = preg_replace(
        '/(<textarea[^>]*name="your-message"[^>]*>)(.*?)(<\/textarea>)/s',
        '<span class="inline-field-wrapper">$1$2$3<div class="inline-fields-icon"><img src="' . $icon_message . '" alt="message icon" class="input-icon"></div></span>',
        $form
    );

    return $form;
});


function contact_form() {
    $content = get_the_content(); 
    
    $content = apply_filters('the_content', $content); 
    
    return do_shortcode($content); 
}

function register_countries_post_type() {
    $labels = array(
        'name'               => __('Countries', 'routexTheme'),
        'singular_name'      => __('Country', 'routexTheme'),
        'menu_name'          => __('Countries', 'routexTheme'),
        'all_items'          => __('All Countries', 'routexTheme'),
        'add_new_item'       => __('Add New Country', 'routexTheme'),
        'edit_item'          => __('Edit Country', 'routexTheme'),
        'view_item'          => __('View Country', 'routexTheme'),
        'search_items'       => __('Search Countries', 'routexTheme'),
        'not_found'          => __('No Countries Found', 'routexTheme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'countries'),
        'supports'           => array('title', 'editor', 'thumbnail'),
        'menu_icon'          => 'dashicons-location-alt',
        'show_in_rest'       => true,
		'can_export'         => true,
        'menu_position'      => 2,
    );

    register_post_type('countries', $args);
}
add_action('init', 'register_countries_post_type');

add_image_size('blog-large', 850, 416, true);

function register_stories_post_type() {
    $labels = array(
        'name'               => 'Stories',
        'singular_name'      => 'Story',
        'menu_name'          => 'Stories',
        'name_admin_bar'     => 'Story',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Story',
        'new_item'           => 'New Story',
        'edit_item'          => 'Edit Story',
        'view_item'          => 'View Story',
        'all_items'          => 'All Stories',
        'search_items'       => 'Search Stories',
        'not_found'          => 'No Stories found.',
        'not_found_in_trash' => 'No Stories found in Trash.',
        'parent_item_colon'  => 'Parent Story:',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-book',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => true,  // Ensure the archive is enabled
        'rewrite'            => array(
            'slug'       => 'stories', 
            'with_front' => false,
        ),
        'query_var'          => true,
        'show_in_rest'       => true, // Enable Gutenberg support if needed
    );

    register_post_type('stories', $args);
}
add_action('init', 'register_stories_post_type');



function enqueue_google_maps_api() {
    // Enqueue Google Maps API
    wp_enqueue_script(
        'google-maps-api',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyAs90-E-fdAckSikKJruLSj6ItmWupSZok&callback=initMap',  // Use your API key here
        array(),
        null,
        true
    );
    
    // Enqueue Custom Map Initialization Script
    wp_enqueue_script(
        'acf-google-map-script',  // Enqueue custom script to initialize the map
        get_template_directory_uri() . '/js/google-map.js',
        array('google-maps-api'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_google_maps_api');

function custom_styles() {
    $image_url = esc_url(get_template_directory_uri() . '/assets/icons/downwards-arrow-no-tail.svg');
	$image_2_url = esc_url(get_template_directory_uri() . '/assets/img/coaching-bg-img.png');
    $image_3_url = esc_url(get_template_directory_uri() . '/assets/img/process-bg.png');
	$image_4_url = esc_url(get_template_directory_uri() . '/assets/img/Map.png');

    $custom_css = "
		.footer__area-common {
			background-image: url('{$image_4_url}');
		}

		.process-overview-bg-img {
			background-image: url('{$image_3_url}');
		}

		.our-coaching-bg-img {
			background-image: url('{$image_2_url}');	
		}

        // #primary-menu li a::after {
        //     content: '';
        //     margin-left: 5px;
        //     width: 9px;
        //     height: 7px;
        //     background-image: url('{$image_url}');
        //     background-size: contain;
        //     background-repeat: no-repeat;
        //     display: inline-block;
        //     vertical-align: middle;
        // }
    ";
    
    wp_add_inline_style('style', $custom_css);
}
add_action('wp_enqueue_scripts', 'custom_styles');
