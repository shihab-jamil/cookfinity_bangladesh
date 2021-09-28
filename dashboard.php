<?php
  require_once('./config.php');

  if(isset($_GET['req_id'])){
    $req_id = $_GET['req_id'];
    insert_order($req_id);
    unset($_GET['req_id']);
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <?php include './header.php'; ?>
    <div class="container mt-5">
      <div class="row">
        <h4>
          Responses From Homecooks
          <hr>
        </h4>

        <table class="table table-striped text-center">
          <tbody>
            <tr>
              <th>Requested For</th>
              <th>Responded By</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            <?php
              $all_data = get_response_details_per_user($_SESSION['uid']);
              while($row = mysqli_fetch_array($all_data)){
                ?>
                  <tr>
                    <td><?= $row['meal_title'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><button class="btn btn-success" onclick="confirm_response(<?= $row['request_id'] ?>)">Confirm</button></td>

                  </tr>
                <?php
              }
            ?>
          </tbody>
        </table>

      </div>
    </div>    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<script>
    function confirm_response(id){
      location.href = "./dashboard.php?req_id="+id;

    }
</script>