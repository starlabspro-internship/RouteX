<?php
$background_image = get_sub_field('background_image');
$small_title = get_sub_field('sub_title');
$title = get_sub_field('title');

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

<section class="our-coaching-section">
    <div class="our-coaching-section-container top-bottom">
        <div class="our-coaching-bg-img"></div>
            <?php if ($small_title || $title): ?>
            <div class="row title-subtitle-div">
                <div class="col-12">
                    <?php if ($small_title): ?>
                        <div class="our-coaching-section-subtitle">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/passport-icon.svg" class="img-fluid" alt="Passport Icon">
                            <div class="subtitle our-coaching-section-subtitle-costum">
                                <?php echo esc_html($small_title); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <div class="title"><?php echo esc_html($title); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if (has_non_empty_cards($cards) || has_non_empty_cards($social_media_cards)): ?>
            <div class="row">
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
                                        <div class="link-container">
                                            <?php
                                                $svg_icon = file_get_contents(get_template_directory() . '/assets/icons/right-arrow-circle.svg');
                                            ?>
                                            <a class="person-link" href="<?php echo esc_url($card['person_link'] ?: '#'); ?>" aria-label="Link to <?php echo esc_html($card['name']); ?>'s profile">
                                                <span class="svg-icon"><?php echo $svg_icon; ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>  
                    </div>
                </div>
                <?php endif; ?>

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
        $svg_icons = [
            'twitter' => file_get_contents(get_template_directory() . '/assets/icons/x.svg'),
            'facebook' => file_get_contents(get_template_directory() . '/assets/icons/facebook.svg'),
            'instagram' => file_get_contents(get_template_directory() . '/assets/icons/instagram.svg'),
            'linkedin' => file_get_contents(get_template_directory() . '/assets/icons/linkedin.svg'),
        ];

        
        echo str_replace('<svg', '<svg class="svg-link-icon"', $svg_icons[$platform]);
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