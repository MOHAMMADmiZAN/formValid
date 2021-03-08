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
      <div class="row">
          <div class="col-lg-5  m-auto">
              <form action="editProfileResponse.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="editName"></label>
                      <input type="text" id="editName" class="form-control" name="name" placeholder="Update Your Full Name">
                      <label for="editEmail"></label>
                      <input type="text" id="editEmail" class="form-control" name="email" placeholder="Update Your email">
                      <label for="editPhone"></label>
                      <input type="text" id="editPhone" class="form-control" name="phone" placeholder="Update Your Phone Number">
                      <label for="editImage"></label>
                      <input type="file" id="editImage" class="form-control" name="image"  placeholder="Update Your Profile Image">
                      <button type="submit" class="btn btn-primary my-3 p-3 b-ra-5 mx-auto d-block" name="update">Update</button>
                  </div>
              </form>
          </div>
      </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->


<?php
require_once 'inc/footer.php'
?>
