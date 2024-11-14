<?php
$text_area_first_sector = get_sub_field('text_area_first_sector');
$button_first_sector = get_sub_field('button_first_sector');
$videos_button = get_sub_field('videos_button');
$image_first_sector = get_sub_field('image_first_sector');

if ($text_area_first_sector || $button_first_sector || $videos_button || $image_first_sector) :
?>
<section class="hero-section">
    <div class="container">
        <div class="decorative-icon left-tower">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-right-towor.png"
                alt="Decorative Tower">
        </div>
        <div class="decorative-icon right-tower">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-right-towor.png"
                alt="Decorative Tower">
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="hero-content">
                    <?php if ($text_area_first_sector) : ?>
                    <h1 class="hero-content-title"><?php echo esc_html($text_area_first_sector); ?></h1>
                    <?php endif; ?>
                    <div class="btn-wrapper">
                        <?php if ($button_first_sector) : ?>
                        <a href="<?php echo esc_url($button_first_sector); ?>" class="btn btn-transparent">Read More
                            →</a>
                        <?php endif; ?>
                        <?php if ($videos_button) : ?>
                        <a href="<?php echo esc_url($videos_button); ?>" class="banner-video-button">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="12" fill="rgba(0, 77, 64, 0.9)" />
                                <polygon points="9,6 17,12 9,18" fill="#ffffff" />
                            </svg>
                        </a>
                        <a href="<?php echo esc_url($videos_button); ?>" class="video-text">Watch Our Videos</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="decorative-circle"></div>
                <?php
                $image_first_sector = get_sub_field('image_first_sector');
                ?>
                <div class="gray-photo <?php echo empty($image_first_sector) ? 'hidden' : ''; ?>">
                    <?php if (!empty($image_first_sector)): ?>
                    <img src="<?php echo esc_url($image_first_sector); ?>" alt="Photo">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>