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

    function show_sweet_alert($session_name, $msg_success, $msg_error, $msg_warning, $msg_info, $msg_qstn){
        if(isset($_SESSION[$session_name]) && $_SESSION[$session_name] == 'success'){
            unset($_SESSION[$session_name]);
            echo "<script>var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'success',
                    title:'".$msg_success."'
                    })</script>";

        }else if(isset($_SESSION[$session_name]) && $_SESSION[$session_name] == 'error'){
            unset($_SESSION[$session_name]);
            echo "<script>var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'error',
                    title:'".$msg_error."'
                    })</script>";
        }else if(isset($_SESSION[$session_name]) && $_SESSION[$session_name] == 'warning'){
            unset($_SESSION[$session_name]);
            echo "<script>var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'warning',
                    title:'".$msg_warning."'
                    })</script>";
        }else if(isset($_SESSION[$session_name]) && $_SESSION[$session_name] == 'info'){
            unset($_SESSION[$session_name]);
            echo "<script>var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'info',
                    title:'".$msg_info."'
                    })</script>";
        }else if(isset($_SESSION[$session_name]) && $_SESSION[$session_name] == 'qstn'){
            unset($_SESSION[$session_name]);
            echo "<script>var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                    })

                    Toast.fire({
                    icon: 'question',
                    title:'".$msg_qstn."'
                    })</script>";
        }
    }

    function get_approval_list(){
        $con = $GLOBALS['con'];
        $query = "SELECT app.id, CONCAT(us.first_name, ' ', us.last_name) AS 'name', rol.role_name, us.email, us.phone_number, app.status, app.approved_by_uid FROM users AS us JOIN approval AS app ON us.id = app.uid JOIN roles AS rol ON us.platform_role_id = rol.id WHERE rol.role_name = 'Home Cook' ORDER BY app.status DESC";
        return mysqli_query($con, $query);
    }
    function insert_order($req_id){
        $details = get_single_table_record('requests', 'id', $req_id);

       $ordered_by_uid = $details['requested_by_uid'];
       $meal_id = 12;
       $quantity = $details['quantity'];
       $address = $details['address'];
       $delivery_date = $details['delivery_date'];
       $delivery_time = $details['delivery_time'];
       $price = 500;


       $query = "INSERT INTO `orders`(`ordered_by_uid`, `meal_id`, `quantity`, `price`, `status`, `address`, `delivery_date`, `delivery_time`) VALUES ($ordered_by_uid, $meal_id, $quantity, $price, 'confirmed', '$address', '$delivery_date', '$delivery_time')";
       // echo $query;
       mysqli_query($con, $query);

       $query1 = "DELETE FROM response WHERE request_id=$req_id";
       mysqli_query($con, $query1);

       $query2 = "DELETE FROM requests WHERE id =$req_id";
       mysqli_query($con, $query2);
       
   }

   function get_all_meal_details_per_user($uid){
        $con = $GLOBALS['con'];
        $query = "SELECT ml.*,cat.title AS 'category_title' FROM meal AS ml JOIN category AS cat ON ml.category_id=cat.id WHERE ml.uid=$uid";
        return mysqli_query($con, $query);
   }

   function time_conversion($time){
    $time = explode(":",$time);
    $time[0] = intval($time[0]);
    $str = '';
    if($time[0] > 12){
        $time[0] = $time[0] - 12;
        $str .= 'PM';
    }else{
        $str .= 'AM';
    }

    return $time[0].':'.$time[1].' '.$str;
   }

    function count_badges_per_user($criteria, $uid){
        $con = $GLOBALS['con'];
        switch ($criteria) {
            case 'total_meal':
                $query = "SELECT COUNT(*) FROM meal WHERE `uid`=$uid";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];

                break;
            case 'ongoing':
                $query = "SELECT COUNT(*) FROM meal WHERE `uid`=$uid AND CURDATE() <= expire_date";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'expired':
                $query = "SELECT COUNT(*) FROM meal WHERE `uid`=$uid AND CURDATE() > expire_date";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'total_order':
                $query = "SELECT COUNT(*) FROM orders AS ord  JOIN meal AS ml ON ord.meal_id=ml.id WHERE ml.uid=$uid";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'active_order':
                $query = "SELECT COUNT(*) FROM orders AS ord  JOIN meal AS ml ON ord.meal_id=ml.id WHERE ml.uid=$uid AND ord.status='Active'";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'pending_order':
                $query = "SELECT COUNT(*) FROM orders AS ord  JOIN meal AS ml ON ord.meal_id=ml.id WHERE ml.uid=$uid AND ord.status='Pending'";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'completed_order':
                $query = "SELECT COUNT(*) FROM orders AS ord  JOIN meal AS ml ON ord.meal_id=ml.id WHERE ml.uid=$uid AND ord.status='Completed'";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'all_responses':
                $query = "SELECT COUNT(*) FROM response WHERE responsed_by_uid=$uid";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'responses_review':
                $query = "SELECT COUNT(*) FROM response WHERE responsed_by_uid=$uid AND `status`='reviewing'";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            case 'responses_accepted':
                $query = "SELECT COUNT(*) FROM response WHERE responsed_by_uid=$uid AND `status`='ordered'";
                $result = mysqli_fetch_array(mysqli_query($con, $query));
                return $result['COUNT(*)'];
                break;

            default:
                return 'N/A';
                break;
        }
    }

    function get_users_per_role($role_id){
        $con = $GLOBALS['con'];
        $query = "SELECT * FROM users WHERE platform_role_id=$role_id";
        return mysqli_query($con, $query);
    }

     function get_order_table($criteria,$uid){
        $con = $GLOBALS['con'];
        switch ($criteria) {
            case 'all':
                $query = "SELECT ord.*,CONCAT(us.first_name,' ',us.last_name) AS 'name', ml.title AS 'meal_title' , us.phone_number FROM orders AS ord JOIN users AS us ON ord.ordered_by_uid=us.id JOIN meal AS ml ON ord.meal_id=ml.id WHERE ml.uid=$uid";
                return mysqli_query($con, $query);
                break;
            case 'active':
                $query = "SELECT ord.*,CONCAT(us.first_name,' ',us.last_name) AS 'name', ml.title AS 'meal_title' , us.phone_number FROM orders AS ord JOIN users AS us ON ord.ordered_by_uid=us.id JOIN meal AS ml ON ord.meal_id=ml.id WHERE ord.status='Active' AND  ml.uid=$uid";
                return mysqli_query($con, $query);
                break;
                
            case 'completed':
                $query = "SELECT ord.*,CONCAT(us.first_name,' ',us.last_name) AS 'name', ml.title AS 'meal_title' , us.phone_number FROM orders AS ord JOIN users AS us ON ord.ordered_by_uid=us.id JOIN meal AS ml ON ord.meal_id=ml.id WHERE ord.status='completed' AND  ml.uid=$uid";
                return mysqli_query($con, $query);
                break;

            case 'pending':
                $query = "SELECT ord.*,CONCAT(us.first_name,' ',us.last_name) AS 'name', ml.title AS 'meal_title' , us.phone_number FROM orders AS ord JOIN users AS us ON ord.ordered_by_uid=us.id JOIN meal AS ml ON ord.meal_id=ml.id WHERE ord.status='pending' AND  ml.uid=$uid";
                return mysqli_query($con, $query);
                break;

            default:
                # code...
                break;
        }
    }

    function get_request_details(){
        $con = $GLOBALS['con'];
        $query = "SELECT us.phone_number, CONCAT(us.first_name,' ',us.last_name) AS 'name', rq.* FROM requests AS rq JOIN users AS us ON rq.requested_by_uid=us.id ORDER BY rq.status ASC";
        return mysqli_query($con, $query);
    }

    function get_response_details(){
        $con = $GLOBALS['con'];
        $query = "SELECT CONCAT(us.first_name,' ',us.last_name) AS 'name', rq.meal_title, rs.status, rs.price FROM requests AS rq JOIN response AS rs ON rs.request_id=rq.id JOIN users AS us ON rq.requested_by_uid=us.id WHERE rq.status='Opened' ORDER BY rs.status DESC";
        return mysqli_query($con, $query);
    }

    
    function get_response_details_per_user($uid){
        $con = $GLOBALS['con'];
        $query = "SELECT rs.request_id, CONCAT(us.first_name,' ',us.last_name) AS 'name', rq.meal_title, rs.status, rs.price FROM requests AS rq JOIN response AS rs ON rs.request_id=rq.id JOIN users AS us ON rs.responsed_by_uid=us.id WHERE rs.status='reviewing' AND rq.requested_by_uid=$uid ORDER BY rs.status DESC";
        return mysqli_query($con, $query);
    }


?>