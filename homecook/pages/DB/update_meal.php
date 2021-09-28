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
         $query = "UPDATE `meal` SET `title`='$title',`description`='$description',`category_id`=$category,`quantity`=$quantity,`price`=$price,`expire_date`='$expire_date',`available_from`='$available_from',`available_till`='$available_till' WHERE id=$id";
    }else{
        $image = date("dmY_hms").basename($_FILES['file']['name']);
        $target_path .= $image;
        move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        
        $query = "UPDATE `meal` SET `title`='$title',`description`='$description',`category_id`=$category,`quantity`=$quantity,`price`=$price,`image`='$image',`expire_date`='$expire_date',`available_from`='$available_from',`available_till`='$available_till' WHERE id=$id";
    }


    //echo $query;
    if(mysqli_query($con, $query)){
        $_SESSION['update_meal'] = 'success';
        header('location: ../../?page=my_meals');
    }else{
        $_SESSION['update_meal'] = 'error';
        header('location: ../../?page=my_meals');
    }

    

?>