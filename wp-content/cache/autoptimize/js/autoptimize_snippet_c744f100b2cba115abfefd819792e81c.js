$(function(){function parallax(e,target,mod){$(target).addClass("no_delay");var mod_x=(e.pageX*mod)/100;var mod_y=(e.pageY*mod)/100;$(target).css({'-webkit-transform':'translate3d('+mod_y+'px,'+mod_x+'px, 0 )','-moz-transform':'translate3d('+mod_y+'px,'+mod_x+'px, 0 )','-ms-transform':'translate3d('+mod_y+'px,'+mod_x+'px, 0 )','-o-transform':'translate3d('+mod_y+'px,'+mod_x+'px, 0 )','transform':'translate3d('+mod_y+'px,'+mod_x+'px, 0 )',});};function float_block(block,block_name,add_class,false_block,offset){var this_b=$(block);if(!this_b.length)return;var block_t=$(this_b).offset().top;var block_h=this_b.outerHeight();if(false_block){var block_n="float_block_"+block_name;var false_b="<div class='"+block_n+"' style='height:"+block_h+"px;' ></div>";this_b.wrap(false_b);}
var doc_r=$(window).scrollTop();if(doc_r+block_h>block_h){this_b.addClass(add_class);}
var previous=window.scrollY;$(window).on('scroll',function(){var doc_r=$(window).scrollTop();if(doc_r+block_h+offset>block_h+block_t){this_b.addClass(add_class);}else{this_b.removeClass(add_class);}
if(window.scrollY>previous){this_b.removeClass('direction_up');this_b.addClass('direction_down');}else{this_b.addClass('direction_up');this_b.removeClass('direction_down');}
previous=window.scrollY;});}
$("body").on("click","[data-scroll_to_block]",function(){var element=$($(this).data("scroll_to_block"));if(element.length>0){var offset=$(this).data("scroll_to_block_offset")?$(this).data("scroll_to_block_offset"):0;var block_t=element.offset().top-offset;$('html, body').animate({scrollTop:block_t},600);}else{return;}});function scrollToBlock(element,offset){var block_t=$(element).offset().top-offset;$('html, body').animate({scrollTop:block_t},600);};function simpleTabs(nav,content){var nav=$(nav);var content=$(content);nav.children(":first-child").addClass("active");content.children(":first-child").addClass("active");nav.on("click",">",function(){var _this=$(this);_this.addClass("active").siblings().removeClass("active");content.children().eq(_this.index()).addClass("active").siblings().removeClass("active");});}
$.fn.scrollToTop=function(){if($(window).scrollTop()!="0"){$(this).addClass("show");}
var scrollDiv=$(this);$(window).scroll(function(){if($(window).scrollTop()=="0"){$(scrollDiv).removeClass("show");}else{$(scrollDiv).addClass("show");}});$(this).click(function(){$("html, body").animate({scrollTop:0},"fast");});};function maskedInputInit(){var mask="+38(099) 999-99-99";var placeholder={'placeholder':'+38(0__) ___-__-__'};var user_phone=$('.fn__user_phone_mask');user_phone.each(function(){$(this).mask(mask);});user_phone.attr(placeholder);}
maskedInputInit();$(".fn__filter_only_chars").on('keyup',function(e){var val=$(this).val();if(val.match(/[0-9]?/g)){$(this).val(val.replace(/[0-9]?/g,''));}});$(".fn__filter_only_numbers").on('keyup',function(e){var val=$(this).val();if(val.match(/[^0-9]/g)){$(this).val(val.replace(/[^0-9]/g,''));}});$(window).on('resize',function(){});$(window).on('scroll',function(){});$(window).on('load',function(){});simpleModal.init();if(typeof $(this).slick=='function'){$('.js__prod_slider_big').slick({slidesToShow:1,slidesToScroll:1,arrows:true,fade:true,asNavFor:'.js__prod_slider_small',adaptiveHeight:true,});$('.js__prod_slider_small').slick({slidesToShow:3,slidesToScroll:1,asNavFor:'.js__prod_slider_big',dots:false,arrows:false,centerMode:false,focusOnSelect:true});var reviews_slider=$('.js__reviews_slider');var reviews_slider_prev=$('.js__reviews_slider_prev');var reviews_slider_next=$('.js__reviews_slider_next');reviews_slider.slick({fade:true,slidesToShow:1,slidesToScroll:1,arrows:false,adaptiveHeight:true,});reviews_slider_prev.on('click',function(){reviews_slider.slick('slickPrev');});reviews_slider_next.on('click',function(){reviews_slider.slick('slickNext');});}
float_block('.header','header_hold','float',true,0);$('body').on('click','.search_form__btn',function(){if(!$('.search_form').hasClass('active')){$('.search_form').addClass('active');$('.search_form').find('input').focus();return false;}else{if($('.search_form__input').find('input').val().length===0){$('.search_form').removeClass('active');return false;}}});$(".js_catalog_link").on({mouseenter:function(){$('.nav_main_catalog').addClass('active');},mouseleave:function(){$('.nav_main_catalog').removeClass('active');}});$(".nav_main_catalog").on({mouseenter:function(){$('.nav_main_catalog').addClass('active');},mouseleave:function(){$('.nav_main_catalog').removeClass('active');}});var mobileNavOptions={button:$('.js__mobile_nav_switch'),menu:$('.js__mobile_nav_holder'),menu_overflow:$('.js__mobile_nav_holder_overflow'),activeClass:'active',noScroll:'no-scroll',};function changeNavState(){var state=false;return function(){return state=!state;}}
function closeMobileNav(menu){menu.button.removeClass(menu.activeClass);menu.menu.removeClass(menu.activeClass);menu.menu_overflow.removeClass(menu.activeClass);$('html').removeClass(menu.noScroll);}
function openMobileNav(menu){menu.button.addClass(menu.activeClass);menu.menu.addClass(menu.activeClass);menu.menu_overflow.addClass(menu.activeClass);$('html').addClass(menu.noScroll);}
var switchNavState=changeNavState();mobileNavOptions.button.on('click',function(){if(!switchNavState()){closeMobileNav(mobileNavOptions);}else{openMobileNav(mobileNavOptions);}});mobileNavOptions.menu_overflow.on('click',function(){switchNavState();closeMobileNav(mobileNavOptions);});if($('.js-order-by').length){$('.js-order-by').select2();$('.woocommerce-ordering').change(function(){$(this).submit();});}
if($('.order_holder').length){$("body").on("click",".js__comments_titile",function(){$(".js__comments_holder").slideToggle();});$("body").on("change",".js-delivery-type-select",function(){orderFormReload($(this).val());});$('body').on("change",".js-city-select",function(){getWaterhouses($(this).select2('data')[0].refId);});orderFormReload();}
function orderFormReload(type){if(!type){var type='free_shipping:8';}
var data={'action':'updateOrderForm','delivery_type':type,};$('.js__reload_checkout').block({message:null,overlayCSS:{background:'#fff','z-index':1000000,opacity:0.3}});$.ajax({url:theme_ajax.url,dataType:'json',type:'POST',data:data,success:function(data){$('.js__reload_checkout').html(data);orderFormInit();$('.js__reload_checkout').unblock();},error:function(data){console.log('Shit error...');}});}
function orderFormInit(){$('.js-waterhouse-select').select2();getNPCities();$(".js__comments_holder").slideUp();maskedInputInit();}
function getNPCities(){$(".js-city-select").select2({minimumInputLength:2,ajax:{url:theme_ajax.url,dataType:'json',type:"POST",quietMillis:50,data:function(term){return{'action':'searchByCities',term:term};},beforeSend:function(){$('.js-city-select_holder').addClass('loading');},processResults:function(data){$('.js-city-select_holder').removeClass('loading');if(data.length<=0)return false;return{results:$.map(data,function(item){return{text:item.DescriptionRu,id:item.DescriptionRu,refId:item.Ref,}})};}}});}
function getWaterhouses(cityRef){if(cityRef!==''){var data={'action':'searchWaterhouses','cityRef':cityRef,};$.ajax({url:theme_ajax.url,dataType:'json',type:'POST',data:data,beforeSend:function(){$('.js-waterhouse-select_holder').addClass('loading');},success:function(data){var selectData=$.map(data,function(item){return{text:item.DescriptionRu,id:item.DescriptionRu}});$(".js-waterhouse-select").html('').select2({data:selectData});$('.js-waterhouse-select_holder').removeClass('loading');},error:function(data){console.log('Shit error...');}});}}
class Quantity{constructor(element_parent){this.parent=element_parent;this.input=element_parent.find('input');this.min=element_parent.find('input').attr('min')||1;this.max=element_parent.find('input').attr('max')||Infinity;this.value=element_parent.find('input').val();this.setListeners();}
setListeners(){var that=this;this.parent.find('.js__minus').click(function(){that.reduseCount();that.updateValue();});this.parent.find('.js__plus').click(function(){that.increaseCount();that.updateValue();});this.parent.find('input').keyup(function(e){that.value=e.target.value;});}
increaseCount(){if(this.value<this.max){this.value++;}}
reduseCount(){if(this.value>this.min){this.value--;}}
updateValue(){this.input.val(this.value);$("[name='update_cart']").prop('disabled',false);}
getCount(){return this.value;}}
$(".js__quantity").each(function(){new Quantity($(this));});$(document).on('click',"[name='update_cart']",function(){setTimeout(function(){$(".js__quantity").each(function(){new Quantity($(this));});},5000);});});var MailActions={};MailActions.shoppingOneClick=function(){var today=new Date(),date=today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate(),time=today.getHours()+":"+today.getMinutes()+":"+today.getSeconds(),transaction_id='OC_'+date+'_'+time,items=[],id=$(".ajax_add_to_cart").val(),name=$("h2.product_title").text(),category=$("nav.breadcrumbs__hold a:last-child").text(),price=$("span.price").text(),quantity=$('input[name=quantity]').val(),valueString=price*quantity,value=parseFloat(valueString).toFixed(2);gtag("set",{"currency":"UAH"});items.push({"id":id,"name":name,"category":category,"price":price,"quantity":quantity,});gtag("event","purchase",{"transaction_id":transaction_id,"affiliation":"Zabaganka","value":value,"tax":0,"shipping":0.00,"coupon":"","event_category":"Enhanced-Ecommerce","event_label":"order_confirmation","non_interaction":true,"items":items});}
(function($){$(function(){$('ul.tabs__caption').on('click','li:not(.active)',function(){$(this).addClass('active').siblings().removeClass('active').closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');});});});function checkPosition(){if($(window).width()<991.98){$(".mobile_none").remove()}else{}}
$(window).resize(function(){checkPosition()});checkPosition();