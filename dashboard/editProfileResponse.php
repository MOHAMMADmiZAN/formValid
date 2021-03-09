<?php
require_once 'inc/session.php';
require_once '../includes/dataBase.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sessionId = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
//    $img = $_FILES['img'];
    $duplicateCheck = "SELECT COUNT(*) as emailverified FROM `users` WHERE `email`='$email'";
    $editProfile = " UPDATE `users` SET `fullName`='$name',`email`='$email',`cellNumber`='$phone' WHERE `id`='$sessionId'";
    if (isset($dataBase)) {
        if (isset($duplicateCheck)) {
            $duplicateCheckQuery = $dataBase->query($duplicateCheck);
            if (isset($duplicateCheckQuery)) {
                $duplicateCheckAssoc = $duplicateCheckQuery->fetch_assoc();
                if (isset($duplicateCheckAssoc)) {
                    if ($duplicateCheckAssoc['emailverified'] > 0 === true || empty($email)) {
                        $_SESSION['EmailError2'] = 'Try With Different Email !!';
                        header("Location:editProfile.php");
                    } else {
                        $editProfileQuery = $dataBase->query($editProfile);
                        $dataBase->close();
                        if ($editProfileQuery) {
                            $_SESSION['update'] = "Profile successfully update";
                            header("Location:editProfile.php");


                        } else {
                            echo "query Fail";
                        }
                    }
                }
            }
        }

    } else {
        echo 'database nai';
    }

} else {
    header("Location:editProfile.php");
}

