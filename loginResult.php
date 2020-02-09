<?php session_start(); ?>
<div>                
    <!-- validation pending spinners -->
    <div class=" spinner-grow text-muted"></div>
    <div class=" spinner-grow text-primary"></div>
    <div class=" spinner-grow text-success"></div>
</div>

<?php
function login_page_validation(){
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login_username = test_input($_POST["login_username"], "/^[A-Z][a-z]{4,10}$/");
        $login_password = test_input($_POST["login_password"], "/^[a-zA-Z1-9]{5,15}$/");
        $signup_username = test_input($_POST["signup_username"], "/^[A-Z][a-z]{4,10}$/");
        $signup_password = test_input($_POST["signup_password"], "/^[a-zA-Z1-9]{5,15}$/");
        $signup_email = email_test_input($_POST["signup_email"]);
        $signup_phone = test_input($_POST['signup_phone'], "/^[0]\d{7,15}$/");
    
        if($login_username !== "" && $login_password !==""){
            echo '
            <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
            <p class="signing-message text-success px-4 displayNone">' . $login_username . ' عزیز خوش آمدید . </p>            
                ';
        }
        else if($signup_username !=="" && $signup_password !=="" && $signup_email !=="" && $signup_phone !==""){
            echo '
            <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
            <p class="signing-message text-success px-4 displayNone">' . $signup_username . ' عزیز، ثبت نام شما با موفقیت انجام شد. برای ادامه از لینک های زیر استفاده کنید.</p>            
                ';
        }
        // connecting to the database:
       $database = mysqli_connect("localhost", "root", "joli1366", "DiorHome");
       if(!$database){
           die('connection failed:'.mysqli_connect_error());
       }else{
            // check if the username and email already exists:
                $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
       }
    }    
}
login_page_validation();
?>