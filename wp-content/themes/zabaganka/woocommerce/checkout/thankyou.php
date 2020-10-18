
<!-- thanks-section -->
<section class="thanks-section">
	<div class="container wrapper">
		<div class="thanks-section_content">
			<div class="title">Благодарим за заказ!</div>
			<div class="subtitle">В ближайшее время с Вами свяжется наш менеджер</div>
		</div>
	</div>
</section>
<!-- thanks-section end -->
 
 
<!--  social_networks-->
    <section class="social_networks" >
    	<div class="container wrapper">
    		 <div class="section_title">
				<h2>Подписывайтесь на нас<br>в соц. сетях:</h2>
    		 </div>
    		 
    		 <div class="insta_widget_deco"></div>
    		 <div class="insta_widget_deco2"></div>
    		 
    		 <div class="row mt-5">
    		 	<div class="col-md-6">
    		 		<div class="fb_widget">
    		 			<div class="fb-page" data-href="https://www.facebook.com/zabagankashop/" data-tabs="timeline" data-width="600" data-height="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/zabagankashop/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/zabagankashop/" rel="nofollow">Скрабы TOUCH</a></blockquote></div>
    		 		</div>
    		 	</div>
    		 	<div class="col-md-6 mt-md-0 mt-5">
    		 		<div class="insta_widget">
    		 			<?php echo do_shortcode('[instagram-feed]'); ?>
    		 		</div>
    		 	</div>
    		 </div>
    		 
    	</div> 
    </section>
<!--    social_networks end -->



<?php if ( $order ) : ?>

	<?php // нужно для работы e-commerce плагина на странице благодарности ?>

	<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

<?php endif; ?>