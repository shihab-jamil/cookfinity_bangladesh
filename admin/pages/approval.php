<?php
    show_sweet_alert('approved', 'Approved', 'Failed to approver', '', '', '');
    show_sweet_alert('declined', 'Declined', 'Failed to decline', '', '', '');


?>

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Approval</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



<!-- information summery -->
<div class="card">
  <div class="card-header">      
      <h3 class="card-title">Home Cook approval summery</h3>
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
            <span class="info-box-text">Pending</span>
            <span class="info-box-number" ><?= count_badges('pending') ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-tasks"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Approved</span>
            <span class="info-box-number"><?= count_badges('approved') ?></span>
          </div>
        </div>
      </div>
    </div>              
  </div>
</div>
<!-- /.information summery -->


<!-- table -->
<div class="card">
  <div class="card-header">      
    <h3 class="card-title">Pending request</h3>
    <div class="card-tools">
      <!-- Collapse Button -->
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
    </div>
  </div>
  <div class="card-body">
    <div class="float-left">
    </div>
    <br><br>
    <div class="table-responsive" id="">
      <table id="example3" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th width="80">ID</th>
          <th>Name</th>
          <th>Role</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Status</th>
          <th>Approved By</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
           $all_data = get_approval_list();
           while($row = mysqli_fetch_array($all_data)){
                ?>
                     <tr >
                        <td>
                            <?= $row['id'] ?>
                        </td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['role_name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone_number'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= get_user_name_by_id($row['approved_by_uid']) ?></td>
                        <td>
                          <?php
                            if($row['status'] == 'Pending'){
                              ?>
                                <a href="./pages/DB/approve.php?id=<?= $row['id'] ?>" class="btn btn-success" title="Approve"><i class="fas fa-check"></i></a>
                                <a href="./pages/DB/decline.php?id=<?= $row['id'] ?>" class="btn btn-danger" title="Decline"><i class="fas fa-times"></i></i></a>
                              <?php
                            }else if($row['status'] == 'Approved'){
                                 ?>
                                <a href="./pages/DB/approve.php?id=<?= $row['id'] ?>" class="btn btn-success disabled" title="Approve"><i class="fas fa-check"></i></a>
                                <a href="./pages/DB/decline.php?id=<?= $row['id'] ?>" class="btn btn-danger disabled" title="Decline"><i class="fas fa-times"></i></i></a>
                              <?php
                            }
                          ?>

                        </td>
                    </tr>
                <?php
           } 
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.table -->