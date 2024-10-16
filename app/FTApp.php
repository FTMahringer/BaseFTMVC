<?php

session_start();

define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require 'app/init.php';

class FTApp extends App
{
    public function run(): void
    {
        $currentRoute = basename($_SERVER['REQUEST_URI']);  // Get current route


        $navbar = new Navbar('My App', 'assets/images/logo.svg');
        $navbar->addItem(new NavbarItem('Home', 'home',true));
        $navbar->addItem(new NavbarItem('About', 'about'));

        echo $navbar->render($currentRoute);
        parent::loadController();
    }
}

foreach (glob('assets/styles/*.css') as $file) {
    echo '<link rel="stylesheet" type="text/css" href="' . BASEURL . $file . '">';
}

foreach (glob('assets/scripts/*.js') as $file) {
    echo '<script src="' . BASEURL . $file . '"></script>';
}
