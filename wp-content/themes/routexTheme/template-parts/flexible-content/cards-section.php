<?php
$cards = [];
if (have_rows('card_repeater')) :
    while (have_rows('card_repeater')) : the_row();
        $cards[] = [
            'card_icon'  => get_sub_field('card_icon'), 
            'card_title' => get_sub_field('card_title'),
            'card_text'  => get_sub_field('card_text'),
        ];
    endwhile;

    if (!empty($cards)) :
?>
<section class="cards-div top-bottom-small">
    <div class="row cardrow">
        <?php foreach ($cards as $card) : ?>
            <?php if ($card['card_icon'] || $card['card_title'] || $card['card_text']) : ?>
                <div class="col-lg-4">
                    <div class="card card1">
                        <div class="card-body">
                            <div class="circle cardic">
                                <?php if ($card['card_icon']) : ?>
                                    <?php 
                                    $cards_img_url   = wp_get_attachment_image_url($card['card_icon'], 'medium'); 
                                    $cards_img_srcset = wp_get_attachment_image_srcset($card['card_icon'], 'cards-img'); 
                                    $cards_img_alt    = get_post_meta($card['card_icon'], '_wp_attachment_image_alt', true);
                                    ?>
                                    <img 
                                        src="<?php echo esc_url($cards_img_url); ?>" 
                                        srcset="<?php echo esc_attr($cards_img_srcset); ?>" 
                                        sizes="(max-width: 768px) 100vw, 33vw" 
                                        alt="<?php echo esc_attr($cards_img_alt ?: 'Icon'); ?>" 
                                        class="card-icon" 
                                        loading="lazy"
                                    >
                                <?php endif; ?>
                            </div>

                            <?php if ($card['card_title']) : ?>
                                <h3 class="card-title"><?php echo esc_html($card['card_title']); ?></h3>
                            <?php endif; ?>

                            <?php if ($card['card_text']) : ?>
                                <p class="card-text"><?php echo esc_html($card['card_text']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
<?php 
    endif; 
endif;
?>
