# wordpress_interview_task
 # Books Store Plugin

## Description
Books Store is a WordPress plugin that allows you to manage books as custom post types. It provides functionalities to add/edit books, display a list of books using a shortcode, and customize the admin dashboard with book-related information.

## Features
- Custom post type for Books with custom meta fields (Author, Publication Year, Genre).
- Shortcode `[book_list]` to display a list of books on any page.
- Custom admin dashboard widget displaying links to manage books and pages.
- Custom columns and sorting options for the Books post type in the admin panel.
- REST API endpoint to retrieve a list of books.

## Installation
1. Download the `books-store` directory and place it in the `wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Once activated, you can create and manage books using the 'Books' menu item in the admin sidebar.

## Shortcode Usage
Use the `[book_list]` shortcode to display a list of books on any page or post.

Example:
[book_list]


## Admin Dashboard Widget
The plugin adds a custom dashboard widget on the WordPress admin dashboard that provides quick access to manage books and pages.

## REST API Endpoint
The plugin registers a REST API endpoint to fetch a list of books with their details.

Endpoint: /wp-json/plugin-control-center/v2/list-plugins





