<?php

global $product;
// pre_print_r($product);

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>


<!-- product_card -->
<section  id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product_card', $product ); ?>>
	<div class="container wrapper">

		<div class="row">
			<div class="col-md-12">
				<?php 
				/**
				 * Hook: woocommerce_before_single_product.
				 *
				 * @hooked wc_print_notices - 10
				 */
				do_action( 'woocommerce_before_single_product' );
				 ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-5">
				<?php get_template_part( 'parts/product_card_gallery' ); ?>	
			</div>

			<div class="col-md-7">
				<div class="product_card_content">
					<h2 class="product_title"><?php echo $product->get_name(); ?></h2>

					<?php //pre_print_r($product); ?>
					
					<div class="price_holder mt-2">
						<span class="text">Цена:</span>
						<span class="price"><?php 
						if ($product->get_price() !== '') {
							echo $product->get_price();
						} else {
							echo $product->get_regular_price();
						} ?></span>
						<span class="currency"><?php echo get_woocommerce_currency(); ?></span>
					</div>
					
					
					<?php woocommerce_template_single_add_to_cart() ?>

								
					<div class="line"></div>
					
					<div class="description_holder">
						<div class="description_title">Описание</div>
						<div class="description_content">
							<?php echo $product->get_description( $context ); ?>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
<!--  product_card-->


<!-- wow_this-->
<section class="wow_this mt-5" >
	<div class="container wrapper">
		 
		 <div class="wow_this__holder">
				<div class="row">
					<div class="col-md-3 col-6">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/01.png" alt="">
							<p class="title">Украинский бренд</p>
						</div>
					</div>
					<div class="col-md-3 col-6">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/02.png" alt="">
							<p class="title">Ручное производство</p>
						</div>
					</div>
					<div class="col-md-3 col-6">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/03.png" alt="">
							<p class="title">Гарантия Возврата средств</p>
						</div>
					</div>
					<div class="col-md-3 col-6">
						<div class="wow_this__item">
							<img src="<?php echo REL_ASSETS_URI; ?>img/home/wow_this/04.png" alt="">
							<p class="title">Без гмо</p>
						</div>
					</div>
				</div>
		 </div>
		 
	</div> 
</section>
<!--    wow_this end -->


<?php 
$product_in_box = $product->get_items();
if (is_array($product_in_box)) :
?>

<!--	what-in-box__section -->
<section class="what-in-box__section">
	<div class="container wrapper">
		 <div class="section_title">
			<h2>товары в комплекте</h2>
		 </div>

		<?php $product_discount = $product->get_discount(); ?>
		 
		 <div class="row justify-content-center">
		 	<div class="col-xl-10">
		 		
			 <div class="what-in-box__holder mt-5">
			 	<?php 
				 	$_pf = new WC_Product_Factory();
				 	foreach ($product_in_box as $key => $value):
			 	?>
				<?php 
					$product = $_pf->get_product($value['id']);
					$product->box_item_qty = $value['qty'];
					$product->product_discount = $product_discount;
			 		// pre_print_r($product);
				?>

				<?php get_template_part( 'parts/product_card_large2' ); ?>
			 	<?php endforeach; ?>
			 </div>
		 
		 	</div>
		 </div>
	
	</div>
</section>
<!--	what-in-box__section end -->

<?php endif; ?>


<?php get_template_part( 'parts/reviews_slider' ); ?>