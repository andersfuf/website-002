<?php get_header(); ?>
<div class="container container_single_post">
    <div class="row">
        <div id="content" class="span12 clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <div class="wrapper">
                <h1><?php the_title() ?></h1>

                <nav class="image-navigation" role="navigation">
                    <span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'twentytwelve' ) ); ?></span>
                    <span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'twentytwelve' ) ); ?></span>
                </nav>

                <div class="image-attachment">
                    <a href="<?php echo wp_get_attachment_url() ?>">
                        <img src="<?php echo wp_get_attachment_url() ?>" />
                    </a>
                </div>
                
                <?php if ( ! empty( $post->post_excerpt ) ) : ?>
                    <div class="image-attachment-caption">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>

                <nav class="image-navigation" role="navigation">
                    <span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'twentytwelve' ) ); ?></span>
                    <span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'twentytwelve' ) ); ?></span>
                </nav>
            </div>

<?php endwhile; endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>