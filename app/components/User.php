<?php


namespace App\components;


use App\Config\AppConfig;

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
                if ($_SESSION['user']['logged'] === self::loggedHash()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validate()
    {
        if (($this->username === AppConfig::get('USERNAME')) && ($this->password === AppConfig::get('PASSWORD'))) {
            return true;
        } else {
            return false;
        }
    }

    private static function loggedHash()
    {
        return md5(AppConfig::get('USERNAME') . AppConfig::get('APP_SALT') . AppConfig::get('PASSWORD'));
    }

    public function logging()
    {
        if ($this->validate()) {
            $_SESSION['user']['logged'] = self::loggedHash();
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