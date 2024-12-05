<?php
get_header();
echo top_banner();
?>

<div class="container py-5">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="country-single">
                <!-- Post Title -->
                <h1 class="country-title text-center mb-4">
                    <?php the_title(); ?>
                </h1>
                <!-- Post Content -->
                <div class="country-content">
                    <?php
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar">
                <ul class="continents-list list-group">
                    <?php 
                    // Ensure $continents and $current_continent are defined or fetched appropriately
                    $continents = ['Africa', 'Asia', 'Europe', 'North America', 'South America', 'Australia'];
                    $current_continent = isset($_GET['continent']) ? sanitize_text_field($_GET['continent']) : '';

                    foreach ($continents as $index => $continent) : ?>
                        <li class="list-group-item <?php echo $current_continent === $continent ? 'active' : ''; ?>">
                            <a href="<?php echo add_query_arg('continent', $continent, get_post_type_archive_link('countries')); ?>" class="continent-link">
                                <?php echo esc_html($continent); ?>
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="continent-icon">
                                    <path d="M1.75 11.0195C1.50391 11.0195 1.28516 10.9375 1.12109 10.7734C0.765625 10.4453 0.765625 9.87109 1.12109 9.54297L4.86719 5.76953L1.12109 2.02344C0.765625 1.69531 0.765625 1.12109 1.12109 0.792969C1.44922 0.4375 2.02344 0.4375 2.35156 0.792969L6.72656 5.16797C7.08203 5.49609 7.08203 6.07031 6.72656 6.39844L2.35156 10.7734C2.1875 10.9375 1.96875 11.0195 1.75 11.0195Z" fill="#034833"/>
                                </svg>
                            </a>
                        </li>
                        <?php if ($index < count($continents) - 1): ?>
                            <hr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
