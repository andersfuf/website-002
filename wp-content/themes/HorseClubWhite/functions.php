<?php

function white_enqueue() {
  wp_register_style( 'white-custom', get_stylesheet_directory_uri() . '/custom.css' , array(), '001' );
  wp_enqueue_style ( 'white-custom' );
}
add_action( 'wp_enqueue_scripts', 'white_enqueue', 10000 );