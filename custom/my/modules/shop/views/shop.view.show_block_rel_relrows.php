<?php
/**
 * Шаблон блока похожих товаров
 *
 * Шаблонный тег <insert name="show_block_rel" module="shop" [count="количество"]
 * [images="количество_изображений"] [images_variation="тег_размера_изображений"]
 * [template="шаблон"]>:
 * блок похожих товаров
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

if(empty($result['rows'])) return false;

	echo '<div class="row shop_rows">';
	
	foreach ($result['rows'] as $row)
	{		
		echo '<div class="col-12 mb-3 mt-2"><div class="js_shop shop-item d-flex justify-content-between">';

		//вывод названия и ссылки на товар	
		echo '<p class="align-self-center c_black fw-bold ps-2 ps-lg-4 shop-item-title td-none">'.$row["name"].'</p>';
		
	
		if(empty($result['search']))
		{
			//вывод кнопки "Купить"
			echo $this->get('buy_form_relrows', 'shop', array("row" => $row, "result" => $result));
			if(empty($result["hide_compare"]))
			{
				echo $this->get('compare_form', 'shop', $row);
			}
		}
		echo '</div>';
	
		echo '</div></div>';		
	}
	echo '</div>';
