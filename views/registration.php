<? if (!empty($currentUser)):?>
    Вы уже зарегестрированы!
    <? else: ?>
    <form class="needs-validation" novalidate method="post" action="/registration">
        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="">Имя</label>
                <input class="form-control" type="text" name="name" required>
                <div class="invalid-feedback">
                    Введите имя.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="">Фамилия</label>
                <input class="form-control" type="text" name="surname" required>
                <div class="invalid-feedback">
                    Введите фамилию.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="">Номер телефона</label>
                <input class="form-control" type="text" name="number_tel" required>
                <div class="invalid-feedback">
                    Введите номер телефона.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="exampleInputEmail1">Адрес электронной почты</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                <div class="invalid-feedback">
                    Введите email.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="">Индекс</label>
                <input class="form-control" type="text" name="index" required>
                <div class="invalid-feedback">
                    Введите индекс.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="">Адрес</label>
                <input class="form-control" type="text" name="adress" required>
                <div class="invalid-feedback">
                    Введите адрес.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pas" required>
                <div class="invalid-feedback">
                    Введите пароль.
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 mb-3">
                <label for="exampleInputPassword1">Повторите пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pas2" required>
                <div class="invalid-feedback">
                    Повторите пароль.
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="reg_button">Готово</button>

    </form>
<? endif; ?>

<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 27.01.2019
 * Time: 18:00
 */
