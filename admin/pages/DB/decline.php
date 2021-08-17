<?php
    require_once('../../../config.php');
    $id = $_GET['id'];
    $uid = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM approval WHERE id=$id"));
    $uid = $uid['uid'];

    $query_app = "DELETE FROM approval  WHERE id=$id";
    $query_user = "DELETE FROM users  WHERE id=$uid";

    if(mysqli_query($con, $query_app) &&  mysqli_query($con, $query_user)){
        $_SESSION['declined'] = 'success';
        header('location: ../../?page=approval');
    }else{
        $_SESSION['declined'] = 'error';
        header('location: ../../?page=approval');
    }
?>