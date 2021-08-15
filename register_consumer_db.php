<?php
    require_once('./config.php');

    $id = get_max_id_for_add('users');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = md5(constant('SALT').$_POST['password'].constant('SALT'));
    $phone_number = $_POST['phone_number'];
    $image = $_POST['image'];
    $platform_role = 5; // 3 refers to consumer

    $target_path = "./images/profiles/";

     if($_FILES['image']['size'] == 0 ){
        $image = 'noImage.png';
     }else{
         $image = date("dmY_hms").basename($_FILES['image']['name']);
     }

     $target_path .= $image;
     move_uploaded_file($_FILES['image']['tmp_name'], $target_path);

     $query = "INSERT INTO `users`(`id`,`first_name`, `last_name`, `platform_role_id`, `email`, `password`, `phone_number`, `image`) VALUES ($id,'$fname','$lname',$platform_role,'$email','$password','$phone_number','$image')";

     mysqli_query($con, $query);


     header('location: index.php');



?>