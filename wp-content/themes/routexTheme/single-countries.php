<?php
get_header();
echo top_banner();
?>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="country-single">
                <h1 class="country-title text-center mb-4">
                    <?php the_title(); ?>
                </h1>
                <div class="country-content">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sidebar">
                <?php
                $contact_information = get_field('contact_information', 'options');
                $phone_information = $contact_information['phone_information'] ?? null;   
                $phone_number = $phone_information['phone_number'] ?? null;  
                $phone_icon = $phone_information['phone_icon'] ?? null;  

                $address = $contact_information['address'] ?? null;
                $email = $contact_information['email'] ?? null;

                if ($phone_number || $address || $email) :
                ?>
                    <div class="contact-card">
                        <div class="card-header">
                            <h3>Plan Your Trip Now</h3>
                        </div>
                        <div class="card-body">
                            <?php if ($phone_number) : ?>
                                <div class="contact-item">
                                    <?php $phone_icon_url = wp_get_attachment_image_url($phone_icon, 'phone-icon-img'); ?>
                                    <?php echo file_get_contents($phone_icon_url);?>
                                    <p><?php echo esc_attr($phone_number); ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if ($email) : ?>
                                <div class="contact-item">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/mail-icon.svg'); ?>" alt="button-upright-arrow">
                                    <p><?php echo esc_attr($email); ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if ($address) : ?>
                                <div class="contact-item">
                                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/location-icon.svg'); ?>" alt="button-upright-arrow">
                                    <p><?php echo esc_attr($address); ?></p>
                                </div>
                            <?php endif; ?>

                            <a href="wordpress/?page_id=798" class="contact-link">
                                Contact Us
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/button-upright-arrow.svg'); ?>" alt="button-upright-arrow">
                            </a>
                        </div>
                    </div>
                <?php
                endif;
                ?>

<ul class="continents-list list-group">
    <?php 
    $continents = ['Africa', 'Asia', 'Europe', 'North America', 'South America', 'Australia'];
    $current_continent = isset($_GET['continent']) ? sanitize_text_field($_GET['continent']) : '';

    foreach ($continents as $index => $continent) : ?>
        <li class="list-group-item continent-li <?php echo $current_continent === $continent ? 'active' : ''; ?>">
            <a href="<?php echo add_query_arg('continent', $continent, get_post_type_archive_link('countries')); ?>" class="continent-link">
                <?php echo esc_html($continent); ?>
                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="continent-icon">
                    <path d="M1.75 11.0195C1.50391 11.0195 1.28516 10.9375 1.12109 10.7734C0.765625 10.4453 0.765625 9.87109 1.12109 9.54297L4.86719 5.76953L1.12109 2.02344C0.765625 1.69531 0.765625 1.12109 1.12109 0.792969C1.44922 0.4375 2.02344 0.4375 2.35156 0.792969L6.72656 5.16797C7.08203 5.49609 7.08203 6.07031 6.72656 6.39844L2.35156 10.7734C2.1875 10.9375 1.96875 11.0195 1.75 11.0195Z" fill="#034833"/>
                </svg>
            </a>
        </li>
        <?php if ($index < count($continents) - 1): ?>
            <hr>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>


            </div>
        </div>

    </div>
</div>

<?php
get_footer();
?>
