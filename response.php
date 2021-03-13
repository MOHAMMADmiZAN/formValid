<?php
session_start();
require_once './includes/dataBase.php';
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
        header("Location:register.php");

    } elseif ($nameRegex) {
        $_SESSION["errorMessageRegexName"] = "<span style='color:red;'>Only alphabets and whitespace are allowed.</span>";
        header("Location:register.php");

    } else {
        $getName = $name;
    }

    // email validation //
    if (empty($email)) {
        $_SESSION["errorMessageMail"] = "<span style='color:red;'>Please Enter Your Email</span>";
        header("Location:register.php");
    } elseif ($emailRegex) {
        $_SESSION["errorMessageRegexMail"] = "<span style='color:red;'>Please Type Valid Email</span>";
        header("Location:register.php");

    } else {
        $getEmail = $email;
    }

    // password Validation //
    if (empty($password)) {
        $_SESSION["errorMessagePassword"] = "<span style='color:red;'>Please Enter Your Password</span>";
        header("Location:register.php");

    } elseif ($passwordRegex) {
        $_SESSION["errorMessageRegexPassword"] = "<span style='color:red; font-size: 14px;'>At least 1 upper case, lower case, numeric, and special Character</span>";
        header("Location:register.php");

    } else {
        $getPassword = password_hash($password, PASSWORD_DEFAULT);
    }
    // confirmPassword validation //
    if (empty($confirmPassword)) {
        $_SESSION["errorMessageConfirmPassword"] = "<span style='color:red;'>Please Enter Your Confirm Password</span>";
        header("Location:register.php");
    } elseif ($password !== $confirmPassword) {
        $_SESSION["errorMessageConfirmPasswordNotMatch"] = "<span style='color:red;'>Please Type Same Password</span>";
        header("Location:register.php");
    } elseif ($password === $confirmPassword && $passwordRegex) {
        $_SESSION["errorMessageConfirmPasswordRegex"] = "<span style='color:red; font-size: 14px;'>At least 1 upper case, lower case, numeric, and special Character</span>";
        header("Location:register.php");

    } else {
        $getConfirmPassword = $confirmPassword;
    }
    // cellPhone validation //
    if (empty($cell)) {
        $_SESSION["errorMessageCell"] = "<span style='color:red;'>Please Enter Your Cell Number</span>";
        header("Location:register.php");
    } elseif ($cellRegex) {
        $_SESSION["errorMessageCellRegex"] = "<span style='color:red;'>Please Type Valid Number</span>";
        header("Location:register.php");
    } else {
        $getCell = $cell;
    }
    // Gender Validation //
    if (!isset($_POST["gender"])) {
        $_SESSION["errorMessageGender"] = "<span style='color:red;'> Please Select Your Gender </span>";
        header("Location:register.php");

    } else {
        $gender = $_POST["gender"];
    }
    if (!isset($getName, $getPassword, $getConfirmPassword, $getCell, $gender, $getEmail)) {
        echo "::::DATABASE::::";
    } else {
        ///duplicate check query ///
        $duplicateCheck = "SELECT COUNT(*) as duplicates FROM `users` WHERE email = '$email' ";
        if (isset($dataBase)) {
//            $duplicateCheckQuery = mysqli_query($dataBase, $duplicateCheck);
            // object orient method ///
            $duplicateCheckQuery = $dataBase->query($duplicateCheck);
            if (isset($duplicateCheckQuery)) {
                /// duplicate Assoc Query ///
//                $duplicateAssoc = mysqli_fetch_assoc($duplicateCheckQuery);
                $duplicateAssoc = $duplicateCheckQuery->fetch_assoc();
                if (isset($duplicateAssoc)) {
                    if ($duplicateAssoc['duplicates'] > 0) {
                        echo "<p style='color: red;'>EMAIL ALREADY FOUND!</p>";
                    } else {
                        /// database insert query //
                        $insert = "INSERT INTO users(fullName, email, password,cellNumber, Gender) VALUES ('$getName','$getEmail','$getPassword','$getCell','$gender')";
                        if (isset($insert)) {
//                     $dataQuery = mysqli_query($dataBase, $insert);
                            $dataQuery = $dataBase->query($insert);
                            $dataBase->close();
                            if (isset($dataQuery)) {
                                if ($dataQuery) {
                                    echo "<p style='color: green;'>DATA INSERT SUCCESSFUL</p>";
                                } else {
                                    echo "<p style='color: red;'>DATA INSERT ERROR</p>";
                                }
                            }
                        }

                    }
                }

            }

        }


    }

} else {
    header("Location:register.php");
}


