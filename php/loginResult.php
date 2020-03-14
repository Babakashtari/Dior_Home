<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
?>

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
                if (mysqli_num_rows($username_check) > 0){
                    $user_row = mysqli_fetch_assoc($username_check);
                    if (password_verify($login_password, $user_row['pass'])){
                        if($user_row['verified'] == 'YES'){
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
                        }else{
                            echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                            echo '<p class="signing-message text-danger px-4 displayNone">شما کاربریتان را هنوز تایید نکرده اید. لطفا ایمیلتان را چک کنید</p>';
                            exit();    
                        }
                    }else{
                        echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="signing-message text-danger px-4 displayNone">رمز عبور اشتباه است. اگر رمز عبور خود را فراموش کرده اید از لینک:' . '<a href="#">رمز عبور خود را فراموش کرده ام</a>' . ' ، استفاده فرمایید.</p>';
                        exit();
                    }
                }else{
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">کاربری با این مشخصات یافت نشد. اگر قبلا ثبت نام نکرده اید لطفا از منوی ثبت نام استفاده فرمایید.</p>';
                    exit();
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
                    echo '<p class="signing-message text-success px-4 displayNone">' . $signup_username .  '  عزیز ایمیلی برایتان ارسال شد. لطفا ایمیل خود را چک کنید و بر روی لینک مورد نظر کلیک فرمایید تا حساب کاربریتان فعال شود. </p>';
                    $insert_query = "INSERT INTO users (username, pass, email, mobile_phone) VALUES ('$signup_username', '$password', '$signup_email', '$signup_mobile_phone')";
                    mysqli_query($database_connection, $insert_query);

                    // sending a reporting email:
                    require '../PHPMailer/src/Exception.php';
                    require '../PHPMailer/src/PHPMailer.php';
                    require '../PHPMailer/src/SMTP.php';
                    $to = $signup_email;
                    $subject = " ثبت کاربری در پیشگامان پودینه آتا";
                    $heading = "<p style='direction:rtl;text-align:right'>" . $signup_username . " عزیز </p>";
                    $body1 = "<p style='direction:rtl;text-align:right'>به سایت رسمی شرکت پیشگامان پودینه آتا خوش آمدید. اطلاعات کاربری شما به شرح زیر می باشد:</p>";
                    $username_text = "<p style='direction:rtl;text-align:right'>نام کاربری:" . $signup_username . "</p>";
                    $password_text = "<p style='direction:rtl;text-align:right'>رمز عبور: $signup_password </p>";
                    $body2 = "<p style='direction:rtl;text-align:right'>در صورتی که اقدام به ثبت نام توسط شما صورت نگرفته است لازم نیست اقدام خاصی بکنید در غیر این صورت، لطفا از طریق لینک  زیر ثبت نام خود را تکمیل نمایید:</p>";
                    $activation_page_link = "<p><a href ='https://diorhome.ir/emailActivation.php?email=" .$signup_email . "'>https://diorhome.ir/emailActivation.php?email=" .$signup_email . "</a></p>";
                    $body3 = "<p style='direction:rtl;text-align:right'>لازم به ذکر است خدماتی همچون خرید اینترنتی، ثبت سفارش و پیگیری آن تنها از طریق داشتن کاربری در سایت امکان پذیر است</p>";
                    $footer1 = "<p style='direction:rtl;text-align:left'>با تشکر</p>";
                    $footer2 = "<p style='direction:rtl;text-align:left'>گروه پشتیبانی پیشگامان پودينه آتا</p>";
                    $message = $heading . $body1 . $username_text . $password_text . $body2 . $activation_page_link . $body3 . $footer1 . $footer2;

                    $mail_config = new PHPMailer(true);
                    try{
                        $mail_config->CharSet = 'UTF-8';
                        $mail_config->isSMTP();
                        $mail_config->Host = "mail.diorhome.ir";
                        $mail_config->SMTPAuth = true;
                        $mail_config->Username = 'info@diorhome.ir';
                        $mail_config->Password = 'joli1366';
                        $mail_config->addAddress($to);
                        $mail_config->Subject = $subject;
                        $mail_config->Body = $message;
                        $mail_config->setFrom('info@diorhome.ir', ' گروه پشتیبانی پیشگامان پودینه آتا');
                        $mail_config->isHTML(true);
                        $mail_config->send();
                    }catch (Exception $e) {
                        echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="text-center text-danger pb-2">مشکلی پیش آمد و ایمیل ارسال نشد.</p>';    
                        echo "Message could not be sent. Mailer Error: {$mail_config->ErrorInfo}";
                    }   

                }
            }
        }
    }    
}
login_page_validation();
?>