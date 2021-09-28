<?php
    require_once('../../config.php');
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = $id";
    $query_balance_delete = "DELETE FROM `balance` WHERE `user_id`=$id";

    if(mysqli_query($con, $query) && mysqli_query($con, $query_balance_delete)){
        $_SESSION['delete_user'] = 'success';
        header('location: ../?page=admin_portal');
    }else{
        $_SESSION['delete_user'] = 'error';
        header('location: ../?page=admin_portal');
    }
?>