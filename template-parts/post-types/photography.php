<?php

// Add Photography post type
/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Photography', 'Post Type General Name', 'newsfeed' ),
            'singular_name'       => _x( 'Photography', 'Post Type Singular Name', 'newsfeed' ),
            'menu_name'           => __( 'Photography', 'newsfeed' ),
            'parent_item_colon'   => __( 'Parent Photography', 'newsfeed' ),
            'all_items'           => __( 'All Photography', 'newsfeed' ),
            'view_item'           => __( 'View Photography', 'newsfeed' ),
            'add_new_item'        => __( 'Add New', 'newsfeed' ),
            'add_new'             => __( 'Add New', 'newsfeed' ),
            'edit_item'           => __( 'Edit Photography', 'newsfeed' ),
            'update_item'         => __( 'Update Photography', 'newsfeed' ),
            'search_items'        => __( 'Search Photography', 'newsfeed' ),
            'not_found'           => __( 'Not Found', 'newsfeed' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'newsfeed' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'photography', 'newsfeed' ),
            'description'         => __( 'Photography news and reviews', 'newsfeed' ),
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
            'menu_icon'           => 'dashicons-format-gallery',
            'menu_position'       => 30,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        register_post_type( 'photography', $args );
    }     
    add_action( 'init', 'custom_post_type', 0 );


?>