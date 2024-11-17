<?php
$left_image = get_sub_field('left_image');
$icon = get_sub_field('icon');
$top_title = get_sub_field('top_title');
$top_text = get_sub_field('top_text');
$button = get_sub_field('button');
$right_image = get_sub_field('right_image');
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
<section class="container cta-container top-bottom-small">
    <div class="row">
        <div class="col-md-4 imagediv col-12">
            <?php if ($left_image) : ?>
                <img src="<?php echo esc_url($left_image); ?>" class="img-fluid" alt="Left Image" />
            <?php else : ?>
                <p>Left Image not found.</p>
            <?php endif; ?>
        </div>

        <div class="col-md-8 col-12 cta-content-div">
            <div class="top-right-section ctadiv ">
                <div class="left-content col-md-8 col-12 ">
                    <?php if ($icon) : ?>
                        <div class="circle">
                            <img src="<?php echo esc_url($icon); ?>" class="icon" alt="Icon" />
                        </div>
                    <?php endif; ?>

                    <?php if ($top_title) : ?>
                        <h2 class="title2"><?php echo esc_html($top_title); ?></h2>
                    <?php endif; ?>

                    <?php if ($top_text) : ?>
                        <p><?php echo esc_html($top_text); ?></p>
                    <?php endif; ?>

                    <?php if ($button) : ?>
                        <a href="<?php echo esc_url($button); ?>" class="cta-button">Contact us ➜</a>
                    <?php endif; ?>
                </div>

                <?php if ($right_image) : ?>
                    <div class="right-image col-md-4 col-12" style="background-image: url('<?php echo esc_url($right_image); ?>');"></div>
                <?php endif; ?>
            </div>

            <?php if (has_non_empty_cards($bottom_counters)) : ?>
                <div class="bottom-counter ctadiv">
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