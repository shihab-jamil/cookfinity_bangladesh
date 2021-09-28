<?php
    $uid = $_SESSION['uid'];
?>

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-8">
        <h1 class="m-0">Responses</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- information summery -->
<div class="card">
    <div class="card-header">      
        <h3 class="card-title">Response information summery</h3>
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
            <span class="info-box-text">Total responses</span>
            <span class="info-box-number" ><?= count_badges_per_user('all_responses',$uid) ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Responses under review</span>
            <span class="info-box-number" ><?= count_badges_per_user('responses_review',$uid) ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-tasks"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Response accepted</span>
            <span class="info-box-number"><?= count_badges_per_user('responses_accepted',$uid) ?></span>
          </div>
        </div>
      </div>
    </div>              
  </div>
</div>
<!-- /.information summery -->


<!-- response_table -->
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
                <th>Respond To</th>
                <th>Meal Title</th>
                <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $all_data = get_response_details();
                while($row = mysqli_fetch_array($all_data)){
                    ?>
                        <tr>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['meal_title'] ?></td>
                            <td><?= $row['status'] ?></td>
                            
                        </tr>
                    <?php
                }
            ?>
          </tbody>
      </table>
  </div>
</div>
<!-- ./response_table -->