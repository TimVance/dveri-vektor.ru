<?php
/**
 * Шаблон формы поиска по сайту, template=top
 *
 * Шаблонный тег <insert name="show_search" module="search" template="top"
 * [button="надпись на кнопке"]>:
 * форма поиска по сайту
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

echo '
<div class="top_search">
	<form action="'.$result["action"].'" class="js_search_form search_form'.($result["ajax"] ? ' ajax" method="post"' : '" method="get"').' id="search">
	<div class="search-input">
	<input type="hidden" name="module" value="search">
	<input id="textbox" class="search_input out_none" type="text" name="searchword" placeholder="'.$this->diafan->_('Что будем искать?', false).'">
	<button type="submit" class="btn_search border-0 b_none out_none" value="'.$result["button"].'"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
	</form>';
echo '</div>';

if($result["ajax"])
{
	echo '<div class="js_search_result search_result b_white p-3 position-absolute shadow-lg"></div>';
}
