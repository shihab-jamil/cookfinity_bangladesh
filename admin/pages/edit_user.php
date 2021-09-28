<?php
    $id = $_GET['id'];
    $details = get_single_table_record('users', 'id', $id);
?>

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Edit user</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<form action="./pages/DB/update_user.php" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">ID</label>
                    <input type="text" name="id" class="form-control" value="<?= $id ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="form-control" value="<?= $details['first_name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control" value="<?= $details['last_name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role" class="select2 form-control" id="" style="width: 100%;" required>
                    <?php 
                        $all_data = get_all_records_from_table('roles');  
                        while($data = mysqli_fetch_array($all_data)){
                        ?>
                            <option <?php echo $data['id'] == $details['platform_role_id'] ? 'selected' : '' ?> value="<?= $data['id'] ?>"><?= $data['role_name'] ?></option><?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?= $details['email'] ?>"  class="form-control" required>
                    <span id="email_existence"></span>
                </div>
            </div>
            
            <div class="col-md-6">
               
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Old Password</label>
                            <input type="password" name="password"  class="form-control" disabled >
                        </div>
                        <div class="col-md-4">
                            <label for="">New Password</label>
                            <input type="password" name="password"  class="form-control" disabled >
                        </div>
                        <div class="col-md-4">
                            <label for="">Confirm Password</label>
                            <input type="password" name="password"  class="form-control" disabled >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="number" name="phone_number" value="<?= $details['phone_number'] ?>" class="form-control" required>
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
        <div class="card-footer">
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cancel('admin_portal')">Cancel</button>
            <button id="submit" type="submit" name="submit_item" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>


          