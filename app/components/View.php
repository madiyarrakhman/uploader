<?php


namespace App\components;


use function Composer\Autoload\includeFile;

class View
{
    public function render($view, $params = [])
    {
        $file = __DIR__ . '/../views/' . $view . '.php';
        if (file_exists($file)) {
            global $content;
            $content = $this->get_include_contents($file, $params);
            return include __DIR__ . '/../layout/main.php';
        } else {
            throw new \Exception("View $view not found");
        }
    }

    private function get_include_contents($filename, $arg = [])
    {
        extract($arg, EXTR_SKIP);
        if (is_file($filename)) {
            ob_start();
            include $filename;
            return ob_get_clean();
        }
        return false;
    }
}