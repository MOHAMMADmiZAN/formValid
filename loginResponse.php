<?php
require_once './includes/dataBase.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    /// Login Verify Query ///
    $logVerify = "SELECT COUNT(*) as emailverified,password FROM `users` WHERE `email`=  '$email' ";
    if (isset($dataBase)) {
        $logVerifyQuery = $dataBase->query($logVerify);
        if (isset($logVerifyQuery)) {
            $logVerifyAssoc = $logVerifyQuery->fetch_assoc();
            if (isset($logVerifyAssoc) && $logVerifyAssoc['emailverified'] > 0) {
                $dbPassword = $logVerifyAssoc['password'];
                if (isset($dbPassword)) {
                    $logPasswordVerify = Password_verify($password, $dbPassword);
                    if ($logPasswordVerify) {
                        header("Location:userList.php");
                    } else {
                        $_SESSION['passwordError'] = "password Invalid";
                        header("Location:login.php");
                    }

                } else {
                    die("dbpassword nai");
                }

            } else {
                $_SESSION['EmailError'] = 'Not yet a member? <a href="index.php" class="tx-info">Sign Up</a>';
                header("Location:login.php");
            }

        }

    } else {
        echo "dataBase Error";
    }


} else {
    header("Location:login.php");
}