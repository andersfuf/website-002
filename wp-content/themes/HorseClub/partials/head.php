<div id="main" class="main-holder"><!-- this encompasses the entire Web site -->
	<div class="container-bg">
		<header id="header" class="header">
			<div class="container">

				<!-- BEGIN LOGO -->
				<div class="logo pull-left">
				<?php if ( !get_theme_mod( 'logo_image', '' ) ) : ?>
					<?php if ( is_front_page() || is_home() || is_404() ) : ?>
							<h1 class="logo_h logo_h__txt">
								<a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>" class="logo_link">
									<?php bloginfo('name'); ?>
								</a>
							</h1>
					<?php else: ?>
							<h2 class="logo_h logo_h__txt">
								<a href="<?php echo home_url(); ?>/" title="<?php bloginfo('description'); ?>" class="logo_link">
									<?php bloginfo('name'); ?>
								</a>
							</h2>
					<?php endif; ?>
				<?php else: /* Image logo */ ?>
					<a href="<?php echo home_url(); ?>/" class="logo_h logo_h__img">
						<img src="<?php echo get_theme_mod( 'logo_image', '' ); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('description'); ?>">
					</a>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'logo_tagline', 1 ) ) : ?>
				<!-- Site Tagline -->
				<p class="logo_tagline"><?php bloginfo('description'); ?></p>
				<?php endif; ?>
				</div>
				<!-- END LOGO -->
				<div class="clear"></div>	

					<div class="row-top clearfix">
					<!-- BEGIN MAIN NAVIGATION -->
					<nav class="nav nav__primary clearfix">
						<?php
						function fallback_nav_head($args) {
							echo '<ul class="'.$args['menu_class'].'" id="'.$args['menu_id'].'">';
							wp_list_pages($args);
							echo '</ul>';
						}
						wp_nav_menu( array(
							'container'       => 'ul',
							'menu_class'      => 'sf-menu',
							'menu_id'         => 'topnav',
							'depth'           => 3,
							'theme_location'  => 'header',
							'fallback_cb'     => 'fallback_nav_head',
							'sort_column'     => 'menu_order',
							'title_li'        => false
						) ); ?>
					</nav>
					<!-- END MAIN NAVIGATION -->

					<!-- BEGIN SEARCH FORM -->
						<div class="search-form search-form__h hidden-phone clearfix">
						<?php  if ( get_theme_mod('layout_searchbox', 1) ) : ?>
							<form id="search-header" class="navbar-form pull-right" method="get" action="<?php echo home_url(); ?>/" accept-charset="utf-8">
								<input type="text" name="s" placeholder="<?php _e('Search', 'default'); ?>" class="search-form_it">
								<input type="submit" value="<?php _ex('Go', 'Button text next to the search box in the header.', 'booktheme'); ?>" id="submit" class="search-form_is btn btn-primary">
							</form>
						<?php endif; ?>
						</div>
					<!-- END SEARCH FORM -->
				</div>

			</div><!--.container-->
		</header>
	<?php  if( is_front_page() ) { ?>
		<div id="slider-wrapper" class="slider">
			<div class="container">
				<div class="camera-inside"><?php get_template_part('partials/slider'); ?></div>
			</div>
		</div><!-- .slider -->
	<?php } ?>
	<div class="content-holder clearfix">
		<div class="content-container">
