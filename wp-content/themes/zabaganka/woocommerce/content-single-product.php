<?php

global $product;
$product_id = $product->get_id();
// pre_print_r($product);

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>


<!--	 product_card -->
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

						<?php // если товар вариативный ?>
						<?php if ($product->get_type() === 'variable') : ?>
							<div class="variable-item_holder">
								<?php woocommerce_variable_add_to_cart(); ?>
							</div>
						<?php // если товар не вариативный ?>
						<?php else: ?>
							<div class="price_holder mt-2">
								<span class="text">Цена:</span>
								<span class="price"><?php echo $product->get_price(); ?></span>
								<span class="currency"><?php echo get_woocommerce_currency(); ?></span>
							</div>

							<?php woocommerce_template_single_add_to_cart() ?>
						<?php endif; ?>

						<div class="line"></div>
						
						<div class="description-list">
							<?php echo get_post_meta($product_id, 'product_composition', true); ?>
						</div>
									
						<div class="line"></div>
						
						<div class="description_holder">
  							<div class="tabs">
							  <ul class="tabs__caption description_title">
							    <li class="active">Описание</li>
							    <li class="">Отзывы</li>
							  </ul>
							  <div class="tabs__content active description_content">
							    <?php echo htmlspecialchars_decode ($product->get_description( $context ) ); ?>
							  </div><div class="tabs__content">
							    <?php comments_template( 'single-product-reviews' ); ?>
							  </div>
							 
							</div>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</section>
<!--  product_card-->


<!--    wow_this-->
<section class="wow_this mt-5" >
	<div class="container wrapper">
		 
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

<?php 
$repeater = UI_Repeater::wps__get_repeater( 'repeater' );
// pre_print_r($repeater);
?>

<?php if (is_array($repeater)) : ?>


<!--	how-use_section -->
<section class="how-use_section">
	<div class="container wrapper">
	
		<?php 
		$switch = false;
		foreach ($repeater as $key => $value) :
		?>
		<?php if ($switch): ?>
		<div class="how-use_item mt-2 mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="title"><?php echo $value['title']; ?></div>
				</div>
				<div class="col-md-6">
					<div class="content">
						<?php echo wpautop($value['textarea']); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="image">
						<?php echo wp_get_attachment_image($value['image'], '540_270'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php else: ?>
		<div class="how-use_item mt-2 mb-4">
			<div class="row">
				<div class="col-md-6 offset-md-6">
					<div class="title"><?php echo $value['title']; ?></div>
				</div>
				<div class="col-md-6">
					<div class="image">
						<?php echo wp_get_attachment_image($value['image'], '540_270'); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content">
						<?php echo wpautop($value['textarea']); ?>
					</div>
				</div>
			</div>
		</div>
		<?php endif;
			$switch = !$switch;
		?>
		<?php endforeach; ?>
		
	</div>
</section>
<!--	how-use_section end -->

<?php endif; ?>


<?php 
// блок наборов
woocommerce_upsell_display();
?>
 
<?php 
// блок "похожие товары"
$args = array(
	'posts_per_page' => 4,
);
echo woocommerce_related_products($args);
?>
	 

<?php get_template_part( 'parts/reviews_slider' ); ?>