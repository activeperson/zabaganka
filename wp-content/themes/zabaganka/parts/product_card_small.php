<?php 
global $product;
$product_id = $product->get_id();
// global $post;
// pre_print_r($product);
// pre_print_r($post);
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
		<p class="price"><?php echo $product->get_price(); ?> <?php echo get_woocommerce_currency(); ?></p>
		<?php 
			$args = [
				'class' => 'btn btn_s_2 to_cart_btn add_to_cart_button',
			];
			woocommerce_template_loop_add_to_cart($args);
		?>
	</div>
</div>