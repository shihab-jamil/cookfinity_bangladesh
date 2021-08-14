<?php
    session_start();
    include_once('dbconfig.php');

    $db_host=constant('DB_HOST');
    $db_user=constant('DB_USERNAME');
    $db_password=constant('DB_PASSWORD');
    $db_name=constant('DB_NAME');

    $con = mysqli_connect($db_host, $db_user, $db_password,$db_name);
    mysqli_set_charset($con, "utf8");



?>