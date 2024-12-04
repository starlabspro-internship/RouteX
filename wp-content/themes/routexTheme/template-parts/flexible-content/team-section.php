<?php
$team_small_title = get_sub_field('team_small_title');
$team_title = get_sub_field('team_title');

function has_team_content() {
    $has_content = false;
    if (get_sub_field('team_small_title') || get_sub_field('team_title') || have_rows('team_members')) {
        $has_content = true;
    }
    return $has_content;
}
if (has_team_content()) :
?>

<section class="text-center team-section">
    <?php if ($team_small_title) : ?>
    <div class="team-section-subtitle">
        <h5><?php echo esc_html($team_small_title); ?></h5>
    </div>
    <?php endif; ?>

    <?php if ($team_title) : ?>
    <h2 class="team-section-title"><?php echo esc_html($team_title); ?></h2>
    <?php endif; ?>

    <?php if (have_rows('team_members')) : ?>
    <div class="row justify-content-center">
        <?php while (have_rows('team_members')) : the_row(); ?>
        <?php
        $profile_image = get_sub_field('profile_image');
        $name = get_sub_field('name');
        $position = get_sub_field('position');
        $team_member_id = uniqid('team_member_'); 
        ?>

        <div class="col-md-4">
            <div class="team-member">
            <?php if ($profile_image) : ?>
            <img src="<?php echo esc_url($profile_image['url']); ?>" alt="<?php echo esc_attr($name); ?>"
                class="img-fluid team-member-image">
            <?php endif; ?>

            <div class="member-info-wrapper">
                <div class="member-info">
                    <?php if ($name) : ?>
                    <h3 class="team-member-name"><?php echo esc_html($name); ?></h3>
                    <?php endif; ?>

                    <?php if ($position) : ?>
                    <p class="team-member-position"><?php echo esc_html($position); ?></p>
                    <?php endif; ?>
                </div>

                <?php if (have_rows('social_links')) : ?>
                <div class="social-links-container">
                    <button class="social-toggle" data-target="#<?php echo esc_attr($team_member_id); ?>">
                        <?php
                        $svg_file = get_template_directory() . '/assets/icons/green_think.svg';
                        if (file_exists($svg_file)) {
                            echo file_get_contents($svg_file);
                        }
                        ?>
                    </button>
                    <div class="social-icons" id="<?php echo esc_attr($team_member_id); ?>">

                        <?php if (have_rows('social_links')) : ?>
                        <div class="social-links-wrapper">
                            <?php while (have_rows('social_links')) : the_row(); ?>
                            <?php
                            $social_icon = get_sub_field('social_icon');
                            $social_url = get_sub_field('social_url');
                             ?>
                            <?php if ($social_url && $social_icon) : ?>
                            <a href="<?php echo esc_url($social_url); ?>" target="_blank" class="social-link">
                                <img src="<?php echo esc_url($social_icon); ?>" alt="Social Icon">
                            </a>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
                <?php endif; ?>
            </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</section>