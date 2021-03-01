<?php
require_once 'dataBase.php';
$id = $_GET['userId'];
$deletedId = $_GET['deletedId'];
if (isset($dataBase)) {
    if (isset($id)) {
        // update query //
        $update = "UPDATE `users` SET status = 2 WHERE `id` = '$id'";
    }
    if (isset($update)) {
        $updateQuery = mysqli_query($dataBase, $update);
    }
    if (isset($updateQuery)) {
        if ($updateQuery) {
            header("Location:userList.php");
        } else {
            echo "UPDATE NOT WORKING";
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
            header("Location:userList.php");
        } else {
            echo "DELETE NOT WORKING";
        }
    }
}

