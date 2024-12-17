<div class="col-12 col-md-4">
    <div class="sidebar2">
        <div class="card sidebar-card">
            <div class="card-header">
                <h3 class="sidebar-card-title">Search Here</h3>
            </div>
            <div class="card-body">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('?s=teksti')); ?>">
                    <input type="text" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="search-submit">  
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/search-green.svg" alt="right-arrow-bigger-tale-green">
                    </button>
                </form>
            </div>
        </div>
        
        <div class="card sidebar-card">
            <div class="card-header">
                <h3 class="sidebar-card-title">Popular Posts</h3>
            </div>
            <div class="card-body">
                <?php
                $args = array(
                    'posts_per_page' => 3,
                    'orderby' => 'comment_count',
                    'order' => 'DESC'
                );
                $popular_posts = new WP_Query($args);
                if ($popular_posts->have_posts()) :
                    while ($popular_posts->have_posts()) :
                        $popular_posts->the_post();
                ?>
                        <a href="<?php the_permalink(); ?>" class="popular-post-link">
                            <div class="popular-post">
                                <div class="popular-post-thumbnail">
                                    <?php the_post_thumbnail('blog-small'); ?>
                                </div>
                                <div class="popular-post-info">
                                    <p class="popular-post-date">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/date-icon-green.svg" alt="right-arrow-bigger-tale-green">
                                        <?php echo get_the_date(); ?>
                                    </p>
                                    <h4 class="popular-post-title"><?php the_title(); ?></h4>
                                </div>
                            </div>
                        </a>
                <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    
        <div class="card sidebar-card">
            <div class="card-header">
                <h3 class="sidebar-card-title">Categories</h3>
            </div>
            <div class="card-body">
                <ul class="category-list">
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) :
                    ?>
                        <li><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    
        <?php
        // Check if there are tags before displaying the "Popular Tags" card
        $tags = get_tags();
        if ($tags) : ?>
            <div class="card sidebar-card">
                <div class="card-header">
                    <h3 class="sidebar-card-title">Popular Tags</h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($tags as $tag) :
                    ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-link"><?php echo esc_html($tag->name); ?></a>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
