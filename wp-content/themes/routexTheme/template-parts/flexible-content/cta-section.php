<div class="container cta-container">
    <div class="row">
        <!-- Left Div (30%) -->
        <div class="col-md-4 ctadiv imagediv col-12">
            <?php 
            // Retrieve left image
            $left_image = get_sub_field('left_image'); 
            if ($left_image): ?>
                <img src="<?php echo esc_url($left_image); ?>" class="img-fluid" alt="Left Image" />
            <?php else: ?>
                <p>Left Image not found.</p>
            <?php endif; ?>

        </div>

        <!-- Right Div (70%) -->
        <div class="col-md-8 col-12 cta-content-div">
            <div class="top-right-section ctadiv mb-4 d-flex flex-wrap">
            <!-- Left Content Div -->
            <div class="left-content col-md-8 col-12 d-flex flex-column align-items-start">
                <!-- Icon -->
                <?php 
                $icon = get_sub_field('icon'); 
                if ($icon): ?>
                    <div class="circle">
                        <img src="<?php echo esc_url($icon); ?>" class="icon" alt="Icon" />
                    </div>
                <?php else: ?>
                    <p>Icon not found.</p>
                <?php endif; ?>

                <!-- Top Title -->
                <h2 class="title2"><?php echo esc_html(get_sub_field('top_title')); ?></h2>

                <!-- Top Text -->
                <p><?php echo esc_html(get_sub_field('top_text')); ?></p>

                <!-- Button -->
                <a href="<?php echo esc_url(get_sub_field('button')); ?>" class="button btn btn-primary">Contact us ➜</a>
            </div>

            <!-- Right Image Div -->
            <div class="right-image col-md-4 col-12" style="background-image: url('<?php echo esc_url(get_sub_field('right_image')); ?>');"></div>
        </div>

        <!-- Bottom Counter Section -->
        <?php if (have_rows('bottom_counter')): ?>
            <div class="bottom-counter ctadiv">
                <?php while (have_rows('bottom_counter')): the_row(); ?>
                    <div class="counter-item">
                        <h3><?php echo esc_html(get_sub_field('numbers')); ?></h3>
                        <p><?php echo esc_html(get_sub_field('title')); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        </div>
    </div>
</div>
