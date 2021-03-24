<?php

// Add Blog Post post type
/*
* Creating a function to create our CPT
*/
 
function custom_blog_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Blog Post', 'Post Type General Name', 'newsfeed' ),
            'singular_name'       => _x( 'Blog Post', 'Post Type Singular Name', 'newsfeed' ),
            'menu_name'           => __( 'Blog Post', 'newsfeed' ),
            'parent_item_colon'   => __( 'Parent Blog Post', 'newsfeed' ),
            'all_items'           => __( 'All Blog Post', 'newsfeed' ),
            'view_item'           => __( 'View Blog Post', 'newsfeed' ),
            'add_new_item'        => __( 'Add New', 'newsfeed' ),
            'add_new'             => __( 'Add New', 'newsfeed' ),
            'edit_item'           => __( 'Edit Blog Post', 'newsfeed' ),
            'update_item'         => __( 'Update Blog Post', 'newsfeed' ),
            'search_items'        => __( 'Search Blog Post', 'newsfeed' ),
            'not_found'           => __( 'Not Found', 'newsfeed' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'newsfeed' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'blog post', 'newsfeed' ),
            'description'         => __( 'Blog Post news and reviews', 'newsfeed' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'taxonomies'          => array( 'genres' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'menu_icon'           => 'dashicons-welcome-write-blog',
            'menu_position'       => 30,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        register_post_type( 'blog-post', $args );
    }     
    add_action( 'init', 'custom_blog_post_type', 0);


?>