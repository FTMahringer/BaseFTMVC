<?php

defined('ROOTPATH') or die('Access denied!');

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    /** Database config for localhost */
    define('DBNAME', 'scratchmvc');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');
    define('DBCHARSET', 'utf8mb4');

    define('USERTABLE', 'users');
    define('USERTABLE_ID', 'UserID');


    define('BASEURL', 'http://localhost/BaseFTMVC/');
} else {
    /** Database config for your domain */
    define('DBNAME', 'scratchmvc');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');
    define('DBCHARSET', 'utf8mb4');

    define('USERTABLE', 'users');
    define('USERTABLE_ID', 'UserID');

    define('BASEURL', 'https://www.yourdomain.com');
}

define('APP_NAME', 'My Website');
define('APP_VERSION', '1.0.0');
define('APP_AUTHOR', 'FTMahringer');
define('APP_DESC', 'Your Description');

/** True means show errors  **/
define('DEBUG', True);

/** Settings **/
define('LANGUAGE', 'en');
define('TIMEZONE', 'Europe/Vienna');
define('HASH', 'sha256');
define('SALT', 'ftmsalt');
