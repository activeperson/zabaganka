

<?php get_template_part( 'parts/breadcrumb' ); ?>


<!-- order-section -->
<section class="order-section" >
    <div class="container wrapper">
        <div class="section_title">
            <h2>Оформление заказа</h2>
        </div>

        <div class="woocommerce-notices-wrapper"></div>
     
        <div class="order_holder mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="order-form_holder">

                        <!--  id="order_form" class="checkout"  -->
                        <form name="checkout" class="checkout order_holder"  method="post"  action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
                            <div class="js__reload_checkout"></div>
                        </form>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ordered-products">
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php woocommerce_order_review(); ?>
                        </div>
                    </div>

                    <?php echo woocommerce_checkout_coupon_form(); ?>

                </div>
            </div>
        </div>
         
         
    </div> 
</section>
<!--    order-section end -->



<!--    order-actions -->
<section class="order-actions">
    <div class="container wrapper">
       <a href="dostavka-i-oplata/">Доставка и оплата</a>
       <a href="politika-vozvrata/">Политика возврата</a>
    </div>
</section>
<!--    order-actions end-->



<?php // нужно для работы e-commerce плагинов ?>
<?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>
<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>