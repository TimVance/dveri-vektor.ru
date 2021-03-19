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

// Делаем редирект, если в названии категории есть слово "Комплектующие"
$block_word = 'Комплектующие';
$bread_size = count($result["breadcrumb"]) - 1;
$haystack = $result["breadcrumb"][$bread_size]["name"];
if (strpos($haystack, $block_word) !== false) {
    header('Location: https://dveri-vektor.ru/404');
}
// Делаем редирект, если в названии категории есть слово "Комплектующие"



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
				echo '<a class="js_shop_img shop-item-image'.(empty($k) ? ' active' : '').'" href="'.BASE_PATH.$img["link"].'" data-fancybox="gallery'.$result["id"].'shop" image_id="'.$img["id"].'" data-caption="'.$img["alt"].'">';
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
					if(! empty($result["ids_param"][25]))
					{
						echo '<span class="label__vo mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Рекомендуем"><span class="d-none">'; 
						echo $result["ids_param"][25]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][34]))
					{
						echo '<span class="label__obrazec mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Образец в выставочном зале"><span class="d-none">'; 
						echo $result["ids_param"][34]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][28]))
					{
						echo '<span class="label__present mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Подарок при покупке"><span class="d-none">'; 
						echo $result["ids_param"][28]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][29]))
					{
						echo '<span class="label__delivfree mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Бесплатная доставка"><span class="d-none">'; 
						echo $result["ids_param"][29]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][26]))
					{
						echo '<span class="label__money mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Доступно в рассрочку"><span class="d-none">'; 
						echo $result["ids_param"][26]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][27]))
					{
						echo '<span class="label__mont2 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантия на монтаж 2 года "><span class="d-none">'; 
						echo $result["ids_param"][27]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][30]))
					{
						echo '<span class="label__montfree mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Монтаж в подарок"><span class="d-none">'; 
						echo $result["ids_param"][30]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][31]))
					{
						echo '<span class="label__montsale mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Монтаж со скидкой"><span class="d-none">'; 
						echo $result["ids_param"][31]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][33]))
					{
						echo '<span class="label__sound mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Повышенная шумоизоляция"><span class="d-none">'; 
						echo $result["ids_param"][33]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][35]))
					{
						echo '<span class="label__water mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Влагостойкое покрытие"><span class="d-none">'; 
						echo $result["ids_param"][35]["name"];
						echo'</span></span>';
					}	
					if(! empty($result["ids_param"][36]))
					{
						echo '<span class="label__proch mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Высокопрочное покрытие"><span class="d-none">'; 
						echo $result["ids_param"][36]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][32]))
					{
						echo '<span class="label__termo mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Терморазрыв"><span class="d-none">'; 
						echo $result["ids_param"][32]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][37]))
					{
						echo '<span class="label__palit mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Расширенная цветовая палитра"><span class="d-none">'; 
						echo $result["ids_param"][37]["name"];
						echo'</span></span>';
					}
				if(! empty($result["ids_param"][38]))
					{
						echo '<span class="label__save2 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 2 года"><span class="d-none">'; 
						echo $result["ids_param"][38]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][39]))
					{
						echo '<span class="label__save3 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 3 года"><span class="d-none">'; 
						echo $result["ids_param"][39]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][40]))
					{
						echo '<span class="label__save5 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 5 лет"><span class="d-none">'; 
						echo $result["ids_param"][40]["name"];
						echo'</span></span>';
					}
					if(! empty($result["ids_param"][41]))
					{
						echo '<span class="label__save10 mini_label" data-bs-toggle="tooltip" data-bs-placement="top" title="Гарантийный срок 10 лет"><span class="d-none">'; 
						echo $result["ids_param"][41]["name"];
						echo'</span></span>';
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
echo '<div class="tovar_id_text_all fs_12 fst-italic mb-3 c_dgrey fw-bold px-2 py-1 lh-1_2">'.$this->htmleditor('<insert name="show_block" module="site" id="5">').'</div>';
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


		// Описания для подсказок характеристик
		echo '<div style="display: none" class="js-text-params">';
		foreach ($result["ids_param"] as $param) {
		    if (!empty($param["text"])) echo '<span data-id="'.$param["id"].'">'.$param["text"].'</span>';
        }
		echo '</div>';

		// Выводим характеристику, если она одна
		echo '<div class="js-param-depends-price">';
		    $count_params = count($result["param_multiple"]);
		    foreach ($result["param_multiple"] as $parmult_id => $parmult) {
                if (count($parmult) == 1 && $count_params == 1) {
                    echo '<div class="param-block mb-3">';
                        echo '<div class="param-title fw-bold c_dblue mb-2">'.$result["ids_param"][$parmult_id]["name"].' <span '.(!empty($result["ids_param"][$parmult_id]["text"]) ? '' : 'style="display:none"').' data-bs-toggle="tooltip" data-bs-placement="top" title="'.$result["ids_param"][$parmult_id]["text"].'" class="b_green c_white cursor_pointer d-inline-block fw-bold ms-1 rounded-circle text-center">?</span> </div>';
                        echo '<label><input type="radio" checked style="display: none"><span>'.$result["ids_param"][$parmult_id]["value"][0].'</span></label>';
                    echo '</div>';
                }
            }
		echo '</div>';

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
/*if(! empty($result["tags"]))
{
	echo $result["tags"];
}*/

//комментарии к товару
/*if (!empty($result["comments"]))
{
	echo $result["comments"];
}
*/
echo '<div class="shop-item-right col-lg-3 col">';
	//кнопка "Купить"
	echo $this->get('buy_form', 'shop', array("row" => $result, "result" => $result));
	
	//echo '<span class="js_shop_wishlist shop_wishlist btn_bord shop-like'.(! empty($result["wish"]) ? ' active' : '').'"><i class="fa fa-heart'.(! empty($result["wish"]) ? '' : '-o').'">&nbsp;</i></span>';

	echo '<div class="shop-item-info2">';

		//кнопка Экспресс-расчёт
		echo '<div class="mt-3">'.$this->htmleditor('<insert name="show_block" module="site" id="7">').'</div>';

		//акции товара
		echo '<div class="tovar_id_stock mt-3">';
			if(! empty($result["ids_param"][77]))
			{
				echo '<span>'; 
				foreach ($result["ids_param"][77]["value"] as $akciya) {
					echo '<a target="_blank" href="'.$akciya["link"].'">'.$akciya["name"].'</a>';
				}
				echo'</span>';
			}
		echo '<span>'.$this->htmleditor('<insert name="show_dynamic" module="site" id="5">').'</span>';
		echo '</div>';

		//блок Есть вопросы?
		echo '<div class="tovar_id_question mt-3">'.$this->htmleditor('<insert name="show_dynamic" module="site" id="7">').'</div>';

		//статьи товара
		echo '<div class="tovar_id_clauses mt-3">';
			//статьи Входные двери
			if(! empty($result["ids_param"][76]))
			{
				echo '<span>'; 
				echo '<div class="col">'.$this->htmleditor('<insert name="show_block" module="clauses" count="4" cat_id="1" template="tovarid">').'</div>';
				echo'</span>';
			}
			//Статьи о межкомнатных дверях
			if(! empty($result["ids_param"][74]))
			{
				echo '<span>'; 
				echo '<div class="col">'.$this->htmleditor('<insert name="show_block" module="clauses" count="4" cat_id="2" template="tovarid">').'</div>';
				echo'</span>';
			}
			//Статьи о дверях общие
			if(! empty($result["ids_param"][75]))
			{
				echo '<span>'; 
				echo '<div class="col">'.$this->htmleditor('<insert name="show_block" module="clauses" count="4" cat_id="3" template="tovarid">').'</div>';
				echo'</span>';
			}
		echo '</div>';

	echo '</div>';

echo '</div>';

echo '<div class="shop-item-opis col-12 mt-5">';
	//полное описание товара
//	echo '<div class="shop_text mt-5 mb-3">'.$this->htmleditor($result['text']).'</div>';
	echo '<ul class="nav nav-tabs justify-content-start justify-content-lg-between py-0" id="tovarIDtab" role="tablist">';

        if (!empty($this->htmleditor($result['text']))) {
            echo '
                <li class="nav-item" role="presentation">
                <button class="nav-link fs_18 border-0 b_none c_llblue out_none active" id="opisanie-tab" data-bs-toggle="tab" data-bs-target="#opisanie" type="button" role="tab" aria-controls="opisanie" aria-selected="false">Описание</button>
                </li>';
        }

        if (!empty($this->htmleditor('<insert name="show_block_rel" module="shop" count="99" images="1" template="relrows">'))) {
            echo '
            <li class="nav-item" role="presentation">
            <button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="complectuyushie-tab" data-bs-toggle="tab" data-bs-target="#complectuyushie" type="button" role="tab" aria-controls="complectuyushie" aria-selected="true">Комплектующие</button>
            </li>';
        }

	    if (!empty($this->htmleditor('<insert name="show_dynamic" module="site" id="4">'))) {
	        echo '
	        	<li class="nav-item" role="presentation">
                    <button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="detali-tab" data-bs-toggle="tab" data-bs-target="#detali" type="button" role="tab" aria-controls="detali" aria-selected="false">Детали</button>
                </li>
	        ';
	    }

        if(! empty($result["param"])) {
            echo '
                <li class="nav-item" role="presentation">
                <button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="harakteristiki-tab" data-bs-toggle="tab" data-bs-target="#harakteristiki" type="button" role="tab" aria-controls="harakteristiki" aria-selected="false">Характеристики</button>
                </li>';
        }

	    if (!empty($this->htmleditor('<insert name="show_dynamic" module="site" id="3">'))) echo '
            <li class="nav-item" role="presentation">
            <button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false">Видео</button>
            </li>';
		echo '
        <li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="otzivi-tab" data-bs-toggle="tab" data-bs-target="#otzivi" type="button" role="tab" aria-controls="otzivi" aria-selected="false">Отзывы</button>
		</li>
		<li class="nav-item" role="presentation">
		<button class="nav-link fs_18 border-0 b_none c_llblue out_none" id="voprosi-tab" data-bs-toggle="tab" data-bs-target="#voprosi" type="button" role="tab" aria-controls="voprosi" aria-selected="false">Вопросы по товару</button>
		</li>
	</ul>';
	echo '<div class="tab-content py-3" id="tovarIDtabContent">';

		//полное описание товара
        if (!empty($this->htmleditor($result['text']))) {
            echo '<div class="tab-pane fade show active" id="opisanie" role="tabpanel" aria-labelledby="opisanie-tab">' . $this->htmleditor($result['text']) . '</div>';
        }

		//Комплектующие
        if (!empty($this->htmleditor('<insert name="show_block_rel" module="shop" count="99" images="1" template="relrows">'))) {
            echo '<div class="tab-pane fade" id="complectuyushie" role="tabpanel" aria-labelledby="complectuyushie-tab">';
            echo $this->htmleditor('<insert name="show_block_rel" module="shop" count="99" images="1" template="relrows">');
            echo '</div>';
        }

		//Детали
        if (!empty($this->htmleditor('<insert name="show_dynamic" module="site" id="4">'))) {
            echo '<div class="tab-pane fade" id="detali" role="tabpanel" aria-labelledby="detali-tab">';
            echo '<div>' . $this->htmleditor('<insert name="show_dynamic" module="site" id="4">') . '</div></div>';
        }

		//Характеристики
        if(! empty($result["param"])) {
            echo '<div class="tab-pane fade" id="harakteristiki" role="tabpanel" aria-labelledby="harakteristiki-tab">';
                echo $this->get('param', 'shop', array("rows" => $result["param"], "id" => $result["id"]));
            echo '</div>';
        }

		//Видео
        if (!empty($this->htmleditor('<insert name="show_dynamic" module="site" id="3">')))
		    echo '<div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab"><div class="rounded embed-responsive embed-responsive-16by9">'.$this->htmleditor('<insert name="show_dynamic" module="site" id="3">').'</div></div>';

		//Отзывы <insert name="show" module="reviews">
        if (!empty(strip_tags($this->htmleditor('<insert name="show" module="reviews">'))))
		    echo '<div class="tab-pane fade" id="otzivi" role="tabpanel" aria-labelledby="otzivi-tab">'.$this->htmleditor('<insert name="show" module="reviews">').'</div>';

		//Вопросы по товару
		echo '<div class="tab-pane fade" id="voprosi" role="tabpanel" aria-labelledby="voprosi-tab">';
			if (!empty($result["comments"]))
			{
				echo $result["comments"];
			}
		echo '</div>';

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

?>