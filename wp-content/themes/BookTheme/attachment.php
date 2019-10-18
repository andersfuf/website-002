<?php get_header(); ?>
<div class="container container_single_post">
    <div class="row">
        <div id="content" class="span12 clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="wrapper">
                <h1><?php the_title() ?></h1>
            <?php if ( wp_attachment_is_image() ): ?>
                <p class="attachment">
                    <a href="<?php echo wp_get_attachment_url() ?>">
                        <img src="<?php echo wp_get_attachment_url() ?>" />
                    </a>
                </p>
            <?php else: ?>
                <p>No preview available.</p>
            <?php endif; ?>

                <p><a href="<?php echo wp_get_attachment_url() ?>">Download</a></p>
            </div>
<?php endwhile; endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>