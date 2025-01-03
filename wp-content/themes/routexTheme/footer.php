</div>

<?php 
$footer_top_section = get_field('footer_top_section', 'options');
$left_support_message = $footer_top_section['left_support_message'] ?? null;  
$left_support_img = $footer_top_section['left_support_img'] ?? null;
$left_support_img_url = wp_get_attachment_image_url($left_support_img, 'footer-top-icon');
$right_support_message = $footer_top_section['right_support_message'] ?? null;  
$right_support_img = $footer_top_section['right_support_img'] ?? null; 
$right_support_img_url = wp_get_attachment_image_url($right_support_img, 'footer-top-icon');

$footer_routex = get_field('footer_routex', 'options');
$footer_logo_image = $footer_routex['footer_logo_image'] ?? null;  
$footer_logo_image_url = wp_get_attachment_image_url($footer_logo_image, 'footer-tlogo');
$footer_logo_text = $footer_routex['footer_logo_text'] ?? null; 
$footer_description = $footer_routex['footer_description'] ?? null; 
$footer_social_links = $footer_routex['footer_social_links'] ?? null; 

$services = get_field('services', 'options');
$services_title = $services['services_title'] ?? null;  
$services_links = $services['services_links'] ?? null; 

$useful = get_field('useful', 'options');
$useful_links_title = $useful['useful_links_title'] ?? null;  
$useful_links = $useful['useful_links'] ?? null; 

$subscribe = get_field('subscribe', 'options');
$subscribe_title = $subscribe['subscribe_title'] ?? null;  
$subscribe_description = $subscribe['subscribe_description'] ?? null;
$subscription_form = $subscribe['subscription_form'] ?? null;

$footer_bottom = get_field('footer_bottom', 'options');
$footer_copyright = $footer_bottom['footer_copyright'] ?? null;  

?>
<footer class="<?php echo (is_front_page()) ? 'footer__area-home' : 'footer__area'; ?>">
    <section class="footer__area-common">
    <?php if ($left_support_message || $right_support_message) : ?>
    <div class="footer-top-container">
        <div class="footer-top">
            <?php if ($left_support_message) : ?>
            <div class="footer-top-left">
                <?php if ($left_support_img) : ?>
                <div>
                    <div class="footer-left-svg">
                        <img src="<?php echo esc_url($left_support_img_url); ?>" alt="left_support_img" loading="lazy">
                    </div>
                </div>
                <?php endif; ?>
                <h3><?php echo esc_html($left_support_message); ?></h3>
            </div>
            <?php endif; ?>
    
            <?php if ($left_support_message && $right_support_message) : ?>
            <div class="footer-divider"></div>
            <?php endif; ?>
    
            <?php if ($right_support_message) : ?>
            <div class="footer-top-right">
                <?php if ($right_support_img) : ?>
                <div>
                    <div class="footer-right-svg">
                        <img src="<?php echo esc_url($right_support_img_url); ?>" alt="right_support_img" loading="lazy">
                    </div>
                </div>
                <?php endif; ?>
                <h3><?php echo esc_html($right_support_message); ?></h3>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if ($footer_logo_image || $footer_logo_text || $footer_description || has_non_empty_cards($footer_social_links) || $services_title || has_non_empty_text($services_links) || $useful_links_title || has_non_empty_text($useful_links) || $subscribe_title || $subscribe_description) : ?>
    <div class="footer-mid-container">
        <div class="row">
            <?php if ($footer_logo_image || $footer_logo_text || $footer_description || has_non_empty_cards($footer_social_links)) : ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <?php if ($footer_logo_image || $footer_logo_text) : ?>
                    <div class="footer__logo-container">
                        <?php if ($footer_logo_image) : ?>
                        <img src="<?php echo esc_url($footer_logo_image_url); ?>" alt="RouteX Logo" class="footer__logo-icon" loading="lazy">
                        <?php endif; ?>
                        <?php if ($footer_logo_text) : ?>
                        <p class="footer-logo-text"><?php echo esc_html($footer_logo_text); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <?php if ($footer_description) : ?>
                    <p class="footer-description"><?php echo (esc_html($footer_description)); ?></p>
                    <?php endif; ?>

                    <?php if (has_non_empty_cards($footer_social_links)) : ?>
                    <div class="footer__social">
                        <?php foreach ($footer_social_links as $social) : ?>
                        <a href="<?php echo esc_url($social['social_url']); ?>" target="_blank" rel="noopener noreferrer">
                            <img src="<?php echo esc_url($social['social_icon']); ?>" alt="Social Icon" class="social_icon" height="17" loading="lazy">
                        </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if($services_title || has_non_empty_text($services_links)): ?>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer3__item-2">
                    <div class="footer__link">
                        <?php if($services_title): ?>
                        <h4 class="footer__widget-title"><?= esc_html($services_title); ?></h4>
                        <?php endif; ?>
                        <?php if (has_non_empty_text($services_links)): ?>
                            <ul>
                                <?php foreach ($services_links as $services_link) : ?>
                                    <?php if($services_link['service_link_text']): ?>
                                    <li>
                                        <a href="<?= esc_url($services_link['service_link_url']); ?>">
                                            <img src="<?= get_template_directory_uri(); ?>/assets/icons/light-green-checkmark.svg" alt="light-green-checkmark" width="16" height="12" loading="lazy">
                                            <?= esc_html($services_link['service_link_text']); ?>
                                        </a>
                                    </li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if($useful_links_title || has_non_empty_text($useful_links)): ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__widget-item-3">
                    <div class="footer__link">
                    <?php if($useful_links_title): ?>
                    <h4 class="footer__widget-title"><?= esc_html($useful_links_title); ?></h4>
                    <?php endif; ?>
                    <?php if (has_non_empty_text($useful_links)): ?>
                        <ul>
                            <?php foreach ($useful_links as $useful_link) : ?>
                                <?php if($useful_link['link_text']): ?>
                                <li>
                                    <a href="<?= esc_url($useful_link['link_url']); ?>">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/icons/right-arrow-light-green-without-tale.svg" alt="right-arrow-light-green-without-tale" width="8" height="12" loading="lazy">
                                        <?= esc_html($useful_link['link_text']); ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($subscribe_title || $subscribe_description): ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__widget-item-4">
                    <?php if ($subscribe_title): ?>
                    <h4 class="footer__widget-title"><?php echo esc_html($subscribe_title)?></h4>
                    <?php endif; ?>

                    <?php if ($subscribe_description): ?>
                    <p class="footer__widget-item-4-description"><?php echo esc_html( $subscribe_description) ?></p>
                    <?php endif; ?>

                    <div class="footer-form">
                        <?php echo do_shortcode( $subscription_form ); ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if ($footer_copyright) : ?>
    <div class="footer__bottom-wrapper">
        <div class="footer__bottom-wrapper-container">
            <div class="row"> 
                <?php if ($footer_copyright) : ?>
                <div class="col-md-6">
                    <div class="footer__copyright">
                        <p><?php echo esc_html($footer_copyright); ?></p>
                    </div>
                </div>
                <?php endif; ?>
    
                <div class="col-md-6">
                    <div class="footer__copyright-menu">
                        <nav id="site-navigation">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-2',
                                    'menu_id'        => 'footer-menu',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'container'       => false,
                                )
                            );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    </section>
</footer>
<?php wp_footer(); ?>

</body>

</html>