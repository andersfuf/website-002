<?php

function blue_enqueue() {
  wp_register_style( 'blue-custom', get_stylesheet_directory_uri() . '/custom.css' , array(), '001' );
  wp_enqueue_style ( 'blue-custom' );
}
add_action( 'wp_enqueue_scripts', 'blue_enqueue', 10000 );