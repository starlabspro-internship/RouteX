<?php if (have_rows('our_coaching')): ?>
        <?php while (have_rows('our_coaching')): the_row(); ?>
        <div class="container joindiv" style="background-image: url('<?php echo esc_url(get_sub_field('background_image')); ?>');">
<section class="our-coaching-section container my-5">
    <!-- Our Coaching Section -->
    
            <!-- Top Div with Title and Subtitle -->
            <div class="row mb-4 title-subtitle-div">
                <div class="col-12 text-center">
                    <?php if (get_sub_field('sub_title')): ?>
                        <p class="subtitle">             <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/passport-icon.svg" class="img-fluid" alt="Passport Icon">
                        <?php the_sub_field('sub_title'); ?></p>
                    <?php endif; ?>
                    <?php if (get_sub_field('title')): ?>
                        <h2><?php the_sub_field('title'); ?></h2>
                    <?php endif; ?>
                    
                </div>
            </div>

            <!-- Bottom Row with Left and Right Divs -->
            <div class="row">
                <!-- Left Div (70% width) with Cards -->
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="card-container">
                        <?php if (have_rows('cards')): ?>
                            <?php while (have_rows('cards')): the_row(); ?>
                                <div class="card mb-3 p-3 border">
                                    <div class="name-pos-div">
                                    <h5><?php the_sub_field('name'); ?></h5>
                                    <p> <?php the_sub_field('position'); ?></p>
                                    </div>
                                        <div class="d-flex card-person-link">
                                            <div class="container link-container">
                                                <a class="person-link" href="<?php the_sub_field('position'); ?>" aria-label="Link to <?php the_sub_field('name'); ?>'s profile">
                                                <svg class="svg-link2" width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="30" cy="30.5" r="29.5" stroke="#83CD20" />
                                                    <path d="M37.1581 26.0008V34.8397C37.1581 35.1711 37.02 35.4749 36.799 35.6959C36.5504 35.9445 36.2466 36.0826 35.9151 36.0826C35.2246 36.1102 34.6445 35.5302 34.6721 34.8397L34.6445 29.0115L26.1924 37.4637C25.6952 37.9609 24.9218 37.9609 24.4246 37.4637C23.9551 36.9941 23.9274 36.1931 24.4246 35.6959L32.8768 27.2438H27.0763C26.3857 27.2714 25.8057 26.6914 25.8333 26.0008C25.8057 25.3103 26.3857 24.7302 27.0763 24.7579H35.9151C36.6056 24.7302 37.1857 25.3103 37.1581 26.0008Z" fill="#83CD20"/>
                                                </svg>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Right Div (30% width) with Background Image and Links -->
<?php if (have_rows('social_media_card')): ?>
    <div class="col-lg-4 col-md-5 col-12 d-flex align-items-center justify-content-center flex-column">
        <?php while (have_rows('social_media_card')): the_row(); ?>
            <div class="position-relative bg-image" style="background-image: url('<?php echo esc_url(get_sub_field('card_background_image') ?: 'path/to/default/image.jpg'); ?>'); background-size: cover; background-position: center;">
                <div class="overlay-content text-center social-media-links-div">
                    <?php $links = get_sub_field('links'); ?>
                    <?php if ($links): ?>
                        <?php if (!empty($links['twitter'])): ?>
                            <a style="text-decoration: none;" href="<?php echo esc_url($links['twitter']['url']); ?>" class="social-link" aria-label="Twitter link">
                                <svg class="svg-link-icon" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.5212 6.81788L15.4776 0.0429688H14.0661L8.89418 5.92553L4.7634 0.0429688H-0.000976562L6.24558 8.93844L-0.000976562 16.043H1.41057L6.87224 9.83079L11.2347 16.043H15.999L9.52085 6.81788H9.5212ZM7.58789 9.01681L6.95498 8.13102L1.91917 1.08271H4.08722L8.15118 6.77092L8.78409 7.65671L14.0668 15.0505H11.8987L7.58789 9.01715V9.01681Z" fill="#034833"/>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($links['facebook'])): ?>
                            <a style="text-decoration: none;" href="<?php echo esc_url($links['facebook']['url']); ?>" class="social-link" aria-label="Facebook link">
                                <svg class="svg-link-icon" width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.71777 9.04297H6.37402V16.043H3.24902V9.04297H0.686523V6.16797H3.24902V3.94922C3.24902 1.44922 4.74902 0.0429688 7.03027 0.0429688C8.12402 0.0429688 9.28027 0.261719 9.28027 0.261719V2.73047H7.99902C6.74902 2.73047 6.37402 3.48047 6.37402 4.29297V6.16797H9.15527L8.71777 9.04297Z" fill="#034833"/>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($links['instagram'])): ?>
                            <a style="text-decoration: none;" href="<?php echo esc_url($links['instagram']['url']); ?>" class="social-link" aria-label="Instagram link">
                                <svg class="svg-link-icon" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.99902 3.44922C9.96777 3.44922 11.5928 5.07422 11.5928 7.04297C11.5928 9.04297 9.96777 10.6367 7.99902 10.6367C5.99902 10.6367 4.40527 9.04297 4.40527 7.04297C4.40527 5.07422 5.99902 3.44922 7.99902 3.44922ZM7.99902 9.38672C9.28027 9.38672 10.3115 8.35547 10.3115 7.04297C10.3115 5.76172 9.28027 4.73047 7.99902 4.73047C6.68652 4.73047 5.65527 5.76172 5.65527 7.04297C5.65527 8.35547 6.71777 9.38672 7.99902 9.38672ZM12.5615 3.32422C12.5615 2.85547 12.1865 2.48047 11.7178 2.48047C11.249 2.48047 10.874 2.85547 10.874 3.32422C10.874 3.79297 11.249 4.16797 11.7178 4.16797C12.1865 4.16797 12.5615 3.79297 12.5615 3.32422ZM14.9365 4.16797C14.999 5.32422 14.999 8.79297 14.9365 9.94922C14.874 11.0742 14.624 12.043 13.8115 12.8867C12.999 13.6992 11.999 13.9492 10.874 14.0117C9.71777 14.0742 6.24902 14.0742 5.09277 14.0117C3.96777 13.9492 2.99902 13.6992 2.15527 12.8867C1.34277 12.043 1.09277 11.0742 1.03027 9.94922C0.967773 8.79297 0.967773 5.32422 1.03027 4.16797C1.09277 3.04297 1.34277 2.04297 2.15527 1.23047C2.99902 0.417969 3.96777 0.167969 5.09277 0.105469C6.24902 0.0429688 9.71777 0.0429688 10.874 0.105469C11.999 0.167969 12.999 0.417969 13.8115 1.23047C14.624 2.04297 14.874 3.04297 14.9365 4.16797ZM13.4365 11.168C13.8115 10.2617 13.7178 8.07422 13.7178 7.04297C13.7178 6.04297 13.8115 3.85547 13.4365 2.91797C13.1865 2.32422 12.7178 1.82422 12.124 1.60547C11.1865 1.23047 8.99902 1.32422 7.99902 1.32422C6.96777 1.32422 4.78027 1.23047 3.87402 1.60547C3.24902 1.85547 2.78027 2.32422 2.53027 2.91797C2.15527 3.85547 2.24902 6.04297 2.24902 7.04297C2.24902 8.07422 2.15527 10.2617 2.53027 11.168C2.78027 11.793 3.24902 12.2617 3.87402 12.5117C4.78027 12.8867 6.96777 12.793 7.99902 12.793C8.99902 12.793 11.1865 12.8867 12.124 12.5117C12.7178 12.2617 13.2178 11.793 13.4365 11.168Z" fill="#034833"/>
                                </svg>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($links['linkedin'])): ?>
                            <a style="text-decoration: none;" href="<?php echo esc_url($links['linkedin']['url']); ?>" class="social-link" aria-label="Instagram link">
                                <svg class="svg-link-icon" width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M3.12402 15.043H0.217773V5.69922H3.12402V15.043ZM1.65527 4.44922C0.749023 4.44922 -0.000976562 3.66797 -0.000976562 2.73047C-0.000976562 1.44922 1.37402 0.636719 2.49902 1.29297C3.03027 1.57422 3.34277 2.13672 3.34277 2.73047C3.34277 3.66797 2.59277 4.44922 1.65527 4.44922ZM13.9678 15.043H11.0928V10.5117C11.0928 9.41797 11.0615 8.04297 9.56152 8.04297C8.06152 8.04297 7.84277 9.19922 7.84277 10.418V15.043H4.93652V5.69922H7.71777V6.98047H7.74902C8.15527 6.26172 9.09277 5.48047 10.499 5.48047C13.4365 5.48047 13.999 7.41797 13.999 9.91797V15.043H13.9678Z" fill="#034833"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
</div>