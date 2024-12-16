<?php
$small_title = get_sub_field('small_title');
$title = get_sub_field('title');

$args = array(
    'post_type' => 'coaching',  
    'posts_per_page' => 5,      
    'orderby' => 'date',       
    'order' => 'DESC'           
);

$coaching_posts = new WP_Query($args);

if ($title || $small_title || $coaching_posts->have_posts()) :
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
                        <?php echo esc_html($small_title); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ($title) : ?>
                <div class="title coaching-title">
                    <?php echo esc_html($title); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($coaching_posts->have_posts()) : ?>
                <div class="coaching-section-buttons">
                    <button class="coaching-section-button" aria-label="Previous slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow.svg" alt="Previous Arrow" class="arrow-icon hover-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow-green.svg" alt="Previous Arrow (Default)" class="arrow-icon default-img">
                    </button>
                    <button class="coaching-section-button" aria-label="Next slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="Next Arrow" class="arrow-icon hover-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg" alt="Next Arrow (Default)" class="arrow-icon default-img">
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <?php if ($coaching_posts->have_posts()) : ?>
        <div class="">
            <div class="swiper coaching-section-swiper">
                <div class="swiper-wrapper">
                <?php
                    while ($coaching_posts->have_posts()) : $coaching_posts->the_post();
                        $post_id = get_the_ID();
                        $card_image = get_the_post_thumbnail_url($post_id, 'supporting-coaching-img'); 
                        $card_title = get_the_title();
                        $card_link = get_permalink();
                        $card_text = wp_trim_words(get_the_content(), 10); 
                ?>
                    <div class="swiper-slide">
                        <div class="coaching__item-media">
                            <div class="coaching-item_thumb">
                                <a href="<?php echo esc_url($card_link); ?>">
                                    <?php if ($card_image) : ?>
                                        <img class="coaching-item_thumb-image" src="<?php echo esc_url($card_image); ?>" alt="Coaching image">
                                    <?php endif; ?>
                                </a>
                            </div>

                            <?php if ($card_title || $card_text || $card_link) : ?>
                            <div class="coaching__item-media-img-title">
                                <?php if ($card_title || $card_text) : ?>
                                <div class="coaching__item-media-img-title-text">
                                    <?php if ($card_title) : ?>
                                    <h4><?php echo esc_html($card_title); ?></h4>
                                    <?php endif; ?>
                                    <?php if ($card_text) : ?>
                                    <p><?php echo esc_html($card_text); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                                <?php if ($card_link) : ?>
                                    <div class="coaching__item-media-img-title-button">
                                        <a href="<?php echo esc_url($card_link); ?>" class="btn btn-transparent">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/button-upright-arrow.svg" alt="Right Arrow Icon" class="arrow-icon default-img">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/button-upright-arrow-white.svg" alt="Right Arrow Icon (Hover)" class="arrow-icon hover-img">
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
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
<?php 
endif; 
wp_reset_postdata(); 
?>
