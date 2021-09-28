<?php
    show_sweet_alert('add_user', 'User added successfully', 'Failed to add user', '', '', '');
    show_sweet_alert('update_user', 'User updated successfully', 'Failed to update user', '', '', '');
    show_sweet_alert('delete_user', 'User deleted successfully', 'Failed to delete user', '', '', '');

?>

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Admin Portal</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- role selector -->
<div class="card">
  <div class="card-header text-right">
    <div class="row">
      <div class="col-md-4 offset-4">
        <div class="form-group text-center">
          <menu id="nestable-menu">
            <label for="">Select a role for details </label>
            <form action="module/roleGenerator.php" method="POST">
                <select name="role" class="select2" style="width: 100%;" id="role_dropdown"onchange="role_update(this.value)" >
                  <!-- <option>< ?= $table_users['company_id'] ?></option> -->
                  <?php 
                    $role_list = get_all_records_from_table('roles');  
                  while($role = mysqli_fetch_array($role_list)){
                    ?>
                  
                    <option value="<?= $role['id'] ?>" ><?= $role['role_name']  ?></option><?php
                  } ?>
                </select> 
            </form>
          </menu>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.role selector -->


<!-- information summery -->
<div class="card">
  <div class="card-header">      
      <h3 class="card-title">Role information summery</h3>
      <div class="card-tools">
        <!-- Collapse Button -->
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
      </div>
    </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-info"><i class="fa fa-cogs"></i></span>                
          <div class="info-box-content">
            <span class="info-box-text">Consumer</span>
            <span class="info-box-number" ><?= count_badges('consumer') ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-folder-open"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Home Cook</span>
            <span class="info-box-number" ><?= count_badges('homecook') ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Supplier</span>
            <span class="info-box-number" ><?= count_badges('supplier') ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-tasks"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Admin</span>
            <span class="info-box-number"><?= count_badges('admin') ?></span>
          </div>
        </div>
      </div>
    </div>              
  </div>
</div>
<!-- /.information summery -->

<!-- table -->
<div class="card">
  <div class="card-body">
    <div class="float-left">
    </div>
    <div class="float-right">
      <a href="#" data-toggle="modal" data-target="#add_user" class="btn btn-primary">Add User</a>
    </div>
    <br><br>
    <div class="table-responsive" id="">
      <table id="example5" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th width="80">ID</th>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Added By</th>
        </tr>
        </thead>
        <tbody id="user_table_body">
        
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.table -->

<script>
    window.onload = function () { 
        current_dropdown_value = document.getElementById('role_dropdown').value;
        role_update(current_dropdown_value)    
    }
    function role_update(value){
        $.ajax({
            url:'pages/ajax_generator.php',
            method : "POST",
            data: {
                admin_portal_table : true,
                role_id : value
            },
            dataType:"text",
            success:function(response){
                $('#user_table_body').html(response);
            }
        })
    }
</script>

