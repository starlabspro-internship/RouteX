<?php
$header_logo = get_field('header_logo', 'options');
$header_logo_url = wp_get_attachment_image_url($header_logo, 'header-logo');
$company_name = get_field('company_name', 'options');
$home_url = get_home_url();
$bordered_header = get_field('bordered_header', 'options');
$appointment_link = get_field('appointment_link', 'options');
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <style>
    .header-container {
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: <?php echo $bordered_header ? '50px': '0';
        ?>;
        background-color: <?php echo $bordered_header ? ((is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)'): ((is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)');
        ?>;
    }

    .home-navigation,
    .main-navigation {
        border-radius: <?php echo $bordered_header ? '30px': '0';
        ?>;
        background-color: <?php echo $bordered_header ? ((is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)'): ((is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)');
        ?>;
    }

    .sub-menu {
        padding-left: 20px;
        background-color: <?php echo $bordered_header ? ((is_home() || is_front_page()) ? 'var(--primary-color)' : 'var(--contrast-color)'): ((is_home() || is_front_page()) ? 'var(--contrast-color)' : 'var(--primary-color)');
        ?>;
    }

    <?php if ($bordered_header): ?>.header-container.menu-active {
        border-radius: 35px 35px 0 0;
    }

    .header-container.menu-active .home-navigation,
    .header-container.menu-active .main-navigation {
        border-radius: 0 0 35px 35px;
    }

    <?php else: ?>.header-container.menu-active,
    .header-container.menu-active .home-navigation,
    .header-container.menu-active .main-navigation {
        border-radius: 0;
    }

    <?php endif;

    ?>
    </style>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e( 'Skip to content', 'routextheme' ); ?></a>
        <header id="masthead" class="<?php echo (is_home() || is_front_page()) ? 'home-header' : 'site-header'; ?>">
            <div class="header-container">
                <div class="site-branding">
                    <a href="<?php echo esc_url($home_url); ?>">
                        <img src="<?php echo esc_url($header_logo_url); ?>" alt="Header logo" width="40" height="34">
                    </a>
                    <a href="<?php echo esc_url($home_url); ?>">
                        <div><?php echo esc_html($company_name); ?></div>
                    </a>
                </div>
                <nav id="site-navigation"
                    class="<?php echo (is_home() || is_front_page()) ? 'home-navigation' : 'main-navigation'; ?>">
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
                
                <div class="button-div">
                    <a href="<?php echo esc_url($appointment_link); ?>" class="appointment-button">Get An Appointment
                        <img src="<?php echo get_template_directory_uri() ?>/assets/icons/right-arrow.svg"
                            alt="Right arrow" alt="right-arrow-white-bigger-tale" width="14" height="16"/>
                    </a>                
                    <button id="dark-mode-toggle">
                        <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_429_11017)">
                        <path d="M20.9955 11.7115L22.2448 11.6721C22.2326 11.2847 22.0414 10.9249 21.7272 10.698C21.413 10.4711 21.0113 10.4029 20.6397 10.5132L20.9955 11.7115ZM12.2885 3.00454L13.4868 3.36028C13.5971 2.98873 13.5289 2.58703 13.302 2.2728C13.0751 1.95857 12.7153 1.76736 12.3279 1.75516L12.2885 3.00454ZM20.6397 10.5132C20.1216 10.667 19.5716 10.75 19 10.75V13.25C19.815 13.25 20.6046 13.1314 21.3512 12.9098L20.6397 10.5132ZM19 10.75C15.8244 10.75 13.25 8.17564 13.25 5H10.75C10.75 9.55635 14.4437 13.25 19 13.25V10.75ZM13.25 5C13.25 4.42841 13.333 3.87841 13.4868 3.36028L11.0902 2.64879C10.8686 3.39542 10.75 4.18496 10.75 5H13.25ZM12 4.25C12.0834 4.25 12.1665 4.25131 12.2492 4.25392L12.3279 1.75516C12.219 1.75173 12.1097 1.75 12 1.75V4.25ZM4.25 12C4.25 7.71979 7.71979 4.25 12 4.25V1.75C6.33908 1.75 1.75 6.33908 1.75 12H4.25ZM12 19.75C7.71979 19.75 4.25 16.2802 4.25 12H1.75C1.75 17.6609 6.33908 22.25 12 22.25V19.75ZM19.75 12C19.75 16.2802 16.2802 19.75 12 19.75V22.25C17.6609 22.25 22.25 17.6609 22.25 12H19.75ZM19.7461 11.7508C19.7487 11.8335 19.75 11.9166 19.75 12H22.25C22.25 11.8903 22.2483 11.781 22.2448 11.6721L19.7461 11.7508Z" fill="var(--primary-color)"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_429_11017">
                        <rect width="24" height="24" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>
                    </button>
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <?php echo file_get_contents(get_template_directory() . '/assets/icons/menu-svgrepo-com.svg');?>
                    </button>
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
                const arrow = menuItem.querySelector('.submenu-arrow');

                if (submenu && arrow) {
                    arrow.addEventListener('click', function(e) {
                        e.preventDefault();
                        menuItem.classList.toggle('active');
                        submenu.style.display = menuItem.classList.contains('active') ?
                            'block' : 'none';
                    });
                }

            });

            function getCookie(name) {
            let cookieArr = document.cookie.split(';');
            for (let i = 0; i < cookieArr.length; i++) {
                let cookiePair = cookieArr[i].split('=');
                if (name == cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
                }
            }
            return null;
            }

            function setCookie(name, value, days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
            let expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + encodeURIComponent(value) + ";" + expires + ";path=/";
            }

            function toggleDarkMode() {
            let darkMode = document.body.classList.toggle('dark-mode');
            
            setCookie('dark_mode', darkMode ? '1' : '0', 365);
            }

            window.onload = function() {
            let darkModeCookie = getCookie('dark_mode');
            if (darkModeCookie === '1') {
                document.body.classList.add('dark-mode');  
            } else {
                document.body.classList.remove('dark-mode');  
            }

            const darkModeToggleBtn = document.getElementById('dark-mode-toggle');
            if (darkModeToggleBtn) {
                darkModeToggleBtn.addEventListener('click', toggleDarkMode);
            }
            };

        });
        </script>
    </div>
</body>

</html>