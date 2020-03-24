<?php 
    session_start();
    echo    '
            <div>                
                <!-- validation pending spinners -->
                <div class=" spinner-grow text-muted"></div>
                <div class=" spinner-grow text-primary"></div>
                <div class=" spinner-grow text-success"></div>
            </div>
            ';

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
    function test_home_address($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function test_newsletter($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if (preg_match($regex,$data)) {
            return $data;
        }else{
            return $data = "";
        }

    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // when personal info form is submitted:
        if(!empty($_POST['personal_info'])){

            if(empty($_POST['first_name']) || empty($_POST['last_name'])){
                echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger px-4 displayNone">فیلد های "نام" و "نام خانوادگی" نباید خالی بمانند.</p>';
            }else{
                $first_name = test_input($_POST["first_name"], "/^[A-Z][a-z]{2,}$/");
                $last_name = test_input($_POST["last_name"], "/^[A-Z][a-z]{2,}$/");
                $age = test_input($_POST["age"], "/^(([1][2-9])|([2-7][0-9]))$/");
                $gender = test_input($_POST["gender"], "/^(male)|(female)$/");

                if(empty($first_name)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">نام خانوادگی درست وارد نشده است.</p>';
                }
                if(empty($last_name)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">نام خانوادگی درست وارد نشده است.</p>';
                }
                if(!empty($_POST['age']) && empty($age)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">عدد سن از حد مجاز خارج است.</p>';
                }
                if(!empty($_POST['gender'] && empty($gender))){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">لطفا یکی از دو جنسیت مذکر یا مونث را انتخاب کنید.</p>';
                }

                $arr = ["first_name" => $first_name, "last_name" => $last_name, "age" => $age, "gender" => $gender];
                $number_of_updated_fields = 0;
                foreach($arr as $key => $value){
                    if(!empty($value)){
                        // database connection:
                        require "database_connection.php";
                        // database connection check:
                        if(!$database_connection){
                            die('connection failed:'.mysqli_connect_error());
                        }else{
                            $user = $_SESSION['user_username'];
                            $new_input_check_query = "SELECT * FROM users WHERE username = '$user' ";
                            $new_input_check_result = mysqli_query($database_connection, $new_input_check_query);
                            $user_retrieved = mysqli_fetch_assoc($new_input_check_result);
                            if($user_retrieved[$key] != $value){
                                $update_query = "UPDATE users SET $key = '$value' WHERE username = '$user' ";
                                mysqli_query($database_connection, $update_query);
                                $number_of_updated_fields += 1;
                            }
                        } 
                    }
                }
                if($number_of_updated_fields>0){
                    echo'
                        <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
                        <p class="signing-message successful text-success px-4 displayNone"> ' . $number_of_updated_fields . ' فیلد با موفقیت به روز رسانی شد . </p>            
                        ';

                }else{
                    echo '<p class="signing-message text-primary p-4 m-0 displayNone">تغییری صورت نگرفت.</p>';
                }

            }
        }
        // when contact info form is submitted:
        elseif(!empty($_POST['contact_info'])) {
            if(empty($_POST['mobile_phone']) || empty($_POST['email']) || empty($_POST['home_address'])){
                echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger px-4 displayNone">فیلد های "شماره همراه"، "ایمیل" و "آدرس پستی" نباید خالی بمانند.</p>';
            }else{
                $mobile_phone = test_input($_POST["mobile_phone"], "/^09[0-9]{9}$/");
                $landline = test_input($_POST["landline"], "/^0[0-9]{7,}$/");
                $email = test_input($_POST["email"], "/^[a-z0-9]{3,}@[a-z]{3,}\.[a-z]{0,3}$/");
                $newsletter = test_input($_POST['newsletter'], "/^yes|no|YES|NO$/" );
                $home_address = test_home_address($_POST["home_address"]);
                if(empty($mobile_phone)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">شماره همراه درست وارد نشده است.</p>';
                }
                if(empty($email)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">آدرس ایمیل درست وارد نشده .</p>';
                }
                if(empty($home_address)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">آدرس پستی درست وارد نشده است.</p>';
                }
                if(!empty($_POST['landline']) && empty($landline)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">تلفن ثابت درست وارد نشده است.</p>';
                }
                $arr = ["mobile_phone" => $mobile_phone, "landline" => $landline, "email" => $email, "newsletter" => $newsletter , "home_address" => $home_address];
                $number_of_updated_fields = 0;
                foreach($arr as $key => $value){
                    if(!empty($value)){
                        // database connection:
                        require "database_connection.php";                        
                        // database connection check:
                        if(!$database_connection){
                            die('connection failed:'.mysqli_connect_error());
                        }else{
                            $user = $_SESSION['user_username'];
                            $new_input_check_query = "SELECT * FROM users WHERE username = '$user' ";
                            $new_input_check_result = mysqli_query($database_connection, $new_input_check_query);
                            $user_retrieved = mysqli_fetch_assoc($new_input_check_result);
                            if($user_retrieved[$key] != $value){
                                $update_query = "UPDATE users SET $key = '$value' WHERE username = '$user' ";
                                mysqli_query($database_connection, $update_query);

                                $number_of_updated_fields += 1;
                            }
                        } 
                    }
                }
                if($number_of_updated_fields>0){
                    echo'
                        <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
                        <p class="signing-message successful text-success px-4 displayNone"> ' . $number_of_updated_fields . ' فیلد با موفقیت به روز رسانی شد . </p>            
                        ';

                }else{
                    echo '<p class="signing-message text-primary p-4 m-0 displayNone">تغییری صورت نگرفت.</p>';
                }
            }
        }
        // when user info form is submitted:
        elseif (!empty($_POST['user_info'])){
            if(empty($_POST['user_name']) || empty($_POST['old_pass']) || empty($_POST['new_pass'])){
                echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger px-4 displayNone">فیلد های "نام کاربری"، "رمز عبور قدیمی" و "رمز عبور جدید" نباید خالی بمانند.</p>';
            }else{
                $user_name = test_input($_POST["user_name"], "/^[A-Z][a-z0-9]{3,15}$/");
                $old_pass = test_input($_POST["old_pass"], "/^[a-zA-Z0-9]{5,15}$/");
                $new_pass = test_input($_POST["new_pass"], "/^[a-zA-Z0-9]{5,15}$/");
                $website = test_input($_POST["website"], "/^(www\.|https?:\/\/)([a-z0-9]{2,}\.){1,3}[a-z]{1,3}$/");
                if(empty($user_name)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">نام کاربری درست وارد نشده است.</p>';
                }
                if(empty($old_pass)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">مرز عبور قدیمی درست وارد نشده است.</p>';
                }
                if(empty($new_pass)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">رمز عبور جدید درست وارد نشده است.</p>';
                }
                if($old_pass === $new_pass){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">رمز عبور جدید نباید با رمز عبور قدیمی برابر باشد.</p>';
                }
                if(!empty($_POST['website']) && empty($website)){
                    echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger px-4 displayNone">آدرس وبسایت درست وارد نشده است.</p>';
                }
                $arr = ["username" => $user_name, "pass" => $new_pass, "website" => $website];
                $number_of_updated_fields = 0;

                // database connection:
                require "database_connection.php";
                
                if(!$database_connection){
                    die('connection failed:'.mysqli_connect_error());
                }else{
                    $user = $_SESSION['user_username'];
                    $new_input_check_query = "SELECT * FROM users WHERE username = '$user' ";
                    $new_input_check_result = mysqli_query($database_connection, $new_input_check_query);
                    $user_retrieved = mysqli_fetch_assoc($new_input_check_result);
                    if(!password_verify($old_pass, $user_retrieved['pass'])){
                        echo '<p class="text-danger pt-4 pb-1 displayNone"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="signing-message text-danger px-4 displayNone">پسورد وارد شده صحیح نیست.</p>';
                    }else{
                        foreach($arr as $key => $value){
                            if(!empty($value)){
                                // database connection:
                                require "database_connection.php";

                                // database connection check:
                                if(!$database_connection){
                                    die('connection failed:'.mysqli_connect_error());
                                }else{
                                    $user = $_SESSION['user_username'];
                                    $new_input_check_query = "SELECT * FROM users WHERE username = '$user' ";
                                    $new_input_check_result = mysqli_query($database_connection, $new_input_check_query);
                                    $user_retrieved = mysqli_fetch_assoc($new_input_check_result);
                                    if($user_retrieved[$key] != $value){
                                        $update_query = "UPDATE users SET $key = '$value' WHERE username = '$user' ";
                                        mysqli_query($database_connection, $update_query);
                                        $number_of_updated_fields += 1;
                                    }
                                } 
                            }
                        }
                        if($number_of_updated_fields>0){
                            echo'
                                <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
                                <p class="signing-message successful text-success px-4 displayNone"> ' . $number_of_updated_fields . ' فیلد با موفقیت به روز رسانی شد . </p>            
                                ';
        
                        }else{
                            echo '<p class="signing-message text-primary p-4 m-0 displayNone">تغییری صورت نگرفت.</p>';
                        }        
                    }
                }
            }
        }
    }

?>