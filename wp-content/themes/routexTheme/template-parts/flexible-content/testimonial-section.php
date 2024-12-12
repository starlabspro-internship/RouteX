<?php
$testimonial_left_image = get_sub_field('primary_image');
$testimonial_cards = [];
$card_count = 0;

if (have_rows('testimonial_card')) {
    while (have_rows('testimonial_card')): the_row();
        $card_count++;
        $testimonial_cards[] = [
            'text' => esc_html(get_sub_field('text')),
            'icon' => get_sub_field('icon'),
            'title' => esc_attr(get_sub_field('title')),
            'name' => esc_html(get_sub_field('name')),
            'position' => esc_html(get_sub_field('position')),
        ];
    endwhile;
}

$has_non_empty_cards_boolean = has_non_empty_cards($testimonial_cards);

if ($testimonial_left_image || $has_non_empty_cards_boolean) :
    $is_split_layout = $testimonial_left_image && $has_non_empty_cards_boolean;
?>

<section class="testimonial-section top-bottom-small">
    <div class="testimonial-section-container">
        <div class="row">
            <?php if ($testimonial_left_image): ?>
            <div class="<?php echo esc_attr($is_split_layout ? 'col-lg-5' : 'col-12'); ?>">
                <div class="testimonial-left">
                    <?php $testimonail_large_img_url = wp_get_attachment_image_url($testimonial_left_image, 'testimonail-large-img'); ?>
                    <img src="<?php echo esc_url($testimonail_large_img_url); ?>"/>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($has_non_empty_cards_boolean): ?>
            <div class="<?php echo esc_attr($is_split_layout ? 'col-lg-7 flex-column justify-content-center' : 'col-12 flex-column justify-content-center'); ?>">
                <div class="testimonial-right">
                    <div class="swiper testimonial-swiper testimonial-cards">
                        <div class="swiper-wrapper">
                        <?php foreach ($testimonial_cards as $index => $card): ?>
                            <div class="testimonial-card swiper-slide">
                                <div class="testimonial-content">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/qoute.svg" alt="">
                                    <?php if ($card['text']): ?>
                                    <p class="testimonial-text"><?php echo $card['text']; ?></p>
                                    <?php endif; ?>
                                    <?php if ($card['icon'] || $card['name'] || $card['position']): ?>
                                        <div class="testimonial-icon">
                                            <?php if ($card['icon']): ?>
                                                <?php $testimonail_small_img_url = wp_get_attachment_image_url($card['icon'], 'testimonail-small-img'); ?>
                                                <img src="<?php echo $testimonail_small_img_url; ?>" alt="<?php echo $card['title']; ?>" class="img-fluid">
                                            <?php endif; ?>
                                            <?php if ($card['name'] || $card['position']): ?>
                                            <div class="author-div">
                                                <?php if ($card['name']): ?>
                                                <p class="author-name"><?php echo $card['name']; ?></p>
                                                <?php endif; ?>
                                                <?php if ($card['position']): ?>
                                                <p class="author-position"><?php echo $card['position']; ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                
                    <div class="testimonial-buttons text-center">
                        <div class="testimonial__content-button-border"></div>
                        <div class="buttons-wrapper"> 
                        <button class="button-testimonial" aria-label="Previous testimonial">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow.svg" alt="left-arrow" class="hover-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow-green.svg" alt="left-arrow-green" class="default-img">
                        </button>
                        <button class="button-testimonial" aria-label="Next testimonial">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="right-arrow" class="hover-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg" alt="right-arrow-green" class="default-img">
                        </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.testimonial-swiper', {
                loop: true,
                navigation: {
                    nextEl: '.button-testimonial[aria-label="Next testimonial"]',
                    prevEl: '.button-testimonial[aria-label="Previous testimonial"]',
                },
                spaceBetween: 30,
                slidesPerView: 1
            });
        });
    </script>
</section>
<?php endif; ?>
