<?php
// Breadcrumbs
$wp_customize->add_setting( 'layout_breadcrumbs', array( 'default' => 1 ) );
$wp_customize->add_control( 'layout_breadcrumbs', array(
	'label'    => __('Display breadcrumbs', 'booktheme'),
	'type'     => 'checkbox',
	'section'  => 'layout',
	'priority' => 10
) );

// Search box
$wp_customize->add_setting( 'layout_searchbox', array( 'default' => 1 ) );
$wp_customize->add_control( 'layout_searchbox', array(
	'label'    => __('Display Search Box in the Header', 'booktheme'),
	'type'     => 'checkbox',
	'section'  => 'layout',
	'priority' => 20
) );
$wp_customize->add_setting( 'layout_searchbox_comment', array() );
$wp_customize->add_control( new Comment_Control( $wp_customize, 'layout_searchbox_comment', array(
	'label'    => __('You can also add a search box to the sidebar.', 'booktheme'),
	'section'  => 'layout',
	'priority' => 21
) ) );

// Sidebar on frontpage
$wp_customize->add_setting( 'layout_sidebarhome', array( 'default' => 1 ) );
$wp_customize->add_control( 'layout_sidebarhome', array(
	'label'    => __('Display sidebar on the front page', 'booktheme'),
	'type'     => 'checkbox',
	'section'  => 'layout',
	'priority' => 40
) );

$wp_customize->add_setting( 'layout_sidebarhome_comment', array() );
$wp_customize->add_control( new Comment_Control( $wp_customize, 'layout_sidebarhome_comment', array(
	'label'    => _x('It will still be available on subpages.', '"Display Sidebar on the Frontpage"', 'booktheme'),
	'section'  => 'layout',
	'priority' => 41
) ) );