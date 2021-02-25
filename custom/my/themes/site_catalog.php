<?php
/**
 * Основной шаблон сайта
 *
 * @package    DIAFAN.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2018 OOO «Диафан» (http://www.diafan.ru/)
 */

if(! defined("DIAFAN"))
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
?><!DOCTYPE html>
<html lang="ru">

<head>
	<insert name="show_include" file="head">
</head>

<body>
<div id="catalog">

	<insert name="show_include" file="header">

<section class="container">
	<insert name="show_breadcrumb" separator="•">
	<insert name="show_body">
</section>

	<insert name="show_include" file="footer">

	<insert name="show_include" file="modals">

</div>

<script type="text/javascript" asyncsrc="<insert name="custom" path="js/main.js" absolute="true">" charset="UTF-8"></script>
	<!--Подключаем jqwery и js-файлы-->
	<insert name="show_js">
	<insert name="show_include" file="bootstrap">

</body>
</html>
