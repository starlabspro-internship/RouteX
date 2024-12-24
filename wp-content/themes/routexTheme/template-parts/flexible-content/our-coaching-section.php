<?php 
$background_image = get_sub_field('background_image');
$small_title = get_sub_field('sub_title');
$title = get_sub_field('title');
$author_selection = get_sub_field('choose_coaching_authors');

if ($author_selection === 'Show authors with most posts') {
    $users = get_users([
        'meta_key' => 'coaching_post_count',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'number' => 3, 
        'meta_value_num' => 1, 
    ]);


} elseif ($author_selection === 'Show authors who made the latest posts') {
    $latest_posts = get_posts([
        'post_type' => 'coaching',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
    ]);


    $users = [];
    foreach ($latest_posts as $post) {
        $author = get_user_by('ID', $post->post_author);


        if ($author && !in_array($author, $users)) {
            $users[] = $author; 
        }
    }
} else {
    $users = get_users([
        'number' => 5, 
        'orderby' => 'registered',
        'order' => 'DESC',
    ]);

}




$cards = [];
foreach ($users as $user) {
    $user_coaching_posts = get_posts([
        'post_type' => 'coaching',
        'author' => $user->ID,
        'post_status' => 'publish',
        'posts_per_page' => -1,
    ]);

    if (!empty($user_coaching_posts)) {
        $user_coaching_archive_url = add_query_arg(
            [
                'post_type' => 'coaching',
                'author' => $user->ID,
            ],
            home_url('/')
        );

        $cards[] = [
            'name' => $user->display_name,
            'person_link' => $user_coaching_archive_url,
        ];
    }
}

$social_media_cards = [];
if (have_rows('social_media_card')) :
    while (have_rows('social_media_card')) : the_row();
        $social_media_cards[] = [
            'card_background_image' => get_sub_field('card_background_image') ?: 'path/to/default/image.jpg',
            'links' => get_sub_field('links'),
        ];
    endwhile;
endif;

$has_non_empty_cards_boolean = !empty($cards);
$has_non_empty_social_cards_boolean = !empty($social_media_cards);
?>

<?php if ($background_image || $small_title || $title || $has_non_empty_cards_boolean || $has_non_empty_social_cards_boolean): ?>
    <?php $is_split_layout = $has_non_empty_cards_boolean && $has_non_empty_social_cards_boolean; ?>
    <section class="<?php echo (is_front_page()) ? 'our-coaching-section-home' : 'our-coaching-section'; ?>">
        <div class="our-coaching-section-container top-bottom">
            <div class="our-coaching-bg-img" style="background-image: url('<?php echo esc_url($background_image); ?>');"></div>

            <?php if ($small_title || $title): ?>
                <div class="title-subtitle-div">
                    <?php if ($small_title): ?>
                        <div class="our-coaching-section-subtitle">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/passport-icon.svg" class="img-fluid" alt="Passport Icon" width="21" height="21" loading="lazy">
                            <div class="subtitle"><?php echo esc_html($small_title); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if ($title): ?>
                        <div class="title"><?php echo esc_html($title); ?></div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($has_non_empty_cards_boolean || $has_non_empty_social_cards_boolean): ?>
                <div class="row">
                    <?php if ($has_non_empty_cards_boolean): ?>
                        <div class="<?php echo esc_attr($is_split_layout ? 'col-lg-8 col-md-7 col-12' : 'col-12'); ?>">
                            <div class="card-container">
                                <?php foreach ($cards as $card): ?>
                                    <div class="card">
                                        <h3><?php echo esc_html($card['name']); ?></h3>
                                        <a class="person-link" href="<?php echo esc_url($card['person_link']); ?>" aria-label="View coaching posts by <?php echo esc_html($card['name']); ?>">
                                            <?php echo file_get_contents(get_template_directory() . '/assets/icons/right-arrow-circle.svg'); ?>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($has_non_empty_social_cards_boolean): ?>
                        <div class="<?php echo esc_attr($is_split_layout ? 'col-lg-4 col-md-5 col-12' : 'col-12'); ?>">
                            <?php foreach ($social_media_cards as $social_card): ?>
                                <?php $card_bg_image_url = wp_get_attachment_image_url($social_card['card_background_image'], 'our-coaching-img'); ?>
                                <div class="position-relative bg-image" style="background-image: url('<?php echo esc_url($card_bg_image_url); ?>'); background-size: cover; background-position: center;">
                                    <div class="overlay-content text-center social-media-links-div">
                                        <?php if (!empty($social_card['links'])): ?>
                                            <?php foreach (['twitter', 'facebook', 'instagram', 'linkedin'] as $platform): ?>
                                                <?php if (!empty($social_card['links'][$platform])): ?>
                                                    <a style="text-decoration: none;" href="<?php echo esc_url($social_card['links'][$platform]['url']); ?>" class="social-link" aria-label="<?php echo ucfirst($platform); ?> link">
                                                        <?php
                                                        $svg_icons = [
                                                            'twitter' => file_get_contents(get_template_directory() . '/assets/icons/x.svg'),
                                                            'facebook' => file_get_contents(get_template_directory() . '/assets/icons/facebook.svg'),
                                                            'instagram' => file_get_contents(get_template_directory() . '/assets/icons/instagram.svg'),
                                                            'linkedin' => file_get_contents(get_template_directory() . '/assets/icons/linkedin.svg'),
                                                        ];
                                                        echo str_replace('<svg', '<svg class="svg-link-icon"', $svg_icons[$platform]);
                                                        ?>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
