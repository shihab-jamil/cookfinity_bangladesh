<?php
    session_start();
    include_once('dbconfig.php');

    $db_host=constant('DB_HOST');
    $db_user=constant('DB_USERNAME');
    $db_password=constant('DB_PASSWORD');
    $db_name=constant('DB_NAME');

    $con = mysqli_connect($db_host, $db_user, $db_password,$db_name);
    mysqli_set_charset($con, "utf8");
    
    function get_all_records_from_table($table_name){
        $con = $GLOBALS['con'];
        $query = "SELECT * FROM $table_name";
        return mysqli_query($con, $query);
    }

    function get_user_name_by_id($uid){
        $con = $GLOBALS['con'];
        $query = "SELECT * FROM users WHERE id='$uid'";
        $result = mysqli_fetch_array(mysqli_query($con, $query));
        return $result['first_name'].' '.$result['last_name'];
    }

    function get_all_meal_details(){
        $con = $GLOBALS['con'];
        $query = "SELECT ml.*, us.first_name, us.last_name, us.image AS 'user_image' FROM meal AS ml JOIN users AS us ON ml.uid = us.id";
        return mysqli_query($con, $query);
    }



?>