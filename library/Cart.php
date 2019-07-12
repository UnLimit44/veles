<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 04.02.2019
 * Time: 21:38
 */
class Cart
{
    //пересчитывает корзину
    function count_cart($a=0){
        if (!empty($_SESSION['cart'])) {
            $a=count($_SESSION['cart']);
        }
        return $a;
    }
    //устанавливает количество товара
    public function set_count($count, $id) {
        $_SESSION['cart'][$id] = $count;
    }

    //считает сумму покупок
    public function sumGoods ($data, $count) {
        $sum=0;
        foreach ($data as $value) {
            $sum=$sum+$value['price_goods']*$count[$value['id_goods']];
        }
        return $sum;
    }

    //доавляет товар в корзину
    function addToCart($id)
    {

        if (!isset($_SESSION['cart'][$id])) {

            $_SESSION['cart'][$id]=1;
        }
        return true;
    }

    //function delFromCart($id, $count=1){}

    //function clearCart(){}
}