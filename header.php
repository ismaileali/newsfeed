<?php global $addlinks; ?>
<!DOCTYPE html>
<html>
<head>
<title><?php wp_title('|',true,'right'); ?> <?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/font.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/theme.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/dashicons@0.9.0-alpha.3/dashicons.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
   <?php wp_body_open();?>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              
            </ul>
          </div>
          <div class="header_top_right">
           <p><?php echo  date('l,F d,Y'); ?> </p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area">
                <?php if( get_header_image()) : ?>
                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo navbar-brand"><img src="<?php echo $addlinks['header-logo']['url']?>" alt="">
                     </a>
                     <?php endif; // End header image check ?>
          </div>
          <div class="add_banner"><a href="<?php the_permalink(); ?>"><img src="<?php echo $addlinks['add-ban']['url']?>" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <!-- <i class="fas fa-home text-light"></i> -->
      <?php
              wp_nav_menu( array(
                  'theme_location'    => 'header',
                  'depth'             => 2,
              // 'container'         => 'div',
              // 'container_class'   => 'collapse navbar-collapse',
              // 'container_id'      => 'navbarSupportedContent',
                  'menu_class'        => 'nav navbar-nav main_nav',
                  'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                  'walker'            => new WP_Bootstrap_Navwalker(),
              ) );
      ?>
        <!-- <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.html"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
            <li><a href="index.html">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="pages/contact.html">Contact</a></li>
            <li><a href="#">Technology</a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mobile</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Android</a></li>
              <li><a href="#">Samsung</a></li>
              <li><a href="#">Nokia</a></li>
              <li><a href="#">Walton Mobile</a></li>
              <li><a href="#">Sympony</a></li>
            </ul>
          </li>
          <li><a href="#">Laptops</a></li>
          <li><a href="#">Tablets</a></li>
          <li><a href="pages/contact.html">Contact Us</a></li>
          <li><a href="pages/404.html">404 Page</a></li>
        </ul> -->
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
            <?php
                $args = array(
                            'posts_per_page'        => '9',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?>

          <li><a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> <?php the_title(); ?></a></li>

            <?php }
                    }
                wp_reset_postdata();	
            ?>
          </ul>
          <div class="social_area">
            <ul class="social_nav">

              <?php  if(!empty($addlinks['header_socail_url']['Facebook'])) : ?>
              <li class="facebook"><a href="<?php echo $addlinks['header_socail_url']['Facebook']; ?>"></a></li>
              <?php endif; ?>

              <?php  if(!empty($addlinks['header_socail_url']['Twitter'])) : ?>
              <li class="twitter"><a href="<?php echo $addlinks['header_socail_url']['Twitter']; ?>"></a></li>
              <?php endif; ?>

              <?php  if(!empty($addlinks['header_socail_url']['Flickr'])) : ?>
              <li class="flickr"><a href="<?php echo $addlinks['header_socail_url']['Flickr']; ?>"></a></li>
              <?php endif; ?>

              <?php  if(!empty($addlinks['header_socail_url']['Pinterest'])) : ?>
              <li class="pinterest"><a href="<?php echo $addlinks['header_socail_url']['Pinterest']; ?>"></a></li>
              <?php endif; ?>

              <?php  if(!empty($addlinks['header_socail_url']['Googleplus'])) : ?>
              <li class="googleplus"><a href="<?php echo $addlinks['header_socail_url']['Googleplus']; ?>"></a></li>
              <?php endif; ?>

              <?php  if(!empty($addlinks['header_socail_url']['Vimeo'])) : ?>
              <li class="vimeo"><a href="<?php echo $addlinks['header_socail_url']['Vimeo']; ?>"></a></li>
              <?php endif; ?>

              <?php  if(!empty($addlinks['header_socail_url']['Youtube'])) : ?>
              <li class="youtube"><a href="<?php echo $addlinks['header_socail_url']['Youtube']; ?>"></a></li>
              <?php endif; ?>

              <?php  if(!empty($addlinks['header_socail_url']['Mail'])) : ?>
              <li class="mail"><a href="<?php echo $addlinks['header_socail_url']['Mail']; ?>"></a></li>
              <?php endif; ?>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>