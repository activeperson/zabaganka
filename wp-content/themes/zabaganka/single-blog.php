<?php get_header(); ?>


  <?php get_template_part( 'parts/breadcrumb' ); ?>


  <!-- page_title -->
  <section class="page_title">
    <div class="container wrapper">
      <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
  </section>
  <!-- end page_title -->


<section class="blog-single">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      
       	<div class="blog-single__image">
		 	<?php the_post_thumbnail('full'); ?>   
		</div> 
       
       <div class="blog-single__content mt-5">
       		<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
       </div>
        
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>