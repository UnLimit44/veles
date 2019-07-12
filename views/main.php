<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 03.02.2019
 * Time: 19:43
 */
?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/views/images/slider01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/views/images/slider02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="/views/images/slider03.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <h3>Хиты продаж</h3>

<form method="post" action="">
    <div class="row">
        <?php
        $goodsObj = new Goods();
        $data['top'] = $goodsObj->select_top();
        foreach ($data['top'] as $value) {
            include "grid.php";}
        ?>
    </div>
</form>

