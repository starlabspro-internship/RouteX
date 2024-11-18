<?php
get_header();

$error_page = get_field("404", "options");
$error_message = $error_page['error_message'] ?? '';
$error_description = $error_page['error_description'] ?? '';
$error_404_image = $error_page['404_image'] ?? '';
?>

	<main id="primary" class="site-404">

		<?php 
			echo top_banner();
		?>
		<section class="section-404 top-bottom-small">
				<div class="title-404-container">
					<div class="title title-404">
						<?php echo esc_html($error_message); ?>
					</div>
				</div>

				<div class="textarea-404-container">
					<div class="textarea-404">
						<?php echo esc_html($error_description); ?>
					</div>
				</div>

				<div class="search-form-404-container">
					<form action="<?php echo esc_url(home_url('/search.php')); ?>" method="get" class="search-form-404">
						<input type="text" name="text" placeholder="Search Here"
							required>
						<button>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/search.svg" alt="Search icon">
						</button>
					</form>
				</div>

				<div class="backToHome-404-container">
					<a href="<?php echo esc_url(home_url('/')); ?>">
						<button class="backToHome-404">Back to Home</button>
					</a>
				</div>
				
				<div class="image-404-container">
					<img src="<?php echo esc_url($error_404_image)?>" alt="404 Image"/>
				</div>
		</section>

	</main>

<?php
get_footer();
