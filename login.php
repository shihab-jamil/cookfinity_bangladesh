<?php
    require_once('./config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
    <?php include './header.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 offset-3">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control"  name="password">
                    </div><br>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>    
    </div>  
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        
        $email = $_POST['email'];
        $password = md5(constant('SALT').$_POST['password'].constant('SALT'));

        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        //echo $query;
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            $result = mysqli_query($con, $query);
            
            $user_details = mysqli_fetch_array($result);
            $role = $user_details['platform_role_id'];
            $uid = $user_details['id'];

            $_SESSION['email'] = $email;
            $_SESSION['uid'] = $user_details['id'];



            if($role == 1 || $role == 2){
                header('location: ./admin/');

            }else if($role == 3){
                
                $account_status = "SELECT * FROM approval WHERE uid=$uid AND status='Approved'";
                $status = mysqli_query($con, $account_status);

                if(mysqli_num_rows($status) > 0){
                    header('location: homecook/');
                }else{
                    unset($_SESSION['email']);
                    unset($_SESSION['uid']);
                    echo "Wait for admin approval ";
                }

                
            }else if($role == 4){
                header('location: supplier/');
            }else if($role == 5){
                header('location: ./index.php');
            }
        }else{
            echo "Wrong Credentials";
        }
    }

?>