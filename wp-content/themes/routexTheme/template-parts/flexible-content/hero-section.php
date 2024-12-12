<?php
$text_area_first_sector = get_sub_field('text_area_first_sector');
$button_first_sector = get_sub_field('button_first_sector');
$videos_button = get_sub_field('videos_button');
$primary_image = get_sub_field('primary_image');
$image_url = wp_get_attachment_image_url($primary_image, 'hero-img');
// $attachment_meta = wp_get_attachment_metadata($primary_image);
// var_dump($attachment_meta);

if ($text_area_first_sector || $button_first_sector || $videos_button || $primary_image) : ?>
<section class="hero-section">
    <div class="container">
        <div class="decorative-icon left-tower">
            <?php
                    echo file_get_contents(get_template_directory() . '/assets/icons/hero-left-tower.svg');
                ?>
        </div>
        <div class="decorative-icon right-tower">
            <?php
                    echo file_get_contents(get_template_directory() . '/assets/icons/hero-right-tower.svg');
                ?>
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
                        <a href="<?php echo esc_url($button_first_sector); ?>" class="btn btn-transparent"
                            style="--default-icon: url('<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg'); 
                                        --hover-icon: url('<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg');">
                            Read More&nbsp;
                            <?php
                                        echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow.svg');
                                    ?>
                        </a>
                        <?php endif; ?>
                        <?php if ($videos_button) : ?>
                        <a href="<?php echo esc_url($videos_button); ?>" class="banner-video-button">
                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/play_button.svg'); ?>
                        </a>
                        <a href="<?php echo esc_url($videos_button); ?>" class="video-text">Watch Our Videos</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="banner-right-content">
                <div class="gray-photo">
                    <?php if ($primary_image) : ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="Photo">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>