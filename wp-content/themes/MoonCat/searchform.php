<div class="search-form">
	<form id="searchform" method="get" action="<?php echo home_url(); ?>" accept-charset="utf-8">
		<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="search-form_it" placeholder="<?php _e('Search', 'default'); ?>" >
		<input type="submit" value="<?php _e('Search', 'default'); ?>" id="search-submit" class="search-form_is btn btn-primary">
	</form>
</div>