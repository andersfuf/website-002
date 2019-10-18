<?php

//Loading theme textdomain
load_theme_textdomain( 'booktheme', get_template_directory() . '/languages' );

// Setting maximum content-width
if ( ! isset( $content_width ) ) $content_width = 770;

// Add support for feeds
add_theme_support( 'automatic-feed-links' );

// Add support for post-thumbnails
add_theme_support( 'post-thumbnails' );

// Add Customize link to Theme panel
function menu_theme_customize() {
    add_theme_page(__('Customize'), __('Customize'), 'edit_theme_options', 'customize.php');
}
add_action('admin_menu', 'menu_theme_customize');

// Setup navigation
function _setup() {

  // Register menu
  register_nav_menus( array( 'header' => __( 'Primary Menu', 'booktheme' ) ) );

}
add_action( 'after_setup_theme', '_setup' );

// Output script url - for conditional stylesheets
function _get_script_url($key) {
    global $wp_scripts;
    return $wp_scripts->registered[$key]->src;
}

// Excerpt:
function new_excerpt_more( $more ) { return '...'; }
add_filter('excerpt_more', 'new_excerpt_more');
function custom_excerpt_length( $length ) { return 90; }
add_filter( 'excerpt_length', 'custom_excerpt_length' );

// Filter this out later:
function remove_invalid_tags($str, $tags) 
{
    foreach($tags as $tag)
    {
        $str = preg_replace('#^<\/'.$tag.'>|<'.$tag.'>$#', '', trim($str));
    }

    return $str;
}

/**
 * Brand Color Defaults
 */
if (!function_exists('_custom_css_defaults')):
    function _custom_css_defaults() {
        return array(
            'tint1' => '#323249',
            'tint2' => '#15a1b2',
            'tint3' => '#36828a',
            'tint4' => '#9dd4db',
        );
    }
endif;

/**
 * Includes
 */
require get_template_directory() . '/includes/assets.php';
require get_template_directory() . '/includes/customizer.php';
require get_template_directory() . '/includes/customcss.php';

require get_template_directory() . '/includes/shortcodes.php';

require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/breadcrumps.php';
require get_template_directory() . '/includes/pagination.php';
require get_template_directory() . '/includes/comment-structure.php';
require get_template_directory() . '/includes/slideshow.php';
