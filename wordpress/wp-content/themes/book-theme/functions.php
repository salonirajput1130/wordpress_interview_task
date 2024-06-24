<?php

function enqueue_theme_styles() {
  wp_enqueue_style( 'style', get_template_directory_uri() . 'style.css', array(), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_theme_styles' );

function register_my_menu() {
    register_nav_menu('primary', 'Primary Menu');
  }
  add_action('init', 'register_my_menu');

add_theme_support('post-thumbnails');


// Register the custom REST API endpoint
function register_book_rest_route() {
    register_rest_route('custom/v1', '/books', array(
        'methods'  => 'GET',
        'callback' => 'get_books_data',
    ));
}
add_action('rest_api_init', 'register_book_rest_route');

// Callback function to handle the request and return the response
function get_books_data(WP_REST_Request $request) {
    $args = array(
        'post_type'      => 'book',
        'posts_per_page' => -1,
    );

    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return new WP_Error('no_books', 'No books found', array('status' => 404));
    }

    $books = array();

    while ($query->have_posts()) {
        $query->the_post();
        $book_id = get_the_ID();
        $books[] = array(
            'id'       => $book_id,
            'title'    => get_the_title(),
            'author'   => get_post_meta($book_id, 'book_author', true),
            'publisher' => get_post_meta($book_id, 'book_publisher', true),
            'content'  => get_the_content(),
            'excerpt'  => get_the_excerpt(),
            'date'     => get_the_date(),
        );
    }

    wp_reset_postdata();

    return rest_ensure_response($books);
}


