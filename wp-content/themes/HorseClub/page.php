<?php get_header(); ?>
	<?php get_template_part('partials/title'); ?>
	<?php $display_sidebar = (is_front_page()) ? (get_theme_mod('layout_sidebarhome', 1)) : true; ?>
	<div class="container">
		<div class="row">
			<div id="content" class="<?php echo ($display_sidebar) ? 'span9' : 'span12'; ?> right">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
				  	<article class="post-holder">
					<?php if(has_post_thumbnail()) {
						echo '<a href="'; the_permalink(); echo '">';
						echo '<figure class="featured-thumbnail thumbnail">'; the_post_thumbnail(); echo '</figure>';
						echo '</a>';
					} ?>
						<div id="page-content">
						  	<?php the_content(); ?>
						</div><!--#pageContent -->
				  	</article>
				</div><!--#post-# .post-->
			  	<?php endwhile; ?>
			</div><!--#content-->
			<?php if ($display_sidebar) { get_sidebar(); } ?>
	    </div><!--.row-->
	</div><!--.container-->
<?php get_footer(); ?>