<?php
get_header();
echo top_banner();
?>

<div class="container py-5">
    <div class="row">
        <!-- New Sidebar on the Left -->
        <div class="col-lg-4">
            <div class="sidebar-coaching">
                <!-- Recent Posts List -->
                <div class="recent-posts">
                    <ul class="list-unstyled">
                        <?php
                        // Query to get the 5 most recent coaching posts
                        $args = array(
                            'post_type' => 'coaching', // Assuming 'coaching' is your custom post type
                            'posts_per_page' => 5
                        );
                        $recent_posts = new WP_Query($args);

                        if ($recent_posts->have_posts()) :
                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                        ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" class="recent-post-link">
                                        <?php the_title(); ?>
                                        <span class="right-arrow-container">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green-noTail.svg" alt="right-arrow-green-noTail">
                                        </span>
                                    </a>
                                </li>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                            echo '<li>No recent posts found.</li>';
                        endif;
                        ?>
                    </ul>
                </div>

                <?php
                $contact_information = get_field('contact_information', 'options');
                $phone_information = $contact_information['phone_information'] ?? null;   
                $phone_number = $phone_information['phone_number'] ?? null;  

                if ($phone_number) : ?>
                        <!-- Contact Card -->
                        <div class="contact-card-coaching mt-4">
                            <div class="contact-item-coaching">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/big-phone-icon.svg'); ?>" alt="phone-icon">
                            </div>
                            <p>GET IN TOUCH</p>
                            <p><?php echo esc_html($phone_number); ?></p>
                        </div>
                    <?php 
                    endif; 
                    ?>

            </div>
        </div>

        <!-- Single Coaching Post Content on the Right -->
        <div class="col-lg-8">
            <div class="coaching-single">
                <!-- Display the Featured Image -->
                <div class="post-thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <h1 class="coaching-title text-center mb-4">
                    <?php the_title(); ?>
                </h1>

                <div class="coaching-content">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
