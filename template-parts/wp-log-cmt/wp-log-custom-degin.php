
<?php function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/WP-log.jpg);
		height: 75px;
        width: 74px;
        border-radius: 50px;
		background-repeat: no-repeat;
        }
        body.login {
            background: rgba(0,0,0,0.3);
        }
        body.login div#login p#nav {
            margin: -27px 0 0 0;
        }
        body.login div#login p#nav a:hover {
            text-decoration: underline;
        }
        body.login div#login form#loginform p.submit input#wp-submit {
            background-color: rgba(0,0,0,0.6); 
            border: 1px solid rgba(0,0,0,0.5);
            transition: all 0.3s ease-in-out;
        }
        body.login div#login form#loginform p.submit input#wp-submit:hover {
            background-color: #fff; 
            color: #000;
            border: 1px solid #2C2C2C;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
        }
        body.login .button.wp-hide-pw {
            border: 0;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// change url
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );



?>