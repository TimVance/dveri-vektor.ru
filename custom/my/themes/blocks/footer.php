<?php
/**
 * Файл-блок footer
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
<footer id="footer" class="mt-5 b_dblue c_white">
	<div class="container">
		<div class="row w-100">
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