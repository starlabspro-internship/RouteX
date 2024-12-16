<?php 
get_header();
echo top_banner();

$reason_to_choose = get_field('reason_to_choose');
$categories = [];
if (have_rows('categories')) {
    while (have_rows('categories')): the_row();
        $categories[] = [
            'name' => get_sub_field('name'),
            'information' => get_sub_field('information'),
        ];
    endwhile;
}

$frequently_asked_questions = [];
if (have_rows('frequently_asked_questions')) :
    while (have_rows('frequently_asked_questions')) : the_row();
        $frequently_asked_questions[] = [
            'question' => get_sub_field('question'),
            'answer' => get_sub_field('answer'),
        ];
    endwhile;
endif;

$has_non_empty_faq_boolean = has_non_empty_cards($frequently_asked_questions);
$has_non_empty_categories_boolean = has_non_empty_cards($categories);

?>

<section class="visa-section top-bottom-small">
    <div class="row">
        <div class="col-lg-8">
            <h2 class="title visa-details-title"><?php the_title(); ?></h2>
            <div class="visa-details-text"><?php the_content(); ?></div>
            
            <?php if($reason_to_choose) : ?>
            <div class="visa-reason">
                <h3 class="visa-small-header">Why Choose <?php the_title(); ?>?</h3>
                <p class="visa-details-text"><?= esc_html($reason_to_choose); ?></p>
            </div>
            <?php endif ?>

            <?php if ($has_non_empty_categories_boolean): ?>
            <div>
                <?php foreach ($categories as $categorie): ?>
                <div class="visa-categories">
                    <p class="visa-category"><?= esc_html($categorie['name']); ?>:</p>
                    <p class="visa-category-reason"><?= esc_html($categorie['information']); ?></p>
                </div>
                <?php endforeach ?>
            </div>
            <?php endif ?>

            <div class="visa-faq">
                <h3 class="visa-small-header">Frequently Asked Questions</h3>
                <div class="questions-item">
                <?php
                    $index = 1;
                    foreach ($frequently_asked_questions as $question) {
                        if ($question['question'] || $question['answer']) : ?>
                            <div id="container-item-question-<?php echo $index; ?>" class="questions-item-container">
                                <?php if ($question['question']) : ?>
                                    <h2 id="container-question-<?php echo $index; ?>" style="<?php echo $index === 1 ? 'margin-top: 0;' : ''; ?>">
                                        <button id="container-question-button-<?php echo $index; ?>" class="question-toggle-button" data-target="image-question-<?php echo $index; ?> container-item-question-<?php echo $index; ?> question-<?php echo $index; ?> container-question-<?php echo $index; ?> container-question-button-<?php echo $index; ?>">
                                            <p class="question-title"><?php echo esc_html($question['question']); ?></p>
                                            <div>
                                                <div id="image-question-<?php echo $index; ?>" class="question-item-button-image">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/plus.svg" alt="plus">
                                                </div>
                                            </div>
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

        <div class="col-lg-4">
            <div class="sidebar">
                <ul class="continents-list list-group">
                    <?php 
                    $continents = ['Africa', 'Asia', 'Europe', 'North America', 'South America', 'Australia'];
                    $current_continent = isset($_GET['continent']) ? sanitize_text_field($_GET['continent']) : '';
    
                    foreach ($continents as $index => $continent) : ?>
                        <style> .continent-li{ border-bottom: 1px solid var(--light-color);} </style>
                        <li class="list-group-item continent-li <?php echo $current_continent === $continent ? 'active' : ''; ?>">
                            <a href="<?php echo add_query_arg('continent', $continent, get_post_type_archive_link('countries')); ?>" class="continent-link">
                                <?php echo esc_html($continent); ?>
                                <svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="continent-icon">
                                    <path d="M1.75 11.0195C1.50391 11.0195 1.28516 10.9375 1.12109 10.7734C0.765625 10.4453 0.765625 9.87109 1.12109 9.54297L4.86719 5.76953L1.12109 2.02344C0.765625 1.69531 0.765625 1.12109 1.12109 0.792969C1.44922 0.4375 2.02344 0.4375 2.35156 0.792969L6.72656 5.16797C7.08203 5.49609 7.08203 6.07031 6.72656 6.39844L2.35156 10.7734C2.1875 10.9375 1.96875 11.0195 1.75 11.0195Z" fill="#034833"/>
                                </svg>
                            </a>
                        </li>
                        <?php if ($index < count($continents) - 1): ?>
                        <style> .continent-li{ border-bottom:none } </style>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
    
                <?php
                $contact_information = get_field('contact_information', 'options');
                $phone_information = $contact_information['phone_information'] ?? null;   
                $phone_number = $phone_information['phone_number'] ?? null;  
                $phone_icon = $phone_information['phone_icon'] ?? null;  
    
                $address = $contact_information['address'] ?? null;
                $email = $contact_information['email'] ?? null;
    
                if ($phone_number || $address || $email) :
                ?>
                    <div class="contact-card">
                        <h3>GET IN TOUCH</h3>
                        
                        <div class="contact-phone-icon">
                            <div>
                                <?php $phone_icon_url = wp_get_attachment_image_url($phone_icon, 'contact-phone-icon-img'); ?>
                                <?php echo file_get_contents($phone_icon_url);?>
                            </div>
                        </div>

                        <p>
                            For fast service
                        </p>

                        <?php if ($phone_number) : ?>
                            <a href="wordpress/?page_id=798" class="contact-link">
                                <?php echo esc_attr($phone_number); ?>
                            </a> 
                        <?php endif; ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.question-toggle-button');
    let currentlyOpen = null;

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const targets = button.getAttribute('data-target').split(' ');

            const collapsibleId = targets.find(target => target.startsWith('question-'));
            const containerId = targets.find(target => target.startsWith('container-question-'));
            const containerButtonId = targets.find(target => target.startsWith('container-question-button-'));
            const containerDivId = targets.find(target => target.startsWith('container-item-question-'));
            const imageId = targets.find(target => target.startsWith('image-question-'));

            const collapsibleElement = document.getElementById(collapsibleId);
            const containerDivElement = document.getElementById(containerDivId);
            const containerButtonElement = document.getElementById(containerButtonId);
            const imageDivElement = document.getElementById(imageId);

            if (currentlyOpen && currentlyOpen !== collapsibleElement) {
                currentlyOpen.style.display = 'none';

                const currentImageId = currentlyOpen.getAttribute('id').replace('question-', 'image-question-');
                const currentImageDiv = document.getElementById(currentImageId);
                if (currentImageDiv) {
                    const currentImgTag = currentImageDiv.querySelector('img');
                    if (currentImgTag) {
                        const plus = '/assets/icons/plus.svg';
                        const minus = '/assets/icons/minus.svg';
                        currentImgTag.src = currentImgTag.src.includes(minus) 
                            ? currentImgTag.src.replace(minus, plus) 
                            : currentImgTag.src.replace(plus, minus);
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
                    currentContainerButtonElement.style.border = 'none';
                }      
            }

            if (collapsibleElement) {
                const isVisible = collapsibleElement.style.display === 'block';
                collapsibleElement.style.display = isVisible ? 'none' : 'block';

                currentlyOpen = isVisible ? null : collapsibleElement;
            }

            if (containerDivElement) {
                containerDivElement.style.borderRadius = collapsibleElement.style.display === 'block' ? '20px' : '';
                containerDivElement.style.boxShadow = collapsibleElement.style.display === 'block' ? '0px 0px 60px 0px rgba(0, 0, 0, 0.05)' : '';
            }

            if (containerButtonElement) {
                containerButtonElement.style.boxShadow = collapsibleElement.style.display === 'block' ? 'none' : '';
                containerButtonElement.style.border = collapsibleElement.style.display === 'block' ? '1px solid var(--light-color)' : '';
            }
            

            if (imageDivElement) {
                imageDivElement.style.backgroundColor = collapsibleElement.style.display === 'block' ? 'var(--accent-color)' : '';
                const imgTag = imageDivElement.querySelector('img');
                if (imgTag) {
                    const currentSrc = imgTag.src;
                    const plus = '/assets/icons/plus.svg';
                    const minus = '/assets/icons/minus.svg';

                    imgTag.src = currentSrc.includes(plus) 
                        ? currentSrc.replace(plus, minus)
                        : currentSrc.replace(minus, plus);

                    imgTag.style.width = collapsibleElement.style.display === 'block' ? '12px' : '';
                    imgTag.style.height = collapsibleElement.style.display === 'block' ? '12px' : '';
                }
            }
        });
    });
});

</script>
<?php get_footer(); ?>
