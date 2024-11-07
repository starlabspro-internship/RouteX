<?php if (have_rows('visa_category')): ?>
        <?php while (have_rows('visa_category')): the_row(); ?>
        <div class="container text-center my-5 visa-section">
            <h5 class="visa-small-title">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/passport-icon.svg" class="img-fluid" alt="Passport Icon">
                <?php the_sub_field('smalltitle'); ?>
            </h5>
            <h1 class="visa-title"><?php the_sub_field('title'); ?></h1>
        <?php endwhile; ?>
    <?php endif; ?>

    <div class="row">
        <?php if (have_rows('visa_category')): ?>
            <?php while (have_rows('visa_category')): the_row(); ?>
                <?php if (have_rows('visa_cards')): ?>
                    <?php while (have_rows('visa_cards')): the_row(); ?>
                        <div class="col-md-6 mb-4 visa-div">
                            <div class="visa-card"> <!-- Flex container -->
                                <div class="visa-image col-5"> <!-- 50% of the card width -->
                                    <img src="<?php echo esc_url(get_sub_field('visa_card_image')); ?>" alt="<?php echo esc_attr(get_sub_field('visa_card_title')); ?>" class="img-fluid">
                                </div>
                                <div class="visa-content col-7"> <!-- 50% of the card width -->
                                    <h2 class="text-center visa-card-title"><?php echo esc_html(get_sub_field('visa_card_title')); ?></h2>
                                    <p><?php echo esc_html(get_sub_field('visa_card_text')); ?></p>

                                    <!-- Container for the link SVG and other SVG icon -->
                                    <div class="d-flex card-bottom-layout">
                                    <div class="container link-container">
                                    <?php $visa_card_link = get_sub_field('visa_card_link'); ?>
                                    <a href="<?php echo esc_url($visa_card_link); ?>">
                                        <svg class="svg-link" width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.5" y="0.539062" width="59" height="59" rx="19.5" stroke="#83CD20" />
                                            <path d="M37.1581 26.0008V34.8397C37.1581 35.1711 37.02 35.4749 36.799 35.6959C36.5504 35.9445 36.2466 36.0826 35.9151 36.0826C35.2246 36.1102 34.6445 35.5302 34.6721 34.8397L34.6445 29.0115L26.1924 37.4637C25.6952 37.9609 24.9218 37.9609 24.4246 37.4637C23.9551 36.9941 23.9274 36.1931 24.4246 35.6959L32.8768 27.2438H27.0763C26.3857 27.2714 25.8057 26.6914 25.8333 26.0008C25.8057 25.3103 26.3857 24.7302 27.0763 24.7579H35.9151C36.6056 24.7302 37.1857 25.3103 37.1581 26.0008Z" fill="#83CD20"/>
                                        </svg>
                                    </a>
                                </div>

                                        <div class="container visa-icon-container">
                                            <!-- ACF SVG icon on the right -->
                                            <?php 
                                            $other_svg_icon = get_sub_field('visa_card_icon'); 
                                            if ($other_svg_icon): 
                                                // Get the SVG content for the other icon
                                                $other_svg_content = file_get_contents($other_svg_icon); 
                                                echo $other_svg_content; // Output the SVG code
                                            endif; 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>
