<?php
$left_image = get_sub_field('primary_image');
$left_image_url = wp_get_attachment_image_url($left_image, 'cta-left-img');
$icon = get_sub_field('icon');
$icon_url = wp_get_attachment_image_url($icon, 'visa-icon');
$top_title = get_sub_field('top_title');
$top_text = get_sub_field('top_text');
$button = get_sub_field('button');
$right_image = get_sub_field('right_image');
$right_image_url = wp_get_attachment_image_url($right_image, 'cta-right-img');
$bottom_counters = [];
if (have_rows('bottom_counter')) :
    while (have_rows('bottom_counter')) : the_row();
        $bottom_counters[] = [
            'numbers' => get_sub_field('numbers'),
            'title' => get_sub_field('title'),
        ];
    endwhile;
endif;
if ($left_image || $icon || $top_title || $top_text || $button || $right_image || has_non_empty_cards($bottom_counters)) : 
?>
<section class="cta-container top-bottom-small">
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="imagediv">
            <?php if ($left_image) : ?>
                <img src="<?php echo esc_url($left_image_url); ?>" class="img-fluid" alt="Left Image" />
            <?php else : ?>
                <p>Left Image not found.</p>
            <?php endif; ?>
            </div>
        </div>

        <div class="col-md-8 col-12">
            <div class="top-right-section">
                <div class="col-sm-8 col-12">
                    <div  class="left-content">
                        <?php if ($icon) : ?>
                            <div class="circle">
                                <img src="<?php echo esc_url($icon); ?>" class="icon" alt="Icon" />
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
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-bigger-tale-green.svg" 
                                                alt="Right Arrow Icon" 
                                                class=" default-img-cta">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-white-bigger-tale.svg" 
                                                alt="Right Arrow Icon (Hover)" 
                                                class=" hover-img-cta">
                                        </a>
                                    </div>
                                </div>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ($right_image) : ?>
                    <div class="col-sm-4 col-12">
                        <div class="right-image">
                            <img src="<?php echo esc_url($right_image_url); ?>" alt=""/>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (has_non_empty_cards($bottom_counters)) : ?>
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
    </div>
</section>
<?php endif; ?>