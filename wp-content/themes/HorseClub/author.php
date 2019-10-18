<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div id="content" class="span8 right">
				<?php
				if(isset($_GET['author_name'])) :
				  $curauth = get_userdatabylogin($author_name);
				  else :
				  $curauth = get_userdata(intval($author));
				endif;
				?>
				<div class="post-author post-author__page clearfix">
					<h1 class="post-author_h"><?php _e('About', 'default'); ?> <small><?php echo $curauth->display_name; ?></small></h1>
					<p class="post-author_gravatar">
					  <?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '65' ); } ?>
					</p>
					<?php if($curauth->description !="") : ?>
						<div class="post-author_desc">
							<?php echo $curauth->description; ?>
						</div>
					<?php endif; ?>
				</div><!--.post-author-->
				<div id="recent-author-posts">
					<h3><?php printf(_x('Recent posts by %s', '%s is substituted by an author name', 'booktheme'), $curauth->display_name); ?></h3>
					<?php
					if (have_posts()) : while (have_posts()) : the_post();
						get_template_part( 'partials/post' );
					 endwhile; else:
					 ?>
					 <div class="no-results">
						<?php echo '<p><strong>' . __('No posts found.', 'default') . '</strong></p>'; ?>
					</div><!--no-results-->
					<?php endif; ?>
				</div><!--#recentPosts-->
			  <?php get_template_part('partials/post-nav'); ?>
			</div><!--#content-->
			<?php get_sidebar(); ?>
		</div><!--.row-->
	</div><!--.container-->
<?php get_footer(); ?>