<?php

function end_session(){
    session_destroy();
    header('location:login.php');
}

    function expiration_check(){
        if(!empty($_SESSION['user_username'])){
            $now = time();
            if($now > $_SESSION['login_expiration_time']){
                end_session();
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