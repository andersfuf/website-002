<?php get_header(); ?>
	<?php get_template_part('partials/title'); ?>
	<?php $display_sidebar = (is_home()) ? (get_theme_mod('layout_sidebarhome', 1)) : true; ?>
	<?php $display_sidebar = (get_option('show_on_front') === 'page') ? true : $display_sidebar; ?>
	<div class="container">
		<div class="row">
			<div id="content" class="<?php echo ($display_sidebar) ? 'span9' : 'span12'; ?> right">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part( 'partials/post' ); ?>
			<?php endwhile; else: ?>
				<div class="no-results">
					<?php echo '<p><strong>' . __('An error occurred.', 'booktheme') . '</strong></p>'; ?>
					<p>
						<?php
						echo str_replace(
							array('<', '>'),
							array('<a href="'.home_url().'">', '</a>'),
							_x( 'We apologize for any inconvenience, please <return to the home page> or use the search form below.',
								'< and > marks the start and end of the link to the frontpage.', 'booktheme')
						);
						?>
					</p>
					<?php get_search_form(); ?>
				</div>
			<?php endif; ?>
			<?php get_template_part('partials/post-nav'); ?>
			</div>
			<?php if ($display_sidebar) { get_sidebar(); } ?>
		</div>
	</div>
<?php get_footer(); ?>