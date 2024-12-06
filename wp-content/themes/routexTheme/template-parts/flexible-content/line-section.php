<?php if (have_rows('lines')) : ?>
<section class="line-section">
    <div class="lines">
        <div class="line-section-wrapper">
            <?php while (have_rows('lines')) : the_row(); 
                $line_image_url = get_sub_field('line_image');
            ?>
            <div class="line-item">
                <?php if ($line_image_url) : ?>
                <img src="<?php echo esc_url($line_image_url); ?>" alt="Line Icon" class="line-icon">
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>



<script>
document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector(".line-section-wrapper");

    if (wrapper) {
        let scrollStep = 1;
        const scrollInterval = 15;
        let autoScrollInterval;

        const initializeScroll = () => {
            const items = Array.from(wrapper.children);
            const wrapperWidth = wrapper.offsetWidth;
            let contentWidth = wrapper.scrollWidth;

            while (wrapper.children.length > items.length) {
                wrapper.removeChild(wrapper.lastChild);
            }

            while (contentWidth < wrapperWidth * 2) {
                items.forEach((item) => {
                    const clone = item.cloneNode(true);
                    wrapper.appendChild(clone);
                });
                contentWidth = wrapper.scrollWidth;
            }

            wrapper.scrollLeft = 0;
        };

        const autoScroll = () => {
            if (wrapper.scrollWidth > wrapper.offsetWidth) {
                wrapper.scrollLeft += scrollStep;

                if (wrapper.scrollLeft >= wrapper.scrollWidth / 2) {
                    wrapper.scrollLeft = 0;
                }
            }
        };

        const adjustScrollSpeed = () => {
            const screenWidth = window.innerWidth;

            if (screenWidth < 768) {
                scrollStep = 1;
            } else if (screenWidth < 1200) {
                scrollStep = 1;
            } else {
                scrollStep = 2;
            }
        };

        const startAutoScroll = () => {
            if (!autoScrollInterval) {
                autoScrollInterval = setInterval(autoScroll, scrollInterval);
            }
        };

        const stopAutoScroll = () => {
            clearInterval(autoScrollInterval);
            autoScrollInterval = null;
        };

        wrapper.addEventListener("touchstart", stopAutoScroll);
        wrapper.addEventListener("touchend", startAutoScroll);

        wrapper.addEventListener("mouseenter", stopAutoScroll);
        wrapper.addEventListener("mouseleave", startAutoScroll);

        initializeScroll();
        adjustScrollSpeed();
        startAutoScroll();

        window.addEventListener("resize", () => {
            stopAutoScroll();
            adjustScrollSpeed();
            initializeScroll();
            startAutoScroll();
        });
    }
});
</script>