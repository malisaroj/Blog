<?php
//Blogs post type
function custom_blogs() {
    $labels = array(
        'name'                  => _x( 'Blogs', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Blogs', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Blogs', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Blogs', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Blogs', 'textdomain' ),
        'new_item'              => __( 'New Blogs', 'textdomain' ),
        'edit_item'             => __( 'Edit Blogs', 'textdomain' ),
        'view_item'             => __( 'View Blogs', 'textdomain' ),
        'all_items'             => __( 'All Blogs', 'textdomain' ),
        'search_items'          => __( 'Search Blogs', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Blogs:', 'textdomain' ),
        'not_found'             => __( 'No Blogs found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Blogs found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Blogs Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Blogs archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Blogs', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Blogs', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Blogs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Blogs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Blogs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'blogs' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-book',
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields',  'excerpt',  'author', 'comments' ),
        // This is where we add taxonomies to our CPT
        'taxonomies'         => array( 'category' ),
    );
    // Registering your Custom Post Type
    register_post_type( 'Blogs', $args );
}
add_action( 'init', 'custom_blogs' );


//News post type
function custom_news() {
    $labels = array(
        'name'                  => _x( 'News', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'News', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'News', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'News', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New News', 'textdomain' ),
        'new_item'              => __( 'New News', 'textdomain' ),
        'edit_item'             => __( 'Edit News', 'textdomain' ),
        'view_item'             => __( 'View News', 'textdomain' ),
        'all_items'             => __( 'All News', 'textdomain' ),
        'search_items'          => __( 'Search News', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent News:', 'textdomain' ),
        'not_found'             => __( 'No News found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No News found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'News Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'News archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into News', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this News', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter News list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'News list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'News list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-format-aside',
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields',  'excerpt',  'author', 'comments' ),
        // This is where we add taxonomies to our CPT
        'taxonomies'         => array( 'category' ),
    );
    // Registering your Custom Post Type
    register_post_type( 'News', $args );
}
add_action( 'init', 'custom_news' );
