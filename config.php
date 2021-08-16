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

    function get_max_id_for_add($table_name){
        $con = $GLOBALS['con'];
        $query = "SELECT MAX(id) FROM $table_name";
        $id = mysqli_fetch_array(mysqli_query($con, $query));
        $id = $id['MAX(id)'];
        $id = intval($id) + 1;
        return $id;
    }

    function count_badges($criteria){
        $con = $GLOBALS['con'];
        switch ($criteria) {
            case 'consumer':
                $query = "SELECT COUNT(*) FROM users AS us JOIN roles AS rol ON us.platform_role_id=rol.id WHERE rol.role_name='Consumer'";
                break;
            
            case 'homecook':
                $query = "SELECT COUNT(*) FROM users AS us JOIN roles AS rol ON us.platform_role_id=rol.id WHERE rol.role_name='Home Cook'";
                break;
            
            case 'supplier':
                $query = "SELECT COUNT(*) FROM users AS us JOIN roles AS rol ON us.platform_role_id=rol.id WHERE rol.role_name='Supplier'";
                break;
            
            case 'admin':
                $query = "SELECT COUNT(*) FROM users AS us JOIN roles AS rol ON us.platform_role_id=rol.id WHERE rol.role_name='Admin' OR rol.role_name='Super Admin'";
                break;
            
            case 'pending':
                $query = "SELECT COUNT(*) FROM users AS us JOIN approval AS app ON us.id = app.uid JOIN roles AS rol ON us.platform_role_id = rol.id WHERE app.status = 'Pending' AND rol.role_name = 'Home Cook'";
                break;
            
            case 'approved':
                $query = "SELECT COUNT(*) FROM users AS us JOIN approval AS app ON us.id = app.uid JOIN roles AS rol ON us.platform_role_id = rol.id WHERE app.status = 'Approved' AND rol.role_name = 'Home Cook'";
                break;
            
            case 'all_requests':
                $query = "SELECT COUNT(*) FROM requests ";
                break;
            
            case 'meals':
                $query = "SELECT COUNT(*) FROM meal ";
                break;
            
            case 'active_requests':
                $query = "SELECT COUNT(*) FROM requests WHERE `status`= 'opened'";
                break;
            
            case 'closed_requests':
                $query = "SELECT COUNT(*) FROM requests WHERE `status`= 'closed'";
                break;
            
            default:
                $query = "SELECT COUNT(*) FROM $criteria";
                break;
        }

        $result = mysqli_fetch_array(mysqli_query($con, $query));
        return $result['COUNT(*)'];
        
    }

    function get_single_table_record($table_name, $column_name, $value){
        $con = $GLOBALS['con'];
        $query = "SELECT * FROM $table_name WHERE $column_name='$value'";
        return mysqli_fetch_array(mysqli_query($con, $query));
        
    }

?>