<?php
function has_non_empty_logos($logos) {
    foreach ($logos as $logo) {
        if (!empty($logo)) {
            return true;
        }
    }
    return false;
}

$logos = [];
if (have_rows('logos')) :
    while (have_rows('logos')) : the_row();
        $logo_image = get_sub_field('logos_image');
        if ($logo_image) {
            $logos[] = $logo_image;
        }
    endwhile;
endif;
if (has_non_empty_logos($logos)) :
?>
<section class="top-bottom-small">
    <div class="swiper-container client-carousel-swiper">
        <div class="swiper-wrapper">
            <?php $logos_to_display = array_merge($logos, $logos);
                foreach ($logos_to_display as $logo_image): ?>
                <div class="swiper-slide client-carousel-container-item">
                    <?php $sponsors_img_url = wp_get_attachment_image_url($logo_image, 'sponsors-img'); ?>
                    <img src="<?php echo esc_url($sponsors_img_url); ?>" 
                        alt="Client Logo" 
                        class="client-img">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new Swiper('.client-carousel-swiper', {
                slidesPerView: 1, 
                loop: true, 
                autoplay: {
                    delay: 2000, 
                    disableOnInteraction: false, 
                },
                breakpoints: {
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 30,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 20,
                    },
                    576: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                },
            });
        });
    </script>

</section>
<?php endif; ?>