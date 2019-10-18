<?php


if ( defined( 'LOCAL_ENV' ) ) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    if( ! is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
    	define( 'ACF_LITE' , true );
        require get_template_directory() . '/advanced-custom-fields/acf.php';
    }
} else {
	define( 'ACF_LITE' , true );
    require get_template_directory() . '/advanced-custom-fields/acf.php';
}

function slideshow_register() {
	$labels = array(
		'name' => __('Slideshow', 'booktheme'),
		'singular_name' => __('Slide', 'booktheme'),
		'add_new' => __('Add New', 'booktheme'),
		'add_new_item' => __('Add New Slide', 'booktheme'),
		'edit_item' => __('Edit Slide', 'booktheme'),
		'new_item' => __('New Slide', 'booktheme'),
		'view_item' => __('View Slide', 'booktheme'),
		'search_items' => __('Search Slides', 'booktheme'),
		'not_found' =>  __('Nothing found', 'booktheme'),
		'not_found_in_trash' => __('Nothing found in Trash', 'booktheme'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => false,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'menu_icon' => get_template_directory_uri() . '/assets/images/icon_slides.png',
		'supports' => array('title'),
		'rewrite' => array('slug' => 'slideshow', 'with_front' => FALSE)
		);
		register_post_type( 'slideshow' , $args );
}
add_action('init', 'slideshow_register');


function slideshow_activation_hook() {
//	add_theme_support( 'post-thumbnails', array( 'slideshow',  ) );
	add_image_size('slideshow', 991, 470, true);
}
add_action('after_setup_theme', 'slideshow_activation_hook');

// To remove "View Post" links from Slideshow
add_filter('post_updated_messages', 'slide_updated_messages');
function slide_updated_messages( $messages ) {

	global $post_ID, $post;

	$messages['slideshow'] = array(
		1 => sprintf( __('Post updated. <a href="%s">View post</a>'), esc_url( get_permalink($post_ID) ) . '" style="display:none;' ),
	 	6 => sprintf( __('Post published. <a href="%s">View post</a>'), esc_url( get_permalink($post_ID) ) . '" style="display:none;' ),
	 	8 => sprintf( __('Post submitted. <a target="_blank" href="%s">Preview post</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) . '" style="display:none;' ),
	 	9 => sprintf( __('Post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview post</a>'),
			 // translators: Publish box date format, see http://php.net/date
			 date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) . '" style="display:none;' ),
		10 => sprintf( __('Post draft updated. <a target="_blank" href="%s">Preview post</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) . '" style="display:none;' ),

	);

	return $messages;
}

/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_slideshow-fields',
		'title' => __('Slide', 'booktheme'),
		'fields' => array (
			array (
				'key' => 'field_51a4783ce1a01',
				'label' => __('Slide Image', 'booktheme'),
				'name' => 'slide_image',
				'type' => 'image',
				'instructions' => __('This is the image that will be shown on your slide.', 'booktheme'),
				'required' => 1,
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
			),
			array (
				'post_type' => array (
					0 => 'post',
					1 => 'page',
				),
				'multiple' => 0,
				'allow_null' => 0,
				'key' => 'field_51a47869e1a02',
				'label' => __('Link to...', 'booktheme'),
				'name' => 'link_to',
				'type' => 'page_link',
				'instructions' => __('Which page or post to link to.', 'booktheme'),
				'required' => 1,
			),
			array (
				'key' => 'field_51a4788ee1a03',
				'label' => __('Caption', 'booktheme'),
				'name' => 'caption',
				'type' => 'text',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'slideshow',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'slug',
				7 => 'author',
				8 => 'format',
				9 => 'featured_image',
				10 => 'categories',
				11 => 'tags',
				12 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}