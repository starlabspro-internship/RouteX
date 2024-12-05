<?php
$small_title = get_sub_field('small_title');
$title = get_sub_field('title');
$cards = [];
if (have_rows('cards')) :
    while (have_rows('cards')) : the_row();
        $cards[] = [
            'card_image' => get_sub_field('card_image'),
            'card_title' => get_sub_field('card_title'),
            'card_link' => get_sub_field('card_link'),
            'card_text' => get_sub_field('card_text')
        ];
    endwhile;
endif;

if ($title || $small_title || has_non_empty_cards($cards)) :
?>
<section class="coaching-section top-bottom-small">
    <div class="coaching-section-container ">
        <div class="coaching-section-title-container">
            <?php if ($title || $small_title) : ?>
            <div class="coaching-section-titles">
                <?php if ($small_title) : ?>
                <div class="coaching-section-subtitles">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                        <div class="subtitle coaching-subtitle">
                            <?php
                                echo esc_html($small_title);
                            ?>
                        </div>
                </div>
                <?php endif; ?>
                <?php if ($title) : ?>
                <div class="title coaching-title">
                    <?php
                        echo esc_html($title);
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if (has_non_empty_cards($cards)) : ?>
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
            <?php endif; ?>
        </div>
        <?php if (has_non_empty_cards($cards)) : ?>
        <div class="">
            <div class="swiper coaching-section-swiper">
                <div class="swiper-wrapper">
                <?php
                    foreach ($cards as $card) :
                        ?>
                        <div class="swiper-slide">
                            <div class="coaching__item-media">
                                <?php if ($card['card_image']) : ?>
                                <div class="coaching-item_thumb">
                                    <a href="<?php echo esc_url($card['card_link']); ?>">
                                        <img class="coaching-item_thumb-image" src="<?php echo esc_url($card['card_image']) ?>" alt="Images not found">
                                    </a>
                                </div>
                                <?php endif; ?>  
                                <?php if ($card['card_title'] || $card['card_text'] || $card['card_link']) : ?>
                                <div class="coaching__item-media-img-title">
                                    <?php if ($card['card_title'] || $card['card_text'] ) : ?>
                                    <div class="coaching__item-media-img-title-text">
                                        <?php if ($card['card_title']) : ?>
                                        <h4><?php echo esc_html($card['card_title']); ?></h4>
                                        <?php endif; ?>
                                        <?php if ($card['card_text']) : ?>
                                        <p><?php echo esc_html($card['card_text']); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?> 
                                    <?php if ($card['card_link']) : ?>
                                    <div>
                                        <button class="coaching__item-media-img-title-button">
                                            <a class="hover-img" href="<?php echo esc_url($card['card_link']); ?>">
                                                <!-- <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/button-upright-arrow-white.svg'); ?>" alt="button-upright-arrow-white"> -->
                                            </a>
                                            <a class="default-img" href="<?php echo esc_url($card['card_link']); ?>">
                                                <!-- <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/button-upright-arrow.svg'); ?>" alt="button-upright-arrow"> -->
                                            </a>
                                        </button>
                                    </div>
                                    <?php endif; ?> 
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php
                    endforeach;
                ?>
                </div>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>    
        <?php endif; ?>             
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
<?php endif; ?> 

            