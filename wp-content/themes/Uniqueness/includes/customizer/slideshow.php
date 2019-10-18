<?php
$wp_customize->add_setting( 'slider_autoplay', array( 'default' => 1 ) );
$wp_customize->add_control( 'slider_autoplay', array(
	'label'   => __('Enable autoplay', 'booktheme'),
	'type'    => 'checkbox',
	'section' => 'slider'
) );

$wp_customize->add_setting( 'slider_shownav' , array( 'default' => 1 ) );
$wp_customize->add_control( 'slider_shownav' , array(
	'label'   => __('Show slideshow navigation', 'booktheme'),
	'type'    => 'checkbox',
	'section' => 'slider'
) );

$wp_customize->add_setting( 'slider_delay' , array( 'default' => '7000' ) );
$wp_customize->add_control( 'slider_delay' , array(
	'label'   => __('Time on each slide', 'booktheme'),
	'type'    => 'select',
	'section' => 'slider',
	'choices' => array (
		'2000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 2),
		'3000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 3),
		'4000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 4),
		'5000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 5),
		'6000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 6),
		'7000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 7),
		'8000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 8),
		'9000'  => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 9),
		'10000' => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 10),
		'11000' => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 11),
		'12000' => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 12),
		'13000' => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 13),
		'14000' => sprintf(_x('%d seconds', '%d will be replaced with an integer', 'booktheme'), 14),
	),
) );

$wp_customize->add_setting( 'slider_effect' , array( 'default' => 'simpleFade' ) );
$wp_customize->add_control( 'slider_effect' , array(
	'label'   => __('Slideshow effect', 'booktheme'),
	'type'    => 'select',
	'section' => 'slider',
	'choices' => array(
		//'random' => 'Random',
		'simpleFade' => 'Fade',
		'curtainTopLeft' => 'curtainTopLeft',
		'curtainTopRight' => 'curtainTopRight',
		'curtainBottomLeft' => 'curtainBottomLeft',
		'curtainBottomRight' => 'curtainBottomRight',
		//'curtainSliceLeft' => 'curtainSliceLeft',
		//'curtainSliceRight' => 'curtainSliceRight',
		'blindCurtainTopLeft' => 'blindCurtainTopLeft',
		'blindCurtainTopRight' => 'blindCurtainTopRight',
		'blindCurtainBottomLeft' => 'blindCurtainBottomLeft',
		'blindCurtainBottomRight' => 'blindCurtainBottomRight',
		//'blindCurtainSliceBottom' => 'blindCurtainSliceBottom',
		//'blindCurtainSliceTop' => 'blindCurtainSliceTop',
		//'stampede' => 'stampede',
		'mosaic' => 'mosaic',
		//'mosaicReverse' => 'mosaicReverse',
		//'mosaicRandom' => 'mosaicRandom',
		//'mosaicSpiral' => 'mosaicSpiral',
		//'mosaicSpiralReverse' => 'mosaicSpiralReverse',
		//'topLeftBottomRight' => 'topLeftBottomRight',
		//'bottomRightTopLeft' => 'bottomRightTopLeft',
		//'bottomLeftTopRight' => 'bottomLeftTopRight',
		//'bottomLeftTopRight' => 'bottomLeftTopRight',
	),
) );