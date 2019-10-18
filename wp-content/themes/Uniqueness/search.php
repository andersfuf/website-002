<?php get_header(); ?>
	<?php get_template_part('partials/title'); ?>
	<div class="container">
		<div class="row">
			<div id="content" class="span8 <?php echo get_theme_mod('layout_sidebarpos', 'right'); ?>">
				<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'partials/post' );
				endwhile; else: ?>
				<div class="no-results">
					<p><strong><?php _ex('There are no results.', 'No search results...', 'booktheme'); ?></strong></p>
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
				<?php endif; ?>
			<?php get_template_part('partials/post-nav'); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>