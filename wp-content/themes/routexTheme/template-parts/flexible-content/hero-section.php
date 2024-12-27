<?php
$text_area_first_sector = get_sub_field('text_area_first_sector');
$button_first_sector = get_sub_field('button_first_sector');
$videos_button = get_sub_field('videos_button');
$primary_image = get_sub_field('primary_image');
$image_url = wp_get_attachment_image_url($primary_image, 'hero-img');

$image_srcset = wp_get_attachment_image_srcset($primary_image, 'hero-img');

if ($text_area_first_sector || $button_first_sector || $videos_button || $primary_image) : 

$is_split_layout = $primary_image && ($text_area_first_sector || $button_first_sector || $videos_button);

?>
<section class="hero-section">
    HELLOOOOOO
    <div class="container">
        <div class="decorative-icon left-tower">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/hero-left-tower.svg"
                alt="hero-left-tower" width="453" height="536">
        </div>

        <div class="decorative-icon right-tower">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/hero-right-tower.svg"
                alt="hero-left-tower" width="453" height="536">
        </div>

        <div class="decorative-circle"></div>

        <div class="row align-items-center" id="banner-content">
            <?php if ($text_area_first_sector || $button_first_sector || $videos_button) : ?>
            <div class="<?php echo esc_attr($is_split_layout ? 'col-md-6' : 'col-12'); ?>">
                <div class="hero-content">
                    <?php if ($text_area_first_sector) : ?>
                    <h1 class="hero-content-title"><?php echo esc_html($text_area_first_sector); ?></h1>
                    <?php endif; ?>
                    <div class="btn-wrapper">
                        <?php if ($button_first_sector) : ?>
                        <a href="<?php echo esc_url($button_first_sector); ?>" class="btn-transparent">
                            Read More
                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow.svg');?>
                        </a>
                        <?php endif; ?>
                        <?php if ($videos_button) : ?>
                        <a href="<?php echo esc_url($videos_button); ?>" class="banner-video-button"
                            aria-label="Watch video about us">
                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/play_button.svg'); ?>
                        </a>
                        <a href="<?php echo esc_url($videos_button); ?>" class="video-text">Watch Our Videos</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if ($primary_image) : ?>
            <div class="<?php echo esc_attr($is_split_layout ? 'col-md-6' : 'col-12'); ?>" id="banner-right-content">
                <div class="gray-photo">
                    <img src="<?php echo esc_url($image_url); ?>" srcset="<?php echo esc_attr($image_srcset); ?>"
                        alt="Photo">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>