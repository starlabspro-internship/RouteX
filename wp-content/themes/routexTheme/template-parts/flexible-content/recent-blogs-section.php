<section class="recent-blogs-section">
    <div class="recent-blogs-section-container top-bottom">
        <div class="container">
            <div class="recent-blogs-section-title-container">
                <div class="recent-blogs-section-titles">
                    <div class="recent-blogs-section-subtitles">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                            <div class="subtitle recent-blogs-subtitle">
                                <?php
                                    $recent_blogs = get_field('recent_blogs', 'options');

                                    if ($recent_blogs) {
                                        foreach ($recent_blogs as $blogs) {
                                            if ($blogs['acf_fc_layout'] === 'blogs_layout' && isset($blogs['small_title'])) {
                                                echo esc_html($blogs['small_title']);
                                            }
                                        }
                                    }
                                ?>
                            </div>
                    </div>
                    <div class="title recent-blogs-title">
                        <?php
                            $recent_blogs = get_field('recent_blogs', 'options');

                            if ($recent_blogs) {
                                foreach ($recent_blogs as $blogs) {
                                    if ($blogs['acf_fc_layout'] === 'blogs_layout' && isset($blogs['title'])) {
                                        echo esc_html($blogs['title']);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="recent-blogs-section-buttons">
                    <button class="recent-blogs-section-button" aria-label="Previous slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow.svg" alt="" class="hover-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow-green.svg" alt="" class="default-img">
                    </button>
                    <button class="recent-blogs-section-button" aria-label="Next slide"> 
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="" class="hover-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg" alt="" class="default-img">
                    </button>
                </div>
            </div>
            <div class="">
                <div class="swiper recent-blogs-section-swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $recent_blogs = get_field('recent_blogs', 'options');

                            if ($recent_blogs) {
                                foreach ($recent_blogs as $blogs) {
                                    if ($blogs['acf_fc_layout'] === 'blogs_layout' && isset($blogs['blog_cards'])) {
                                        $card_count = 0;         

                                        foreach ($blogs['blog_cards'] as $card) {

                                            $card_background = $card['blog_image'] ?? '';
                                            $card_title = $card['blog_title'] ?? 'IELTS Coaching';
                                            $card_date = $card['blog_date'] ?? '05/11/2024';
                                            $card_text = $card['blog_text'] ?? 'There are many variati of passages of engineer';
                                            $card_link = $card['blog_link'] ?? '#';
                                            $card_creator = $card['blog_creator'] ?? 'admin';
                                            // <img src="' . esc_url($card_background) . '" alt="images not found">

                                            echo '<div class="swiper-slide">
                                                    <div class="recent-blog-item-slide-inner">
                                                        <div class="recent-blog-item-media">
                                                            <a href="' . esc_url($card_link) . '">
                                                                <img src="">
                                                            </a>
                                                        </div>
                                                        <div class="recent-blog-item-text">
                                                            <div class="recent-blog-item-text-meta">
                                                                <span><a href="' . esc_url($card_link) . '"><img src="' . esc_url(get_template_directory_uri() . '/assets/icons/date-icon.svg') . '" alt="">' . esc_html($card_date) . '</a></span>
                                                                <span><a href="' . esc_url($card_link) . '"><img src="' . esc_url(get_template_directory_uri() . '/assets/icons/user-icon.svg') . '" alt="">By ' . esc_html($card_creator) . '</a></span>
                                                            </div>
                                
                                                            <div class="recent-blog-item-text-bottom">
                                                                <a href="' . esc_url($card_link) . '"><h4>' . esc_html($card_title) . '</h4></a>
                                                                <p>' . esc_html($card_text) . '</p>
                                                                <a class="recent-blog-item-text-bottom-readmore"  href="' . esc_url($card_link) . '">Read More 
                                                                    <img src="' . esc_url(get_template_directory_uri() . '/assets/icons/right-arrow-green.svg') . '" alt="">
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
                                                <!-- <div class="recent_blogs-item-media">
                                                    <div class="recent_blogs-thumb" >
                                                        <a href="' . esc_url($card_link) . '">
                                                
                                                            <img class="recent_blogs-thumb-image" src="">
                                                        </a>
                                                    </div>
                                                    <div class="recent_blogs-item-media-img-title d-flex">
                                                        <div class="recent_blogs-item-media-img-title-text">
                                                            <h4>' . esc_html($card_title) . '</h4>
                                                            <p>' . esc_html($card_text) . '</p>
                                                        </div>
                                                        <div class="recent_blogs-item-media-img-title-button">
                                                            <a href="' . esc_url($card_link) . '">
                                                                <img class="recent_blogs-item-media-img-title-button-image" src="' . esc_url(get_template_directory_uri() . '/assets/icons/button-upright-arrow.svg') . '" alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div> -->
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>                 
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.recent-blogs-section-swiper', {
                loop: true,
                navigation: {
                    nextEl: '.recent-blogs-section-button[aria-label="Next slide"]',
                    prevEl: '.recent-blogs-section-button[aria-label="Previous slide"]',
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