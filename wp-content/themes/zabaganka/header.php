<!DOCTYPE html>
<html <?php language_attributes(); ?> >
  <head>

    <?php wp_head(); ?>

    <style>
    	#wpadminbar {
    		opacity: 0;
    	}
    	#wpadminbar:hover {
    		opacity: 1;
    	}
    	html { margin-top: 0px !important; }
		* html body { margin-top: 0px !important; }
    </style>



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143027596-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-143027596-1');
    </script>


    <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '265556611191145');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=265556611191145&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->


  </head>
  <body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">


    <!-- Facebook Pixel Code -->
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=514352775772108&ev=PageView&noscript=1"
    /></noscript>
    <!-- Facebook Pixel Code -->

  <!-- header -->

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  	var js, fjs = d.getElementsByTagName(s)[0];
  	if (d.getElementById(id)) return;
  	js = d.createElement(s); js.id = id;
  	js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.8";
  	fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


  <header class="header" >

  	<!-- header__promo_line-->
  	<div class="header__promo_line">
  		<span class="discount">Сезонная распродажа до 30%! </span>
		<a href="<?php echo get_option('wps_theme_main_settings')['link_on_sales']; ?>" class="get">Получить</a>
  		<span class="arrow ico_dbl_arrow_right"></span>
  	</div>

  	<!--header__top_hold-->
  	<div class="header__top_hold">
  		<div class="container wrapper">
  			<div class="row align-items-center">
  				<div class="col-md-4">
  					<a href="" class="logo_holder">
  						<img src="<?php echo REL_ASSETS_URI; ?>img/common/logo.png" alt="">
  					</a>
  				</div>
  				<div class="col-md-4 text-center">
  					<div class="shop_title">
  						<p>Магазин товаров для дома</p>
  					</div>
  				</div>
  				<div class="col-md-4 text-right">
  					<div class="phone_holder">
  						<a href="https://www.facebook.com/zabagankashop/" target="_blank" title="Facebook"><i class="fa fa-facebook-square facebook_icon"></i></a>
  						<a href="https://www.instagram.com/zabaganka_eco/" target="_blank" title="Instagram"><i class="fa fa-instagram instagram_icon"></i></a>
  						<i class="ico_phone" ></i>
  						<a href="tel:380506942207" class="phone">+38(050) 694-22-07</a>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>

  	<!--header__bt_hold-->
  	<div class="header__bt_hold">
  		<div class="container wrapper">
  			<div class="row align-items-center">
  				<div class="col">

  					<div class="mobile_nav_switch js__mobile_nav_switch d-lg-none">
  						<span></span>
  						<span></span>
  						<span></span>
  					</div>

  					<div class="social_mobile d-lg-none d-md-none">
  						<a href="https://www.facebook.com/zabagankashop/" target="_blank" title="Facebook"><i class="fa fa-facebook-square facebook_icon"></i></a>
  						<a href="https://www.instagram.com/zabaganka_eco/" target="_blank" title="Instagram"><i class="fa fa-instagram instagram_icon"></i></a>
  					</div>

  					<!-- nav_main -->
  					<div class="nav_main d-lg-block d-none">
  						<nav>
  							<ul>
  								<li class="js_catalog_link css_catalog_link" >
  									<a href="shop/">Каталог</a>
  								</li>
  								<li>
  									<a href="product-category/novinki/">Новинки</a>
  								</li>
                  <li>
                    <a href="product-category/populyarnoe/">Популярное</a>
                  </li>
                  <li>
                    <a href="blog/">Блог</a>
                  </li>
  								<li>
  									<a href="kontakty/">Контакты</a>
  								</li>
  							</ul>
  						</nav>
  					</div>

  				</div>
  				<div class="col-lg-4 col-auto">
            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
  			<!-- 		<div class="search_form search_form_js">
  						<form method="get" action="<?php echo get_site_url(); ?>">
  							<div class="search_form__input">
  								<input type="text" name="s" placeholder="Поиск">
  							</div>
  							<button type="submit" class="search_form__btn"></button>
  						</form>
  					</div> -->
  				</div>
  			</div>


        <?php
          $product_categories = get_taxonomy_hierarchy('product_cat');
          // pre_print_r($product_categories);
          if(!empty($product_categories)) :
        ?>
  			<div class="nav_main_catalog">
  				<div class="row">
            <!--sidebar_main-->
            <?php
            $cur_cat_obj   = get_queried_object();
            $cur_term_id   = $cur_cat_obj->term_id;

            foreach ($product_categories as $category): ?>
              <?php if ($category->view_in_nav) : ?>
                <div class="col-md-3 mb-3">
                    <a class="title <?php if ( $cur_term_id == $category->term_id ) echo 'active' ?>" href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name ?></a>
                    <ul>
                      <?php foreach ($category->children as $subcategory): ?>
                        <?php if ($subcategory->view_in_nav) : ?>
                          <li>
                            <a href="<?php echo get_term_link( $subcategory->term_id ); ?>" class="<?php if ( $cur_term_id == $subcategory->term_id ) echo 'active' ?>" ><?php echo $subcategory->name ?></a>
                          </li>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </ul>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>

  				</div>
  			</div>
        <?php endif; ?>

  		</div>
  	</div>

  </header>

  <div class="mobile_nav_holder_overflow js__mobile_nav_holder_overflow"></div>
  <div class="mobile_nav_holder js__mobile_nav_holder">
  	<div class="top_holder">
  		<div class="mobile_nav_switch js__mobile_nav_switch">
  			<span></span>
  			<span></span>
  			<span></span>
  		</div>
  	</div>

  	<div class="content_holder">
  		<ul>
        <li>
          <a href="">Главная</a>
        </li>
  			<li>
  				<a href="shop/">Каталог</a>
  			</li>
  			<li>
  				<a href="o-nas/">О компании</a>
  			</li>
        <li>
          <a href="blog/">Блог</a>
        </li>
  			<li>
  				<a href="kontakty/">Контакты</a>
  			</li>
  		</ul>
  	</div>

  	<div class="bottom_holder">
  		<div class="phone_holder">
  			<i class="ico_phone" ></i>
  			<a href="tel:380506942207" class="phone">+38(050) 694-22-07</a>
  		</div>
  	</div>
  </div>


  <?php if ( !is_cart() && !is_checkout() ) : ?>
  <div class="float_cart">
  	<div class="float_cart_text">
  		Корзина
  	</div>
  	<div class="float_cart_ico">
  		<div class="amount mini_cart"><?php echo WC()->cart->get_cart_contents_count(); ?></div>
  	</div>
  	<a href="cart" class="link"></a>
  </div>
  <?php endif; ?>
  <!-- end header -->
