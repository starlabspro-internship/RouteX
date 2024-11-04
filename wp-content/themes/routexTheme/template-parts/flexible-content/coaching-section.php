<section class="coaching-section">
    <div class="coaching-section-container top-bottom">
        <div class="container">
            <div class="coaching-section-title-container">
                <div class="coaching-section-titles">
                    <div class="coaching-section-subtitles">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                            <div class="subtitle coaching-subtitle">
                                <?php
                                    $supporting_coaching = get_field('supporting_coaching', 'options');

                                    if ($supporting_coaching) {
                                        foreach ($supporting_coaching as $coaching) {
                                            if ($coaching['acf_fc_layout'] === 'sector_9_layout1' && isset($coaching['small_title'])) {
                                                echo esc_html($coaching['small_title']);
                                            }
                                        }
                                    }
                                ?>
                            </div>
                    </div>
                    <div class="title coaching-title">
                        <?php
                            $supporting_coaching = get_field('supporting_coaching', 'options');

                            if ($supporting_coaching) {
                                foreach ($supporting_coaching as $coaching) {
                                    if ($coaching['acf_fc_layout'] === 'sector_9_layout1' && isset($coaching['title'])) {
                                        echo esc_html($coaching['title']);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="coaching-section-buttons">
                    <button class="coaching-section-button" aria-label="Previous slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow.svg" alt="" class="hover-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow-green.svg" alt="" class="default-img">
                    </button>
                    <button class="coaching-section-button" aria-label="Next slide"> 
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="" class="hover-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg" alt="" class="default-img">
                    </button>
                </div>
            </div>
            <div class="">
                <div class="swiper coaching-section-swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $supporting_coaching = get_field('supporting_coaching', 'options');

                            if ($supporting_coaching) {
                                foreach ($supporting_coaching as $coaching) {
                                    if ($coaching['acf_fc_layout'] === 'sector_9_layout1' && isset($coaching['cards'])) {
                                        $card_count = 0;         

                                        foreach ($coaching['cards'] as $card) {

                                            $card_background = $card['card_image'] ?? '';
                                            $card_title = $card['card_title'] ?? 'IELTS Coaching';
                                            $card_text = $card['card_text'] ?? 'There are many variati of passages of engineer';
                                            $card_link = $card['card_link'] ?? '#';
                                            // <img src="' . esc_url($card_background) . '" alt="images not found">

                                            echo '<div class="swiper-slide">
                                                    <div class="latest-team__item-media">
                                                    <div class="latest-item_thumb" >
                                                        <a href="' . esc_url($card_link) . '">
                                                
                                                            <img class="latest-item_thumb-image" src="">
                                                        </a>
                                                    </div>
                                                    <div class="latest-team__item-media-img-title d-flex">
                                                        <div class="latest-team__item-media-img-title-text">
                                                            <h4>' . esc_html($card_title) . '</h4>
                                                            <p>' . esc_html($card_text) . '</p>
                                                        </div>
                                                        <div class="latest-team__item-media-img-title-button">
                                                            <a href="' . esc_url($card_link) . '">
                                                                <img class="latest-team__item-media-img-title-button-image" src="' . esc_url(get_template_directory_uri() . '/assets/icons/button-upright-arrow.svg') . '" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>';

                                            $card_count++;
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>                 
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.coaching-section-swiper', {
                loop: true,
                navigation: {
                    nextEl: '.coaching-section-button[aria-label="Next slide"]',
                    prevEl: '.coaching-section-button[aria-label="Previous slide"]',
                },
                spaceBetween: 30,
                slidesPerView: 1,

                breakpoints: {
                    576: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });
        });
    </script>
</section>