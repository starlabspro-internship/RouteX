<?php
$smalltitle = get_sub_field('smalltitle');
$title = get_sub_field('title');
$button = get_sub_field('button');
$cards = [];
if (have_rows('cards')) :
    while (have_rows('cards')) : the_row();
        $cards[] = [
            'card_icon' => get_sub_field('card_icon'),
            'card_title' => get_sub_field('card_title'),
            'card_bullet_points' => get_sub_field('card_bullet_points')
        ];
    endwhile;
endif;
if ($smalltitle || $title || $button || has_non_empty_cards($cards)) :
?>
<section class="available-countries-section top-bottom-small">
    <div class="available-countries-section-container ">
        <?php if ($smalltitle || $title || $button) : ?>
        <div class="available-countries-section-title-container">
            <?php if ($smalltitle || $title) : ?>
            <div class="available-countries-section-titles">
                <?php if ($smalltitle) : ?>
                <div class="available-countries-section-subtitles">
                        <div class="subtitle available-countries-subtitle">
                            <?php
                                echo esc_html($smalltitle);
                            ?>
                        </div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-2.svg" alt="">
                </div>
                <?php endif; ?>
                <?php if ($title) : ?>
                <div class="title available-countries-title">
                    <?php
                        echo esc_html($title);
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if ($button) : ?>
            <div class="available-countries-section-buttons">
                <a class="available-countries-section-button" href="<?php echo esc_url($button) ?>">View More <img src="<?php echo get_template_directory_uri() . '/assets/icons/right-arrow-white-bigger-tale.svg' ?>" alt="" ></a>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php if (has_non_empty_cards($cards)) : ?>
        <div class="available-countries-section-cards">
            <div class="row">
                <?php
                    foreach ($cards as $card) {
                        ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="available-countries-item">
                                <?php if ($card['card_icon']) : ?>
                                <div class="available-countries-item-icon">
                                    <img src="<?php echo esc_url($card['card_icon']); ?>" alt="Card icon">
                                </div>
                                <?php endif; ?>
                                <?php if ($card['card_title'] || has_non_empty_values($card['card_bullet_points'])) : ?>
                                <div class="available-countries-item-content">
                                    <?php if ($card['card_title']) : ?>
                                    <h3><?php echo esc_html($card['card_title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($card['card_bullet_points']) : ?>
                                    <div class="available-countries-item-content-list">
                                        <ul>
                                            <?php foreach ($card['card_bullet_points'] as $card_bullet_points) { ?>
                                                <?php if (!empty($card_bullet_points['bullet_point_text'])) : ?>
                                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/green-checkmark.svg" alt=""><?php echo esc_html($card_bullet_points['bullet_point_text']); ?></li>
                                            <?php endif; }?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>