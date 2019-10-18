<?php

/**
 * Enqueue scripts and styles
 */
function _register() {
    /**
     * Styles
     */
    wp_register_style( 'book-css-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
    wp_register_style( 'book-css-bootstrap-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

    wp_register_style( 'cherry-css-camera', get_template_directory_uri() . '/assets/legacy/cherry/css/camera.css' );
    wp_register_style( 'cherry-css-style', get_template_directory_uri() . '/assets/legacy/cherry/css/style.css' );
    
    //wp_register_style( 'book-css-style', get_template_directory_uri() . '/assets/legacy/book/css/style.css' );
    wp_register_style( 'book-css-style', get_template_directory_uri() . '/assets/css/style.css' );

    wp_register_style( 'book-css-fonts', get_template_directory_uri() . '/assets/legacy/book/css/fonts.css' );

    /**
     * Fonts
     */
    //wp_register_style('google-webfonts-Cinzel', 'http://fonts.googleapis.com/css?family=Cinzel');

    /**
     * Scripts
     */
    wp_register_script( 'cherry-js-easing',  get_template_directory_uri() . '/assets/legacy/cherry/js/jquery.easing.1.3.js' );
    wp_register_script( 'cherry-js-elastislide',  get_template_directory_uri() . '/assets/legacy/cherry/js/jquery.elastislide.js' );
    wp_register_script( 'cherry-js-camera',  get_template_directory_uri() . '/assets/legacy/cherry/js/camera.js' , array('cherry-js-easing','cherry-js-elastislide') );

    wp_register_script( 'book-js-sfmenu-touch',  get_template_directory_uri() . '/assets/legacy/book/js/sfmenu-touch.js' );
    wp_register_script( 'cherry-js-jquerymobile',  get_template_directory_uri() . '/assets/legacy/cherry/js/jquery.mobile.customized.min.js', array(), '123456' );
    wp_register_script( 'cherry-js-mobilemenu',  get_template_directory_uri() . '/assets/legacy/cherry/js/jquery.mobilemenu.js' );
    wp_register_script( 'cherry-js-superfish',  get_template_directory_uri() . '/assets/legacy/cherry/js/superfish.js' );
    wp_register_script( 'cherry-js-sifiles',  get_template_directory_uri() . '/assets/legacy/cherry/js/si.files.js' );
    wp_register_script( 'cherry-js-custom',  get_template_directory_uri() . '/assets/legacy/cherry/js/custom.js' );

    wp_register_script( 'book-js-custom',  get_template_directory_uri() . '/assets/js/custom.js' );

}
add_action( 'wp_register_scripts', '_register' );

function _enqueue() {
    do_action('wp_register_scripts');

    /**
     * Styles
     */
    wp_enqueue_style( 'book-css-bootstrap' );
    wp_enqueue_style( 'book-css-bootstrap-responsive' );

    wp_enqueue_style( 'cherry-css-camera' );
    wp_enqueue_style( 'cherry-css-style' );

    wp_enqueue_style( 'book-css-style' );

    wp_enqueue_style( 'book-css-fonts' );

    /**
     * Scripts
     */
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'book-js-sfmenu-touch' );
    wp_enqueue_script( 'cherry-js-jquerymobile' );
    wp_enqueue_script( 'cherry-js-mobilemenu' );
    wp_enqueue_script( 'cherry-js-superfish' );
    wp_enqueue_script( 'cherry-js-sifiles' );
    wp_enqueue_script( 'cherry-js-custom' );
    wp_enqueue_script( 'book-js-custom' );
}
add_action( 'wp_enqueue_scripts', '_enqueue' );