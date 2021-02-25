<?php
/**
 * Шаблон блока списка желаний
 *
 * Шаблонный тег <insert name="show_block" module="wishlist" [template="шаблон"]>:
 * выводит информацию об отложенных товарах
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

echo '<span class="wishlist_block c_green btn_bord d-block position-relative"><a href="'.$result["link"].'" class="c_green pos_center position-absolute td-none top-line-item">'
.'<i class="fa fa-heart fs_22"></i></a>'
.'<span id="show_wishlist" class="c_black fw-bold d-lg-inline-block d-none fs_14 position-absolute text-end">'.$this->get('info', 'wishlist', $result).'</span>'
.'</span>';