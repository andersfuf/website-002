			<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>
				<?php if(!is_singular()) : ?>
				<header class="post-header">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</header>
				<?php endif; ?>
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
				<?php if ( get_theme_mod( 'blog_meta', 1 ) && ( 'post' == get_post_type() ) ) : ?>
					<!-- Post Meta -->
					<div class="post_meta">
						<span class="post_category"><i class="icon-bookmark"></i><?php the_category(', ') ?></span><span class="post_date"><i class="icon-calendar"></i><time datetime="<?php the_time('Y-m-d\TH:i:s'); ?>"><?php the_time('F j, Y'); ?></time></span><span class="post_author"><i class="icon-user"></i><?php the_author_posts_link() ?></span>
						<span class="post_comment"><i class="icon-comments"></i>
							<?php comments_popup_link(
								_x('No comments', 'Number of comments on a post.', 'booktheme'),
								_x('1 comment', 'Number of comments on a post', 'booktheme'),
								_x('% comments', 'Number of comments on a post. % is substituted by a number', 'booktheme'),
								'comments-link', ''
							); ?>
						</span>

						<span class="post_permalink"><i class="icon-link"></i><a href="<?php the_permalink(); ?>"><?php _e('Permalink', 'booktheme') ?></a></span>
						<?php if(is_singular()) : ?>
							<?php if ($tags = get_the_tag_list('', ', ', '.')) : ?>
							<div class="tags"><i class="icon-tag"></i><?php echo $tags; ?></div>
							<?php endif; ?>
						<?php endif; ?>
					</div>
					<!--// Post Meta -->
				<?php endif; ?>
			</article>