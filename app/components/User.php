<?php


namespace App\components;


class User
{
    const username = 'eldos';
    const password = 'Eldos2020';

    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public static function check()
    {
        if (array_key_exists('user', $_SESSION)) {
            if (array_key_exists('logged', $_SESSION['user'])) {
                return $_SESSION['user']['logged'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validate()
    {
        if (($this->username === self::username) && ($this->password === self::password)) {
            return true;
        } else {
            return false;
        }
    }

    public function logging()
    {
        if ($this->validate()) {
            $_SESSION['user']['logged'] = true;
            return true;
        } else {
            $_SESSION['user']['logged'] = false;
            return false;
        }
    }

    public static function unlogging()
    {
        if (self::check()) {
            unset($_SESSION['user']['logged']);
            return true;
        } else {
            return false;
        }
    }
}