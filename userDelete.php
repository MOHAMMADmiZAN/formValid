<?php
require_once 'dataBase.php';
$id = $_GET['userId'];
if (isset($dataBase)) {
    if (isset($id)) {
        /// delete query ///
        $delete = "DELETE FROM `users` WHERE `id` = '$id'";
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

