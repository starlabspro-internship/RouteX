<section class="available-countries-section">
    <div class="available-countries-section-container top-bottom">
        <div class="container">
            <div class="available-countries-section-title-container">
                <div class="available-countries-section-titles">
                    <div class="available-countries-section-subtitles">
                            <div class="subtitle available-countries-subtitle">
                                <?php
                                    $available_countries = get_field('available_countries', 'options');

                                    if ($available_countries) {
                                        foreach ($available_countries as $country) {
                                            if ($country['acf_fc_layout'] === 'sector7layout1' && isset($country['smalltitle'])) {
                                                echo esc_html($country['smalltitle']);
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/subtitle-icon-2.svg" alt="">
                    </div>
                    <div class="title available-countries-title">
                        <?php
                            $available_countries = get_field('available_countries', 'options');

                            if ($available_countries) {
                                foreach ($available_countries as $country) {
                                    if ($country['acf_fc_layout'] === 'sector7layout1' && isset($country['title'])) {
                                        echo esc_html($country['title']);
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
                <div class="available-countries-section-buttons">
                    <?php
                        $available_countries = get_field('available_countries', 'options');

                        if ($available_countries) {
                            foreach ($available_countries as $country) {
                                if ($country['acf_fc_layout'] === 'sector7layout1' && isset($country['button'])) {
                                    echo '<a class="available-countries-section-button" href="' . esc_url($country['button']) . '">';
                                    echo 'View More <img src="' . get_template_directory_uri() . '/assets/icons/right-arrow.svg" alt="">';
                                    echo '</a>';
                                }
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="available-countries-section-cards">
                <div class="row">
                    <?php
                        $available_countries = get_field('available_countries', 'options');

                        if ($available_countries) {
                            foreach ($available_countries as $country) {
                                if (isset($country['cards']) && is_array($country['cards'])) {
                                    foreach ($country['cards'] as $card) {
                                        ?>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="available-countries-item">
                                                <div class="available-countries-item-icon">
                                                    <!-- <img src="<?php echo esc_url($card['card_icon']); ?>" alt="Card icon"> -->
                                                     <img src=""> 
                                                </div>
                                                <div class="available-countries-item-content">
                                                    <h3><?php echo esc_html($card['card_title']); ?></h3>
                                                    <div class="available-countries-item-content-list">
                                                        <ul>
                                                            <?php foreach ($card['card_bullet_points'] as $card_bullet_points) { ?>
                                                            
                                                                <li><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/green-checkmark.svg" alt=""><?php echo esc_html($card_bullet_points['card_text']); ?></li>
                                                            
                                                            <?php }?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>