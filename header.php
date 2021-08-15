<nav class="navbar navbar-expand-lg navbar-light bg-light pl-4 pr-4">
    <!--tips: to change the nav placement use .fixed-top,.fixed-bottom,.sticky-top-->
    <a class="navbar-brand" href="./index.php">Cookfinity</a>
    <!--<a class="navbar-brand" href="#">
        <img src="..." class="d-inline-block align-top" width="30" height="30" alt="...">My Brand
    </a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./request_meal.php">Request A meal</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="./register_homecook_form.php">Become a Cook</a>
            </li>
            <?php
                include_once('./config.php');
                if(!session_id()){
                    session_start();
                }
                if(isset($_SESSION['email'])){
                    ?>  
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= get_user_name_by_id($_SESSION['uid']) ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./dashboard.php">Dashboard</a>
                                <a class="dropdown-item" href="./logout.php">Logout</a>
                            </div>
                        </li>
                    <?php
                }else{
                    ?>
                        <li class="nav-item ">
                            <a class="nav-link" href="./login.php">Login</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./signup.php">Signup</a>
                        </li>
                    <?php
                }
            ?>
        </ul>
    </div>
</nav>