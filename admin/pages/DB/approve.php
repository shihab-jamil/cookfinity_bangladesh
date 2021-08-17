<?php
    require_once('../../../config.php');
    $id = $_GET['id'];
    $uid = $_SESSION['uid'];
    $query = "UPDATE approval SET `status`='Approved',`approved_by_uid`=$uid WHERE id=$id";

    if(mysqli_query($con, $query)){ 
        $_SESSION['approved'] = 'success';
        header('location: ../../?page=approval');
    }else{
        $_SESSION['approved'] = 'error';
        header('location: ../../?page=approval');
    }
?>