<?php if (have_rows('videos')): ?>
<section class="our-videos-section">
    <div class="container">
        <div class="video-display">
            <?php while (have_rows('videos')): the_row(); ?>
            <?php 
                $video_title = get_sub_field('video_title');
                $video_url = get_sub_field('video_url');
                $embed_url = 'https://www.youtube.com/embed/' . get_youtube_video_id($video_url);
            ?>
            <div class="video-item">
                <iframe src="<?php echo esc_url($embed_url); ?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
                <p><?php echo esc_html($video_title); ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>