<?php
require_once 'inc/session.php';
unset($_SESSION['id']);
session_destroy();
header("Location:../login.php");
