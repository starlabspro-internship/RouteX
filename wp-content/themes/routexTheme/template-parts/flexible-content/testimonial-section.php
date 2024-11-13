<?php
$testimonial_left_image = esc_url(get_sub_field('testimonial_left_image'));
$testimonial_cards = [];
$card_count = 0;

if (have_rows('testimonial_card')) {
    while (have_rows('testimonial_card')): the_row();
        $card_count++;
        $testimonial_cards[] = [
            'text' => esc_html(get_sub_field('text')),
            'icon' => esc_url(get_sub_field('icon')),
            'title' => esc_attr(get_sub_field('title')),
            'name' => esc_html(get_sub_field('name')),
            'position' => esc_html(get_sub_field('position')),
        ];
    endwhile;
}
if ($testimonial_left_image || has_non_empty_cards($testimonial_cards)) :
?>

<section class="testimonial-section top-bottom-small">
    <div class="container cta-container ">
        <div class="row">
            <?php if ($testimonial_left_image): ?>
            <div class="col-12 col-md-4 testimonial-left" style="background-image: url('<?php echo $testimonial_left_image; ?>');"></div>
            <?php endif; ?>
            <?php if (has_non_empty_cards($testimonial_cards)): ?>
            <div class="col-12 col-md-8 testimonial-right d-flex flex-column justify-content-center">
                <div class="testimonial-cards">
                    <?php 
                    $card_count = 0;
                    foreach ($testimonial_cards as $index => $card): 
                        $card_count++; 
                    ?>
                        <div class="testimonial-card" id="testimonial-card-<?php echo $card_count; ?>" style="display: <?php echo $card_count === 1 ? 'block' : 'none'; ?>;">
                            <div class="testimonial-content">
                                <svg width="73" height="56" viewBox="0 0 73 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M36.8723 41.0882C36.493 40.7847 36.4172 40.4054 36.5689 39.7605L43.8519 14.5354C43.9657 14.0423 44.383 13.7009 44.914 13.7009H62.0595C62.7423 13.7009 63.0078 14.0044 63.0078 14.6492V17.2286C62.9699 17.7218 62.8181 18.177 62.5526 18.5563L43.5105 43.6676C43.2071 44.1228 42.5622 44.2745 42.0691 43.971L36.8723 41.0882ZM10.1679 41.0882C9.78857 40.7847 9.71272 40.4054 9.86444 39.7605L17.1475 14.5354C17.2613 14.0044 17.7544 13.663 18.2855 13.7009H35.3551C36.0378 13.7009 36.3034 14.0044 36.3034 14.6492V17.2286C36.2654 17.7218 36.1137 18.177 35.8482 18.5563L16.8819 43.6676C16.5785 44.1228 15.9336 44.2745 15.4405 43.9331L10.1679 41.0882Z" fill="white"/>
                                </svg>
                                <?php if ($card['text']): ?>
                                <p class="testimonial-text"><?php echo $card['text']; ?></p>
                                <?php endif; ?>
                                <?php if ($card['icon'] || $card['name'] || $card['position']): ?>
                                <p class="testimonial-author">
                                    <div class="testimonial-icon">
                                        <?php if ($card['icon']): ?>
                                        <img src="<?php echo $card['icon']; ?>" alt="<?php echo $card['title']; ?>" class="img-fluid">
                                        <?php endif; ?>
                                        <?php if ($card['name'] || $card['position']): ?>
                                        <div class="author-div">
                                            <?php if ($card['name']): ?>
                                            <p class="author-name"><?php echo $card['name']; ?></p>
                                            <?php endif; ?>
                                            <?php if ($card['position']): ?>
                                            <p class="author-position"><?php echo $card['position']; ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </p>
                                <?php endif; ?>
                            </div>

                            <div class="testimonial-buttons text-center d-flex">
                                <div class="separator"></div>
                                <div class="buttons-wrapper">
                                    <button class="prev-testimonial" aria-label="Previous testimonial">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow.svg" alt="" class="hover-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/left-arrow-green.svg" alt="" class="default-img">
                                    </button>
                                    <button class="next-testimonial" aria-label="Next testimonial">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow.svg" alt="" class="hover-img">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green.svg" alt="" class="default-img">
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const testimonialCards = document.querySelectorAll('.testimonial-card'); // Select all testimonial cards
        let currentCard = 0;

        function showCard(index) {
            testimonialCards.forEach((card, i) => {
                card.style.display = (i === index) ? 'block' : 'none'; // Show the selected card, hide others
            });
        }

        // Update card navigation to handle "Previous" and "Next" buttons separately
        document.querySelectorAll('.prev-testimonial').forEach((prevButton, index) => {
            prevButton.addEventListener('click', function () {
                currentCard = (currentCard > 0) ? currentCard - 1 : testimonialCards.length - 1; // Wrap to last card if at the start
                showCard(currentCard);
            });
        });

        document.querySelectorAll('.next-testimonial').forEach((nextButton, index) => {
            nextButton.addEventListener('click', function () {
                currentCard = (currentCard < testimonialCards.length - 1) ? currentCard + 1 : 0; // Wrap to first card if at the end
                showCard(currentCard);
            });
        });

        // Initially show the first card
        showCard(currentCard);
        });
    </script>
</section>
<?php endif; ?>
