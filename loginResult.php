<?php

function signing_validation(){
    if($_POST['login_username']!== "" && $_POST['login_password']!==""){
        echo '
        <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
        <p class="signing-message text-success px-4 displayNone">' . $_POST['login_username'] . ' عزیز خوش آمدید . </p>            
            ';
    }
    else if($_POST['signup_username']!=="" && $_POST['signup_password']!=="" && $_POST['signup_email']!=="" && $_POST['signup_phone']!==""){
        echo '
        <p class="text-success pt-4 pb-1 displayNone"><span class=" fa fa-check" aria-hidden="true"></span></p>
        <p class="signing-message text-success px-4 displayNone">' . $_POST['signup_username'] . ' عزیز، ثبت نام شما با موفقیت انجام شد. برای ادامه از لینک های زیر استفاده کنید.</p>            
            ';
    }
}
signing_validation();
?>