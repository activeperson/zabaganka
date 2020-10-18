
<div class="woocommerce-checkout-review-order-table">
	<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				
				<div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
				    <div class="row">
				        <div class="col-md-3">
				            <div class="image">
				                <a href="<?php echo get_permalink($_product->get_id()) ?>">
				                    <?php echo wp_get_attachment_image( $_product->get_image_id(), 'little'); ?>
				                </a>
				            </div>
				        </div>
				        <div class="col-md">
				            <div class="content">
				                <a href="<?php echo get_permalink($_product->get_id()) ?>" class="title"><?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?></a>
				                <div class="price_holder">
				                    <span class="value"><?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></span>
				                    <span class="currency">UAh</span>
				                </div>
				                <div class="amount">
				                    <span class="text">Количество:</span>
				                    <span class="value"><?php echo $cart_item['quantity']; ?></span>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>

				<?php
			}
		}
	?>

	<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
		<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
			<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
			<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
		</tr>
	<?php endforeach; ?>

	<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
		<tr class="fee">
			<th><?php echo esc_html( $fee->name ); ?></th>
			<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
		</tr>
	<?php endforeach; ?>

	<div class="order-total mt-4">
        <div class="cart-total_holder">
            <div class="text">Итого:</div>
            <div class="value"><?php wc_cart_totals_order_total_html(); ?></div>
            <div class="currency"><?php echo get_woocommerce_currency(); ?></div>
        </div>
    </div>

</div>
