<?php 
global $product;
$product_id = $product->get_id();
// global $post;
// pre_print_r($product);
// pre_print_r($post);
// pre_print_r(get_post_meta($product->get_id()));
?>


<?php 
	// получаем ссылку на товар
	$permalink = get_permalink($product_id);
?>

<!-- product-card_large -->
<div <?php wc_product_class( 'product-card_large', $product ); ?> >
	<div class="row">
		<div class="col-md-4">
			<div class="image">
				<?php echo woocommerce_get_product_thumbnail(); ?>
			
				<div class="label_holder">
					<?php if ($product->product_discount) : ?>
						<div class="label discount"><?php echo $product->product_discount; ?>%</div>
					<?php endif; ?>
					<!-- <div class="label new">NEW!</div> -->
				</div>
			</div>
		</div>
		<div class="col mt-md-0 mt-5">
			<div class="content pr-md-6 pr-0">
				<?php if ($product->box_item_qty) : ?>
					<p class="procust-title"><?php echo $product->get_name(); ?> <?php echo 'x '; echo $product->box_item_qty;  ?></p>
				<?php else: ?>
					<p class="procust-title"><?php echo $product->get_name(); ?></p>
				<?php endif; ?>
				<p class="subtitle"><?php echo wpautop($product->get_short_description()); ?></p>
				<div class="description">
					<?php echo get_post_meta($product_id, 'product_composition', true); ?>
				</div>

				<?php if ($product->product_discount > 0): ?>
					<div class="price_holder">
						<del class="old_price">
							<div class="amount">
								<?php echo $product->get_price(); ?>
							</div>
						</del>
						<div class="main_price">
							<div class="amount">
								<?php echo get_dicount_price($product->get_price(), $product->product_discount); ?>
							</div>
						</div>
						<div class="currency">
							<?php echo get_woocommerce_currency(); ?> 
						</div>
					</div>
				<?php else: ?>
					<div class="price_holder">
						<div class="main_price">
							<div class="amount">
								<?php echo $product->get_price(); ?>
							</div>
						</div>
						<div class="currency">
							<?php echo get_woocommerce_currency(); ?> 
						</div>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>
