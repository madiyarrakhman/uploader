<?php
require __DIR__ . '/../vendor/autoload.php';
session_start();
$view = 'enter';
if(\App\components\User::check()) {
    $view = 'index';
}
(new \App\components\View())->render($view);