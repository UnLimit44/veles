<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 16.02.2019
 * Time: 23:33
 */
?>

<nav aria-label="breadcrumb" style="background-color: white">
    <ol class="breadcrumb" style="background-color: white">
        <li class="breadcrumb-item"><span <? if ($step == 1): ?>style="color: red;"<? endif; ?>>Корзина</span></li>
        <li class="breadcrumb-item"><span <? if ($step == 2): ?>style="color: red;"<? endif; ?>>Способ доставки</span></li>
        <li class="breadcrumb-item"><span <? if ($step == 3): ?>style="color: red;"<? endif; ?>>Контактная информация</span></li>
        <li class="breadcrumb-item"><span <? if ($step == 4): ?>style="color: red;"<? endif; ?>>Завершение</span></li>
    </ol>



<? switch ($step): ?>
<? case 1: ?>

    <? if (!empty($data['cart'])): ?>
        <form method="post" action="/cart">
        <table cellpadding="5px">
        <? foreach ($data['cart'] as $value): ?>
            <tr>
                <td><?=$value["name_goods"];?></td>
                <td><?=$value["price_goods"];?> руб.</td>
                <td><input type="number"  name="text<?=$value['id_goods']?>"  value="<?=$_SESSION['cart'][$value["id_goods"]];?>"></td>
                <td><button class="btn btn-primary btn-sm"  name="id_cart" value="<?=$value['id_goods']?>">ок</button></td>
                <td><button class="btn btn-light btn-sm" name="del_id_cart" value="<?=$value['id_goods']?>">Удалить</button></td>
            </tr>
        <? endforeach;?>
            <tr>
                <td>Итого</td>
                <td colspan="4"><?=$sum ?> руб.</td>
            </tr>
        </table>
        </form>
            <br>
            <a href="?step=2"><button class="btn btn-primary">Далее</button></a>
    <? endif; ?>

<? break; ?>
<? case 2: ?>

    <h3>Выберите способ доставки</h3>
<form method="post" action="/cart?step=3">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="delivery" id="exampleRadios1" value="self" checked>
        <label class="form-check-label" for="exampleRadios1">
            Самовывоз
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="delivery" id="exampleRadios2" value="mail" >
        <label class="form-check-label" for="exampleRadios2">
            Почта России
        </label>
    </div>
   <br>
    <a href="/cart?step=1"><input type="button" class="btn btn-primary" value="Назад"></a>
    <input type="submit" class="btn btn-primary" value="Далее">
</form>

<? break; ?>
<? case 3: ?>

    <?if ($_POST['delivery']=='self'): ?>
        Забрать заказ вы можете по адресу г. Казань, ул. Петербургская д. 1, ТЦ "Кольцо", 1 этаж.
            <br>
            <br>
    <form class="needs-validation"  novalidate method="post" action="/cart?step=4">
        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="">Имя</label>
                <input class="form-control" type="text" name="name" <? if (! empty($currentUser)): ?>value="<?=$currentUser['name']?>"<?endif;?> required>
                <div class="invalid-feedback">
                    Введите имя.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="">Номер телефона</label>
                <input class="form-control" type="tel" name="number_tel" <? if (! empty($currentUser)): ?>value="<?=$currentUser['telephone']?>"<?endif;?> required>
                <div class="invalid-feedback">
                    Введите номер телефона.
                </div>
            </div>
        </div>
            <br>
        <a href="/cart?step=2"><input type="button" class="btn btn-primary" value="Назад"></a>
        <a href="?step=4"><button class="btn btn-primary">Далее</button></a>
    </form>
        <br>
        <br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2243.395491897302!2d49.122604116085625!3d55.786370196265096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x415ead0fdc0077f7%3A0x60110ec21cced7cd!2z0JrQvtC70YzRhtC-!5e0!3m2!1sru!2sru!4v1550919235696" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <?elseif ($_POST['delivery']=='mail'): ?>

            <form class="needs-validation"  novalidate method="post" action="/cart?step=4">
                <div class="form-group">
                    <div class="col-md-4 mb-3">
                        <label for="">Имя</label>
                        <input class="form-control" type="text" name="name" <? if (! empty($currentUser)): ?>value="<?=$currentUser['name']?>"<?endif;?> required>
                        <div class="invalid-feedback">
                            Введите имя.
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-4 mb-3">
                        <label for="">Фамилия</label>
                        <input class="form-control" type="text" name="surname" <? if (! empty($currentUser)): ?>value="<?=$currentUser['lastname']?>"<?endif;?> required>
                        <div class="invalid-feedback">
                            Введите фамлию.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 mb-3">
                        <label for="">Номер телефона</label>
                        <input class="form-control" type="tel" name="number_tel" <? if (! empty($currentUser)): ?>value="<?=$currentUser['telephone']?>"<?endif;?> required>
                        <div class="invalid-feedback">
                            Введите номер телефона.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 mb-3">
                        <label for="exampleInputEmail1">Адрес электронной почты</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" <? if (! empty($currentUser)): ?>value="<?=$currentUser['login']?>"<?endif;?> required>
                        <div class="invalid-feedback">
                            Введите электронный адрес.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 mb-3">
                        <label for="">Индекс</label>
                        <input class="form-control" type="text" name="index" <? if (! empty($currentUser)): ?>value="<?=$currentUser['user_index']?>"<?endif;?> required>
                        <div class="invalid-feedback">
                            Введите индекс.
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 mb-3">
                        <label for="">Адрес</label>
                        <input class="form-control" type="text" name="adress" <? if (! empty($currentUser)): ?>value="<?=$currentUser['adres']?>"<?endif;?> required>
                        <div class="invalid-feedback">
                            Введите адрес.
                        </div>
                    </div>
                </div>
                <a href="/cart?step=2"><input type="button" class="btn btn-primary" value="Назад"></a>
                <button class="btn btn-primary" type="submit">Далее</button>

            </form>
            <? else: ?>
            <a href="/cart?step=2"><input type="button" class="btn btn-primary" value="Назад"></a>

    <? endif; ?>
<? break; ?>
<? case 4: ?>

    <h4>Заказ успешно создан!</h4>

<? break; ?>
<? endswitch; ?>

