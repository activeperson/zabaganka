<?php get_header(); ?>


	<?php get_template_part( 'parts/breadcrumb' ); ?>


	<?php
		while ( have_posts() ) : the_post();
		global $product;
	?>
		<?php if ($product->get_type() === 'woosb'): ?>
			<?php wc_get_template_part( 'content', 'single-product-box' ); ?>
		<?php else: ?>
			<?php wc_get_template_part( 'content', 'single-product' ); ?>
		<?php endif; ?>
	<?php 
		endwhile; // end of the loop.
	?>

<?php get_footer(); ?>