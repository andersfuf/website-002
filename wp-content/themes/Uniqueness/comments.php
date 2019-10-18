<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) {
		echo '<p class="nocomments">' . __('This post is password protected. Enter the password to view comments.', 'default') . '</p>';
		return;
	}
?>
<!-- BEGIN Comments -->
	<?php if ( have_comments() ) : ?>
		<div class="comment-holder">
			<h3 class="comments-h">
				<?php printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'default' ), number_format_i18n( get_comments_number() ), '"' . get_the_title() . '"' );?>
			</h3>
			<ol class="comment-list">
				<?php wp_list_comments('type=comment&callback=comment_structure'); ?>
			</ol>
		</div>
	<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<?php wp_enqueue_script('comment-reply') ?>
			<!-- If comments are open, but there are no comments. -->
	   <?php echo '<p class="nocomments">' . __('No comments yet.', 'default') . '</p>'; ?>
		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
	   <?php echo '<p class="nocomments">' . __('Comments are closed.', 'default') . '</p>'; ?>

		<?php endif; ?>

	<?php endif; ?>


	<?php if ( comments_open() ) : ?>

	<div id="respond">

	<h3><?php comment_form_title( __('Leave a Comment', 'default')); ?></h3>

	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>

		<p><?php
			printf(
				__('You must be <a href="%s">logged in</a> to post a comment.'),
				wp_login_url( get_permalink() )
			);
		?></p>

	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>

		<p><?php
			printf(
				__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out &raquo;</a>'),
				get_option('siteurl').'/wp-admin/profile.php',
				$user_identity,
				wp_logout_url(get_permalink())
			);
		?></p>

	<?php else : ?>

	<p class="field"><input type="text" name="author" id="author" value="<?php _e('Name', 'default'); ?><?php if ($req) echo '*'; ?>" onfocus="if(this.value=='<?php _e('Name', 'default'); ?><?php if ($req) echo '*'; ?>'){this.value=''}" onblur="if(this.value==''){this.value='<?php _e('Name', 'default'); ?><?php if ($req) echo '*'; ?>'}" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>

	<p class="field"><input type="text" name="email" id="email" value="<?php _e('Mail (will not be published)', 'default'); ?><?php if ($req) echo '*'; ?>" onfocus="if(this.value=='<?php _e('Mail (will not be published)', 'default'); ?><?php if ($req) echo '*'; ?>'){this.value=''}" onblur="if(this.value==''){this.value='<?php _e('Mail (will not be published)', 'default'); ?><?php if ($req) echo '*'; ?>'}" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>

	<p class="field"><input type="text" name="url" id="url" value="<?php _e('Website', 'default'); ?>" onfocus="if(this.value=='<?php _e('Website', 'default'); ?>'){this.value=''}" onblur="if(this.value==''){this.value='<?php _e('Website', 'default'); ?>'}" size="22" tabindex="3" /></p>

	<?php endif; ?>

	<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

	<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" onfocus="if(this.value=='<?php _e('Your Comment', 'default'); ?>'){this.value=''}" onblur="if(this.value==''){this.value='<?php _e('Your Comment', 'default'); ?>'}"><?php _e('Your Comment', 'default'); ?></textarea></p>

	<p><input name="submit" type="submit" class="btn btn-primary" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'default'); ?>" />
	<?php comment_id_fields(); ?>
	</p>
	<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	</div>
<!-- END Comments -->

<?php endif; ?>
