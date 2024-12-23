<?php
$left_image = get_sub_field('primary_image');
$left_image_url = wp_get_attachment_image_url($left_image, 'cta-left-img');
$left_image_srcset = wp_get_attachment_image_srcset($left_image, 'cta-left-img');
$icon = get_sub_field('icon');
$icon_url = wp_get_attachment_image_url($icon, 'visa-icon');
$top_title = get_sub_field('top_title');
$top_text = get_sub_field('top_text');
$button = get_sub_field('button');
$right_image = get_sub_field('right_image');
$right_image_url = wp_get_attachment_image_url($right_image, 'cta-right-img');
$right_image_srcset = wp_get_attachment_image_srcset($right_image, 'cta-right-img');
$bottom_counters = [];
if (have_rows('bottom_counter')) :
    while (have_rows('bottom_counter')) : the_row();
        $bottom_counters[] = [
            'numbers' => get_sub_field('numbers'),
            'title' => get_sub_field('title'),
        ];
    endwhile;
endif;

$has_non_empty_cards_boolean = has_non_empty_cards($bottom_counters);

if ($left_image || $icon || $top_title || $top_text || $button || $right_image || $has_non_empty_cards_boolean) : 
    $is_split_layout = $left_image && ($icon || $top_title || $top_text || $button || $right_image || $has_non_empty_cards_boolean);
    $is_split_layout_2 = $right_image && ($icon || $top_title || $top_text || $button);
?>
<section class="cta-container top-bottom-small">
    <div class="row">
        <?php if ($left_image) : ?>
        <div class="<?php echo esc_attr($is_split_layout ? 'col-md-4 col-12' : 'col-12'); ?>">
            <div class="imagediv">
                <img src="<?php echo esc_url($left_image_url); ?>" srcset="<?php echo esc_attr($left_image_srcset); ?>" class="img-fluid" alt="Left Image" loading="lazy"/>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($icon || $top_title || $top_text || $button || $right_image || $has_non_empty_cards_boolean) : ?>
        <div class="<?php echo esc_attr($is_split_layout ? 'col-md-8 col-12' : 'col-12'); ?>">
            <div class="top-right-section">
                <?php if ($icon || $top_title || $top_text || $button) : ?>
                <div class="<?php echo esc_attr($is_split_layout_2 ? 'col-sm-8 col-12' : 'col-12'); ?>">
                    <div  class="left-content">
                        <?php if ($icon) : ?>
                            <div class="circle">
                                <img src="<?php echo esc_url($icon_url); ?>" class="icon" alt="Icon" loading="lazy"/>
                            </div>
                        <?php endif; ?>

                        <?php if ($top_title) : ?>
                            <h2 class="title2"><?php echo esc_html($top_title); ?></h2>
                        <?php endif; ?>

                        <?php if ($top_text) : ?>
                            <p class="top-right-section-text"><?php echo esc_html($top_text); ?></p>
                        <?php endif; ?>

                        <?php if ($button) : ?>
                            <div class="cta-button-container">
                                <div>
                                    <a href="<?php echo esc_url($button); ?>" class="cta-button">
                                        Contact us 
                                        <?php echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow-bigger-tale-green.svg'); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($right_image) : ?>
                    <div class="<?php echo esc_attr($is_split_layout_2 ? 'col-sm-4 col-12' : 'col-12'); ?>">
                        <div class="right-image">
                            <img src="<?php echo esc_url($right_image_url); ?>" srcset="<?php echo esc_attr($right_image_srcset); ?>" alt="right-image" loading="lazy"/>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($has_non_empty_cards_boolean) : ?>
                <div class="bottom-counter">
                    <?php foreach ($bottom_counters as $counter) : ?>
                        <?php if ($counter['numbers'] || $counter['title']) : ?>
                            <div class="counter-item">
                                <?php if ($counter['numbers']) : ?>
                                    <h3><?php echo esc_html($counter['numbers']); ?></h3>
                                <?php endif; ?>
                                <?php if ($counter['title']) : ?>
                                    <p><?php echo esc_html($counter['title']); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
