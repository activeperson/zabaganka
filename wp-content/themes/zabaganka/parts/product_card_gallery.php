<?php 
global $product;
?>

<div class="product_card__gallery">
	<div class="product_card__labels">
		<!-- <span class="label label-new">NEW!</span> -->
		<!-- <span class="label label-best-buy">Топ продаж!</span> -->
	</div>

	<?php
		$product_gallery = $product->get_gallery_image_ids();
	?>

	<?php if (is_array($product_gallery) && count($product_gallery) > 0): ?>
		<!-- product_card__slider_big-->
		<div class="product_card__slider_big">
			<div class="js__prod_slider_big">
				<?php foreach ($product_gallery as $key => $value) : ?>
				<div class="item">
					<a href="<?php echo wp_get_attachment_image_url($value, 'full'); ?>" data-fancybox="gallery" >
						<?php echo wp_get_attachment_image( $value, '410_410' ); ?>
					</a>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- product_card__slider_big-->


		<!-- product_card__slider_small-->
		<div class="product_card__slider_small">
			<div class="js__prod_slider_small">
				<?php foreach ($product_gallery as $key => $value) : ?>
				<div class="item_holder">
					<div class="item">
						<?php echo wp_get_attachment_image( $value, '191_191' ); ?>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- product_card__slider_small end -->
	<?php else: ?>
		<!-- product_card__slider_big-->
		<div class="product_card__slider_big">
			<div class="js__prod_slider_big">
				<div class="item">
					<?php echo woocommerce_get_product_thumbnail(); ?>
				</div>
			</div>
		</div>
		<!-- product_card__slider_big-->
	<?php endif; ?>
	
</div>
