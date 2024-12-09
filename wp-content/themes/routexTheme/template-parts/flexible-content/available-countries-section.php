<?php
$smalltitle = get_sub_field('smalltitle');
$title = get_sub_field('title');
$button = get_post_type_archive_link('countries');

$countries_query = new WP_Query([
    'post_type'      => 'countries',
    'posts_per_page' => 4,
]);

$countries = [];
if ($countries_query->have_posts()) :
    while ($countries_query->have_posts()) : $countries_query->the_post();
        $countries[] = [
            'title' => get_the_title(),
            'icon'  => get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'),
            'link'  => get_permalink(),
            'bullet_points' => get_field('bullet_point_texts'),
        ];
    endwhile;
    wp_reset_postdata(); 
endif;

if ($smalltitle || $title || $button || !empty($countries)) :
?>
<section class="available-countries-section top-bottom-small">
    <div class="available-countries-section-container">
        <?php if ($smalltitle || $title || $button) : ?>
        <div class="available-countries-section-title-container">
            <?php if ($smalltitle || $title) : ?>
            <div class="available-countries-section-titles">
                <?php if ($smalltitle) : ?>
                <div class="available-countries-section-subtitles">
                    <div class="subtitle available-countries-subtitle">
                        <?php echo esc_html($smalltitle); ?>
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-2.svg" alt="">
                </div>
                <?php endif; ?>
                <?php if ($title) : ?>
                <div class="title available-countries-title">
                    <?php echo esc_html($title); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if ($button) : ?>
            <div class="available-countries-section-buttons">
                <a class="available-countries-section-button" href="<?php echo esc_url($button); ?>">View More 
                    <img src="<?php echo get_template_directory_uri() . '/assets/icons/right-arrow-white-bigger-tale.svg'; ?>" alt="">
                </a>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($countries)) : ?>
        <div class="available-countries-section-cards">
            <div class="row">
                <?php foreach ($countries as $country) : ?>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <a href="<?php echo esc_url($country['link']); ?>" class="available-countries-item">
                        <?php if ($country['icon']) : ?>
                        <div class="available-countries-item-icon">
                            <img src="<?php echo esc_url($country['icon']); ?>" alt="Country icon">
                        </div>
                        <?php endif; ?>
                        <div class="available-countries-item-content">
                            <h3><?php echo esc_html($country['title']); ?></h3>

                            <?php if (!empty($country['bullet_points'])) : ?>
                            <div class="available-countries-item-content-list">
                                <ul>
                                    <?php foreach ($country['bullet_points'] as $bullet_point) : ?>
                                        <?php if (!empty($bullet_point['bullet_point_text'])) : ?>
                                            <li>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/green-checkmark.svg" alt=""><?php echo esc_html($bullet_point['bullet_point_text']); ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
