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
endif;

if ($background_image || $small_title || $title || has_non_empty_cards($cards) || has_non_empty_cards($social_media_cards)) :
?>

<section class="container joindiv" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="our-coaching-section container">
        <!-- Our Coaching Section -->

        <!-- Top Div with Title and Subtitle -->
        <?php if ($small_title || $title): ?>
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
        <?php endif; ?>

        <!-- Bottom Row with Left and Right Divs -->
        <?php if (has_non_empty_cards($cards) || has_non_empty_cards($social_media_cards)): ?>
        <div class="row">
            <!-- Left Div (70% width) with Cards -->
            <?php if (has_non_empty_cards($cards)): ?>
            <div class="col-lg-8 col-md-7 col-12">
                <div class="card-container">
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
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>  
                </div>
            </div>
            <?php endif; ?>

            <!-- Right Div (30% width) with Background Image and Links -->
            <?php if (has_non_empty_cards($social_media_cards)): ?>
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
                                                    'twitter' => '<img src="' . get_template_directory_uri() . '/assets/icons/x.svg" alt="">',
                                                    'facebook' => '<img src="' . get_template_directory_uri() . '/assets/icons/facebook.svg" alt="">',
                                                    'instagram' => '<img src="' . get_template_directory_uri() . '/assets/icons/instagram.svg" alt="">',
                                                    'linkedin' => '<img src="' . get_template_directory_uri() . '/assets/icons/linkedin.svg" alt="">',
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
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>