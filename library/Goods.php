<?php
include_once 'MySQL.php';

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 21.01.2019
 * Time: 20:14
 */
class Goods extends MySQL
{
    const TABLE = "goods";

    //Сортировка по категории
    public function select_type($category = null)
    {
        $filter = "";
        if ($category) {
            $filter .= "`id_type` = {$category}";
        }
        $data['goods'] = $this->select(
            self::TABLE,
            "*",
            $filter
        );
        return $data['goods'];
    }

    //Сортировка по продажам
    public function select_top()
    {

        $data['goods'] = $this->select(
            self::TABLE,
            "*",
            '`best_sellers` = 1'
        );
        return $data['goods'];
    }

    //Вывод товара в корзине
    public function select_buy($arr)
    {
       $filter = "";
        if ($arr) {
            $filter .= "`id_goods` = ". $this->array_str($arr);
        }

        $data['cart'] = $this->select(
            self::TABLE,
            "*",
            $filter
        );
        return $data['cart'];
    }

    public function select_id($a)
    {
        $filter = "";
        if ($a) {
            $filter .= "`id_goods` = ".$a;
        }

        $data['id'] = $this->select(
            self::TABLE,
            "*",
            $filter
        );
        //var_dump($data['id']);
        return $data['id'][0];
    }

    public function search ($s)
    {
        $filter = "";
        if (!empty($s)) {
            $filter .= "`name_goods` LIKE '%{$s}%'";
        }
        $data = $this->select(
            self::TABLE,
            "*",
            $filter
        );
        return $data;
    }

    private function array_str($arr) {
        $flip = array_keys($arr);
        $separated = implode(",", $flip);
        $result = str_replace(",", " OR `id_goods` = ", $separated);
        return $result;
    }
}