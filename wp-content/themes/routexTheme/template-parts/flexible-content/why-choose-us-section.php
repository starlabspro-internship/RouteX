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
                                    <?php
                                        if (have_rows('why_choose_us')) :
                                            while (have_rows('why_choose_us')) : the_row();
                                                if (get_row_layout() == 'leftlayout') :
                                                    $first_photo_third_sector = get_sub_field('first_photo_third_sector');
                                                    if ($first_photo_third_sector) :
                                                        echo '<img src="' . esc_url($first_photo_third_sector) . '" alt="Why Choose Us Image">';
                                                    endif;

                                                endif;

                                            endwhile;
                                        endif;
                                    ?>
                                    <!-- Remove this when u set image --> <img src="">
                                </div>
                            </div>
                            <div class="choose-us-media-thumb-circle spin">
                                    <?php
                                        if (have_rows('why_choose_us')) :
                                            while (have_rows('why_choose_us')) : the_row();
                                                if (get_row_layout() == 'leftlayout') :
                                                    $second_photo_third_sector = get_sub_field('second_photo_third_sector');
                                                    if ($second_photo_third_sector) :
                                                        echo '<img src="' . esc_url($second_photo_third_sector) . '" alt="Why Choose Us Image">';
                                                    endif;

                                                endif;

                                            endwhile;
                                        endif;
                                    ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/choose-us-circle-img.png" alt="">
                            </div>
                        </div>
                        <div class="choose-us-media-img">
                            <div class="choose-us-text">
                                <h3 class="choose-us-item-title">
                                    <?php
                                        if (have_rows('why_choose_us')) :
                                            while (have_rows('why_choose_us')) : the_row();
                                                if (get_row_layout() == 'leftlayout') :
                                                    $experience_text_third_sector = get_sub_field('experience_text_third_sector');
                                                    if ($experience_text_third_sector) :
                                                         echo esc_html($experience_text_third_sector);
                                                    endif;

                                                endif;

                                            endwhile;
                                        endif;
                                    ?>
                                </h3>
                                <p>Years Of <br> Experience</p>
                            </div>
                            <div class="choose-us-media-img-picture" >
                                    <?php
                                        if (have_rows('why_choose_us')) :
                                            while (have_rows('why_choose_us')) : the_row();
                                                if (get_row_layout() == 'leftlayout') :
                                                    $third_photo_third_sector = get_sub_field('third_photo_third_sector');
                                                    if ($third_photo_third_sector) :
                                                        echo '<img src="' . esc_url($third_photo_third_sector) . '" alt="Why Choose Us Image">';
                                                    endif;

                                                endif;

                                            endwhile;
                                        endif;
                                    ?>
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
                                        <?php
                                            if (have_rows('why_choose_us')) :
                                                while (have_rows('why_choose_us')) : the_row();
                                                    if (get_row_layout() == 'rightlayout') :
                                                        $subtitle = get_sub_field('subtitle');
                                                        if ($subtitle) :
                                                            echo esc_html($subtitle);
                                                        endif;

                                                    endif;

                                                endwhile;
                                            endif;
                                        ?>
                                    </div> 
                            </div>
                            <div class="title choose-us-title">
                                <?php
                                    if (have_rows('why_choose_us')) :
                                        while (have_rows('why_choose_us')) : the_row();
                                            if (get_row_layout() == 'rightlayout') :
                                                $title = get_sub_field('title');
                                                if ($title) :
                                                    echo esc_html($title);
                                                endif;
                                            endif;
                                        endwhile;
                                    endif;
                                ?>
                            </div>
                        </div>
                    <p class="choose-us-content-description">
                        <?php
                            if (have_rows('why_choose_us')) :
                                while (have_rows('why_choose_us')) : the_row();
                                    if (get_row_layout() == 'rightlayout') :
                                        $text_area = get_sub_field('text_area');
                                        if ($text_area) :
                                            echo esc_html($text_area);
                                        endif;
                                    endif;
                                endwhile;
                            endif;
                        ?>
                    </p>
                    <div class="choose-us-cards row">
                            <?php
                                if (have_rows('why_choose_us')) :
                                    while (have_rows('why_choose_us')) : the_row();
                                        if (get_row_layout() == 'rightlayout') :
                                            if (have_rows('cards')) :
                                                while (have_rows('cards')) : the_row();
                                                    $card_icon = get_sub_field('card_icon');
                                                    $card_title = get_sub_field('card_title');
                                                    $card_bullet_points = get_sub_field('card_bullet_points');
                                                    ?>
                                                    
                                                    <div class="col-sm">
                                                        <div class="choose-us-item">
                                                            <div class="choose-us-item-content">
                                                                <div class="choose-us-item-icon">
                                                                    <img src="<?php echo esc_url($card_icon); ?>" alt="Card icon">
                                                                </div>

                                                                <?php if ($card_title) : ?>
                                                                    <h3><?php echo esc_html($card_title); ?></h3>
                                                                <?php endif; ?>
                                                            </div>
                                                            
                                                            <div class="choose-us-item-content-list">
                                                                <ul>
                                                                    <?php
                                                                    if ($card_bullet_points) :
                                                                        foreach ($card_bullet_points as $point) :
                                                                            $card_text = $point['bullet_point_text'];
                                                                            ?>
                                                                            <li>
                                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/light-green-checkmark.svg" alt="">
                                                                                <?php echo esc_html($card_text); ?>
                                                                            </li>
                                                                        <?php
                                                                        endforeach;
                                                                    endif;
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php
                                                endwhile;
                                            endif;

                                        endif;

                                    endwhile;
                                endif;
                            ?>
                    </div>
                    <div class="choose-us-button">
                        <div class="choose-us-button-btn">
                            <?php
                            if (have_rows('why_choose_us')) :
                                while (have_rows('why_choose_us')) : the_row();
                                    if (get_row_layout() == 'rightlayout') :
                                        $link_url = get_sub_field('button_link');
                                        if ($link_url) :
                                            ?>
                                            <a href="<?php echo esc_url($link_url); ?>" class="default-img">
                                                Read More <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg" alt="">
                                            </a>
                                            <a href="<?php echo esc_url($link_url); ?>" class="hover-img">
                                                Read More <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="">
                                            </a>
                                            <?php
                                        endif;
                                    endif;
                                endwhile;
                            endif;
                            ?>
                        </div>

                        <div class="choose-us-button-text">
                            <div class="choose-us-button-text-icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/telephone.svg" alt="">
                            </div>
                            <div class="choose-us-button-text-number">
                                <h6>Need help?</h6>
                                <?php
                                    $contact_information = get_field('contact_information', 'options');

                                    if ($contact_information && isset($contact_information['phone_number'])) {
                                        $phone_number = $contact_information['phone_number'];
                                        ?>
                                        <a href="tel:<?php echo esc_attr($phone_number); ?>"><?php echo esc_html($phone_number); ?></a>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>