<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.03.2019
 * Time: 19:47
 */

$goodsObj = new Goods();
$data['id']=$goodsObj->select_id($_GET['mod']);

$value="catalog.php";
include VIEW . '/sample.php';