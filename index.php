<?php get_header(); ?>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
        <?php
             $args = array (
                    'posts_per_page'      => '4',
                    'post_type'           => 'post',
                    'post_status'         => 'publish',
                    'paged'               => get_query_var('paged')
             );        
             $query = new WP_Query ( $args );
               if ($query->have_posts()) {
                   while($query->have_posts()) {
                     $query->the_post(); ?>
                      <div class="single_iteam"> <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?> </a>
                        <div class="slider_article">
                          <h2><a class="slider_tittle" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                          <p><?php the_excerpt(); ?></p>
                        </div>
                      </div>
                      <?php  }
                                }
                                wp_reset_postdata();
                      ?>          
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
            <?php
            $args = array(
              'offset'                => '4',
              'posts_per_page'        => '5',
              'post_type'             => 'post',
              'post_status'           => 'publish',
              'paged'                 => get_query_var('paged')
            );   
            $query = new WP_Query( $args );
                  if ( $query->have_posts() ) {
                         while ($query->have_posts() ) {
                           $query->the_post(); ?>

              <li>
                <div class="media"> 
                <a href="<?php the_permalink(); ?>" class="media-left"> <?php the_post_thumbnail(); ?></a>
                <div class="media-body"> <a href="<?php the_permalink(); ?>" class="catg_title"> <?php the_title(); ?></a> </div>
                </div>
              </li>

            <?php  }
                     }
              wp_reset_postdata();
            ?>
              
  
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span>Business</span></h2>
            <?php
                $args = array(
                            'posts_per_page'        => '1',
                            'category_name' 	     => 'business',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?>           
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="<?php the_permalink(); ?>" class="featured_img"> <?php the_post_thumbnail('business_image_size'); ?> <span class="overlay"></span> </a>
                    <figcaption> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </figcaption>
                     <?php the_excerpt(); ?>
                  </figure>
                </li>
              </ul>
            </div>
            <?php }
                    }
                wp_reset_postdata();	
            ?>
            <div class="single_post_content_right">
              <ul class="spost_nav">
              <?php
                $args = array(
                            'offset'                => '1',
                            'posts_per_page'        => '4',
                            'category_name' 	      => 'business',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?>   
                <li>
                  <div class="media wow fadeInDown"> <a href="<?php the_permalink(); ?>" class="media-left"> <?php the_post_thumbnail(); ?></a>
                    <div class="media-body"> <a href="<?php the_permalink(); ?>" class="catg_title"> <?php the_title(); ?> </a></div>
                  </div>
                </li>
                <?php }
                    }
                  wp_reset_postdata();	
                ?>
              </ul>
            </div>
          </div>
          <div class="fashion_technology_area">
           
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Fashion</span></h2>
                <?php
                $args = array(
                            'posts_per_page'        => '1',
                            'category_name' 	     => 'fashion',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?>   
                            
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                    <figure class="bsbig_fig"> <a href="<?php the_permalink(); ?>" class="featured_img"> <?php  the_post_thumbnail('fashion_image_size'); ?> <span class="overlay"></span> </a>
                      <figcaption> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </figcaption>
                      <p><?php the_excerpt(); ?></p>
                    </figure>
                  </li>
                </ul>
                <?php }
                    }
                  wp_reset_postdata();	
                ?>
                <ul class="spost_nav">
                <?php
                $args = array(
                            'offset'                => '1',
                            'posts_per_page'        => '4',
                            'category_name' 	     => 'fashion',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?>   
                  <li>
                    <div class="media wow fadeInDown"> <a href="<?php the_permalink(); ?>" class="media-left"> <?php the_post_thumbnail(); ?> </a>
                      <div class="media-body"> <a href="<?php the_permalink(); ?>" class="catg_title"> <?php the_excerpt(); ?></a> </div>
                    </div>
                  </li>
                  <?php }
                              }
                      wp_reset_postdata();
                  ?>
                </ul>
              </div>
            </div>

            <div class="technology">
              <div class="single_post_content">
                <h2><span>Technology</span></h2>
                <?php
                $args = array(
                            // 'offset'                => '1',
                            'posts_per_page'        => '1',
                            'category_name' 	     => 'technology',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?>  
                <ul class="business_catgnav">
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="<?php the_permalink(); ?>" class="featured_img"> <?php the_post_thumbnail('technology_image_size');  ?> <span class="overlay"></span> </a>
                      <figcaption> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </figcaption>
                      <p><?php the_excerpt(); ?></p>
                    </figure>
                  </li>
                </ul>
                <?php }
                        }
                     wp_reset_postdata();
                ?>
                <ul class="spost_nav">
                <?php
                $args = array(
                            'offset'                => '1',
                            'posts_per_page'        => '4',
                            'category_name' 	     => 'technology',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?>  
                  <li>
                    <div class="media wow fadeInDown"> <a href="<?php the_permalink(); ?>" class="media-left"> <?php the_post_thumbnail(); ?></a>
                      <div class="media-body"> <a href="<?php the_permalink(); ?>" class="catg_title"> <?php the_title(); ?></a> </div>
                    </div>
                  </li>
                  <?php }
                        }
                     wp_reset_postdata();
                ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="single_post_content">
            <h2><span>Photography</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
            <?php
            $args = array(
              'posts_per_page'        => '6',
              // 'category_name' 	     => 'photography',
              'post_type'	            => 'photography',
              'post_status'	          => 'publish',
              'paged' 		            => get_query_var( 'paged')
    );
    $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                    $query->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'medium');
                    // $featured_img_size_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>  
         
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="<?php echo $featured_img_url; ?>" > <img src="<?php echo $featured_img_url; ?>" alt=""/></a> </figure>
                </div>
              </li>
              <?php }
              wp_reset_postdata();
                } ?>
            </ul>
          </div>
          <div class="single_post_content">
            <h2><span>Games</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav">
              <?php
                $args = array(
                            // 'offset'                => '1',
                            'posts_per_page'        => '1',
                            'category_name' 	     => 'games',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                              if ( $query->have_posts() ) {
                                  while ( $query->have_posts() ) {
                                  $query->the_post(); ?> 
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( 'games_image_size' ); ?> <span class="overlay"></span> </a>
                    <figcaption> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </figcaption>
                    <p><?php the_excerpt(); ?>...</p>
                  </figure>
                </li>
                <?php }
                         }
                    wp_reset_postdata();                
                ?>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
              <?php 
                  $args = array (
                    'category_name'       => 'games',
                    'offset'              => '1',
                    'posts_per_page'      => '4',
                    'post_type'           => 'post',
                    'post_status'         => 'publish',
                    'paged'               => get_query_var('paged')
                  );
                    $query = new WP_Query($args);
                    if($query->have_posts()) {
                        while( $query->have_posts() ) {
                          $query->the_post(); ?>

                <li>
                  <div class="media wow fadeInDown"> <a href="<?php the_permalink(); ?>" class="media-left"> <?php the_post_thumbnail(); ?> </a>
                    <div class="media-body"> <a href="<?php the_permalink(); ?>" class="catg_title"> <?php the_title(); ?></a> </div>
                  </div>
                </li>
                <?php }
                       }
                wp_reset_postdata();
              ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
       <?php get_sidebar(); ?>
      </div>
    </div>
  </section>
  <!-- popup form -->
  <!-- <div class="login-full-page ">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="login-image text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/login-avatar.png"  class="img-fluid" alt="ligin image">
                    </div>
                    <div class="login-form">
                        <form class="pt-3">
                            <div class="form-group pb-2">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control mt-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              <small id="emailHelp" class="form-text">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control my-2" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

 <?php get_footer(); ?>