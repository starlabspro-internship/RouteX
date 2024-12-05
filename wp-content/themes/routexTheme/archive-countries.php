<?php
/**
 * Template Name: Countries Archive Page
 */

get_header();

$continents = [
    'Europe',
    'Asia',
    'Africa',
    'North America',
    'South America',
    'Australia',
];

$current_continent = isset($_GET['continent']) ? sanitize_text_field($_GET['continent']) : $continents[0];

$args = [
    'post_type'      => 'countries',
    'posts_per_page' => -1,
    'meta_query'     => [
        [
            'key'     => 'continent',
            'value'   => $current_continent,
            'compare' => '=',
        ],
    ],
];
$countries_query = new WP_Query($args);
?>
<?php echo top_banner(); ?>
<section class="countries-archive-section py-5">
    <div class="container" id="countries-archive-div">
        <div class="row">
            <div class="col-md-4">
                <ul class="continents-list">
                    <?php foreach ($continents as $index => $continent) : ?>
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
            <div class="col-md-8">
                <?php if ($countries_query->have_posts()) : ?>
                    <div class="row g-4" >
                        <?php 
                        while ($countries_query->have_posts()) : $countries_query->the_post(); 
                        ?>
                            <div class="col-lg-6 col-md-6">
                                <a href="<?php the_permalink(); ?>" class="card-link">
                                    <div class="card country-card h-100">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="available-countries-item-icon">
                                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="Country icon">
                                            </div>
                                        <?php endif; ?>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php the_title(); ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <p class="text-muted no-countries-text">No countries found in  <?php echo esc_html($current_continent); ?>! </p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
