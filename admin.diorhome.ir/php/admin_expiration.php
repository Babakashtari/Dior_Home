<?php

function kill_session(){
    session_destroy();
    header('location:index.php');
}
    function expiration_test(){
        if(!empty($_SESSION['username'])){
            $now = time();
            if($now > $_SESSION['login_expiration_time']){
                kill_session();
            }
        }else{
            kill_session();
        }
    }

?>