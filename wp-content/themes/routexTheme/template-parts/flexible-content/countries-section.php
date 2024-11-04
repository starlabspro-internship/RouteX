<section class="countries-section">
    <div class="countries-section-container top-bottom">
        <div class="container">
            <div class="countries-section-title-container">
                <div class="countries-section-titles">
                    <div class="countries-section-subtitles">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-1.svg" alt="">
                            <div class="subtitle">
                                <?php
                                    $our_countries = get_field('our_countries', 'options');

                                    if ($our_countries) {
                                        foreach ($our_countries as $country) {
                                            if ($country['acf_fc_layout'] === 'sector5' && isset($country['smalltitle'])) {
                                                echo esc_html($country['smalltitle']);
                                            }
                                        }
                                    }
                                ?>
                            </div>
                    </div>
                    <div class="title">
                        <?php
                            $our_countries = get_field('our_countries', 'options');

                            if ($our_countries) {
                                foreach ($our_countries as $country) {
                                    if ($country['acf_fc_layout'] === 'sector5' && isset($country['title'])) {
                                        echo esc_html($country['title']);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="countries-section-buttons">
                    <button class="countries-section-button" aria-label="Previous slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow.svg" alt="">
                    </button>
                    <button class="countries-section-button" aria-label="Next slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="">
                    </button>
                </div>
            </div>
            <div class="countries-section-slider-1">
                <div class="swiper countries-section-swiper">
                    <div class="swiper-wrapper">
                        <?php
                            $our_countries = get_field('our_countries', 'options');

                            if ($our_countries) {
                                foreach ($our_countries as $country) {
                                    if ($country['acf_fc_layout'] === 'sector5' && isset($country['cards'])) {
                                        $card_count = 0;
                                        echo '<div class="swiper-slide">';
                                        echo '<div class="swiper-slide-single">';
                                        echo '    <ul class="swiper-slide-item">';

                                        foreach ($country['cards'] as $card) {
                                            if ($card_count > 0 && $card_count % 5 === 0) {
                                                echo '    </ul>';
                                                echo '</div>';
                                                echo '</div><div class="swiper-slide">';
                                                echo '<div class="swiper-slide-single">';
                                                echo '    <ul class="swiper-slide-item">';
                                            }

                                            $card_small_image = $card['card_small_image'];
                                            $card_background = $card['card_background'];
                                            $card_title = $card['card_title'];
                                            $card_text = $card['card_text'];
                                            $card_link = $card['card_link'];
                                            // if ($card_small_image && $card_background && $card_title && $card_text && $card_link) {
                                                
                                                echo '        <li>';
                                                echo '            <div class="swiper-slide-single-inner">';
                                                echo '                <div class="swiper-slide-single-small-img">';
                                                // echo '                    <img src="' . esc_url($card_small_image) . '" alt="Card Image">';
                                                echo '                    <img src="" >';
                                                echo '                </div>';
                                                // echo '                <div class="swiper-slide-single-img" style="background-image: url(' . esc_url($card_background) . ');">';
                                                echo '                <div class="swiper-slide-single-img" style="background-image: url();">';
                                                echo '                </div>';
                                                echo '                <div class="bg-overlay"></div>';
                                                echo '                <div class="swiper-slide-single-content">';
                                                echo '                    <h4>'.esc_html($card_title).'</h4>';
                                                echo '                    <p>'.esc_html($card_text).'</p>';
                                                echo '                    <div class="swiper-slide-single-content-button">';
                                                echo "                      <a href='" . esc_url($card_link) . "'>Apply Now 
                                                                                <img  src='" . get_template_directory_uri() . "/assets/icons/right-arrow.svg' alt=''>
                                                                            </a>";
                                                echo '                    </div>';
                                                echo '                </div>';
                                                echo '            </div>';
                                                echo '        </li>';
                                        
                                            // }

                                            $card_count++;
                                        }
                                        echo '    </ul>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
            <div class="countries-section-slider-2">
                <div class="swiper countries-section-swiper">
                    <div class="swiper-wrapper" >
                        <?php
                            $our_countries = get_field('our_countries', 'options');

                            if ($our_countries) {
                                foreach ($our_countries as $country) {
                                    if ($country['acf_fc_layout'] === 'sector5' && isset($country['cards'])) {
                                        foreach ($country['cards'] as $card) {
                                            $card_small_image = $card['card_small_image'];
                                            $card_background = $card['card_background'];
                                            $card_title = $card['card_title'];
                                            $card_text = $card['card_text'];
                                            $card_link = $card['card_link'];

                                            // if ($card_small_image && $card_background && $card_title && $card_text && $card_link) {

                                            echo '<div class="swiper-slide">';
                                            echo '    <div class="swiper-slide-single">';
                                            echo '                <div class="swiper-slide-single-inner-zoomed min-vh-100">';
                                            echo '                    <div class="swiper-slide-single-small-img">';

                                            if ($card_small_image) {
                                                echo '                        <img src="' . esc_url($card_small_image) . '" alt="Card Image">';
                                            } else {
                                                echo '                        <img src="" >';
                                            }

                                            echo '                    </div>';

                                            if ($card_background) {
                                                echo '                    <div class="swiper-slide-single-img" style="background-image: url(' . esc_url($card_background) . ');">';
                                            } else {
                                                echo '                    <div class="swiper-slide-single-img" style="background-image: url();">';
                                            }

                                            echo '                    </div>';
                                            echo '                    <div class="bg-overlay"></div>';
                                            echo '                    <div class="swiper-slide-single-content">';
                                            echo '                        <h4>' . esc_html($card_title) . '</h4>';
                                            echo '                        <p>' . esc_html($card_text) . '</p>';
                                            echo '                        <div class="swiper-slide-single-content-button">';
                                            echo "                          <a href='" . esc_url($card_link) . "'>Apply Now 
                                                                                <img  src='" . get_template_directory_uri() . "/assets/icons/right-arrow.svg' alt=''>
                                                                            </a>";
                                            echo '                        </div>';
                                            echo '                    </div>';
                                            echo '                </div>';
                                            echo '    </div>';
                                            echo '</div>';
                                        // }
                                        }
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.countries-section-swiper', {
                loop: true,
                navigation: {
                    nextEl: '.countries-section-button[aria-label="Next slide"]',
                    prevEl: '.countries-section-button[aria-label="Previous slide"]',
                },
                slidesPerView: 1,
                spaceBetween: 30,
            });

        });

        const listItems = document.querySelectorAll('.swiper-slide-item li');

        listItems.forEach(item => {
            item.addEventListener('mouseenter', function () {
                listItems.forEach(li => li.classList.remove('active'));
                item.classList.add('active');
            });
        });
    </script>
</section>