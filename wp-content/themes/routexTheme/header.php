<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package routexTheme
 */

// Fetch ACF field values
$header_logo = get_field('header_logo', 'options');

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<?php if(get_field('dark_mode', 'options')):?>
		<style>
			body{
				background: #000 !important;
			}
		</style>
	<?php endif;?>
</head>

    <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'routextheme' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php the_custom_logo(); ?>
            </div>          
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'routextheme'); ?></button>
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    )
                );
                ?>
            </nav>
            <div class="button-div">
            <a href="#" style="color: white;" class="appointment-button">Get An Appointment ➜</a>
            </div>
        </div>
    </header>

    <script> 
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const mainNavigation = document.querySelector('.main-navigation');

            if (menuToggle && mainNavigation) {
                menuToggle.addEventListener('click', function() {
                    mainNavigation.classList.toggle('active');

                    const expanded = mainNavigation.classList.contains('active');
                    menuToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                });
            }
        });
    </script>

    <div id="content" class="site-content">