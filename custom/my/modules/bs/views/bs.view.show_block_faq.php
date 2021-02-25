<?php
/**
 * Шаблон блока баннеров
 * 
 * Шаблонный тег <insert name="show_block" module="bs" [count="all|количество"]
 * [cat_id="категория"] [id="номер_баннера"] [template="шаблон"]>:
 * блок баннеров
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

if (empty($result))
{
	return false;
}               

if(! isset($GLOBALS['include_bs_js']))
{
	$GLOBALS['include_bs_js'] = true;
	//скрытая форма для отправки статистики по кликам
	echo '<form method="POST" enctype="multipart/form-data" action="" class="ajax js_bs_form bs_form">
	<input type="hidden" name="module" value="bs">
	<input type="hidden" name="action" value="click">
	<input type="hidden" name="banner_id" value="0">
	</form>';
}
echo '<div class="spoiler">';
foreach ($result as $row)
{
	echo '<details class="b_llblue c_white px-3 py-2 mb-2">';
	//вывод названия баннера
	if (! empty($row['name']))
	{
		echo '<summary class="row out_none"><span class="vopros fs_18 col">';
			echo $row['name'];
		echo '</span> <span class="col-auto align-self-center"><i class="fa fa-plus fs_18 align-bottom b_white c_llblue rounded-circle text-center tran_all_05" aria-hidden="true"></i></span> </summary>';
	}
	//вывод описания к баннеру
	if (! empty($row['text']))
	{
		echo '<div class="otvet b_white c_black mb-2 mt-3 pb-4">';
			echo $row['text'];
		echo '</div>';
	}
	echo '</details>';
	
}
echo '</div>';