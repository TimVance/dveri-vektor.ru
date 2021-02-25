<?php
/**
 * Шаблон кнопки «Купить», в котором характеристики, влияющие на цену выводятся в виде выпадающего списка
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN'))
{
	$path = __FILE__;
	while(! file_exists($path.'/includes/404.php'))
	{
		$parent = dirname($path);
		if($parent == $path) exit;
		$path = $parent;
	}
	include $path.'/includes/404.php';
}

if (! empty($result["result"]["access_buy"]))
	return false;

if($result["row"]["empty_price"])
	return false;

$action = '';
if(! $result["result"]["cart_link"] || $result["row"]["no_buy"] || empty($result["row"]["count"]))
{
	$action = 'buy';
}

echo '
<form method="post" action="" class="ajax js_shop_form mx-0 my-2 position-relative px-0 row shop_form">
<input type="hidden" name="good_id" value="'. $result["row"]["id"].'">
<input type="hidden" name="module" value="shop">
<input type="hidden" name="action" value="'.$action.'">';

// у товара несколько цен
if ($result["row"]["price_arr"])
{
	echo '<div class="addict-field col-12 mb-3">';
		echo '<div class="js_shop_form_param shop_form_param d-flex justify-content-between">';
		foreach ($result["result"]["depends_param"] as $param)
		{
			if(! empty($result["row"]["param_multiple"][$param["id"]]))
			{
				if(count($result["row"]["param_multiple"][$param["id"]]) == 1)
				{
					foreach ($result["row"]["param_multiple"][$param["id"]] as $value => $depend)
					{
						echo '<input type="hidden" name="param'.$param["id"].'" value="'.$value.'"'.($depend == 'depend' ? ' class="depend_param js_shop_depend_param"' : '').'>';
					}
				}
				else
				{
					$select = '';
					foreach ($param["values"] as $value)
					{
						if(! empty($result["row"]["param_multiple"][$param["id"]][$value["id"]]))
						{
							if(! $select)
							{
								$select = ' '.$param["name"].' <select name="param'.$param["id"].'" class="shop-dropdown inpselect'.($result["row"]["param_multiple"][$param["id"]][$value["id"]] == 'depend' ? ' depend_param js_shop_depend_param' : '').'">';
							}

							$select .= '<option value="'.$value["id"].'"'
							.(! empty($value["selected"]) ? ' class="js_form_option_selected" selected' : '')
							.'>'.$value["name"].'</option>
							';
						}
					}
					if($select)
					{
						echo $select.'</select> ';
					}
				}
			}
		}
		echo '</div>';
	echo '</div>';

	echo '<div>';
	foreach ($result["row"]["price_arr"] as $price)
	{
		$param_code = '';
		foreach ($price["param"] as $p)
		{
			if($p["value"])
			{
				$param_code .= ' param'.$p["id"].'="'.$p["value"].'"';
			}
		}
		if(! empty($price["image_rel"]))
		{
			$param_code .= ' image_id="'.$price["image_rel"].'"';
		}

		echo '<div class="js_shop_param_price shop_param_price shop-item-price col pr-1 text-center"'.$param_code.'>';
				if(! empty($price["old_price"]))
				{
				echo '<div class="shop_old_price price-old"><span class="red_polosa"><span class="shop_price_value strike">'.$price["old_price"].'<i class="fa fa-rub" aria-hidden="true"></i></span></span></div>';
				}
			echo '<span class="price"><span class="js_shop_price" summ="'.$price["price_no_format"].'" format_price_1="'.$this->diafan->configmodules("format_price_1", "shop").'" format_price_2="'.$this->diafan->configmodules("format_price_2", "shop").'" format_price_3="'.$this->diafan->configmodules("format_price_3", "shop").'">'.$price["price"].'</span>';
			echo '<i class="fa fa-rub" aria-hidden="true"></i>';
			
			if (! $price["count"] && empty($hide_submit) || empty($price["price_no_format"]) && ! $result['result']["buy_empty_price"])
			{
				echo '<span class="js_shop_no_buy shop_no_buy">'.$this->diafan->_('Товар временно отсутствует').'</span>';
				$waitlist = true;
			}
			echo '</span>';
		echo '</div>';
	}
	echo '</div>';
}

if ($result["row"]["no_buy"] || empty($result["row"]["count"]))
{
	echo '<div class="js_shop_no_buy js_shop_no_buy_good shop_no_buy shop_no_buy_good">'.$this->diafan->_('Товар временно отсутствует').'</div>';
	$hide_submit = true;
	$waitlist = true;
}
if(! $result["result"]["cart_link"])
{
    $hide_submit = true;
}

if(! empty($result["row"]["additional_cost"]))
{
	$rand = rand(0, 9999);
	echo '<div class="js_shop_additional_cost shop_additional_cost">';
	foreach($result["row"]["additional_cost"] as $r)
	{
		echo '<div class="shop_additional_cost_block"><input type="checkbox" name="additional_cost[]" value="'.$r["id"].'" id="shop_additional_cost_'.$result["row"]["id"].'_'.$r["id"].'_'.$rand.'" summ="';
		if(! $r["percent"] && $r["summ"])
		{
			echo $r["summ"];
		}
		echo '"';
		if($r["required"])
		{
			echo ' checked disabled';
		}
		echo '> <label for="shop_additional_cost_'.$result["row"]["id"].'_'.$r["id"].'_'.$rand.'">'.$r["name"];
		if($r["percent"])
		{
			foreach ($result["row"]["price_arr"] as $price)
			{
				$param_code = '';
				foreach ($price["param"] as $p)
				{
					if($p["value"])
					{
						$param_code .= ' param'.$p["id"].'="'.$p["value"].'"';
					}
				}
				echo '<div class="js_shop_additional_cost_price" summ="'.$r["price_summ"][$price["price_id"]].'"'.$param_code.'>';
				echo ' <b>+'.$r["format_price_summ"][$price["price_id"]].' '.$result["result"]["currency"].'</b></div>';
			}
		}
		elseif($r["summ"])
		{
			echo ' <div class="js_shop_additional_cost" summ="'.$r["summ"].'"><b>+'.$r["format_summ"].' '.$result["result"]["currency"].'</b></div>';
		}
		echo '</label></div>';
	}
	echo '</div>';
}

if(! empty($waitlist))
{
	echo '
	<div class="js_shop_waitlist shop_waitlist">
		'.$this->diafan->_('Сообщить, когда появится на e-mail').'
		<input type="email" name="mail" value="'.$this->diafan->_users->mail.'">
		<input type="button" value="'.$this->diafan->_('Ок', false).'" action="wait">
		<div class="errors error_waitlist" style="display:none"></div>
	</div>';
}

echo '<div class="js_shop_buy shop_buy to-cart col mb-3 text-right">';
	if (empty($result["row"]['is_file']) && empty($hide_submit))
	{
		echo '<div class="tovar_cena_block_colich">';
		echo '<input type="text" value="1" name="count" class="number" pattern="[0-9]+([\.|,][0-9]+)?" step="any">';
		echo '<div class="plus">+</div>';
		echo '<div class="minus">-</div>';
		echo '</div>';
		if(! empty($result["row"]["measure_unit"]))
		{
			echo ' '.$result["row"]["measure_unit"].' ';
		}
	}
	echo '<div class="tovar_id_text_only c_dgrey fs_12 fst-italic mb-3">
	'.$this->htmleditor('<insert name="show_dynamic" module="site" id="2" template="bordtext">').'
</div>';
	if(empty($hide_submit))
	{
		echo '<input type="button" class="button px-3" value="'.$this->diafan->_('В корзину', false).'" action="buy">';
	}


echo '<span class="js_shop_wishlist shop_wishlist btn_bord shop-like'.(! empty($result["wish"]) ? ' active' : '').'"><i class="fa fa-heart'.(! empty($result["wish"]) ? '' : '-o').'">&nbsp;</i></span>';
echo '</div>';
if(empty($hide_submit) && ! empty($result["result"]["one_click"]))
{
	echo '<span class="js_shop_one_click shop_one_click"><input type="button" value="'.$this->diafan->_('Купить в один клик', false).'" action="one_click"></span>';
}
echo '<div class="error shadow-none"';
if (! empty($result["row"]["count_in_cart"]))
{
	$measure_unit = ! empty($result["row"]["measure_unit"]) ? $result["row"]["measure_unit"] : $this->diafan->_('шт.');
	echo '>'.$this->diafan->_('<a href="%s">Уже в корзине</a>', true, BASE_PATH_HREF.$result["result"]["cart_link"], $measure_unit);
}
else
{
	echo ' style="display:none;">';
}
echo '</div>';
echo '</form>';
//форма быстрого заказа
if(! empty($result["result"]["one_click"]))
{
	$result["result"]["one_click"]["good_id"] = $result["row"]["id"];
	echo $this->get('one_click', 'cart', $result["result"]["one_click"]);
}
