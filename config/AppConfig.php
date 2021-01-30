<?php


namespace App\Config;


class AppConfig
{
    private static $env;

    public static function init()
    {
        $filename = __DIR__ . '/../.env';
        if (file_exists($filename)) {
            $fp = @fopen($filename, 'r');
            if ($fp) {
                $array = explode("\n", fread($fp, filesize($filename)));
                foreach ($array as $item) {
                    if (!empty($item)) {
                        $ar = explode(' = ', $item);
                        self::$env[$ar[0]] = $ar[1];
                    }
                }
            }
        }
        return self::$env;
    }

    public static function get($key)
    {
        return self::$env[$key];
    }
}