<?php
/**
 * Шаблон постраничной навигации для пользовательской части
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

if ($result)
{
	echo '<div class="block paginator"'.(! empty($result["more"]) && ! empty($result["more"]["uid"]) ? ' uid="'.$result["more"]["uid"].'"' : '').'>';
	foreach ($result as $l)
	{
		switch($l["type"])
		{
			case "more":
				break;

			case "first":
				echo '<a class="start c_green td-none btn_bord px-2 py-1" href="'.BASE_PATH_HREF.$l["link"].'">&#8592;</a> ';
				break;

			case "current":
				echo '<span class="active c_white px-3 py-2 b_dgreen">'.$l["name"].'</span> ';
				break;

			case "previous":
				echo '<a class="prev c_green td-none btn_bord px-2 py-1" href="'.BASE_PATH_HREF.$l["link"].'" title="'.$this->diafan->_('На предыдущую страницу', false).'">...</a> ';
				break;

			case "next":
				echo '<a class="next c_green td-none btn_bord px-2 py-1" href="'.BASE_PATH_HREF.$l["link"].'" title="'.$this->diafan->_('На следующую страницу', false).' '.$this->diafan->_('Всего %d', false, $l["nen"]).'">...</a> ';
				break;

			case "last":
				echo '<a class="end c_green td-none btn_bord px-2 py-1" href="'.BASE_PATH_HREF.$l["link"].'">&#8594;</a> ';
				break;

			default:
				echo '<a class="c_green td-none btn_bord px-2 py-1" href="'.BASE_PATH_HREF.$l["link"].'">'.$l["name"].'</a> ';
				break;
		}
	}
	echo '</div>';
}  