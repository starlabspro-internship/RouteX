<?php

$cards = [];
if (have_rows('card_repeater')) :
    while (have_rows('card_repeater')) : the_row();
        $cards[] = [
            'card_icon' => get_sub_field('card_icon'),
            'card_title' => get_sub_field('card_title'),
            'card_text' => get_sub_field('card_text'),
        ];
    endwhile;

    if (has_non_empty_cards($cards)) :
?>
<section class="container cards-div top-bottom-small">
    <div class="row cardrow ">
        <?php foreach ($cards as $card) : ?>
            <?php if ($card['card_icon'] || $card['card_title'] || $card['card_text']) : ?>
                <div class="col-md-4 cards-wrapper">
                    <div class="card card1">
                        <div class="card-body">
                            <div class="circle cardic">
                                <?php if ($card['card_icon']) : ?>
                                    <img src="<?php echo esc_url($card['card_icon']); ?>" alt="Icon" class="card-icon">
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