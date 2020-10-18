<?php get_header(); ?>


  <?php get_template_part( 'parts/breadcrumb' ); ?>


  <!-- page_title -->
  <section class="page_title">
    <div class="container wrapper">
      <h1 class="page-title">Блог</h1>
    </div>
  </section>
  <!-- end page_title -->


  <!-- blog-archive -->
  <section class="blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
            $h1_title = get_post_meta($post->ID, 'h1_title', 1);
          ?>


            <!-- blog-archive -->
            <div class="blog-archive__item">
              <div class="row">
                <div class="col-md-5">
                  <div class="blog-archive__item__image">
                   <?php the_post_thumbnail('480_320'); ?>   
                  </div>             
                </div>
                <div class="col-md-7 pr-md-6 mt-md-0 mt-5">
                  <div class="blog-archive__item__content">
                    <a href="<?php the_permalink(); ?>" class="title">
                      <h3 class="blog_arch__item__title"><?php echo $h1_title; ?></h3>
                    </a>
                    <div class="description mt-3">
                      <p><?php text_limit( $post->post_content, 500, "..." ); ?></p>
                    </div>
                    <div class="action">
                      <a href="<?php the_permalink(); ?>" target="_blank" class="btn_s_2">Подробнее</a>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- end blog-archive -->

      
          <?php endwhile; else: ?>
            <p><?php _e('Записей в блоге нет.'); ?></p>
          <?php endif; ?>

        </div>
      </div>

    </div>
  </section>
  <!-- end blog-archive -->

  <section class="pagination_main">
    <div class="container wrapper">
      <?php
        the_posts_pagination(array(
          'prev_text' => __('<i class="fa fa-caret-left" aria-hidden="true"></i>'),
          'next_text' => __('<i class="fa fa-caret-right" aria-hidden="true"></i>')
        ));
      ?>
    </div>
  </section>

<?php get_footer(); ?>