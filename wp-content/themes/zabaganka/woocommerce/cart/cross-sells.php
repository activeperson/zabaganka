<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
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

if ( $cross_sells ) : ?>

	<!--    more-product_section -->
	<section class="more-product_section">
		<div class="container wrapper">
			<div class="section_title">
				<h2>Дополнительные товары к вашему заказу</h2>
			</div>
			
			<div class="more-product_holder mt-5">
				<div class="row justify-content-center">
					<?php foreach ( $cross_sells as $cross_sell ) : ?>
						<div class="col-auto">

						<?php
						 	$post_object = get_post( $cross_sell->get_id() );

							setup_postdata( $GLOBALS['post'] =& $post_object );

							wc_get_template_part( 'content', 'product-small' ); ?>

						</div>

					<?php endforeach; ?>
				</div>
			</div>
		
		</div>
	</section>
	<!--	more-product_section end -->

<?php endif;

wp_reset_postdata();
