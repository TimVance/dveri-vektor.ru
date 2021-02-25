<?php
/**
 * Файл-блок header
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
				<span class="col"><insert name="show_href" img="img/dveri-vector-logo.svg" width="208" height="41" alt="логотип"></span>
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
					<div class="korzina_block tran_all_05 b_green order-2 order-lg-12 position-relative">			
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