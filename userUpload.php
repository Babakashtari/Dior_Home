<?php require "php/code_functions.php" ?>
<!-- <?php require "php/uploadResult.php" ?> -->
<!-- <?php session_start(); ?> -->
<!DOCTYPE html lang="fa">
<html lang="fa">
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
        <meta name="description"    content="ثبت سفارش طرح و الگو جهت چاپ دیجیتالی و سابلیمیشن روی پارچه توسط کاربر. سفارش آنلاین چاپ دیجیتالی و سابلیمیشن " />
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
        <link rel="stylesheet" href="CSS/userUpload.css">

    <title>پیشگامان پودینه - ثبت سفارش</title>
</head>
<body>
    <?php head(); ?>
    <main>
    <!-- photo container section: -->
        <section class="container-fluid px-0 position-relative photo-container">
            <img class="border border-dark" src="images/user_upload_images/user_upload.jpg" alt="ثبت سفارش آنلاین تابلوفرش روتختی رو بالشی و...">
            <h3 class="position-absolute p-1 p-3">سفارش از شما</h3>
            <h3 class="position-absolute p-1 p-3">تولید با کیفیت و مرغوب از ما</h3>
        </section>
        <section class="result">
            <div>
                <!-- result of the file submitting will go here -->
                <!-- <?php require "php/uploadResult.php"; ?> -->
                <!-- <?php showResult(); ?> -->
            </div>
        </section>
        <section class="file-upload container">
            <fieldset>
            <form method="POST" action="php/uploadResult.php">
            <!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
                <div class="form-group">
                    <label class="text-light" for="file_name">نام سفارش:</label>
                    <input type="text" class="form-control" id="file_name" name="file_name" placeholder="نام طرح چاپی">
                </div>
                <div class="form-group">
                    <label class="text-light" for="dimensions">ابعاد:</label>
                    <input type="text" class="form-control" id="dimensions" name="dimensions" placeholder="ابعاد طرح چاپی مورد نظر">
                </div>
                <div class="form-group">
                    <label class="text-light" for="category">گروه مربوطه:</label>
                    <select class="form-control" id="category" name="category" onchange="subcategory_generator(this)">
                        <option value="">انتخاب کنید</option>
                        <option value="sleeping_products">کالای خواب</option>
                        <option value="living_room_products">کالای اتاق پذیرایی</option>
                        <option value="carpet_products">فرش</option>
                    </select>
                </div>
                <div class="form-group sub displayNone">
                    <label class="text-light" for="subcategory">زیر گروه مربوطه:</label>
                    <select class="form-control" id="subcategory" name="subcategory">
                        <!-- subcategory option elements are generated here via javascript -->
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-light" for="file">فایلتان را از اینجا انتخاب کنید:</label>
                    <input type="file" class="form-control" id="uploadingfile" name="uploadingfile" enctype="multipart/form-data">
                </div>
                    <input class="btn btn-primary" id="submit" name="submit" type="submit" value="ارسال">
                </form>            
            </fieldset>
        </section>
    </main>

    <?php footer_generator();?>
    <?php canvas_generator(); ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/footer.js"></script>
    <script src="JS/userUpload.js"></script>
</body>
</html>