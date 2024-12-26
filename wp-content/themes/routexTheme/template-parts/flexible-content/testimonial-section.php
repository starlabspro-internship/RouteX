<?php
load_swiper_assets();

$testimonial_left_image = get_sub_field('primary_image');
$show_storie_posts = get_sub_field('show_storie_posts');
$has_non_empty_cards_boolean = false;

if ($show_storie_posts) :

$args = [
    'post_type' => 'stories',
    'posts_per_page' => 3,
    'orderby' => 'date', 
    'order' => 'DESC',
];

$query = new WP_Query($args);

$testimonial_cards = [];

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        $testimonial_cards[] = [
            'icon' => get_field('person_story_icon'),
            'title' => get_the_title(),
            'text' => substr(get_the_excerpt(), 0, 215) . '...',
            'link' => get_permalink(),
            'name' => esc_html(get_field('person_story_name')),
            'position' => esc_html(get_field('person_story_position')),
        ];
    endwhile;
endif;

wp_reset_postdata();

$has_non_empty_cards_boolean = has_non_empty_cards($testimonial_cards);

endif;

if ($testimonial_left_image || $has_non_empty_cards_boolean) :
    $is_split_layout = $testimonial_left_image && $has_non_empty_cards_boolean;
?>

<section class="testimonial-section top-bottom-small">
    <div class="testimonial-section-container">
        <div class="row">
            <?php if ($testimonial_left_image): ?>
            <div class="<?php echo esc_attr($is_split_layout ? 'col-lg-5' : 'col-12'); ?>">
                <div class="testimonial-left <?php echo esc_attr($is_split_layout ? '' : 'full-testimonial-image'); ?>">
                    <?php
                    $testimonial_left_image_srcset = wp_get_attachment_image_srcset($testimonial_left_image, 'testimonail-large-img');
                    $testimonial_left_image_sizes = '(max-width: 768px) 100vw, 50vw';
                    $testimonial_left_img_url = wp_get_attachment_image_url($testimonial_left_image, 'testimonail-large-img');
                    ?>
                    <img 
                        src="<?php echo esc_url($testimonial_left_img_url); ?>"
                        srcset="<?php echo esc_attr($testimonial_left_image_srcset); ?>"
                        sizes="<?php echo esc_attr($testimonial_left_image_sizes); ?>"
                        alt="Testimonial Image"
                        loading="lazy"
                    />
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
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/qoute.svg" alt="qoute" width="73" height="56">
                                    <?php if ($card['text']): ?>
                                    <p class="testimonial-text"><?php echo $card['text']; ?></p>
                                    <?php endif; ?>
                                    <?php if ($card['icon'] || $card['name'] || $card['position']): ?>
                                        <div class="testimonial-icon">
                                            <?php if ($card['icon']): ?>
                                                <?php
                                                $testimonail_small_img_srcset = wp_get_attachment_image_srcset($card['icon'], 'testimonail-small-img');
                                                $testimonail_small_img_sizes = '(max-width: 768px) 100vw, 50vw';
                                                $testimonail_small_img_url = wp_get_attachment_image_url($card['icon'], 'testimonail-small-img');
                                                ?>
                                                <img 
                                                    src="<?php echo esc_url($testimonail_small_img_url); ?>"
                                                    srcset="<?php echo esc_attr($testimonail_small_img_srcset); ?>"
                                                    sizes="<?php echo esc_attr($testimonail_small_img_sizes); ?>"
                                                    alt="<?php echo $card['title']; ?>" 
                                                    class="img-fluid"
                                                    loading="lazy"
                                                >
                                            <?php endif; ?>
                                            <?php if ($card['name'] || $card['position']): ?>
                                            <div class="author-div">
                                                <?php if ($card['name']): ?>
                                                <a href="<?php echo esc_url($card['link']) ?>"><p class="author-name"><?php echo $card['name']; ?></p></a>
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
                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/left-arrow-green.svg');?>
                        </button>
                        <button class="button-testimonial" aria-label="Next testimonial">
                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow-green.svg');?>
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
                autoplay: {
                    delay: 3000, 
                    disableOnInteraction: false, 
                },
                spaceBetween: 30,
                slidesPerView: 1
            });
        });
    </script>
</section>
<?php endif; ?>
