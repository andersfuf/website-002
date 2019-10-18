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


$wp_customize->add_setting( 'logo_tagline', array( 'default' => 1 ) );
$wp_customize->add_control( 'logo_tagline', array(
	'label' => __('Show tagline next to logo', 'booktheme'),
	'type' => 'checkbox',
	'section' => 'logo',
	'priority' => 45
) );


