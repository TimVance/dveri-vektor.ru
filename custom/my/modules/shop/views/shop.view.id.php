<?php
/**
 * Шаблон страницы товара
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

echo '<div class="js_shop_id js_shop shop_id shop-item-container odin_tovar row">';

echo '<div class="shop-item-left col-lg col-12">';

//вывод изображений товара
if(! empty($result["img"]))
{
	echo '<div class="shop-item-big-images shop_all_img js_shop_all_img d-block position-relative text-center">';
	$k = 0;
	foreach($result["img"] as $img)
	{
		switch ($img["type"])
		{
			case 'animation':
				echo '<a class="js_shop_img shop-item-image'.(empty($k) ? ' active' : '').'" href="'.BASE_PATH.$img["link"].'" data-fancybox="gallery'.$result["id"].'shop" image_id="'.$img["id"].'">';
				break;
			case 'large_image':
				echo '<a class="js_shop_img shop-item-image'.(empty($k) ? ' active' : '').'" href="'.BASE_PATH.$img["link"].'" rel="large_image" width="'.$img["link_width"].'" height="'.$img["link_height"].'" image_id="'.$img["id"].'">';
				break;
			default:
				echo '<a class="js_shop_img shop-item-image'.(empty($k) ? ' active' : '').'" href="'.BASE_PATH.$img["link"].'" image_id="'.$img["id"].'">';
				break;
		}
		echo '<img src="'.BASE_PATH.$img["link"].'" alt="'.$img["alt"].'" title="'.$img["title"].'" image_id="'.$img["id"].'" class="w-100 rounded shop_id_img">';
			echo '<span class="shop-photo-labels position-absolute">';
				if(! empty($result['hit']))
				{
					echo '<div class="mini_label ml_hit" data-bs-toggle="tooltip" data-bs-placement="top" title="Хит">';
					echo '</div>';
				}					
				if(! empty($result['new']))
				{
					echo '<div class="mini_label ml_new" data-bs-toggle="tooltip" data-bs-placement="top" title="Новинка">';
					echo '</div>';					
				}
				if(! empty($result['action']))
				{
					echo '<div class="mini_label ml_act" data-bs-toggle="tooltip" data-bs-placement="top" title="Акция">';
					echo '</div>';
				}
				if(! empty($result["ids_param"][42]))
					{
						echo '<span class="label_sale mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Скидка"><span>'; 
						echo $result["ids_param"][42]["value"];
						echo'</span></span>';
					}
				if(! empty($result["ids_param"][38]))
					{
						echo '<span class="label__save2 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 2 года">'; 
						echo $result["ids_param"][38]["value"];
						echo'</span>';
					}
				if(! empty($result["ids_param"][39]))
					{
						echo '<span class="label__save3 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 3 года">'; 
						echo $result["ids_param"][39]["value"];
						echo'</span>';
					}
				if(! empty($result["ids_param"][40]))
					{
						echo '<span class="label__save5 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 5 лет">'; 
						echo $result["ids_param"][40]["value"];
						echo'</span>';
					}
				if(! empty($result["ids_param"][41]))
					{
						echo '<span class="label__save10 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 10 лет">'; 
						echo $result["ids_param"][41]["value"];
						echo'</span>';
					}
				if(! empty($result["ids_param"][37]))
					{
						echo '<span class="label__palit mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Расширенная цветовая палитра">'; 
						echo $result["ids_param"][37]["value"];
						echo'</span>';
					}	
					
			echo '</span>';
		echo '</a>';
		$k++;
	}

	echo '</div>';
	if($result["preview_images"])
	{
/*		echo '<a class="control-prev shop-previews-control" href="#"><i class="fa fa-toggle-left"></i></a>
	          <a class="control-next shop-previews-control" href="#"><i class="fa fa-toggle-right"></i></a>';
*/		echo '<div class="shop_preview_img shop-item-previews items-scroller justify-content-center row my-4" data-item-per-screen="3" data-controls="shop-previews-control">';
		foreach($result["img"] as $img)
		{
			echo ' <a class="js_shop_preview_img item mx-2" href="#" style="background-image:url('.$img["preview"].')" image_id="'.$img["id"].'">&nbsp;</a>';
		}
		echo '</div>';
	}
}
echo '<div class="tovar_id_text_all fs_12 fst-italic px-3 py-2 mb-3 c_lgrey">'.$this->htmleditor('<insert name="show_block" module="site" id="5">').'</div>';
echo '<div class="tovar_id_share text-center"><p>'.$this->diafan->_("Поделиться в соцсетях").'</p>'.$this->htmleditor('<insert name="show_block" module="site" id="6">').'</div>';

echo '</div>';

echo '<div class="shop-item-center col">';
	echo '<div class="shop-item-info1">';

		//вывод артикула
		if(! empty($result["article"]))
		{
			echo '<h4 class="shop-item-artikul">'.$this->diafan->_('Артикул').': '.$result["article"].'</h4>';
		}

		//вывод производителя
/*		if (! empty($result["brand"]))
		{
			echo '<div class="shop_brand">';
			echo $this->diafan->_('Производитель').': ';
			echo '<a href="'.BASE_PATH_HREF.$result["brand"]["link"].'">'.$result["brand"]["name"].'</a>';
			if (! empty($result["brand"]["img"]))
			{
				echo ' ';
				foreach ($result["brand"]["img"] as $img)
				{
					switch ($img["type"])
					{
						case 'animation':
							echo '<a href="'.BASE_PATH.$img["link"].'" data-fancybox="gallery'.$result["id"].'shop_brand">';
							break;
						case 'large_image':
							echo '<a href="'.BASE_PATH.$img["link"].'" rel="large_image" width="'.$img["link_width"].'" height="'.$img["link_height"].'">';
							break;
						default:
							echo '<a href="'.BASE_PATH_HREF.$img["link"].'">';
							break;
					}
					echo '<img src="'.$img["src"].'" width="'.$img["width"].'" height="'.$img["height"].'" alt="'.$img["alt"].'" title="'.$img["title"].'">'
					. '</a> ';
				}
			}
			echo '</div>';
		}
*/
		//вывод рейтинга товара
		if(! empty($result["rating"]))
		{
			echo '<div class="shop-item-rate rate">'.$this->diafan->_('Рейтинг').": ";
			echo $result["rating"];
			echo '</div>';
		}

		//скидка на товар
/*		if(! empty($result["discount"]))
		{
			echo '<div class="shop_discount">'.$this->diafan->_('Скидка').': <span class="shop_discount_value">'.$result["discount"].' '.$result["discount_currency"].($result["discount_finish"] ? ' ('.$this->diafan->_('до').' '.$result["discount_finish"].')' : '').'</span></div>';
		}
*/

		//характеристики товара
		if(! empty($result["param"]))
		{
			echo $this->get('param', 'shop', array("rows" => $result["param"], "id" => $result["id"]));
		}

/*		if(empty($result["hide_compare"]))
		{
		    echo $this->get('compare_form', 'shop', $result);
		    //echo $this->get('compared_goods_list', 'shop', array("site_id" => $result["site_id"], "shop_link" => $result['shop_link']));
		}*/

		if(! empty($result["weight"]))
		{
			echo '<div class="shop_weight">'.$this->diafan->_('Вес').': '.$result["weight"].'</div>';
		}
		if(! empty($result["length"]))
		{
			echo '<div class="length">'.$this->diafan->_('Длина').': '.$result["length"].'</div>';
		}
		if(! empty($result["width"]))
		{
			echo '<div class="shop_width">'.$this->diafan->_('Ширина').': '.$result["width"].'</div>';
		}
		if(! empty($result["height"]))
		{
			echo '<div class="shop_height">'.$this->diafan->_('Высота').': '.$result["height"].'</div>';
		}
/*        echo $this->htmleditor('<insert name="show_social_links">');*/

	echo '</div>';


/*  	echo $this->htmleditor('<insert name="show_block_order_rel" module="shop" count="2" images="1" defer="emergence" defer_title="C этим товаром покупают">');
*/
echo '</div>';

//счетчик просмотров
if(! empty($result["counter"]))
{
	echo '<div class="shop_counter">'.$this->diafan->_('Просмотров').': '.$result["counter"].'</div>';
}

//теги товара
if(! empty($result["tags"]))
{
	echo $result["tags"];
}

//комментарии к товару
/*if (!empty($result["comments"]))
{
	echo $result["comments"];
}
*/
echo '<div class="shop-item-right col-lg-3 col">';
	//кнопка "Купить"
	echo $this->get('buy_form', 'shop', array("row" => $result, "result" => $result));
	
//	echo '<span class="js_shop_wishlist shop_wishlist btn_bord shop-like'.(! empty($result["wish"]) ? ' active' : '').'"><i class="fa fa-heart'.(! empty($result["wish"]) ? '' : '-o').'">&nbsp;</i></span>';

	echo '<div class="shop-item-info2">
		
	</div>';

echo '</div>';

echo '<div class="shop-item-opis col-12 mt-5">';
	//полное описание товара
//	echo '<div class="shop_text mt-5 mb-3">'.$this->htmleditor($result['text']).'</div>';
	echo '<ul class="nav nav-tabs justify-content-start justify-content-lg-between py-0" id="tovarIDtab" role="tablist">
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none active" id="complectuyushie-tab" data-bs-toggle="tab" data-bs-target="#complectuyushie" type="button" role="tab" aria-controls="complectuyushie" aria-selected="true">Комплектующие</button>
		</li>
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="opisanie-tab" data-bs-toggle="tab" data-bs-target="#opisanie" type="button" role="tab" aria-controls="opisanie" aria-selected="false">Описание</button>
		</li>
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="detali-tab" data-bs-toggle="tab" data-bs-target="#detali" type="button" role="tab" aria-controls="detali" aria-selected="false">Детали</button>
		</li>
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="harakteristiki-tab" data-bs-toggle="tab" data-bs-target="#harakteristiki" type="button" role="tab" aria-controls="harakteristiki" aria-selected="false">Характеристики</button>
		</li>
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false">Видео</button>
		</li>
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="otzivi-tab" data-bs-toggle="tab" data-bs-target="#otzivi" type="button" role="tab" aria-controls="otzivi" aria-selected="false">Отзывы</button>
		</li>
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="voprosi-tab" data-bs-toggle="tab" data-bs-target="#voprosi" type="button" role="tab" aria-controls="voprosi" aria-selected="false">Вопросы по товару</button>
		</li>
	</ul>';
	echo '<div class="tab-content py-3" id="tovarIDtabContent">';
		//Комплектующие
		echo '<div class="tab-pane fade show active" id="complectuyushie" role="tabpanel" aria-labelledby="complectuyushie-tab">';
		echo $this->htmleditor('<insert name="show_block_rel" module="shop" count="99" images="1" defer="emergence" defer_title="Комплектующие" template="relrows">');
		echo '</div>';
		//полное описание товара
		echo '<div class="tab-pane fade" id="opisanie" role="tabpanel" aria-labelledby="opisanie-tab">'.$this->htmleditor($result['text']).'</div>';
		//Детали
		echo '<div class="tab-pane fade" id="detali" role="tabpanel" aria-labelledby="detali-tab">';
		echo '<div>'.$this->htmleditor('<insert name="show_dynamic" module="site" id="4">').'</div></div>';
		
		//Характеристики
		echo '<div class="tab-pane fade" id="harakteristiki" role="tabpanel" aria-labelledby="harakteristiki-tab">';
			if(! empty($result["param"]))
			{
				echo $this->get('param', 'shop', array("rows" => $result["param"], "id" => $result["id"]));
			}
		echo '</div>';
		//Видео
		echo '<div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab"><div class="rounded embed-responsive embed-responsive-16by9">'.$this->htmleditor('<insert name="show_dynamic" module="site" id="3">').'</div></div>';
		//Отзывы <insert name="show" module="reviews">
		echo '<div class="tab-pane fade" id="otzivi" role="tabpanel" aria-labelledby="otzivi-tab">'.$this->htmleditor('<insert name="show" module="reviews">').'</div>';
		//Вопросы по товару
		echo '<div class="tab-pane fade" id="voprosi" role="tabpanel" aria-labelledby="voprosi-tab">...</div>';
	echo '</div>';
	
echo '</div>';

echo '</div>';


//ссылки на предыдущий и последующий товар
/*if(! empty($result["previous"]) || ! empty($result["next"]))
{
	echo '<div class="previous_next_links_new my-3 row">';
	if(! empty($result["previous"]))
	{
		echo '<div class="previous_link_new col"><a href="'.BASE_PATH_HREF.$result["previous"]["link"].'">&larr; '.$result["previous"]["text"].'</a></div>';
	}
	if(! empty($result["next"]))
	{
		echo '<div class="next_link_new col"><a href="'.BASE_PATH_HREF.$result["next"]["link"].'">'.$result["next"]["text"].' &rarr;</a></div>';
	}
	echo '</div>';
}*/
/*echo $this->htmleditor('<insert name="show_block_rel" module="shop" count="4" images="1" defer="emergence" defer_title="Похожие товары">');*/
