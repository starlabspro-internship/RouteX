<?php
    if (have_rows('process_overview')) :
        $small_title = null;
        $title = null;
        $cards = [];
        
        while (have_rows('process_overview')) : the_row();
            if (get_row_layout() == 'process_overview_layout') :
                $small_title = get_sub_field('small_title');
                $title = get_sub_field('title');
                if (have_rows('cards')) :
                    while (have_rows('cards')) : the_row();
                        $cards[] = [
                            'card_number' => get_sub_field('card_number'),
                            'card_title' => get_sub_field('card_title'),
                            'card_text_' => get_sub_field('card_text_'),
                        ];
                    endwhile;
                endif;
            endif;

        endwhile; 

        if($small_title && $title && $cards):
?>

<section class="process-overview-section">
    <div class="process-overview-section-container top-bottom">
        <div class="process-overview-bg-img" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/process-bg.png');"></div>
        <div class="container">
            <div class="row">
                <div class="process-overview-section-titles">
                    <div class="process-overview-section-subtitles">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-3.svg" alt="">
                        <div class="subtitle process-overview-subtitle">
                            <?php
                                echo esc_html($small_title);
                            ?>
                        </div>    
                    </div>
                    <div class="process-overview-title">
                        <div class="title process-overview-title-color">
                            <?php
                                echo esc_html($title);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
                <div class="process-overview-item-container row">
                    <?php
                        $card_index = 1;
                        foreach ($cards as $card) {
                        
                            $extra_class = ($card_index === 2) ? 'process-overview-extra-style' : '';
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="process-overview-item <?php echo $extra_class; ?>">
                                    <span class="process-overview-item-number"><?php echo esc_html($card['card_number']); ?></span>
                                    <h5><?php echo esc_html($card['card_title']); ?></h5>
                                    <p><?php echo esc_html($card['card_text_']); ?></p>
                                </div>
                            </div>
                            <?php
                            $card_index++;
                        }
                    ?>
                </div>
        </div>
    </div>
</section>
<?php
        endif;
    endif;
?> 