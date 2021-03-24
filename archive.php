<?php get_header(); ?>
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <?php if (have_posts()) { 
            while (have_posts()) { the_post(); ?>
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li>
                <?php get_breadcrumb() ?>
              </li>              
            </ol>
                  <h1>Hello Archive</h1>
            <h1><?php the_title(); ?></h1>
            <div class="post_commentbox"> <a href="<?php the_permalink(); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a> <span><i class="fa fa-calendar"></i><?php _e('','newsfeed' ) . the_time( 'g:i A' ); ?></span> <a href="<?php the_permalink(); ?>"><i class="fa fa-tags"></i><?php the_category(', '); ?></a> </div>

            <div class="single_page_content"> <?php the_post_thumbnail('', array ('class' => 'img-center')) ?>
              <p><?php the_content(); ?></p>              
            </div>

            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
              <?php
                    //for use in the loop, list 5 post titles related to first tag on current post
                    $tags = wp_get_post_tags($post->ID);
                    if ($tags) {
                    $first_tag = $tags[0]->term_id;
                    $args=array(
                    'tag__in'             => array($first_tag),
                    'post__not_in'        => array($post->ID),
                    'posts_per_page'      =>3,
                    'caller_get_posts'    =>1
                    );
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post();
              ?>
              <li>
                  <div class="media"> <a class="media-left" href="<?php the_permalink(); ?>"> <?php the_post_thumbnail(); ?></a>
                    <div class="media-body"> <a class="catg_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
                  </div>
              <?php
                endwhile;
                }
                wp_reset_query();
                }
              ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <?php endwhile;
               wp_reset_postdata(); 
              endif; ?>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="<?php echo get_template_directory_uri(); ?>/images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="<?php echo get_template_directory_uri(); ?>/images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>