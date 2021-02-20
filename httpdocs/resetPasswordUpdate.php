<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

session_start();
// if the page is rendered after the click event of the user on the email link received:
    function retrieve_data_from_the_mailed_link(){
        if(!empty($_GET['token']) && !empty($_GET['email'])){
            $email = $_GET['email'];
            $token = $_GET['token'];
            $_SESSION['email'] = $email;
    
            require "database_connection.php";
            if(!$database_connection){
                die('connection failed:'.mysqli_connect_error());
            }else{
                $find_email_query = " SELECT * FROM users WHERE email = '$email' ";
                $email_query_result = mysqli_query($database_connection, $find_email_query);
                $entry = mysqli_fetch_assoc($email_query_result);
                $_SESSION['username'] = $entry['username'];
                if(mysqli_num_rows($email_query_result) > 0){
                    if($entry['verified'] == 'YES'){
                        if(!empty($entry['token'])){
                            if($entry['token'] == $token){
                                $now = strtotime('now');
                                if($entry['token_expiry_time'] > $now){
                                    echo    '
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="first_password" name="first_password" placeholder="رمز عبور جدید" oninput="validate(/^[a-zA-Z0-9]{5,15}$/, this)">
                                                <p class="text-center displayNone">رمز باید حداقل 8 کاراکتر و شامل اعداد و حروف بزرگ یا کوچک باشد.</p>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="second_password" name="second_password" placeholder="تکرار رمز عبور" oninput="validate(/^[a-zA-Z0-9]{5,15}$/, this)">
                                                <p class="text-center displayNone">رمز باید حداقل 8 کاراکتر و شامل اعداد و حروف بزرگ یا کوچک باشد.</p>
                                            </div>
                                            <div class="form-group">
                                                <input class="btn btn-primary form-control" type="submit" name="submit" id="submit" value="تغییر رمز عبور">
                                            </div>
                                            <div class="form-group">
                                                <a href="login.php">ورود/ثبت نام</a>
                                            </div>
                                            ';
                                }else{
                                    echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                                    echo '<p class="text-center text-danger pb-2">لینک مورد نظر منقضی شده است.</p>';    
                                    // exit();
                                }
                            }else{
                                echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                                echo '<p class="text-center text-danger pb-2">اطلاعات با یکدیگر تطابق ندارند.</p>';   
                                // exit();     
                            }
                        }else{
                            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                            echo '<p class="text-center text-danger pb-2">این لینک قبلا استفاده شده است.</p>';       
                            // exit(); 
                        }
                    }else{
                        echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="text-center text-danger pb-2">ایمیل وارد شده هنوز فعالسازی نشده است.</p>';    
                        // exit();
                    }
    
                }else{
                    echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger pb-2">ایمیلی با اطلاعات فوق یافت نشد.</p>';   
                    // exit();     
                }
            }
        }
    }
function password_reset(){
    $first_password = $_POST['first_password'];
    $second_password = $_POST['second_password'];
    $email = $_SESSION['email'];
        if($first_password === $second_password){

            require "database_connection.php";
            if(!$database_connection){
                die('connection failed:'.mysqli_connect_error());
            }else{
                // updating password in the database:

                    $password = password_hash($first_password, PASSWORD_BCRYPT);
                    $change_password_query = "UPDATE users SET pass = '$password', token = null, token_expiry_time = null WHERE email='$email' AND verified='YES' ";
                    // $change_password_query = "INSERT INTO users (username, pass, email, mobile_phone) VALUES ('Alibaba', 'joli123', 'example@email.com', '09121234567')";
                    $change_password_query_result = mysqli_query($database_connection, $change_password_query);
                    echo '<p class="text-success pt-4 pb-1"><span class=" fa fa-check" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message successful text-success px-4"> رمز عبور با موفقیت تغییر یافت.</p>';    
                    
                    // sending email:
                    require 'PHPMailer/src/Exception.php';
                    require 'PHPMailer/src/PHPMailer.php';
                    require 'PHPMailer/src/SMTP.php';
                    $to = $email;
                    $subject = " تغییر رمز عبور";
                    $heading = "<p style='direction:rtl;text-align:right'>" . $_SESSION['username'] . " عزیز </p>";
                    $body1 = "<p style='direction:rtl;text-align:right'>اطلاعات حساب کاربری شما در سایت شرکت پیشگامان پودینه آتا به شرح زیر تغییر کرد:</p>";
                    $username_text = "<p style='direction:rtl;text-align:right'>نام کاربری:" . $_SESSION['username'] . "</p>";
                    $password_text = "<p style='direction:rtl;text-align:right'>رمز عبور: $first_password</p>";
                    $body2 = "<p style='direction:rtl;text-align:right'>در صورتی که این اقدام توسط شما صورت نگرفته لطفا از طریق لینک  زیر در اسرع وقت جهت تغییر رمز عبور خود اقدام فرمایید:</p>";
                    $forgot_page_link = "<p><a href ='https://diorhome.ir/forgot.php'>https://diorhome.ir/forgot.php</a></p>";
                    $footer1 = "<p style='direction:rtl;text-align:left'>با تشکر</p>";
                    $footer2 = "<p style='direction:rtl;text-align:left'>گروه پشتیبانی پیشگامان پودينه آتا</p>";
                    $message = $heading . $body1 . $username_text . $password_text . $body2 . $forgot_page_link . $footer1 . $footer2;

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
        }else{
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2">رمز عبور جدید و تکرار آن باهمدیگر مطابقت ندارند.</p>';    
            // exit();
        }
}
?>