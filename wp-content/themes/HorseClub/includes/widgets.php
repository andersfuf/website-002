<?php
function _widgets_init() {
	// Sidebar Widget. Location: the sidebar
	register_sidebar(array(
		'name'          => 'Sidebar',
		'id'            => 'main-sidebar',
		'description'   => __( 'Located beside the content.', 'Sidebar location.', 'booktheme'),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
	// Footer Widget. Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'          => 'Footer Right',
		'id'            => 'footer-sidebar-right',
		'description'   => __( 'Located at the bottom of pages.', 'Footer Right Sidebar Location', 'booktheme'),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
	// Footer Widget Left. Location: at the top of the footer, above the copyright
	register_sidebar(array(
		'name'          => 'Footer Left',
		'id'            => 'footer-sidebar-left',
		'description'   => __( 'Located at the bottom of pages.', 'Footer Left Sidebar Location', 'booktheme'),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action( 'widgets_init', '_widgets_init' );