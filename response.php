<?php
session_start();
require_once 'dataBase.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $submit = $_POST["submit"];
    $nameRegex = !preg_match("/^([a-zA-Z' ]+)$/", $name);
    $emailRegex = !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/", $email);
    $passwordRegex = !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/", $password);
    $cell = $_POST["cell"];
    $cellRegex = !preg_match("/^([+\d]{11,16})$/", $cell);
    $br = "<br>";


    //name Validation //
    if (empty($name)) {
        $_SESSION["errorMessageName"] = "<span style='color:red;'>Please Enter Your Name</span>";
        header("Location:index.php");

    } elseif ($nameRegex) {
        $_SESSION["errorMessageRegexName"] = "<span style='color:red;'>Only alphabets and whitespace are allowed.</span>";
        header("Location:index.php");

    } // email validation //
    if (empty($email)) {
        $_SESSION["errorMessageMail"] = "<span style='color:red;'>Please Enter Your Email</span>";
        header("Location:index.php");
    } elseif ($emailRegex) {
        $_SESSION["errorMessageRegexMail"] = "<span style='color:red;'>Please Type Valid Email</span>";
        header("Location:index.php");

    } // password Validation //
    if (empty($password)) {
        $_SESSION["errorMessagePassword"] = "<span style='color:red;'>Please Enter Your Password</span>";
        header("Location:index.php");

    } elseif ($passwordRegex) {
        $_SESSION["errorMessageRegexPassword"] = "<span style='color:red;'>Please Type Valid Password</span>";
        header("Location:index.php");

    } // confirmPassword validation //
    if (empty($confirmPassword)) {
        $_SESSION["errorMessageConfirmPassword"] = "<span style='color:red;'>Please Enter Your Confirm Password</span>";
        header("Location:index.php");
    } elseif ($password !== $confirmPassword) {
        $_SESSION["errorMessageConfirmPasswordNotMatch"] = "<span style='color:red;'>Please Type Same Password</span>";
        header("Location:index.php");
    } elseif ($password === $confirmPassword && $passwordRegex) {
        $_SESSION["errorMessageConfirmPasswordRegex"] = "<span style='color:red;'>Please Type Valid Password</span>";
        header("Location:index.php");

    } // cellPhone validation //
    if (empty($cell)) {
        $_SESSION["errorMessageCell"] = "<span style='color:red;'>Please Enter Your Cell Number</span>";
        header("Location:index.php");
    } elseif ($cellRegex) {
        $_SESSION["errorMessageCellRegex"] = "<span style='color:red;'>Please Type Valid Number</span>";
        header("Location:index.php");
    } // Gender Validation //
    if (!isset($_POST["gender"])) {
        $_SESSION["errorMessageGender"] = "<span style='color:red;'> Please Select Your Gender </span>";
        header("Location:index.php");

    } else {

        $gender = $_POST["gender"];
        $insert = "INSERT INTO users(fullName, email, password, confirmPassword, cellNumber, Gender) VALUES('$name','$email','$password','$confirmPassword','$cell','$gender')";
        $db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        if (!$db) {
            echo "Database Error";
        }
        $q = mysqli_query($db, $insert);
        if ($q) {
            echo "DATA INSERT";
        } else {
            echo " DATA ERROR";
        }
    }

} else {
    header("Location:index.php");
}


