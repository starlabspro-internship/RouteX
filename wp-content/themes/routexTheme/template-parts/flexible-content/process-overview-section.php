<?php
$small_title = get_sub_field('small_title');
$title = get_sub_field('title');
if (have_rows('cards')) :
    while (have_rows('cards')) : the_row();
        $cards[] = [
            'card_number' => get_sub_field('card_number'),
            'card_title' => get_sub_field('card_title'),
            'card_text_' => get_sub_field('card_text_'),
        ];
    endwhile;
endif;
?>
<section class="process-overview-section">
    <div class="process-overview-section-container top-bottom">
        <div class="process-overview-bg-img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/process-bg.png');"></div>
        <div class="container">
            <div class="row">
                <?php if ($small_title || $title) : ?>
                <div class="process-overview-section-titles">
                    <?php if ($small_title) : ?>
                    <div class="process-overview-section-subtitles">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                        <div class="subtitle process-overview-subtitle">
                            <?php
                                echo esc_html($small_title);
                            ?>
                        </div>    
                    </div>
                    <?php endif; ?>
                    <?php if ($title) : ?>
                    <div class="process-overview-title">
                        <div class="title process-overview-title-color">
                            <?php
                                echo esc_html($title);
                            ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($cards) : ?>
            <div class="process-overview-item-container row">
                <?php
                    $card_index = 1;
                    foreach ($cards as $card) {
                    
                        $extra_class = ($card_index === 2) ? 'process-overview-extra-style' : '';
                        ?>
                        <?php if ($card['card_number'] || $card['card_title'] || $card['card_text_']) : ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="process-overview-item <?php echo $extra_class; ?>">
                                <?php if ($card['card_number']) : ?>
                                <span class="process-overview-item-number"><?php echo esc_html($card['card_number']); ?></span>
                                <?php endif; ?>
                                <?php if ($card['card_title']) : ?>
                                <h5><?php echo esc_html($card['card_title']); ?></h5>
                                <?php endif; ?>
                                <?php if ($card['card_text_']) : ?>
                                <p><?php echo esc_html($card['card_text_']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php
                        $card_index++;
                    }
                ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
















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
                        <?php if ($card['name'] || $card['position']): ?>
                            <div class="card mb-3 p-3 border">
                                <div class="name-pos-div">
                                    <h5><?php echo esc_html($card['name']); ?></h5>
                                    <p><?php echo esc_html($card['position']); ?></p>
                                </div>
                                <div class="d-flex card-person-link">
                                    <div class="container link-container">
                                        <a class="person-link" href="<?php echo esc_url($card['position']); ?>" aria-label="Link to <?php echo esc_html($card['name']); ?>'s profile">
                                            <svg class="svg-link2" width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="30" cy="30.5" r="29.5" stroke="#83CD20" />
                                                <path d="M37.1581 26.0008V34.8397C37.1581 35.1711 37.02 35.4749 36.799 35.6959C36.5504 35.9445 36.2466 36.0826 35.9151 36.0826C35.2246 36.1102 34.6445 35.5302 34.6721 34.8397L34.6445 29.0115L26.1924 37.4637C25.6952 37.9609 24.9218 37.9609 24.4246 37.4637C23.9551 36.9941 23.9274 36.1931 24.4246 35.6959L32.8768 27.2438H27.0763C26.3857 27.2714 25.8057 26.6914 25.8333 26.0008C25.8057 25.3103 26.3857 24.7302 27.0763 24.7579H35.9151C36.6056 24.7302 37.1857 25.3103 37.1581 26.0008Z" fill="#83CD20"/>
                                            </svg>
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
                                <?php foreach (['twitter', 'facebook', 'instagram'] as $platform): ?>
                                    <?php if (!empty($social_card['links'][$platform])): ?>
                                        <a style="text-decoration: none;" href="<?php echo esc_url($social_card['links'][$platform]['url']); ?>" class="social-link" aria-label="<?php echo ucfirst($platform); ?> link">
                                            <svg class="svg-link-icon" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="..."></path> <!-- SVG Path data goes here -->
                                            </svg>
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
