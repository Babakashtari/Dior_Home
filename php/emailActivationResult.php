<?php
if(!empty($_GET['email']) && !empty($_GET['code'])){
    $email = $_GET['email'];
    $sign_up_token = $_GET['code'];
    require "database_connection.php";
    if(!$database_connection){
        die('connection failed:'.mysqli_connect_error());
    }else{
        $find_query = "SELECT * FROM users WHERE email = '$email' ";
        $entry = mysqli_query($database_connection, $find_query);
        if(mysqli_num_rows($entry)>0){
            $entry_array = mysqli_fetch_assoc($entry);
            if($entry_array['verified'] == "NO" && !empty($entry_array['sign_up_token'])){
                if($entry_array['sign_up_token'] == $sign_up_token){
                    $verification_query = "UPDATE users SET verified='YES', sign_up_token=null WHERE email='$email' ";
                    $verification_result = mysqli_query($database_connection, $verification_query);

                    echo '<p class="text-success pt-4 pb-1"><span class=" fa fa-check" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message successful text-success px-4"> ایمیل شما با موفقیت تایید شد می توانید از طریق لینک زیر وارد سایت شوید:</p>';    
                    echo '<p class="text-center text-light"><a href="login.php">برو به صفحه ورود</a></p>';    
                    exit();
                }else{
                    echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger pb-2">لینک اشتباه است. کاربری شما فعال نشد.</p>';    
                    exit();    
                }
            }else{
                echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="text-center text-danger pb-2">ایمیل شما قبلا فعال شده است.</p>';    
                exit();
            }
        }else{
            echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
            echo '<p class="text-center text-danger pb-2">ایمیلی با مشخصات شما یافت نشد.</p>';    
            exit();
        }
    }
}else{
    echo '<p class="text-danger text-center"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
    echo '<p class="text-center text-danger pb-2">ایمیلی جهت فعالسازی ارسال نشد.</p>';    
    exit();
}
?>