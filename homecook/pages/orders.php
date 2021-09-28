<?php
    show_sweet_alert('accept', 'Order confirmed', 'Failed to confirm order', '', '', '');
    show_sweet_alert('cancel', 'Order has been canceled', 'Failed to cancel order', '', '', '');
    show_sweet_alert('delete_meal', 'Meal deleted successfully', 'Failed to delete Meal', '', '', '');
    $uid = $_SESSION['uid'];
?>


<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Orders</h1>
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
            <label for="">Select an Order Type </label>
            <form action="module/roleGenerator.php" method="POST">
                <select name="role" class="select2" style="width: 100%;" id="order_filter" onchange="order_update(this.value)" >
                  <option value="all">All Order</option>
                  <option value="active">Active</option>
                  <option value="pending">Pending</option>
                  <option value="completed">Completed</option>
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
        <h3 class="card-title">Order information summery</h3>
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
            <span class="info-box-text">Your Total Order</span>
            <span class="info-box-number" ><?= count_badges_per_user('total_order', $uid) ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-success"><i class="fas fa-folder-open"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Pending</span>
            <span class="info-box-number" ><?= count_badges_per_user('pending_order', $uid) ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Active order</span>
            <span class="info-box-number" ><?= count_badges_per_user('active_order', $uid) ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box">
          <span class="info-box-icon bg-danger"><i class="fas fa-tasks"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Order Completed</span>
            <span class="info-box-number"><?= count_badges_per_user('completed_order', $uid) ?></span>
          </div>
        </div>
      </div>
    </div>              
  </div>
</div>
<!-- /.information summery -->


<!-- order_table -->
<div class="card">
    <div class="card-header">      
        <h3 class="card-title">Order Details</h3>
        <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
  <div class="card-body">
      <table id="example3" class="table table-bordered table-striped text-center">
          <thead>
            <tr>
                <th>Ordered By</th>
                <th>Meal Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Delivery At</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody id="order_table_body">
          </tbody>
      </table>
  </div>
</div>
<!-- /.order_table -->


<script>
    window.onload = function () { 
        current_dropdown_value = document.getElementById('order_filter').value;
        order_update(current_dropdown_value)    
    }
    function order_update(value){
        $.ajax({
            url:'pages/ajax_generator.php',
            method : "POST",
            data: {
                order_table : true,
                condition : value
            },
            dataType:"text",
            success:function(response){
                $('#order_table_body').html(response);
            }
        })
    }
</script>