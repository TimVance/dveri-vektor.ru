<?php
/**
 * API-скрипт для виджета «Доставка Saferoute»
 *
 * @author     diafan.ru
 * @version    6.0
 * @license    http://www.diafan.ru/license.html
 * @copyright  Copyright (c) 2003-2020 OOO «Диафан» (http://www.diafan.ru/)
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

include_once "SafeRouteWidgetApi.php";


$widgetApi = new SafeRouteWidgetApi();

$params = unserialize(DB::query_result("SELECT params FROM {shop_delivery} WHERE service='saferoute'"));
	  
// Укажите здесь свой токен
$widgetApi->setToken(! empty($params['token']) ? $params['token'] : '');
// А здесь ID магазина
$widgetApi->setShopId(! empty($params['shop_id']) ? $params['shop_id'] : '');


$request = ($_SERVER['REQUEST_METHOD'] === 'POST')
    ? json_decode(file_get_contents('php://input'), true)
    : $_REQUEST;


$widgetApi->setMethod($_SERVER['REQUEST_METHOD']);
$widgetApi->setData(isset($request['data']) ? $request['data'] : []);

echo $widgetApi->submit(! empty($request['url']) ? $request['url'] : '');

exit;