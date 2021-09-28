<?php
    require_once('../../../config.php');
    $salt = constant('SALT');
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $role = $_POST['role'];
    $email = $_POST['email'];
    $password = md5($salt.$_POST['password'].$salt);
    $phone_number = $_POST['phone_number'];
    $added_by = $_POST['added_by'];

    $target_path = "../../../images/profiles/";

     if($_FILES['file']['size'] == 0 ){
        $image = 'noImage.png';
     }else{
         $image = date("dmY_hms").basename($_FILES['file']['name']);
     }

     $target_path .= $image;
     move_uploaded_file($_FILES['file']['tmp_name'], $target_path);

     $query = "INSERT INTO `users`(`id`, `first_name`, `last_name`, `platform_role_id`, `email`, `password`, `phone_number`, `image` ,`added_by`) VALUES ($id,'$fname','$lname',$role,'$email','$password','$phone_number','$image',$added_by)";

     $query_balance = "INSERT INTO `balance`( `user_id`) VALUES ($id)";

    //echo $query;
    if(mysqli_query($con, $query) && mysqli_query($con, $query_balance)){
        $_SESSION['add_user'] = 'success';
        header('location: ../../?page=admin_portal');
    }else{
        $_SESSION['add_user'] = 'error';
        header('location: ../../?page=admin_portal');
    }

    

?>