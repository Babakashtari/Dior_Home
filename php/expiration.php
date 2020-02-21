<?php
    function expiration_check(){
        if(isset($_SESSION['user_username'])){
            $now = time();
            if($now > $_SESSION['login_expiration_time']){
                session_destroy();
                header('location:login.php');
            }
        }else{
            $full_url = $_SERVER['PHP_SELF'];
            $url_arr = explode("/", $full_url);
            $url = end($url_arr);
            $_SESSION['location'] = $url;        
            header('location:login.php');
        }
    }

?>