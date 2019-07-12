<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 02.03.2019
 * Time: 16:09
 */
/*
if ($currentUser["name"] != 'admin' ) {
    echo "Доступ запрещен!";
    exit;
}
*/
$orderObj= new Orders();

//Изменяет статус заказа
if (isset($_POST['processed'])) {
    $orderObj->statusSet($_POST['processed']);
}

//Изменяет статус заказа №2
if (isset($_POST['cancel'])) {
    $orderObj->statusUnSet($_POST['status']);
}

//Удаляет заказ
if (isset($_POST['ordDel'])) {
    $orderObj->ordDel($_POST['ordDel']);
}

$data['orders']= $orderObj->listOrders();
$data['order_list']= $orderObj->listBuy();


$value="admin.php";
include VIEW . '/sample.php';
