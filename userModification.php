<?php require "php/code_functions.php" ?>
<?php require "php/expiration.php" ?>
<?php require 'php/explorer_warning.php' ?>
<?php 
    session_start(); 
    expiration_check();
?>
<!DOCTYPE html lang="fa">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-security-policy" content="default-src 'self'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline';
        img-src 'self';
        font-src 'self';
        frame-src https://www.google.com;
        "  >
    <meta name="description"    content="صفحه ثبت و نگهداری اطلاعات مشتریان شرکت پیشگامان پودینه آتا" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/fav_icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/fav_icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/fav_icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/fav_icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/fav_icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/fav_icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/fav_icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/fav_icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/fav_icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/fav_icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/fav_icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/fav_icon/favicon-16x16.png">
    <link rel="manifest" href="images/fav_icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/fav_icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- font awesome -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/Normalizer.css">
    <link rel="stylesheet" href="Css/fonts.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/userSignedIn.css">
    <title>پيشگامان پودينه - تکمیل اطلاعات کاربری</title>
</head>
<body>
    <?php head(); ?>
    <main>
        <section class="image-container container-fluid p-0 d-flex align-items-center justify-content-center">
            <img src="images/user_info_update/supplementary_info.jpg" alt="ثبت اطلاعات تکمیلی کاربران پیشگامان پودینه آتا">
            <div class="top">
                <p class="py-4 px-3 text-center">تکمیل اطلاعات کاربران</p>
            </div>
            <div class="center">
                <p class="py-4 px-3 text-center">اطلاعات دقیق تر، خدمات بهتر</p>
            </div>
        </section>
        <section class="text container text-justify p-5 mt-4">
            <p>کاربران گرامی، ضمن تشکر از همکاری شما و زمانی که برای تکمیل اطلاعات خود در وبسایت ما می گذارید، لطفا توجه داشته باشید که هر چه اطلاعاتتان دقیق تر و به روزتر باشد، ما را در ارائه خدمات بهتر و با کیفیت تر یاری می کنید. لذا در این راستا خواهشمند است:</p>
            <ol class="pr-3">
                <li><p>هرگونه تغییر در شماره تماس و یا آدرس پستی خود را در اسرع وقت از طریق فرم اطلاعات تماس با ما در میان بگذارید.</p></li>
                <li><p>هر چند وقت یکبار رمز عبور خود را از طریق فرم اطلاعات کاربری تغییر دهید. </p></li>
                <li><p>جهت دریافت خبرنامه آدرس ایمیل خود را تایید فرمایید و به ما اجازه دهید تا برایتان آخرین تخفیف ها و پیشنهادات ویژه را ارسال کنیم. </p></li>
                <li><p>موارد ستاره دار الزامی هستند.</p></li>
            </ol>
        </section>
        <section class="form-container container-fluid pt-5 ">
            <!-- form elements are generated here: -->
            <?php user_modification_form_generator(); ?>
        </section>
        <section class="validation-result text-center displayNone">
        <!-- validation results are shown in this div: -->
            <div></div>
        </section>
        <?php show_warning(); ?>
    </main>
    <?php footer_generator();?>

    <?php canvas_generator(); ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/userModification.js"></script>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/footer.js"></script>
</body>
</html>