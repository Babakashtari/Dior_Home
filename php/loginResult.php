<?php session_start(); ?>

<div>                
    <!-- validation pending spinners -->
    <div class=" spinner-grow text-muted"></div>
    <div class=" spinner-grow text-primary"></div>
    <div class=" spinner-grow text-success"></div>
</div>

<?php
function login_page_validation(){
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
        $signup_username = test_input($_POST["signup_username"], "/^[A-Z][a-z0-9]{4,10}$/");
        $signup_password = test_input($_POST["signup_password"], "/^[a-zA-Z0-9]{5,15}$/");
        $signup_email = email_test_input($_POST["signup_email"]);
        $signup_mobile_phone = test_input($_POST['signup_mobile_phone'], "/^09\d{9}$/");
    
        // database connection:
        require "database_connection.php";
        // connect_database();

        // database connection check:
        if(!$database_connection){
           die('connection failed:'.mysqli_connect_error());
        }else{
            // an attempt to login:
            if(!empty($login_username) && !empty($login_password)){
                $login_query = "SELECT * FROM users WHERE username = '$login_username'";
                $username_check = mysqli_query($database_connection, $login_query);
                if (mysqli_num_rows($username_check) === 1){
                    $user_row = mysqli_fetch_assoc($username_check);
                    if (password_verify($login_password, $user_row['pass'])){
                        // getting the user info for the SESSION:
                        $_SESSION['user_ID'] = $user_row['ID'];
                        $_SESSION['user_username'] = $user_row['username'];
                        $_SESSION['user_email'] = $user_row['email'];
                        $_SESSION['user_mobile_phone'] = $user_row['mobile_phone'];
                            
                        echo '
                        <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
                        <p class="signing-message successful text-success px-4 displayNone"> ' . $login_username . ' عزیز خوش آمدید . </p>  
                        ';
                    }else{
                        echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="signing-message text-danger px-4 displayNone">رمز عبور اشتباه است. اگر رمز عبور خود را فراموش کرده اید از لینک:' . '<a href="#">رمز عبور خود را فراموش کرده ام</a>' . ' ، استفاده فرمایید.</p>';
                    }
                }else{
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">کاربری با این مشخصات یافت نشد. اگر قبلا ثبت نام نکرده اید لطفا از منوی ثبت نام استفاده فرمایید.</p>';

                }
            }
            // an attempt to signup:
            elseif(!empty($signup_username) && !empty($signup_password) && !empty($signup_email) && !empty($signup_mobile_phone)){
                // check if the username and email already exists:
                $user_check_query = "SELECT * FROM users WHERE username='$signup_username' OR email='$signup_email' OR mobile_phone='$signup_mobile_phone' LIMIT 1";
                $result = mysqli_query($database_connection, $user_check_query);
                $user = mysqli_fetch_assoc($result);
                // if a user with similar inputs exists:
                if($user){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';

                    if($user['username'] === $signup_username){
                        echo '<p class="signing-message text-danger px-4 displayNone">کاربری قبلا با نام کاربری ' . $signup_username. ' ثبت نام کرده است.</p>';
                    }
                    if ($user['email'] === $signup_email) {
                        echo '<p class="signing-message text-danger px-4 displayNone">کاربری قبلا با ایمیل ' . $signup_email. ' ثبت نام کرده است.</p>';
                    }
                    if($user['mobile_phone'] === $signup_mobile_phone){
                        echo '<p class="signing-message text-danger px-4 displayNone">کاربری قبلا با شماره تلفن  ' . $signup_mobile_phone. ' ثبت نام کرده است.</p>';
                    }
                    // if no user has previously registered with the same input values:
                }else{
                    $password = password_hash($signup_password, PASSWORD_BCRYPT);
                    echo '<p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-success px-4 displayNone">' . $signup_username .  ' عزیز، ثبت نام شما با موفقیت انجام شد. از این پس می توانید با استفاده از منوی ورود، داخل سایت شوید. </p>';
                    $insert_query = "INSERT INTO users (username, pass, email, mobile_phone) VALUES ('$signup_username', '$password', '$signup_email', '$signup_mobile_phone')";
                    mysqli_query($database_connection, $insert_query);
                }
            }
        }
    }    
}
login_page_validation();
?>