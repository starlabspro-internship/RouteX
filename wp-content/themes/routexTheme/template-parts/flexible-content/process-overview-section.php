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
                                $process_overview = get_field('process_overview', 'options');

                                if ($process_overview) {
                                    foreach ($process_overview as $process) {
                                        if ($process['acf_fc_layout'] === 'process_overview_layout' && isset($process['small_title'])) {
                                            echo esc_html($process['small_title']);
                                        }
                                    }
                                }
                            ?>
                        </div>    
                    </div>
                    <div class="process-overview-title">
                        <div class="title process-overview-title-color">
                            <?php
                                $process_overview = get_field('process_overview', 'options');

                                if ($process_overview) {
                                    foreach ($process_overview as $process) {
                                        if ($process['acf_fc_layout'] === 'process_overview_layout' && isset($process['title'])) {
                                            echo esc_html($process['title']);
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
                <div class="process-overview-item-container row">
                    <?php
                        $process_overview = get_field('process_overview', 'options');

                        if ($process_overview) {
                            foreach ($process_overview as $process) {
                                if (isset($process['cards']) && is_array($process['cards'])) {
                                    $card_index = 1;
                                    foreach ($process['cards'] as $card) {

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
                                }
                            }
                        }
                    ?>
                </div>
        </div>
    </div>
</section>