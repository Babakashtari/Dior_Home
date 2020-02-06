<?php require "php/code_functions.php" ?>

<!DOCTYPE html lang="fa">
<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline';
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
        <link rel="stylesheet" href="CSS/login.css">
        <title>پيشگامان پودينه - ورود</title>
    </head>
<body>
    <?php head(); ?>
    <main class="p-2">
        <section class="container my-4">
            <div class="row p-2 d-flex justify-content-around">
                <!-- signup form -->
                <fieldset class="col col-12 col-sm-5 my-4">
                    <legend class="text-center text-light">ثبت نام:</legend>
                    <form action="#" method="post" class="p-1 text-right text-light">
                        <div class="form-group">
                            <label for="username">نام كاربری:</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Babak">
                        </div>
                        <div class="form-group">
                            <label for="pass">رمز عبور:</label>
                            <input class="form-control" type="password" id="pass" name='pass' placeholder="Babak123">
                        </div>
                        <div class="form-group">
                            <label for="email">آدرس ایمیل:</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="babak@yahoo.com">
                        </div>  
                        <div class="form-group">
                            <label for="phone">شماره همراه:</label>
                            <input class="form-control" type="text" name="phone" id="phone" placeholder="02155158815">
                        </div>
                        <input class="p-1" type="submit" value="ارسال">
                    </form>
                </fieldset>
                <!-- signin form: -->
                <fieldset class="col col-12 col-sm-5 my-4">
                    <legend class="text-center text-light">ورود با حساب کاربری:</legend>
                    <form action="#" method="post" class="p-1 text-right text-light">
                        <div class="form-group">
                            <label for="username">نام كاربری:</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Babak">
                        <div class="form-group">
                            <label for="pass">رمز عبور:</label>
                            <input class="form-control" type="password" id="pass" name='pass' placeholder="Babak123">
                        </div>
                        <input class="p-1" type="submit" value="ارسال">
                    </form>
                    <div class=" text-right p-2">
                        <a class="text-light" href="#">رمز عبور خود را فراموش کرده ام</a>
                    </div>
                </fieldset>
            </div>

        </section>
    </main>
    <?php footer_generator();?>
    <?php canvas_generator(); ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/login.js"></script>
    <script src="JS/footer.js"></script>
</body>
</html>