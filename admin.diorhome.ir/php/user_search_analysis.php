
<?php
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
function test_home_address($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function users_search_criteria(){
echo    '
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id=""'; if(isset($_POST['first_name']) && !empty($_POST['first_name'])){echo "checked";} echo    '> نام</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id=""'; if(isset($_POST['last_name']) && !empty($_POST['last_name'])){echo "checked";} echo    '>نام خانوادگی</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id=""'; if(isset($_POST['age']) && !empty($_POST['age'])){echo "checked";} echo    '>سن</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id="" '; if(isset($_POST['gender']) && !empty($_POST['gender'])){echo "checked";} echo    '>جنسیت</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id="" '; if(isset($_POST['username']) && !empty($_POST['username'])){echo "checked";} echo    '>نام کاربری</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id="" '; if(isset($_POST['email']) && !empty($_POST['email'])){echo "checked";} echo    '>ایمیل</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id="" '; if(isset($_POST['home_address']) && !empty($_POST['home_address'])){echo "checked";} echo    '>آدرس منزل</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id="" '; if(isset($_POST['landline']) && !empty($_POST['landline'])){echo "checked";} echo    '>تلفن ثابت</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans"><input type="checkbox" name="" id="" '; if(isset($_POST['mobile_phone']) && !empty($_POST['mobile_phone'])){echo "checked";} echo    '>شماره موبایل</span>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans users-checkboxes"><input type="checkbox" name="" id="" '; if(isset($_POST['verified']) && !empty($_POST['verified'])){echo "checked";} echo    '>تایید ایمیل</s>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans users-checkboxes"><input type="checkbox" name="" id="" '; if(isset($_POST['newsletter']) && !empty($_POST['newsletter'])){echo "checked";} echo    '>خبرنامه</s>
</div>
<div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
    <span class="iranSans users-checkboxes"><input type="checkbox" name="" id="" '; if(isset($_POST['administrator']) && !empty($_POST['administrator'])){echo "checked";} echo    '>کاربر ادمین</s>
</div>
        ';
}
function search_result(){
    if(isset($_POST['user_search']) || isset($_POST['pagination_user_search'])){
        $error = "none";
        $keys = [];
        $values = [];
        if(!empty($_POST['first_name'])){
            $first_name = test_input($_POST["first_name"], "/^[A-Z][a-z]{2,}$/");
            if(!empty($first_name)){
                array_push($keys, "first_name");
                array_push($values, $first_name);    
                $_SESSION['search_first_name'] = $first_name;

            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">نام درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_first_name'])){
                $first_name = test_input($_SESSION["search_first_name"], "/^[A-Z][a-z]{2,}$/");
                if(!empty($first_name)){
                    array_push($keys, "first_name");
                    array_push($values, $first_name);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">نام درست وارد نشده است.</p>';
                    $error = "YES";
                }
            }
        }else{
            $_SESSION['search_first_name'] = null;
        }
        if(!empty($_POST['last_name'])){
            $last_name = test_input($_POST["last_name"], "/^[A-Z][a-z]{2,}$/");
            if(!empty($last_name)){
                array_push($keys, "last_name");
                array_push($values, $last_name);   
                $_SESSION['search_last_name'] = $last_name;
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-center text-danger px-4 iranSans">نام خانوادگی درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_last_name'])){
                $last_name = test_input($_SESSION["search_last_name"], "/^[A-Z][a-z]{2,}$/");
                if(!empty($last_name)){
                    array_push($keys, "last_name");
                    array_push($values, $last_name);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">نام خانوادگی درست وارد نشده است.</p>';
                    $error = "YES";
                }
            }
        }else{
            $_SESSION['search_last_name'] = null;
        }
        if(!empty($_POST['age'])){
            $age = test_input($_POST["age"], "/^(([1][2-9])|([2-7][0-9]))$/");
            if(!empty($age)){
                array_push($keys, "age");
                array_push($values, $age); 
                $_SESSION['search_age'] = $age;   
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">سن درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_age'])){
                $age = test_input($_SESSION["search_age"], "/^(([1][2-9])|([2-7][0-9]))$/");
                if(!empty($age)){
                    array_push($keys, "age");
                    array_push($values, $age);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">سن درست وارد نشده است.</p>';
                    $error = "YES";
                }
            }
        }else{
            $_SESSION['search_age'] = null;
        }
        if(!empty($_POST['gender'])){
            $gender = test_input($_POST["gender"], "/^(male)|(female)$/");
            if(!empty($gender)){
                array_push($keys, "gender");
                array_push($values, $gender);  
                $_SESSION['search_gender'] = $gender;
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-center text-danger px-4 iranSans">جنسیت درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_gender'])){
                $gender = test_input($_SESSION["search_gender"], "/^(male)|(female)$/");
                if(!empty($gender)){
                    array_push($keys, "gender");
                    array_push($values, $gender);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">جنسیت درست وارد نشده است.</p>';
                    $error = "YES";
                }    
            }
        }else{
            $_SESSION['search_gender'] = null;
        }
        if(!empty($_POST['username'])){
            $username = test_input($_POST["username"], "/^[A-Z][a-z0-9]{2,}$/");
            if(!empty($username)){
                array_push($keys, "username");
                array_push($values, $username);    
                $_SESSION['search_username'] = $username;

            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">نام کاربری درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_username'])){
                $username = test_input($_SESSION["search_username"], "/^[A-Z][a-z0-9]{2,}$/");
                if(!empty($username)){
                    array_push($keys, "username");
                    array_push($values, $username);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">نام کاربری درست وارد نشده است.</p>';
                    $error = "YES";
                }    
            }
        }else{
            $_SESSION['search_username'] = null;
        }
        if(!empty($_POST['email'])){
            $email = test_input($_POST["email"], "/^[a-z0-9]{3,}@[a-z]{3,}\.[a-z]{0,3}$/");
            if(!empty($email)){
                array_push($keys, "email");
                array_push($values, $email);  
                $_SESSION['search_email'] = $email;
  
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">ایمیل درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_email'])){
                $email = test_input($_SESSION["search_email"], "/^[a-z0-9]{3,}@[a-z]{3,}\.[a-z]{0,3}$/");
                if(!empty($email)){
                    array_push($keys, "email");
                    array_push($values, $email);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">ایمیل درست وارد نشده است.</p>';
                    $error = "YES";
                }    
            }
        }else{
            $_SESSION['search_email'] = null;
        }
        if(!empty($_POST['home_address'])){
            $home_address = test_home_address($_POST["home_address"]);
            if(!empty($home_address)){
                array_push($keys, "home_address");
                array_push($values, $home_address);  
                $_SESSION['search_home_address'] = $home_address;  
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">آدرس پستی منزل درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_home_address'])){
                $home_address = test_home_address($_SESSION["search_home_address"]);
                if(!empty($home_address)){
                    array_push($keys, "home_address");
                    array_push($values, $home_address);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">آدرس پستی درست وارد نشده است.</p>';
                    $error = "YES";
                }    
            }
        }else{
            $_SESSION['search_home_address'] = null;
        }
        if(!empty($_POST['landline'])){
            $landline = test_input($_POST["landline"], "/^0[0-9]{7,}$/");
            if(!empty($landline)){
                array_push($keys, "landline");
                array_push($values, $landline);    
                $_SESSION['search_landline'] = $landline;
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">تلفن ثابت درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_landline'])){
                $landline = test_input($_SESSION["search_landline"], "/^0[0-9]{7,}$/");
                if(!empty($landline)){
                    array_push($keys, "landline");
                    array_push($values, $landline);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">تلفن ثابت درست وارد نشده است.</p>';
                    $error = "YES";
                }    
            }
        }else{
            $_SESSION['search_landline'] = null;
        }
        if(!empty($_POST['mobile_phone'])){
            $mobile_phone = test_input($_POST["mobile_phone"], "/^09[0-9]{9}$/");
            if(!empty($mobile_phone)){
                array_push($keys, "mobile_phone");
                array_push($values, $mobile_phone); 
                $_SESSION['search_mobile_phone'] = $mobile_phone;
   
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">شماره موبایل درست وارد نشده است.</p>';
                $error = "YES";
            }
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_mobile_phone'])){
                $landline = test_input($_SESSION["search_mobile_phone"], "/^09[0-9]{9}$/");
                if(!empty($mobile_phone)){
                    array_push($keys, "mobile_phone");
                    array_push($values, $mobile_phone);    
                }else{
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="signing-message text-danger text-center px-4 iranSans">شماره موبایل درست وارد نشده است.</p>';
                    $error = "YES";
                }    
            }
        }else{
            $_SESSION['search_mobile_phone'] = null;
        }
        if(!empty($_POST['verified'])){
            $verified = $_POST['verified'];
            array_push($keys, 'verified');
            array_push($values, $verified);
            $_SESSION['search_verified'] = $verified;
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_verified'])){
                $verified = $_SESSION["search_verified"];
                if(!empty($verified)){
                    array_push($keys, "verified");
                    array_push($values, $verified);    
                }
            }
        }else{
            $_SESSION['search_verified'] = null;
        }
        if(!empty($_POST['newsletter'])){
            $newsletter = $_POST['newsletter'];
            array_push($keys, "newsletter");
            array_push($values, $newsletter);
            $_SESSION['search_newsletter'] = $newsletter;
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_newsletter'])){
                $newsletter = $_SESSION["search_newsletter"];
                if(!empty($newsletter)){
                    array_push($keys, "newsletter");
                    array_push($values, $newsletter);    
                }
            }
        }else{
            $_SESSION['search_newsletter'] = null;
        }
        if(!empty($_POST['administrator'])){
            $administrator = $_POST['administrator'];
            array_push($keys, "administrator");
            array_push($values, $administrator);
            $_SESSION['search_administrator'] = $administrator;
        }elseif(isset($_POST['pagination_user_search'])){
            if(!empty($_SESSION['search_administrator'])){
                $administrator = $_SESSION["search_administrator"];
                if(!empty($administrator)){
                    array_push($keys, "administrator");
                    array_push($values, $administrator);    
                }
            }
        }else{
            $_SESSION['search_administrator'] = null;
        }
        // وقتی که حداقل یک فیلد برای جستجو کامل شده برو در دیتابیس جستجو کن:
        if($keys && $error !== "YES"){
            require "../httpdocs/php/database_connection.php";
            if(!$database_connection){
                die('connection failed:'.mysqli_connect_error());
            }else{
                $query = "SELECT * FROM users WHERE ";
                for($a = 0 ; $a < count($keys); $a++){
                    $key = $keys[$a];
                    $value = $values[$a];
                    if($keys[$a] == "home_address"){
                        if($a>=count($keys)-1){
                            $query .= " home_address LIKE '%$value%' ";
                        }else{
                            $query .= " home_address LIKE '%$value%' AND ";
                        }
                    }else{
                        if($a>=count($keys)-1){
                            $query .= "$key = '$value' ";
                        }else{
                            $query .= "$key = '$value' AND ";
                        }

                    }
                }
                $query_result = mysqli_query($database_connection, $query);
                $total_number_of_rows = mysqli_num_rows($query_result);
                $number_of_rows_per_page = 5;
                $total_number_of_pages = ceil($total_number_of_rows / $number_of_rows_per_page);
                if(isset($_POST['page_number']) && !empty($_POST['page_number'])){
                    $page_number = $_POST['page_number'];
                }else{
                    $page_number = 1;
                }
                // show only $number_of_rows_per_page and start from $page_number -1 * number_of_rows_per_page:
                $offset = ($page_number - 1) * $number_of_rows_per_page;
                $query .= " LIMIT " . $offset . "," . $number_of_rows_per_page;
        
                $final_query_result = mysqli_query($database_connection, $query);
                if(mysqli_num_rows($final_query_result)>0){
                    $index = 0;
                    $recipients = [];
                    while($row = mysqli_fetch_assoc($final_query_result)){
                        $index++;
                        array_push($recipients, $row['email']);
                        $ID = $row['ID'];
                        if(empty($row['first_name'])){
                            $first_name = ' null ';
                        }else{
                            $first_name = $row['first_name'];
                        }
                        if(empty($row['last_name'])){
                            $last_name = ' null ';
                        }else{
                            $last_name = $row['last_name'];
                        }
                        if(empty($row['username'])){
                            $username = ' null ';
                        }else{
                            $username =  $row['username'];
                        }
                        if(empty($row['email'])){
                            $email = ' null ';
                        }else{
                            $email =  $row['email'];
                        }
                        if(empty($row['landline'])){
                            $landline = ' null ';
                        }else{
                            $landline = $row['landline'];
                        }
                        if(empty($row['mobile_phone'])){
                            $mobile_phone = ' null ';
                        }else{
                            $mobile_phone = $row['mobile_phone'];
                        }
                        if(empty($row['age'])){
                            $age = ' null ';
                        }else{
                            $age = $row['age'];
                        }
                        if(empty($row['gender'])){
                            $gender = ' null ';
                        }else{
                            $gender =  $row['gender'];
                        }
                        if(empty($row['website'])){
                            $website = ' null ';
                        }else{
                            $website = $row['website'];
                        }
                        if(empty($row['home_address'])){
                            $home_address = ' null ';
                        }else{
                            $home_address = $row['home_address'];
                        }
                        $password = 'needs work';
                        $verified = $row['verified'];
                        $newsletter = $row['newsletter'];

                        echo    
                            "
                        <div class='row col-12 py-1 m-0' style='direction:ltr;'>
                            <div class='col-12 col-md-1 p-0 m-0'>
                                <p class='text-center m-0 p-0'>
                                    <a class='text-primary text-center px-1' href='users_modification.php?request=edit&ID=" . $ID ."'><i class='fas fa-edit'></i></a>
                                    <a class='text-danger text-center px-1' href='users_modification.php?request=delete&ID=" . $ID . "'><i class='far fa-trash-alt'></i></a>
                                </p>
                            </div>
                            <div class='p-1 col-12 col-md-1'>
                                <p class='text-center counter'> " .($offset + $index). " </p>
                            </div>
                            <div class='p-1 col-sm-5 offset-sm-2 col-md-3 offset-md-0'>
                                <p class='text-left iranSans'>username: <span>$username</span></p>
                            </div>
                            <div class='p-1 col-sm-5 col-md-3'>
                                <p class='text-left iranSans'>name: <span>$first_name</span></p>
                            </div>
                            <div class='p-1 offset-sm-2 col-sm-5 offset-md-0 col-md-4'>
                                <p class='text-left iranSans'>last name: <span>$last_name</span></p>
                            </div>
                            <div class='p-1 col-sm-5 offset-md-2 col-md-3'>
                                <p class='text-left iranSans'>newsletter: <span>$newsletter</span></p>
                            </div>
                            <div class='p-1 offset-sm-2 col-sm-5 offset-md-0 col-md-3'>
                                <p class='text-left iranSans'>gender: <span>"; if($gender = "male"){echo "m";}else{echo "f";} echo "</span></p>
                            </div>
                            <div class='p-1 col-sm-5 col-md-4' itemscope itemtype='https://schema.org/LocalBusiness'>
                                <p itemprop='name' class='text-left iranSans'>mob: <span itemprop='telephone'><a href='tel:$mobile_phone'>$mobile_phone</a></span></p>
                            </div>
                            <div class='p-1 offset-sm-2 col-sm-5 offset-md-2 col-md-3' itemscope itemtype='https://schema.org/LocalBusiness'>
                                <p itemprop='name' class='text-left iranSans'>Tel: <span itemprop='telephone'><a  href='tel:$landline'>$landline</a></span></p>
                            </div>
                            <div class='p-1 col-sm-5  col-md-3'>
                                <p class='text-left iranSans'>age: <span>$age</span></p>
                            </div>
                            <div class='p-1 offset-sm-2 col-sm-5 offset-md-0 col-md-3'>
                                <p class='text-left iranSans'>verified: <span>$verified</span></p>
                            </div>
                            <div class='p-1 col-sm-5 offset-md-2 col-md-10'>
                                <p class='text-left iranSans'>website: <span>$website</span></p>
                            </div>
                            <div class='p-1 col-sm-10 offset-sm-2 col-md-10 d-flex flex-row-reverse'>
                                <p class='text-left iranSans'>:address</p>
                                <p class='text-right iranSans'><span>$home_address</span></p>
                            </div>
                            <div class='p-1 col-sm-10 offset-sm-2 col-md-10'>
                                <p class='text-left iranSans'>email: <a href='email.php?recipient=$email'><span>$email</span></a></p>
                            </div>
                        </div>
                            ";
                    }
                    // pagination section:
                    echo "<p class='text-center iranSans my-1 text-success'>نمایش صفحه $page_number  از $total_number_of_pages صفحه</p>";

                    echo "<form method='POST' action='"; echo htmlspecialchars($_SERVER['PHP_SELF']); echo "'>";
                    echo '<input type="hidden" name="pagination_user_search" id="pagination_user_search" value="pagination">';
                    echo '<input type="hidden" name="search_first_name" id="search_first_name" value="'; if(isset($_SESSION['search_first_name']) && !empty($_SESSION['search_first_name'])){echo $_SESSION['search_first_name'];} echo '">';
                    echo '<input type="hidden" name="search_last_name" id="search_last_name" value="'; if(isset($_SESSION['search_last_name']) && !empty($_SESSION['search_last_name'])){echo $_SESSION['search_last_name'];} echo '">';
                    echo '<input type="hidden" name="search_age" id="search_age" value="'; if(isset($_SESSION['search_age']) && !empty($_SESSION['search_age'])){echo $_SESSION['search_age'];} echo '">';
                    echo '<input type="hidden" name="search_gender" id="search_gender" value="'; if(isset($_SESSION['search_gender']) && !empty($_SESSION['search_gender'])){echo $_SESSION['search_gender'];} echo '">';
                    echo '<input type="hidden" name="search_username" id="search_username" value="'; if(isset($_SESSION['search_username']) && !empty($_SESSION['search_username'])){echo $_SESSION['search_username'];} echo '">';
                    echo '<input type="hidden" name="search_email" id="search_email" value="'; if(isset($_SESSION['search_email']) && !empty($_SESSION['search_email'])){echo $_SESSION['search_email'];} echo '">';
                    echo '<input type="hidden" name="search_home_address" id="search_home_address" value="'; if(isset($_SESSION['search_home_address']) && !empty($_SESSION['search_home_address'])){echo $_SESSION['search_home_address'];} echo '">';
                    echo '<input type="hidden" name="search_landline" id="search_landline" value="'; if(isset($_SESSION['search_landline']) && !empty($_SESSION['search_landline'])){echo $_SESSION['search_landline'];} echo '">';
                    echo '<input type="hidden" name="search_mobile_phone" id="search_mobile_phone" value="'; if(isset($_SESSION['search_mobile_phone']) && !empty($_SESSION['search_mobile_phone'])){echo $_SESSION['search_mobile_phone'];} echo '">';
                    echo '<input type="hidden" name="search_verified" id="search_verified" value="'; if(isset($_SESSION['search_verified']) && !empty($_SESSION['search_verified'])){echo $_SESSION['search_verified'];} echo '">';
                    echo '<input type="hidden" name="search_administrator" id="search_administrator" value="'; if(isset($_SESSION['search_administrator']) && !empty($_SESSION['search_administrator'])){echo $_SESSION['search_administrator'];} echo '">';

                    echo    '<nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center flex-row-reverse pb-2">';
                                // اگر تعداد صفحات نتایج یافت شده بیشتر از 3 صفحه بودند:
                                if($total_number_of_pages>3){
                                    // اگر صفحه نمایش داده شده صفحه اول بود:
                                    if($page_number<=1){
                                        echo    '                    
                                        <li class="page-item disabled">
                                            <button class="page-link" type="submit" name="page_number" aria-label="Previous" value="1">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                        </li>
                                            ';        
                                        for($m=1; $m<=3; $m++){
                                            if($m == $page_number){
                                                echo '<li class="page-item active"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';                        

                                            }else{
                                                echo '<li class="page-item"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';
                                            }
                                        }    
                                        echo    '
                                        <li class="page-item">
                                            <button class="page-link" type="submit" name="page_number" aria-label="Next" value="' .$total_number_of_pages. '">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </li>
                                            ';
                                    // اگر صفحه نمایش داده شده صفحه آخر بود:
                                    }elseif($page_number>= $total_number_of_pages){
                                        echo    '
                                        <li class="page-item">
                                            <button class="page-link" type="submit" name="page_number" aria-label="Previous" value="1">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                        </li>
                                            ';
                                        for($m = $total_number_of_pages - 2 ; $m<=$total_number_of_pages ; $m++){
                                            if($m == $page_number){
                                                echo '<li class="page-item active"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';
                                            }else{
                                                echo '<li class="page-item"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';
                                            }
                                        }
                                        echo    '
                                        <li class="page-item disabled">
                                            <button class="page-link" type="submit" name="page_number" aria-label="Next" value="' .$total_number_of_pages. '">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </li>
                                            ';
                                    // اگر صفحه نمایش داده شده بین شماره صفحات اول و آخر بود:
                                    }else{
                                        echo    '
                                        <li class="page-item">
                                            <button class="page-link" type="submit" name="page_number" aria-label="Previous" value="1">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </button>
                                        </li>
                                            ';
                                        for($m = $page_number - 1 ; $m<=$page_number + 1 ; $m++){
                                            if($m == $page_number){
                                                echo '<li class="page-item active"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';
                                            }else{
                                                echo '<li class="page-item"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';
                                            }
                                        }
                                        echo    '
                                        <li class="page-item">
                                            <button class="page-link" type="submit" name="page_number" aria-label="Next" value="' .$total_number_of_pages. '">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Next</span>
                                            </button>
                                        </li>
                                            ';
                                    }
                                // اگر تعداد صفحات نتایج یافت شده کمتر از 3 صفحه بودند:
                            }else{
                                for($m = 1 ; $m<=$total_number_of_pages ; $m++){
                                    if($m == $page_number){
                                        echo '<li class="page-item active"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';
                                    }else{
                                        echo '<li class="page-item"><button class="page-link" type="submit" name="page_number" aria-label="Previous" value="'. $m . '">'. $m.'</button></li>';
                                    }
                                }
                            }
                        echo '</ul></nav></form>';
                        echo '<form method="POST" action="email.php">';
                        // قسمت مربوط به خبرنامه و ارسال ایمیل کلی:
                        $number_of_recipients = count($recipients);
                        for($f = 0 ; $f<count($recipients) ; $f++){
                            echo "<input type='hidden' name='emails$f' value='$recipients[$f]'>";
                        }
                        echo "<input type='hidden' name='number_of_recipients' id='number_of_recipients' value='" . count($recipients)."'>";
                        echo    '<div class="row m-0 p-0">
                                    <h5 class="text-center text-primary iranSans col-12 py-2 m-0">داشبورد خدمات:</h5>
                                    <button type="submit" name="newsletter_to_all" id="newsletter_to_all" class="iranSans col-12 col-md-4 my-1 py-2 text-primary" value="newsletter"><i class="fas fa-envelope text-primary p-1"></i>ارسال خبرنامه به مخاطبین فوق</button>
                                    <button type="submit" name="email_to_all" id="email_to_all" class="iranSans col-12 col-md-4 my-1 py-2 text-primary" value="email"><i class="fas fa-envelope text-primary p-1"></i> ارسال ایمیل به مخاطبین فوق </button>
                                    <button type="submit" name="sms_to_all" id="sms_to_all" class="iranSans col-12 col-md-4 my-1 py-2 text-primary" value="sms"><i class="fas fa-phone text-primary p-1"></i> ارسال پیامک به مخاطبین فوق </button>
                                </div>
                            </form>';

                }else{
                    echo '<div class="result col-12 text-center text-danger"><p class="my-4 iranSans p-1">هیچ نتیجه ای بر اساس معیار های جستجو یافت نشد.</p></div>';
                }                
            }    
        }
    }
}

?>