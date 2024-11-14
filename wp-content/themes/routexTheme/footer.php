<footer class="footer__area-common"
    style="background-image: url('<?php echo get_template_directory_uri() . '/assets/icons/Map.svg'; ?>')">
    <div class="footer-top">
        <?php if (have_rows('footer')) : ?>
        <?php while (have_rows('footer')) : the_row(); ?>
        <?php if (have_rows('footer_top_section')) : ?>
        <?php while (have_rows('footer_top_section')) : the_row(); 
                        $left_support_message = get_sub_field('left_support_message');
                        $right_support_message = get_sub_field('right_support_message'); 
                    ?>
        <div class="footer-top-left">
            <div class="footer-left-svg">
                <?php echo file_get_contents(get_template_directory() . '/assets/icons/money.svg'); ?>
            </div>
            <?php if ($left_support_message) : ?>
            <h3><?php echo esc_html($left_support_message); ?></h3>
            <?php endif; ?>
        </div>

        <div class="footer-divider"></div>

        <div class="footer-top-right">
            <div class="footer-right-svg">
                <?php echo file_get_contents(get_template_directory() . '/assets/icons/World-Icon.svg'); ?>
            </div>
            <?php if ($right_support_message) : ?>
            <h3><?php echo esc_html($right_support_message); ?></h3>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="footer__bottom1-wrapper">
        <div class="container">
            <div class="row mb-minus-40 footer-wrap">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__widget footer__widget-item-1 wow fadeInLeft animated" data-wow-delay=".2s">
                        <div class="footer__logo-container">
                            <?php if (have_rows('footer')) : ?>
                            <?php while (have_rows('footer')) : the_row(); ?>
                            <?php if (have_rows('footer_routex')) : ?>
                            <?php while (have_rows('footer_routex')) : the_row(); 
                                            $footer_logo_image = get_sub_field('footer_logo_image');
                                            $footer_logo_text = get_sub_field('footer_logo_text'); 
                                        ?>
                            <?php if ($footer_logo_image) : ?>
                            <img src="<?php echo esc_url($footer_logo_image); ?>" alt="RouteX Logo"
                                class="footer__logo-icon">
                            <?php endif; ?>
                            <p class="footer-logo-text"><strong><?php echo esc_html($footer_logo_text); ?></strong></p>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <?php if (have_rows('footer')) : ?>
                        <?php while (have_rows('footer')) : the_row(); ?>
                        <?php if (have_rows('footer_routex')) : ?>
                        <?php while (have_rows('footer_routex')) : the_row(); 
                                        $footer_description = get_sub_field('footer_description'); 
                                    ?>
                        <p class="footer-description"><?php echo (esc_html($footer_description)); ?></p>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>

                        <div class="footer__social">
                            <?php if (have_rows('footer')) : ?>
                            <?php while (have_rows('footer')) : the_row(); ?>
                            <?php if (have_rows('footer_routex')) : ?>
                            <?php while (have_rows('footer_routex')) : the_row(); ?>
                            <?php if (have_rows('footer_social_links')) : ?>
                            <?php while (have_rows('footer_social_links')) : the_row(); 
                                                    $social_icon = get_sub_field('social_icon');
                                                    $social_url = get_sub_field('social_url'); 
                                                ?>
                            <?php if ($social_icon) : ?>
                            <a href="<?php echo esc_url($social_url); ?>" target="_blank" rel="noopener noreferrer">
                                <img src="<?php echo esc_url($social_icon); ?>" alt="Social Icon" class="social_icon">
                            </a>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__widget footer__widget-item-2 footer3__item-2 wow fadeInLeft animated"
                        data-wow-delay=".3s">
                        <div class="footer__link">
                            <ul>
                                <?php
                                if (have_rows('footer')) {
                                    while (have_rows('footer')) {
                                        the_row();
                                        if (have_rows('services')) {
                                            while (have_rows('services')) {
                                                the_row();

                                                $services_title = get_sub_field('services_title');
                                                echo '<p><strong>' . esc_html($services_title) . '</strong></p>';

                                                if (have_rows('services_links')) {
                                                    echo '<ul>';
                                                    while (have_rows('services_links')) {
                                                        the_row();

                                                        $service_link_text = get_sub_field('service_link_text');
                                                        $service_link_url = get_sub_field('service_link_url');

                                                        echo '<li>';
                                                        echo '<img src="' . get_template_directory_uri() . '/assets/icons/light-green-checkmark.svg" alt="">';
                                                        echo '<a href="' . esc_url($service_link_url) . '">';
                                                        echo esc_html($service_link_text);
                                                        echo '</a>';
                                                        echo '</li>';
                                                    }
                                                    echo '</ul>';
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__widget footer__widget-item-3  mt-md-50 mt-sm-40 mt-xs-35">
                        <div class="footer__link">
                            <?php
                            if (have_rows('footer')) {
                                while (have_rows('footer')) {
                                    the_row();
                                    if (have_rows('useful')) {
                                        while (have_rows('useful')) {
                                            the_row();

                                            $useful_links_title = get_sub_field('useful_links_title');
                                            echo '<p><strong>' . esc_html($useful_links_title) . '</strong></p>';

                                            if (have_rows('useful_links')) {
                                                echo '<ul>';
                                                while (have_rows('useful_links')) {
                                                    the_row();

                                                    $link_text = get_sub_field('link_text');
                                                    $link_url = get_sub_field('link_url');

                                                    echo '<li>';
                                                    echo '<img src="' . get_template_directory_uri() . '/assets/icons/right-arrow-light-green-without-tale.svg" alt="">';
                                                    echo '<a href="' . esc_url($link_url) . '">';
                                                    echo esc_html($link_text);
                                                    echo '</a>';
                                                    echo '</li>';
                                                }
                                                echo '</ul>';
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__widget footer__widget-item-4 mt-md-50 mt-sm-40 mt-xs-35">

                        <div class="footer__subscribe subscribe-2">

                            <?php
                            if( have_rows('footer') ) {
                                while( have_rows('footer') ) {
                                    the_row();
                                    if( have_rows('subscribe') ) {
                                        while( have_rows('subscribe') ) {
                                            the_row();
                                            
                                            $subscribe_title = get_sub_field('subscribe_title');
                                            $subscribe_description = get_sub_field('subscribe_description');
                                             
                                            echo '<p class="footer__subscribe-title"><strong>' . esc_html($subscribe_title) . '</strong></p>';
                                            echo '<p>' . $subscribe_description . '</p>';
                                            }
                                        }
                                    }
                                }
                                ?>

                            <div class="footer-form">
                                <form action="#" class="subscribe-form">
                                    <input class="form-control" type="email" name="email" placeholder="Enter Email"
                                        required>
                                    <input type="hidden" name="action" value="mailchimpsubscribe">
                                    <button class="submit">

                                        <?php
                                        $icon_path = get_template_directory() . '/assets/icons/Ticket.svg';
                                        if (file_exists($icon_path)) {
                                            echo file_get_contents($icon_path);
                                        }
                                        ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__bottom-wrapper">
            <div class="container">
                <div class="footer__bottom row">
                    <div class="col-6 footer__copyright">
                        <?php if (have_rows('footer')) : ?>
                        <?php while (have_rows('footer')) : the_row(); ?>
                        <?php if (have_rows('footer_bottom')) : ?>
                        <?php while (have_rows('footer_bottom')) : the_row(); 
                                    $footer_copyright = get_sub_field('footer_copyright'); 
                                ?>
                        <p><?php echo esc_html($footer_copyright); ?></p>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="col-6 footer__copyright-menu">
                        <ul>
                            <?php if (have_rows('footer')) : ?>
                            <?php while (have_rows('footer')) : the_row(); ?>
                            <?php if (have_rows('footer_menu_links')) : ?>
                            <?php while (have_rows('footer_menu_links')) : the_row(); 
                                        $menu_link_text = get_sub_field('menu_link_text');
                                        $menu_link_url = get_sub_field('menu_link_url'); 
                                    ?>
                            <li>
                                <a href="<?php echo esc_url($menu_link_url); ?>" target="_blank"
                                    rel="noopener noreferrer">
                                    <?php echo esc_html($menu_link_text); ?>
                                </a>
                            </li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</footer>