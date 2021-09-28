<?php
    require_once('../../../config.php');
    $id = $_GET['id'];
    $uid = $_SESSION['uid'];
    $query = "UPDATE orders  SET `status`='Active' WHERE id=$id";

    if(mysqli_query($con, $query)){ 
        $_SESSION['accept'] = 'success';
        header('location: ../../?page=orders');
    }else{
        $_SESSION['accept'] = 'error';
        header('location: ../../?page=orders');
    }
?>