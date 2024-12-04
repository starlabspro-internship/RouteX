<div class="search-form-404-container">
	<form action="/RouteX" method="get" class="search-form-404">
		<input type="text" name="s" placeholder="Search Here" value="<?php the_search_query(); ?>"
		required>
		<button type="submit">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/search.svg" alt="Search icon">
		</button>
	</form>
</div>