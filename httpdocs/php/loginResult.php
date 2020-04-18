<?php 
session_start();
?>
<div>                
    <!-- validation pending spinners -->
    <div class=" spinner-grow text-muted"></div>
    <div class=" spinner-grow text-primary"></div>
    <div class=" spinner-grow text-success"></div>
</div>
<?php        
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
    function email_test_input($email){
        $email = trim($email);
        $email = stripslashes($email);
        $email = htmlspecialchars($email);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }else{
            return $email = "";
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login_username = test_input($_POST["login_username"], "/^[A-Z][a-z0-9]{2,}$/");
        $login_password = test_input($_POST["login_password"], "/^[a-zA-Z0-9]{5,15}$/");
        
        // database connection:
        require "database_connection.php";

        if(!$database_connection){
           die('connection failed:'.mysqli_connect_error());
        }else{
            // an attempt to login:
            if(!empty($login_username) && !empty($login_password)){
                $login_query = "SELECT * FROM users WHERE username = '$login_username'";
                $username_check = mysqli_query($database_connection, $login_query);
                if (mysqli_num_rows($username_check) > 0){
                    $user_row = mysqli_fetch_assoc($username_check);
                    if (password_verify($login_password, $user_row['pass'])){
                        if($user_row['verified'] == 'YES'){
                            if($user_row['disabled'] == 'YES'){
                                echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                                echo '<p class="signing-message text-danger px-4 displayNone">کاربری شما غیر فعال شده است. در صورتی که این امر اشتباهی صورت گرفته است، لطفا با گروه پشتیبانی تماس بگیرید.</p>';    
                            }else{
                            // getting the user info for the SESSION:
                                $_SESSION['user_ID'] = $user_row['ID'];
                                $_SESSION['user_username'] = $user_row['username'];
                                $_SESSION['user_email'] = $user_row['email'];
                                $_SESSION['user_mobile_phone'] = $user_row['mobile_phone'];
                                $_SESSION['login_start_time'] = time();
                                // expiration time is set to 30 minutes: 30 *60
                                $_SESSION['login_expiration_time'] = $_SESSION['login_start_time'] + (30*60);
        
                                echo '
                                <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
                                <p class="signing-message successful text-success px-4 displayNone"> ' . $login_username . ' عزیز خوش آمدید . </p>  
                                ';        
                            }
                        }else{
                            echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                            echo '<p class="signing-message text-danger px-4 displayNone">شما کاربریتان را هنوز تایید نکرده اید. لطفا ایمیلتان را چک کنید</p>';
                        }
                    }else{
                        echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="signing-message text-danger px-4 displayNone">رمز عبور اشتباه است. اگر رمز عبور خود را فراموش کرده اید از لینک:' . '<a href="#">رمز عبور خود را فراموش کرده ام</a>' . ' ، استفاده فرمایید.</p>';

                    }
                }else{
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">کاربری با این مشخصات یافت نشد. اگر قبلا ثبت نام نکرده اید لطفا از منوی ثبت نام استفاده فرمایید.</p>';

                }
            }else{
                echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="text-center text-danger signing-message pb-2">مشکلی پیش آمد.</p>';    
            }
        }
    }    
?>