<?php

// Load the WPS Framework.
require_once( trailingslashit( get_template_directory() ) . 'wps_framework/wps-framework.php' );
new WPS_Framework();

// Sets up theme defaults and registers support for various WordPress features.
add_action( 'after_setup_theme', 'wps__theme_setup' );
function wps__theme_setup() {
  // Load the congif files.
  require_once( trailingslashit( CHILD_DIR ) . 'wps_config/wps_config.php' );

  require_once( trailingslashit( CHILD_DIR ) . 'wps_config/blog.php' );
  require_once( trailingslashit( CHILD_DIR ) . 'wps_config/instawidget.php' );
  require_once( trailingslashit( CHILD_DIR ) . 'wps_config/reviews.php' );
}



#### Add image size // plugin Force Regenerate Thumbnails 
if ( function_exists( 'add_image_size' ) ) {
  add_image_size( '480_630', 480, 630, true ); // true/false жесткая обрезка
  add_image_size( '480_320', 480, 320, true ); // true/false жесткая обрезка
  add_image_size( '191_191', 191, 191, true ); // true/false жесткая обрезка
  add_image_size( '410_410', 410, 410, true ); // true/false жесткая обрезка
  add_image_size( '540_270', 540, 270, true ); // true/false жесткая обрезка
}

#### Allow the following image size
add_filter('intermediate_image_sizes', 'true_supported_image_sizes');
function true_supported_image_sizes( $sizes ) {
  return array(
    '150_150', // не удалять
    '480_320',
    '191_191',
    '410_410',
    '540_270',
  );
}



#### Path
define('REL_ASSETS_URI', 'wp-content/themes/'.get_stylesheet().'/assets/'); // for IMG in frontend
define('ABS_ASSETS_URI', get_stylesheet_directory_uri().'/assets');         // for JS and CSS

#### Подключение скриптов и стилей https://truemisha.ru/blog/wordpress/wp_enqueue_script.html
## Условные теги http://wp-kama.ru/id_89/uslovnyie-tegi-v-wordpress-i-vse-chto-s-nimi-svyazano.html
add_action( 'wp_enqueue_scripts', 'set_scripts_and_styles' );
function set_scripts_and_styles() {
  if( !is_admin() ){

    ## jQuery
    wp_deregister_script( 'jquery' );
    //wp_register_script  ( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, null, true );
    wp_register_script( 'jquery', ABS_ASSETS_URI.'/libs/jquery/jquery-3.3.1.min.js', false, null, false );

    ## register script and styles
    wp_register_style ( 'main_style', ABS_ASSETS_URI.'/css/style.css', array(), '1.0.6', null );
    wp_register_script( 'common-js', ABS_ASSETS_URI.'/js/common.js', array('jquery'), '1.0.5', true );

    //wp_register_style ( 'name', ABS_ASSETS_URI.'/css/', array(), '1.0.0', null );
    //wp_register_script( 'name', ABS_ASSETS_URI.'/js/', array('jquery'), '1.0.0', true );

    wp_register_style ( 'simple_modal', ABS_ASSETS_URI.'/libs/simple_modal/simple_modal.css', array(), '1.0.0', null );
    wp_register_script( 'simple_modal', ABS_ASSETS_URI.'/libs/simple_modal/simple_modal.js', array('jquery'), '1.0.0', true );

    wp_register_style ( 'fancybox', ABS_ASSETS_URI.'/libs/fancybox/jquery.fancybox.min.css', array(), '1.0.0', null );
    wp_register_script( 'fancybox', ABS_ASSETS_URI.'/libs/fancybox/jquery.fancybox.min.js', array('jquery'), '1.0.0', true );

    wp_register_style ( 'slick_slider', ABS_ASSETS_URI.'/libs/slick_slider/slick/slick.css', array(), '1.0.0', null );
    wp_register_script( 'slick_slider', ABS_ASSETS_URI.'/libs/slick_slider/slick/slick.min.js', array('jquery'), '1.0.0', true );
    
    wp_register_script( 'maskedinput', ABS_ASSETS_URI.'/libs/maskedinput/jquery.maskedinput.min.js', array('jquery'), '1.0.0', true );

    wp_register_style ( 'select2', ABS_ASSETS_URI.'/libs/select2/css/select2.min.css', array(), '1.0.0', null );
    wp_register_script( 'select2', ABS_ASSETS_URI.'/libs/select2/js/select2.full.min.js', array('jquery'), '1.0.0', true );

    wp_register_script( 'validate', ABS_ASSETS_URI.'/libs/validate/jquery.validate.min.js', array('jquery'), '1.0.0', true );

    ## init
    wp_enqueue_style ( 'fancybox' );
    wp_enqueue_script( 'fancybox' );
    
    wp_enqueue_style ( 'slick_slider' );
    wp_enqueue_script( 'slick_slider' );
    
    wp_enqueue_style ( 'simple_modal' );
    wp_enqueue_script( 'simple_modal' );
    
    wp_enqueue_script( 'maskedinput' );
    
    wp_enqueue_style ( 'select2' );
    wp_enqueue_script( 'select2' );

    wp_enqueue_script( 'validate' );

    wp_enqueue_style ( 'main_style' );
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'common-js');
    
  }   
}


## Часть стилей в footer
add_action( 'get_footer', 'my_style_method' );
function my_style_method() {
  // wp_enqueue_style( 'awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), null, null );
};


// customtheme_add_woocommerce_support
function customtheme_add_woocommerce_support()
 {
add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'customtheme_add_woocommerce_support' );


## Отключает новый редактор блоков в WordPress (Гутенберг).
## ver: 1.0
if( 'disable_gutenberg' ){
  add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );

  // отключим подключение базовых css стилей для блоков
  // ВАЖНО! когда выйдут виджеты на блоках или что-то еще, эту строку нужно будет комментировать
  remove_action( 'wp_enqueue_scripts', 'wp_common_block_scripts_and_styles' );

  // Move the Privacy Policy help notice back under the title field.
  add_action( 'admin_init', function(){
    remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] );
    add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] );
  } );
}


## кол-во товаров в архиве
add_filter( 'loop_shop_per_page', function ( $cols ) {
    // $cols contains the current number of products per page based on the value stored on Options -> Reading
    // Return the number of products you wanna show per page.
    return 10;
}, 20 );



## ОТКЛЮЧАЕМ ХУКИ WOOCOMMERCE
// удаляем оборачивающие div архива
// remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10, 0);
// remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10, 0);


## Реализуем обновление числа в корзине при добавлении товара
add_filter( 'woocommerce_add_to_cart_fragments', function($fragments) {
    ob_start();
    ?>

    <div class="amount mini_cart">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>

    <?php $fragments['div.mini_cart'] = ob_get_clean();

    return $fragments;
});


/*
 * Получение дерева таксономий
 */
function get_taxonomy_hierarchy( $taxonomy, $parent=0) {
    // only 1 taxonomy
    $taxonomy=is_array( $taxonomy) ? array_shift( $taxonomy): $taxonomy;
    // get all direct decendants of the $parent
    $terms=get_terms( $taxonomy, array( 'parent'=> $parent, 'hide_empty'=> 1));
    // prepare a new array.  these are the children of $parent
    // we'll ultimately copy all the $terms into this new array, but only after they
    // find their own children
    $children=array();
    // go through all the direct decendants of $parent, and gather their children
    foreach ( $terms as $term) {
        // recurse to get the direct decendants of "this" term
        $term->children=get_taxonomy_hierarchy( $taxonomy, $term->term_id);

        $term->view_in_nav = get_term_meta( $term->term_id, "view_in_nav", true);
        $term->view_in_catalogue = get_term_meta( $term->term_id, "view_in_catalogue", true);

        // add the term to our new array
        $children[$term->term_id]=$term;
    }
    // send the results back to the caller
    return $children;
}

/*
 * Получение корневого элемента таксономии
 */
function get_top_level_term($term,$taxonomy){
    if($term->parent==0) return $term;
    $parent = get_term( $term->parent,$taxonomy);
    return get_top_level_term( $parent , $taxonomy );
}



// рассчет цены с вычетом скидки
function get_dicount_price($regular_price, $percent) {
    $discount_total = round($regular_price / 100 * $percent, 0);
    return $regular_price - $discount_total;
}




// Удаление лишних полей
add_filter('woocommerce_checkout_fields','remove_checkout_fields');
function remove_checkout_fields($fields_original){

	$common_fields = array(
		'billing_country' => array(
			'label' => 'billing_country',
			'required' => 1,
			'autocomplete' => 'billing_country',
			'default' => 'UA'
		),
		'billing_first_name' => array(
			'label' => 'Имя',
			'required' => 1,
			'autocomplete' => 'given-name',
		),
		'billing_last_name' => array(
			'label' => 'Фамилия',
			'required' => 1,
			'autocomplete' => 'family-name',
		),
		'billing_phone' => array(
			'label' => 'Телефон',
			'required' => 1,
			'autocomplete' => 'tel',
		),
		'billing_city' => array(
			'label' => 'Город',
			'required' => 1,
			'autocomplete' => 'address-level2',
		),
	);

	/*
	1
	Укр почта
	free_shipping:10
	 */ 
	$delivery_type_1 = array(
		'billing' => array_merge(
			$common_fields, 
			array(
				'billing_postcode' => array(
					'label' => 'Почтовый индекс',
					'required' => 1,
					'autocomplete' => 'postal-code',
				),
				'postadress' => array(
					'label' => 'Адресс отделения',
					'required' => 1,
					'autocomplete' => 'postadress',
				),
			)
		),
		'order' => array(
			'order_comments' => array(
				'label' => 'Комментарий',
				'required' => 0,
				'autocomplete' => 'order_comments',
			),
		),
	);

	/* 
	2
	Новая почта
	free_shipping:8
	*/
	$delivery_type_2 = array(
		'billing' => array_merge(
			$common_fields, 
			array(
				'waterhouse' => array(
					'label' => 'Отделение NP',
					'required' => 1,
					'autocomplete' => 'waterhouse',
				),
			)
		),
		'order' => array(
			'order_comments' => array(
				'label' => 'Комментарий',
				'required' => 0,
				'autocomplete' => 'order_comments',
			),
		),
	);


	/*
	3
	Новая почта курьер
	free_shipping:9
	*/
	$delivery_type_3 = array(
		'billing' => array_merge(
			$common_fields, 
			array(
				'billing_address_1' => array(
					'label' => 'Домашний адресс',
					'required' => 1,
					'autocomplete' => 'address-line1',
				),
			)
		),
		'order' => array(
			'order_comments' => array(
				'label' => 'Комментарий',
				'required' => 0,
				'autocomplete' => 'order_comments',
			),
		),
	);

	if ($_SESSION['DELIVERY_TYPE'] == 'free_shipping:10') {
		$fields = $delivery_type_1;
	}

	if ($_SESSION['DELIVERY_TYPE'] == 'free_shipping:8') {
		$fields = $delivery_type_2;
	}

	if ($_SESSION['DELIVERY_TYPE'] == 'free_shipping:9') {
		$fields = $delivery_type_3;
	}

	// $fields = $fields_original;

    return $fields;
}


// програмное обновление формы оформления заказа
add_action('wp_ajax_nopriv_updateOrderForm', 'updateOrderForm');
add_action('wp_ajax_updateOrderForm', 'updateOrderForm');

function updateOrderForm() {
	$delivery_type = $_POST['delivery_type'];
	$_SESSION['DELIVERY_TYPE'] = $delivery_type;

	$WC_Checkout = new WC_Checkout();

	global $order_form_fields;
	print_r($order_form_fields);

	$order_form_fields = $WC_Checkout->get_checkout_fields();

	$order_form_fields['delivery_type'] = $delivery_type;

	ob_start();
	?>

	<?php 
	// подключить форму оформления заказа
	get_template_part( 'parts/order_form' );
	?>


	<?php
	$art_add_update_form_billing = ob_get_clean();
	
	print json_encode($art_add_update_form_billing);
	exit();
}



// searchByCities
add_action('wp_ajax_nopriv_searchByCities', 'searchByCities');
add_action('wp_ajax_searchByCities', 'searchByCities');

function searchByCities() {
    $city_name = mb_strtolower(htmlspecialchars($_POST['term']['term']));

    $cities_xml = simplexml_load_file(CHILD_DIR . '/delivery_data/cities.xml');
    $cities = $cities_xml->data;
    unset($cities_xml);

    $result = array();

    foreach ($cities as $value) {
    	// поиск с начала строки
    	// перед сравнением приводится к нижнему регистру
 		if (strpos(mb_strtolower($value->DescriptionRu), $city_name) === 0) {
			array_push($result, $value);
		}
    }

	print json_encode($result);
	exit();
}


// searchWaterhouses
add_action('wp_ajax_nopriv_searchWaterhouses', 'searchWaterhouses');
add_action('wp_ajax_searchWaterhouses', 'searchWaterhouses');

function searchWaterhouses() {
    $cityRef = mb_strtolower(htmlspecialchars($_POST['cityRef']));

    $waterhouses_xml = simplexml_load_file(CHILD_DIR . '/delivery_data/waterhouses.xml');
    $waterhouses = $waterhouses_xml->data;
    unset($waterhouses_xml);

    $result = array();

    foreach ($waterhouses as $value) {
        if ($cityRef == $value->CityRef) {
            array_push($result, $value);
        }
    }

	print json_encode($result);
	exit();
}


// сохраняет данные формы в доп поля
add_action( 'woocommerce_checkout_update_order_meta', 'awoohc_checkout_field_update_order_meta' );
function awoohc_checkout_field_update_order_meta( $order_id ) {
	if ( ! empty( $_POST['waterhouse'] ) ) {
		update_post_meta( $order_id, '_shipping_waterhouse', sanitize_text_field( $_POST['waterhouse'] ) );
	}
	if ( ! empty( $_POST['postadress'] ) ) {
		update_post_meta( $order_id, '_shipping_postadress', sanitize_text_field( $_POST['postadress'] ) );
	}
}


// регестсрируем поля для вывода в админку заказа
add_filter( 'woocommerce_default_address_fields', 'awoohc_override_default_address_fields' );
function awoohc_override_default_address_fields( $address_fields ) {
	$address_fields['_shipping_waterhouse'] = array(
		'label'       => 'Номер отделения Новой Почты',
		'placeholder' => '',
		'required'    => true,
		'class'       => array( 'form-row-last' ),
		'clear'       => true,
		'priority'    => 25,
	);
	$address_fields['_shipping_postadress'] = array(
		'label'       => 'Адрес отделения Укр.почты',
		'placeholder' => '',
		'required'    => true,
		'class'       => array( 'form-row-last' ),
		'clear'       => true,
		'priority'    => 35,
	);
	
	return $address_fields;
}

// выводим поля в админку заказа
add_filter( 'woocommerce_admin_shipping_fields', 'awoohc_add_admin_billing_fields', 10 );
function awoohc_add_admin_billing_fields( $address ) {
	$address['waterhouse'] = array(
		'label' => 'Номер отделения Новой Почты',
		'show'  => true,
	);
	$address['postadress'] = array(
		'label' => 'Адрес отделения Укр.почты',
		'show'  => true,
	);
	
	return $address;
}


#### Shorten Text 
function text_limit($text, $count, $after)
{
    $text = mb_substr($text, 0, $count);
    echo "<p>" . $text . $after . "</p>";
}

