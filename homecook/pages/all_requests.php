<?php
    show_sweet_alert('response_to_request', 'Response Under Review', 'Failed to response', '', '', '');
    $uid = $_SESSION['uid'];
?>

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-8">
        <h1 class="m-0">Requests  <small>(You need to upload a meal to respond a request)</small></h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- information summery -->
<div class="card">
    <div class="card-header">      
        <h3 class="card-title">Request information summery</h3>
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
            <span class="info-box-text">Total requests</span>
            <span class="info-box-number" ><?= count_badges('all_requests') ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Active requests</span>
            <span class="info-box-number" ><?= count_badges('active_requests') ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-tasks"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Closed Completed</span>
            <span class="info-box-number"><?= count_badges('closed_requests') ?></span>
          </div>
        </div>
      </div>
    </div>              
  </div>
</div>
<!-- /.information summery -->

<!-- request_table -->
<div class="card">
    <div class="card-header">      
        <h3 class="card-title">Request Details</h3>
        <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
  <div class="card-body">
      <table id="example4" class="table table-bordered table-striped text-center">
          <thead>
            <tr>
                <th>Requested By</th>
                <th>Meal Title</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Delivery At</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $all_data = get_request_details();
                while($row = mysqli_fetch_array($all_data)){
                    ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['meal_title'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= date_format(date_create($row['delivery_date']),"jS M").', '.time_conversion($row['delivery_time']) ?></td>
                            <td><?= $row['phone_number'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <a href="./?page=upload_meal_per_request&id=<?= $row['id'] ?>" class="btn btn-success" title="respond">Response</a>
                            </td>
                        </tr>
                    <?php
                }
            ?>
          </tbody>
      </table>
  </div>
</div>
<!-- /.request_table -->