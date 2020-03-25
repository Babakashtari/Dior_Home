<?php require "../httpdocs/php/expiration.php" ?>
<?php require '../httpdocs/php/explorer_warning.php' ?>
<?php require "php/admin_expiration.php" ?>
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
        img-src 'self';
        font-src 'self';
        frame-src https://www.google.com;
        "  >
    <meta name="description"    content="  - بازیابی گذرواژه سايت رسمی ‍پیشگامان پودينه آتا" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="60x60" href="../httpdocs/images/fav_icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../httpdocs/images/fav_icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../httpdocs/images/fav_icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../httpdocs/images/fav_icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../httpdocs/images/fav_icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../httpdocs/images/fav_icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../httpdocs/images/fav_icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../httpdocs/images/fav_icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../httpdocs/images/fav_icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../httpdocs/images/fav_icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../httpdocs/images/fav_icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../httpdocs/images/fav_icon/favicon-16x16.png">
    <link rel="manifest" href="../httpdocs/images/fav_icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../httpdocs/images/fav_icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="../httpdocs/CSS/all.min.css">
    <link rel="stylesheet" href="../httpdocs/CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="../httpdocs/CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="../httpdocs/CSS/Normalizer.css">
    <link rel="stylesheet" href="../httpdocs/CSS/fonts.css">
    <link rel="stylesheet" href="CSS/signed_in_admin.css">

    <title>Admin Panel</title>
</head>
<body>
    <main class="p-md-3">
        <section class="users-info">
            <h3 class="iranSans">جستجوی کاربران</h3>
            <div class="search_criteria row text-right p-1">
                <h5 class="text-center col-12 iranSans">جستجو بر اساس:</h5>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id=""> نام</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">نام خانوادگی</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">سن</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">جنسیت</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">نام کاربری</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">ایمیل</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">آدرس منزل</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">تلفن ثابت</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans"><input type="checkbox" name="" id="">شماره موبایل</span>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans users-checkboxes"><input type="checkbox" name="users-checkboxes" id="">تایید ایمیل</s>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans users-checkboxes"><input type="checkbox" name="users-checkboxes" id="">خبرنامه</s>
                </div>
                <div class="iranSans col-6 col-sm-4 col-md-3 col-lg-2">
                    <span class="iranSans users-checkboxes"><input type="checkbox" name="users-checkboxes" id="">کاربر ادمین</s>
                </div>
            </div>
            <form class="row my-2 p-2 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="نام" oninput="validate(/^[A-Z][a-z]{2,}$/, this)">
                    <p class="displayNone text-danger iranSans">نام باید به لاتين باشد با حرف بزنگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>

                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="نام خانوادگی" oninput="validate(/^[A-Z][a-z]{2,}$/, this)">
                    <p class="displayNone text-danger iranSans">نام خانوادگی باید با حروف بزنگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>

                </div>
                <div class="form-group col-12 displayNone">
                    <input type="number" class="form-control" name="age" id="age" placeholder="سن" oninput="validate(/^(([1][2-9])|([2-7][0-9]))$/, this)">
                    <p class="displayNone text-danger iranSans">تنها اعداد بین 12 و 80 قابل قبول هستند.</p>

                </div>
                <div class="form-group col-12 displayNone">
                    <select class="p-1 col-12 iranSans" name="gender" id="gender" onchange="validate(/^(male)|(female)$/, this)">
                        <option value="">جنسیت</option>
                        <option value="male">مذکر</option>
                        <option value="female">مونث</option>
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری" oninput="validate(/^[A-Z][a-z0-9]{2,}$/, this)">
                    <p class='displayNone text-danger iranSans'>نام کاربری باید به حروف لاتین باشد، حداقل 3 حرف داشته باشد و با حروف بزرگ آغاز شود.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل" oninput="validate(/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/, this)">
                    <p class='displayNone text-danger iranSans'>آدرس ایمیل معتبر نیست.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="home_address" id="home_address" placeholder="آدرس منزل" oninput="validate(/.*/, this)">
                    <p class="displayNone text-danger iranSans"></p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="landline" id="landline" placeholder="تلفن ثابت" oninput="validate(/^0[0-9]{7,}$/, this)">
                    <p class="displayNone text-danger iranSans">شماره تلفن را با پیش شماره شهر وارد کنید.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" placeholder="موبایل" oninput="validate(/^09\d{9}$/, this)">
                    <p class='displayNone text-danger iranSans'>تلفن باید فقط از عدد تشکیل شود. 09 ابتدای آن بیاید و 11 رقم داشته باشد.</p>
                </div>
                <div class="checkbox col-4 displayNone">
                    <label for="verified"><input type="checkbox" id="verified" name="verified" value="YES"> کاربر تایید شده</label>
                </div>
                <div class="checkbox col-4 displayNone">
                    <label for="newsletter"><input type="checkbox" id="newsletter" name="newsletter" value="YES"> خبرنامه</label>
                </div>
                <div class="checkbox col-4 displayNone">
                    <label for="administrator"><input type="checkbox" id="administrator" name="administrator" value="YES">ادمین</label>
                </div>
                <input type="submit" class="iranSans btn btn-primary displayNone" name="user_search" value="جستجو"></input>
            </form> 
            <?php require 'php/user_search_analysis.php' ?>

            <div class="product-pagination">
<!-- pagination goes here -->
            </div>

        </section>
        <section class="products-info">
        <h3 class="iranSans">جستجوی محصولات</h3>
            <div class="search_criteria row text-right p-1">
                <h5 class="text-center col-12 iranSans">جستجو بر اساس:</h5>
                <div class="iranSans col-12 col-md-2">
                    <span class="iranSans"><input type="checkbox" name="product_name" id="product_name">نام </span>
                </div>
                <div class="iranSans col-12 col-md-2">
                    <span class="iranSans"><input type="checkbox" name="product_dimensions" id="product_dimensions">ابعاد</span>
                </div>
                <div class="iranSans col-12 col-md-2">
                    <span class="iranSans"><input type="checkbox" name="product_category" id="product_category">دسته بندی</span>
                </div>
                <div class="iranSans col-12 col-md-2">
                    <span class="iranSans"><input type="checkbox" name="product_subcategory" id="product_subcategory">زیرمجموعه</span>
                </div>
                <div class="iranSans col-12 col-md-2">
                    <span class="iranSans"><input type="checkbox" name="product_description" id="product_description">توضیحات</span>
                </div>
                <div class="iranSans col-12 col-md-2">
                    <span class="iranSans"><input type="checkbox" name="uploader_ID" id="uploader_ID">ارسال کننده</span>
                </div>

            </div>
            <form class="row my-2 p-2 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="نام محصول">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="product_dimensions" name="product_dimensions" placeholder="ابعاد">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="product_category" name="product_category" placeholder="دسته بندی">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="product_subcategory" name="product_subcategory" placeholder="زیرمجموعه">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="product_description" name="product_description" placeholder="توضیحات">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="uploader_ID" name="uploader_ID" placeholder="نام شخص ارسال کننده">
                </div>
                <input type="submit" class="iranSans btn btn-primary displayNone" value="جستجو"></input>
            </form> 
        </section>
    </main>
    <script src="JS/signed_in_admin.js"></script>
</body>
</html>