<?php 
require "../httpdocs/php/database_connection.php";
if(!$database_connection){
    die('connection failed:'.mysqli_connect_error());
}else{
    if(isset($_GET['ID'])){
        $ID = $_GET['ID'];
    }elseif(isset($_POST['ID'])){
        $ID = $_POST['ID'];
    }
    $query = "SELECT * FROM users WHERE ID = '$ID'";
    $query_result = mysqli_query($database_connection, $query);
    $query_result_array = mysqli_fetch_assoc($query_result);

    $first_name = $query_result_array['first_name'];
    $last_name = $query_result_array['last_name'];
    $age = $query_result_array['age'];
    $gender = $query_result_array['gender'];
    $username = $query_result_array['username'];
    $email = $query_result_array['email'];
    $home_address = $query_result_array['home_address'];
    $mobile_phone = $query_result_array['mobile_phone'];
    $verified = $query_result_array['verified'];
    $website = $query_result_array['website'];
    $disabled = $query_result_array['disabled'];
    $newsletter = $query_result_array['newsletter'];
    $administrator = $query_result_array['administrator'];
}

//  هنگام ورود به صفحه با کلیک روی دکمه edit در صفحه signed_in_admin.php:
if(isset($_GET['request']) && isset($_GET['ID'])){
            if(mysqli_num_rows($query_result)>0){
                $request = $_GET['request'];
                $tableau = '<i class="fas fa-exclamation-triangle text-warning target">';

                if($request == "delete"){
                    $warning = "شما در آستانه حذف کاربری <span>$username</span> از سیستم هستید. آیا اطمینان دارید؟";
                    $close_btn = '<button class="btn btn-success iranSans target" id="noclose" >بيخيال</button>';
                    $delete_form = '<form action="userDeleted.php" method="post">
                                        <input type="hidden" name="ID" value="'. $ID. '">
                                        <button class="btn btn-danger iranSans target" name="delete">مطمئنم</button>
                                    </form>';
                }elseif($request == 'edit'){
                    $warning = "شما در آستانه اصلاح اطلاعات حساب کاربری <span>$username</span> هستید.";
                    $close_btn = '<button class="btn btn-success iranSans target" id="noclose"><i class="fas fa-check px-2"></i>متوجه شدم</button>';
                }
            }else{
                $warning= "کاربری با مشخصات فوق در سیستم یافت نشد";
            }
// هنگام کلیک بر روی اعمال تغییرات:
}elseif(isset($_POST['modification'])){
    $errors = [];
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

    $posted_first_name = test_input($_POST["first_name"], "/^(-)|([A-Z][a-z]{2,})$/");
    if(empty($posted_first_name)){array_push($errors, "نام باید به لاتین باشد و با حرف بزرگ آغاز شود.");}

    $posted_last_name = test_input($_POST["last_name"], "/^(-)|([A-Z][a-z]{2,})$/");
    if(empty($posted_last_name)){array_push($errors, "نام خانوادگی باید به لاتین باشد و با حرف بزرگ آغاز شود.");}

    $posted_age = test_input($_POST["age"], "/^(-)|([1][2-9])|([2-7][0-9])$/");
    if(empty($posted_age)){array_push($errors, "سن باید بین 12 تا 79 سال باشد");}

    $posted_gender = test_input($_POST["gender"], "/^(-)|(male)|(female)$/");
    if(empty($posted_gender)){array_push($errors, "جنسیت درست وارد نشده است.");}

    $posted_username = test_input($_POST["username"], "/^[A-Z][a-z0-9]{3,15}$/");
    if(empty($posted_username)){array_push($errors, "نام کاربری نمی تواند خالی بماند. حداقل 4 کاراکتر دارد و باید حرف اول آن بزرگ باشد.");}
    
    if(!empty($_POST['pass'])){
        $posted_pass = $_POST['pass'];
        $posted_pass = test_input($_POST["pass"], "/^[a-zA-Z0-9]{5,15}$/");
        if(empty($posted_pass)){array_push($errors, 'رمز عبور فقط می تواند عدد حروف کوچک یا بزرگ داشته و حداقل 5 کاراکتر باشد.');}
    }
    $posted_website = test_input($_POST["website"], "/^(-)|((www\.|https?:\/\/)([a-z0-9]{2,}\.){1,3}[a-z]{1,3})$/");
    if(empty($posted_website)){array_push($errors, "فرمت وبسایت درست وارد نشده است.");}

    $posted_verified = test_input($_POST['verified'], "/^(YES)|(NO)$/");
    if(empty($posted_verified)){array_push($errors, "تایید کاربری مشکل دارد");}

    $posted_mobile_phone = test_input($_POST["mobile_phone"], "/^09[0-9]{9}$/");
    if(empty($posted_mobile_phone)){array_push($errors, 'شماره موبایل درست وارد نشده است.');}

    $posted_newsletter = test_input($_POST['newsletter'], "/^(YES)|(NO)$/");
    if(empty($posted_newsletter)){array_push($errors, "وضعیت دریافت خبرنامه مشکل دارد");}

    $posted_disabled = test_input($_POST['disabled'], "/^(YES)|(NO)$/");
    if(empty($posted_disabled)){array_push($errors, "وضعیت فعال بودن کاربری مشکل دارد");}
    
    $posted_administrator = test_input($_POST['administrator'], "/^(YES)|(NO)$/");
    if(empty($posted_administrator)){array_push($errors, "وضعیت ادمین بودن کاربری مشکل دارد");}

    $posted_email = email_test_input($_POST["email"]);
    if(empty($posted_email)){array_push($errors, 'ایمیل درست وارد نشده است.');}

    $posted_home_address = test_home_address($_POST['home_address']);
    if(empty($posted_home_address)){array_push($errors, 'آدرس پستی منزل درست وارد نشده است.');}   

    // متن مودال بعد از اعمال تغییرات
    if(count($errors)>0){
        // وقتی ارور داریم:
        $tableau = '<i class="fas fa-exclamation-triangle text-warning target">';
        $warning = "تغییرات اعمال نشد. لطفا ابتدا خطاهای موجود را برطرف نمایید!";
        $close_btn = '<button class="btn btn-warning iranSans target" id="noclose" >متوجه شدم</button>';
    }else{
        // وقتی ارور نداریم:
        $updated_inputs = [];
            if($posted_first_name == '-' || empty($posted_first_name)){$posted_first_name = null;}
            if($posted_first_name !== $query_result_array['first_name']){
                if($posted_first_name == null){
                    $first_name_change = "UPDATE users SET first_name = NULL WHERE ID = '$ID' ";
                    $first_name_changed = mysqli_query($database_connection, $first_name_change);
                    $updated_inputs['first_name'] = null;
                    $first_name = null;
                }else{
                    $first_name_change = "UPDATE users SET first_name = '$posted_first_name' WHERE ID = '$ID' ";
                    $first_name_changed = mysqli_query($database_connection, $first_name_change);
                    $updated_inputs['first_name'] = $posted_first_name;
                    $first_name = $posted_first_name;
                }
            }
            if($posted_last_name == '-' || empty($posted_last_name)){$posted_last_name = null;}
            if($posted_last_name !== $query_result_array['last_name']){
                if($posted_last_name == null){
                    $last_name_change = "UPDATE users SET last_name = NULL WHERE ID = '$ID' ";
                    $last_name_changed = mysqli_query($database_connection, $last_name_change);
                    $updated_inputs['last_name'] = null;
                    $last_name = null;
                }else{
                    $last_name_change = "UPDATE users SET last_name = '$posted_last_name' WHERE ID = '$ID' ";
                    $last_name_changed = mysqli_query($database_connection, $last_name_change);
                    $updated_inputs['last_name'] = $posted_last_name;
                    $last_name = $posted_last_name;    
                }
            }
            if($posted_age == '-' || empty($posted_age)){$posted_age = null;}
            if($posted_age !== $query_result_array['age']){
                if($posted_age == null){
                    $age_change = "UPDATE users SET age = NULL WHERE ID = '$ID' ";
                    $age_changed = mysqli_query($database_connection, $age_change);
                    $updated_inputs['age'] = null;
                    $age = null;
                }else{
                    $age_change = "UPDATE users SET age = '$posted_age' WHERE ID = '$ID' ";
                    $age_changed = mysqli_query($database_connection, $age_change);
                    $updated_inputs['age'] = $posted_age;
                    $age = $posted_age;    
                }
            }  
            if($posted_gender == '-' || empty($posted_gender)){$posted_gender = null;}
            if($posted_gender !== $query_result_array['gender']){
                if($posted_gender == null){
                    $gender_change = "UPDATE users SET gender = NULL WHERE ID ='$ID' ";
                    $gender_changed = mysqli_query($database_connection, $gender_change);
                    $updated_inputs['gender'] = null;
                    $gender = null;
                }else{
                    $gender_change = "UPDATE users SET gender = '$posted_gender' WHERE ID ='$ID' ";
                    $gender_changed = mysqli_query($database_connection, $gender_change);
                    $updated_inputs['gender'] = $posted_gender;
                    $gender = $posted_gender;
                }
            }         
            if($posted_home_address == "-" || empty($posted_home_address)){$posted_home_address = null;}
            if($posted_home_address !== $query_result_array['home_address']){
                if($posted_home_address == null){
                    $home_address_change = "UPDATE users SET home_address = NULL WHERE ID = '$ID' ";
                    $home_address_changed = mysqli_query($database_connection, $home_address_change);
                    $updated_inputs['home_address'] = null;
                    $home_address = null;
                }else{
                    $home_address_change = "UPDATE users SET home_address = '$posted_home_address' WHERE ID = '$ID' ";
                    $home_address_changed = mysqli_query($database_connection, $home_address_change);
                    $updated_inputs['home_address'] = $posted_home_address;
                    $home_address = $posted_home_address;    
                }
            }
            if($posted_website == "-" || empty($posted_website)){$posted_website = null;}
            if($posted_website !== $query_result_array['website']){
                if($posted_website == null){
                    $website_change = "UPDATE users SET website = NULL WHERE ID = '$ID' ";
                    $website_changed = mysqli_query($database_connection, $website_change);
                    $updated_inputs['website'] = null;
                    $website = null;
                }else{
                    $website_change = "UPDATE users SET website = '$posted_website' WHERE ID = '$ID' ";
                    $website_changed = mysqli_query($database_connection, $website_change);
                    $updated_inputs['website'] = $posted_website;
                    $website = $posted_website;    
                }
            }
            if($posted_username !== $query_result_array['username']){
                $userame_checking_query = "SELECT * FROM users WHERE username = '$posted_username' ";
                $username_checking_result = mysqli_query($database_connection, $username_checking_query);
                if(mysqli_num_rows($username_checking_result)>0){
                    array_push($errors, "نام کاربری $posted_username قبلا ثبت شده است.");
                }else{
                    $updated_inputs['username'] = $posted_username;
                    $username = $posted_username;
                }
            }
            // پسورد قبلا چک شده که اشتباه وارد نشده باشد
            // اگر فیلد پسورد پر بود:
            if(!empty($posted_pass)){
                // اگر پسورد با پسورد موجود در دیتابیس یکی نبود:
                if(!password_verify($posted_pass, $query_result_array['pass'])){
                    $posted_pass_hashed = password_hash($posted_pass, PASSWORD_BCRYPT);
                    $change_pass_hashed = "UPDATE users SET pass = '$posted_pass_hashed' WHERE ID = '$ID' ";
                    $changed_pass_hashed = mysqli_query($database_connection, $change_pass_hashed);
                    $updated_inputs['pass'] = $posted_pass;
                }else{
                    // پسورد وارد شده قبلا در دیتابیس موجود بوده است:
                    array_push($errors, "پسورد وارد شده جهت کاربری زیر قبلا در سیستم ثبت شده است.");
                }
            }
            if($posted_email !== $query_result_array['email']){
                $email_checking_query = "SELECT * FROM users WHERE email = '$posted_email' ";
                $email_checking_result = mysqli_query($database_connection, $email_checking_query);
                if(mysqli_num_rows($email_checking_result)>0){
                    array_push($errors, "ایمیل $posted_email قبلا در سیستم ثبت شده است.");
                }else{
                    $change_email = "UPDATE users SET email = '$posted_email' WHERE ID = '$ID' ";
                    $changed_email = mysqli_query($database_connection, $change_email);
                    $updated_inputs['email'] = $posted_email;
                    $email = $posted_email;
                }
            }
            if($posted_verified !== $query_result_array['verified']){
                $change_verified = "UPDATE users SET verified = '$posted_verified' WHERE ID = '$ID' ";
                $changed_verified = mysqli_query($database_connection, $change_verified);
                $updated_inputs['verified'] = $posted_verified;
                $verified = $posted_verified;
            }
            if($posted_disabled !== $query_result_array['disabled']){
                $change_disabled = "UPDATE users SET disabled = '$posted_disabled' WHERE ID = '$ID' ";
                $changed_disabled = mysqli_query($database_connection, $change_disabled);
                $updated_inputs['disabled'] = $posted_disabled;
                $disabled = $posted_disabled;
            }
            if($posted_newsletter !== $query_result_array['newsletter']){
                $change_newsletter = "UPDATE users SET newsletter = '$posted_newsletter' WHERE ID = '$ID' ";
                $changed_newsletter = mysqli_query($database_connection, $change_newsletter);
                $updated_inputs['newsletter'] = $posted_newsletter;
                $newsletter = $posted_newsletter;
            }
            if($posted_mobile_phone !== $query_result_array['mobile_phone']){
                $mobile_phone_checking_query = "SELECT * FROM users WHERE mobile_phone = '$posted_mobile_phone' ";
                $mobile_phone_checking_result = mysqli_query($database_connection, $mobile_phone_checking_query);
                if(mysqli_num_rows($mobile_phone_checking_result)>0){
                    array_push($errors, "شماره تلفن $posted_mobile_phone قبلا در سیستم ثبت شده است.");
                }else{
                    $change_mobile_phone = "UPDATE users SET mobile_phone = '$posted_mobile_phone' WHERE ID = '$ID' ";
                    $changed_mobile_phone = mysqli_query($database_connection, $change_mobile_phone);
                    $updated_inputs['mobile_phone'] = $posted_mobile_phone;
                    $mobile_phone = $posted_mobile_phone;
                }
            }
            if($posted_administrator !== $query_result_array['administrator']){
                $change_administrator = "UPDATE users SET administrator = '$posted_administrator' WHERE ID = '$ID' ";
                $changed_administrator = mysqli_query($database_connection, $change_administrator);
                $updated_inputs['administrator'] = $posted_administrator;
                $administrator = $posted_administrator;
            }
            // اگر ارور داشتیم:
            if(count($errors)>0){
                $tableau = '<i class="fas fa-exclamation-triangle text-warning target">';
                $warning = "تغییرات اعمال نشد. لطفا ابتدا خطاهای موجود را برطرف نمایید!";
                $close_btn = '<button class="btn btn-warning iranSans target" id="noclose" >متوجه شدم</button>';   
            // اگر هنوز ارور نداشتیم - پسورد وارد شده تکراری نبود:     
            }else{
                // اگر هیچ فیلدی تغییر نکرده بود:
                if(count($updated_inputs)<=0){
                    $tableau = '<i class="fas fa-exclamation-triangle text-warning target">';
                    $warning = "همه فیلد ها تکراری بودند. تغییری اعمال نشد!";
                    array_push($errors, 'همه فیلد ها تکراری بودند. تغییری اعمال نشد!');
                    $close_btn = '<button class="btn btn-warning text-light iranSans target" id="noclose" >متوجه شدم</button>';   
                // اگر حداقل یک فیلد تغییر کرد:
                }else{
                    $tableau = '<i class="fas fa-check text-warning target">';
                    $warning = "تغییرات با موفقیت روی کاربری <span>$username</span> اعمال شد.";
                    $close_btn = '<button class="btn btn-success iranSans target" id="noclose" >مشاهده کابری با تغییرات جدید</button>';  
                }
            }
            
            echo 'updated inputs are: ';
            print_r($updated_inputs);

            echo "<br> errors are: ";
            print_r($errors);
    }
}else{
    // وقتی نه با زدن دکمه اعمال تغییرات و نه از طریق ادمین پنل به صفحه تغییر مشخصات کاربران بیایند:
    header('location:signed_in_admin.php');
}
?>