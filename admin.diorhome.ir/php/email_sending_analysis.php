<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

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
    function purify($input){
        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }
    // وقتی ادمین بر روی ارسال گروهی ایمیل یا خبرنامه به مخاطبین انتخاب شده کلیک کند:
    function create_fields(){
        if(isset($_POST['newsletter_to_all']) || isset($_POST['email_to_all'])){
            if(isset($_POST['newsletter_to_all'])){
                $subject = "diorhome.ir - خبرنامه";
            }
            $number_of_recipients = $_POST['number_of_recipients'];
            echo  "<label for='recipients0' class='iranSans col-3 col-md-2 text-primary m-0'>به:</label>";
            echo "<input type='email' class='form-control iranSans col-9 col-md-10 ' name='recipients0' id='recipients0' placeholder='ashtaribabak@rocketmail.com' value='"; if(isset($_POST["recipients0"])){echo htmlentities($_POST["recipients0"]);}else{echo $_POST['emails0'];}  echo "' oninput='validate(/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/, this)'>";
            $emails_string = "";
            if($number_of_recipients>1){
                for($index = 1 ; $index<$number_of_recipients; $index++){
                    if($index == 1){
                        $emails_string .= $_POST["emails$index"];
                    }else{
                        $emails_string .= ', ' . $_POST["emails$index"];
                    }
                }
                echo  "<label for='cc_recipients' class='iranSans col-3 col-md-2 text-primary m-0'>CC:</label>";
                echo "<input type='text' class='form-control iranSans col-9 col-md-10 ' name='cc_recipients' id='cc_recipients' value='"; if(isset($_POST['cc_recipients'])){echo htmlentities($_POST['cc_recipients']);}else{echo $emails_string;} echo "' >";
            }
            // اگر کاربر ادمین بر روی ایمیل یک مخاطب کلیک کند:
        }else{
            if(isset($_GET['recipient']) && !empty($_GET['recipient'])){
                $recipient = email_test_input($_GET['recipient']);
            }
            echo '<label for="recipient" class="iranSans col-3 col-md-2 text-primary m-0">به:</label>';
            echo "<input type='email' class='form-control iranSans col-9 col-md-10 ' name='recipient' id='recipient' placeholder='ashtaribabak@rocketmail.com' oninput='validate(/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/, this)' value='"; if(isset($_POST['recipient'])){echo htmlentities($_POST['recipient']);}elseif(isset($recipient) && !empty($recipient)){echo $recipient;} echo "'>";
        }
    }
    // وقتی کاربر ادمین دکمه ارسال ایمیل را کلیک کند:
function mailing_report(){
    if(isset($_POST['send_mail'])){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        if(empty($_POST['sender'])){
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2 iranSans">هیچ فرستنده ای وارد نشده است.</p>';    
        }else{
            $from = email_test_input($_POST['sender']);
        }
        // اگر تنها یک مخاطب برای مقصد ایمیل داشته باشیم:
        if(isset($_POST['recipient']) && !empty($_POST['recipient'])){
            $to = email_test_input($_POST['recipient']);
        }else{
            // اگر چندین مخاطب برای ایمیل داشته باشیم:
            if(isset($_POST['recipients0']) && !empty($_POST['recipients0'])){
                $to = email_test_input($_POST['recipients0']);
                if(isset($_POST['cc_recipients']) && !empty($_POST['cc_recipients'])){
                    // تمامی ایمیل های سی سی در اینجا می آیند:
                    $cc = purify($_POST['cc_recipients']);
                    $_SESSION['cc'] = $cc;
                    $array_of_cc_mails = explode(',', $cc);
                }
            }
        }

        if(empty($from)){
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2 iranSans">فرستنده درست وارد نشده است.</p>';    
        }else{
            $_SESSION['from'] = $from;
        }
        if(empty($to)){
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2 iranSans"> گیرنده (درست) وارد نشده است.</p>';    
        }else{
            $_SESSION['to'] = $to;

        }
        if(empty($_POST['topic'])){
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2 iranSans">موضوع نامه خالی مانده است.</p>';    
        }else{
            $subject = purify($_POST['topic']);

            $_SESSION['subject'] = $subject;

        }
        if(empty($_POST['message_body'])){
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2 iranSans">متن نامه خالی مانده است.</p>';    
        }else{
            $message_body = purify($_POST['message_body']);
            $_SESSION['message_body'] = $message_body;
        }
        $message_image =    '<div style="text-align:center;"><img src="https://diorhome.ir/images/Dior_logo.jpg" style="border-radius:50%;width:80px;height:auto;margin-left:auto;" /></div>';
        $header =           "<p style='direction:rtl;text-align:right;'> کاربر گرامی، </p>";
        $main_message =     '<p style="direction:rtl;text-align:right">' . $message_body . '</p>';
        $footer1 =          "<p style='direction:rtl;text-align:left;'>گروه پشتیبانی پیشگامان پودينه آتا</p>";
        $footer2 =          "<p style='direction:rtl;text-align:left;'>تهران: بازار بزرگ، سرای آزادی، طبقه اول پلاک 48</p>";
        $footer3 =          "<p style='direction:rtl;text-align:left;'>اردبیل: ميدان ايثار، شهرك صنعتی فاز 1 خيابان پنج شرقی پيشگامان پودينه آتا</p>";
        $footer4 =          "<p style='direction:rtl;text-align:left;'>تلفن: 02155615148 - 02155983072  </p>";

        $message = $message_image . $header . $main_message . $footer1 . $footer2 . $footer3 . $footer4;

        $mail_config = new PHPMailer(true);
        try{
            $mail_config->CharSet = 'UTF-8';
            $mail_config->isSMTP();
            $mail_config->Host = "mail.diorhome.ir";
            $mail_config->SMTPAuth = true;
            $mail_config->Username = 'noreply@diorhome.ir';
            $mail_config->Password = '09353899182joli1366';
            $mail_config->addAddress($to);
            // اضافه کردن میل های سی سی:
            if(isset($array_of_cc_mails) && !empty($array_of_cc_mails)){
                for($cc_index = 0; $cc_index<count($array_of_cc_mails); $cc_index++){
                    $mail_config->AddCC($array_of_cc_mails[$cc_index]);
                }
            }    
            $mail_config->Subject = $subject;
            $mail_config->Body = $message;
            $mail_config->setFrom('noreply@diorhome.ir', ' گروه پشتیبانی پیشگامان پودینه آتا');
            $mail_config->isHTML(true);
            $mail_config->send();
            echo '<p class="text-success text-center"><span class=" fa fa-check" aria-hidden="true"></span></p>';
            echo '<p class="text-success text-center iranSans pb-2">ایمیل مورد نظر با موفقیت ارسال شد. </p>';

        }catch (Exception $e) {
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2">مشکلی پیش آمد و ایمیل ارسال نشد.</p>';    
            echo "Message could not be sent. Mailer Error: {$mail_config->ErrorInfo}";
        }  
    }
}
    
?>