<?php
    show_sweet_alert('add_meal', 'Meal added successfully', 'Failed to add meal', '', '', '');
    show_sweet_alert('update_meal', 'Meal updated successfully', 'Failed to update meal', '', '', '');
    show_sweet_alert('delete_meal', 'Meal deleted successfully', 'Failed to delete Meal', '', '', '');
    $uid = $_SESSION['uid'];
?>


<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">My Meals</h1>
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
            <span class="info-box-text">Your Total Meal</span>
            <span class="info-box-number" ><?= count_badges_per_user('total_meal', $uid) ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Ongoing</span>
            <span class="info-box-number" ><?= count_badges_per_user('ongoing', $uid) ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-tasks"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Expired</span>
            <span class="info-box-number"><?= count_badges_per_user('expired', $uid) ?></span>
          </div>
        </div>
      </div>
    </div>              
  </div>
</div>
<!-- /.information summery -->


<div class="card">
    <div class="card-header">      
        <h3 class="card-title">Meals</h3>
        <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="float-right">
            <a href="#" data-toggle="modal" data-target="#add_meal" class="btn btn-primary">Add new Meal</a>
        </div>
        <br><br>
        <div class="table-responsive" >
            <table id="example4" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th width="80">ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Expire Date</th>
                        <th>Available From</th>
                        <th>Available Till</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $all_data =get_all_meal_details_per_user($uid);
                    while($row = mysqli_fetch_array($all_data)){
                      ?>
                          <tr >
                            <td>
                                <?= $row['id'] ?>
                                <a onclick="return confirm('do you wanna delete this item ?')" class="btn btn-default btn-sm" href="./pages/delete_meal.php?id=<?= $row['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                <a class="btn btn-default btn-sm" href="<?= './?page=edit_meal&id='.$row['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                            <td><?= $row['title'] ?></td>
                            <td><?= $row['description'] ?></td>
                            <td><?= $row['category_title'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['price'] ?></td>
                            <td><?= $row['expire_date'] ?></td>
                            <td><?= time_conversion($row['available_from']) ?></td>
                            <td><?= time_conversion($row['available_till']) ?></td>
                          </tr>
                      <?php
                    }
                  ?>
                </tbody>
            </table>
        </div>
  </div>
</div>    