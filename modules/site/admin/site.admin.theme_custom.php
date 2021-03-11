<?php
/**
 * Настройки шаблона сайта
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2020 OOO «Диафан» (http://www.diafan.ru/)
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

/**
 * Site_admin_theme_custom
 */
class Site_admin_theme_custom extends Diafan
{
	/**
	 * @var array поля для редактирования
	 */
	public $variables = array (
		'phone' => array(
			'type' => 'phone',
			'name' => 'Телефон',
			'help' => "Контактный телефон.",
			'multilang' => true
		),
		'contacts' => array(
			'type' => 'editor',
			'name' => 'Контакты',
			'help' => "Адрес организации.",
			'multilang' => true
		),
		'title_block' => array(
			'type' => 'title',
			'name' => 'Блоки',
		),
		'show_favorite' => array(
			'type' => 'checkbox',
			'name' => 'Показывать избранное',
		),
		'show_lk' => array(
			'type' => 'checkbox',
			'name' => 'Показывать личный кабинет',
		),
		'show_slider' => array(
			'type' => 'checkbox',
			'name' => 'Показывать слайдер',
		),
		'title_inside' => array(
			'type' => 'title',
			'name' => 'Внутренние страницы',
		),
		'delivery' => array(
			'type' => 'editor',
			'name' => 'Блок о доставке в карточке товара',
			'multilang' => true
		),
		'return' => array(
			'type' => 'editor',
			'name' => 'Блок о возврате в карточке товара',
			'multilang' => true
		),
	);
}
