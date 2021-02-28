<?php
require_once 'dataBase.php';
$view = "SELECT * FROM `users`";
if (isset($dataBase)) {
    $viewQuery = mysqli_query($dataBase, $view);
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
    <title>UserList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info text-center mt-3" role="alert">
                <h1>USER DESCRIPTION</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 m-auto">
                <table class=" table table-bordered table-striped text-center">
                    <tr>
                        <th>SERIAL NUMBER</th>
                        <th>FULL NAME</th>
                        <th>EMAIL</th>
                        <th>PHONE NUMBER</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                    if (isset($viewQuery)):
                        foreach ($viewQuery as $index => $user) { ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="#" type="button" class="btn btn-warning">DELETE</a></td>
                            </tr>
                        <?php } endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="js/script.js"></script>
</body>
</html>
