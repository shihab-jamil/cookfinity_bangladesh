<?php
    require_once('../../../config.php');
    $id = $_GET['id'];
    $uid = $_SESSION['uid'];
    $query = "UPDATE orders  SET `status`='Canceled' WHERE id=$id";

    if(mysqli_query($con, $query)){ 
        $_SESSION['cancel'] = 'success';
        header('location: ../../?page=orders');
    }else{
        $_SESSION['cancel'] = 'error';
        header('location: ../../?page=orders');
    }
?>