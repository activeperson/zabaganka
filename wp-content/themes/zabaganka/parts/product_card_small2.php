<?php 
global $product;
$product_id = $product->get_id();
// pre_print_r($product);
?>


<?php 
	// получаем ссылку на товар
	$permalink = get_permalink($product_id);
?>


<div <?php wc_product_class( 'product_item_prew', $product ); ?> >
	<div class="labels_holder">
		<!-- <div class="label label_discount">-15%</div> -->
	</div>
	<div class="image_holder">
		<a href="<?php echo $permalink; ?>">
			<?php echo woocommerce_get_product_thumbnail(); ?>
		</a>
	</div>
	<div class="content_holder">
		<p class="name"><?php echo $product->get_name(); ?></p>

		
		<?php if ($product->get_type() !== 'variable') : ?>
			<?php if ($product->is_on_sale()): ?>
				<div class="price_holder">
					<del class="old_price">
						<div class="amount">
							<?php echo $product->get_regular_price(); ?>
						</div>
					</del>
					<div class="main_price discount">
						<div class="amount">
							<?php echo $product->get_sale_price(); ?>
						</div>
					</div>
					<div class="currency">
						<?php echo get_woocommerce_currency(); ?> 
					</div>
				</div>
			<?php else: ?>
				<div class="price_holder">
					<div class="main_price">
						<div class="amount"><?php 
						if ($product->get_price() !== '') {
							echo $product->get_price();
						} else {
							echo $product->get_regular_price();
						} ?></div>
					</div>
					<div class="currency">
						<?php echo get_woocommerce_currency(); ?> 
					</div>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<p class="price"> </p>


		<a href="<?php echo $permalink; ?>" class="btn btn_s_2" >Подробнее</a>
	</div>
</div>