<?php
$header_logo = get_field('header_logo', 'options');
$appointment_link = get_field('appointment_link', 'options');
$company_name = get_field('company_name', 'options');
$bordered_header = get_field('bordered_header', 'options');
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <?php if(get_field('dark_mode', 'options')): ?>
        <style>
            body {
                background: #000 !important;
            }
        </style>
    <?php endif; ?>
    <style>
    .header-container {
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: <?php echo $bordered_header ? '50px' : '0'; ?>;
        background-color: <?php echo $bordered_header
            ? ((is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)')
            : ((is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)'); ?>;
    }

    .home-navigation,
    .main-navigation {
        border-radius: <?php echo $bordered_header ? '30px' : '0'; ?>;
        padding-left: 20px;
        background-color: <?php echo $bordered_header
            ? ((is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)')
            : ((is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)'); ?>;
    }

    .sub-menu {
        padding-left: 20px;
        background-color: <?php echo $bordered_header
            ? ((is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)')
            : ((is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)'); ?>;
    }

    <?php if ($bordered_header): ?>
        .header-container.menu-active {
            border-radius: 35px 35px 0 0;
        }
        .header-container.menu-active .home-navigation,
        .header-container.menu-active .main-navigation {
            border-radius: 0 0 35px 35px;
        }
    <?php else: ?>
        .header-container.menu-active,
        .header-container.menu-active .home-navigation,
        .header-container.menu-active .main-navigation {
            border-radius: 0;
        }
    <?php endif; ?>
</style>

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
                            'walker'          => new WP_Bootstrap_Navwalker(),
                            'container'       => false,
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
                    
                    const headerContainer = document.querySelector('.header-container');
                    headerContainer.classList.toggle('menu-active', expanded);
                });
            }
            
            const menuItems = document.querySelectorAll('.menu-item-has-children');
            menuItems.forEach(function(menuItem) {
                const submenu = menuItem.querySelector('.sub-menu');

                if (submenu) {
                    menuItem.addEventListener('mouseenter', function() {
                        menuItem.classList.add('active');
                        submenu.classList.add('active');
                    });

                    menuItem.addEventListener('mouseleave', function() {
                        menuItem.classList.remove('active');
                        submenu.classList.remove('active');
                    });
                }
            });
        });
        </script>
    </div>
</body>
</html>
