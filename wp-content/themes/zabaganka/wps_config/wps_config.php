<?php

/**
 * File for function declaration.
 *
 * @package   WPS_Framework
 * @version   1.0.0
 * @author    Alexander Laznevoy 
 * @copyright Copyright (c) 2017, Alexander Laznevoy
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 *
 */

// your code...






////////////////////////////
$args = array(
  'post_type'  => 'product',
  'order'      => 'ASC',
  'posts_per_page' => -1,
  'post_status' => "publish",
);
$products = get_posts( $args );

$products_array = array();

foreach ($products as $value) {
    $products_array[$value->ID] = $value->post_title;
}



new WPS_OptionPage(
  array(
    // submenu_setting 
    'submenu_setting' => array(
      'submenupos' => "wps_theme_main_settings",
      'page_title' => 'Настройки магазина:',
      'menu_title' => 'Настройки магазина',
      'capability' => 'administrator',
      'menu_slug'  => 'wps_theme_settings_shop',
    ),
    // submenu_setting 
    'fields'    => array(
      array(
        'field_type'   => 'input',
        'field_name'   => 'free_delivery_cost',
        'type_input'   => 'number',
        'title'        => 'Сумма',
        'description'  => 'Сумма, при достижении которой даётся бесплатная доставка',
      ),

      array(
        'field_type'  => 'select',
        'field_name'  => 'products_list',
        'title'       => 'Список товаров',
        'description' => 'Будет выведен в корзине, если сумма меньше указанной',
        'def_value'   => array(),
        'multiple'    => true,
        'add_class'   => 'fn_multijs',
        'options'     => $products_array
      ),
      // FIELDS
    )
  )
);
////////////////////////////


  


////////////////////////////
add_filter( "option_page_content__after", "add_to_common_setting", 1, 2 );

function add_to_common_setting( $arr, $slug ){
  $arr = array(
    // FIELDS
    array(
      'field_type'   => 'input',
      'field_name'   => 'link_on_sales',
      'title'        => 'Ссылка в шапке',
      'description'  => 'Кнопка "Получить" блок "Скидка"',
    ),
    array(
      'field_type'   => 'input',
      'field_name'   => 'link_to_more',
      'title'        => 'Кнопка на банере на главной',
      'description'  => 'Кнопка "Подробнее"',
    ),
  );

  // slug option menu
  if ( $slug == "wps_theme_main_settings" ){
    return $arr;
  }
}
////////////////////////////






////////////////////////////
new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Другие поля:',
    'post_types'      => array( 'product' ),
    'page_templates'  => array( '' ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'   => 'wp_editor',
            'field_name'   => 'product_composition',
            'title'        => 'Состав:',
          ),
          array(
            'field_type'  => 'input',
            'field_name'  => 'gtin',
            'title'       => 'GTIN',
            'description' => '',
          ),
          array(
            'field_type'  => 'input',
            'field_name'  => 'brend',
            'title'       => 'Brend',
            'description' => '',
          ),
        )
      ),
      // Group fields
    )
  )
);


new WPS_MetaBox(
  array(
    'meta_box_name'   => 'Как использовать:',
    'post_types'      => array( 'product' ),
    'page_templates'  => array( '' ),
    'meta_box_groups' => array(
      // Group fields
      array(
        'title'    => '',
        'fields'   => array(
          // FIELDS
          array(
            'field_type'  => 'repeater',
            'field_name'  => 'repeater',
            'title'       => 'Как использвать',
            'description' => 'Заполните шаги',
            'fields'      => array(
              // поля 
              array(
                'field_type'  => 'input',
                'field_name'  => 'title',
                'title'       => 'Заголовок',
                'description' => '',
              ),
              array(
                'field_type'  => 'image',
                'field_name'  => 'image',
                'title'       => 'Изображение',
                'description' => '',
              ),
              array(
                'field_type'  => 'textarea',
                'field_name'  => 'textarea',
                'title'       => 'Контент',
                'description' => '',
              ),
              
            )
          ),
        )
      ),
      // Group fields
    )
  )
);
////////////////////////////



// product_cat
new WPS_TermFields( 
  array(
    'taxonomy'  => array( 'product_cat' ),
    'fields'    => array(
      // FIELDS
    	array(
		  'field_type'   => 'message',
		  'type_message' => 'info', 
		  'message'      => 'Если крыта родительская категория - дочерние автоматически не будут выведены.',
		),
    	array(
		  'field_type'   => 'checkbox',
		  'field_name'   => 'view_in_nav',
		  'title'        => 'Отображать в меню?',
		),
    	array(
		  'field_type'   => 'checkbox',
		  'field_name'   => 'view_in_catalogue',
		  'title'        => 'Отображать в каталоге?',
		),
    )
  )
);
