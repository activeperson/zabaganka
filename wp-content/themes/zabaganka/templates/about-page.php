<?php
	/*
	Template Name: О нас
	Template Post Type: page
	*/
	get_header();
?>

<?php get_template_part( 'parts/breadcrumb' ); ?>


	
  <!-- page_title -->
  <section class="page_title">
    <div class="container wrapper">
      <h1 class="page-title">О нас</h1>
    </div>
  </section>
  <!-- end page_title -->

<section class="about-page mt-4">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <img src="<?php echo REL_ASSETS_URI; ?>img/about/logo.png" alt="">
      </div>
    </div>
  </div>
</section>
   
<section class="about-info">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="title">Познакомимся!</p>
        <p>Меня зовут Катерина, и моя мечта очистить мир от мусора.</p>
        <p>Тонны пластика заполонили леса и океаны и превратили в свалки… Тысячи животных погибают от человеческой беспечности.</p>
        <p>Казалось бы, ВСЕГО 1 соломинка для сока, ВСЕГО 1 одноразовый стаканчик, ВСЕГО 1 пакет… Но нас 7,6 миллиарда человек!</p>
        <p>Давайте вместе постараемся уменьшить количество отходов на нашей планете!</p>
        
      </div>
      <div class="col-md-6">
        <p class="title">Наша миссия!</p>
        <p> Каждую минуту в мире покупают более миллиона пластиковых бутылок! Экономьте свои деньги и уменьшайте количество пищевых отходов вместе с Zabaganka Shop. Покупайте товары для многоразового использования.</p>
        <p>Давайте инвестировать в окружающую среду вместе! </p>
      </div>
    </div>
  </div>
</section>


<?php get_footer(); ?>