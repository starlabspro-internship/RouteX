<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package routexTheme
 */

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<section class="hero-section">
    <div class="container">
        <div class="decorative-icon left-tower">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-right-towor.png"
                alt="Decorative Tower">
        </div>
        <div class="decorative-icon right-tower">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner-right-towor.png"
                alt="Decorative Tower">
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="hero-content">
                    <h1 class="title">Visa Made Easy<br>Dreams Made<br> Possible</h1>
                    <div class="btn-wrapper">
                        <a href="404.php" class="btn btn-transparent">Read More <i
                                class="fa-solid fa-arrow-right"></i></a>
                        <a href="https://www.youtube.com/watch?v=71EZb94AS1k" class="banner-video-button">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="12" fill="rgba(0, 77, 64, 0.9)" />
                                <polygon points="9,6 17,12 9,18" fill="#ffffff" />
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/watch?v=71EZb94AS1k" class="video-text">Watch Our Videos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="decorative-circle"></div>
                <div class="gray-photo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gray.jpg" alt="Gray Photo">
                </div>
            </div>
        </div>
    </div>
</section>

</article><!-- #post-<?php the_ID(); ?> -->