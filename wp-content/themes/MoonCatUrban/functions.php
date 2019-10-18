<?php

function urban_enqueue() {
  wp_register_style( 'urban-custom', get_stylesheet_directory_uri() . '/custom.css' , array(), '001' );
  wp_enqueue_style ( 'urban-custom' );
}
add_action( 'wp_enqueue_scripts', 'urban_enqueue', 10000 );