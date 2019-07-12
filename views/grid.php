<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.02.2019
 * Time: 21:40
 */
?>

<div class='col-lg-3 col-md-4 col-sm-6 col-xs-10'>
    <div class='product'>
        <div class='product-img'>
            <a href="/catalog/?mod=<?= $value['id_goods']?>"><img src='/views/images/<?= $value['image_goods'] ?>'></a>
        </div>
        <p class='product-title'>
            <a href="/catalog/?mod=<?= $value['id_goods']?>"><?= $value['name_goods'] ?></a>
        </p>
        <p class='product-price'><?= $value['price_goods']?> руб</p>
        <div class='btn-grid'>
            <?if (isset($_SESSION['cart'])&&(array_key_exists($value['id_goods'], $_SESSION['cart']))) : ?>
                <button type="button" class='btn btn-success' name='bought' value=''>В корзине</button>
            <? else: ?>
                <button class='btn btn btn-primary' name='buy' value='<?=$value['id_goods']?>'>Купить</button>
            <? endif; ?>
        </div>
    </div>
</div>