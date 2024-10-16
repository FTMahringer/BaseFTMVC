<?php

function show($data)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function redirect($url)
{
    header("Location: $url");
}

function asset($path)
{
    return BASEURL . $path;
}

function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}
