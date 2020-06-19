<?php require "php/code_functions.php" ?>
<?php require 'php/explorer_warning.php' ?>
<?php require 'php/copy_right.php' ?>

<!DOCTYPE html>
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
    <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline' https://www.google-analytics.com/analytics.js;
        img-src 'self' https://www.w3.org https://www.google.com.ua https://www.google.com https://www.google-analytics.com https://www.googletagmanager.com https://stats.g.doubleclick.net;
        font-src 'self';
        frame-src https://www.google.com;
        "  >
    <meta name="description"    content="بازیابی گذرواژه کاربران سایت برای دستیابی به خدمات مجازی از جمله خبرنامه و تبلیغات آنلاین پیشگامان پودينه آتا" />
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
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/copy_right.css">
    <link rel="stylesheet" href="CSS/forgot.css">
    <title>پیشگامان پودینه - بازیابی گذرواژه</title>
</head>
<body>
    <section class="form-section d-flex justify-content-center py-1 pt-sm-3">

        <fieldset>
            <img src="images/Dior_logo_small.jpg" alt="لوگوی پیشگامان پودینه آتا">
            <h3>بازیابی گذر واژه</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <?php require "php/forgot_password.php" ?>
                <div class="form-group ">
                    <label for="email_address">آدرس ایمیل خود را وارد کنید:</label>
                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="name@example.com" oninput="validate(/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/, this)">
                    <p class="displayNone">فرمت آدرس ایمیل درست وارد نشده است.</p>
                </div>
                <div class="form-group ">
                    <input class="btn btn-primary form-control" type="submit" name="submit" id="submit" value="بازیابی گذرواژه">
                </div>
                <div class="form-group">
                    <a href="login.php">ورود/ثبت نام</a>
                </div>
            </form>
        </fieldset>
    </section>
    <?php copy_right(); ?>

    <?php show_warning(); ?>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/copy_right.js"></script>
    <script src="JS/forgot.js"></script>
</body>
</html>