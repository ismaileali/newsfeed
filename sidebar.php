<aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
            <?php
                $args = array (
                     'posts_per_page'      => '4',
                     'post_type'           => 'post',
                    //  'meta_key'            => 'wpb_post_views_count',
                    //  'orderby'             => 'meta_value_num',
                    //  'order'               => 'DESC' ,
                     'post_status'         => 'publish',
                     'paged'               => get_query_var( 'paged' )
                );
                $query = new WP_Query ( $args );
                         if ($query->have_posts()) {
                             while ($query->have_posts()) {
                                 $query->the_post(); ?>
                               
                                <li>
                                    <div class="media wow fadeInDown"> <a href="<?php the_permalink(); ?>" class="media-left"> <?php the_post_thumbnail(); ?> </a>
                                    <div class="media-body"> <a href="<?php the_permalink(); ?>" class="catg_title"> <?php the_title(); ?></a> </div>
                                    </div>
                                </li>
                <?php  }
                            }
                    wp_reset_postdata();
                ?>
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                    <?php
                        $args = array(
                          'orderby' => 'name',
                          'parent' => 0
                          );
                        $categories = get_categories( $args );
                        foreach ( $categories as $category ) { ?>
                          <li class="cat-item">
                        <?php 
                            echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>';
                        ?>
                          </li>
                        <?php
                        }
                        ?>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
              <?php
                    $args = array (
                            'posts_per_page'      => '1',
                            'post_type'           => 'video',
                            'post_status'         => 'publish',
                            'paged'               => get_query_var('paged')
                    );        
                    $query = new WP_Query ( $args );
                    global $post;
                      if ($query->have_posts()) {
                          while($query->have_posts()) {
                            $query->the_post(); ?>
                <div class="vide_area">
                          <?php the_content();?>
                </div>
                <?php }
                      }
                  wp_reset_postdata();  
                ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
              <p><?php echo do_shortcode('[wpb_total_comments]') ?></p>
                <ul class="spost_nav">
                <?php
                // $user = wp_get_current_user();
                    $args = array(
                        // 'posts_per_page' => 5,
                        'number'=>3,
                        'offset'=>0,
                        'status'=>'approve',
                    );
                    foreach (get_comments($args) as $comment) { ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="<?php the_permalink(); ?>" class="media-left"> <?php $user = wp_get_current_user(); if ( $user ){ ?><img src="<?php echo esc_url( get_avatar_url( $user->ID ) ); ?>" /><?php } ?></a>
                      <div class="media-body"> <a href="<?php the_permalink(); ?>" class="catg_title"> <?php echo $comment->comment_content; ?></a> </div>
                    </div>
                    <!-- <div><?php// echo $comment->comment_author; ?> said: "<?php //echo $comment->comment_content; ?>".</div> -->
                  </li>
               <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <?php
                $args = array(
                            // 'offset'                => '1',
                            'posts_per_page'        => '1',
                            'category_name' 	     => 'sponsor',
                            'post_type'	            => 'post',
                            'post_status'	          => 'publish',
                            'paged' 		            => get_query_var( 'paged')
                  );
                  $query = new WP_Query( $args );
                          if ( $query->have_posts() ) {
                              while ( $query->have_posts() ) {
                              $query->the_post(); ?> 
             <a class="sideAdd" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sponsor_image_size'); ?></a>
          <?php }
                  } 
             wp_reset_postdata();
          ?>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
            <?php
                $args = array(
                  'orderby' => 'name',
                  'parent' => 0
                  );
                $categories = get_categories( $args );
                foreach ( $categories as $category ) { ?>
                    <option>
                        <?php echo '<a href="' . get_category_link( $category->term_id ) . '">' . $category->name . '</a>'; ?>
                    </option>
                 <?php
                     } 
                  ?>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="http://localhost/my-projects/newsfeed/blog/">Blog</a></li>
              <li><a href="http://localhost/my-projects/newsfeed/wp-login.php?loggedout=true&wp_lang=en_US">Login</a></li>
              
              <li><a href="#">Publice Policy</a></li>
            </ul>
          </div>
          
        </aside>