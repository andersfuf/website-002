<?php
$defaults = _custom_css_defaults();

$wp_customize->add_setting( 'brand_tint1', array( 'default' => $defaults['tint1'] ) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_tint1', array(
	'label'      => __( 'Color 1', 'booktheme' ),
	'section'    => 'brandcolors',
	'settings'   => 'brand_tint1',
) ) );

$wp_customize->add_setting( 'brand_tint2', array( 'default' => $defaults['tint2'] ) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_tint2', array(
	'label'      => __( 'Color 2', 'booktheme' ),
	'section'    => 'brandcolors',
	'settings'   => 'brand_tint2',
) ) );

$wp_customize->add_setting( 'brand_tint3', array( 'default' => $defaults['tint3'] ) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_tint3', array(
	'label'      => __( 'Color 3', 'booktheme' ),
	'section'    => 'brandcolors',
	'settings'   => 'brand_tint3',
) ) );

$wp_customize->add_setting( 'brand_tint4', array( 'default' => $defaults['tint4'] ) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_tint4', array(
	'label'      => __( 'Color 4', 'booktheme' ),
	'section'    => 'brandcolors',
	'settings'   => 'brand_tint4',
) ) );
