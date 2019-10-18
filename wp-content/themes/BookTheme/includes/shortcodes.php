<?php
// Tiny MCE Plugin
class TinyMCE_Shortcodes {
    function __construct () {
        add_action( 'admin_init', array( $this, 'init' ) );
    }

    function init() {
        if ( ( current_user_can( 'edit_posts' ) || current_user_can( 'edit_pages' ) ) && get_user_option('rich_editing') == 'true' )  {
            $plugin_url = get_template_directory_uri().'/includes/shortcodes/tinymce';

            add_filter( 'mce_buttons', array( $this, 'filter_mce_buttons' ) );
            add_filter( 'mce_external_plugins', array( $this, 'filter_mce_external_plugins' ) );
        }
    }

    function filter_mce_buttons( $buttons ) {
        array_push( $buttons, '|', 'shortcodes_button' );
        return $buttons;
    }

    function filter_mce_external_plugins( $plugins ) {
        $plugins['MyThemeShortcodes'] = get_template_directory_uri().'/assets/js/tinymce.plugin.js?v=2013-03-12-001';
        return $plugins;
    }
}

$TinyMCE_Shortcodes = new TinyMCE_Shortcodes();

// Grid Columns
function grid_column($atts, $content=null, $shortcodename ="")
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="'.$shortcodename.'">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('span1', 'grid_column');
add_shortcode('span2', 'grid_column');
add_shortcode('span3', 'grid_column');
add_shortcode('span4', 'grid_column');
add_shortcode('span5', 'grid_column');
add_shortcode('span6', 'grid_column');
add_shortcode('span7', 'grid_column');
add_shortcode('span8', 'grid_column');
add_shortcode('span9', 'grid_column');
add_shortcode('span10', 'grid_column');
add_shortcode('span11', 'grid_column');
add_shortcode('span12', 'grid_column');


// Fluid Columns
// one_half
function one_half_column($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="span6">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('one_half', 'one_half_column');

// one_third
function one_third_column($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="span4">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('one_third', 'one_third_column');

// two_third
function two_third_column($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="span8">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('two_third', 'two_third_column');

// one_fourth
function one_fourth_column($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="span3">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('one_fourth', 'one_fourth_column');

// three_fourth
function three_fourth_column($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="span9">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('three_fourth', 'three_fourth_column');

// one_sixth
function one_sixth_column($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="span2">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('one_sixth', 'one_sixth_column');

// five_sixth
function five_sixth_column($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="span10">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('five_sixth', 'five_sixth_column');

function row_shortcode($atts, $content=null)
{
    //remove wrong nested <p>
    $content = remove_invalid_tags($content, array('p'));

    // add divs to the content
    $return = '<div class="row-fluid">';
    $return .= do_shortcode($content);
    $return .= '</div>';

    return $return;
}
add_shortcode('row', 'row_shortcode');