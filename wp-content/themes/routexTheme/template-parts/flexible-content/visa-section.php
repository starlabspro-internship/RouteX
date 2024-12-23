<?php
$smalltitle = get_sub_field('smalltitle');
$title = get_sub_field('title');
$post_category = get_sub_field('post_category');

$args = [
    'post_type' => $post_category,
    'posts_per_page' => 4,
    'orderby' => 'date', 
    'order' => 'DESC'
];

$query = new WP_Query($args);

$visa_cards = [];

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $visa_cards[] = [
            'image' => get_post_thumbnail_id(get_the_ID()), 
            'title' => get_the_title(),
            'text' => get_field('visa_short_text'),
            'link' => get_permalink(),
            'icon' => get_field('visa_icon')
        ];
    endwhile;
endif;

wp_reset_postdata();

$has_non_empty_cards_boolean = has_non_empty_cards($visa_cards);

if ($smalltitle || $title || $has_non_empty_cards_boolean) :
?>

<section class="text-center visa-section top-bottom-small">
    <?php if ($smalltitle) : ?>
    <div class="visa-section-subtitles">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" class="img-fluid"
            alt="Passport Icon" width="21" height="21" loading="lazy">
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

    <?php if ($has_non_empty_cards_boolean) : ?>
    <div class="row">
        <?php foreach ($visa_cards as $card) : ?>
        <div class="col-md-6">
            <div class="visa-card">
                <?php if ($card['image']) : ?>
                <div class="col-lg-6">
                    <div class="visa-image">
                        <?php 
                            $card_image_url = wp_get_attachment_image_url($card['image'], 'visa-category-img'); 
                            $card_image_srcset = wp_get_attachment_image_srcset($card['image'], 'visa-category-img');
                            ?>
                        <img class="img-fluid" src="<?php echo esc_url($card_image_url); ?>"
                            srcset="<?php echo esc_attr($card_image_srcset); ?>" alt="visa-category-img"
                            sizes="(max-width: 600px) 100vw, 50vw" loading="lazy" width="281" height="250">
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
                                <a href="<?php echo esc_url($card['link']); ?>"
                                    aria-label="Learn more about <?php echo esc_html($card['title']); ?>">
                                    <?php echo file_get_contents(get_template_directory() . '/assets/icons/upright-arrow-light-green.svg'); ?>
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if ($card['icon']) : ?>
                            <div class="visa-icon-container">
                                <?php
                                    $cards_img_url = wp_get_attachment_image_url($card['icon'], 'visa-icon');
                                    echo file_get_contents($cards_img_url);
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