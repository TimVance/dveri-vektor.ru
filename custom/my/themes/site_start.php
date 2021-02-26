<?php
/**
 * Шаблон стартовой страницы сайта
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
	<link rel="stylesheet" href="<insert name="path">custom/my/owlcarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<insert name="path">custom/my/owlcarousel/owl.theme.default.min.css">
</head>

<body>

<div id="glav_shop">

<insert name="show_include" file="header">

<!----><section class="container glav_slider px-4">
	<insert name="show_block" module="bs" count="all" cat_id="1" template="slider">
</section>
<section class="container">
	<insert name="show_body">
</section>

	<insert name="show_include" file="footer">

	<insert name="show_include" file="modals">

</div>

<script type="text/javascript" asyncsrc="<insert name="custom" path="js/main.js" absolute="true">" charset="UTF-8"></script>
	<!--Подключаем jqwery и js-файлы-->
	<insert name="show_js">
	<insert name="show_include" file="bootstrap">

	<script type="text/javascript" src="custom/my/owlcarousel/owl.carousel.min.js"></script>

	<script>
$(document).ready(function(){
  $(".com_slider").owlCarousel({
                loop:true, //Зацикливаем слайдер
                items:1,
				slideBy:2,
				margin: 0,
				center:true,
                autoplay:true, //Автозапуск слайдера
                smartSpeed:200, //Время движения слайда
                autoplayTimeout:10000, //Время смены слайда
				autoplayHoverPause:true,
				nav:true,      
            });
});
</script>


</body>
</html>
