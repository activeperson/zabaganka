
<?php 
$args = array(
	'post_type'  => 'reviews',
	'order'      => 'ASC',
	'posts_per_page' => -1
);

$reviews = get_posts( $args );
if (is_array($reviews) && count($reviews) > 0) :
?>


<!--	 reviews -->
<section class="reviews-section">
	<div class="container wrapper">
	
			<div class="section_title">
			<h2>Отзывы</h2>
			</div>
			
			<div class="reviews-slider_holder mt-5">
				<div class="reviews-slider_arrows">
					<div class="arrow arrow-top js__reviews_slider_prev"></div>
					<div class="arrow arrow-bottom js__reviews_slider_next"></div>
				</div>
				
				<div class="reviews-slider_slider">
					<div class="js__reviews_slider">

						<?php
						  foreach( $reviews as $post ){ setup_postdata($post);
						?>

						<div class="reviews-slider_item">
							<div class="row">
								<div class="col">
									<div class="content">
										<div class="name"><?php the_title(); ?></div>
										<div class="who_is"><?php echo get_post_meta($post->ID, 'who', true); ?></div>
										<div class="text">
											<?php echo wpautop(get_post_meta($post->ID, 'review_text', true)); ?>
										</div>
										<div class="actions">
											<?php if (get_post_meta($post->ID, 'video_link', true) !== '' ) :
												$videoID =  wps__get_video_id(get_post_meta($post->ID, 'video_link', true));
											?>
												<a data-fancybox href="https://www.youtube.com/watch?v=<?php echo $videoID; ?>;autoplay=1&amp;" class="btn_s_2 video_review">Видео-отзыв</a>
											<?php endif; ?>

											<?php if (get_post_meta($post->ID, 'video_link_origin', true) !== '' ) : ?>
												<a href="<?php echo get_post_meta($post->ID, 'video_link_origin', true); ?>" target="_blank" class="btn_s_1 original_link">Оригинал отзыва</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="col-md-auto">
									<div class="image">
										<?php echo get_the_post_thumbnail( $post->ID, '480_320' ) ?>
									</div>
								</div>
							</div>
						</div>
						  
						<?php
						}
						  wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
	</div>
</section>
<!--  reviews end -->
 

<?php endif; ?>