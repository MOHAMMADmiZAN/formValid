<?php
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DATABASE = 'registerform';
/*define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'registerform');*/
//$dataBase = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
$dataBase = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($dataBase->connect_error) :
    die('Connect Error: ' . $dataBase->connect_error);
endif;
