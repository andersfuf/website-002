<?php

function book_customize_register( $wp_customize ) {
	class Comment_Control extends WP_Customize_Control {
		public $alone = false;

		public function render_content() {
		  $margin = ($this->alone) ? '' : 'margin-top: -1em;';
		?>
		  <p style="<?php echo $margin; ?>color: #999;"><?php echo $this->label ?></p>
		<?php
		}
	}

	class Image_Reloaded_Control extends WP_Customize_Image_Control {
		public function __construct( $manager, $id, $args = array() ) {
			parent::__construct( $manager, $id, $args );
		}

		public function tab_uploaded() {
			$my_context_uploads = get_posts( array(
			    'post_type'  => 'attachment',
			    'meta_key'   => '_wp_attachment_context',
			    'meta_value' => $this->context,
			    'orderby'    => 'post_date',
			    'nopaging'   => true,
			) );
		?>

		<div class="uploaded-target"></div>

		<?php
			if ( empty( $my_context_uploads ) )
			    return;
			foreach ( (array) $my_context_uploads as $my_context_upload )
			    $this->print_tab_image( esc_url_raw( $my_context_upload->guid ) );
		}
	}

/**
 * SITE TITLE AND TAG LINE
 */
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

/**
 * BLOG
 */
	$wp_customize->add_section( 'blog' , array(
	  'title'      => _x('Blog', 'Title for Customizer options on which components to use in the blog.', 'booktheme'),
	  'description' => __('Customize the blog.', 'booktheme'),
	  'priority'   => 21,
	) );

	require get_template_directory() . '/includes/customizer/blog.php';

/**
 * LAYOUT
 */
	$wp_customize->add_section( 'layout' , array(
	  'title'      => __('Layout','booktheme'),
	  'description' => __('Customize the layout.', 'booktheme'),
	  'priority'   => 22,
	) );

	require get_template_directory() . '/includes/customizer/layout.php';

/**
 * TYPOGRAPHY
 */
	$wp_customize->add_section( 'typo' , array(
	  'title'      => __('Typography','booktheme'),
	  'description' => __("Customize the site's typography.", 'booktheme'),
	  'priority'   => 26,
	) );

	require get_template_directory() . '/includes/customizer/typography.php';

/* SLIDESHOW */
	$wp_customize->add_section( 'slider' , array(
	  'title'      => __('Slideshow','booktheme'),
	  'description' => __('Customize the slideshow.', 'booktheme'),
	  'priority'   => 40,
	) );

	require get_template_directory() . '/includes/customizer/slideshow.php';

/* Logo */
	$wp_customize->add_section( 'logo' , array(
	  'title'      => __('Logo','booktheme'),
	  'description' => __('Logo settings.', 'booktheme'),
	  'priority'   => 40,
	) );

	require get_template_directory() . '/includes/customizer/logo.php';

}
add_action( 'customize_register', 'book_customize_register', 11 );

function book_customize_preview_js() {
	wp_enqueue_script( 'book-customizer',
						get_template_directory_uri() . '/assets/js/customizer.js',
						array( 'customize-preview' ),
						'2013-03-16-001',
						true );
}
add_action( 'customize_preview_init', 'book_customize_preview_js' );
