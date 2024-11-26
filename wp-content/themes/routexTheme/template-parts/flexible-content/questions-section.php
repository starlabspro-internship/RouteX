<?php
$questions_repeater = [];
if (have_rows('questions_repeater')) :
    while (have_rows('questions_repeater')) : the_row();
        $questions_repeater[] = [
            'question' => get_sub_field('question'),
            'answer' => get_sub_field('answer'),
        ];
    endwhile;
endif;
if (has_non_empty_cards($questions_repeater)) :
?>
<section class="questions-section top-bottom-small">
    <div class="questions-section-container">
        <div class="questions-item-container row">
            <div class="col-md-12">
                <div class="questions-item">
                <?php
                    $index = 1;
                    foreach ($questions_repeater as $question) {
                            if ($question['question'] || $question['answer']) : ?>
                                <div id="container-item-question-<?php echo $index; ?>" class="questions-item-container">
                                    <?php if ($question['question']) : ?>
                                    <h2 id="container-question-<?php echo $index; ?>" style="<?php echo $index === 1 ? 'margin-top: 0;' : ''; ?>">
                                        <button id="container-question-button-<?php echo $index; ?>" class="question-toggle-button" data-target="image-question-<?php echo $index; ?> container-item-question-<?php echo $index; ?> question-<?php echo $index; ?> container-question-<?php echo $index; ?> container-question-button-<?php echo $index; ?>">
                                            <div class="question-title"><?php echo esc_html($question['question']); ?></div>
                                            <div id="image-question-<?php echo $index; ?>" class="question-item-button-image"><img src="<?php echo get_template_directory_uri(); ?>/assets/icons/right-arrow-green-noTail.svg" alt="right-arrow-green-noTail"></div>
                                        </button>
                                    </h2>
                                    <?php endif; ?>
                                    <?php if ($question['answer']) : ?>
                                        <div class="questions-item-collaps" id="question-<?php echo $index; ?>" style="display: none;">
                                            <div>
                                                <p><?php echo esc_html($question['answer']); ?></p>
                                            </div>
                                        </div>
                                    
                                    <?php endif; ?>
                                </div>
                        <?php endif;
                        $index++;
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.question-toggle-button');
    let currentlyOpen = null;

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const targets = button.getAttribute('data-target').split(' ');

            // Get the relevant IDs for each element
            const collapsibleId = targets.find(target => target.startsWith('question-'));
            const containerId = targets.find(target => target.startsWith('container-question-'));
            const containerButtonId = targets.find(target => target.startsWith('container-question-button-'));
            const containerDivId = targets.find(target => target.startsWith('container-item-question-'));
            const imageId = targets.find(target => target.startsWith('image-question-'));

            // Find the elements in the DOM
            const collapsibleElement = document.getElementById(collapsibleId);
            const containerDivElement = document.getElementById(containerDivId);
            const containerButtonElement = document.getElementById(containerButtonId);
            const imageDivElement = document.getElementById(imageId);

            // Close the currently open question if it's not the current one
            if (currentlyOpen && currentlyOpen !== collapsibleElement) {
                currentlyOpen.style.display = 'none';

                const currentImageId = currentlyOpen.getAttribute('id').replace('question-', 'image-question-');
                const currentImageDiv = document.getElementById(currentImageId);
                if (currentImageDiv) {
                    const currentImgTag = currentImageDiv.querySelector('img');
                    if (currentImgTag) {
                        const rightArrow = '/assets/icons/right-arrow-green-noTail.svg';
                        const downArrow = '/assets/icons/upright-arrow-white-no-tail.svg';
                        currentImgTag.src = currentImgTag.src.includes(downArrow) 
                            ? currentImgTag.src.replace(downArrow, rightArrow) 
                            : currentImgTag.src.replace(rightArrow, downArrow);
                        currentImgTag.style.width = '';
                        currentImgTag.style.height = '';
                    }
                }

                currentImageDiv.style.backgroundColor = '';

                const currentContainerDiv = document.getElementById(currentImageId.replace('image-question-', 'container-item-question-'));
                if (currentContainerDiv) {
                    currentContainerDiv.style.backgroundColor = '';
                    currentContainerDiv.style.borderRadius = '';
                }

                const currentContainerButtonId = currentContainerDiv.id.replace('container-item-question-', 'container-question-button-');
                const currentContainerButtonElement = document.getElementById(currentContainerButtonId);

                if (currentContainerButtonElement) {
                    currentContainerButtonElement.style.paddingBottom = '25px';
                    currentContainerButtonElement.style.boxShadow = '0px 0px 60px 0px rgba(0, 0, 0, 0.05)';
                }
            }

            // Toggle the current collapsible element
            if (collapsibleElement) {
                const isVisible = collapsibleElement.style.display === 'block';
                collapsibleElement.style.display = isVisible ? 'none' : 'block';

                // Update the current open element tracker
                currentlyOpen = isVisible ? null : collapsibleElement;
            }

            // Toggle styles for the container div
            if (containerDivElement) {
                containerDivElement.style.borderRadius = collapsibleElement.style.display === 'block' ? '20px' : '';
                containerDivElement.style.backgroundColor = collapsibleElement.style.display === 'block' ? 'var(--contrast-color)' : '';
            }

            // Update the button's box shadow
            if (containerButtonElement) {
                containerButtonElement.style.boxShadow = collapsibleElement.style.display === 'block' ? 'none' : '';
                containerButtonElement.style.paddingBottom = collapsibleElement.style.display === 'block' ? '0' : '';
            }
            

            // Update the image source and styles
            if (imageDivElement) {
                imageDivElement.style.backgroundColor = collapsibleElement.style.display === 'block' ? 'var(--accent-color)' : '';
                const imgTag = imageDivElement.querySelector('img');
                if (imgTag) {
                    const currentSrc = imgTag.src;
                    const rightArrow = '/assets/icons/right-arrow-green-noTail.svg';
                    const downArrow = '/assets/icons/upright-arrow-white-no-tail.svg';

                    imgTag.src = currentSrc.includes(rightArrow) 
                        ? currentSrc.replace(rightArrow, downArrow)
                        : currentSrc.replace(downArrow, rightArrow);

                    imgTag.style.width = collapsibleElement.style.display === 'block' ? '16px' : '';
                    imgTag.style.height = collapsibleElement.style.display === 'block' ? '8px' : '';
                }
            }
        });
    });
});

</script>