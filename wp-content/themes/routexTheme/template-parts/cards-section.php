<?php
/**
 * Template part for displaying the cards section with ACF data
 *
 * @package RouteX
 */
?>


<div class="container my-5">
    <div class="row">
        <?php if ( have_rows('cards') ) : ?>
            <?php while ( have_rows('cards') ) : the_row(); 
                $card_icon = get_sub_field('card_icon');
                $card_title = get_sub_field('card_title');
                $card_text = get_sub_field('card_text');
            ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="circle">
                                <img src="<?php echo esc_url($card_icon); ?>" alt="Icon" class="card-icon"> <!-- Added class for icon styling -->
                            </div>
                            <h3 class="card-title"><?php echo esc_html($card_title); ?></h3>
                            <p class="card-text"><?php echo esc_html($card_text); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No offers available at the moment.</p>
        <?php endif; ?>
    </div>
</div>

