<?php 
global $product;
$product_id = $product->get_id();
// global $post;
// pre_print_r($product);
// pre_print_r($post);
// pre_print_r();

// карточка для каталога
?>


<?php 
	// получаем ссылку на товар
	$permalink = get_permalink($product_id);
?>

<!-- product-card_large -->
<div <?php wc_product_class( 'product-card_large', $product ); ?> >
	<div class="row">
		<div class="col-md-5">
			<div class="image">
				<a href="<?php echo $permalink; ?>">
					<?php echo woocommerce_get_product_thumbnail(); ?>
				</a>
				<div class="label_holder">
					<!-- <div class="label new">NEW!</div> -->
				</div>
			</div>
		</div>
		<div class="col mt-md-0 mt-5">
			<div class="content pr-md-6 pr-0">
				<a href="<?php echo $permalink; ?>">
					<p class="procust-title"><?php echo $product->get_name(); ?></p>
				</a>
				<p class="subtitle"><?php echo wpautop($product->get_short_description()); ?></p>
				<div class="description">
					<?php echo get_post_meta($product_id, 'product_composition', true); ?>
				</div>

				<?php if ($product->get_type() === 'variable') : ?>

					<?php if ($product->is_on_sale()): ?>
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
					<?php // если товар без скидки ?>
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

					<div class="actions mt-4">
						<a href='<?php echo $permalink; ?>' class="btn_s_1 buy_btn">Подробнее</a>
						<a href='<?php echo $permalink; ?>' class="btn_s_2 buy_btn">Купить</a>
					</div>
				<?php // если товар не вариативный ?>
				<?php else: ?>

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

					<div class="actions">
						<a href='<?php echo $permalink; ?>' class="btn_s_1 buy_btn">Подробнее</a>
						<?php 
						$args = [
							'class' => 'btn_s_2 to_cart_btn add_to_cart_button ajax_add_to_cart',
						];
						woocommerce_template_loop_add_to_cart($args);
						?>
					</div>
				<?php endif; ?>


			</div>
		</div>
	</div>
</div>
