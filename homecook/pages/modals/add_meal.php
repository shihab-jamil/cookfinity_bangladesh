<?php
    
    $uid = $_SESSION['uid'];
    $user_name = get_user_name_by_id($uid);

?>


<div class="modal fade" id="add_meal">
  <form action="./pages/DB/add_meal.php" method="post" enctype="multipart/form-data">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new meal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" value="<?php echo get_max_id_for_add('meal') ?>" readonly>
              </div>
              <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" required>
              </div>
               <div class="form-group">
                    <label for="">Category</label>
                    <select name="category" class="select2 form-control" id="" style="width: 100%;" required>
                    <?php 
                        $all_data = get_all_records_from_table('category');  
                        while($data = mysqli_fetch_array($all_data)){
                        ?>
                            <option value="<?= $data['id'] ?>"><?= $data['title'] ?></option><?php
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="">Quantity</label>
                  <input type="number" name="quantity"  class="form-control" required>
                  <span id="email_existence"></span>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" class="form-control" required>
               </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Expire Date</label>
                <input type="date" name="expire_date" min="<?= date('Y-m-d') ?>" class="form-control" required>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Available From</label>
                        <input type="time" name="available_from"  class="form-control" required>
                    </div> 
                    <div class="col-md-6">
                        <label for="">Available Till</label>
                        <input type="time" name="available_till"  class="form-control" required>
                    </div>    
                </div>
              </div>
              <div class="form-group">
                <label for="">Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="file" id="exampleFile2">
                  <label class="custom-file-label" for="exampleFile2">Upload Image</label>
                </div>
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" class="form-control" rows="4"></textarea>
              </div>
            </div>
            <input type="hidden" name="uid" value="<?=  $uid ?>">            
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

