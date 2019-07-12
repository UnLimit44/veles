
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/views/css/bootstrap.css">
    <link rel="stylesheet" href="/views/css/style.css">
    <title>Veles</title>
</head>
<body>

    <!-- Верхняя навигация -->

    <nav class="navbar navbar-dark bg-dark" >
        <a  href="/main"><h5>VELES</h5></a>
            <form class="form-inline my-2 mx-auto" method="get" action="/search">
                <input class="form-control mr-sm-2" type="search" placeholder="поиск товара" aria-label="Search" name="name">
                <button class="btn btn-primary my-2 my-sm-0" type="submit" name="search">Найти</button>
            </form>
        <div>
            <a href="/cart">Корзина (<?= $count_cart ?>)</a>
        </div>
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Здравствуйте, <?= (!empty($currentUser['name']) ? $currentUser['name'] : 'Гость!');?>
            </a>

            <!-- Вход/Регистрация -->

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <? if (empty($currentUser)) : ?>

                <form class="p-4" method="post" action="">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail2">Логин (Email)</label>
                        <input type="text" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com" name="login">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormPassword2">Пароль</label>
                        <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="signin">Войти</button>
                </form>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/registration">Новый пользователь? Зарегистрируйтесь!</a>
                <? else: ?>
                <form class="dropdown-item p-4" method="post" action="">
                    <button type="submit" class="btn btn-primary" name="signout">Выйти</button>
                </form>
                <? endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-2">

                <!-- Боковая навигация -->

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/telephones">Телефоны</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tablets">Планшеты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laptops">Ноутбуки</a>
                    </li>
                    <?if($currentUser["name"]=='admin'):?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Заказы</a>
                    </li>
                    <?endif;?>
                </ul>
            </div>

            <!-- Содержимое -->
            <div class="col-lg-10 products">
                <? include "{$value}"; ?>
            </div>
        </div>
    </div>
    <script src="/views/js/jquery-3.3.1.slim.min.js"></script>
    <script src="/views/js/bootstrap.bundle.min.js"></script>
    <script src="/views/js/script.js"></script>
</body>
</html>