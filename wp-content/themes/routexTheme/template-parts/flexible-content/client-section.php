<div class="container my-5">
    <div class="client-carousel">
        <div class="carousel-track">
            <?php 
            if( have_rows('logos') ): 
                while( have_rows('logos') ): the_row();
                    
                    $logo_image = get_sub_field('logos_image'); 
                    if( $logo_image ): ?>
                        <img src="<?php echo esc_url($logo_image); ?>" 
                             alt="" 
                             class="img-fluid client-img">
                    <?php endif; 
                endwhile;
            endif; ?>
        </div>
    </div>
</div>