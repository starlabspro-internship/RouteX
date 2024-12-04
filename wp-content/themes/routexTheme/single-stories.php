<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        $visa_applied = get_field('visa_applied');
        $visa_type = get_field('visa_type');
        $approval = get_field('visa_approval');
        $link_1 = get_field('link_1');
        $link_2 = get_field('link_2');
        $background_image = get_field('background_image'); 
        $front_image = get_the_post_thumbnail_url(); 
?>

<section class="story-single-section top-bottom-small">
    <div class="row">
        <div class="col-md-6">
            <h1 class="title story-title"><?php the_title(); ?></h1>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/quotation-green-big.svg" alt="Quotation">
            <p class="story-content-p"><?php the_content(); ?></p>
            <p><strong style="color: var(--secondary-color);">Visa Applied:&nbsp;&nbsp;</strong>   <?php echo esc_html($visa_applied); ?></p>
            <p><strong style="color: var(--secondary-color);">Visa Type:&nbsp;&nbsp;</strong>  <?php echo esc_html($visa_type); ?></p>
            <p><strong style="color: var(--secondary-color);">Approval:&nbsp;&nbsp;</strong>  <?php echo esc_html($approval); ?></p>

            <div class="story-buttons">
                <a href="#" class="apply-button">Apply for a visa
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg" alt="" class="default-img">
                </a> 
                <a href="<?php echo esc_url($_SERVER['HTTP_REFERER'] ?? get_post_type_archive_link('storys')); ?>" class="read-more-button">Read More Stories</a>
            </a>                          
        </div>
    </div>
    
    <div class="col-md-6">
         <div class="story-image-div">
         <?php
             $front_image = get_the_post_thumbnail_url(); 
         ?>
             <svg viewBox="0 0 528 592" fill="none" xmlns="http://www.w3.org/2000/svg">
             <rect x="201.686" y="66.2148" width="331.348" height="475.451" rx="21.3651" transform="rotate(10 201.686 66.2148)" fill="#F1F5EB"/>
             <rect x="2.89324" y="114.178" width="412.764" height="476.323" transform="rotate(-5 2.89324 114.178)" fill="none" stroke="var(--accent-color)" stroke-width="11" rx="20" ry="20"/>
             <image x="2.89324" y="114.178" width="412.764" height="476.323" transform="rotate(-5 2.89324 114.178)" href="<?php echo esc_url($front_image); ?>" clip-path="url(#clip)" preserveAspectRatio="xMidYMid slice" />
             <defs>
             <clipPath id="clip">
                 <rect x="2.89324" y="114.178" width="412.764" height="476.323" rx="20" ry="20"/>
             </clipPath>
             </defs>

             <g opacity="0.4" clip-path="url(#clip0_3839_154)">
             <path d="M177.241 45.8701C176.554 44.2246 176.153 43.1885 175.638 42.1832C175.122 41.1779 173.975 40.5705 173.028 41.1674C172.396 41.5653 171.936 42.6034 171.792 43.4425C171.676 44.3883 172.191 45.3936 172.563 46.7805C170.727 46.3577 169.724 45.3687 168.548 44.6546C166.942 43.7128 165.852 43.7763 165.133 44.7692C164.415 45.7621 164.643 47.073 165.876 48.0005C168.629 50.0072 171.496 51.9832 174.335 53.8525C176.256 55.0529 177.749 54.653 178.927 52.6221C179.703 51.385 180.192 49.9962 180.968 48.7591C182.549 45.9342 184.13 43.1094 185.711 40.2845C186.401 39.1849 186.488 38.1325 185.398 37.2809C184.452 36.5053 182.788 36.7226 181.955 37.7463C181.208 38.6325 180.604 39.5946 180.001 40.5568C179.196 42.1446 178.391 43.7325 177.241 45.8701Z" fill="#83CD20"/>
             <path d="M90.017 43.1708C89.8169 42.424 89.9036 41.829 89.6744 41.433C89.1585 40.8852 88.3844 40.2922 87.7532 40.2326C87.2368 40.1423 86.3179 40.8459 86.1164 41.4716C85.57 42.6471 85.4539 44.0504 84.9933 45.546C84.2468 45.9747 83.357 46.3275 82.5243 46.8936C81.462 47.5213 80.7151 48.4075 81.2015 49.7637C81.8027 51.089 82.9217 51.1322 84.1274 50.5805C84.4718 50.4882 84.7014 50.4267 85.1321 50.1969C86.0782 50.9726 86.4208 52.7103 88.2576 52.2181C90.5537 51.6029 89.5514 49.6989 90.0405 48.31C90.787 47.8813 91.5335 47.4526 92.3085 47.1306C93.3994 46.6096 94.1463 45.7234 93.7456 44.6873C93.4593 44.0779 92.3694 43.6839 91.6524 43.3043C91.0788 43.0006 90.6482 43.2303 90.017 43.1708Z" fill="#83CD20"/>
             <path d="M108.863 17.9939C107.915 19.0484 107.025 19.8587 107.598 21.0774C108.17 22.2961 109.289 22.3393 110.667 21.9701C114.226 21.0165 117.814 20.1696 121.373 19.216C122.635 18.8776 123.755 18.4633 123.728 16.9841C123.786 15.8249 122.525 14.7908 121.004 15.084C116.928 15.9473 112.91 17.024 108.863 17.9939Z" fill="#83CD20"/>
             <path d="M65.1499 65.1554C64.2787 63.788 62.4301 63.4829 61.7454 64.6955C60.3153 67.3655 59.0888 70.3241 58.0978 73.2196C57.9767 73.7095 58.9085 74.8319 59.6116 75.1009C60.5182 75.6584 61.4636 74.9477 61.97 74.0116C63.1039 71.6496 64.1201 69.3191 65.1077 66.8819C65.318 66.2538 65.1179 65.507 65.1499 65.1554Z" fill="#83CD20"/>
             <path d="M141.664 15.4918C141.119 15.2948 140.23 14.7326 139.369 14.7346C136.873 14.603 134.405 14.5781 131.937 14.5532C130.818 14.51 129.986 15.0762 129.784 16.1594C129.61 17.3493 130.241 18.3239 131.36 18.3671C134.372 18.589 137.385 18.8109 140.312 18.7127C141.89 18.6329 142.552 16.9691 141.664 15.4918Z" fill="#83CD20"/>
             <path d="M98.9009 26.7223C98.0415 25.3518 96.4637 24.9741 95.6306 25.9978C93.7919 28.32 92.0389 30.9623 90.487 33.4363C89.8835 34.3984 90.4275 35.5105 91.5461 36.0112C92.6646 36.5119 93.6121 35.915 94.2156 34.9528C95.5375 32.9978 96.8879 31.1495 98.095 29.2252C98.7271 28.3697 98.8142 27.3173 98.9009 26.7223Z" fill="#83CD20"/>
             <path d="M88.772 55.5064C88.6286 55.4304 87.7397 54.8682 87.0508 55.0528C86.362 55.2373 85.4141 56.2918 85.356 56.9934C85.3242 60.0893 86.3256 62.9082 88.6476 65.1447C89.4789 65.9511 90.5402 66.2384 91.5739 65.5041C92.7224 64.7389 92.4651 63.7788 91.9497 62.7734C91.0049 60.6253 90.0316 58.3705 88.772 55.5064Z" fill="#83CD20"/>
             <path d="M171.175 32.3993C170.143 31.3036 168.595 29.6602 166.846 28.1849C166.043 27.4852 164.867 27.2286 163.862 28.0697C162.771 29.0482 163.057 30.115 163.802 31.0588C165.063 32.5505 166.41 33.9047 167.671 35.3963C168.932 36.888 170.051 37.3887 171.084 36.6543C172.261 35.9959 172.349 34.4859 171.175 32.3993Z" fill="#83CD20"/>
             <path d="M103.213 72.6781C104.505 71.9889 104.765 70.2041 103.503 69.6274C100.951 68.3675 98.3406 67.3517 95.6443 66.4733C95.0993 66.2763 93.9799 66.6906 93.7212 67.1029C93.3764 67.6527 93.2892 68.7052 93.6903 69.2838C94.5493 71.1118 100.314 73.3405 102.41 72.8934C102.668 72.9386 102.984 72.7396 103.213 72.6781Z" fill="#83CD20"/>
             <path d="M118.762 49.8725C117.816 49.5544 117.041 48.9614 116.353 49.146C115.664 49.3305 114.659 50.1716 114.687 50.7358C114.77 53.3434 114.997 56.0269 115.425 58.5422C115.568 59.0756 116.715 59.683 117.346 59.7425C117.949 59.6954 119.069 58.8236 119.184 58.3353C119.158 55.4836 118.931 52.8001 118.762 49.8725Z" fill="#83CD20"/>
             <path d="M156.229 24.8552C157.435 23.846 157.666 22.8695 156.921 21.9256C156.405 21.3778 155.659 20.8915 154.942 20.5119C153.508 19.7527 151.845 19.0549 150.411 18.2957C149.407 17.7642 148.546 17.7662 147.771 18.5457C146.794 19.4934 147.052 20.4536 147.768 21.2907C148.112 21.656 148.456 22.0212 148.886 22.249C150.578 23.0534 152.299 23.9644 154.077 24.6314C154.651 24.9351 155.598 24.7957 156.229 24.8552Z" fill="#83CD20"/>
             <path d="M71.1264 53.4904C69.8913 54.8504 68.3979 56.1653 67.3347 57.708C66.5878 58.5942 66.7588 59.6919 67.7911 60.33C68.8235 60.9682 69.7133 60.6154 70.7184 59.7743C71.896 58.6584 73.1307 57.7558 74.4516 56.7158C75.4853 55.9814 76.2323 55.0952 75.6596 53.8765C75.1441 52.8712 73.8246 52.5387 72.2745 53.1827C71.9301 53.275 71.7291 53.4432 71.4132 53.6422C71.2984 53.673 71.155 53.597 71.1264 53.4904Z" fill="#83CD20"/>
             <path d="M109.301 43.4896C108.555 43.0033 108.068 42.5622 107.523 42.3652C105.916 41.8808 104.31 41.3965 102.704 40.9121C101.527 40.6556 100.351 40.8565 100.063 42.0772C99.8897 42.8096 100.348 44.059 100.921 44.3627C102.871 45.2123 105.023 45.8936 107.232 46.3309C107.748 46.4212 108.696 45.8243 109.069 45.3812C109.414 44.8314 109.214 44.0846 109.301 43.4896Z" fill="#83CD20"/>
             <path d="M113.663 69.8774C114.439 69.0978 115.703 67.8445 116.794 66.4085C117.628 65.3848 117.428 64.1805 116.252 63.4664C115.22 62.8283 114.272 63.4252 113.382 64.2355C112.291 65.214 111.228 66.2991 110.108 67.1709C108.988 68.0428 107.955 68.7771 108.699 70.1784C109.243 71.2904 110.735 71.3481 112.371 70.5666C112.687 70.3676 112.802 70.3368 113.663 69.8774Z" fill="#83CD20"/>
             </g>
             <path fill-rule="evenodd" clip-rule="evenodd" d="M403.835 62.8471C408.952 61.5887 413.879 61.6711 419.069 61.5203C420.083 61.491 420.926 62.2872 420.956 63.2977C420.987 64.3088 420.187 65.1527 419.173 65.1826C414.252 65.3255 409.569 65.2101 404.709 66.4044C403.726 66.6462 402.73 66.0447 402.492 65.0629C402.248 64.0817 402.852 63.0883 403.835 62.8471Z" fill="#E3DBD8"/>
             <path fill-rule="evenodd" clip-rule="evenodd" d="M393.919 52.1558C401.723 43.6187 411.761 35.5749 421.896 29.9526C422.782 29.4624 423.899 29.7817 424.387 30.6658C424.876 31.5499 424.558 32.6661 423.673 33.1564C413.873 38.593 404.165 46.3724 396.624 54.6275C395.94 55.3736 394.78 55.4255 394.035 54.7435C393.29 54.0615 393.236 52.902 393.919 52.1558Z" fill="#E3DBD8"/>
             <path fill-rule="evenodd" clip-rule="evenodd" d="M385.396 49.9912C384.107 42.1831 386.305 34.135 389.413 27.0351C389.822 26.1089 390.903 25.6864 391.825 26.0912C392.753 26.4966 393.175 27.578 392.772 28.5042C389.938 34.9703 387.838 42.2832 389.01 49.3946C389.175 50.3923 388.497 51.3357 387.502 51.4999C386.507 51.6648 385.561 50.9882 385.396 49.9912Z" fill="#E3DBD8"/>
             <defs>
             <clipPath id="clip0_3839_154">
             <rect width="132.76" height="52.7947" fill="white" transform="matrix(0.965926 -0.258819 -0.258819 -0.965926 61.4509 85.3555)"/>
             </clipPath>
             </defs>
             </svg>
         </div>
    </div>
</section>

<?php
    endwhile;
endif;
?>

<?php get_footer(); ?>
