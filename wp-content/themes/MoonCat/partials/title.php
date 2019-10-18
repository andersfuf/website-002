<section class="title-section">
	<div class="container">
		<h1 class="title-header">
			<?php
			if(is_home()){
				echo get_theme_mod('blog_title', __( 'Blog', 'booktheme' ));
			} elseif ( is_category() ) {
				printf( _x( 'Category Archives: %s', '%s is a placeholder for the Category name', 'booktheme' ), single_cat_title( '', false ) );
			} elseif ( is_search() ) {
				_ex('Search for:', 'After the colon the search query will be shown.', 'booktheme');
				echo ' "';
				the_search_query();
				echo '"';
			} elseif ( is_day() ) {
				printf( _x( 'Daily Archives: %s', '%s is a placeholder for the date.', 'booktheme' ), get_the_date() );
			} elseif ( is_month() ) {
				printf( _x( 'Monthly Archives: %s', '%s is a placeholder for the month name.', 'booktheme' ), get_the_date('F Y') );
			} elseif ( is_year() ) {
				printf( _x( 'Yearly Archives: %s', '%s is a placeholder for the year number.', 'booktheme' ), get_the_date('Y') );
			} elseif ( is_tag() ) {
				printf( _x( 'Tag Archives: %s', '%s is a placeholder for the tag name.', 'booktheme' ), single_tag_title( '', false ) );
			} else {
				if (have_posts()) : while (have_posts()) : the_post();
					the_title();
				endwhile; endif;
				wp_reset_query();
			} ?>
		</h1>
		<?php if ( get_theme_mod( 'layout_breadcrumbs', 1 ) ) : ?>
			<?php breadcrumbs(); ?>
		<?php endif; ?>
	</div>
</section>