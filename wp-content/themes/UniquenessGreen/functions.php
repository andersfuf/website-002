<?php

function green_enqueue() {
  wp_register_style( 'green-custom', get_stylesheet_directory_uri() . '/custom.css' , array(), '001' );
  wp_enqueue_style ( 'green-custom' );
}
add_action( 'wp_enqueue_scripts', 'green_enqueue', 10000 );