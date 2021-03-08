<?php
require_once 'inc/session.php';
require_once '../includes/dataBase.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sessionId = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
//    $img = $_FILES['img'];
    $editProfile = " UPDATE `users` SET `fullName`='$name',`email`='$email',`cellNumber`='$phone' WHERE `id`='$sessionId'";
    if (isset($dataBase)) {
        $editProfileQuery = $dataBase->query($editProfile);
        $dataBase->close();
        if ($editProfileQuery) {
            $_SESSION['update'] = "Profile successfully update";
            header("Location:editProfile.php");


        } else {
            echo "query Fail";
        }

    } else {
        echo 'database nai';
    }

} else {
    header("Location:editProfile.php");
}

