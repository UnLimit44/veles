<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.02.2019
 * Time: 22:22
 */

$goodsObj = new Goods();

$step = 1;
if (!empty($_GET['step'])) {
    $step = $_GET['step'];
}


switch ($step) {
    case 1:

        //Удаляет товар
        if (isset($_POST['del_id_cart'])) {
            unset($_SESSION['cart'][$_POST['del_id_cart']]);
        }


        if (!empty($_SESSION['cart'])) {
            // загружает содержимое корзины в $data['cart']
            $data['cart'] = $goodsObj->select_buy($_SESSION['cart']);
            //считаетсумму покупок
            $sum= $cartObj->sumGoods($data['cart'],$_SESSION['cart']);
        }

        //устанавливает количество купленного товара
        if (isset($_POST['id_cart']) && ($_POST["text{$_POST['id_cart']}"])>0) {
            $_SESSION['cart'][$_POST['id_cart']]= $_POST["text{$_POST['id_cart']}"];
        }


        break;
    case 2:


        break;
    case 3:


        break;
    case 4:
        $orderObj= new Orders();

        $orderObj->newOrd($_POST['name'],$_POST['surname'],$_POST['number_tel'],$_POST['adress'],$_POST['index'],$_POST['email'],date('D, d M y H:i:s O'));
        $ord_id=$orderObj->max_id();
        $orderObj->newOrdList($ord_id[0]["MAX(`order_id`)"],$_SESSION['cart']);
        unset($_SESSION['cart']);
        break;

}


$value="cart.php";
include VIEW . '/sample.php';