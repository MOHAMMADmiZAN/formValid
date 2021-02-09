<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'registerform');
$db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if (!$db) {
    echo "Database Error";
}