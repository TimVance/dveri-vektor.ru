<?php
/**
 * Шаблон таблицы с товарами в корзине
 * 
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2019 OOO «Диафан» (http://www.diafan.ru/)
 */

if (! defined('DIAFAN')) {
	$path = __FILE__;
	while(! file_exists($path.'/includes/404.php'))
	{
		$parent = dirname($path);
		if($parent == $path) exit;
		$path = $parent;
	}
	include $path.'/includes/404.php';
}

echo '<div class="invoice-d__inside">
<section class="grid-d invoice-d__grid invoice-d__grid_section_products">';


//шапка таблицы
echo '
<div class="grid-d__rows grid-d__rows_type_head d-none">
<div class="grid-d__row">
<div class="cell-d grid-d__cell grid-d__cell_type_impresses">
<div class="cell-d__value"></div>
</div>
<div class="cell-d grid-d__cell grid-d__cell_type_details">
<div class="cell-d__value">'.$this->diafan->_('Наименование').'</div>
</div>
<div class="cell-d grid-d__cell grid-d__cell_type_amount">
<div class="cell-d__value">'.$this->diafan->_('Количество').'</div>
</div>
<div class="cell-d grid-d__cell grid-d__cell_type_unit-measure">
<div class="cell-d__value">'.$this->diafan->_('Единицы измерения').'</div>
</div>
<div class="cell-d grid-d__cell grid-d__cell_type_price">
<div class="cell-d__value">'.$this->diafan->_('Цена').'</div>
</div>';
if($result["discount"])
{
	echo '
	<div class="cell-d grid-d__cell grid-d__cell_type_price-old">
	<div class="cell-d__value">'.$this->diafan->_('Цена со скидкой').'</div>
	</div>
	<div class="cell-d grid-d__cell grid-d__cell_type_discount">
	<div class="cell-d__value">'.$this->diafan->_('Скидка').'</div>
	</div>';
}
echo '
<div class="cell-d grid-d__cell grid-d__cell_type_sum">
<div class="cell-d__value">'.$this->diafan->_('Сумма').'</div>
</div>
<div class="cell-d grid-d__cell grid-d__cell_type_remove">
<div class="cell-d__value"></div>
</div>
</div>
</div>

<div class="grid-d__rows grid-d__rows_type_products">';

//товары
if(! empty($result["rows"]))
{
	foreach ($result["rows"] as $row)
	{
		echo '<div class="grid-d__row js_cart_item d-flex flex-column flex-md-row border_grey_shad_2 rounded justify-content-between align-items-center p-3 mb-3">
		<div class="cell-d grid-d__cell grid-d__cell_type_impresses" title="">
		<div class="impresses-d grid-d__impresses grid-d__impresses_type_product">
		<div class="pictures-d impresses__pictures mx-auto">';
		if(! empty($row["img"]))
		{
			echo '<a class="cover-d picture-d" href="'.BASE_PATH_HREF.$row["link"].'" style="background-image: url('.$row["img"]["src"].');"></a>';
		}
		echo '</div>
		</div>
		</div>
		<div class="cell-d grid-d__cell grid-d__cell_type_details flex-grow-2 pl-lg-5 mt-lg-0 mt-3" title="'.$this->diafan->_('Наименование', false).'">
		<div class="details-d grid-d__details grid-d__details_type_product">
		<div class="features-d details-d__features">';
		echo '<a class="feature-d feature-d_type_name fs_20 font-weight-bolder text-decoration-none text-center text-lg-left c_black" href="'.BASE_PATH_HREF.$row["link"].'"><div class="feature-d__value">'.$row["good_name"].'</div></a>';
		if(! empty($row["cats"]))
		{
			echo '<div class="feature-d feature-d_type_breadcrumbs fs_14"><nav class="breadcrumbs-d feature-d__value">';
			foreach($row["cats"] as $i => $cat)
			{
				if($i)
				{
					echo '<a class="anchor-d breadcrumb-d breadcrumb-d_type_separator"><span class="anchor-d__name"> / </span></a>';
				}
				echo '<a class="anchor-d breadcrumb-d" href="'.BASE_PATH_HREF.$cat["link"].'"><span class="anchor-d__name">'.$cat["name"].'</span></a>';
			}
			echo '</nav></div>';
		}
					
		echo '<div class="feature-d feature-d_type_properties">
		<ul class="properties-d feature-d__value">';
		if($row["brand"])
		{
			echo '<li class="property-d"><span class="property-d__name">'.$this->diafan->_('Производитель', false).': </span><strong class="property-d__value"><a href="'.BASE_PATH_HREF.$row["brand"]["link"].'">'.$row["brand"]["name"].'</a></strong></li>';
		}
		if($row["article"])
		{
			echo '<li class="property-d"><span class="property-d__name">'.$this->diafan->_('Артикул', false).': </span><strong class="property-d__value">'.$row["article"].'</strong></li>';
		}
		if($row["additional_cost"])
		{
			foreach($row["additional_cost"] as $a)
			{
				echo '<li class="property-d"><span class="property-d__name">'.$a["name"].': </span>';
				if($a["summ"])
				{
					echo '<strong class="property-d__value"> + '.$a["format_summ"].' '.$result["currency"].'</strong>';
				}
				echo '</li>';
			}
		}
		if(! empty($row["params_name"]))
		{
			foreach($row["params_name"] as $p)
			{
				echo '<li class="property-d"><span class="property-d__name">'.$p["name"].': </span><strong class="property-d__value">'.$p["value"].'</strong></li>';
			}
		}
		echo '
		</ul>
		</div>
		</div>
		</div>
		</div>
		<div class="cell-d grid-d__cell grid-d__cell_type_amount flex-grow-1 text-center text-lg-right" title="'.$this->diafan->_('Количество', false).'">';
		if(empty($result["hide_form"]))
		{
			echo '<div class="amount-d grid-d__amount grid-d__amount_type_product js_cart_count position-relative d-inline-block">
				<span class="amount-d__decrement js_cart_count_minus'.($row["count"] <= 1 ? ' disabled' : '').'"></span>
				<input name="editshop'.$row["id"].'" class="amount-d__input" type="text" value="'.$row["count"].'" data-min="1" data-max="'.$row["price_count"].'">
				<span class="amount-d__increment js_cart_count_plus'.($row["price_count"] <= $row["count"] ? ' disabled' : '').'"></span>
			  </div>';
		}
		else
		{
			echo $row["count"];
		}
		echo '
		</div>
		<div class="cell-d grid-d__cell grid-d__cell_type_unit-measure d-none" title="'.$this->diafan->_('Единицы измерения', false).'">
		<div class="cell-d__value">'.($row["measure_unit"] ? $row["measure_unit"] : $this->diafan->_('шт.')).'</div>
		</div>
	
	<div class="cart_block_price text-center text-md-right fs_15 flex-grow-1 pr-lg-5 mt-lg-0 mt-3">	
		<div class="cell-d grid-d__cell grid-d__cell_type_price fs_13" title="'.$this->diafan->_('Цена', false).'"><span class="price-d__value">'.($row["old_price"] ? $row["old_price"] : $row["price"]).' </span><span class="price-d__currency">'.$result["currency"].'</span></div>';
		echo ' <div class="cell-d grid-d__cell grid-d__cell_type_discount c_green" title="'.$this->diafan->_('Скидка', false).'"><strong class="price-d">-<span class="price-d__value">';
			if($row["percent"])
			{
				echo $row["percent"].'%';
			}
			else
			{
				echo $row["discount_summ"];
			}
			echo ' </span>';
			if(! $row["percent"])
			{
				echo '<span class="price-d__currency">'.$result["currency"].'</span>';
			}
			echo '</strong></div>';

			if(empty($result["hide_form"]))
		{
			echo '<input name="" class="prosto_text d-inline text-right" type="text" value="'.$row["count"].'">';
			echo '<span class="">'.$this->diafan->_(' шт.').'</span>';
		}
		else
		{
			echo $row["count"];
		}

		if($result["discount"])
		{
			echo '<div class="cell-d grid-d__cell grid-d__cell_type_price-old d-inline-block ml-1" title="'.$this->diafan->_('Цена со скидкой', false).'">';
			if($row["old_price"])
			{
				echo '<span class="price-d__value">'.$this->diafan->_(' х ').''.$row["price"].'</span><span class="price-d__currency"> '.$result["currency"].'</span>';
			}
			echo ' </div>';
			
		}
		echo '
		<div class="cell-d grid-d__cell grid-d__cell_type_sum" title="'.$this->diafan->_('Сумма', false).'"><strong class="price-d"><span class="price-d__value">'.$row["summ"].' </span><span class="price-d__currency">'.$result["currency"].'</span></strong></div>
		
		<div class="remover-d grid-d__remover grid-d__remover_type_product d-block d-md-none pr-lg-4 pl-lg-5 mt-2" title="Убрать">
		<input class="remover-d__input" type="checkbox" id="r'.$row["id"].'" name="del'.$row["id"].'" value="1"><label class="icon-d remover-d__icon fa fa-times-circle js_cart_remove cursor_pointer c_red" data-confirm="'.$this->diafan->_('Вы действительно хотите удалить товар из корзины?', false).'" for="r'.$row["id"].'"></label>
		</div>

	</div>
		<div class="cell-d grid-d__cell grid-d__cell_type_remove d-none d-md-block pr-lg-4 pl-lg-5 mt-2" title="Убрать">
		<div class="remover-d grid-d__remover grid-d__remover_type_product" title="Убрать">
		<input class="remover-d__input" type="checkbox" id="r'.$row["id"].'" name="del'.$row["id"].'" value="1"><label class="icon-d remover-d__icon fa fa-times-circle js_cart_remove cursor_pointer c_red" data-confirm="'.$this->diafan->_('Вы действительно хотите удалить товар из корзины?', false).'" for="r'.$row["id"].'"></label>
		</div>
		</div>
		</div>';
	}
	echo '</div>';

	/*
	 * Скидочный купон. Шаблон, встроенный в форму корзины
	 * echo $this->htmleditor('<insert name="show_add_coupon" module="shop" template="cart">');
	 */

	// общая скидка от объема
	if(! empty($result["discount_total"]))
	{
		echo '<div class="grid-d__rows grid-d__rows_type_discount-totals">
		<div class="grid-d__row">
		<div class="cell-d grid-d__cell grid-d__cell_type_discount-total"><strong class="price-d"><span class="price-d__label">'.$this->diafan->_('Скидка').' </span><span class="price-d__value">';
		if($result["discount_total"]["percent"])
		{
			echo $result["discount_total"]["percent"].'%';
		}
		else
		{
			echo $result["discount_total"]["discount_summ"];
		}
			echo ' </span>';
		if(! $result["discount_total"]["percent"])
		{
			echo  '<span class="price-d__currency">'.$result["currency"].'</span>';
		}
		echo '</strong></div>
		</div>
		</div>';
	}
	if(! empty($result["discount_next"]))
	{
		echo '<div class="grid-d__rows grid-d__rows_type_discount-promises">
		<div class="grid-d__row">
		<div class="cell-d grid-d__cell grid-d__cell_type_discount-promise">
		<div class="cell-d__value">';
		if(! empty($result["discount_next"]) && empty($result["hide_form"]))
		{
			if($result["discount_next"]["percent"])
			{
				$discount = $result["discount_next"]["percent"].'%';
			}
			else
			{
				$discount = $result["discount_next"]["discount_summ"].' '.$result["currency"];
			}
			echo $this->diafan->_('До скидки %s осталось %s', true, $discount, $result["discount_next"]["summ"].' '.$result["currency"]);
		}
		echo '</div>
		</div>
		</div>
		</div>';
	}

	//итоговая строка для товаров
	echo '
	<div class="grid-d__rows grid-d__rows_type_subtotals d-none">
	<div class="grid-d__row">
	<div class="cell-d grid-d__cell grid-d__cell_type_impresses"></div>
	<div class="cell-d grid-d__cell grid-d__cell_type_details">
	<div class="cell-d__value">'.$this->diafan->_('Итого').':</div>
	</div>
	<div class="cell-d grid-d__cell grid-d__cell_type_amount">
	<div class="cell-d__value">'.$result["count"].'</div>
	</div>
	<div class="cell-d grid-d__cell grid-d__cell_type_unit-measure">
	<div class="cell-d__value">'.$this->diafan->_('шт.').'</div>
	</div>
	<div class="cell-d grid-d__cell grid-d__cell_type_price"></div>
	<div class="cell-d grid-d__cell grid-d__cell_type_price-old"></div>
	<div class="cell-d grid-d__cell grid-d__cell_type_discount">';
	echo '</div>
	<div class="cell-d grid-d__cell grid-d__cell_type_sum"><strong class="price-d"><span class="price-d__value">'.$result["summ_goods"].' </span><span class="price-d__currency">'.$result["currency"].'</span></strong>';
	if($result["old_summ_goods"])
	{
	  echo '<strong class="price-d price-d_old"><span class="price-d__value">'.$result["old_summ_goods"].' </span><span class="price-d__currency">'.$result["currency"].'</span></strong>';
	}
	echo '</div>
	<div class="cell-d grid-d__cell grid-d__cell_type_remove"></div>
	</div>
	</div></section>';

	//дополнительно
	if (! empty($result["additional_cost"])) 
	{
		echo '<section class="grid-d invoice-d__grid invoice-d__grid_section_additions">
		<div class="grid-d__rows grid-d__rows_type_head">
		<div class="grid-d__row">
		<div class="cell-d grid-d__cell grid-d__cell_type_heading">
		<div class="cell-d__value">'.$this->diafan->_('Дополнительно').'</div>
		</div>
		</div>
		</div>
		<div class="grid-d__rows">';
		foreach ($result["additional_cost"] as $row)
		{
			echo '
			<div class="grid-d__row">
			<div class="cell-d grid-d__cell grid-d__cell_type_details">
			<div class="details-d grid-d__details grid-d__details_type_addition">
			<div class="features-d details-d__features">
			<div class="feature-d feature-d_type_name">'.$row["name"].'</div>
			<div class="feature-d feature-d_type_description is-typographic">'.$row['text'];
			if ($row['amount'])
			{
				echo '<br>'.$this->diafan->_('Бесплатно от суммы').' '.$row['amount'].' '.$result["currency"];
			}
			if($row['percent'])
			{
				echo '<br>'.$this->diafan->_('Стоимость').' '.$row['percent'].'%';
			}
			echo '</div>
			</div>
			</div>
			</div>
			<div class="cell-d grid-d__cell grid-d__cell_type_sum"><strong class="price-d"><span class="price-d__value">'.$row["summ"].' </span><span class="price-d__currency">'.$result["currency"].'</span></strong></div>
			<div class="cell-d grid-d__cell grid-d__cell_type_add">
			<div class="field-d field-d_checkbox">
			<input name="additional_cost_ids[]" value="'.$row['id'].'" type="checkbox" id="additional_cost_'.$row['id'].'"'.($row["checked"] ? ' checked' : '').'>
			<label for="additional_cost_'.$row['id'].'"></label>
			</div>
			</div>
			</div>';
		}
		echo '</div></section>';
	}

	//способы доставки
	if (! empty($result["delivery"])) 
	{
		echo '<section class="grid-d invoice-d__grid invoice-d__grid_section_deliveries border_grey_shad_2 rounded b_white px-4 py-3">
		<div class="grid-d__rows grid-d__rows_type_head">
		<div class="grid-d__row">
		<div class="cell-d grid-d__cell grid-d__cell_type_heading">
		<div class="cell-d__value fs_20 font-weight-bold text-center">'.$this->diafan->_('Доставка').'</div>
		<div class="cell-d__value c_ore text-center mt-2">'.$this->diafan->_('От 1000 рублей — доставка БЕСПЛАТНАЯ ').'</div>
		<div class="cell-d__value c_ore text-center mb-3">'.$this->diafan->_('Доставка до 1000 рублей оплачивается отдельно (по расценкам такси)').'</div>
		</div>
		</div>
		</div>
		<div class="grid-d__rows column-count_2">';
		foreach ($result["delivery"] as $row)
		{
			if (! empty($row["thresholds"]) && empty($result["hide_form"]))
			{
				foreach ($row["thresholds"]  as $r)
				{
					if($r["amount"])
					{
						$row['text'] .= '<br>'.($r["price"] ? $this->diafan->_('Стоимость').' '.$r["price"].' '.$result["currency"].' '.$this->diafan->_('от суммы') : $this->diafan->_('Бесплатно от суммы')).' '.$r['amount'].' '.$result["currency"];
					}
					else
					{
						$row['text'] .= '<br>'.($r["price"] ? $this->diafan->_('Стоимость').' '.$r["price"].' '.$result["currency"] : $this->diafan->_('Бесплатно'));
					}
				}
			}
			echo '
			
			<div class="grid-d__row py-2 px-3 mb-3"><input name="delivery_id" id="delivery_id_'.$row['id'].'" value="'.$row['id'].'" type="radio" '.($row["selected"] ? ' checked' : '').'><label for="delivery_id_'.$row['id'].'" class="border_grey_2 py-2 px-3 rounded">
			<div class="cell-d grid-d__cell grid-d__cell_type_details pl-4">
			<div class="details-d grid-d__details grid-d__details_type_delivery">
			<div class="features-d details-d__features">
			<div class="feature-d feature-d_type_name font-weight-bold fs_16">'.$row["name"].'</div>
			<div class="feature-d feature-d_type_description is-typographic">'.$row["text"].'</div>
			</div>
			</div>
			</div>
			<div class="cell-d grid-d__cell grid-d__cell_type_sum"><strong class="price-d d-none"><span class="price-d__value">';
			if (is_null($row["price"]))
			{
				echo $this->diafan->_('Недоступно');
			}
			elseif ($row["price"] !== false)
			{
				echo $row["price"];
			}
			echo ' </span>';
			if (! is_null($row["price"]) && $row["price"] !== false)
			{
				echo '<span class="price-d__currency">'.$result["currency"].'</span>';
			}
			echo '</strong></div>
			<div class="cell-d grid-d__cell grid-d__cell_type_select">
			<div class="field-d field-d_radio">
			
			</div>
			</div>
			</label></div>';
			if ($row["service_view"])
			{
				echo '<div class="delivery_service">';
				echo $row["service_view"];
				echo  '</div>';
			}
		}
		echo '</div></section>';
	}
}


//итоговая строка таблицы
echo '<section class="grid-d invoice-d__grid invoice-d__grid_section_total text-center b_green c_white fs_20 rounded mt-4">
<div class="grid-d__rows">
<div class="grid-d__row py-3">
<div class="cell-d grid-d__cell grid-d__cell_type_details d-inline-block">
<div class="cell-d__value">'.$this->diafan->_('Сумма заказа').':</div>
</div>
<div class="cell-d grid-d__cell grid-d__cell_type_sum d-inline-block"><strong class="price-d"><span class="price-d__value">'.$result["summ"].' </span><span class="price-d__currency">'.$result["currency"].'</span></strong>';

if(! empty($result["tax"]))
{
	echo $this->diafan->_('в т. ч. %s', true, $result["tax_name"]).' '.$result["tax"].' '.$result["currency"];
}
echo '</div>
<div class="cell-d grid-d__cell grid-d__cell_type_select"></div>
</div>
</div>
</section>

</div>';
