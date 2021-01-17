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
    $passwordRegex = !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,100}$/", $password);
    //name Validation //

    if (empty($name)) {
        $errorMessage = "<p style='color:red;'>please say something</p>";
        echo $errorMessage;
    } else if ($nameRegex) {
        $errorMessage = "<p style='color:red;'>Only alphabets and whitespace are allowed.</p>";
        echo $errorMessage;
    } else {
        echo "</br>";
        echo $name;
    }
    // email validation //
    if (empty($email)) {
        $errorMessage = "<p style='color:red;'>please say something</p>";
        echo $errorMessage;
    } elseif ($emailRegex) {
        $errorMessage = "<p style='color:red;'>Only Valid Mail</p>";
        echo $errorMessage;
    } else {
        echo "</br>";
        echo $email;
    }
    // password Validation //
    if (empty($password)) {
        $errorMessage = "<p style='color:red;'>please say something</p>";
        echo $errorMessage;
    } elseif ($passwordRegex) {
        $errorMessage = "<p style='color:red;'>its Not Valid</p>";
        echo $errorMessage;

    } else {
        echo "</br>";
        echo $password;
    }
    // confirmPassword validation //
    if (empty($confirmPassword)) {
        $errorMessage = "<p style='color:red;'>please say something</p>";
        echo $errorMessage;
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "<p style='color:red;'>its not same</p>";
        echo $errorMessage;
    } elseif ($password === $confirmPassword && $passwordRegex) {
        $errorMessage = "<p style='color:red;'>its Not Valid</p>";
        echo $errorMessage;
    } else {
        echo "</br>";
        echo "Its Awesome";
    }

} else {
    header("Location:index.php");
}




