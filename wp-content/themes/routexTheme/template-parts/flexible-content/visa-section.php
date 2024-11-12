<?php
// Define ACF fields at the top
$smalltitle = get_sub_field('smalltitle');
$title = get_sub_field('title');
$visa_cards = [];

// Store visa card data if available
if (have_rows('visa_cards')) :
    while (have_rows('visa_cards')) : the_row();
        $visa_cards[] = [
            'image' => get_sub_field('visa_card_image'),
            'title' => get_sub_field('visa_card_title'),
            'text' => get_sub_field('visa_card_text'),
            'link' => get_sub_field('visa_card_link'),
            'icon' => get_sub_field('visa_card_icon')
        ];
    endwhile;
endif;
?>

<div class="container text-center my-5 visa-section">
    <h5 class="visa-small-title">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/passport-icon.svg" class="img-fluid" alt="Passport Icon">
        <?php if ($smalltitle) : echo esc_html($smalltitle); endif; ?>
    </h5>

    <?php if ($title) : ?>
        <h1 class="visa-title"><?php echo esc_html($title); ?></h1>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($visa_cards as $card) : ?>
            <div class="col-md-6 mb-4 visa-div">
                <div class="visa-card d-flex flex-wrap">
                    <!-- Visa Card Image -->
                    <div class="visa-image col-5">
                        <?php if ($card['image']) : ?>
                            <img src="<?php echo esc_url($card['image']); ?>" alt="<?php echo esc_attr($card['title']); ?>" class="img-fluid">
                        <?php endif; ?>
                    </div>

                    <!-- Visa Card Content -->
                    <div class="visa-content col-7">
                        <?php if ($card['title']) : ?>
                            <h2 class="text-center visa-card-title"><?php echo esc_html($card['title']); ?></h2>
                        <?php endif; ?>

                        <?php if ($card['text']) : ?>
                            <p><?php echo esc_html($card['text']); ?></p>
                        <?php endif; ?>

                        <!-- Card Bottom Layout -->
                        <div class="d-flex card-bottom-layout">
                            <!-- Link SVG Icon -->
                            <div class="container link-container">
                                <?php if ($card['link']) : ?>
                                    <a href="<?php echo esc_url($card['link']); ?>">
                                        <svg class="svg-link" width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.5" y="0.539062" width="59" height="59" rx="19.5" stroke="#83CD20" />
                                            <path d="M37.1581 26.0008V34.8397C37.1581 35.1711 37.02 35.4749 36.799 35.6959C36.5504 35.9445 36.2466 36.0826 35.9151 36.0826C35.2246 36.1102 34.6445 35.5302 34.6721 34.8397L34.6445 29.0115L26.1924 37.4637C25.6952 37.9609 24.9218 37.9609 24.4246 37.4637C23.9551 36.9941 23.9274 36.1931 24.4246 35.6959L32.8768 27.2438H27.0763C26.3857 27.2714 25.8057 26.6914 25.8333 26.0008C25.8057 25.3103 26.3857 24.7302 27.0763 24.7579H35.9151C36.6056 24.7302 37.1857 25.3103 37.1581 26.0008Z" fill="#83CD20"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <!-- Additional SVG Icon -->
                            <div class="container visa-icon-container">
                                <?php if ($card['icon']) : 
                                    $icon_content = file_get_contents($card['icon']);
                                    echo $icon_content; 
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
