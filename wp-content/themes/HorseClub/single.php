<?php get_header(); ?>
<?php get_template_part('partials/title'); ?>
<div class="container container_single_post">
	<div class="row">
		<div id="content" class="span8 right clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="wrapper">
				<?php get_template_part( 'partials/post' ); ?>
			</div>
		<?php if ( get_theme_mod( 'blog_authorbio', 1 ) ) : ?>
	      	<div class="post-author clearfix">
	        	<h3 class="post-author_h"><?php _e('Written by', 'booktheme'); ?> <?php the_author_posts_link() ?></h3>
	        	<p class="post-author_gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); } ?></p>
	        	<div class="post-author_desc">
	          	<?php the_author_meta('description') ?>
	          		<div class="post-author_link">
	            		<p><?php _e('View all posts by:', 'booktheme') ?> <?php the_author_posts_link() ?></p>
	          		</div>
	        	</div>
	       	</div>
		<?php endif; ?>
			<?php get_template_part( 'partials/related-posts' ); ?>
			<?php comments_template(); ?>
<?php endwhile; endif; ?>
		</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>