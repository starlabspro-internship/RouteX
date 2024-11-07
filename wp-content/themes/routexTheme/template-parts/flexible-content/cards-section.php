<?php
/**
 * Template part for displaying the cards section with ACF data
 *
 * @package RouteX
 */
?>

<?php if ( have_rows('cards') ) : ?>
    <div class="container my-5">
        <div class="row cardrow">
            <?php while ( have_rows('cards') ) : the_row(); 
                if ( get_row_layout() == 'cardlayout' ) :
                    // Loop through the card_repeater field inside the cardlayout layout
                    if ( have_rows('card_repeater') ) :
                        while ( have_rows('card_repeater') ) : the_row();
                            $card_icon = get_sub_field('card_icon');
                            $card_title = get_sub_field('card_title');
                            $card_text = get_sub_field('card_text');
            ?>
                            <div class="col-md-4">
                                <div class="card card1">
                                    <div class="card-body">
                                        <div class="circle cardic">
                                            <?php if ($card_icon) : ?>
                                                <img src="<?php echo esc_url($card_icon); ?>" alt="Icon" class="card-icon"> <!-- Added class for icon styling -->
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($card_title) : ?>
                                            <h3 class="card-title"><?php echo esc_html($card_title); ?></h3>
                                        <?php endif; ?>
                                        <?php if ($card_text) : ?>
                                            <p class="card-text"><?php echo esc_html($card_text); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
            <?php 
                        endwhile;
                    endif;
                endif;
            endwhile; ?>
        </div>
    </div>
<?php else : ?>
    <p>No offers available at the moment.</p>
<?php endif; ?>
