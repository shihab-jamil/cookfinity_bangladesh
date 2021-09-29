<?php
    include_once('./config.php');

    if(!isset($_SESSION['email'])){
        header('location: ./login.php');
    }

    if(isset($_POST['submit'])){
        $requested_by_uid = $_POST['requested_by_uid'];
        $meal_title = $_POST['meal_title'];
        $quantity = $_POST['quantity'];
        $address = $_POST['address'];
        $delivery_date = $_POST['delivery_date'];
        $delivery_time = $_POST['delivery_time'];

        $query = "INSERT INTO `requests`(`requested_by_uid`, `meal_title`, `quantity`, `address`, `delivery_date`, `delivery_time`) VALUES ($requested_by_uid, '$meal_title', $quantity, '$address' , '$delivery_date' , '$delivery_time')";

        if(mysqli_query($con, $query)){
            header('location: ./index.php');
        }else{
            echo "Something Went Wrong";
        }

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
            <div class="col-6 offset-3">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Requested By</label>
                        <input type="text" class="form-control" readonly value="<?= get_user_name_by_id($_SESSION['uid']) ?>">
                    </div> 
                    <input type="hidden" name="requested_by_uid" value="<?= $_SESSION['uid'] ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Meal Title</label>
                        <input type="text" class="form-control" name="meal_title">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" class="form-control"  name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea class="form-control" name="address" id="" cols="30" rows="2"></textarea>
                    </div>
                    <div class="row">
                        <!-- <div class=""> -->
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Delivery Date</label>
                                <input type="date" class="form-control"  name="delivery_date">
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputEmail1">Delivery Time</label>
                                <input type="time" class="form-control"  name="delivery_time">
                            </div>
                        <!-- </div> -->
                    </div> <br>
                    <div class="row justify-content-between">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>    
    </div>    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

