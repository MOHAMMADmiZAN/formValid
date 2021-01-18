<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $gender = $_POST["gender"];
    $submit = $_POST["submit"];
    $nameRegex = !preg_match("/^([a-zA-Z' ]+)$/i", $name);
    $emailRegex = !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/", $email);
    $passwordRegex = !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,100}$/", $password);
    $br = "<br>";
    //name Validation //

    if (empty($name)) {
        $errorMessage = "<span style='color:red;'>Please Enter Your Name</span>";
        echo $br . $errorMessage;
    } else if ($nameRegex) {
        $errorMessage = "<span style='color:red;'>Only alphabets and whitespace are allowed.</span>";
        echo $br . $errorMessage;
    } else {

        echo $br . "Your Name : " . $name;
    }
    // email validation //
    if (empty($email)) {
        $errorMessage = "<span style='color:red;'>Please Enter Your Email</span>";
        echo $br . $errorMessage;
    } elseif ($emailRegex) {
        $errorMessage = "<span style='color:red;'>Only Valid Mail</span>";
        echo $br . $errorMessage;
    } else {

        echo $br . "Your Email Address is : " . $email;
    }
    // password Validation //
    if (empty($password)) {
        $errorMessage = "<span style='color:red;'>Please Enter Your Password</span>";
        echo $br . $errorMessage;
    } elseif ($passwordRegex) {
        $errorMessage = "<span style='color:red;'>Its Not Valid</span>";
        echo $br . $errorMessage;

    } else {

        echo $br . "Your Password : " . $password;
    }
    // confirmPassword validation //
    if (empty($confirmPassword)) {
        $errorMessage = "<span style='color:red;'>Please Enter Your Confirm Password</span>";
        echo $br . $errorMessage;
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "<span style='color:red;'>Its not same</span>";
        echo $br . $errorMessage;
    } elseif ($password === $confirmPassword && $passwordRegex) {
        $errorMessage = "<span style='color:red;'>Its Not Valid</span>";
        echo $br . $errorMessage;
    } else {

        echo $br . "<span style='color: green'>Done!</span>";
    }

} else {
    header("Location:index.php");
}




