<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 26.01.2019
 * Time: 13:36
 */

$goodsObj = new Goods();
$data['search'] = $goodsObj->search($_GET['name']);
$value="search.php";
include VIEW . '/sample.php';