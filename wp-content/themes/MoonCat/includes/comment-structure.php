<?php function comment_structure($comment, $args, $depth) { ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>" class="clearfix">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
			<div class="wrapper">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment->comment_author_email, 65 ); ?>
					<?php printf(__('<span class="author">%1$s</span>' ), get_comment_author_link()) ?>
				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.', 'default') ?></em>
				<?php endif; ?>
				<div class="extra-wrap">
					<?php comment_text() ?>
				</div>
			</div>
			<div class="wrapper">
				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
				<div class="comment-meta commentmetadata"><?php echo get_comment_date() ?></div>
			</div>
		</div>
<?php }