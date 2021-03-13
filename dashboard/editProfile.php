<?php require_once 'inc/header.php' ?>


<div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="alert alert-primary text-center">
            <h1>This is a Edit Page</h1>
        </div>
        <?php if (isset($_SESSION['update'])) { ?>
            <div class="alert alert-success text-center">
                <?php echo $_SESSION['update'];
                unset($_SESSION['update']);
                ?>
            </div>
        <?php }
        ?>
        <?php if (isset($_SESSION['noupdate'])) { ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['noupdate'];
                unset($_SESSION['noupdate']);
                ?>
            </div>
        <?php }
        ?>
        <?php if (isset($_SESSION['fixed'])) { ?>
            <div class="alert alert-danger text-center">
                <?php echo $_SESSION['fixed'];
                unset($_SESSION['fixed']);
                ?>
            </div>
        <?php }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-6  m-auto">
                    <form action="editProfileResponse.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="editName"></label>
                            <input type="text" id="editName" class="form-control" name="name"
                                   placeholder="Update Your Full Name"
                                   value="<?= (isset($dashBoardUserIdViewAssoc)) ? $dashBoardUserIdViewAssoc['fullName'] : '' ?>">
                            <?php
                            if (isset($_SESSION['EmailError2'])) {
                                ?>
                                <div class="alert alert-danger text-center text-uppercase">
                                    <?php echo $_SESSION['EmailError2'];
                                    unset($_SESSION['EmailError2']);
                                    ?>
                                </div>
                            <?php } ?>
                            <label for="editEmail"></label>
                            <input type="text" id="editEmail" class="form-control" name="email"
                                   placeholder="Update Your email"
                                   value="<?= (isset($dashBoardUserIdViewAssoc)) ? $dashBoardUserIdViewAssoc['email'] : '' ?>">
                            <label for="editPhone"></label>
                            <input type="text" id="editPhone" class="form-control" name="phone"
                                   placeholder="Update Your Phone Number"
                                   value="<?= (isset($dashBoardUserIdViewAssoc)) ? $dashBoardUserIdViewAssoc['cellNumber'] : '' ?>">
                            <label for="editImage"></label>
                            <input type="file" id="editImage" class="form-control" name="image"
                                   placeholder="Update Your Profile Image"
                                   onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
                            <div class=" preview mx-auto my-3 text-center"><h6>Image Preview</h6>
                                <img id="image_id" width="200"  class="m-3"
                                     src="upload/<?= (isset($dashBoardUserIdViewAssoc)) ? $dashBoardUserIdViewAssoc['image'] : '' ?>"
                                     alt="<?= (isset($dashBoardUserIdViewAssoc)) ? $dashBoardUserIdViewAssoc['image'] : '' ?>"/>
                            </div>
                            <button type="submit" class="btn btn-primary my-3 p-3 b-ra-5 mx-auto d-block" name="update">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->


<?php
require_once 'inc/footer.php'
?>
