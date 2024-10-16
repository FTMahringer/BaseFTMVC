<?php

require 'core/functions.php';

foreach (glob(__DIR__ . '/classes/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__ . '/core/*.php') as $file) {
    require_once $file;
}

foreach (glob(__DIR__ . '/core/config/*.php') as $file) {
    require_once $file;
}

