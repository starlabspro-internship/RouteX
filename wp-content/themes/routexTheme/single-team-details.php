<?php get_header(); ?>
<?php echo top_banner(); ?>

<?php while (have_posts()) : the_post(); ?>
<section class="team-details-section">
    <div class="container">
        <?php if (have_rows('sections')) : ?>
        <?php while (have_rows('sections')) : the_row(); ?>
        <?php if (get_row_layout() == 'team_details') : ?>
        <?php if (have_rows('team_member')) : ?>
        <?php while (have_rows('team_member')) : the_row(); ?>
        <?php
        $image = get_sub_field('team_member_image');
        $name = get_sub_field('team_member_name');
        $position = get_sub_field('team_member_position');
        $description = get_sub_field('team_member_description');
        $responsibility = get_sub_field('team_member_responsibility');
        $experience = get_sub_field('team_member_experience');
        $email = get_sub_field('team_member_email');
        $phone = get_sub_field('team_member_phone');
        $personal_experience = get_sub_field('personal_experience');
        $position_experience = get_sub_field('personal_experience_section');
        $parts = explode('.', $position_experience, 2);
        ?>
        <div class="team-detail-m">
            <?php if (!empty($image)) : ?>
            <div class="team-member-image-wrapper">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($name); ?>"
                    class="team-member-image-members">
            </div>
            <?php endif; ?>
            <div class="team-details-content">
                <h3 class="team-details-name"><?php echo esc_html($name); ?></h3>
                <p class="team-details-position">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/dark_line.svg"
                        alt="Decoration Line" class="team-details-line">
                    <?php echo esc_html($position); ?>
                </p>
                <p class="team-details-description"><?php echo esc_html($description); ?></p>
                <ul class="team-details-info">
                    <?php if ($responsibility) : ?>
                    <li><strong>Responsibility:</strong> <?php echo esc_html($responsibility); ?></li>
                    <?php endif; ?>
                    <?php if ($experience) : ?>
                    <li><strong>Experience:</strong> <?php echo esc_html($experience); ?></li>
                    <?php endif; ?>
                    <?php if ($email) : ?>
                    <li><strong>Email:</strong> <a
                            href="mailto:<?php echo esc_html($email); ?>"><?php echo esc_html($email); ?></a></li>
                    <?php endif; ?>
                    <?php if ($phone) : ?>
                    <li><strong>Phone:</strong> <?php echo esc_html($phone); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <h3 class="team-details-name"><?php echo esc_html($personal_experience); ?></h3>
        <div class="team-details-position-experience">
            <p><?php echo esc_html(trim($parts[0])); ?>.</p>
            <?php if (!empty($parts[1])) : ?>
            <p><?php echo esc_html(trim($parts[1])); ?></p>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>

        <div class="skills-contact-wrapper">

            <?php if (have_rows('skills_list')) : ?>
            <div class="professional-skills-section">
                <h3 class="section-title">Professional Skills</h3>
                <div class="skills-wrapper">
                    <?php while (have_rows('skills_list')) : the_row(); 
                                        $skill_name = get_sub_field('skill_name');
                                        $skill_percentage = get_sub_field('skill_percentage');
                                    ?>
                    <div class="skill">
                        <div class="skill-info">
                            <span class="skill-name"><?php echo esc_html($skill_name); ?></span>
                            <span class="skill-percentage"><?php echo esc_html($skill_percentage); ?>%</span>
                        </div>
                        <div class="skill-bar">
                            <div class="skill-fill" style="width: <?php echo esc_attr($skill_percentage); ?>%;"></div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>


        </div>
        <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<?php endwhile; ?>

<?php get_footer(); ?>