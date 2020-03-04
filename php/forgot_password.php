<?php 
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
                $query = "SELECT * from users WHERE email = '$email' ";
                $query_result = mysqli_query($database_connection, $query);
                $number_of_results = mysqli_num_rows($query_result);
                if($number_of_results>0){
                    $result_array = mysqli_fetch_assoc($query_result);
                    $username = $result_array['username'];
                    $message =  "<p class='text-right'>" . $username . " عزیز </p>" . 
                                "<p class='text-right'>اخیرا در سایت پیشگامان پودینه آتا درخواست بازیابی رمز عبورتان برایمان ارسال شده است. </p>".
                                "<p class='text-right'>در صورتی که این اقدام از سوی شما نبوده لازم نیست کاری کنید. صرفا این ایمیل را نادیده بگیرید.</p>".
                                "<p class='text-right'>در غیر این صورت لطفا روی لینک زیر کلیک کنید تا به صفحه بازیابی گذرواژه هدایت شوید:</p>".
                                "<a href='#'>nothing yet</a>" . 
                                "<p class='text-right'>با آرزوی توفیق،</p>" . 
                                "<p class='text-right'>پشتیبانی پیشگامان پودینه آتا</p>";
                    $subject = "بازیابی گذرواژه";
                    $to = $email;
                    mail($email, $subject, $message);
                }else{
                    echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger pb-2">ایمیلی که وارد کردید در سامانه یافت نشد.</p>';
                }
            }
        }
    }
}
?>