<?php

define("DB_HOST", "localhost"); //keep localhost with 'solace.ist.rit.edu' since localhost is the only allowed/registered name to be used by Solace 
define("DB_USER", "rcs5166");      //replace with data found in .my.cnf if hosted on Solace
define("DB_PASS", "Refilling7&piquet");     //replace with data found in .my.cnf if hosted on Solace
define("DB_NAME", "rcs5166");    //replace this with your rit username

//C:\Program Files (x86)\Ampps\www\...
//define('PROJECT_ROOT', pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_DIRNAME) . '/');

//http://localhost/.../
//http://solace.ist.rit.edu/../
define('URL_ROOT', 'http://' . $_SERVER['SERVER_NAME'] . pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_DIRNAME) . '/');

define('TITLE', 'MVC with OO PHP and PDO');
