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

function get_api_data() {
  $breweries = [];
  $results = wp_remote_retrieve_body(wp_remote_get('https://loreleim.github.io/chickenapi/data/flat.json'));
  $results = json_decode($results);

  $breweries[] = $results;


  foreach ($breweries[0] as $brewery) {
    $postTitle = sanitize_title($brewery->name);

    $inserted_brewery = wp_insert_post([
      'post_name' => $postTitle,
      'post_title' => $postTitle,
      'post_type' => 'brewery',
      'post_status' => 'publish'
    ]);
  };
}