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
                    $token = "ابسدجچهخدذرزژسش0123456789";
                    $token = str_shuffle($token);
                    $token = substr($token, 0, 10);
                    // the token expiration time is 1 hour:
                    $token_creation_time = strtotime('now');
                    $token_expiry_time = strtotime("+ 1 Hour");
                    
                    $insert_query = "UPDATE users SET token = '$token' , token_expiry_time = '$token_expiry_time' WHERE email = '$email' ";
                    $insert_query_result = mysqli_query($database_connection, $insert_query);
                                        
                    // sending email:
                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';

                    $mail_config = new PHPMailer(true);
                    try{
                        $mail_config->isSMTP();
                        $mail_config->Host = "mail.diorhome.ir";
                        $mail_config->SMTPAuth = true;
                        $mail_config->Username = 'info@diorhome.ir';
                        $mail_config->Password = 'joli1366';
                        $mail_config->addAddress($email);
                        $mail_config->Subject = 'بازیابی گذرواژه';
                        $mail_config->Body = 'this is the body';
                        $mail_config->setFrom('info@diorhome.ir', ' پشتیبانی شرکت پیشگامان پودینه آتا');
                        $mail_config->isHTML(true);
                        $mail_config->send();
                            echo    '<p style="direction:rtl;text-align:right" class="text-center text-success pb-2">لطفا ایمیل خود را چک کنید.</p>';        
                    }catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail_config->ErrorInfo}";
                    }

                    // $selected_result = mysqli_fetch_assoc($select_query_result);
                    // $username = $selected_result['username'];
                    // $reset_password_link = "forgot.php?email=$email&token=$token";
                    // $to = $email;
                    // $subject = "بازیابی گذرواژه";
                    // $message_title = "<p style='direction:rtl;text-align:right'> سلام " . $username . "</p>";
                    // $message_body = wordwrap("<p style='direction:rtl;text-align:right'>اخیرا در سایت پیشگامان پودینه آتا درخواستی مبنی بر بازیابی رمز عبور شما شده است. در صورتی که شما چنین درخواستی نکرده اید لازم نیست اقدامی بکنید. در غیر این صورت لطفا روی لینک زیر کلیک فرمایید:</p>", 70);
                    // $message_link = '<a href"' .$reset_password_link . '">' . $reset_password_link . '</a>';
                    // $message_closing = "<p style='direction:rtl;text-align:right'>با احترام</p><p>گروه پشتیبانی پیشگامان پودینه آتا</p>";
                    // $message = $message_title . $message_body . $message_link . $message_closing;

                    // $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
                    // $headers .= "FROM: diorhome support team <info@diorhome.ir> \r\n";

                    // ini_set("SMTP", "mail.diorhome.ir");
                    // ini_set("smtp_port", "25");
                    // ini_set("auth_username", "info@diorhome.ir");
                    // ini_set("auth_password", "joli1366");
                    // ini_set("sendmail_from", "info@diorhome.ir");

                    // $email_sent = mail($email, $subject, $message, $headers);
                    // if($email_sent){
                    //     echo    '<p style="direction:rtl;text-align:right" class="text-success text-center pt-4 pb-1"><span class=" fa fa-check" aria-hidden="true"></span></p>';
                    //     echo    '<p style="direction:rtl;text-align:right" class="text-center text-success pb-2">لطفا ایمیل خود را چک کنید.</p>';    
                    // }else{
                    //     echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    //     echo '<p class="text-center text-danger pb-2">مشکلی پیش آمد و ایمیل ارسال نشد.</p>';    
                    // }
                }else{
                    echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger pb-2">ایمیلی که وارد کردید در سامانه یافت نشد.</p>';
                }
            }
        }
    }
}
?>