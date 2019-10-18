<?php
/*
Plugin Name: One.com Light Box
Description: Automaticly adds Light Box support to Wordpress sites.
Version: 1.0.0
Author: One.com
License: GPL2
Text Domain: OneComLightBox
Domain Path: /languages
*/

class OneLightBox {
    public function __construct() {
        load_plugin_textdomain( 'OneComLightBox', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        add_action( 'wp_enqueue_scripts',  array( $this, 'register_styles' ), 10000 );
        add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 10000 );
    }

    public function register_scripts() {
        wp_enqueue_script( 'OneLightBox-js-fancybox', plugins_url( 'fancybox/jquery.fancybox.pack.js', __FILE__ ), array('jquery'), '2.1.4' );
        wp_enqueue_script( 'OneLightBox-js', plugins_url( 'fancybox.js', __FILE__ ), array('OneLightBox-js-fancybox'), '0.0.1'. true );
    }

    public function register_styles() {
        wp_enqueue_style( 'OneLightBox-css-fancybox', plugins_url( 'fancybox/jquery.fancybox.css', __FILE__ ), array(), '2.1.4-p1' );
    }
}

new OneLightBox();