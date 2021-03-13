<?php
require_once 'inc/session.php';
require_once '../includes/dataBase.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $sessionId = $_SESSION['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $img = $_FILES['image'];
    $imgName = $img['name'];
    $imgSize = $img['size'];
    $imgExplode = explode(".", $imgName);
    $imgExtension = end($imgExplode);
    $supportedExtension = ["jpg", "jpeg", "png", "svg", "ico", "PNG", "JPG", "JPEG"];
    if (($imgName === '')) {
        $editProfile = " UPDATE `users` SET `fullName`='$name',`email`='$email',`cellNumber`='$phone' WHERE `id`='$sessionId'";
        if (isset($dataBase)) {
            $editProfileQuery = $dataBase->query($editProfile);
            $dataBase->close();
            if ($editProfileQuery) {
                $_SESSION['update'] = "Profile successfully update";
                header("Location:editProfile.php");

            }
        }
    }
    if (in_array($imgExtension, $supportedExtension, true)) {
        if ($imgSize < 500000) {
            $sessionId = $_SESSION['id'];
            $check = "SELECT * FROM `users` WHERE id = $sessionId";
            /// default image chk ///
            if (isset($dataBase)) {
                $checkQuery = $dataBase->query($check);
                $checkQueryAssoc = $checkQuery->fetch_assoc();
                $imageOldLocation = 'upload/' . $checkQueryAssoc['image'];

                if (file_exists($imageOldLocation)) {
                    if ($checkQueryAssoc['image'] !== 'default.png') {
                        unlink($imageOldLocation);
                    }
                }

            }
            $newName = random_int(0, 10000000) . $sessionId . '.' . $imgExtension;
            echo $newName;
            $newLoc = 'upload/' . $newName;
            move_uploaded_file($img['tmp_name'], $newLoc);
            $editProfile = " UPDATE `users` SET `fullName`='$name',`email`='$email',`cellNumber`='$phone',`image`='$newName' WHERE `id`='$sessionId'";
            if (isset($dataBase)) {
                $editProfileQuery = $dataBase->query($editProfile);
                $dataBase->close();
                if ($editProfileQuery) {
                    $_SESSION['update'] = "Profile successfully update";
                    header("Location:editProfile.php");

                }
            }

        } else {
            $_SESSION['fixed'] = "Please Fixed Image Size";
            header("Location:editProfile.php");
        }
    } else {
        if (!isset($editProfileQuery)):
            $_SESSION['noupdate'] = "Profile Not updated";
            header("Location:editProfile.php");
        endif;
    }


} else {
    header("Location:editProfile.php");
}

