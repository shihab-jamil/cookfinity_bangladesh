<?php
    require_once('../../../config.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $expire_date = $_POST['expire_date'];
    $available_from = $_POST['available_from'];
    $available_till = $_POST['available_till'];
    $description = $_POST['description'];
    $uid = $_POST['uid'];


    $target_path = "../../../images/meals/";

     if($_FILES['file']['size'] == 0 ){
        $image = 'noImage.png';
     }else{
         $image = date("dmY_hms").basename($_FILES['file']['name']);
     }

     $target_path .= $image;
     move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

     $query = "INSERT INTO `meal`(`id`, `uid`, `title`, `description`, `category_id`, `quantity`, `price`,`image`, `expire_date`, `available_from`, `available_till`) VALUES ($id,$uid,'$title','$description',$category,$quantity,$price,'$image','$expire_date','$available_from','$available_till')";



    //echo $query;
    if(mysqli_query($con, $query)){
        $_SESSION['add_meal'] = 'success';
        header('location: ../../?page=my_meals');
    }else{
        $_SESSION['add_meal'] = 'error';
        header('location: ../../?page=my_meals');
    }

    

?>