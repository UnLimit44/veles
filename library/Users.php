<?php

/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 27.01.2019
 * Time: 14:15
 */

include_once 'MySQL.php';

class Users extends MySQL
{
    const TABLE = "users";

    public $user = null;

    public function register ($name,$surname,$number_tel,$email,$index,$adress,$pas)
    {
        $this->insert(
            self::TABLE,
            array(
                'user_name'=>$name,
                'lastname'=>$surname,
                'telephone'=>$number_tel,
                'email'=>$email,
                'user_index'=>$index,
                'adres'=>$adress,
                'user_password'=>$pas,
            )
        );
    }

    public function login($login, $password)
    {
        if ($user = $this->checkUser($login, $password)) {
            setcookie('login', $login, time() + 3600);
            setcookie('password', $password, time() + 3600);
            $this->user = array(
                'name' => $user['user_name'],
                'lastname' => $user['lastname'],
                'telephone' => $user['telephone'],
                'adres' => $user['adres'],
                'user_index' => $user['user_index'],
                'login' => $user['email'],
                //'password' => $user['password']
            );
        }
    }

    public function checkUser($login, $password)
    {
        $data['user'] = $this->select(
            self::TABLE,
            "*"
        );
        foreach ($data['user'] as $u) {
            if ($u['email'] == $login && $u['user_password'] == $password) {
                return $u;
            }
        }
        return array();
    }

    public function logout()
    {
        setcookie('login', '', time() - 3600);
        setcookie('password', '', time() - 3600);
    }
}