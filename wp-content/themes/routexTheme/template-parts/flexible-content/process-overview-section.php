<?php
$small_title = get_sub_field('small_title');
$title = get_sub_field('title');
$cards = [];
if (have_rows('cards')) :
    while (have_rows('cards')) : the_row();
        $cards[] = [
            'card_title' => get_sub_field('card_title'),
            'card_text_' => get_sub_field('card_text_'),
        ];
    endwhile;
endif;
if ($small_title || $title || has_non_empty_cards($cards)) :
?>
<section class="process-overview-section top-bottom-small">
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
            <?php if (has_non_empty_cards($cards)) : ?>
            <div class="process-overview-item-container row">
                <?php
                    $card_index = 1;
                    foreach ($cards as $card) {
                    
                        $extra_class = ($card_index === 2) ? 'process-overview-extra-style' : '';
                        ?>
                        <?php if ($card['card_title'] || $card['card_text_']) : ?>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="process-overview-item <?php echo $extra_class; ?>">
                                <span class="process-overview-item-number">0<?php echo esc_html($card_index); ?></span>
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
<?php endif; ?>