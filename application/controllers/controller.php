<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 13.01.2019
 * Time: 16:52
 */

// разделяем строку URL по знаку '/'
$url = explode("/", $_SERVER['REDIRECT_URL']);

// Подключаем нужный контроллер
// Страница по умолчанию

$page = "main";

//Если присутствует второй компонент ссылки

if (!empty($url[1])) {
    if (is_file(CONT . "/{$url[1]}.php")) {
        $page = $url[1];
    } else {
        $page = '404';
    }
}

$userObj = new Users();

//  Логин/логаут

if (isset($_POST['signout'])) {
    $userObj->logout();
} else {
    if (isset($_POST['signin'])) {
        $userObj->login($_POST['login'], md5($_POST['password']));
    } else {
        if (isset($_COOKIE['login'])) {
            $userObj->login($_COOKIE['login'], $_COOKIE['password']);
        }
    }
}


//текущий пользователь
$currentUser = $userObj->user;




// Корзина

session_start();

$cartObj = new Cart();
if (!empty($_POST['buy'])) {
    $cartObj->addToCart($_POST['buy']);
}

$count_cart=$cartObj->count_cart();

include_once LIB . '/Goods.php';
include CONT . "/{$page}.php";
//session_write_close();