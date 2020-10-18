  
  <!-- footer -->
  <div class="footer_links">
  	<div class="container wrapper">
  		<div class="row">
  			<div class="col-md-4 text-center">

        <?php 
          $product_categories = get_taxonomy_hierarchy('product_cat');
          // pre_print_r($product_categories);
          if(!empty($product_categories)) : 
        ?>
          <ul>
            <?php
            $cur_cat_obj   = get_queried_object();
            $cur_term_id   = $cur_cat_obj->term_id;

            foreach ($product_categories as $category): ?>
              <?php if ($category->view_in_nav) : ?>

            <li>
              <a href="<?php echo get_term_link( $category->term_id ); ?>"><?php echo $category->name ?></a>
            </li>

              <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

  			</div>
  			<div class="col-md-4 text-center mt-md-0 mt-4">
  				<ul>
  					<li>
                    <a href="product-category/novinki/">Новинки</a>
            </li>
            <li>
                    <a href="product-category/populyarnoe/">Популярное</a>
            </li>
  					<li>
  						<a href="blog/">Блог</a>
  					</li>
  				</ul>
  			</div>
  			<div class="col-md-4 text-center mt-md-0 mt-4">
  				<ul>
  					<li>
  						<a href="kontakty/">Контакты</a>
  					</li>
  					<li>
  						<a href="dostavka-i-oplata/">Доставка и оплата</a>
  					</li>
  					<li>
  						<a href="politika-vozvrata/">Политика возврата</a>
  					</li>
  				</ul>
  			</div>
  		</div>
  	</div>
  </div>
  
  <footer>
  	<div class="container wrapper">
  		<div class="footer">
  		</div>
  	</div>
  	<div class="footer_copyright">
  		<p>ZABAGANKA 2019 © все права защищены</p>
  	</div>
  </footer>
  <!-- end footer -->


  
  <!-- Overlay -->
  <div class="simpleModalOverlay"></div>

  <!-- modals -->
  <div class="simpleModalWindowWrap buy_one_click">
    <div class="simpleModalTable">
      <div class="simpleModalCell">
        <div class="simpleModalWindow">
          <span class="simpleModalWindowClose"></span>
          

          <div class="contact-form">
          <form class="wps_form_js" data-callback="shoppingOneClick" >
          
            <p class="title">Заказать</p>
            
            <div class="form-group">
              <div class="field_name">Имя</div>
              <div class="input_holder">
                <input type="text" name="firstname" required >
              </div>
            </div>
            
            <div class="form-group mt-4">
              <div class="field_name">Телефон</div>
              <div class="input_holder">
                <input type="text" name="phone" placeholder="+38(000) 00-00-000" required >
              </div>
            </div>

              <!-- hidden input -->
              <input type="hidden" name="item"  value="<?php the_title(); ?>">
              <input type="hidden" name="link"  value="<?php the_permalink(); ?>">

              <input type="hidden" name="form_subject"  value="Купить в один клик">
              <input type="hidden" name="form_title"    value="Заказ товара">
              <input type="hidden" name="form_redirect" value="checkout/order-received/">
              <!-- hidden input -->
            
            <div class="form-group mt-4">
              <div class="button_holder">
                <button type="submit" class="btn_s_2" >Отправить</button>
              </div>
            </div>

            <p class="send_text mt-2" >Отправка...</p>
            <p class="result_text mt-2" >Успешно отправлено!</p>
            
          </form>
        </div>


        </div>
      </div>
    </div>
  </div>



  <!-- script -->
  <?php wp_footer(); ?>
  <!-- end script -->




  
  </body>
</html>
