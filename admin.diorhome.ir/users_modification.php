<?php require "php/admin_expiration.php" ?>
<?php require "php/explorer_warning.php" ?>
<?php require 'php/delete_user.php' ?>

<?php 
    session_start();
    expiration_test();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline';
        img-src 'self' https://diorhome.ir;
        font-src 'self' diorhome.ir;
        frame-src https://www.google.com;
        "  >
    <meta name="description"    content=" کاربران ادمین محترم از این پنل می توانند تمامی اطلاعات کاربری یوزر های پیشگامان پودینه آتا را اطلاح و بازنگری کنند." />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="60x60" href="https://diorhome.ir/images/fav_icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://diorhome.ir/images/fav_icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://diorhome.ir/images/fav_icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://diorhome.ir/images/fav_icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://diorhome.ir/images/fav_icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://diorhome.ir/images/fav_icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://diorhome.ir/images/fav_icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://diorhome.ir/images/fav_icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="https://diorhome.ir/images/fav_icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://diorhome.ir/images/fav_icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://diorhome.ir/images/fav_icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://diorhome.ir/images/fav_icon/favicon-16x16.png">
    <link rel="manifest" href="https://diorhome.ir/images/fav_icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://diorhome.ir/images/fav_icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- font awesome -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/Normalizer.css">
    <link rel="stylesheet" href="CSS/fonts.css">
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/users_modification.css">

    <title>سامانه ادمین پیشگامان پودینه آتا - اصلاح اطلاعات کاربری</title>
</head>
<body>
    <header>
        <div class="logo-section px-2 py-4">
            <img src="https://diorhome.ir/images/Dior_logo.jpg" alt="لوگوی پیشگامان پودینه آتا">
        </div>
    </header>
    <main>
        <table class="table table-striped container">
            <caption>کاربری: <?php echo $username; ?> - کد شناسایی: <?php echo $user_ID;?><caption>
            <!-- user's general info section: -->
            <tr>
                <th class="col-2"><p class="m-0 py-1">نام:</p></td>
                <th class="col-2"><p class="m-0 py-1">نام خانوادگی:</p></td>
                <th class="col-2"><p class="m-0 py-1">سن:</p></td>
                <th class="col-2"><p class="m-0 py-1">جنسیت:</p></td>
                <th class="col-2"><p class="m-0 py-1">نام کاربری:</p></td>
                <th class="col-2"><p class="m-0 py-1">رمز عبور:</p></th>
            </tr>
            <tr>
                <td class="col-2"><p class="m-0 py-1"><?php echo $firstname; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $lastname; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $age; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $gender; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $username; ?></p></td>
                <td class="col-2"><p class="m-0 py-1">تغییر رمز عبور</p></td>
            </tr>
            <tr>
                <td class="col-2"><p class="m-0 py-1">وضعیت تایید:</p></td>
                <td class="col-2"><p class="m-0 py-1">کد ثبت نام:</p></td>
                <td class="col-2"><p class="m-0 py-1">کد فراموشی رمز:</p></td>
                <td class="col-2"><p class="m-0 py-1">غیر فعال:</p></td>
                <td class="col-2"><p class="m-0 py-1">خبرنامه:</p></td>
                <td class="col-2"><p class="m-0 py-1">کاربر ادمین:</p></td>
            </tr>
            <tr>
                <td class="col-2"><p class="m-0 py-1"><?php echo $verified; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $sign_up_token; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $forgot_password_token; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $disabled; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $newsletter; ?></p></td>
                <td class="col-2"><p class="m-0 py-1"><?php echo $administrator; ?></p></td>

            </tr>
            <tr>
                <td colspan="3" class=""><p class="m-0 py-1"> آدرس ایمیل:</p></td>
                <td colspan="3" class=""><p class="m-0 py-1">آدرس پستی:</p></td>
            </tr>
            <tr>
                <td colspan="3" class=""><p class="m-0 py-1"><?php echo $email_address; ?></p></td>
                <td colspan="3" class=""><p class="m-0 py-1"><?php echo $home_address; ?></p></td>

            </tr>
        </table>
        <!-- in case of a delete query: -->
        <?php if(isset($delete_warning)){
        ?>
            <div class="delete-warning p-2" id="delete-warning">
                <div class="center p-4 target">
                    <p class="text-center text-danger m-0 icon align-items-baseline pb-2 target"><i class="fas fa-exclamation-triangle text-warning target"></i></p>
                    <p class="text-center text-light iranSans py-2 target"><?php echo $delete_warning; ?></p>
                    <div class="button-container d-flex justify-content-around target">
                        <button class="btn btn-primary iranSans target" id="noclose" >بيخيال</button>
                        <button class="btn btn-danger iranSans target">مطمئنم</button>
                    </div>
                </div>
            </div>
        <?php
        } ?>
    </main>
    <footer>
    
    </footer>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/delete_user.js"></script>
</body>
<?php
    
?>