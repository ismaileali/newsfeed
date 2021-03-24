<?php
/**
 * Register a custom post type called "video".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_video_init() {
    $labels = array(
        'name'                  => _x( 'Videos', 'Post type general name', 'newsfeed' ),
        'singular_name'         => _x( 'Video', 'Post type singular name', 'newsfeed' ),
        'menu_name'             => _x( 'Videos', 'Admin Menu text', 'newsfeed' ),
        'name_admin_bar'        => _x( 'Video', 'Add New on Toolbar', 'newsfeed' ),
        'add_new'               => __( 'Add New', 'newsfeed' ),
        'add_new_item'          => __( 'Add New Video', 'newsfeed' ),
        'new_item'              => __( 'New Video', 'newsfeed' ),
        'edit_item'             => __( 'Edit Video', 'newsfeed' ),
        'view_item'             => __( 'View Video', 'newsfeed' ),
        'all_items'             => __( 'All Videos', 'newsfeed' ),
        'search_items'          => __( 'Search Videos', 'newsfeed' ),
        'parent_item_colon'     => __( 'Parent Videos:', 'newsfeed' ),
        'not_found'             => __( 'No videos found.', 'newsfeed' ),
        'not_found_in_trash'    => __( 'No videos found in Trash.', 'newsfeed' ),
        'featured_image'        => _x( 'Video Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'newsfeed' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'newsfeed' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'newsfeed' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'newsfeed' ),
        'archives'              => _x( 'Video archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'newsfeed' ),
        'insert_into_item'      => _x( 'Insert into video', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'newsfeed' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this video', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'newsfeed' ),
        'filter_items_list'     => _x( 'Filter videos list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'newsfeed' ),
        'items_list_navigation' => _x( 'Videos list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'newsfeed' ),
        'items_list'            => _x( 'Videos list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'newsfeed' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'video' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-playlist-video',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','video' ),
    );
 
    register_post_type( 'video', $args );
}
 
add_action( 'init', 'wpdocs_video_init' );

?>

