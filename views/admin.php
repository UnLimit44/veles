<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 02.03.2019
 * Time: 16:43
 */
?>
<? if ($currentUser["name"] != 'admin' ): ?>
Доступ запрещен.
<? else: ?>
<? var_dump($data['orders']); ?>
    <?if (!empty($data['orders'])) : ?>
        <form method="post" action="/admin">
        <?foreach ($data['orders'] as $value):?>
            <div class="col-lg-6 col-xl-8">
                <ul class="list-group">
                    <li class="list-group-item">Номер заказа: <?=$value["order_id"];?></li>
                    <li class="list-group-item">Время заказа: <?=$value["order_time"];?></li>
                    <li class="list-group-item">Имя покупателя: <?=$value["buyer_name"];?> <?=$value["buyer_lastname"];?></li>
                    <li class="list-group-item">Телефон: <?=$value["buyer_telephone"];?></li>
                    <li class="list-group-item">Товары:<br>
                        <?foreach ($data['order_list'] as $val):?>
                            <?if ($val["order_id"]==$value["order_id"]): ?>
                            <?=$val["name_goods"];?>
                                -----
                            <?=$val["count_goods"];?>
                                <br>
                            <?endif;?>
                        <?endforeach;?>
                    </li>
                    <li class="list-group-item">Статус:
                        <? if ($value['status']==0):?>
                            <span class="new">Новый</span> <button name="processed" value="<?=$value["order_id"];?>">Обработан</button>
                        <? else: ?>
                        Обработан <button name="cancel" value="<?=$value["order_id"];?>">Отмена</button>
                        <?endif;?>
                    </li>
                    <li class="list-group-item"><button name="ordDel" value="<?=$value["order_id"];?>">Удалить заказ</button></li>
                </ul>
            </div>
        <?endforeach;?>
        </form>
    <?endif;?>
<?endif;?>


