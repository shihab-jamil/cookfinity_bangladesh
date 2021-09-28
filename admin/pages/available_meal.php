<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Available Meals</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- information summery -->
<div class="card">
  <div class="card-header">      
      <h3 class="card-title">Meals information summery</h3>
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
            <span class="info-box-text">Meals </span>
            <span class="info-box-number" ><?= count_badges('meals') ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Home Cook</span>
            <span class="info-box-number" ><?= count_badges('homecook') ?></span>
          </div>
        </div>
      </div>
    </div>              
  </div>
</div>
<!-- /.information summery -->

<!-- cards -->
<div class="row justify-content-center">
  <?php
    $all_data = get_all_meal_details();
    while($row = mysqli_fetch_array($all_data)){
        $date = date_create($row['expire_date']);
        ?>
              <div class="col-md-4">
                <div class="card " style="cursor : pointer"">
                    <div class="card-header">
                        <div class="float-left">
                            <img src="../images/profiles/<?= $row['user_image'] ?>" class="" style="border-radius: 50%;" height="50px" width="50px" alt="">
                            <label for="" class="ml-2"><?= $row['first_name']." ".$row['last_name'] ?></label>
                            <!-- <i class="fa fa-location-arrow text-danger" class="ml-2"><small class="text-dark">Baridhara DOHS</small></i> -->
                        </div> 
                        <div class="float-right">
                            <div class="card-footer text-center" style="border-radius: 5% !important; ">
                                <i class="fas fa-star text-warning"></i> <span>  4.5(33)</span>
                            </div>
                        </div>    
                    </div>
                    <div class="card-body p-0">
                        <img src="../images/meals/<?= $row['image'] ?>" class="" height="250px" width="400px">
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <i class="fas fa-users text-warning" ><small class="text-dark"><?= $row['quantity'] ?></small></i>
                            <i class="fas fa-calendar text-info" ><small class="text-dark"><?= date_format($date, 'd M') ?></small></i></i>
                            <i class="fas fa-clock text-danger" ><small class="text-dark"><?= $row['available_from']."-".$row['available_till'] ?></small></i>
                            <i class="fas fa-tags text-primary" aria-hidden="true"><small class="text-dark"><?= $row['price']."৳" ?></small></i>
                        </div>
                        <div class="row mt-2">
                            <label for=""><?= $row['description'] ?></label>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
  ?>
   
</div>
<!-- /.cards -->