<?php
$lines = [];

if (have_rows('lines')) :
    while (have_rows('lines')) : the_row();
        $line_image = get_sub_field('line_image');
        if ($line_image) {
            $lines[] = esc_url($line_image);
        }
    endwhile;
endif;

$lines_to_display = array_merge($lines, $lines); 

if (!empty($lines_to_display)) :
?>
<section class="line-section">
    <div class="swiper-container line-carousel-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($lines_to_display as $line_image) : ?>
            <div class="swiper-slide">
                <img src="<?php echo $line_image; ?>" alt="Line Icon" class="line-icon">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.line-carousel-swiper', {
            loop: true,
            freeModeMomentum: false,
            speed: 1000,
            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },
            slidesPerView: 'auto',
            breakpoints: {
                1024: {
                    slidesPerView: 12,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 7,
                    spaceBetween: 11,
                },
                576: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
            },
            allowTouchMove: false,
        });
    });
    </script>
</section>
<?php endif; ?>