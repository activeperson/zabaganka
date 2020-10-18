<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

if ( $related_products ) : ?>

<!--    similar-products -->
    <section class="similar-products" >
    	<div class="container wrapper">
    		 <div class="section_title">
    		 		<h2>Похожие товары</h2>
    		 </div>
    		 		
			<div class="product_prew_list mt-5">
				<div class="row justify-content-center">
					<?php foreach ( $related_products as $related_product ) : ?>
						<div class="col-lg-3 col-sm-6 mt-lg-0 mt-3">
							<?php
							 	$post_object = get_post( $related_product->get_id() );

								setup_postdata( $GLOBALS['post'] =& $post_object );
							?>
							<?php get_template_part( 'parts/product_card_small2' ); ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
    		 		
    	</div> 
    </section>
<!--    popular_products end -->

<?php endif;

wp_reset_postdata();
