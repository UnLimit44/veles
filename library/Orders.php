<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 26.02.2019
 * Time: 20:26
 */
class Orders extends MySQL
{

    const ORD_TABLE = "orders";
    const ORD_LIST_TABLE = "order_list";

    /** Создает новый заказ
     * @param $name
     * @param $lastname
     * @param $telephone
     * @param $address
     * @param $index
     * @param $email
     * @param $time
     */
    public function newOrd($name,$lastname,$telephone,$address,$index,$email,$time){

        if (empty($lastname)){
            $lastname='---';
        }

        if (empty($address)){
            $address='---';
        }

        if (empty($index)){
            $index='---';
        }

        if (empty($email)){
            $email='---';
        }

        $fields= array(
        'buyer_name'=>$name,
        'buyer_lastname'=>$lastname,
        'buyer_telephone'=>$telephone,
        'buyer_address'=>$address,
        'buyer_index'=>$index,
        'buyer_email'=>$email,
        'order_time'=>$time

        );

        $this->insert(self::ORD_TABLE,$fields);

    }

    /**Возвращает ID последнего заказа
     * @return array|bool
     */
    public function max_id(){

        $a = $this->select(
            self::ORD_TABLE,
            "MAX(`order_id`)"
        );
        return $a;

    }

    /** Создает лист нового заказа
     * @param $z
     * @param $a
     */
    public function newOrdList ($z,$a){

        foreach ($a as $k=>$v){
            $field= array(
                'id_goods'=>$k,
                'count_goods'=> $v,
                'order_id'=> $z
            );

            $this->insert(self::ORD_LIST_TABLE,$field);
        }
    }

    public function listOrders() {

        $filter = "";
        if ($a) {
            $filter .= "`order_id` = {$a}";
        }
        $sort = 'order_id DESC';

        $data['orders'] = $this->select(
            self::ORD_TABLE,
            "*",
            $filter,
            $sort
        );

        return $data['orders'];
    }

    public function listBuy() {
        $data['order_list'] = $this->select(
            self::ORD_LIST_TABLE." LEFT JOIN goods ON  order_list.id_goods = goods.id_goods",
            "goods.name_goods, order_list.count_goods, order_list.order_id "
        );
        return $data['order_list'];
    }

    public function statusSet($a) {
        $filter = "";
        if ($a) {
            $filter .= "`order_id` = {$a}";
        }
        $field= array(
            'status'=>1
        );
        $this->update(self::ORD_TABLE,$field,$filter);
    }

    public function statusUnSet($a) {
        $filter = "";
        if ($a) {
            $filter .= "`order_id` = {$a}";
        }
        $field= array(
            'status'=>0
        );
        $this->update(self::ORD_TABLE,$field,$filter);
    }

    public function ordDel($a) {
        $filter = "";
        if ($a) {
            $filter .= "`order_id` = {$a}";
        }

        $this->delete(self::ORD_TABLE,$filter);
    }

}
