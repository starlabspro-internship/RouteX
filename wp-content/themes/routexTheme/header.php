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
$appointment_link = get_field('appointment_link', 'options');
$company_name = get_field('company_name', 'options');
$bordered_header = get_field('bordered_header', 'options');  // Get the bordered header field value
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
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'routextheme' ); ?></a>

        <header id="masthead" class="<?php echo (is_home() || is_front_page()) ? 'home-header' : 'site-header'; ?>">
        <div class="header-container">
        <div class="site-branding">
                    <img src="<?php echo esc_url($header_logo); ?>" alt="Header logo">
                    <div><?php echo esc_html($company_name); ?></div>
                </div>                           

                <nav id="site-navigation" class="<?php echo (is_home() || is_front_page()) ? 'home-navigation' : 'main-navigation'; ?>">
                <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </nav>                
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'routextheme'); ?></button>

                <div class="button-div">
                    <a href="<?php echo esc_url($appointment_link); ?>" class="appointment-button">Get An Appointment
                        <img src="<?php echo get_template_directory_uri() ?>/assets/icons/right-arrow.svg" alt="Right arrow" />
                    </a>
                </div>
            </div>
        </header>

        <script> 
            document.addEventListener('DOMContentLoaded', function() {
                const menuToggle = document.querySelector('.menu-toggle');
                const mainNavigation = document.querySelector('.main-navigation, .home-navigation');

                if (menuToggle && mainNavigation) {
                    menuToggle.addEventListener('click', function() {
                        mainNavigation.classList.toggle('active');

                        const expanded = mainNavigation.classList.contains('active');
                        menuToggle.setAttribute('aria-expanded', expanded ? 'true' : 'false');
                    });
                }
            });
        </script>
    </div>

    <!-- Conditional CSS -->
<style>
    <?php if ($bordered_header): ?>
        /* Bordered Header */
        .header-container {
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 50px;
            background-color: <?php echo (is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)'; ?>;
        }
        .home-navigation {
            background-color: <?php echo (is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)'; ?>;
            border-radius: 30px;
            padding-left: 20px;
        }
        .main-navigation {
            background-color: <?php echo (is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)'; ?>;
            border-radius: 30px;
            padding-left: 20px;
        }
    <?php else: ?>
        /* Non-Bordered Header */
        .header-container {
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 50px;
            background-color: <?php echo (is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)'; ?>;
        }
        .main-navigation {
            background-color: <?php echo (is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)'; ?>;
            border-radius: 30px;
            padding-left: 20px;
        }
    <?php endif; ?>
</style>


</body>
</html> 
