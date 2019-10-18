<?php get_header(); ?>
	<?php get_template_part('partials/title'); ?>
	<div class="container">
		<div class="row">
			<div id="content" class="span8 <?php echo get_theme_mod('layout_sidebarpos', 'right'); ?>">
				<?php if ( $tagdesc = tag_description() ) { echo $tagdesc; } ?>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'partials/post' ); ?>
					<?php endwhile; ?>
				<?php else: ?>
					 <p><?php _e( 'There are no posts with this tag.', 'booktheme' ); ?></p>
				<?php endif; ?>
			  <?php get_template_part( 'partials/post-nav' ); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>