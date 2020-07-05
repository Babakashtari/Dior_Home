<?php require "php/admin_expiration.php" ?>
<?php require 'php/explorer_warning.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"    content="  - بازیابی گذرواژه سايت رسمی ‍پیشگامان پودينه آتا" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline';
        img-src 'self' https://diorhome.ir;
        font-src 'self' https://diorhome.ir;
        frame-src https://www.google.com;
        "  >

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

    <meta name="description"    content="  - بازیابی گذرواژه سايت رسمی ‍پیشگامان پودينه آتا" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/Normalizer.css">
    <link rel="stylesheet" href="CSS/fonts.css">
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/index.css">

    <title>Admin Panel - login</title>
</head>
<body>
    <main class=" row d-flex justify-content-center align-items-center">
        <section class="col-7 col-sm-6 col-md-5 col-lg-4 col-xl-3">
            <div class="text-center py-1 pt-3">
                <img src="https://diorhome.ir/images/Dior_logo.jpg" alt="لوگوی پیشگامان پودینه آتا">
            </div>
            <h5 class="iranSans text-center px-1 py-2">پنل ادمین</h5>
            <form class="pb-2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="errors">
                    <?php require "php/login_analysis.php" ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control iranSans" name="username" id="username" placeholder="نام کاربری" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username']);} ?>" oninput="validate(/^[A-Z][a-z0-9]{2,}$/,this)">
                  <p class='iranSans pt-1 displayNone'>نام کاربری باید به حروف لاتین باشد، حداقل 3 حرف داشته باشد و با حروف بزرگ آغاز شود.</p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control iranSans" name="password" id="password" placeholder="رمز عبور" value="<?php if(isset($_POST['password'])){echo htmlentities($_POST['password']);} ?>" oninput="validate(/^[a-zA-Z0-9]{5,15}$/, this)">
                    <p class='iranSans pt-1 displayNone'> رمز باید حداقل 5 و حداکثر 15 کاراکتر و شامل اعداد و حروف بزرگ یا کوچک باشد.</p>
                </div>
                <input name="submit" class="iranSans btn btn-primary col-12" type="submit" value="ورود" disabled>
            </form>
            <div class="link-container iranSans row text-right py-2">
                <a href="https://diorhome.ir/forgot.php" class="col-12 text-center">رمز عبورم را فراموش کرده ام</a>
                <a href="https://diorhome.ir/index.php" class="col-12 text-center">برو به صفحه اصلی</a>
                <a href="https://diorhome.ir/login.php" class="col-12 text-center">کاربر عادی هستم</a>
            </div>
        </section>
        <?php show_warning(); ?>
    </main>
    <script src="JS/index.js"></script>
    <script src="JS/explorer_warning.js"></script>
</body>
</html>