<?php
/**
 * Файл-блок head
 *
 * @package    Diafan.CMS
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2016 OOO «Диафан» (http://diafan.ru)
 */

if (! defined('DIAFAN'))
{
	$path = __FILE__; $i = 0;
	while(! file_exists($path.'/includes/404.php'))
	{
		if($i == 10) exit; $i++;
		$path = dirname($path);
	}
	include $path.'/includes/404.php';
}
?>
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<!-- шаблонный тег show_head выводит часть HTML-шапки сайта. Описан в файле themes/functions/show_head.php. -->
    <insert name="show_head">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    
	<!-- фавиконка находится в самом корне -->
    <link rel="shortcut icon" href="<insert name="path">favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="<insert name="path">favicon.svg" type="image/svg+xml">
    
	<!-- подгружаем нужный Гугл-шрифт -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	
	<!-- обязательные файлы Бутстрапа -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	
	<!-- шаблонный тег show_css подключает CSS-файлы. Описан в файле themes/functions/show_css.php. -->
    <insert name="show_css" files="default.css">
	<link rel="stylesheet" href="<insert name="path">custom/my/fontawesome/font-awesome-10.css">
	<link rel="stylesheet" href="<insert name="path">custom/my/css/new_style.css">
	<link rel="stylesheet" href="<insert name="path">custom/my/css/m_style.css">