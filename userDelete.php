<?php
session_start();
require_once 'dataBase.php';
$id = $_GET['userId'];
$deletedId = $_GET['deletedId'];
$recoverId = $_GET['recoverId'];
if (isset($dataBase)) {
    if (isset($id)) {
        // update query //
        $update = "UPDATE `users` SET `status` = 2 WHERE `id` = '$id'";
    }
    if (isset($update)) {
        $updateQuery = mysqli_query($dataBase, $update);
    }
    if (isset($updateQuery)) {
        if ($updateQuery) {
            $_SESSION['recoverMsg'] = "IF YOU RECOVER THIS USER PLEASE VISIT <a href='recoverUser.php' target='_blank' class='btn btn-info mx-3'>RECOVER USER</a>";
            header("Location:userList.php");
        } else {
            echo "UPDATE NOT WORKING";
        }
    }
    if (isset($recoverId)) {
        // recover query //
        $recover = "UPDATE `users` SET `status` = 1 WHERE `id` = '$recoverId'";
    }
    if (isset($recover)) {
        $recoverQuery = mysqli_query($dataBase, $recover);
    }
    if (isset($recoverQuery)) {
        if ($recoverQuery) {
            header("Location:recoverUser.php");
        } else {
            echo "RECOVER NOT WORKING";
        }
    }


    if (isset($deletedId)) {
        /// delete query ///
        $delete = "DELETE FROM `users` WHERE `id` = '$deletedId'";
    }
    if (isset($delete)) {
        $deleteQuery = mysqli_query($dataBase, $delete);
    }
    if (isset($deleteQuery)) {
        if ($deleteQuery) {
            header("Location:recoverUser.php");
        } else {
            echo "DELETE NOT WORKING";
        }
    }
}

