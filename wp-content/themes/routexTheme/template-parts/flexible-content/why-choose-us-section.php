<?php
$contact_information = get_field('contact_information', 'options');
$phone_information = $contact_information['phone_information'] ?? null;   
$phone_number = $phone_information['phone_number'] ?? null;  
$phone_icon = $phone_information['phone_icon'] ?? null;  
$left_group = get_sub_field('left_group');
$first_image = $left_group['first_image'] ?? null; 
$first_image_url = wp_get_attachment_image_url($first_image, 'why-choose-us-left-img');
$experience_number = $left_group['experience_number'] ?? null;
$second_image = $left_group['second_image'] ?? null;
$second_image_url = wp_get_attachment_image_url($second_image, 'why-choose-us-right-img');
$right_group = get_sub_field('right_group');
$subtitle = $right_group['subtitle'] ?? null;
$title = $right_group['title'] ?? null;
$text_area = $right_group['text_area'] ?? null;
$button_link = $right_group['button_link'] ?? null;
$cards = $right_group['cards'] ?? null;

$has_non_empty_cards_boolean = has_non_empty_cards($cards);

if ($phone_number || $has_non_empty_cards_boolean || $first_image || $experience_number || $second_image ||$subtitle || $title || $text_area || $button_link) :
    $is_split_layout = ($subtitle || $title || $text_area || $has_non_empty_cards_boolean || $button_link || $phone_number) && ($first_image || $experience_number || $second_image);
?>
<section class="choose-us-section top-bottom-small">
    <div class="choose-us-section-container ">
        <div class="row">
            <?php if ($first_image || $experience_number || $second_image) :?>
            <div class="<?php echo esc_attr($is_split_layout ? 'col-xl-6' : 'col-12'); ?>">
                <div class="choose-us-media">
                    <div class="choose-us-media-thumb">
                        <?php if ($first_image) : ?>
                        <div class="choose-us-media-thumb-img">
                            <div class="choose-us-media-thumb-img-green-border" ></div>
                            <div class="choose-us-media-thumb-img-img" >
                                <img src="<?php echo esc_url($first_image_url); ?>" alt="Why Choose Us Image">
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="choose-us-media-thumb-circle">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/choose-us-circle-img.png" alt="choose-us-circle-img">
                        </div>
                    </div>
                    <div class="choose-us-media-img">
                        <?php if ($experience_number) : ?>
                        <div class="choose-us-text">
                            <h3 class="choose-us-item-title">
                                <?php echo esc_html($experience_number) ?>
                            </h3>
                            <p>Years Of <br> Experience</p>
                        </div>
                        <?php endif; ?>
                        <?php if ($second_image) : ?>
                        <div class="choose-us-media-img-picture" >
                            <img src="<?php echo esc_url($second_image_url); ?>" alt="Why Choose Us Image">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
            endif;

            if ($subtitle || $title || $text_area || $has_non_empty_cards_boolean || $button_link || $phone_number) :?>
            <div class="<?php echo esc_attr($is_split_layout ? 'col-xl-6' : 'col-12'); ?>">
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
                <?php if ($has_non_empty_cards_boolean) : ?>
                <div class="choose-us-cards">
                    <div class="row">
                    <?php foreach ($cards as $card) : ?>
                        <div class="col-sm">
                            <div class="choose-us-item">
                                <?php if ($card['card_icon'] || $card['card_title']) : ?>
                                <div class="choose-us-item-content">
                                    <?php if ($card['card_icon']) : ?>
                                    <div class="choose-us-item-icon">
                                        <?php $cards_img_url = wp_get_attachment_image_url($card['card_icon'], 'why-choose-us-icon'); ?>
                                        <img src="<?php echo esc_url($cards_img_url) ?>" alt="cards_img_url">
                                    </div>
                                    <?php endif; ?>

                                    <?php if ($card['card_title']) : ?>
                                    <h3><?php echo esc_html($card['card_title']) ?></h3>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <?php if ($card['card_bullet_points']) :?>
                                <div class="choose-us-item-content-list">
                                    <ul>
                                        <?php
                                            foreach ($card['card_bullet_points'] as $point) :
                                                $card_text = $point['bullet_point_text'];
                                                if (!empty($card_text)) : 
                                                ?>
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
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($button_link || $phone_number) : ?>
                <div class="choose-us-button">
                    <?php if ($button_link) : ?>
                    <div class="choose-us-button-btn">
                        <a href="<?php echo esc_url($link_url); ?>">
                            Read More
                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow-bigger-tale-green.svg');?>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if ($phone_number) : ?>
                    <div class="choose-us-button-text">
                        <div class="choose-us-button-text-icon">
                            <?php $phone_icon_url = wp_get_attachment_image_url($phone_icon, 'phone-icon-img'); ?>
                            <img src="<?php echo esc_url($phone_icon_url); ?>" alt="phone-icon-img">
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
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?> 