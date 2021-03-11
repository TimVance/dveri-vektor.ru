<?php
/**
 * Настройки службы доставки «Доставка Saferoute»
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

class Delivery_saferoute_admin extends Frame_admin
{
	/**
	 * @var array поля для редактирования
	 */
    public $config = array(
        'name' => 'Saferoute',
        'params' => array(
            'info1' => array(
                'name' => '<p><a href="https://saferoute.ru/?ref=diafan" target="_blank"><img src="https://saferoute.ru/_nuxt/img/logo.b26afb9.svg" style="max-width: 200px;"></a></p><p>Агрегатор доставки для интернет-магазинов, включает в себя: <b>BoxBerry, 5post, CDEK, ПочтаРФ, DPD, PickPoint, IML, ПЭК, Logsis, Hermes, Деловые линии</b>. Без абонентской платы, вы платите только за доставку. Заключение договора 15 минут.</p><p><a href="https://saferoute.ru/?ref=diafan" target="_blank" class="btn btn_blue btn_small">Зарегистрироваться в Saferoute</a></p>',
                'type' => 'info',
            ),
            'info2' => array(
                'name' => 'После регистрации скопируйте токен со страницы <a href="https://cabinet.saferoute.ru/settings/profile?ref=diafan">Настройки</a> и внесите в поле ниже.',
                'type' => 'info',
            ),
            'token' => array(
                'name' => 'Токен для виджетов и модулей',
                'type' => 'text',
            ),
            'info3' => array(
                'name' => 'Создайте склад и магазин. Затем скопируйте ID магазина из настроек магазина.',
                'type' => 'info',
            ),
            'shop_id' => array(
                'name' => 'ID магазина',
                'type' => 'text',
            ),
            'status' => array(
                'name' => 'Статус CMS для передачи заказов в Личный кабинет SafeRoute',
                'type' => 'function',
            ),
        )
    );

    /**
     * Редактирование поля "Статусы для отправки заказа"
     *
	 * @return void
     */
    public function edit_variable_status($value)
    {
        $rows = DB::query_fetch_all("SELECT id, [name] FROM {shop_order_status} WHERE trash='0' ORDER BY sort ASC");

        echo '<div class="unit tr_service" service="saferoute" style="display:none">
            <div class="infofield"><b>Статус CMS для передачи заказов в Личный кабинет SafeRoute</b></div>';
        foreach($rows as $row)
        {
            echo '<input type="checkbox" name="saferoute_status[]" id="saferoute_status'.$row["id"].'" value="'.$row["id"].'"'.(is_array($value) && in_array($row["id"], $value) ? ' checked' : '').'><label for="saferoute_status'.$row["id"].'">'.$row["name"].'</label><br>';
        }
        echo '
        </div>';
    }

    /**
     * Сохранение поля "Статусы для отправки заказа"
     *
	 * @return array
     */
    public function save_variable_status()
    {
        if(empty($_POST["saferoute_status"]))
        {
            return array();
        }
        return $this->diafan->filter($_POST["saferoute_status"], "integer");
    }
}
