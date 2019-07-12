<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.03.2019
 * Time: 19:49
 */

//var_dump($data['id']);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-7" align="center">
            <div class="cat-img">
                <img src='/views/images/<?= $data['id']['image_goods'] ?>'>
            </div>
        </div>
        <div class="col-lg-5" align="center">
            <div class="cat-name">
                <?= $data['id']['name_goods'] ?>
            </div>
            <div class="cat-price">
                <?= $data['id']['price_goods']?> руб.
            </div>
            <form method="post" action="">
            <?if (isset($_SESSION['cart'])&&(array_key_exists($data['id']['id_goods'], $_SESSION['cart']))) : ?>
                <button type="button" class='btn btn-success btn-lg' name='bought' value=''>В корзине</button>
            <? else: ?>
                <button class='btn btn-outline-primary btn-lg' name='buy' value='<?=$data['id']['id_goods']?>'>Купить</button>
            <? endif; ?>
            </form>
        </div>
    </div>
    <div class="row">
        <?=$data['id']['description_goods']?>
    </div>
</div>


