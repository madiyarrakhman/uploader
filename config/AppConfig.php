<?php


namespace App\Config;


class AppConfig
{
    private static $env;

    public static function init()
    {
        $filename = __DIR__ . '/../.env';
        if (file_exists($filename)) {
            $file = file_get_contents($filename);
            if (!empty($file)) {
                $array = explode("\n", $file);
                foreach ($array as $item) {
                    if (!empty($item)) {
                        $ar = explode(' = ', $item);
                        self::$env[$ar[0]] = $ar[1];
                    }
                }
            } else {
                throw new \Exception("Env file do not be empty.");
            }
        }
        return self::$env;
    }

    public static function get($key)
    {
        $env = self::$env[$key];
        if ($env) {
            return $env;
        } else {
            throw new \Exception("$key env do not found.");
        }
    }
}