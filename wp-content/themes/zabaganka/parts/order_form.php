<?php
global $order_form_fields;
$delivery_type = $order_form_fields['delivery_type'];
// pre_print_r($order_form_fields);
?>

<?php if ($order_form_fields['billing']['billing_first_name']) : ?>
    <div class="form-group">
        <div class="field_name">Имя</div>
        <div class="input_holder">
            <input type="text" name="billing_first_name" >
        </div>
    </div>
<?php endif ?>

<?php if ($order_form_fields['billing']['billing_last_name']) : ?>
	<div class="form-group mt-4">
        <div class="field_name">Фамилия</div>
        <div class="input_holder">
            <input type="text" name="billing_last_name"  >
        </div>
    </div>
<?php endif ?>

<?php if ($order_form_fields['billing']['billing_phone']) : ?>
	<div class="form-group mt-4">
        <div class="field_name">Телефон</div>
        <div class="input_holder">
            <input type="text" class="fn__user_phone_mask" name="billing_phone" >
        </div>
    </div>
<?php endif ?>

<?php if ($order_form_fields['billing']['billing_email']) : ?>
	<div class="form-group mt-4">
        <div class="field_name">E-mail</div>
        <div class="input_holder">
            <input type="text" class="fn__user_phone_mask" name="billing_email" >
        </div>
    </div>
<?php endif ?>

<?php woocommerce_checkout_payment(); ?>

<div class="form-group mt-4">
    <div class="field_name">Способ доставки</div>
    <div class="select_holder">
        <select class="js-delivery-type-select" name="shipping_method[0]">
            <option <?php if ($delivery_type == 'free_shipping:8') echo 'selected' ?> value="free_shipping:8">Новая почта</option>
            <option <?php if ($delivery_type == 'free_shipping:9') echo 'selected' ?> value="free_shipping:9">Новая почта/Курьер</option>
            <option <?php if ($delivery_type == 'free_shipping:10') echo 'selected' ?> value="free_shipping:10">Укр.почта</option>
        </select>
    </div>
</div>

<?php if ($order_form_fields['billing']['billing_city']) : ?>
	<div class="form-group mt-4">
        <div class="field_name">Город</div>
        <div class="select2_holder js-city-select_holder">
            <div class="select2-preloader">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
            </div>
            <select class="js-city-select" name="billing_city">
                <option data-area="0" data-city="0" value="">Начните вводить название</option>
                <option data-city="8e1718f5-1972-11e5-add9-005056887b8d" value="Авангард">Авангард</option><option data-city="d30a9675-7404-11e5-8d8d-005056887b8d" value="Авиаторское">Авиаторское</option><option data-city="ebc0eda9-93ec-11e3-b441-0050568002cf" value="Агрономичное">Агрономичное</option>
            </select>
        </div>
    </div>
<?php endif ?>


<?php if ($order_form_fields['billing']['waterhouse']) : ?>
<div class="form-group mt-4 js_waterhouse_row">
    <div class="field_name">Отделение</div>
    <div class="select2_holder js-waterhouse-select_holder">
        <div class="select2-preloader">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>
        <select class="js-waterhouse-select" name="waterhouse">
           <option value="" >Начните вводить название</option>
            <option value="Отделение №1: ул. Маршала Малиновского, 114">Отделение №1: ул. Маршала Малиновского, 114</option><option value="Отделение №2: ул. Академика Янгеля, 40">Отделение №2: ул. Академика Янгеля, 40</option>
        </select>
    </div>
</div>
<?php endif ?>

<?php if ($order_form_fields['billing']['billing_address_1']) : ?>
<div class="form-group mt-4 js_user_adress_row">
    <div class="field_name">Ваш адрес</div>
    <div class="input_holder">
        <input type="text" name="billing_address_1" class="">
    </div>
</div>
<?php endif ?>

<?php if ($order_form_fields['billing']['billing_postcode']) : ?>
<div class="form-group mt-4 js_zipcode_row">
    <div class="field_name">Почтовый индекс</div>
    <div class="input_holder">
        <input type="text" name="billing_postcode" class="">
    </div>
</div>
<?php endif ?>

<?php if ($order_form_fields['billing']['postadress']) : ?>
<div class="form-group mt-4 js_postal_adress_row">
    <div class="field_name">Адрес отделения</div>
    <div class="input_holder">
        <input type="text" name="postadress" class="">
    </div>
</div>
<?php endif ?>


	<div class="form-group mt-4">
        <div class="field_name">Дата рождения</div>
        <div class="select2_holder js-city-select_holder">
            <div class="select2-preloader">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
            </div>
            <input type="date" placeholder="Дата рождения">
            <!-- <select class="js-city-select" name="billing_city">
                <option data-area="0" data-city="0" value="">Начните вводить название</option>
                <option data-city="8e1718f5-1972-11e5-add9-005056887b8d" value="Авангард">Авангард</option><option data-city="d30a9675-7404-11e5-8d8d-005056887b8d" value="Авиаторское">Авиаторское</option><option data-city="ebc0eda9-93ec-11e3-b441-0050568002cf" value="Агрономичное">Агрономичное</option>
            </select> -->
        </div>
    </div>


<?php if ($order_form_fields['order']['order_comments']) : ?>
<div class="form-group mt-4">
    <div class="field_name js__comments_titile">Добавить комментарий к заказу</div>
    <div class="textarea_holder js__comments_holder">
        <textarea name="order_comments"></textarea>
    </div>
</div>
<?php endif ?>
!!!!!!!!!

<input type="hidden"  name="billing_country" value="UA">

<div class="form-group mt-4">
    <div class="button_holder">
        <button type="submit" class="btn_s_4" >Подтвердить заказ</button>
    </div>
</div>
