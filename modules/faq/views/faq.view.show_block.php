<?php
/**
 * Шаблон блока вопросов и ответов
 * 
 * Шаблонный тег <insert name="show_block" module="faq" [count="количество"]
 * [cat_id="категория"] [site_id="страница_с_прикрепленным_модулем"]
 * [sort="порядок_вывода"] [often="часто_задаваемые_вопросы"]
 * [only_module="only_on_module_page"] [template="шаблон"]>:
 * блок вопросов и ответов
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

if(empty($result["rows"])) return false;

//заголовок блока
if (! empty($result["name"]))
{
	echo '<h2>'.$result["name"].'</h2>';
}

echo '<div class="block">';

//вопросы
echo $this->get($result["view_rows"], 'faq', $result);

echo '</div>';