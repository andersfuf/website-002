<?php
if ( get_theme_mod( 'blog_related', 1 ) ) :
	$tags = wp_get_post_tags($post->ID);
	if ($tags) :
		$tag_ids = array();
		foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
		$related_query = new WP_Query(array('tag__in' => $tag_ids, 'post__not_in' => array($post->ID), 'showposts' => 4, 'ignore_sticky_posts' => 1));
		if ($related_query->have_posts()) :	?>
		<div class="related-posts">
			<h3 class="related-posts_h"><?php _e( 'Related Posts', 'booktheme' );?></h3>
			<ul class="related-posts_list clearfix">
				<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
					<li class="related-posts_item">
						<?php if(has_post_thumbnail()): ?>
							<?php $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail'); ?>
							<figure class="thumbnail featured-thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<img src="<?php echo $img_url[0]; ?>" width="<?php echo $img_url[1]; ?>" height="<?php echo $img_url[2]; ?>" alt="<?php the_title(); ?>" />
								</a>
							</figure>
						<?php else: ?>
							<figure class="thumbnail featured-thumbnail">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/legacy/cherry/images/empty_thumb.gif" alt="<?php the_title(); ?>" /></a>
							</figure>
						<?php endif; ?>
						<a href="<?php the_permalink() ?>" > <?php the_title();?> </a>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
		<?php
		endif;
		wp_reset_query();
	endif;
endif;