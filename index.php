
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php include './header.php'; ?>
  <div class="container">
    <div class="row">
      <h1 class="mb-4">What can we help you find today?</h1>
      <?php
        $all_data = get_all_records_from_table('category'); 
        while($row = mysqli_fetch_array($all_data)){
          ?>
            <div class="col-md-3 mb-4" style="cursor : pointer" onclick="filter_category(<?= $row['id'] ?>)">
              <div class="card flex-row flex-wrap bg-secondary">
                <div class="card-header border-0">
                    <img src="<?= $row['image_link'] ?>" alt="" height="100" width="100">
                </div>
                <div class="card-block px-2">
                    <h4 class="card-title mt-4 text-white"><?= $row['title'] ?></h4>
                </div>
              </div>
            </div>
          <?php
        }
      ?>

      <div class="col-md-3 mb-4" style="cursor : pointer" onclick="filter_category(0)">
        <div class="card flex-row flex-wrap bg-secondary">
          <div class="card-header border-0">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2ikMvj1bXchapW-n5kHxvyWkshNQOfzd-nSL5N3FqC8XjK8IfEuvXEAxS1nxVc6D19rs&usqp=CAU" alt="" height="100" width="100">
          </div>
          <div class="card-block px-2">
              <h4 class="card-title mt-4 text-white">All Category</h4>
          </div>
        </div>
      </div>
    </div>


    <div class="row justify-content-center  my-5">
        <h1 class="mb-3">Your Desire Meals</h1>
        <?php
        $all_data = get_all_meal_details();
        while($row = mysqli_fetch_array($all_data)){
          if(isset($_GET['cat_id']) && $row['category_id'] != $_GET['cat_id'] && $_GET['cat_id'] != 0){
            continue;
          }
          $date = date_create($row['expire_date']);
          ?>
                <div class="col-md-4 mb-4">
                  <div class="card " style="cursor : pointer"">
                      <div class="card-header">
                          <div class="float-left">
                              <img src="./images/profiles/<?= $row['user_image'] ?>" class="" style="border-radius: 50%;" height="50px" width="50px" alt="">
                              <label for="" class="ml-2"><?= $row['first_name']." ".$row['last_name'] ?></label>
                          </div> 
                          <div class="float-right">
                              <div class="card-footer text-center" style="border-radius: 5% !important; ">
                                  <i class="fas fa-star text-warning"></i> <span>  4.5(33)</span>
                              </div>
                          </div>    
                      </div>
                      <div class="card-body p-0">
                          <img src="./images/meals/<?= $row['image'] ?>" class="" height="250px" width="412px">
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
  </div>
</body>
</html>

<script>
  function filter_category(id){
    location.href = "./index.php?cat_id="+id;
  }
</script>