<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>



<!--    related-products -->
<section class="related-products_section" >
	<div class="container wrapper">
		<div class="section_title">
			<h2>С этим товаром обычно покупают</h2>
		</div>
		
		<div class="related-products_holder mt-5">
			<div class="row justify-content-center align-items-center">


				<?php
					$upsells_product_id = $upsells[0]->get_id();
					$post_object = get_post( $upsells_product_id );
					setup_postdata( $GLOBALS['post'] =& $post_object );
					global $product;
					// pre_print_r($product);
				?>

				<?php 
					$product_in_box = $product->get_items();
					$product_discount = $product->get_discount();
					$product_sale_price = $product->get_sale_price();
					if (is_array($product_in_box)) :
				?>
	
			 	<?php 
				 	$_pf = new WC_Product_Factory();
				 	$index_item = 0;
				 	foreach ($product_in_box as $key => $value):
			 	?>
				<?php 
					$product_item = $_pf->get_product($value['id']);
					$product_item->box_item_qty = $value['qty'];
				?>

				<?php if ($index_item !== 0):  ?>
				<div class="col-auto">
					<span class="big_ico">+</span>
				</div>
				<?php endif; ?>
				

				<div class="col-auto">
					<div class="product_item_prew">
						<div class="image_holder">
							<?php echo $product_item->get_image( ); ?>
						</div>
						<div class="content_holder">
							<p class="name"><?php echo $product_item->get_name(); ?></p>
							<p class="price"><?php echo $product_item->get_price(); ?> <?php echo get_woocommerce_currency(); ?></p>
						</div>
					</div>
				</div>

			 	<?php 
			 	$index_item++;
			 	endforeach;
			 	?>
						 
				<?php endif; ?>

				<div class="col-auto">
					<span class="big_ico">=</span>
				</div>
				
				<div class="col-auto">
					<div class="discount">
						<div class="text">скидка</div>
						<div class="value"><?php echo $product_discount; ?>%</div>
					</div>
					<div class="price_holder mt-4">
						<div class="text">Цена:</div>
						<div class="value"><?php echo $product_sale_price; ?></div>
						<div class="currency"><?php echo get_woocommerce_currency(); ?></div>
					</div>
					
					<?php 
					$args = [
						'class' => 'btn btn_s_4 mt-4 add_to_cart_button ajax_add_to_cart',
					];
					woocommerce_template_loop_add_to_cart($args);
					?>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!--    related-products end -->

<?php endif;

wp_reset_postdata();
