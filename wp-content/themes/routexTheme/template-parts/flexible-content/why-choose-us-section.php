<?php
    $contact_information = get_field('contact_information', 'options');
    $phone_number = $contact_information['phone_number'] ?? null;

    if (have_rows('why_choose_us')) :
        $first_photo_third_sector = null;
        $second_photo_third_sector = null;
        $experience_text_third_sector = null;
        $third_photo_third_sector = null;
        $subtitle = null;
        $title = null;
        $text_area = null;
        $cards = [];
        $link_url = null;
        
        while (have_rows('why_choose_us')) : the_row();

            if (get_row_layout() == 'leftlayout') :
                $first_photo_third_sector = get_sub_field('first_photo_third_sector');
                $second_photo_third_sector = get_sub_field('second_photo_third_sector');
                $experience_text_third_sector = get_sub_field('experience_text_third_sector');
                $third_photo_third_sector = get_sub_field('third_photo_third_sector');
            endif;

            if (get_row_layout() == 'rightlayout') :
                $subtitle = get_sub_field('subtitle');
                $title = get_sub_field('title');
                $text_area = get_sub_field('text_area');
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
            endif;

        endwhile; 

        if($first_photo_third_sector && $second_photo_third_sector && $experience_text_third_sector && $third_photo_third_sector && $subtitle && $title && $text_area &&  $link_url && $cards):
        ?>
        <section class="choose-us-section">
                <div class="choose-us-section-container top-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="choose-us-media">
                                    <div class="choose-us-media-thumb">
                                        <div class="choose-us-media-thumb-img">
                                            <div class="choose-us-media-thumb-img-green-border" ></div>
                                            <div class="choose-us-media-thumb-img-img" >
                                            <!-- <img src="<?php echo esc_url($first_photo_third_sector); ?>" alt="Why Choose Us Image"> -->

                                            <!-- Remove this when u set image --> <img src="">
                                            </div>
                                        </div>
                                        <div class="choose-us-media-thumb-circle spin">
                                            <!-- <img src="<?php echo esc_url($second_photo_third_sector); ?>" alt="Why Choose Us Image"> -->

                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/choose-us-circle-img.png" alt="">
                                        </div>
                                    </div>
                                    <div class="choose-us-media-img">
                                        <div class="choose-us-text">
                                            <h3 class="choose-us-item-title">
                                                <?php echo esc_html($experience_text_third_sector) ?>
                                            </h3>
                                            <p>Years Of <br> Experience</p>
                                        </div>
                                        <div class="choose-us-media-img-picture" >
                                            <!-- <img src="<?php echo esc_url($third_photo_third_sector); ?>" alt="Why Choose Us Image"> -->
                                            <img src="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                    
                                    <div class="choose-us-section-title-container">
                                        <div class="choose-us-section-subtitles">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                                            <div class="subtitle choose-us-subtitle">
                                                <?php echo esc_html($subtitle) ?>
                                            </div> 
                                        </div>
                                        <div class="title choose-us-title">
                                            <?php echo esc_html($title) ?>
                                        </div>
                                    </div>
                                <p class="choose-us-content-description">
                                    <?php echo esc_html($text_area) ?>
                                </p>
                                <div class="choose-us-cards row">
                                <?php foreach ($cards as $card) : ?>
                                    <div class="col-sm">
                                        <div class="choose-us-item">
                                            <div class="choose-us-item-content">
                                                <div class="choose-us-item-icon">
                                                    <img src="<?php echo esc_url($card['card_icon']) ?>" alt="Card icon">
                                                </div>

                                                <h3><?php echo esc_html($card['card_title']) ?></h3>
                                            </div>
                                            
                                            <div class="choose-us-item-content-list">
                                                <ul>
                                                    <?php
                                                        foreach ($card['card_bullet_points'] as $point) :
                                                            $card_text = $point['bullet_point_text'];
                                                            ?>
                                                            <li>
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light-green-checkmark.svg" alt="">
                                                                <?php echo esc_html($card_text) ?>
                                                            </li>
                                                        <?php
                                                        endforeach;
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                </div>
                                <div class="choose-us-button">
                                    <div class="choose-us-button-btn">
                                        <a href="<?php echo esc_url($link_url); ?>" class="default-img">
                                            Read More <img src="<?php echo get_template_directory_uri() ?>/assets/icons/right-arrow-green.svg" alt="">
                                        </a>
                                        <a href="<?php echo esc_url($link_url); ?>" class="hover-img">
                                            Read More <img src="<?php echo get_template_directory_uri() ?>/assets/icons/right-arrow.svg" alt="">
                                        </a>
                                    </div>

                                    <div class="choose-us-button-text">
                                        <div class="choose-us-button-text-icon">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/icons/telephone.svg" alt="">
                                        </div>
                                        <div class="choose-us-button-text-number">
                                            <h6>Need help?</h6>
                                            <a href="tel:<?php echo esc_attr($phone_number) ?>"><?php echo esc_html($phone_number); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        endif;
    endif;
?> 

