<?php
$contact_information = get_field('contact_information', 'options');
$phone_number = $contact_information['phone_number'] ?? null;   

function has_content_in_layout() {
    $has_content = false;
    if (have_rows('why_choose_us')) :
        while (have_rows('why_choose_us')) : the_row();

            if (get_row_layout() == 'left_layout') :
                $first_photo_third_sector = get_sub_field('image_1');
                $second_photo_third_sector = get_sub_field('image_2');
                $experience_text_third_sector = get_sub_field('experience_text');
                $third_photo_third_sector = get_sub_field('image_3');
                if ($first_photo_third_sector || $second_photo_third_sector || $experience_text_third_sector || $third_photo_third_sector) :
                    $has_content = true;
                endif;
            endif;

            if (get_row_layout() == 'right_layout') :
                $subtitle = get_sub_field('subtitle');
                $title = get_sub_field('title');
                $text_area = get_sub_field('text_area');
                if (!empty($subtitle) || !empty($title) || !empty($text_area)) :
                    $has_content = true;
                endif;

                if (have_rows('cards')) :
                    while (have_rows('cards')) : the_row();
                        if (get_sub_field('card_icon') || get_sub_field('card_title') || has_non_empty_values(get_sub_field('card_bullet_points'))) :
                            $has_content = true;
                        endif;
                    endwhile;
                endif;
            endif;

        endwhile;
    endif;

    return $has_content;
}

if (has_content_in_layout() || $phone_number) :
    ?>
        <section class="choose-us-section top-bottom-small">
            <div class="choose-us-section-container ">
                <div class="container">
                    <div class="row">
    <?php
    while (have_rows('why_choose_us')) : the_row();
    
        if (get_row_layout() == 'left_layout') :
            $first_photo_third_sector = get_sub_field('image_1');
            $second_photo_third_sector = get_sub_field('image_2');
            $experience_text_third_sector = get_sub_field('experience_text');
            $third_photo_third_sector = get_sub_field('image_3');
            if ($first_photo_third_sector || $second_photo_third_sector || $experience_text_third_sector || $third_photo_third_sector) :
            ?>
            <div class="col-xl-6">
                <div class="choose-us-media">
                    <div class="choose-us-media-thumb">
                        <?php if ($first_photo_third_sector) : ?>
                        <div class="choose-us-media-thumb-img">
                            <div class="choose-us-media-thumb-img-green-border" ></div>
                            <div class="choose-us-media-thumb-img-img" >
                                <img src="<?php echo esc_url($first_photo_third_sector); ?>" alt="Why Choose Us Image">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($second_photo_third_sector) : ?>
                        <div class="choose-us-media-thumb-circle">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/choose-us-circle-img.png" alt="">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="choose-us-media-img">
                        <?php if ($experience_text_third_sector) : ?>
                        <div class="choose-us-text">
                            <h3 class="choose-us-item-title">
                                <?php echo esc_html($experience_text_third_sector) ?>
                            </h3>
                            <p>Years Of <br> Experience</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($third_photo_third_sector) : ?>
                        <div class="choose-us-media-img-picture" >
                            <img src="<?php echo esc_url($third_photo_third_sector); ?>" alt="Why Choose Us Image">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
            endif;
        endif;
        
        if (get_row_layout() == 'right_layout') :
            $subtitle = get_sub_field('subtitle');
            $title = get_sub_field('title');
            $text_area = get_sub_field('text_area');
            $cards = [];
            if (have_rows('cards')) :
                while (have_rows('cards')) : the_row();
                    $cards[] = [
                        'card_icon' => get_sub_field('card_icon'),
                        'card_title' => get_sub_field('card_title'),
                        'card_bullet_points' => get_sub_field('card_bullet_points'),
                    ];
                endwhile;
            endif;
            $link_url = get_sub_field('button_link');
            if ($subtitle || $title || $text_area || has_non_empty_cards($cards) || $link_url || $phone_number) :
            ?>
            <div class="col-xl-6">
                <?php if ($title || $subtitle) : ?>
                <div class="choose-us-section-title-container">
                    <?php if ($subtitle) : ?>
                    <div class="choose-us-section-subtitles">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                        <div class="subtitle choose-us-subtitle">
                            <?php echo esc_html($subtitle) ?>
                        </div> 
                    </div>
                    <?php endif; ?>
                    <?php if ($title) : ?>
                    <div class="title choose-us-title">
                        <?php echo esc_html($title) ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if ($text_area) : ?>
                <p class="choose-us-content-description">
                    <?php echo esc_html($text_area) ?>
                </p>
                <?php endif; ?>
                <?php if (has_non_empty_cards($cards)) : ?>
                <div class="choose-us-cards row">
                <?php foreach ($cards as $card) : ?>
                    <div class="col-sm">
                        <div class="choose-us-item">
                            <?php if ($card['card_icon'] || $card['card_title']) : ?>
                            <div class="choose-us-item-content">
                                <?php if ($card['card_icon']) : ?>
                                <div class="choose-us-item-icon">
                                    <img src="<?php echo esc_url($card['card_icon']) ?>" alt="">
                                </div>
                                <?php endif; ?>

                                <?php if ($card['card_title']) : ?>
                                <h3><?php echo esc_html($card['card_title']) ?></h3>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php if ($card['card_bullet_points']) : ?>
                            <div class="choose-us-item-content-list">
                                <ul>
                                    <?php
                                        foreach ($card['card_bullet_points'] as $point) :
                                            $card_text = $point['bullet_point_text'];
                                            if (!empty($card_text)) : ?>
                                            <li>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light-green-checkmark.svg" alt="">
                                                <?php echo esc_html($card_text) ?>
                                            </li>
                                            <?php
                                            endif;
                                        endforeach;
                                    ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($link_url || $phone_number) : ?>
                <div class="choose-us-button">
                    <?php if ($link_url) : ?>
                    <div class="choose-us-button-btn">
                        <a href="<?php echo esc_url($link_url); ?>" class="default-img">
                            Read More <img src="<?php echo get_template_directory_uri() ?>/assets/icons/right-arrow-green.svg" alt="">
                        </a>
                        <a href="<?php echo esc_url($link_url); ?>" class="hover-img">
                            Read More <img src="<?php echo get_template_directory_uri() ?>/assets/icons/right-arrow.svg" alt="">
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if ($phone_number) : ?>
                    <div class="choose-us-button-text">
                        <div class="choose-us-button-text-icon">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/telephone.svg" alt="">
                        </div>
                        <div class="choose-us-button-text-number">
                            <h6>Need help?</h6>
                            <a href="tel:<?php echo esc_attr($phone_number) ?>"><?php echo esc_html($phone_number); ?></a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>

        <?php
            endif;
        endif;
    endwhile; 
    ?>
                </div>
                </div>
            </div>
        </section>
    <?php
endif;
?> 

