<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Patrizia_Lutz
 */
 /**
  * Enqueue scripts and styles.
  */
 function patrizialutz_scripts() {

  // $version = rand ( 2001, 6000 );

  $patrizialutz_theme = wp_get_theme();
  $version = $patrizialutz_theme->get( 'Version' );

  wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css', array(), false, 'all' );
  wp_enqueue_style( 'web-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,300i', array(), false, 'all' );

	wp_enqueue_style( 'patrizialutz-style', get_template_directory_uri() . '/css/main.min.css', array(), $version, 'all');

	wp_enqueue_script( 'patrizialutz-scripts', get_template_directory_uri() . '/js/min/main.min.js', array ( 'jquery' ), $version, true);

 	wp_enqueue_script( 'patrizialutz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

 	wp_enqueue_script( 'patrizialutz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
 		wp_enqueue_script( 'comment-reply' );
 	}
 }
 add_action( 'wp_enqueue_scripts', 'patrizialutz_scripts' );
