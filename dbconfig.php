<?php
    //db configuration
    define('DB_HOST', "localhost");
    define('DB_USERNAME', "root");
    define('DB_PASSWORD', "");
    define('DB_NAME', "cookfinity");

    //password hashing
    define('SALT', "You can never crack this password");
    

    //starting of session
    if(!session_id()){
        session_start();
    }
?>