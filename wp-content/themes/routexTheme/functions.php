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
	define( '_S_VERSION', '1.0.0' );
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
	
    // Enqueue Bootstrap CSS and JS
	wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);

	// Enqueue Swiper CSS and JS
	wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/swiper/swiper-bundle.min.css');
	wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/swiper/swiper-bundle.min.js', array('jquery'), null, true);

	// Enqueue theme styles
	wp_enqueue_style('routextheme-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('routextheme-style', 'rtl', 'replace');

	// Enqueue theme navigation script
	wp_enqueue_script('routextheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
}
add_action( 'wp_enqueue_scripts', 'routextheme_scripts' );


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
    // Remove the default path
    unset($paths[0]);

    // Add the new path for loading JSON files
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}

function my_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/style.css'); // Compiled CSS file
    wp_enqueue_style('rtl-style', get_template_directory_uri() . '/style-rtl.css', array('main-style')); // RTL compiled CSS
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

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