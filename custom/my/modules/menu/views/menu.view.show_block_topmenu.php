<?php
/**
 * Шаблон меню template=topmenu
 *
 * Шаблонный тег: вывод меню
 * Полный аналог функции show_block, но с другим оформлением. 
 * Нужен, если необходимо оформить другое меню на сайте
 * Вызывается с параметром template=topmenu при вызове тега. 
 * <insert name="show_block" module="menu" id="1" template="topmenu"> 
 * Параметр должен быть приклеен к имени функции в конце
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

if (empty($result["rows"]))
{
	return false;
}
if(! empty($result["name"]))
{
	echo '<div class="block_header">'.$result["name"].'</div>';
}

echo '<ul class="navbar-nav nav-fill d-inline-flex fs_14 px-3 py-0 text-center">';
/*echo '<li class="nav-item fs_12">'.$this->htmleditor('<insert name="show_block" module="site" id="1">').'</li>';*/
echo $this->get('show_level_topmenu', 'menu', $result);
/*echo '<li class="link nav-item py-1 cursor_pointer" data-toggle="modal" data-target="#lkModal">Вход<span class="c_lyel"> | </span>Регистрация</li>';*/
echo '</ul>';    