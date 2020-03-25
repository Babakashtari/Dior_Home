            <div class="general-info p-3">
                <h5 class="iranSans">اطلاعات عمومی:</h5>
                <table class="table table-dark">
                    <tr>
                        <td rowspan="6" class="header">
                            <p class="iranSans pb-0">اطلاعات عمومی</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">ردیف</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">1</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">نام</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">Babak</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">نام خانوادگی</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">Ashtari</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">نام کاربری</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">Babak1366</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">رمز عبور</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">joli1366</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="contact-info p-3">
                <h5 class="iranSans">اطلاعات تماس:</h5>
                <table class="table table-dark">
                    <tr>
                        <td rowspan="6" class="header">
                            <p class="iranSans pb-0">اطلاعات تماس</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">ردیف</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">1</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">آدرس ایمیل</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">ashtaribabak@rocketmail.com</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">تلفن ثابت</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">02177822661</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">موبایل</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">mobile</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">آدرس پستی</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">تهران خیابان دماوند خیابان شهید یونسیان خیابان شهید امینی پلاک 50 واحد 12</p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="miscellaneous p-3">
                <h5 class="iranSans">اطلاعات تکمیلی:</h5>
                <table class="table table-dark">
                    <tr>
                        <td>
                            <p class="iranSans pb-0">ردیف</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">1</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">سن</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">32</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">جنسیت</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">male</p>
                        </td>
                    </tr>
                    <tr>
                        <td>                            
                            <p class="iranSans pb-0">وضعیت تایید</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">YES</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">خبرنامه</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">YES</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="iranSans pb-0">آدرس وبسایت</p>
                        </td>
                        <td>
                            <p class="iranSans pb-0">www.diorhome.ir</p>
                        </td>
                    </tr>
                </table>
            </div>

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

    if(isset($_POST['user_search'])){
        $error = "none";
        $keys = [];
        $values = [];
        if(!empty($_POST['first_name'])){
            $first_name = test_input($_POST["first_name"], "/^[A-Z][a-z]{2,}$/");
            if(!empty($first_name)){
                array_push($keys, "first_name");
                array_push($values, $first_name);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">نام درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['last_name'])){
            $last_name = test_input($_POST["last_name"], "/^[A-Z][a-z]{2,}$/");
            if(!empty($last_name)){
                array_push($keys, "last_name");
                array_push($values, $last_name);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-center text-danger px-4 iranSans">نام خانوادگی درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['age'])){
            $age = test_input($_POST["age"], "/^(([1][2-9])|([2-7][0-9]))$/");
            if(!empty($age)){
                array_push($keys, "age");
                array_push($values, $age);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">سن درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['gender'])){
            $gender = test_input($_POST["gender"], "/^(male)|(female)$/");
            if(!empty($gender)){
                array_push($keys, "gender");
                array_push($values, $gender);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-center text-danger px-4 iranSans">جنسیت درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['username'])){
            $username = test_input($_POST["username"], "/^[A-Z][a-z0-9]{2,}$/");
            if(!empty($username)){
                array_push($keys, "username");
                array_push($values, $username);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">نام کاربری درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['email'])){
            $email = test_input($_POST["email"], "/^[a-z0-9]{3,}@[a-z]{3,}\.[a-z]{0,3}$/");
            if(!empty($email)){
                array_push($keys, "email");
                array_push($values, $email);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">ایمیل درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['home_address'])){
            $home_address = test_home_address($_POST["home_address"]);
            if(!empty($home_address)){
                array_push($keys, "home_address");
                array_push($values, $home_address);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">آدرس پستی منزل درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['landline'])){
            $landline = test_input($_POST["landline"], "/^0[0-9]{7,}$/");
            if(!empty($landline)){
                array_push($keys, "landline");
                array_push($values, $landline);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">تلفن ثابت درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['mobile_phone'])){
            $mobile_phone = test_input($_POST["mobile_phone"], "/^09[0-9]{9}$/");
            if(!empty($mobile_phone)){
                array_push($keys, "mobile_phone");
                array_push($values, $mobile_phone);    
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="signing-message text-danger text-center px-4 iranSans">شماره موبایل درست وارد نشده است.</p>';
                $error = "YES";
            }
        }
        if(!empty($_POST['verified'])){
            array_push($keys, "verified");
            array_push($values, "YES");
        }
        if(!empty($_POST['newsletter'])){
            array_push($keys, "newsletter");
            array_push($values, "YES");
        }
        if(!empty($_POST['administrator'])){
            array_push($keys, "administrator");
            array_push($values, "YES");
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
                $number_of_rows_per_page = 3;
                $total_number_of_pages = ceil($total_number_of_rows / $number_of_rows_per_page);
                if(!empty($_GET['page_number'])){
                    $page_number = $_GET['page_number'];
                }else{
                    $page_number = 1;
                }
                // show only $number_of_rows_per_page and start from $page_number -1 * number_of_rows_per_page:
                $offset = ($page_number - 1) * $number_of_rows_per_page;
                $query .= " LIMIT " . $offset . "," . $number_of_rows_per_page;
        
                $result_array = mysqli_fetch_assoc($query_result);

                echo "<p style='direction:ltr;'>$query</p>";
            }    
        }
    }
?>