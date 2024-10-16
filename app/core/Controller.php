<?php

defined('ROOTPATH') or die('Access denied!');
class Controller
{
    public function view($view): void
    {
        $file = "app/views/" . $view . ".view.php";
        if (!file_exists($file)) {
            require_once "app/views/404.views.php";
        } else {
            require_once $file;
        }
        require_once 'app/views/partials/footer.view.php';
    }
}