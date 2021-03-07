<?php
require_once "inc/header.php";
$view = "SELECT * FROM `users` WHERE `status` = 2 ORDER BY `fullName`";
if (isset($dataBase)) {
    $viewQuery = $dataBase->query($view);
    $dataBase->close();
} else {
    echo 'database nai';
}
?>
<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-warning text-center mt-3" role="alert">
                        <h1>TEMPORARY DELETED USER</h1>
                    </div>
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
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<?php
require_once 'inc/footer.php';

?>
