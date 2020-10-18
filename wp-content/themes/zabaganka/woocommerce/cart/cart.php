<?php get_header(); ?>


	<?php get_template_part( 'parts/breadcrumb' ); ?>


<!-- cart-section -->
    <section class="cart-section" >
    	<div class="container wrapper">
			<div class="section_title">
				<h2>Корзина</h2>
			</div>

			<div class="mt-5">
				<?php woocommerce_output_all_notices(); ?>
			</div>
		 
			<div class="cart_holder mt-5">
				<div class="row">
					<div class="col-md">

						<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

							
							<button type="submit" class="button btn_s_1" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>


							<div class="woocommerce-cart-form__contents">

								<?php
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>

										<?php 
										// pre_print_r($cart_item);
										 ?>

										 <?php 
										 // если это товар - комплект
										 if ( $cart_item['woosb_ids'] ): 
										 ?>
										 	<div class="cart_item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
												<div class="row">
													<div class="col-md-auto">
														<div class="image">
															<a href="<?php echo $product_permalink; ?>">
																<?php echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ); ?>
															</a>
														</div>
													</div>
													<div class="col-md mt-md-0 mt-4">
														<div class="content">
															<a href="<?php echo $product_permalink; ?>" class="title"><?php echo $_product->get_name(); ?></a>
															<div class="price_holder">
																<span class="value"><?php echo $cart_item['woosb_price']; ?></span>
																<span class="currency"><?php echo get_woocommerce_currency(); ?></span>
															</div>

															<?php
															if ( $_product->is_sold_individually() ) {
																$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
															} else {
																$product_quantity = woocommerce_quantity_input( array(
																	'input_name'   => "cart[{$cart_item_key}][qty]",
																	'input_value'  => $cart_item['quantity'],
																	'max_value'    => $_product->get_max_purchase_quantity(),
																	'min_value'    => '0',
																	'product_name' => $_product->get_name(),
																), $_product, false );
															}

															echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
															?>

															<div class="product-remove remove_btn">
																<?php
																	// @codingStandardsIgnoreLine
																	echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
																		'<a href="%s" class="" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="ico_remove"></i></a>',
																		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
																		__( 'Remove this item', 'woocommerce' ),
																		esc_attr( $product_id ),
																		esc_attr( $_product->get_sku() )
																	), $cart_item_key );
																?>
															</div>

													<!-- 		<div class="amount">
																<span class="text">Количество:</span>
																<span class="value"><?php echo $cart_item['quantity']; ?></span>
															</div> -->

														</div>
													</div>
												</div>
											</div>
										 <?php else: ?>
										 	<div class="cart_item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
												<div class="row">
													<div class="col-md-auto">
														<div class="image">
															<a href="<?php echo $product_permalink; ?>">
																<?php echo apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key ); ?>
															</a>
														</div>
													</div>
													<div class="col-md mt-md-0 mt-4">
														<div class="content">
															<a href="<?php echo $product_permalink; ?>" class="title"><?php echo $_product->get_name(); ?></a>
															<div class="price_holder">
																<span class="value"><?php echo $_product->get_price(); ?></span>
																<span class="currency"><?php echo get_woocommerce_currency(); ?></span>
															</div>

															<?php
															if ( $_product->is_sold_individually() ) {
																$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
															} else {
																$product_quantity = woocommerce_quantity_input( array(
																	'input_name'   => "cart[{$cart_item_key}][qty]",
																	'input_value'  => $cart_item['quantity'],
																	'max_value'    => $_product->get_max_purchase_quantity(),
																	'min_value'    => '0',
																	'product_name' => $_product->get_name(),
																), $_product, false );
															}

															echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
															?>

															<div class="product-remove remove_btn">
																<?php
																	// @codingStandardsIgnoreLine
																	echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
																		'<a href="%s" class="" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="ico_remove"></i></a>',
																		esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
																		__( 'Remove this item', 'woocommerce' ),
																		esc_attr( $product_id ),
																		esc_attr( $_product->get_sku() )
																	), $cart_item_key );
																?>
															</div>

													<!-- 		<div class="amount">
																<span class="text">Количество:</span>
																<span class="value"><?php echo $cart_item['quantity']; ?></span>
															</div> -->

														</div>
													</div>
												</div>
											</div>
										 <?php endif; ?>

										

										<?php
									}
								}
								?>
								<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
							</div>


							<button type="submit" class="button btn_s_1" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
						</form>
					</div>

					<div class="col-auto">
						<div class="cart-sidebar">
							<div class="cart_totals">
								<div class="cart-total_holder">
									<div class="text">Итого:</div>
									<div class="value woocommerce-Price-amount amount"><?php echo WC()->cart->get_cart_subtotal() ?></div>
									<div class="currency"><?php echo get_woocommerce_currency(); ?></div>
								</div>
						
								<a href="checkout" class="go_order btn_s_1 mt-4">Оформить заказ</button>

								<a href="shop" class="back_to_shop btn_s_2 mt-4">Продолжить покупки</a>
							</div>
						</div>
					</div>
				</div>
			</div>
    		 
    	</div> 
    </section>
<!--    cart-section end -->


<?php 
// вывод товаров для доп продажи
echo woocommerce_cross_sell_display()
?>


 
 
<?php $shop_options = get_option('wps_theme_settings_shop'); ?>


<!--    cart-promo -->
<!-- 	<section class="cart-promo_section">
		<div class="container wrapper">
			<div class="cart-promo">
				<div class="text">При заказе от <span><?php echo $shop_options['free_delivery_cost'] ?> UAH</span> доставка бесплатная!</div>
			</div>
		</div>
	</section> -->
<!--	cart-promo end -->



<?php if ( floatval( preg_replace( '#[^\d.]#', '', WC()->cart->get_cart_total() ) ) < (int)$shop_options['free_delivery_cost']) : ?>
	<!--    popular_products-->
    <section class="popular_products" >
    	<div class="container wrapper">
    		 <div class="section_title">
				<h2>Дополнительные товары к вашему заказу</h2>
    		 </div>

			<div class="product_prew_list mt-5">
				<div class="row justify-content-center">
					<?php
					$args = array(
		            	'post_type' => 'product',
			            'posts_per_page' => 4,
			            'post__in' => $shop_options['products_list'],
		            );
					  $custom_loop = new WP_Query( $args );
					  while ( $custom_loop->have_posts() ) : $custom_loop->the_post(); 
					?>

						<div class="col-lg-3 col-sm-6 mt-lg-0 mt-3">
							<?php get_template_part( 'parts/product_card_small' ); ?>
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
	
<?php endif; ?>


<?php get_footer(); ?>