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

// Back to top arrow
$wp_customize->add_setting( 'layout_backtotop', array( 'default' => 1 ) );
$wp_customize->add_control( 'layout_backtotop', array(
	'label'    => __('Display \"Back to Top\" arrow.', 'booktheme'),
	'type'     => 'checkbox',
	'section'  => 'layout',
	'priority' => 22
) );

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

// Sidebar position
$wp_customize->add_setting( 'layout_sidebarpos', array( 'default' => 'right' ) );
$wp_customize->add_control( 'layout_sidebarpos', array(
	'label'    => __('Sidebar Position', 'booktheme'),
	'type'     => 'radio',
	'section'  => 'layout',
	'priority' => 60,
	'choices'  => array(
		'left'  => __('Left of main content', 'booktheme'),
		'right' => __('Right of main content', 'booktheme')
	),
) );
$wp_customize->add_setting( 'layout_sidebarpos_comment', array() );
$wp_customize->add_control( new Comment_Control( $wp_customize, 'layout_sidebarpos_comment', array(
	'label'    => __('This will not effect the front page.', 'booktheme'),
	'section'  => 'layout',
	'priority' => 61
) ) );