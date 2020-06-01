<?php require "php/code_functions.php" ?>
<?php require 'php/explorer_warning.php' ?>
<?php 
    session_start();

    // when user is headed towards login.php page via another page which requires logging in:
    if(!empty($_SESSION['user_username']) && !empty($_SESSION['location'])){
        header("location:". $_SESSION['location']);
    }
    // when user logs in in the same login.php page:
    if(!empty($_SESSION['user_username']) && empty($_SESSION['location'])){
        header("location:userModification.php");
    }
?>
<!DOCTYPE html lang="fa">
<html lang="fa">
    <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155871160-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155871160-2');
</script>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="content-security-policy" content="default-src 'self'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline' https://google-analytics.com;
        img-src 'self';
        font-src 'self';
        frame-src https://www.google.com;
        "  >
        <meta name="description"    content="جهت ثبت سفارش، خريد كالا و يا درخواست خدمات در سايت پيشگامان پودينه آتا ثبت نام كنيد" />
        <meta name="author" content="Babak Ashtari" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- for SEO purposes -->
        <!-- open graph meta tags for SEO -->
        <meta property="og:title" content="پيشگامان پودينه آتا - ورود" />
        <meta property="og:site_name" content="پيشگامان پودينه آتا" />
        <meta property="og:url" content="..." />
        <meta property="og:description"    content="ثبت نام كاربران جهت ثبت سفارش،‌خريد كالا و درخواست خدمات در سايت پيشگامان پودينه آتا" />
        <meta property="og:locale:alternate" content="fa_IR" />
        <meta property="og:type" content="product" />
        <meta property="og:image" content="..." />

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
        <link rel="stylesheet" href="CSS/contact_us_modal.css">
        <link rel="stylesheet" href="CSS/explorer_warning.css">
        <link rel="stylesheet" href="CSS/login.css">
        <title>پيشگامان پودينه - ورود</title>
    </head>
<body>
    <?php head(); ?>
    <main class="pb-5">
        <section class="photo-container d-flex align-items-center justify-content-center">
            <img src="images/login_page_images/signin_main_image2.jpg" alt="ورود به سایت با نام کاربری" >
            <div><p class="text-center px-3 py-4 m-0">ثبت نام کنید تا از خدمات مجازی سایت پیشگامان پودینه آتا بهره مند شوید.</p></div>
        </section>
        <section class="welcome py-4 px-2">
            <div class="container pt-5">
                <p class="">ضمن خیر مقدم خدمت کاربران جدید، لطفا ثبت نام کنید تا قابلیت هایی چون <a href="userUpload.php">ثبت سفارش</a> <a href="#">پیگیری سفارش،</a><a href="#"> ثبت آدرس،</a> و <a href="#">خرید اینترنتی</a> ، برایتان فراهم شود.</p>
                <p class="">اگر قبلا ثبت نام کرده اید، با نام کاربری و رمز عبورتان وارد سایت شوید تا بتوانید از امکانات تحت وب پیشگامان پودینه آتا بهره مند شوید. </p>
            </div>
        </section>
        <section class="signing container my-5">
            <div class="row p-2 d-flex justify-content-around">
                <!-- signup form -->
                <fieldset class="col col-12 col-sm-5 my-4 signup">
                    <legend class="text-center text-light">ثبت نام:</legend>
                    <form action="#" method="post" class="p-1 text-right text-light">
                        <div class="form-group">
                            <label for="username">نام كاربری:</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Babak" oninput="validate(/^[A-Z][a-z0-9]{2,}$/,this)">
                            <p class='displayNone'>نام کاربری باید به حروف لاتین باشد، حداقل 3 حرف داشته باشد و با حروف بزرگ آغاز شود.</p>
                        </div>
                        <div class="form-group">
                            <label for="pass">رمز عبور:</label>
                            <input class="form-control" type="password" id="pass" name='pass' placeholder="Babak123" oninput="validate(/^[a-zA-Z0-9]{5,15}$/, this)">
                            <p class='displayNone'> رمز باید حداقل 5 و حداکثر 15 کاراکتر و شامل اعداد و حروف بزرگ یا کوچک باشد.</p>
                        </div>
                        <div class="form-group">
                            <label for="email">آدرس ایمیل:</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="babak@yahoo.com" oninput="validate(/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/, this)">
                            <p class='displayNone'>آدرس ایمیل معتبر نیست.</p>
                        </div>  
                        <div class="form-group">
                            <label for="mobile_phone"> تلفن همراه:</label>
                            <input class="form-control" type="text" name="signup_mobile_phone" id="signup_mobile_phone" placeholder="09127621031" oninput="validate(/^09\d{9}$/, this)">
                            <p class='displayNone'>تلفن باید فقط از عدد تشکیل شود. 09 ابتدای آن بیاید و 11 رقم داشته باشد.</p>
                        </div>
                        <input class="signup btn btn-success p-1" type="submit" value="ارسال" disabled onclick="signing_validation(event)">
                    </form>
                </fieldset>
                <!-- signin form: -->
                <fieldset class="col col-12 col-sm-5 my-4 signin">
                    <legend class="text-center text-light">ورود:</legend>
                    <form action="#" method="post" class="p-1 text-right text-light">
                        <div class="form-group">
                            <label for="username">نام كاربری:</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Babak" oninput="validate(/^[A-Z][a-z0-9]{2,10}$/, this)">
                            <p class='displayNone'>نام کاربری باید به حروف لاتین باشد، حداقل 3 حرف داشته باشد و با حروف بزرگ آغاز شود.</p>
                        </div>
                        <div class="form-group">
                            <label for="pass">رمز عبور:</label>
                            <input class="form-control" type="password" id="pass" name='pass' placeholder="Babak123" oninput="validate(/^[a-zA-Z0-9]{5,15}$/, this)">
                            <p class='displayNone'>رمز باید حداقل 8 کاراکتر و شامل اعداد و حروف بزرگ یا کوچک باشد.</p>
                        </div>
                        <input class="login btn btn-primary p-1" type="submit" value="ارسال" disabled onclick="signing_validation(event)" >
                    </form>
                    <div class=" text-right p-2">
                        <a class="text-light" href="forgot.php">رمز عبور خود را فراموش کرده ام</a>
                    </div>
                </fieldset>
            </div>
        </section>
        <section class="validation-result text-center displayNone">
        <!-- ajax call loads results in this div: -->
            <div></div>
        </section>
        <?php show_warning(); ?>
    </main>
    <?php contact_us_modal(); ?>
    <?php footer_generator();?>
    <?php canvas_generator(); ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/login.js"></script>
    <script src="JS/footer.js"></script>
</body>
</html>