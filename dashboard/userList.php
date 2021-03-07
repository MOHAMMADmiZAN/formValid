<?php
require_once "inc/header.php";
$view = "SELECT * FROM `users` WHERE `status` = 1 ORDER BY `fullName`";
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
                    <div class="alert alert-primary text-center mt-3" role="alert">
                        <h1>USER DETAILS</h1>
                    </div>
                    <?php if (isset($_SESSION['recoverMsg'])) { ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['recoverMsg'];
                            unset($_SESSION['recoverMsg']);
                            ?>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <table class=" table table-bordered table-striped text-center table-info">
                        <tr>
                            <th>SL</th>
                            <th>FULL NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE NUMBER</th>
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
                                           class="btn btn-warning temporaryDelete">DELETE</a></td>
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



















