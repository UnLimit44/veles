<form method="post" action="">
    <div class="row">
        <?php
        $goodsObj = new Goods();
        $data['category'] = $goodsObj->select_type($category);
        foreach ($data['category'] as $value) {
            include "grid.php";}
        ?>
    </div>
</form>
