<?php
	/*
	Template Name: Главная
	Template Post Type: page
	*/
	get_header();
?>




<!--    top_baner-->
    <section class="top_baner">
    	<div class="container wrapper">
			<div class="top_baner__content col-lg-6 col-md-10">
				<p class="t1">Товары для дома</p>
				<p class="t2 mt-3">ВСЕ ЧТО НУЖНО ТЕБЕ</p>
				<p class="t3 mt-3">для комфортной жизни</p>
				<a href="<?php echo get_option('wps_theme_main_settings')['link_to_more']; ?>" class="btn_s_3 mt-4" >Подробнее <i class="ico_dbl_arrow_right" ></i></a>
			</div>
    	</div> 
    </section>
<!--    top_baner end -->
    
<!--    popular_products-->
    <section class="popular_products" >
    	<div class="container wrapper">
    		 <div class="section_title">
				<h2>Популярные товары</h2>
    		 </div>

			<div class="product_prew_list mt-5">
				<div class="row justify-content-center">
					<?php
					$args = array(
		            'post_type' => 'product',
		            'posts_per_page' => 4,
		            'tax_query' => array(
		                    array(
		                        'taxonomy' => 'product_visibility',
		                        'field'    => 'name',
		                        'terms'    => 'featured',
		                    ),
		                ),
		            );
					  $custom_loop = new WP_Query( $args );
					  while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
					?>

						<div class="col-lg-3 col-sm-6 mt-lg-0 mt-3">
							<?php get_template_part( 'parts/product_card_small2' ); ?>
						</div>
					<?php 
					  endwhile;
					  wp_reset_postdata();
					?>
				</div>
			</div>
    		 		
    	</div> 
    </section>
<!--    popular_products end -->
    
<!--    insta_widget-->
    <section class="insta_widget mobile_none">
    	<div class="container wrapper">
    		 <div class="section_title">
    		 		<h2>Мы в Instagram</h2>
    		 </div>
    		 
    		 <div class="insta_widget_deco"></div>
    		 
    		 <div class="insta_widget__holder mt-5">
					<div class="row">
						<div class="col-md-7">
							<div class="row">

								<?php
								  $args = array(
								    'post_type'  => 'instawidget',
								    'order'      => 'DESC',
								    'offset'      => 1,
								    'posts_per_page' => 6
								  );
								  $name = get_posts( $args );
								  foreach( $name as $post ){ setup_postdata($post);
								?>
								  
								<div class="col-md-4 mb-4 col-6">
									<div class="iw_s_item">
										<a href="<?php echo get_post_meta($post->ID, 'post_url', true) ?>" target="_blank">
											<i class="fa fa-link" aria-hidden="true"></i>
										</a>
										<?php echo wp_get_attachment_image(get_post_meta($post->ID, 'image', true), '191_191'); ?>
									</div>
								</div>
								<?php
								}
								  wp_reset_postdata();
								?>
							</div>
						</div>
						<div class="col mt-md-0 mt-4">
							<?php
							  $args = array(
							    'post_type'  => 'instawidget',
							    'order'      => 'DESC',
							    'offset'      => 0,
							    'posts_per_page' => 1
							  );
							  $name = get_posts( $args );
							  foreach( $name as $post ){ setup_postdata($post);
							?>
							  
							<div class="iw_b_item">
								<a href="<?php echo get_post_meta($post->ID, 'post_url', true) ?>" target="_blank">
									<i class="fa fa-link" aria-hidden="true"></i>
								</a>
								<?php echo wp_get_attachment_image(get_post_meta($post->ID, 'image', true), '410_410'); ?>
							</div>
							<?php
							}
							  wp_reset_postdata();
							?>
						</div>
					</div>
    		 </div>
    		 
    	</div> 
    </section>
<!--    insta_widget end -->
    
<!--    wow_this-->
    <section class="wow_this" >
    	<div class="container wrapper">
    		 <div class="section_title">
    		 		<h2>Zabaganka это</h2>
    		 </div>
    		 
    		 <div class="wow_this__holder mt-5">
				<div class="row">
					<div class="col-md-3 col-6">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/01.png" alt="">
							<p class="title">Украинская компания</p>
						</div>
					</div>
					<div class="col-md-3 col-6">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/03.png" alt="">
							<p class="title">Гарантия возврата средств</p>
						</div>
					</div>
					<div class="col-md-3 col-6 mt-md-0 mt-4">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/02.png" alt="">
							<p class="title">Экологически чистые материалы</p>
						</div>
					</div>
					<div class="col-md-3 col-6 mt-md-0 mt-4">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/04.png" alt="">
							<p class="title">Внимание к деталям</p>
						</div>
					</div>
				</div>
    		 </div>
    		 
    	</div> 
    </section>
<!--    wow_this end -->
    
 
  
<!--  social_networks-->
    <section class="social_networks mobile_none" >
    	<div class="container wrapper">
    		 <div class="section_title">
				<h2>Подписывайтесь на нас<br>в соц. сетях:</h2>
    		 </div>
    		 
    		 <div class="insta_widget_deco"></div>
    		 <div class="insta_widget_deco2"></div>
    		 
    		 <div class="row mt-5">
    		 	<div class="col-md-6">
    		 		<div class="fb_widget">
    		 			<div class="fb-page" data-href="https://www.facebook.com/zabagankashop/" data-tabs="timeline" data-width="600" data-height="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/zabagankashop/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zabagankashop/" rel="nofollow">Zabaganka</a></blockquote></div>
    		 		</div>
    		 	</div>
    		 	<div class="col-md-6 mt-md-0 mt-5">
    		 		<a href="https://www.instagram.com/zabaganka_eco/" target="_blank">
	    		 		<div class="insta_widget">
	    		 			<!--<?php echo do_shortcode('[instagram-feed]'); ?>-->
	    		 			<img src="wp-content/themes/zabaganka/assets/img/home/instagram.png" alt="">
	    		 		</div>
	    		 	</a>
    		 	</div>
    		 </div>
    		 
    	</div> 
    </section>
<!--    social_networks end -->



<?php get_footer(); ?>