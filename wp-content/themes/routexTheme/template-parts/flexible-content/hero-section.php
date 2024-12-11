<?php
$text_area_first_sector = get_sub_field('text_area_first_sector');
$button_first_sector = get_sub_field('button_first_sector');
$videos_button = get_sub_field('videos_button');
$image_first_sector = get_sub_field('image_first_sector');
$image_url = wp_get_attachment_image_url($image_first_sector, 'hero-img');
$attachment_meta = wp_get_attachment_metadata($image_first_sector);
var_dump($attachment_meta);

if ($text_area_first_sector || $button_first_sector || $videos_button || $image_first_sector) : ?>
    <section class="hero-section">
        <div class="container">
            <div class="decorative-icon left-tower">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-right-towor.png" alt="Decorative Tower">
            </div>
            <div class="decorative-icon right-tower">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-right-towor.png" alt="Decorative Tower">
            </div>
            <div class="decorative-circle"></div>

            <div class="row align-items-center" id="banner-content">
                <div class="col-md-6">
                    <div class="hero-content">
                        <?php if ($text_area_first_sector) : ?>
                            <h1 class="hero-content-title"><?php echo esc_html($text_area_first_sector); ?></h1>
                        <?php endif; ?>
                        <div class="btn-wrapper">
                            <?php if ($button_first_sector) : ?>
                                <a href="<?php echo esc_url($button_first_sector); ?>" 
                                class="btn btn-transparent" 
                                style="--default-icon: url('<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg'); 
                                        --hover-icon: url('<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg');">
                                    Read More&nbsp;
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="Right Arrow Icon" class="arrow-icon">
                                </a>
                            <?php endif; ?>
                            <?php if ($videos_button) : ?>
                                <a href="<?php echo esc_url($videos_button); ?>" class="banner-video-button">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/play_button.svg" alt="Video Icon">
                                </a>
                                <a href="<?php echo esc_url($videos_button); ?>" class="video-text">Watch Our Videos</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="banner-right-content">
                    <div class="gray-photo">
                        <?php if ($image_first_sector) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="Photo">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
