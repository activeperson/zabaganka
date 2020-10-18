<?php
	/*
	Template Name: Контакты
	Template Post Type: page
	*/
	get_header();
?>

<?php get_template_part( 'parts/breadcrumb' ); ?>


	
  <!-- page_title -->
  <section class="page_title">
    <div class="container wrapper">
      <h1 class="page-title">Контакты</h1>
    </div>
  </section>
  <!-- end page_title -->

 <section class="contact-page mt-4">
  <div class="container">
  		<p class="contact_top__title">Мы ждем вас!</p>
      <p class="contact_top__subtitle">Пишите</p>
      <a href="mailto:j.kucheriavaya@gmail.com">info@zabaganka.com.ua</a>
      
      <p class="contact_top__subtitle">звоните</p>
      <a href="tel:+38(050)6942207">+38(050) 694-22-07</a>
  </div>
</section>


 <section class="contact-info">
  <div class="container">
  	<div class="row align-items-center">
  		<div class="col">
  			<div class="iframe_holder">
  				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2586.8091143511815!2d34.57909171587271!3d49.58248955740198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d82586fb1a97a9%3A0x5fb9ba9fe6a28eba!2z0YPQuy4g0KHRgtCw0YDRi9C5INCf0L7QtNC-0LssIDMsINCf0L7Qu9GC0LDQstCwLCDQn9C-0LvRgtCw0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgMzYwMDA!5e0!3m2!1sru!2sua!4v1561039501545!5m2!1sru!2sua"  allowfullscreen></iframe>
  			</div>
  		</div>
  		<div class="col-md-auto mt-md-0 mt-4">
  			<div class="contact-info__data">
			  <p class="info__title">Адрес:</p>
			  <p>Полтава ул. Старый Подол ,д.3</p>

			  <p class="info__title mt-4">телефон:</p>
			  <p>+38(050) 694-22-07</p>

			  <p class="info__title mt-4">режим работы:</p>
			  <p>с 8:00 - 20:00 Пн-Вс</p>
			</div>
  		</div>
  		<div class="col-md-4 mt-md-0 mt-4">
  			<div class="contact-form">
  				<form class="wps_form_js">
  				
  					<p class="title">ЗАПОЛНИТЕ ФОРМУ И МЫ ВАМ ПЕРЕЗВОНИМ</p>
  				
					<div class="form-group">
						<div class="field_name">Имя</div>
						<div class="input_holder">
							<input type="text" name="firstname" required >
						</div>
					</div>
 					
 					<div class="form-group mt-4">
						<div class="field_name">Телефон</div>
						<div class="input_holder">
							<input type="text" class="fn__user_phone_mask" name="phone" required >
						</div>
					</div>

					  <!-- hidden input -->
					  <input type="hidden" name="form_subject"  value="Обратный звонок">
					  <input type="hidden" name="form_title"    value="Страница контактов">
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
</section>


<?php get_footer(); ?>