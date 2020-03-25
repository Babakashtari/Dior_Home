<?php
session_start();

function test_input($data, $regex) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if (preg_match($regex,$data)) {
        return $data;
    }else{
        return $data = "";
    }
}
if(isset($_POST['submit'])){
    if(!empty($_POST['username'] && !empty($_POST['password']))){
        $username = test_input($_POST['username'], "/^[A-Z][a-z0-9]{2,}$/");
        $password = test_input($_POST['password'], "/^[a-zA-Z0-9]{5,15}$/");
        if(empty($username)){
            echo '<p class="iranSans signing-message text-center text-danger px-4 ">نام کاربری درست وارد نشده است</p>';
        }
        if(empty($password)){
            echo '<p class="iranSans signing-message text-center text-danger px-4 ">رمز عبور درست وارد نشده است</p>';
        }
        if(!empty($username) && !empty($password)){
            require "../httpdocs/php/database_connection.php";
            if(!$database_connection){
                die('connection failed:'.mysqli_connect_error());
            }else{  
                $query = "SELECT * FROM users WHERE username = '$username' ";
                $query_result = mysqli_query($database_connection, $query);
                $query_result_array = mysqli_fetch_assoc($query_result);
                if(mysqli_num_rows($query_result)>0){
                    if($query_result_array['verified'] == "YES"){
                        if($query_result_array['administrator']=="YES"){
                            if(password_verify($password, $query_result_array['pass'])){
                                $_SESSION['username'] = $username;
                                $_SESSION['login_start_time'] = time();
                                // expiration time is set to 30 minutes: 30 *60
                                $_SESSION['login_expiration_time'] = $_SESSION['login_start_time'] + (30*60);
                                header("location:signed_in_admin.php");
                            }else{
                                echo '<p class="iranSans signing-message text-center text-danger px-4 ">رمز عبور وارد شده اشتباه است</p>';
                            }    
                        }else{
                            echo '<p class="iranSans signing-message text-center text-danger px-4 ">شما کاربر ادمین نیستید</p>'; 
                        }    
                    }else{
                        echo '<p class="iranSans signing-message text-center text-danger px-4 ">کاربری شما هنوز تایید نشده است</p>';
                    }
                }else{

                    echo '<p class="iranSans signing-message text-center text-danger px-4 ">کاربری با این مشخصات یافت نشد</p>';
                }
            }
        }
    }else{
        if(empty($_POST['username'])){
            echo '<p class="iranSans signing-message text-center text-danger px-4 ">نام کاربری نمی تواند خالی بماند</p>';
        }
        if(empty($_POST['password'])){
            echo '<p class="iranSans signing-message text-danger text-center px-4 ">رمز عبور نمی تواند خالی بماند</p>';
        }
    }
}
?>