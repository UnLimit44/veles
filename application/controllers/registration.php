<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 27.01.2019
 * Time: 18:25
 */

$value = 'registration.php';

include_once LIB . 'Users.php';

$UserObj = new Users();


if (!empty($_POST['name']) && !empty($_POST['surname']) &&
    !empty($_POST['surname']) && !empty($_POST['number_tel']) &&
    !empty($_POST['email']) && !empty($_POST['index']) &&
    !empty($_POST['adress']) && !empty($_POST['pas']) &&
    $_POST['pas'] == $_POST['pas2'] && isset($_POST['reg_button'])
    ) {
     $UserObj->register($_POST['name'],$_POST['surname'],$_POST['number_tel'],$_POST['email'],$_POST['index'],$_POST['adress'],md5($_POST['pas']));
     //include_once CONT . "telephones.php";
    $value = 'main.php';
    }

include VIEW . '/sample.php';
