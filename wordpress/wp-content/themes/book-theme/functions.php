<?php

function enqueue_theme_styles() {
  wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_theme_styles' );

function register_my_menu() {
    register_nav_menu('primary', 'Primary Menu');
  }
  add_action('init', 'register_my_menu');

add_theme_support('post-thumbnails');

