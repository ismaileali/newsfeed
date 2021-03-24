<?php 
/*
    Template Name: all blog
*/
?>

<?php get_header(); ?>
<div class="row pt-4">
  <div class="col-md-8">
    <div class="row">
    <?php
          $args = array(
            'posts_per_page'        => '10',
            // 'category_name' 	      => 'blog',
            'post_type'				      => 'blog',
            'post_status'   	 	    => 'publish',
            'paged' 			          => get_query_var( 'paged')
  );  
  $query = new WP_Query( $args );
              if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                  $query->the_post();?>
                  <div class="col-md-4 col-sm-6 mb-4">
                      <div class="blog-items">
                      <div class="img-box">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array('class' => 'img-fluid blog-img-size'));?></a>
                      </div>                                         
                      <div class="content-box ">
                        <a href="<?php the_permalink(); ?>"><h4 class="title"><?php the_title(); ?></h4></a>
                        <span class="history text-muted">
                          <p class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo my_post_time_ago_function(); ?></p>
                          <p class="comments"><i class="fa fa-comments" aria-hidden="true"> <?php echo getPostComments($postID); ?></i> </p>
                          <p class="liks"><?php  echo do_shortcode('[post-views]');?></p>
                        </span>
                          <p class="text">
                            <?php echo content(30); ?>
                          </p>
                      </div>
                      </div>
                  </div>
        <?php }
              wp_reset_postdata();
            }
            ?>
    </div>
    <!-- Pagination  -->
          <nav aria-label="Page navigation example">
             <?php  bittersweet_pagination(); ?>  
          </nav>
      
      


  </div>
 <div class="col-md-4">
   <?php get_sidebar(); ?>
 </div>
</div>
<?php get_footer(); ?>

