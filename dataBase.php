<?php
const HOST = 'localhost';
const USER = 'root';
const PASSWORD = '';
const DATABASE = 'registerform';
/*define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'registerform');*/
$dataBase = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if (!$dataBase) {
    echo "Database Error";
}