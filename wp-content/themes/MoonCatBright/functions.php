<?php

function bright_enqueue() {
  wp_register_style( 'bright-custom', get_stylesheet_directory_uri() . '/custom.css' , array(), '001' );
  wp_enqueue_style ( 'bright-custom' );
}
add_action( 'wp_enqueue_scripts', 'bright_enqueue', 10000 );