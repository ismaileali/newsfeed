<?php get_header(); ?>
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li>
                <?php get_breadcrumb() ?>
              </li>              
            </ol>
            <div class="row">
            <h1 class="post_commentbox">Categorys</h1>
            <?php
                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                $term = get_queried_object();
                $catname = $term->slug;
                $args = array(
                    'category_name' 		 => $catname,
                    'posts_per_page'     => '15',
                    'post_type'				   => 'post',
                    'post_status'		   	 => 'publish',
                    'order'    			   	 => 'DESC',
                    'paged' 			    	 => $paged
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();?>
             <div class="col-lg-4">         
            <div class="single_page_content"><a href="<?php the_permalink(); ?>"?> <?php the_post_thumbnail('', array ('class' => 'img-center')) ?> </a>
            <div class="author-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </div>
            <div class="post_commentbox"> <a href="<?php the_permalink();?>"><i class="fa fa-user"></i><?php the_author_posts_link(); ?></a> <span><i class="fa fa-calendar"></i><?php _e('','newsfeed' ) . the_time( 'g:i A' ); ?></span> <a href="<?php the_permalink(); ?>"><i class="fa fa-tags"></i><?php the_category(', '); ?></a> </div> <p><?php echo excerpt(10);?></p>              
            </div>
            </div>
            <?php }
                    }
                    wp_reset_postdata();
                    ?>
              </div>
              <div class="view-all-post">
                    <a href="#" class="btn show-btn">Show More</a>
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
          </div>
        </div>
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