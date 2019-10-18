			<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>
				<header class="post-header">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<!-- Post Content -->
				<div class="post_meta">
					<span class="post_date"><time datetime="<?php the_time('Y-m-d\TH:i:s'); ?>"><b><?php the_time('M'); ?></b> <?php the_time('d'); ?></time></span>
				<?php if ( get_theme_mod( 'blog_meta', 1 ) && ( 'post' == get_post_type() ) ) : ?>
					<span class="post_author hidden-phone"><?php _ex('By', 'As in: "By H.C. Andersen"', 'booktheme'); ?> <?php the_author_posts_link() ?></span>
					<span class="post_category hidden-phone"><?php _ex('Posted in ', 'Posted in News (It\'s followed by a category name', 'booktheme'); ?> <?php the_category(', ') ?></span>
					<span class="post_comment hidden-phone"><?php _e('With', 'booktheme'); ?>
						<?php comments_popup_link(
								_x('No comments', 'Number of comments on a post.', 'booktheme'),
								_x('1 comment', 'Number of comments on a post', 'booktheme'),
								_x('% comments', 'Number of comments on a post. % is substituted by a number', 'booktheme'),
								'comments-link', ''
							); ?>
					</span>
				<?php endif; ?>
				</div>
				<!--// Post Content -->
			</header>
				<?php get_template_part('partials/post-thumb'); ?>
				<?php if(!is_singular()) : ?>
					<div class="post_content">
						<div class="excerpt">
							<?php
							if ( is_home() && get_theme_mod( 'blog_excerpt', 0) ):
								the_content('');
							else:
								the_excerpt();
							endif;
							?>
						</div>
					</div>
				<?php else :?>
					<div class="post_content">
						<?php the_content(''); ?>
					</div>
				<?php endif; ?>
				<?php edit_post_link(__('Edit This', 'default'), '<p style="text-align: right;">', '</p>'); ?>
			</article>