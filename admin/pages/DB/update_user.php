<?php
    require_once('../../../config.php');

    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $role = $_POST['role'];
    $email = $_POST['email'];

    $phone_number = $_POST['phone_number'];
    $added_by = $_POST['added_by'];

    $target_path = "../../../images/profiles/";

     if($_FILES['file']['size'] == 0 ){
        $query = "UPDATE `users` SET `first_name`='$fname',`last_name`='$lname',`platform_role_id`=$role,`email`='$email',`phone_number`='$phone_number',`added_by`=$added_by WHERE id=$id";
     }else{
        $image = date("dmY_hms").basename($_FILES['file']['name']);
        $target_path .= $image;
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $query = "UPDATE `users` SET `first_name`='$fname',`last_name`='$lname',`platform_role_id`=$role,`email`='$email',`phone_number`='$phone_number',`added_by`=$added_by, `image`='$image' WHERE id=$id";
     }

    

    //echo $query;
    if(mysqli_query($con, $query)){
        $_SESSION['update_user'] = 'success';
        header('location: ../../?page=admin_portal');
    }else{
        $_SESSION['update_user'] = 'error';
        header('location: ../../?page=admin_portal');
    }

    

?>