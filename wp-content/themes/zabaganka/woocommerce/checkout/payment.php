
<?php if ( WC()->cart->needs_payment() ) : ?>
	<?php if ( ! empty( $available_gateways ) ) : ?>
	<div class="form-group mt-4">
        <div class="field_name">Способ оплаты</div>
        <div class="select_holder">
            <select name="payment_method">
            	<?php foreach ( $available_gateways as $gateway ): ?>
                	<option value="<?php echo $gateway->id ?>"><?php echo $gateway->title ?></option>
            	<?php endforeach; ?>
            </select>
        </div>
    </div>
	<?php endif; ?>
<?php endif; ?>

<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
