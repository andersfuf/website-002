<?php get_header(); ?>
<div class="container">
	<div id="content">
		<div class="row error404-holder">
			<div class="span7 error404-holder_num">404</div>
			<div class="span5">
				<hgroup>
				<h1><?php _e('Sorry!', 'booktheme'); ?></h1>
				<h2><?php _e('Page Not Found', 'booktheme'); ?></h2>
			  </hgroup>
			  <h4><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'booktheme'); ?></h4>
			  <p>
				<?php
				echo str_replace(
					array('<', '>'),
					array('<a href="'.home_url().'">', '</a>'),
					_x(	'<Return to the home page> or use the search form below.',
						'< and > marks the start and end of the link to the frontpage.', 'booktheme')
				);
				?>
		 	  </p>
			  <?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
