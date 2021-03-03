<?php
require_once 'dataBase.php';
$view = "SELECT * FROM `users` WHERE `status` = 2 ORDER BY `fullName`";
if (isset($dataBase)) {
    $viewQuery = $dataBase->query($view);
    $dataBase->close();
} else {
    echo 'database nai';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recoverList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning text-center mt-3" role="alert">
                <h1>RECOVER USER</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 m-auto">
                <table class=" table table-bordered table-striped text-center table-primary">
                    <tr>
                        <th>SL</th>
                        <th>FULL NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th>
                        <th>ACTION</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                    if (isset($viewQuery)):
                        foreach ($viewQuery as $index => $user) { ?>
                            <tr>
                                <td><?= ++$index ?></td>
                                <td><?= $user['fullName'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['cellNumber'] ?></td>
                                <td><a data-id="<?= $user['id'] ?>" type="button"
                                       class="btn btn-success recoverUser">RECOVER USER</a></td>
                                <td><a data-id="<?= $user['id'] ?>" type="button"
                                       class="btn btn-danger confirmDelete">PERMANENTLY DELETE</a></td>
                            </tr>
                        <?php } endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script>
    $('.recoverUser').click(
        function () {
            let id = $(this).attr('data-id');
            setTimeout(function () {
                window.location.href = "userDelete.php?recoverId=" + id;
            }, 500)
        }
    )
    $('.confirmDelete').click(
        function () {
            let id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this  Data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your Data has been deleted!", {
                            icon: "success",
                        });
                        setTimeout(function () {
                            window.location.href = "userDelete.php?deletedId=" + id;
                        }, 1500)
                    } else {
                        swal("Your Data Will be safe!");
                    }
                });
        }
    )
</script>
</body>
</html>
