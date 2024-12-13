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
                                        <?php echo file_get_contents(get_template_directory() . '/assets/icons/upright-arrow-light-green.svg');?>
                                    </a>
                                </div>
                                <?php endif; ?>

                                <?php if ($card['icon']) : ?>
                                <div class="visa-icon-container">
                                    <?php $cards_img_url = wp_get_attachment_image_url($card['icon'], 'visa-icon'); ?>
                                    <?php echo file_get_contents($cards_img_url);?>
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