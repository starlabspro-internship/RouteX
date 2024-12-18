<?php
$smalltitle = get_sub_field('smalltitle');
$title = get_sub_field('title');
$post_category = get_sub_field('post_category');

$args = [
    'post_type' => $post_category,
    'posts_per_page' => 20,
    'orderby' => 'date', 
    'order' => 'DESC',
];

$query = new WP_Query($args);

$cards = [];

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $cards[] = [
            'card_small_image' => get_the_post_thumbnail_url(get_the_ID(), 'our-countries-small-img'),
            'card_background' => get_the_post_thumbnail_url(get_the_ID(), 'our-countries-large-img'),
            'card_title' => get_the_title(),
            'card_text' => substr(get_the_excerpt(), 0, 70) . '...',
            'card_link' => get_permalink(),
        ];
    endwhile;
endif;

wp_reset_postdata();

$has_non_empty_cards_boolean = has_non_empty_cards($cards);

if ($smalltitle || $title || $has_non_empty_cards_boolean) : 
?>
<section class="countries-section">
    <div class="countries-section-container top-bottom">
        <div class="countries-section-title-container">
            <?php if ($smalltitle || $title) : ?>
            <div class="countries-section-titles">
                <?php if ($smalltitle) : ?>
                <div class="countries-section-subtitles">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-1.svg" alt="">
                        <div class="subtitle">
                            <?php
                                echo esc_html($smalltitle);
                            ?>
                        </div>
                </div>
                <?php endif; ?>
                <?php if ($title) : ?>
                <div class="title">
                    <?php
                        echo esc_html($title);
                    ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="countries-section-buttons">
                <button class="countries-section-button" aria-label="Previous slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow.svg" alt="">
                </button>
                <button class="countries-section-button" aria-label="Next slide">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="">
                </button>
            </div>
        </div>
        <?php if ($has_non_empty_cards_boolean) : ?>
        <div class="countries-section-slider-1">
            <div class="swiper countries-section-swiper">
                <div class="swiper-wrapper">
                <?php
                $card_count = 0;
                ?>
                    <div class="swiper-slide">
                        <div class="countries-swiper-slide-single">
                            <ul class="countries-swiper-slide-item">
                                <?php foreach ($cards as $card) : ?>
                                    <?php if ($card_count > 0 && $card_count % 5 === 0) : ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="countries-swiper-slide-single">
                                            <ul class="countries-swiper-slide-item">
                                    <?php endif; ?>
    
                                    <li>
                                        <div class="countries-swiper-slide-single-inner">
                                            <?php if ($card['card_small_image']) : ?>
                                            <div class="countries-swiper-slide-single-small-img">
                                                <?php $card_small_image_srcset = wp_get_attachment_image_srcset($card['card_small_image'], 'our-countries-small-img'); ?>
                                                <img src="<?php echo esc_url($card['card_small_image']); ?>" srcset="<?php echo esc_attr($card_small_image_srcset); ?>" alt="card_small_image">
                                            </div>
                                            <?php endif; ?>

                                            <?php if ($card['card_background']) : ?>
                                            <div class="countries-swiper-slide-single-img" >
                                                <?php $card_background_srcset = wp_get_attachment_image_srcset($card['card_background'], 'our-countries-large-img'); ?>
                                                <img src="<?php echo esc_url($card['card_background']); ?>" srcset="<?php echo esc_attr($card_background_srcset); ?>" alt="card_background">
                                            </div>
                                            <?php endif; ?>
                                            
                                            <?php if ($card['card_title'] || $card['card_text'] || $card['card_link']) : ?>
                                            <div class="countries-swiper-slide-single-content">
                                                <?php if ($card['card_title']) : ?>
                                                <h4><?php echo esc_html($card['card_title']); ?></h4>
                                                <?php endif; ?>
                                                <?php if ($card['card_text']) : ?>
                                                <p><?php echo esc_html($card['card_text']); ?></p>
                                                <?php endif; ?>
                                                <?php if ($card['card_link']) : ?>
                                                <div class="countries-swiper-slide-single-content-button">
                                                    <a href="<?php echo esc_url($card['card_link']); ?>">
                                                        Apply Now 
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-white-bigger-tale.svg" alt="">
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </li>
    
                                    <?php $card_count++; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="countries-section-slider-2">
            <div class="swiper countries-section-swiper">
                <div class="swiper-wrapper" >
                <?php foreach ($cards as $card) : ?>
                    <div class="swiper-slide">
                        <div class="countries-swiper-slide-single">
                            <div class="countries-swiper-slide-single-inner-zoomed">
                                <?php if ($card['card_small_image']) : ?>
                                <div class="countries-swiper-slide-single-small-img">
                                    <?php $card_small_image_srcset = wp_get_attachment_image_srcset($card['card_small_image'], 'our-countries-small-img'); ?>
                                    <img src="<?php echo esc_url($card['card_small_image']); ?>" srcset="<?php echo esc_attr($card_small_image_srcset); ?>" alt="card_small_image">
                                </div>
                                <?php endif; ?>
                                <?php if ($card['card_background']) : ?>
                                <div class="countries-swiper-slide-single-img">
                                    <?php $card_background_srcset = wp_get_attachment_image_srcset($card['card_background'], 'our-countries-large-img'); ?>
                                    <img src="<?php echo esc_url($card['card_background']); ?>" srcset="<?php echo esc_attr($card_background_srcset); ?>" alt="card_background">
                                </div>
                                <?php endif; ?>
                                <div class="bg-overlay"></div>
                                <?php if ($card['card_title'] || $card['card_text'] || $card['card_link']) : ?>
                                <div class="countries-swiper-slide-single-content">
                                    <?php if ($card['card_title']) : ?>
                                    <h4><?php echo esc_html($card['card_title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if ($card['card_text']) : ?>
                                    <p><?php echo esc_html($card['card_text']); ?></p>
                                    <?php endif; ?>
                                    <?php if ($card['card_link']) : ?>
                                    <div class="countries-swiper-slide-single-content-button">
                                        <a href="<?php echo esc_url($card['card_link']); ?>">Apply Now
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-white-bigger-tale.svg" alt="">
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
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

        const listItems = document.querySelectorAll('.countries-swiper-slide-item li');

        listItems.forEach(item => {
            item.addEventListener('mouseenter', function () {
                listItems.forEach(li => li.classList.remove('active'));
                item.classList.add('active');
            });
        });
    </script>
</section>
<?php endif; ?>  
