<?php

function signing_validation(){
    if($_POST['login_username']!== "" && $_POST['login_password']!==""){
        echo '
        <p class="text-success p-1"><span class=" fa fa-check" aria-hidden="true"></span></p>
        <p class="signing-message text-success p-1">' . $_POST['login_username'] . ' عزیز خوش آمدید . </p>            
            ';
    }
    else if($_POST['signup_username']!=="" && $_POST['signup_password']!=="" && $_POST['signup_email']!=="" && $_POST['signup_phone']!==""){
        echo '
        <p class="text-success p-1"><span class=" fa fa-check" aria-hidden="true"></span></p>
        <p class="signing-message text-success p-1">' . $_POST['signup_username'] . 'عزیر، ثبت نام شما با موفقیت انجام شد. برای ادامه از لینک های زیر استفاده کنید.</p>            
            ';
    }
}
signing_validation();
?>