<?php if(!is_singular()) : ?>
	<?php if(has_post_thumbnail()) : ?>
		<?php $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' ); ?>
		<figure class="featured-thumbnail thumbnail">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo $img_url[0]; ?>" width="<?php echo $img_url[1]; ?>" height="<?php echo $img_url[2]; ?>" alt="<?php the_title(); ?>" />
			</a>
		</figure>
	<?php endif; ?>
<?php else :?>
	<?php if(has_post_thumbnail()) : ?>
		<figure class="featured-thumbnail thumbnail"><?php the_post_thumbnail(); ?></figure>
	<?php endif; ?>
<?php endif; ?>