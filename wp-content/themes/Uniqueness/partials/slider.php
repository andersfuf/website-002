<?php query_posts("post_type=slideshow&posts_per_page=-1&post_status=publish&orderby=name&order=ASC");

if (have_posts()):

    wp_enqueue_script('cherry-js-camera'); 
?>
<script type="text/javascript">
    jQuery(window).load(function() {
        jQuery(function(){
            jQuery('#camera').camera({
                alignment           : 'topCenter', //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
                autoAdvance         : <?php echo (get_theme_mod('slider_autoplay', 1)) ? 'true' : 'false'; ?>,   //true, false
                mobileAutoAdvance   : true, //true, false. Auto-advancing for mobile devices
                barDirection        : 'leftToRight',    //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
                barPosition         : 'top',    //'bottom', 'left', 'top', 'right'
                cols                : 12,
                easing              : 'easeOutQuad',  //for the complete list http://jqueryui.com/demos/effect/easing.html
                mobileEasing        : '',   //leave empty if you want to display the same easing on mobile devices and on desktop etc.
                fx                  : '<?php echo get_theme_mod('slider_effect', 'simpleFade'); ?>',    
                //'random'
                // 'simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft',
                // 'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft',
                // 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom'
                // 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 
                // 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 
                // 'bottomLeftTopRight', 'bottomLeftTopRight'
                                                //you can also use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'
                mobileFx            : '',   //leave empty if you want to display the same effect on mobile devices and on desktop etc.
                gridDifference      : 250,  //to make the grid blocks slower than the slices, this value must be smaller than transPeriod
                height              : '47.4%', //here you can type pixels (for instance '300px'), a percentage (relative to the width of the slideshow, for instance '50%') or 'auto'
                imagePath           : 'images/',    //he path to the image folder (it serves for the blank.gif, when you want to display videos)
                loader              : 'pie',    //pie, bar, none (even if you choose "pie", old browsers like IE8- can't display it... they will display always a loading bar)
                loaderColor         : '#fdfdfd',
                loaderBgColor       : '#656565',
                loaderOpacity       : 0.8,    //0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
                loaderPadding       : 15,    //how many empty pixels you want to display between the loader and its background
                loaderStroke        : 3,    //the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
                minHeight           : '147px',  //you can also leave it blank
                navigation          : <?php echo (get_theme_mod('slider_shownav', 1)) ? 'true' : 'false'; ?>, //true or false, to display or not the navigation buttons
                navigationHover     : true,    //if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always
                pagination          : false,
                playPause           : false,   //true or false, to display or not the play/pause buttons
                pieDiameter         : 33,
                piePosition         : 'rightTop',   //'rightTop', 'leftTop', 'leftBottom', 'rightBottom'
                portrait            : false, //true, false. Select true if you don't want that your images are cropped
                rows                : 8,
                slicedCols          : 12,
                slicedRows          : 8,
                thumbnails          : false,
                time                : <?php echo get_theme_mod('slider_delay', 7000) ?>,   //milliseconds between the end of the sliding effect and the start of the next one
                transPeriod         : 1500, //lenght of the sliding effect in milliseconds
 
                ////////callbacks
 
                onEndTransition     : function() {  },  //this callback is invoked when the transition effect ends
                onLoaded            : function() {  },  //this callback is invoked when the image on a slide has completely loaded
                onStartLoading      : function() {  },  //this callback is invoked when the image on a slide start loading
                onStartTransition   : function() {  }   //this callback is invoked when the transition effect starts
            });
        });
    });
</script>

<div id="camera" class="camera_wrap">
<?php

    while ( have_posts() ) : the_post();
    
        $custom = get_post_custom();

        $url = get_permalink( $custom['link_to'][0] );
        $image_url = wp_get_attachment_image_src( $custom['slide_image'][0], 'slideshow' );
        $image_url = $image_url[0];
        $caption = $custom['caption'][0];

        $slide  = '<div data-src="' . $image_url . '" data-link="' .$url  .'">';
        $slide .= ( $caption ) ? '<div class="camera_caption move_from_bottom">'.stripslashes(htmlspecialchars_decode($caption)).'</div>' : '';
        $slide .= '</div>';

        echo $slide;
        if ( $wp_query->post_count == 1 ) echo $slide;

    endwhile;
?>
</div>
<?php
endif;
wp_reset_query(); ?>