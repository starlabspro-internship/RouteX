<?php
function has_non_empty_logos($logos) {
    foreach ($logos as $logo) {
        if (!empty($logo)) {
            return true;
        }
    }
    return false;
}

$logos = [];
if (have_rows('logos')) :
    while (have_rows('logos')) : the_row();
        $logo_image = get_sub_field('logos_image');
        if ($logo_image) {
            $logos[] = esc_url($logo_image);
        }
    endwhile;
endif;
if (has_non_empty_logos($logos)) :
?>
<section class="container">
    <div class="client-carousel">
        <div class="carousel-track">
            <?php foreach ($logos as $logo_image): ?>
                <img src="<?php echo $logo_image; ?>" 
                     alt="" 
                     class="img-fluid client-img">
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>