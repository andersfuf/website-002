<aside id="sidebar" class="sidebar span3">
	<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
		<div id="sidebar-search" class="widget">
			<h3><?php echo _x('Search', 'Title of Search Placeholder Widget', 'booktheme'); ?></h3>
			<?php get_search_form(); ?>
		</div>
		<div id="sidebar-nav" class="widget menu">
			<h3><?php echo _x('Navigation', 'Title of Navigation Placeholder Widget', 'booktheme'); ?></h3>
			<?php wp_nav_menu( array('menu' => 'Sidebar Menu' )); ?>
		</div>
		<div id="sidebar-archives" class="widget">
			<h3><?php echo _x('Archives', 'Title of Archives Placeholder Widget', 'booktheme'); ?></h3>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</div>
		<div id="sidebar-meta" class="widget">
			<h3><?php echo __('Meta', 'Title of Meta Placeholder Widget', 'booktheme'); ?></h3>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<?php wp_meta(); ?>
			</ul>
		</div>
	<?php endif; ?>
</aside><!--sidebar-->