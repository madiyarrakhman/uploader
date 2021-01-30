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
            if ($list[2] === '.gitignore') unset($list[2]);
            $list = array_values($list);
            return $list;
        } else {
            return [];
        }
    }
}