<?php
/**
 * Essential theme supports
 * */
// Add WP Custom CSS & JS
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/style-login.css' );
    wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/assets/js/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
function theme_setup(){
    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );
 
    /** tag-title **/
    add_theme_support( 'title-tag' );
 
    /** post formats */
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);
 
    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );
 
    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
 
    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );

	 // Crop image Custom Size
	 add_image_size('business_image_size', 348, 232, true);
	 add_image_size('fashion_image_size', 348, 232, true);
	 add_image_size('technology_image_size', 348, 232, true);
	 add_image_size('games_image_size', 348, 232, true);
	 add_image_size('sponsor_image_size', 340, 250, true);
     add_image_size('cat_page_img_size', 200, 150, true);
    //  add_image_size( 'author_all_post_image', 200, 150, true);


	// Add theme support for document Title tag
     add_theme_support('title-tag');

	// Add theme support for custom CSS in the dinyMCE visual editor
    add_editor_style();

}
add_action('after_setup_theme','theme_setup');

//  Add Redux Framework
require_once get_template_directory().'/redux-fwk/Redux-core/framework.php';
require_once get_template_directory().'/redux-fwk/sample/config.php';


// Add theme support for Custom Header
$header_args = array(
    'default-image'          => '',
    'width'                  => 0,
    'height'                 => 0,
    'flex-width'             => false,
    'flex-height'            => false,
    'uploads'                => true,
    'random-default'         => true,
    'header-text'            => true,
    'default-text-color'     => '',
    'wp-head-callback'       => ''
);
add_theme_support( 'custom-header', $header_args );



/**
 * Register navigation menus uses wp_nav_menu in one places.
 */
function navigation_menus() {

	$locations = array(
		'header'  => __( 'Header Menu', 'ismaile' )
	);

	register_nav_menus( $locations );
}
add_action( 'init', 'navigation_menus' );


// WP NAV
/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/inc/wp-bootstrap-navwalker/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// // add cat all show post
// require_once get_template_directory() . '/template-parts/cat-all-posts/category-template.php';

/* Changed excerpt length to 150 words*/
function my_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

// Add Excerpt 
function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '<a href="'. get_the_permalink() .'"> Red More...</a>';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);

  if (count($content) >= $limit) {
      array_pop($content);
      $content = implode(" ", $content) . '<a href="'. get_the_permalink() .'"> ....</a>';
  } else {
      $content = implode(" ", $content);
  }

  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);

  return $content;
}





 /**
  * Generate breadcrumbs
 **/
function get_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;/&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;/&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

// include video section  
require_once get_template_directory() .' /template-parts/post-types/video.php';



// include footer content 
require_once get_template_directory() .' /template-parts/post-types/footer-content.php';


// include Photography 
require_once get_template_directory() .' /template-parts/post-types/photography.php';

// include blogs posts 
// require_once get_template_directory() .' /template-parts/post-types/blogs-post.php';
/**
 * Register a custom post type called "blog".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_blog_init() {
    $labels = array(
        'name'                  => _x( 'Blogs', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Blog', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Blogs', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Blog', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Blog', 'textdomain' ),
        'new_item'              => __( 'New Blog', 'textdomain' ),
        'edit_item'             => __( 'Edit Blog', 'textdomain' ),
        'view_item'             => __( 'View Blog', 'textdomain' ),
        'all_items'             => __( 'All Blogs', 'textdomain' ),
        'search_items'          => __( 'Search Blogs', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Blogs:', 'textdomain' ),
        'not_found'             => __( 'No blogs found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No blogs found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Blog Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Blog archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into blog', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this blog', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter blogs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
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
        'rewrite'            => array( 'slug' => 'blog' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-welcome-write-blog',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
 
    register_post_type( 'blog', $args );
}
 
add_action( 'init', 'wpdocs_blog_init' );




// Add to Pagination
function custom_pagination($pages = '', $range = 2)
{  
 $showitems = ($range * 2)+1;  

 global $paged;
 if(empty($paged)) $paged = 1;

 if($pages == '')
 {
     global $wp_query;
     $pages = $wp_query->max_num_pages;
     if(!$pages)
     {
         $pages = 1;
     }
 }   

 if(1 != $pages)
 {
     echo "<div class='pagination'>";
     if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
     if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

     for ($i=1; $i <= $pages; $i++)
     {
         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
         {
             echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
         }
     }

     if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
     if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
     echo "</div>\n";
 }
 }


///////////////// CUSTOM FROM STAR /////////////////

/**
 * Customize comment form default fields.
 * Move the comment_field below the author, email, and url fields.
 */
function wpse250243_comment_form_default_fields( $fields ) {
    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req           = get_option( 'require_name_email' );
    $aria_req      = ( $req ? " aria-required='true'" : '' );
    $html_req      = ( $req ? " required='required'" : '' );
    $html5         = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : false;

    $fields = [
        'author' => '<div class="row"><div class="col-md-6"><p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'newsfeed'  ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245"' . $aria_req . $html_req . ' /></p></div>',
        'email'  => '<div class="col-md-6"><p class="comment-form-email"><label for="email">' . __( 'Email', 'newsfeed'  ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p></div>',
        'url'    => '<div class="col-md-12"><p class="comment-form-url"><label for="url">' . __( 'Website', 'newsfeed'  ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" /></p></div>',
        'comment_field' => '<div class="col-md-12"><p class="comment-form-comment"><label for="comment">' . _x( 'Comment *', 'noun', 'newsfeed' ) . '</label> <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" maxlength="65525" aria-required="true" required="required"></textarea></p></div></div>',
    ];

    return $fields;
}
add_filter( 'comment_form_default_fields', 'wpse250243_comment_form_default_fields' );

/**
 * Remove the original comment field because we've added it to the default fields
 * using wpse250243_comment_form_default_fields(). If we don't do this, the comment
 * field will appear twice.
 */
function wpse250243_comment_form_defaults( $defaults ) {
    if ( isset( $defaults[ 'comment_field' ] ) ) {
        $defaults[ 'comment_field' ] = '';
    }

    return $defaults;
}
add_filter( 'comment_form_defaults', 'wpse250243_comment_form_defaults', 10, 1 );

////////////// END ////////////////


 // show Website all posts comments
function wpb_comment_count() { 
$comments_count = wp_count_comments();
$message =  'There are <strong>'.  $comments_count->approved . '</strong> comments posted by our users.';
    
return $message; 
} 
add_shortcode('wpb_total_comments','wpb_comment_count');

// show single post all comments numbers =1
function comment(){
    $number= get_comments_number(get_the_ID());

    return $number;
}
add_shortcode( 'comment_no', 'comment' );

// show single post all comments numbers =2
function getPostComments($postID){
    $query_post = get_post($postID);
    $num = $query_post->comment_count;
        if( $num == 0 || $num > 1 ) : $num = $num; // change the plural for your language
        else : $num = $num; // change the singular for your language
        endif;
    $permalink = get_permalink($postID);
 
    return '<a href="'. $permalink . '#comments" class="comments_link">' . $num . '</a>';

    }

// display time ago
function my_post_time_ago_function() {
    return sprintf( esc_html__( '%s ago', 'newsfeed' ), human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) ) );
    }
    add_filter( 'the_time', 'my_post_time_ago_function' );


// Pagenation 
function bittersweet_pagination() {

    global $wp_query;
    
    if ( $wp_query->max_num_pages <= 1 ) return; 
    
    $big = 999999999; // need an unlikely integer
    
        $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_text'          => __( '<i class="fas fa-arrow-left"></i></a>'),
            'next_text'          => __( '<i class="fas fa-arrow-right"></i>'),
            'type' => 'array'
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="page-pagination">';
            foreach ( $pages as $page ) {
                echo '<li class="page-numbers">'.$page.'</li>';
            }
           echo '</ul>';
        }
    }
    require_once get_template_directory() .'/template-parts/wp-log-cmt/wp-log-custom-degin.php';
   
    
?>