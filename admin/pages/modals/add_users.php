<?php
    
    $uid = $_SESSION['uid'];
    $user_name = get_user_name_by_id($uid);

?>


<div class="modal fade" id="add_user">
  <form action="./pages/DB/add_user.php" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new user</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" value="<?php echo get_max_id_for_add('users') ?>" readonly>
              </div>
              <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="fname" class="form-control" required>
              </div>
               <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control" required>
               </div>
               <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="select2 form-control" id="" style="width: 100%;" required>
                    <?php 
                        $all_data = get_all_records_from_table('roles');  
                        while($data = mysqli_fetch_array($all_data)){
                        ?>
                            <option value="<?= $data['id'] ?>"><?= $data['role_name'] ?></option><?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email"  class="form-control" required>
                  <span id="email_existence"></span>
                </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="number" name="phone_number"  class="form-control" required>
              </div>
              <div class="form-group">
                <label for="">Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="file" id="exampleFile">
                  <label class="custom-file-label" for="exampleFile">Upload Image</label>
                </div>
              </div>
              <div class="form-group">
                <label for="">Added By</label>
                <input type="text" class="form-control" value="<?= $user_name ?>" readonly>
              </div>
              
              <input type="hidden" name="added_by" value="<?= $uid ?>" >
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button id="submit" type="submit" name="submit_item" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>


