<?php
/**
 * Шаблон блока статей
 * 
 * Шаблонный тег <insert name="show_block" module="clauses" [count="количество"]
 * [cat_id="категория"] [site_id="страница_с_прикрепленным_модулем"]
 * [sort="порядок_вывода"]
 * [images="количество_изображений"] [images_variation="тег_размера_изображений"]
 * [only_module="only_on_module_page"] [template="шаблон"]>:
 * блок статей
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

//заголовок блока
echo '<div class="fw-bold fs_18">'.$this->diafan->_('Полезно знать').'</div>';

//статьи
if(! empty($result["rows"]))
{
	echo $this->get($result["view_rows"], 'clauses', $result);
}

//ссылка на Все статьи
echo '<a href="https://dveri-vektor.ru/clauses" target="_blank">'.$this->diafan->_('Все статьи').'</a>';
