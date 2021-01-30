<?php

//version number
define( 'GENERATE_VERSION', '0.1.0' );

//Enqueue scripts and styles.
function wordpressapi_scripts() {
  wp_enqueue_style( 'wordpressapi-style', get_template_directory_uri() . "/style.css", array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'wordpressapi_scripts' );


  function wordpressapi_setup() {
  // adds theme support for various features
  add_theme_support( 'title-tag' ); //change <title>
    add_theme_support( 'post-thumbnails' );

  }
add_action( 'after_setup_theme', 'wordpressapi_setup' );


//sets up the dashboard display
function register_api() {
  register_post_type( 'brewery', [
    'label' => 'Breweries', //this is what shows up in the dash
    'public' => true, //a
    'capability_type' => 'post'
  ]);
}
add_action( 'init', 'register_api' );
