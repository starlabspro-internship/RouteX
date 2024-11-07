<?php
    if (have_rows('available_countries')) :
        $smalltitle = null;
        $title = null;
        $button = null;
        $cards = [];
        
        while (have_rows('available_countries')) : the_row();
            if (get_row_layout() == 'sector7layout1') :
                $smalltitle = get_sub_field('smalltitle');
                $title = get_sub_field('title');
                $button = get_sub_field('button');
                if (have_rows('cards')) :
                    while (have_rows('cards')) : the_row();
                        $cards[] = [
                            'card_icon' => get_sub_field('card_icon'),
                            'card_title' => get_sub_field('card_title'),
                            'card_bullet_points' => get_sub_field('card_bullet_points')
                        ];
                    endwhile;
                endif;
            endif;

        endwhile; 

        if($smalltitle && $title && $button && $cards):
?>
<section class="available-countries-section">
    <div class="available-countries-section-container top-bottom">
        <div class="container">
            <div class="available-countries-section-title-container">
                <div class="available-countries-section-titles">
                    <div class="available-countries-section-subtitles">
                            <div class="subtitle available-countries-subtitle">
                                <?php
                                    echo esc_html($smalltitle);
                                ?>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-2.svg" alt="">
                    </div>
                    <div class="title available-countries-title">
                        <?php

                            echo esc_html($title);
                        ?>
                    </div>
                </div>
                <div class="available-countries-section-buttons">
                    <a class="available-countries-section-button" href="<?php echo esc_url($button) ?>">View More <img src="<?php echo get_template_directory_uri() . '/assets/icons/right-arrow.svg' ?>" alt="" > </a>
                </div>
            </div>
            <div class="available-countries-section-cards">
                <div class="row">
                    <?php
                        foreach ($cards as $card) {
                            ?>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="available-countries-item">
                                    <div class="available-countries-item-icon">
                                        <!-- <img src="<?php echo esc_url($card['card_icon']); ?>" alt="Card icon"> -->
                                        <img src=""> 
                                    </div>
                                    <div class="available-countries-item-content">
                                        <h3><?php echo esc_html($card['card_title']); ?></h3>
                                        <div class="available-countries-item-content-list">
                                            <ul>
                                                <?php foreach ($card['card_bullet_points'] as $card_bullet_points) { ?>
                                                
                                                    <li><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/green-checkmark.svg" alt=""><?php echo esc_html($card_bullet_points['card_text']); ?></li>
                                                
                                                <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
        endif;
    endif;
?>