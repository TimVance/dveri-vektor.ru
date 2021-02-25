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

<header id="header">
	<div class="topmenu_pk container-fluid d-none d-lg-block">
		<nav class="navbar-expand-lg container d-flex justify-content-between py-0">
			<div class="d-inline-flex fs_12"><insert name="show_block" module="site" id="1"></div>
			<insert name="show_block" module="menu" id="1" template="topmenu">
		</nav>
	</div>
	<div class="head_bot_block b_white container-fluid shadow px-0">
		<nav class="navbar container navbar-expand-lg menu_thm">
			<div class="but_head_menu navbar-toggler b_green rounded-0 out_none" data-toggle="offcanvas"></div>
			<span class="d-none navbar-brand mr-lg-3 mx-auto">
				<insert name="show_href" img="img/dveri-vector-logo.svg" width="208" height="41" class="" alt="логотип">
			</span>
			<div class="offcanvas-collapse navbar-collapse justify-content-end row mx-0" id="topmenu" data-toggle="topmenu"><!-- всё что будет скрыто -->
				<insert name="show_href" img="img/dveri-vector-logo.svg" width="208" height="41" class="col" alt="логотип">
				<div class="but_head_menu navbar-toggler out_none x_close" data-toggle="offcanvas"></div>
				<div class="d-block d-lg-none col-12 my-3 mx-auto"><insert name="show_block" module="menu" id="1" template="topmenu"></div>
				<div class="col-12 col-lg text-end">
					<a href="tel:<insert name="show_theme" module="site" tag="phone" useradmin="false">" class="fs_22 text-decoration-none fw-bold c_black"><insert name="show_theme" module="site" tag="phone"></a>
					<div class="link c_green">Заказать звонок</div>
				</div>
				<div class="header_adres col-12 col-lg fs_14 text-end">
					<insert name="show_block" module="site" id="2">
					<insert name="show_block" module="site" id="3">
				</div>
				<div class="col-12 col-lg text-end">
					<div class="btn_bord fs_18">Записаться на замер</div>
				</div>
				<div class="w-100"></div>
				<div class="col-lg-2">
					<!--<insert name="show_block" module="menu" id="2" template="thm">-->
					<div class="btn-group">
  <button type="button" class="btn b_green dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i>
    Каталог товаров
  </button>
  <div class="dropdown-menu">
  <insert name="show_block" module="menu" id="2" template="thm2">
  </div>
</div>
				</div>
				<div class="col-lg">
					<insert name="show_search" module="search" template="top" ajax="true">
				</div>
				<div class="col-lg-auto">		
					<insert name="show_block" module="wishlist">
				</div>
				<div class="col-lg-auto">
					<div class="korzina_block b_green order-2 order-lg-12 position-relative">			
						<insert name="show_block" module="cart">
					</div>
				</div>
				
			</div>
			
			<!--<div class="row">
				<div class="col-12 col-lg-3">
					<insert name="show_href" img="img/dveri-vector-logo.svg" width="208" height="41" class="" alt="логотип">
				</div>
				<div class="col-12 col-lg-3">
					<a href="tel:<insert name="show_theme" module="site" tag="phone" useradmin="false">"><insert name="show_theme" module="site" tag="phone"></a>
				</div>
				<div class="col-12 col-lg-3">
				
				</div>
				<div class="col-12 col-lg-3">
				
				</div>
			</div>-->
		</nav>

	</div>
</header>

<!--<section class="container glav_slider">
	<insert name="show_block" module="bs" count="all" cat_id="1" template="slider">
</section>-->
	<insert name="show_body">

	<insert name="show_include" file="footer">
<footer id="footer" class="b_dblue c_white">
	<div class="container">
		<div class="row">
			<div class="col-12 mt-3 mb-4">
				<insert name="show_block" module="site" id="4">
			</div>
			<div class="col-lg-3 col-12 my-3">
				<div class="foot_text_block mb-4">
					<p><insert value="© 2021 ДВЕРИ ВЕКТОР"></p>
					<p><insert value="Интернет-магазин дверей и комплектующих."></p>
				</div>
				<div class="foot_text_block mb-4">
					<p><insert value="Сервис под ключ: доставка, монтаж, гарантия."></p>
				</div>
				<div class="foot_text_block mb-4">
				<div class=""><a href="" class="foot_a">8-999-888-77-66</a></div>
				<div class=""><a href="" class="foot_a">dveri-vektor@ya.ru</a></div>
				<div class=""><a href="" class="foot_a">@dveri_vektor</a></div>
				</div>
			</div>
			<div class="col-lg-3 col-12 my-3 footmenu"><insert name="show_block" module="menu" id="3"></div>
			<div class="col-lg-3 col-12 my-3 footmenu"><insert name="show_block" module="menu" id="4"></div>
			<div class="col-lg-3 col-12 my-3 footmenu"><insert name="show_block" module="menu" id="5"></div>
			<div class="col-lg-6 col-12 my-3">
				<div class="d-inline-block"></div>
				<div class="d-inline-block"></div>
			</div>
			<div class="col-lg-6 col-12 my-3">
				<div class=""></div>
				<div class=""></div>
			</div>
			<div class="col-lg-4 col-12 my-3 footmenu">
				<insert name="show_block" module="menu" id="6">
			</div>
			<div class="col my-3">
				<p>Принимаем к оплате:</p>
				<insert name="show_block" module="bs" count="all" cat_id="3" template="payznaki">
			</div>
			<div class="col-12 my-4">
			<a href="wprosto.ru" class="c_lblue">Создание сайта</a> — wprosto.ru
			</div>
		</div>
	</div>
</footer>

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

<script src="https://cdn.jsdelivr.net/jquery.typeit/4.4.0/typeit.min.js"></script>
<!--набор текста в поиске -->
<script>
$('#textbox').typeIt({
     strings: ["This is a great string.", "But here is a better one."],
     speed: 50,
     breakLines: false,
     autoStart: false
});
</script>

</body>
</html>
