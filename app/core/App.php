<?php

defined('ROOTPATH') or die('Access denied!');

class App
{
    private $controller = "Home";
    private $method = "index";
    private function splitURL()
    {
        $URL = $_SERVER['REQUEST_URI'];
        $URL = explode('/', rtrim($URL, "/"));

        $URL = array_slice($URL, 2);

        if (isset($URL[0])) { // Check if the 0th element exists
            $URL[0] = ($URL[0] == "") ? "home" : $URL[0];
        }
        else {
            $URL[0] = "home"; // Set a default value if the element doesn't exist
            header("Location: home");
        }
        return $URL;
    }

    protected function loadController(): void
    {
        $URL = $this->splitURL();
        $file = "app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($file)) {
            require_once $file;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            require_once "app/controllers/_404.php";
            $this->controller = "_404";
        }

        $this->controller = new $this->controller;

        if (isset($URL[1])) {
            if (method_exists($this->controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }

        //show($URL);
        call_user_func_array([$this->controller,$this->method], $URL);
    }
}