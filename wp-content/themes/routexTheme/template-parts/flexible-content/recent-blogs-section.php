<?php
$small_title = get_sub_field('small_title');
$title = get_sub_field('title');
if (have_rows('blog_cards')) :
    while (have_rows('blog_cards')) : the_row();
        $cards[] = [
            'card_background' => get_sub_field('blog_image'),
            'card_title' => get_sub_field('blog_title'),
            'card_date' => get_sub_field('blog_date'),
            'card_text' => get_sub_field('blog_text'),
            'card_link' => get_sub_field('blog_link'),
            'card_creator' => get_sub_field('blog_creator'),
        ];
    endwhile;
endif;
?>
<section class="recent-blogs-section">
    <div class="recent-blogs-section-container top-bottom">
        <div class="container">
            <div class="recent-blogs-section-title-container">
                <?php if ($title || $small_title) : ?>
                <div class="recent-blogs-section-titles">
                    <?php if ($small_title) : ?>
                    <div class="recent-blogs-section-subtitles">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                            <div class="subtitle recent-blogs-subtitle">
                                <?php
                                    echo esc_html($small_title);
                                ?>
                            </div>
                    </div>
                    <?php endif; ?>
                    <?php if ($title) : ?>
                    <div class="title recent-blogs-title">
                        <?php
                            echo esc_html($title);
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
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

            <?php if ($cards) : ?>
            <div class="">
                <div class="swiper recent-blogs-section-swiper">
                    <div class="swiper-wrapper">   
                        <?php foreach ($cards as $card) : ?>
                            <div class="swiper-slide">
                                <div class="recent-blog-item-slide-inner">
                                    <?php if ($card['card_background']) : ?>
                                    <div class="recent-blog-item-media">
                                        <a href="<?php echo esc_url($card['card_link']) ?>">
                                            <!-- <img src="<?php echo esc_url($card['card_background']) ?>" alt="images not found"> -->
                                            <img src="">
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <div class="recent-blog-item-text">
                                        <?php if ($card['card_date'] || $card['card_creator']) : ?>
                                        <div class="recent-blog-item-text-meta">
                                            <?php if ($card['card_date']) : ?>
                                            <span><a href="<?php echo esc_url($card['card_link']) ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/date-icon.svg') ?>" alt=""><?php echo esc_html($card['card_date']) ?></a></span>
                                            <?php endif; ?>
                                            <?php if ($card['card_creator']) : ?>
                                            <span><a href="<?php echo esc_url($card['card_link']) ?>"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/user-icon.svg') ?>" alt="">By <?php echo esc_html($card['card_creator']) ?></a></span>
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
                                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/right-arrow-green.svg') ?>" alt="">
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
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>  
            <?php endif; ?>               
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
