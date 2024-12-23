<?php
function has_content_in_layout() {
    $has_content = false;
    if (have_rows('contact_form_flexible')) :
        while (have_rows('contact_form_flexible')) : the_row();

            if (get_row_layout() == 'contact_form_image') :
                $image = get_sub_field('image');
                if ($image) :
                    $has_content = true;
                endif;
            endif;

            if (get_row_layout() == 'contact_form_inputs') :
                $subtitle = get_sub_field('subtitle');
                $title = get_sub_field('title');
                if (!empty($subtitle) || !empty($title)) :
                    $has_content = true;
                endif;
            endif;

        endwhile;
    endif;

    return $has_content;
}

if (has_content_in_layout()) :
    ?>
        <section class="top-bottom-small">
            <div class="contact-form-section-container">
                <div class="row">
    <?php
    while (have_rows('contact_form_flexible')) : the_row();
    
        if (get_row_layout() == 'contact_form_image') :
            $image = get_sub_field('image');
            if ($image) :
            ?>
            <div class="col-lg-6">
                <div class="contact-form-section-image">
                    <?php 
                    $contact_form_img_url = wp_get_attachment_image_url($image, 'contact-form-img'); 
                    $contact_form_img_srcset = wp_get_attachment_image_srcset($image, 'contact-form-img');
                    ?>
                    <img src="<?php echo esc_url($contact_form_img_url); ?>" 
                        srcset="<?php echo esc_attr($contact_form_img_srcset); ?>" 
                        sizes="(max-width: 1024px) 100vw, 50vw" 
                        alt="Contact Form Image">
                </div>
            </div>
        <?php
            endif;
        endif;
        
        if (get_row_layout() == 'contact_form_inputs') :
            $subtitle = get_sub_field('subtitle');
            $title = get_sub_field('title');

            if ($subtitle || $title) :
            ?>
            <div class="col-lg-6">
                <?php if ($title || $subtitle) : ?>
                <div class="contact-form-section-title-container">
                    <?php if ($subtitle) : ?>
                    <div class="contact-form-section-subtitles">
                        <div class="subtitle contact-form-subtitle">
                            <?php echo esc_html($subtitle) ?>
                        </div> 
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-4.svg" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if ($title) : ?>
                    <div class="title contact-form-title">
                        <?php echo esc_html($title) ?>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <?php 
                    echo contact_form();
                ?>
            </div>
        <?php
            endif;
        endif;
    endwhile; 
    ?>
                </div>
            </div>
        </section>
    <?php
endif;
?> 
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.wpcf7 form').forEach(function (form) {
            form.addEventListener('submit', function () {
                form.querySelector('.wpcf7-spinner').style.display = 'inline-block';
            });

            form.addEventListener('wpcf7submit', function () {
                form.querySelector('.wpcf7-spinner').style.display = 'none';
            });
        });
    });
</script>
