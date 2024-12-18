<?php
$small_title = get_sub_field('small_title');
$title = get_sub_field('title');

$args = [
    'post_type' => 'post',
    'posts_per_page' => 6,
    'orderby' => 'date', 
    'order' => 'DESC',
    'category_name' => 'blog',
];

$query = new WP_Query($args);

$cards = [];

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $cards[] = [
            'card_background' => get_the_post_thumbnail_url(get_the_ID(), 'recent-blogs-img'),
            'card_background_srcset' => get_the_post_thumbnail_url(get_the_ID(), 'recent-blogs-img-large') . ' 1024w, ' . get_the_post_thumbnail_url(get_the_ID(), 'recent-blogs-img-medium') . ' 768w, ' . get_the_post_thumbnail_url(get_the_ID(), 'recent-blogs-img-small') . ' 480w',
            'card_title' => get_the_title(),
            'card_date' => get_the_date(),
            'card_text' => get_the_excerpt(),
            'card_link' => get_permalink(),
            'card_creator' => get_the_author(),
        ];
    endwhile;
endif;

wp_reset_postdata();
if ($small_title || $title || has_non_empty_cards($cards)) :
?>
<section class="recent-blogs-section top-bottom-small">
    <div class="recent-blogs-section-container ">
        <div class="recent-blogs-section-title-container">
            <?php if ($title || $small_title) : ?>
            <div class="recent-blogs-section-titles">
                <?php if ($small_title) : ?>
                <div class="recent-blogs-section-subtitles">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                        <div class="subtitle recent-blogs-subtitle">
                            <?php echo esc_html($small_title);?>
                        </div>
                </div>
                <?php endif; ?>
                <?php if ($title) : ?>
                <div class="title recent-blogs-title">
                    <?php echo esc_html($title);?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="recent-blogs-section-buttons">
                <button class="recent-blogs-section-button" aria-label="Previous slide">
                    <?php echo file_get_contents(get_template_directory() . '/assets/icons/left-arrow-green.svg');?>
                </button>
                <button class="recent-blogs-section-button" aria-label="Next slide"> 
                    <?php echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow-green.svg');?>
                </button>
            </div>
        </div>

        <?php if (has_non_empty_cards($cards)) : ?>
        <div >
            <div class="swiper recent-blogs-section-swiper">
                <div class="swiper-wrapper align-items-start">   
                    <?php foreach ($cards as $card) : ?>
                        <div class="swiper-slide">
                            <div class="recent-blog-item-slide-inner">
                                <?php if ($card['card_background']) : ?>
                                <div class="recent-blog-item-media">
                                    <a href="<?php echo esc_url($card['card_link']) ?>">
                                        <img src="<?php echo esc_url($card['card_background']) ?>" 
                                             srcset="<?php echo esc_attr($card['card_background_srcset']); ?>"
                                             sizes="(max-width: 1024px) 100vw, 1024px"
                                             alt="Recent Blog Image">
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="recent-blog-item-text">
                                    <?php if ($card['card_date'] || $card['card_creator']) : ?>
                                    <div class="recent-blog-item-text-meta">
                                        <?php if ($card['card_date']) : ?>
                                        <span><p><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/date-icon.svg') ?>" alt=""><?php echo esc_html($card['card_date']) ?></p></span>
                                        <?php endif; ?>
                                        <?php if ($card['card_creator']) : ?>
                                        <span><p><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/user-icon.svg') ?>" alt="">By <?php echo esc_html($card['card_creator']) ?></p></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ($card['card_title'] || $card['card_text'] || $card['card_link']) : ?>
                                    <div class="recent-blog-item-text-bottom">
                                        <?php if ($card['card_title']) : ?>
                                        <a href="<?php echo esc_url($card['card_link']) ?>"><h4><?php echo esc_html($card['card_title']) ?></h4></a>
                                        <?php endif; ?>
                                        <?php if ($card['card_text']) : ?>
                                        <p><?php echo esc_html($card['card_text']) ?></p>
                                        <?php endif; ?>
                                        <?php if ($card['card_link']) : ?>
                                        <a class="recent-blog-item-text-bottom-readmore"  href="<?php echo esc_url($card['card_link']) ?>">Read More 
                                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow-bigger-tale-green.svg');?>
                                        </a>
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
<?php endif; ?>
