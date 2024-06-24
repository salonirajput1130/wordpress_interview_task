<?php
/*
Plugin Name: Books Store
Description:  Books details
Version: 1.0
Author: Champ
*/

// Task 2: Book post type
function book_store() {

    $labels = array(
        'name'                  => 'Books',
        'singular_name'         => 'Book',
        'menu_name'             => 'Books',
        'all_items'             => 'All Books',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Book',
        'edit_item'             => 'Edit Book',
        'new_item'              => 'New Book',
        'view_item'             => 'View Book',
        'search_items'          => 'Search Books',
        'not_found'             => 'No books found',
        'not_found_in_trash'    => 'No books found in trash',
        'archives'              => 'Book Archives',
        'filter_items_list'     => 'Filter books list',
    );

    $args = array(
        'label'                 => 'Book',
        'description'           => 'Books by authors',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'public'                => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-book',
        'rewrite'               => array( 'slug' => 'books' ),
        'has_archive'           => true,
        'show_in_rest'          => true,
        'rest_base'             => 'books',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
        'capability_type'       => 'post',
        'taxonomies'            => array(),
    );

    register_post_type( 'book', $args );
}
add_action( 'init', 'book_store', 0 );

// Meta filed //
function custom_book_meta_boxes() {
    add_meta_box(
        'book_details_meta_box',      
        'Book Details',              
        'custom_book_meta_box_html',  
        'book',                      
        'normal',                     
        'default'                     
    );
}
add_action( 'add_meta_boxes', 'custom_book_meta_boxes' );


function custom_book_meta_box_html( $post ) {
    $author = get_post_meta( $post->ID, 'book_author', true );
    $year = get_post_meta( $post->ID, 'book_year', true );
    $genre = get_post_meta( $post->ID, 'book_genre', true );

    ?>
    <p>
        <label for="book_author">Author:</label>
        <input type="text" id="book_author" name="book_author" value="<?php echo esc_attr( $author ); ?>">
    </p>
    <p>
        <label for="book_year">Publication Year:</label>
        <input type="text" id="book_year" name="book_year" value="<?php echo esc_attr( $year ); ?>">
    </p>
    <p>
        <label for="book_genre">Genre:</label>
        <input type="text" id="book_genre" name="book_genre" value="<?php echo esc_attr( $genre ); ?>">
    </p>
    <?php
}

// Save book field
function custom_book_save_post( $post_id ) {
    if ( array_key_exists( 'book_author', $_POST ) ) {
        update_post_meta(
            $post_id,
            'book_author',
            sanitize_text_field( $_POST['book_author'] )
        );
    }
    if ( array_key_exists( 'book_year', $_POST ) ) { 
        update_post_meta(
            $post_id,
            'book_year',
            sanitize_text_field( $_POST['book_year'] )
        );
    }
    if ( array_key_exists( 'book_genre', $_POST ) ) {
        update_post_meta(
            $post_id,
            'book_genre',
            sanitize_text_field( $_POST['book_genre'] )
        );
    }
}
add_action( 'save_post_book', 'custom_book_save_post' ); 


// Shortcode book list

function book_list_shortcode() {
  
    $args = array(
        'post_type' => 'book',
        'posts_per_page' => -1,
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {

         $output = '<ul class="book-list">';
        while ( $query->have_posts() ) {
            $query->the_post();
            $author = get_post_meta( get_the_ID(), 'book_author', true );
            $year = get_post_meta( get_the_ID(), 'book_year', true );
            $genre = get_post_meta( get_the_ID(), 'book_genre', true );
            $output .= '<li>';
            $output .= '<h2>' . get_the_title() . '</h2>';
            $output .= '<p><strong>Author:</strong> ' .esc_html( $author ). '</p>';
            $output .= '<p><strong>Publication Year:</strong> ' . esc_html( $year ) . '</p>';
            $output .= '<p><strong>Genre:</strong> ' . esc_html( $genre ) . '</p>';
            $output .= '</li>';
        }
        $output .= '</ul>';
        wp_reset_postdata();
    } else {
        $output = '<p>No books found</p>';
    }
    return $output;
}
add_shortcode( 'book_list', 'book_list_shortcode' );

// Task:3 Admin menu


// Admin dashboard widget
function custom_dashboard_widget() {
    ?>
    <h2>Welcome to Our Site!</h2>
    <ul>
        <li><a href="<?php echo admin_url('edit.php?post_type=book'); ?>">View Books</a></li>
        <li><a href="<?php echo admin_url('edit.php?post_type=page'); ?>">View Pages</a></li>
    </ul>
    <?php
}
function add_custom_dashboard_widgets() {
    wp_add_dashboard_widget('custom_dashboard_widget', 'Welcome to Our Site', 'custom_dashboard_widget');
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widgets');

// Remove admin menu
function customize_admin_menu() {
    remove_menu_page('edit-comments.php');
    remove_menu_page('edit.php');
    remove_menu_page('tools.php');

}
add_action('admin_menu', 'customize_admin_menu');


// Register custom columns
function custom_book_columns($columns) {
    // Check if the current post type is 'book'
    if (get_post_type() === 'book') {
        $columns['book_author'] = 'Author';
        $columns['book_year'] = 'Publisher';
        $columns['book_genre'] = 'Genre';

    }


    // Populate custom columns with data
function custom_book_column_data($column, $post_id) {
    // Check if the current post type is 'book'
    if (get_post_type($post_id) === 'book') {

       
        
        switch ($column) {
            case 'book_author':
                echo get_post_meta($post_id, 'book_author', true); 
                break;
            case 'book_publisher':
                echo get_post_meta($post_id, 'book_year', true); 
                break;
        }
    }
}
add_action('manage_posts_custom_column', 'custom_book_column_data', 10, 2);


    return $columns;
}
add_filter('manage_posts_columns', 'custom_book_columns');
