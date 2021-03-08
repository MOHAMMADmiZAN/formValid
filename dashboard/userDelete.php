<?php
require_once 'inc/session.php';
require_once '../includes/dataBase.php';
$id = $_GET['userId'];
$deletedId = $_GET['deletedId'];
$recoverId = $_GET['recoverId'];
if (isset($dataBase)) {

    if (isset($id)) {
        // temporary delete query //
        $temporaryDelete = "UPDATE `users` SET `status` = 2 WHERE `id` = '$id'";
        if (isset($temporaryDelete)) {
            $temporaryDeleteQuery = $dataBase->query($temporaryDelete);
            $dataBase->close();
            if (isset($temporaryDeleteQuery)) {
                if ($temporaryDeleteQuery) {
                    $_SESSION['recoverMsg'] = "IF YOU RECOVER THIS USER PLEASE VISIT <a href='recoverUser.php' target='_blank' class='btn btn-info mx-3'>RECOVER USER</a>";
                    header("Location:userList.php");
                } else {
                    echo "UPDATE NOT WORKING";
                }
            }
        }

    }
    /// recover query //
    if (isset($recoverId)) {
        // recover query //
        $recover = "UPDATE `users` SET `status` = 1 WHERE `id` = '$recoverId'";
        if (isset($recover)) {
            $recoverQuery = $dataBase->query($recover);
            $dataBase->close();
            if (isset($recoverQuery)) {
                if ($recoverQuery) {
                    header("Location:recoverUser.php");
                } else {
                    echo "RECOVER NOT WORKING";
                }
            }
        }
    }
    /// Permanent Delete Query ///
    if (isset($deletedId)) {
        /// delete query ///
        $delete = "DELETE FROM `users` WHERE `id` = '$deletedId'";
        if (isset($delete)) {
            $deleteQuery = $dataBase->query($delete);
            $dataBase->close();
            if (isset($deleteQuery)) {
                if ($deleteQuery) {
                    header("Location:recoverUser.php");
                } else {
                    echo "DELETE NOT WORKING";
                }
            }

        }
    }


}

