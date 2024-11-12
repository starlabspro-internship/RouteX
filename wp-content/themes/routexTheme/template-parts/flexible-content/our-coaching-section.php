<?php
// ACF Fields
$background_image = get_sub_field('background_image');
$small_title = get_sub_field('sub_title');
$title = get_sub_field('title');

// Cards Repeater Field
$cards = [];
if (have_rows('cards')) :
    while (have_rows('cards')) : the_row();
        $cards[] = [
            'name' => get_sub_field('name'),
            'position' => get_sub_field('position'),
            'person_link' => get_sub_field('person_link'),
        ];
    endwhile;
else:
    echo 'No cards found.';
endif;

// Social Media Card Repeater Field
$social_media_cards = [];
if (have_rows('social_media_card')) :
    while (have_rows('social_media_card')) : the_row();
        $social_media_cards[] = [
            'card_background_image' => get_sub_field('card_background_image') ?: 'path/to/default/image.jpg',
            'links' => get_sub_field('links'),
        ];
    endwhile;
else:
    echo 'No social media cards found.';
endif;
?>

<div class="container joindiv" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <section class="our-coaching-section container my-5">
        <!-- Our Coaching Section -->

        <!-- Top Div with Title and Subtitle -->
        <div class="row mb-4 title-subtitle-div">
            <div class="col-12 text-center">
                <?php if ($small_title): ?>
                    <p class="subtitle">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/passport-icon.svg" class="img-fluid" alt="Passport Icon">
                        <?php echo esc_html($small_title); ?>
                    </p>
                <?php endif; ?>
                <?php if ($title): ?>
                    <h2><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
            </div>
        </div>

        <!-- Bottom Row with Left and Right Divs -->
        <div class="row">
            <!-- Left Div (70% width) with Cards -->
            <div class="col-lg-8 col-md-7 col-12">
                <div class="card-container">
                    <?php if ($cards): ?>
                        <?php foreach ($cards as $card): ?>
                            <?php if ($card['name'] || $card['position'] || $card['person_link']): ?>
                                <div class="card mb-3 p-3 border">
                                    <div class="name-position-div">
                                        <h5><?php echo esc_html($card['name']); ?></h5>
                                        <p><?php echo esc_html($card['position']); ?></p>
                                    </div>
                                    <div class="d-flex card-person-link">
                                    <div class="container link-container">
                                            <?php
                                                $svg_icon = file_get_contents(get_template_directory() . '/assets/icons/right-arrow-link.svg');
                                            ?>
                                            <a class="person-link" href="<?php echo esc_url($card['person_link'] ?: '#'); ?>" aria-label="Link to <?php echo esc_html($card['name']); ?>'s profile">
                                                <span class="svg-icon"><?php echo $svg_icon; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right Div (30% width) with Background Image and Links -->
            <?php if ($social_media_cards): ?>
                <div class="col-lg-4 col-md-5 col-12 d-flex align-items-center justify-content-center flex-column">
                    <?php foreach ($social_media_cards as $social_card): ?>
                        <div class="position-relative bg-image" style="background-image: url('<?php echo esc_url($social_card['card_background_image']); ?>'); background-size: cover; background-position: center;">
                            <div class="overlay-content text-center social-media-links-div">
                                <?php if (!empty($social_card['links'])): ?>
                                    <?php $links = $social_card['links']; ?>
                                    <?php foreach (['twitter', 'facebook', 'instagram', 'linkedin'] as $platform): ?>
                                        <?php if (!empty($links[$platform])): ?>
                                            <a style="text-decoration: none;" href="<?php echo esc_url($links[$platform]['url']); ?>" class="social-link" aria-label="<?php echo ucfirst($platform); ?> link">
                                                <?php
                                                // SVG Icons for Social Media Links
                                                $svg_icons = [
                                                    'twitter' => '<svg class="svg-link-icon" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.5212 6.81788L15.4776 0.0429688H14.0661L8.89418 5.92553L4.7634 0.0429688H-0.000976562L6.24558 8.93844L-0.000976562 16.043H1.41057L6.87224 9.83079L11.2347 16.043H15.999L9.52085 6.81788H9.5212ZM7.58789 9.01681L6.95498 8.13102L1.91917 1.08271H4.08722L8.15118 6.77092L8.78409 7.65671L14.0668 15.0505H11.8987L7.58789 9.01715V9.01681Z" fill="#034833"/></svg>',
                                                    'facebook' => '<svg class="svg-link-icon" width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.71777 9.04297H6.37402V16.043H3.24902V9.04297H0.686523V6.16797H3.24902V3.94922C3.24902 1.44922 4.74902 0.0429688 7.03027 0.0429688C8.12402 0.0429688 9.28027 0.261719 9.28027 0.261719V2.73047H7.99902C6.74902 2.73047 6.37402 3.48047 6.37402 4.29297V6.16797H9.15527L8.71777 9.04297Z" fill="#034833"/></svg>',
                                                    'instagram' => '<svg class="svg-link-icon" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.99902 3.44922C9.96777 3.44922 11.5928 5.07422 11.5928 7.04297C11.5928 9.04297 9.96777 10.6367 7.99902 10.6367C5.99902 10.6367 4.40527 9.04297 4.40527 7.04297C4.40527 5.07422 5.99902 3.44922 7.99902 3.44922ZM7.99902 9.38672C9.28027 9.38672 10.3115 8.35547 10.3115 7.04297C10.3115 5.76172 9.28027 4.73047 7.99902 4.73047C6.68652 4.73047 5.65527 5.76172 5.65527 7.04297C5.65527 8.35547 6.71777 9.38672 7.99902 9.38672ZM12.5615 3.32422C12.5615 2.85547 12.1865 2.48047 11.7178 2.48047C11.249 2.48047 10.874 2.85547 10.874 3.32422C10.874 3.79297 11.249 4.16797 11.7178 4.16797C12.1865 4.16797 12.5615 3.79297 12.5615 3.32422ZM14.9365 4.16797C14.999 5.32422 14.999 8.79297 14.9365 9.94922C14.874 11.0742 14.624 12.043 13.8115 12.8867C12.999 13.6992 11.999 13.9492 10.874 14.0117C9.71777 14.0742 6.24902 14.0742 5.09277 14.0117C3.96777 13.9492 2.99902 13.6992 2.15527 12.8867C1.34277 12.043 1.09277 11.0742 1.03027 9.94922C0.967773 8.79297 0.967773 5.32422 1.03027 4.16797C1.09277 3.04297 1.34277 2.04297 2.15527 1.23047C2.99902 0.417969 3.96777 0.167969 5.09277 0.105469C6.24902 0.0429688 9.71777 0.0429688 10.874 0.105469C11.999 0.167969 12.999 0.417969 13.8115 1.23047C14.624 2.04297 14.874 3.04297 14.9365 4.16797ZM13.4365 11.168C13.8115 10.2617 13.7178 8.07422 13.7178 7.04297C13.7178 6.04297 13.8115 3.85547 13.4365 2.91797C13.1865 2.32422 12.7178 1.82422 12.124 1.60547C11.1865 1.23047 8.99902 1.32422 7.99902 1.32422C6.96777 1.32422 4.78027 1.23047 3.87402 1.60547C3.24902 1.85547 2.78027 2.32422 2.53027 2.91797C2.15527 3.85547 2.24902 6.04297 2.24902 7.04297C2.24902 8.07422 2.15527 10.2617 2.53027 11.168C2.78027 11.793 3.24902 12.2617 3.87402 12.5117C4.78027 12.8867 6.96777 12.793 7.99902 12.793C8.99902 12.793 11.1865 12.8867 12.124 12.5117C12.7178 12.2617 13.1865 11.793 13.4365 11.168Z" fill="#034833"/>
                                    </svg>',
                                                    'linkedin' => '<svg class="svg-link-icon" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.4975 0H4.50254C2.01989 0 0 2.01989 0 4.50254V13.4975C0 15.9801 2.01989 18 4.50254 18H13.4975C15.9801 18 18 15.9801 18 13.4975V4.50254C18 2.01989 15.9801 0 13.4975 0ZM6.99006 14.2241H4.92712V7.28473H6.99006V14.2241ZM5.95857 6.12316C5.07646 6.12316 4.50254 5.53924 4.50254 4.65713C4.50254 3.77502 5.07646 3.2011 5.95857 3.2011C6.84068 3.2011 7.4146 3.77502 7.4146 4.65713C7.4146 5.53924 6.84068 6.12316 5.95857 6.12316ZM14.0729 14.2241H12.0099V10.7631C12.0099 9.77502 11.9875 8.47766 10.6536 8.47766C9.32964 8.47766 8.98107 9.47265 8.98107 10.6581V14.2241H6.99006V7.28473H8.99006V8.3549H9.01729C9.55187 7.385 10.9515 6.97016 11.9263 6.97016C14.0094 6.97016 14.0729 8.30147 14.0729 10.6581V14.2241Z" fill="#034833"/>
                                    </svg>',
                                                ];
                                                echo $svg_icons[$platform]; // Output the appropriate SVG
                                                ?>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>
