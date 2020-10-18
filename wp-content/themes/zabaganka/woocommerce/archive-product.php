<?php get_header(); ?>


	<?php get_template_part( 'parts/breadcrumb' ); ?>


	<section class="page_title">
		<div class="container wrapper">
		<?php  if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		<?php endif;  ?>
		</div>
	</section>
	
	<section class="catalog_main" id="primary" >
		<div class="container wrapper" id="main" >
			<div class="row">
				<div class="col-lg-9 order-lg-0 order-1 mt-lg-0 mt-5">
					
					<!--filter_main-->
					<div class="filter_main">
						<div class="row justify-content-between align-items-center">
							<div class="col-auto">
								<?php woocommerce_catalog_ordering(); ?>
							</div>
							<div class="col-auto">
								<?php woocommerce_result_count(); ?>
							</div>
						</div>
					</div>
					<!--catalog_archive-->
					<div class="catalog_archive">
  						<?php 
  						if ( woocommerce_product_loop() ) {

							// woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 *
									 * @hooked WC_Structured_Data::generate_product_data() - 10
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							// woocommerce_product_loop_end();

						} else {
							/**
							 * Hook: woocommerce_no_products_found.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						}
						?>
					</div>
					
				</div>
				<div class="col-lg-3 order-lg-1 order-0">
					
					<!--sidebar_main-->
					<div class="sidebar_main">
						<?php 
						$cur_cat_obj   = get_queried_object();
					  	$cur_term_id   = $cur_cat_obj->term_id;

						$top_cat_id = get_top_level_term($cur_cat_obj, 'product_cat')->term_id;
						// echo $top_cat_id;
					   ?>

						<?php 
				        $product_categories = get_taxonomy_hierarchy('product_cat');
				        if(!empty($product_categories)) : 
				        ?>

						<?php if ($cur_term_id): // если есть id таксономии, тогда выводим её дочерние элементы ?>
							<!--sidebar_main-->
							<ul class="category-nav_holder">
							<?php
							// pre_print_r($product_categories[$cur_term_id]);


							$category = $product_categories[$top_cat_id]; ?>

					        	<?php if ($category->view_in_catalogue) : ?>
						        	<li class="lv-1">
						  				<ul>
			                            	<?php foreach ($category->children as $subcategory): ?>
			                            		<?php if ($subcategory->view_in_catalogue) : ?>
													<li class="lv-2">
														<a href="<?php echo get_term_link( $subcategory->term_id ); ?>" class="<?php if ( $cur_term_id == $subcategory->term_id ) echo 'active' ?>" ><?php echo $subcategory->name ?></a>
													</li>
												<?php endif; ?>
			                                <?php endforeach; ?>
			                            </ul>
						  			</li>
					  			<?php endif; ?>
	                      	</ul>
						<?php else: // если нет id таксономии, значит это страница каталога ?>
							<!--sidebar_main-->
							<ul class="category-nav_holder">
							<?php
					        foreach ($product_categories as $category): ?>
					        	<?php if ($category->view_in_catalogue) : ?>
						        	<li class="lv-1">
						  				<a class="<?php if ( $cur_term_id == $category->term_id ) echo 'active' ?>" href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name ?></a>
						  			</li>
					  			<?php endif; ?>
	                      	<?php endforeach; ?>
	                      	</ul>
						<?php endif; ?>




						<?php endif; // if(!empty($product_categories))  ?>

					</div>
					
				</div>
			</div>
		</div>
	</section>
  
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