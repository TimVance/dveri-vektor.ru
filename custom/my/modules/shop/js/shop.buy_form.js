/**
 * JS-сценарий модуля
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

$(document).on('change', ".js_shop_depend_param, .shop_form .depend_param", function() {
	select_param_price($(this).parents('form'), $(this).attr("name"));
});
$(document).on('click', ".btn_buy[action=buy]", function() {
	$(this).parents('form').find('input[name=action]').val('buy');
	$(this).parents('form').submit();
});
$(document).on('click', ".shop-item-right input[action=wish]", function() {
	$(this).parents('form').find('input[name=action]').val('wish');
	$(this).parents('form').submit();
});
$(document).on('click', ".shop-item-right input[action=wait]", function() {
	$(this).parents('form').find('input[name=action]').val('wait');
	$(this).parents('form').submit();
});
$(document).on('click', ".shop-item-right input[action=one_click]", function() {
	$('form[one_click=true]').removeAttr('one_click');
	$(this).parents('form').attr('one_click', 'true');
	//$(this).parents('.js_shop').find('.js_cart_one_click, .cart_one_click').show();
	$(this).parents('form').siblings('.js_cart_one_click, .cart_one_click').show();
});
$(document).on('click', ".js_cart_one_click_form :button, .cart_one_click_form :button", function(){
	$(this).attr('disabled', 'disabled');
	var self = $(this).parents(".js_cart_one_click_form, .cart_one_click_form");
	$('.js_shop_form_param input, .js_shop_form_param select, .shop_form_param input, .shop_form_param select, input[name=count], .js_shop_additional_cost input[type="checkbox"]:checked', 'form[one_click=true]').each(function(){
		$("input[name='"+$(this).attr('name')+"']", self).remove();
		self.prepend('<input type="hidden" name="'+$(this).attr('name')+'" value="'+$(this).val()+'">');
	});
	$("input[name='additional_cost[]']", self).remove();
	$('.js_shop_additional_cost input[type="checkbox"]:checked', 'form[one_click=true]').each(function(){
		self.prepend('<input type="hidden" name="'+$(this).attr('name')+'" value="'+$(this).val()+'">');
	});
	self.submit();
});

diafan_ajax.success['cart_one_click'] = function(form, response) {
	$('input:button', form).removeAttr('disabled');
}

$(document).on('click', '.shop-item-right .js_shop_wishlist, .shop-item-right .shop-like', function() {
	var form = $(this).parents('.js_shop, .shop').find('.js_shop_form, .shop_form').first();
	form.find('input[name=action]').val('wish');
	form.submit();
});

$(document).on('click', '.js_shop_add_compare, .shop_compare_button', function() {
	$(this).parents('form').submit();
	if(! $('.js_shop_compare_all_button').length) {
		return;
	}
	var count = $('.js_shop_compare_all_button').attr('data-count') * 1;
	if($(this).is(':checked')) {
		count++;
	} else {
		count--;
	}
	$('.js_shop_compare_all_button').attr('data-count', count);
	$('.js_shop_compare_all_button').attr('value', $('.js_shop_compare_all_button').attr('data-title') + ' (' + count + ')');
});

$(document).on('click', '.js_shop_additional_cost input[type="checkbox"]', function(){
	calc_additional_price($(this).parents('form'));
});

function calc_additional_price(th) {
	var js_price;
	$('.js_shop_price', th).each(function() {
		js_price = $(this);
		var price = js_price.attr("summ");
		$('.js_shop_additional_cost input[type="checkbox"]:checked', th).each(function(){
			price = price * 1 + $(this).attr("summ") * 1;
		});
		var pr = js_price;
		if($('span', js_price).length) {
			pr = $('span', js_price);
		}
		pr.text(format_price(price, js_price.attr('format_price_1'), js_price.attr('format_price_2'),  js_price.attr('format_price_3')));
	});
}

function format_price(str, s1, s2, s3) {
	if (0 === s1 || '0' === s1) {
		s1 = 0;
	} else {
		if (! s1) {
			s1 = 2;
		} else {
			s1 = s1;
		}
	}
	if (! s2) {
		s2 = ',';
	}
	if (! s3) {
		s3 = ' ';
	}
	d = str.toString().match(/([\.,](.*))/g);
	if (s1) {
		if (d) {
			d = d.toString().replace(/[\.,]/g, '').substr(0, s1).replace(/0+$/, '');
			// TO_DO: полное заполнение после запятой
			l = s1 - d.length;
			if (l > 0) {
				d = d + '0'.repeat(l);
			}
			d = s2 + d;
		} else {
			d = '';
			// TO_DO: полное заполнение после запятой
			// if (s1 > 0)
			// {
			// 	d = s2 + '0'.repeat(s1);
			// }
		}
	} else {
		d = '';
		str = Math.round(str);
	}
	str = str.toString().replace(/([\.,](.*))/g, '');
	str = str.replace(/\s+/g, '');
	var arr = str.split('');
	var str_temp = '';
	if (str.length > 3) {
		for (var i = arr.length - 1, j = 1; i >= 0; i--, j++) {
			str_temp = arr[i] + str_temp;
			if (j % 3 == 0 && i !=0) {
				str_temp = s3 + str_temp;
			}
		}
		return str_temp + d;
	} else {
		return str + d;
	}
}

function select_param_price(th, current_param) {
	var param_code = '';
	var current_param_code = '';
	$(".js_shop_depend_param, .depend_param", th).each(function(){
		param_code = param_code + '[' + $(this).attr('name') + '=' + $(this).val() + ']';
		if(current_param == $(this).attr('name'))
		{
			current_param_code = '[' + $(this).attr('name') + '=' + $(this).val() + ']';
		}
	});
	if($('.js_shop_param_price, .shop_param_price', th).length) {
		$('.js_shop_param_price, .shop_param_price', th).hide();
		$('.js_shop_additional_cost_price', th).hide();
		if($('.js_shop_param_price' + param_code + ', .shop_param_price' + param_code, th).length) {
			$('.js_shop_param_price' + param_code + ', .shop_param_price'+param_code, th).show();
			
			$('.js_shop_additional_cost_price'+param_code, th).each(function(){
				$(this).show();
				$('#'+$(this).parents('label').attr('for')).attr('summ', $(this).attr('summ'));
			});

			var image_id = $('.js_shop_param_price' + param_code + ', .shop_param_price' + param_code, th).attr('image_id');
			if(image_id) {
				th.parents('.js_shop, .shop').find('.js_shop_img, .shop-item-big-images a').each(function(){
					if($(this).attr('image_id') == image_id) {
						$(this).show();
					} else {
						$(this).hide();
					}
				});
			}
			if($('.js_shop_param_price' + param_code + ', .shop_param_price'+param_code, th).find('.js_shop_no_buy, .shop_no_buy').length) {
			th.parents('.js_shop, .shop').find('.js_shop_img').each(function(){
				if($('.js_shop_param_price[image_id='+$(this).attr('image_id')+'], .shop_param_price[image_id='+$(this).attr('image_id')+']', th).length) {
					$(this).hide();
				}
			});
			$('.js_shop_buy, .to-cart', th).hide();
			$('.js_shop_one_click, .shop_one_click', th).hide();
			$('.js_shop_waitlist, .shop_waitlist', th).hide();
		} else {
			
				if($('.js_shop_no_buy_good, .shop_no_buy_good', th).length) {
					$('.js_shop_waitlist, .shop_waitlist', th).show();
				} else {
					$('.js_shop_waitlist, .shop_waitlist', th).hide();
				}
				$('.js_shop_buy, .to-cart', th).show();
				$('.js_shop_one_click, .shop_one_click', th).show();
			}
		}
		else if(current_param_code)
		{
			$('.js_shop_param_price' + current_param_code, th).each(function(){
				if(! $('.js_shop_no_buy', this).length)
				{
					var new_select_price = $(this);
					var change = false;
					$(".js_shop_depend_param", th).each(function() {
						v_param_name = $(this).attr('name');
						if(v_param_name != current_param && new_select_price.attr(v_param_name) != $(this).val())
						{
							$(this).val(new_select_price.attr(v_param_name));
							change = true;
						}
					});
					if(change)
					{
						select_param_price(th, current_param);
					}
					return;
				}
			});
		}
	}
	var v_param_code = '';
	var v_param_name = '';
	$(".js_shop_depend_param", th).each(function() {
		v_param_name = $(this).attr('name');
		if (v_param_code) {
			$('option', this).each(function(){
				if(! $('.js_shop_param_price' + v_param_code + '[' + v_param_name + '=' + $(this).attr('value') + ']', th).length) {
					$(this).hide();
				} else {
					$(this).show();
				}
			});
		}
		v_param_code = v_param_code + '[' + v_param_name + '=' + $(this).val() + ']';
	});
	calc_additional_price(th);
}



function empty_param_price(th) {
  if (! $('.js_shop_param_price', th).length || $('.js_form_option_selected', th).length)
    return;

  $('.shop-item-right .js_shop_param_price', th).each(function () {
    if (!$(".shop-item-right .js_shop_no_buy", this).length) {
      for (var i = 0, atts = $(this).get(0).attributes, n = atts.length; i < n; i++) {
        if (atts[i].nodeName.indexOf("param") > -1) {
          $(".shop-item-right select[name='" + atts[i].nodeName + "']", th).val(atts[i].nodeValue);
        }
      }
      return false;
    }
  });
}

function init_shop_buy_form() {
	$(".js_shop_form, .shop_form").each(function() {
		empty_param_price($(this));
		select_param_price($(this), false);
	});
}

// Работа с характеристиками влияющих на цену
function insertDependParametres() {
	let depend_params = $('.shop-item-right select.js_shop_depend_param');
	let wrapper = $('.js-param-depends-price');
	let block = '';
	depend_params.each(function() {
		let depend_param = $(this);
		let depend_elements = depend_param.find("option");
		if (depend_elements.length) {
			let title = '';
			title = $('.js-text-params span[data-id="' + depend_param.data("id") + '"]').text();
			let tooltip = '';
			if (title) tooltip = '<span data-bs-toggle="tooltip" data-bs-placement="top" title="' + title + '" class="b_green c_white cursor_pointer d-inline-block fw-bold ms-1 rounded-circle text-center">?</span>';
			let labels = '<div class="param-title fw-bold c_dblue mb-2">' + depend_param.data('title') + tooltip + '</div>';
			depend_elements.each(function() {
				let depend_element = $(this);
				if (depend_element.css('display') !== 'none') {
					let checked = '';
					if (depend_element.prop('selected') === true) {
						checked = 'checked';
					}
					labels += '' +
						'<label>' +
							'<input ' + checked + ' style="display: none" name="' + depend_param.attr('name') + '" type="radio">' +
							'<span data-name="' + depend_param.attr('name') + '" data-value="' + depend_element.val() + '"' + 'class="js-select-depend-param">' + depend_element.text() + '</span>' +
						'</label>';
				}
			});
			block += '<div class="param-block mb-3">' + labels + '</div>';
		}
	});
	if (block != '') {
		wrapper.html('');
		wrapper.append(block);
	}
	$('[data-bs-toggle="tooltip"]').tooltip();
}

// Выбор характерист влияющих на цену
$(document).on('click', '.js-select-depend-param', function () {
	let el = $(this);
	let value = el.data("value");
	let name = el.data("name");
	$('.js_shop_depend_param[name="' + name + '"] option[value="' + value + '"]').prop('selected', true).change();
	insertDependParametres();
});

$(document).ready(function() {
	init_shop_buy_form();
	insertDependParametres();
});