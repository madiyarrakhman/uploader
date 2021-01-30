<?php


namespace App\components;


class File
{
    public static function getList()
    {
        if (file_exists('/var/www/public/uploads')) {
            $list = scandir('/var/www/public/uploads');
            unset($list[0]);
            unset($list[1]);
            $list = array_values($list);
            return $list;
        } else {
            return [];
        }
    }
}