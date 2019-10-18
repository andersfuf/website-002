<?php

$wp_customize->add_setting( 'logo_image', array( 'default' => '' ) );
$wp_customize->add_control( new Image_Reloaded_Control( $wp_customize, 'logo_image', array(
	'label'      => __( 'Logo Image', 'booktheme' ),
	'section'    => 'logo',
	'settings'   => 'logo_image',
	'priority' => 1,
) ) );

$wp_customize->add_setting( 'logo_image_comment', array() );
$wp_customize->add_control( new Comment_Control( $wp_customize, 'logo_image_comment', array(
	'label'   => __('The site title will be used as logo, if no image has been selected.', 'booktheme'),
	'section' => 'logo',
	'priority' => 10,
	'alone' => true
) ) );

$wp_customize->add_setting( 'logo_image_margin', array( 'default' => 0 ) );
$wp_customize->add_control( 'logo_image_margin', array(
	'label' => __('Add margin above the Logo', 'booktheme'),
	'type' => 'checkbox',
	'section' => 'logo',
	'priority' => 30
) );

$wp_customize->add_setting( 'logo_image_background', array( 'default' => 1 ) );
$wp_customize->add_control( 'logo_image_background', array(
	'label' => __('Display logo container', 'booktheme'),
	'type' => 'checkbox',
	'section' => 'logo',
	'priority' => 40
) );

$wp_customize->add_setting( 'logo_image_background_comment', array() );
$wp_customize->add_control( new Comment_Control( $wp_customize, 'logo_image_background_comment', array(
	'label'   => __('Only used if an image has been selected.', 'booktheme'),
	'section' => 'logo',
	'priority' => 41
) ) );

$wp_customize->add_setting( 'logo_tagline', array( 'default' => 1 ) );
$wp_customize->add_control( 'logo_tagline', array(
	'label' => __('Show tagline next to logo', 'booktheme'),
	'type' => 'checkbox',
	'section' => 'logo',
	'priority' => 45
) );


