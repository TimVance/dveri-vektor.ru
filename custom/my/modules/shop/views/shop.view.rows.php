<?php
/**
 * Шаблон элементов в списке товаров
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
echo '<div class="row shop_rows">';
if(empty($result['rows'])) return false;

foreach ($result['rows'] as $row)
{
	echo '<div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-3 mt-2"><div class="js_shop shop-item h-100">';

	//вывод изображений товара
	if(! empty($row["img"]))
	{
		echo '<div class="shop_img shop-photo position-relative d-block text-center align-self-center">';
		foreach ($row["img"] as $img)
		{
			switch ($img["type"])
			{
				case 'animation':
					echo '<a href="'.BASE_PATH.$img["link"].'" data-fancybox="gallery'.$row["id"].'shop">';
					break;
				case 'large_image':
					echo '<a href="'.BASE_PATH.$img["link"].'" rel="large_image" width="'.$img["link_width"].'" height="'.$img["link_height"].'">';
					break;
				default:
					echo '<a href="'.BASE_PATH_HREF.$img["link"].'">';
					break;
			}
			echo '<img src="'.$img["src"].'" alt="'.$img["alt"].'" title="'.$img["title"].'" image_id="'.$img["id"].'" class="js_shop_img p-2 pt-3 text-centr">';
			echo '<div class="position-absolute shop-photo-labels text-right">';
					//вывод скидки на товар
/*					if(! empty($row["discount"]))
					{
						echo '<div class="labels__dis b_red c_white fs_13 c_white lh-1 mx-2 my-1 px-2 py-1 text-center">'.$this->diafan->_('-').' <span class="shop_discount_value">'. $row['discount'] . $row['discount_currency'] . '</span></div>';
					}
					if(! empty($row['hit']))
					{
						echo '<div class="mini_label ml_hit">';
						echo $this->diafan->_('Хит');
						echo '</div>';
					}					
					if(! empty($row['new']))
					{
						echo '<div class="mini_label ml_new">';
						echo $this->diafan->_('Новинка');
						echo '</div>';					
					}
					if(! empty($row['action']))
					{
						echo '<div class="mini_label ml_act">';
						echo $this->diafan->_('Акция');
						echo '</div>';
					}
					if(! empty($row["ids_param"][3]))
					{
						echo '<span class="labels_param mini_label"><span>'; 
						echo $row["ids_param"][3]["name"];
						echo'</span>';
					}
*/	
				echo '</div>';
			echo '</a> ';
			if(! empty($result['search']))
			{
				break;
			}
		}
		if(empty($result['search']))
		{
			echo '<span class="js_shop_wishlist shop_wishlist btn_bord position-absolute b_white shadow shop-like'.(! empty($row["wish"]) ? ' active' : '').'"><i class="fa fa-heart tran_all_05'.(! empty($row["wish"]) ? '' : '-o').'">&nbsp;</i></span>';
		}

/*		echo '<input type="button" value="Быстрый просмотр" class="b_black c_white js_preview_button position-absolute px-3 py-2" data-fancybox data-src="#js_preview_block_'.$row["id"].'">';
*/		echo '</div>';
		}
		else  
			{ 
			echo '<div class="no_foto"></div>'; 
			}
/*	echo '<div class="js_preview_block c_black b_white" id="js_preview_block_'.$row["id"].'" style="display:none">'.$this->htmleditor('<insert name="show_block" module="shop" ids="'.$row["id"].'" defer="emergence" template="preview" images="50">').'</div>';
*/
	//вывод названия и ссылки на товар	
	echo '<a href="'.BASE_PATH_HREF.$row["link"].'" class="c_black d-block fw-bold lh-1_2 mb-0 mt-2 px-2 fs_14 shop-item-title td-none text-center">'.$row["name"].'</a>';
	
	//вывод краткого описания товара
/*	if(! empty($row["anons"]))
	{
		echo '<div class="shop_anons my-1 px-3 fs_13 lh-1_2">'.$this->htmleditor($row['anons']).'</div>';
	}
*/
	//рейтинг товара
/*	if(! empty($row["rating"]))
	{
		echo ' '.$row["rating"];
	}		
*/

	//вывод производителя
/*	if(! empty($row["brand"]))
	{
		echo '<div class="shop_brand">';
		echo $this->diafan->_('Производитель').': ';
		echo '<a href="'.BASE_PATH_HREF.$row["brand"]["link"].'">'.$row["brand"]["name"].'</a>';
		echo '</div>';
	}
*/
	//вывод артикула
/*	if(! empty($row["article"]))
	{
		echo '<div class="shop_article">';
		echo $this->diafan->_('Артикул').': ';
		echo '<span class="shop_article_value">'.$row["article"].'</span>';
		echo '</div>';
	}
*/

	//теги товара
/*	if(! empty($row["tags"]))
	{
		echo $row["tags"];
	}
*/

	if(empty($result['search']))
	{
		//вывод кнопки "Купить"
		echo $this->get('buy_form_rows', 'shop', array("row" => $row, "result" => $result));
		if(empty($result["hide_compare"]))
		{
			echo $this->get('compare_form', 'shop', $row);
		}
	}

	//вывод параметров товара
	echo '<div class="px-3 c_grey param_hid">';
	if(empty($result['search']) && ! empty($row["param"]))
	{
		echo $this->get('param', 'shop', array("rows" => $row["param"], "id" => $row["id"]));
	}
	echo '</div>';

	echo '</div></div>';		
}
echo '</div>';

//Кнопка "Показать ещё"
if(! empty($result["show_more"]))
{
	echo $result["show_more"];
}
