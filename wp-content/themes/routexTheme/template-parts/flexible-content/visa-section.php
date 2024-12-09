<?php
$smalltitle = get_sub_field('smalltitle');
$title = get_sub_field('title');
$visa_cards = [];

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

if ($smalltitle || $title || has_non_empty_cards($visa_cards)) :
?>

<section class="text-center visa-section top-bottom-small">
    <?php if ($smalltitle) : ?>
        <div class="visa-section-subtitles">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/passport-icon.svg" class="img-fluid" alt="Passport Icon">
            <div class="subtitle visa-section-title-subtitle">
            <?php echo esc_html($smalltitle); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($title) : ?>
        <div class="visa-section-title">
            <div class="title visa-section-title-subtitle"><?php echo esc_html($title); ?></div>
        </div>
    <?php endif; ?>

    <?php if (has_non_empty_cards($visa_cards)) : ?>
    <div class="row">
        <?php foreach ($visa_cards as $card) : ?>
            <div class="col-md-6">
                <div class="visa-card">
                    <?php if ($card['image']) : ?>
                    <div class="col-lg-6">
                        <div class="visa-image">
                            <?php $visa_category_img_url = wp_get_attachment_image_url($card['image'], 'visa-category-img'); ?>
                            <img src="<?php echo esc_url($visa_category_img_url); ?>" alt="<?php echo esc_attr($card['title']); ?>" class="img-fluid">
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($card['icon'] || $card['link'] || $card['text'] || $card['title']) : ?>
                    <div class="col-lg-6">
                        <div class="visa-content">
                            <?php if ($card['title']) : ?>
                                <h2 class="text-center visa-card-title"><?php echo esc_html($card['title']); ?></h2>
                            <?php endif; ?>

                            <?php if ($card['text']) : ?>
                                <h5><?php echo esc_html($card['text']); ?></h5>
                            <?php endif; ?>

                            <?php if ($card['icon'] || $card['link']) : ?>
                            <div class="card-bottom-layout">
                                <?php if ($card['link']) : ?>
                                <div class="link-container">
                                    <a href="<?php echo esc_url($card['link']); ?>">
                                        <svg class="svg-link" width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.5" y="0.539062" width="59" height="59" rx="19.5" stroke="#83CD20" />
                                            <path d="M37.1581 26.0008V34.8397C37.1581 35.1711 37.02 35.4749 36.799 35.6959C36.5504 35.9445 36.2466 36.0826 35.9151 36.0826C35.2246 36.1102 34.6445 35.5302 34.6721 34.8397L34.6445 29.0115L26.1924 37.4637C25.6952 37.9609 24.9218 37.9609 24.4246 37.4637C23.9551 36.9941 23.9274 36.1931 24.4246 35.6959L32.8768 27.2438H27.0763C26.3857 27.2714 25.8057 26.6914 25.8333 26.0008C25.8057 25.3103 26.3857 24.7302 27.0763 24.7579H35.9151C36.6056 24.7302 37.1857 25.3103 37.1581 26.0008Z" fill="#83CD20"/>
                                        </svg>
                                    </a>
                                </div>
                                <?php endif; ?>

                                <?php if ($card['icon']) : ?>
                                <div class="visa-icon-container">
                                    <?php $cards_img_url = wp_get_attachment_image_url($card['icon'], 'visa-icon'); ?>
                                    <?php 
                                        $icon_content = file_get_contents($cards_img_url);
                                        echo $icon_content; 
                                    ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</section>
<?php endif; ?>