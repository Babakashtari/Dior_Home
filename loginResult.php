<?php

function signing_validation(){
    echo    '
    <div class="p-4">
    <!-- validation pending spinners -->
        <div class=" spinner-grow text-muted"></div>
        <div class=" spinner-grow text-primary"></div>
        <div class=" spinner-grow text-success"></div>
            ';
    if($_POST['login_username']!== "" && $_POST['login_password']!==""){
        echo '
        <p class="text-success"><span class=" fa fa-check" aria-hidden="true"></span></p>
        <p class="signing-message text-success">' . $_POST['login_username'] . ' عریز خوش آمدید . </p>            
    </div>
            ';
    }
    else if($_POST['signup_username']!=="" && $_POST['signup_password']!=="" && $_POST['signup_email']!=="" && $_POST['signup_phone']!==""){
        echo '
        <p class="text-success"><span class=" fa fa-check" aria-hidden="true"></span></p>
        <p class="signing-message text-success">' . $_POST['signup_username'] . 'عزیر، ثبت نام شما با موفقیت انجام شد. برای ادامه از لینک های زیر استفاده کنید.</p>            
    </div>
            ';

    }
}
signing_validation();
function login_validation(){

}
?>