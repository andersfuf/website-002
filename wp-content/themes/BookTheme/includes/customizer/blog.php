<?php
$wp_customize->add_setting( 'blog_meta', array( 'default' => 1 ) );
$wp_customize->add_control( 'blog_meta', array(
	'label'    => __('Show post metadata', 'booktheme'),
	'type'     => 'checkbox',
	'section'  => 'blog',
	'priority' => 10,
) );

$wp_customize->add_setting( 'blog_related', array( 'default' => 1 ) );
$wp_customize->add_control( 'blog_related', array(
	'label'    => __('Show related posts based on tags.', 'booktheme'),
	'type'     => 'checkbox',
	'section'  => 'blog',
	'priority' => 20,
) );
$wp_customize->add_setting( 'blog_related_comment', array( ) );
$wp_customize->add_control( new Comment_Control( $wp_customize, 'blog_related_comment', array(
	'label'    => __('It will only be visible for tagged posts that have related posts.', 'booktheme'),
	'section'  => 'blog',
	'priority' => 21,
) ) );

$wp_customize->add_setting( 'blog_authorbio', array( 'default' => 1 ) );
$wp_customize->add_control( 'blog_authorbio', array(
	'label'    => __('Show author biography on posts.', 'booktheme'),
	'type'     => 'checkbox',
	'section'  => 'blog',
	'priority' => 30,
) );
$wp_customize->add_setting( 'blog_authorbio_comment', array( ) );
$wp_customize->add_control( new Comment_Control( $wp_customize, 'blog_authorbio_comment', array(
	'label'    => __('Only visible when looking at posts.', 'booktheme'),
	'section'  => 'blog',
	'priority' => 31,
) ) );

$wp_customize->add_setting( 'blog_excerpt', array( 'default' => 0 ) );
$wp_customize->add_control( 'blog_excerpt', array(
	'label'    => __('When listing posts on the front page...', 'booktheme'),
	'type'     => 'radio',
	'section'  => 'blog',
	'priority' => 40,
	'choices'  => array(
		0 => __('show excerpts', 'booktheme'),
		1 => __('show full posts', 'booktheme'),
	),
) );

$wp_customize->add_setting( 'blog_title', array( 'default' => __( 'Blog', 'booktheme' ) ) );
$wp_customize->add_control( 'blog_title', array(
	'label'    => __('Blog title on front page.', 'booktheme'),
	'type'     => 'text',
	'section'  => 'blog',
	'priority' => 40,
) );
