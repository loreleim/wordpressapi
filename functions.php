<?php

//version number
define( 'GENERATE_VERSION', '0.1.0' );

//Enqueue scripts and styles.
function khro_scripts() {
	wp_enqueue_style( 'khro-style', get_template_directory_uri() . "/style.css", array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'khro_scripts' );


if ( ! function_exists( 'khro_setup' ) ) :

	function khro_setup() {
	// adds theme support for various features
	add_theme_support( 'title-tag' ); //change <title>
    add_theme_support( 'post-thumbnails' );

	}
endif;
add_action( 'after_setup_theme', 'khro_setup' );
