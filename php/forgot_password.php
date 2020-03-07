<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['submit'])){
    if(empty($_POST['email_address'])){
        echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
        echo '<p class="text-center text-danger pb-2">ایمیلی جهت بازیابی گذرواژه وارد نشده است.</p>';
    }else{
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
        $email = email_test_input($_POST['email_address']);
        $email = test_input($_POST['email_address'], '/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/');
        if(empty($email)){
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2">آدرس ایمیل به درستی وارد نشده است.</p>';
        }else{
            require "database_connection.php";
            if(!$database_connection){
                die('connection failed:'.mysqli_connect_error());
            }else{
                $select_query = "SELECT * from users WHERE email = '$email' ";
                $select_query_result = mysqli_query($database_connection, $select_query);
                $number_of_selected_results = mysqli_num_rows($select_query_result);
                if($number_of_selected_results > 0){
                    // the token:
                    $token = "0123456789abcdefghijklmnopqrstuvwxyz";
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 10);
                    // the token expiration time is 1 hour:
                    $token_creation_time = strtotime('now');
                    $token_expiry_time = strtotime("+ 1 Hour");
                    
                    $insert_query = "UPDATE users SET token = '$token' , token_expiry_time = '$token_expiry_time' WHERE email = '$email' ";
                    $insert_query_result = mysqli_query($database_connection, $insert_query);
                                        
                    $selected_result = mysqli_fetch_assoc($select_query_result);
                    $username = $selected_result['username'];
                    $reset_password_link = "forgot.php?email=$email&token=$token";
                    $to = $email;
                    $subject = "بازیابی رمز عبور";
                    $message_title = "<p style='direction:rtl;text-align:right'>" . $username . " عزیز</p>";
                    $message_body = wordwrap("<p style='direction:rtl;text-align:right'>درخواستی مبنی بر بازیابی رمز عبور شما در سایت پیشگامان پودینه آتا ارائه  شده است. در صورتی که شما چنین درخواستی نکرده اید لازم نیست اقدام خاصی بکنید. در غیر این صورت لطفا روی لینک زیر کلیک فرمایید تا به صفحه بازیابی رمز عبور هدایت شوید:</p>", 70);

                    $message_link = '<a href"' .$reset_password_link . '">' . $reset_password_link . '</a>';
                    $message_closing = "<p style='direction:rtl;text-align:left'>با احترام</p><p style='direction:rtl;text-align:left'>گروه پشتیبانی پیشگامان پودینه آتا</p><p style='direction:rtl;text-align:left'>تلفن: 55615148  - 55983072  - 55637991 </p><p style='direction:rtl;text-align:left'>دفتر تهران: تهران، بازار بزرگ، سرای آزادی، طبقه اول پلاک 48</p>";
                    $message = $message_title . $message_body . $message_link . $message_closing;

                    // sending email:
                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';

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
                            echo    '<p class="text-success text-center pt-4 pb-1"><span class=" fa fa-check" aria-hidden="true"></span></p>';
                            echo    '<p style="direction:rtl;text-align:right" class="text-center text-success pb-2">لطفا ایمیل خود را چک کنید.</p>';        
                    }catch (Exception $e) {
                        echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="text-center text-danger pb-2">مشکلی پیش آمد و ایمیل ارسال نشد.</p>';    
                        echo "Message could not be sent. Mailer Error: {$mail_config->ErrorInfo}";
                    }
                }else{
                    echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger pb-2">ایمیلی که وارد کردید در سامانه یافت نشد.</p>';
                }
            }
        }
    }
}
?>