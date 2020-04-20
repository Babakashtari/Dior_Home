<?php require "php/admin_expiration.php" ?>
<?php require "php/explorer_warning.php" ?>
<?php require 'php/user_search_analysis.php' ?>

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
    <meta name="description"    content="  - بازیابی گذرواژه سايت رسمی ‍پیشگامان پودينه آتا" />
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
    <link rel="stylesheet" href="CSS/signed_in_admin.css">

    <title>Admin Panel</title>
</head>
<body>
    <main class="p-md-3">
        <section class="users-info">
            <h3 class="iranSans">جستجوی کاربران</h3>
            <div class="search_criteria row text-right p-1">
                <h5 class="text-center col-12 iranSans">جستجو بر اساس:</h5>
                <?php users_search_criteria(); ?>
            </div>
            <form class="row my-2 p-2 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name']) && !empty($_POST['first_name'])){echo htmlentities($_POST['first_name']) ;} ?>" placeholder="نام" oninput="validate(/^[A-Z][a-z]{2,}$/, this)">
                    <p class="displayNone text-danger iranSans">نام باید به لاتين باشد با حرف بزنگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name']) && !empty($_POST['last_name'])){echo htmlentities($_POST['last_name']) ;} ?>" placeholder="نام خانوادگی" oninput="validate(/^[A-Z][a-z]{2,}$/, this)">
                    <p class="displayNone text-danger iranSans">نام خانوادگی باید با حروف بزنگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>

                </div>
                <div class="form-group col-12 displayNone">
                    <input type="number" class="form-control" name="age" id="age" value="<?php if(isset($_POST['age']) && !empty($_POST['age'])){echo htmlentities($_POST['age']) ;} ?>" placeholder="سن" oninput="validate(/^(([1][2-9])|([2-7][0-9]))$/, this)">
                    <p class="displayNone text-danger iranSans">تنها اعداد بین 12 و 80 قابل قبول هستند.</p>

                </div>
                <div class="form-group col-12 displayNone">
                    <select class="p-1 col-12 iranSans" name="gender" id="gender" value="<?php if(isset($_POST['gender']) && !empty($_POST['gender'])){echo htmlentities($_POST['gender']) ;} ?>" onchange="validate(/^(male)|(female)$/, this)">
                        <option value="">جنسیت</option>
                        <option value="male">مذکر</option>
                        <option value="female">مونث</option>
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="username" id="username" value="<?php if(isset($_POST['username']) && !empty($_POST['username'])){echo htmlentities($_POST['username']) ;} ?>" placeholder="نام کاربری" oninput="validate(/^[A-Z][a-z0-9]{2,}$/, this)">
                    <p class='displayNone text-danger iranSans'>نام کاربری باید به حروف لاتین باشد، حداقل 3 حرف داشته باشد و با حروف بزرگ آغاز شود.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($_POST['email']) && !empty($_POST['email'])){echo htmlentities($_POST['email']) ;} ?>" placeholder="ایمیل" oninput="validate(/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/, this)">
                    <p class='displayNone text-danger iranSans'>آدرس ایمیل معتبر نیست.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="home_address" id="home_address" value="<?php if(isset($_POST['home_address']) && !empty($_POST['home_address'])){echo htmlentities($_POST['home_address']) ;} ?>" placeholder="آدرس منزل" oninput="validate(/.*/, this)">
                    <p class="displayNone text-danger iranSans"></p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="landline" id="landline" value="<?php if(isset($_POST['landline']) && !empty($_POST['landline'])){echo htmlentities($_POST['landline']) ;} ?>" placeholder="تلفن ثابت" oninput="validate(/^0[0-9]{7,}$/, this)">
                    <p class="displayNone text-danger iranSans">شماره تلفن را با پیش شماره شهر وارد کنید.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" value="<?php if(isset($_POST['mobile_phone']) && !empty($_POST['mobile_phone'])){echo htmlentities($_POST['mobile_phone']) ;} ?>" placeholder="موبایل" oninput="validate(/^09\d{9}$/, this)">
                    <p class='displayNone text-danger iranSans'>تلفن باید فقط از عدد تشکیل شود. 09 ابتدای آن بیاید و 11 رقم داشته باشد.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <select class="p-1 col-12 iranSans" name="verified" id="verified" onchange="validate(/^(YES)|(NO)$/, this)">
                        <option value="" <?php if(!isset($_POST['verified']) || empty($_POST['verified'])) echo 'selected'; ?> >وضعیت تایید کاربر</option>
                        <option value="YES" <?php if(isset($_POST['verified']) && $_POST['verified'] == 'YES') echo 'selected'; ?> >تایید شده</option>
                        <option value="NO" <?php if(isset($_POST['verified']) && $_POST['verified'] == 'NO') echo 'selected'; ?> >تایید نشده</option>
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <select class="p-1 col-12 iranSans" name="newsletter" id="newsletter" onchange="validate(/^(YES)|(NO)$/, this)">
                        <option value="" <?php if(!isset($_POST['newsletter']) || empty($_POST['newsletter'])) echo "selected"; ?> >خبرنامه</option>
                        <option value="YES" <?php if(isset($_POST['newsletter']) && $_POST['newsletter'] == 'YES') echo "selected"; ?> >آبونمان شده</option>
                        <option value="NO" <?php if(isset($_POST['newsletter']) && $_POST['newsletter'] == 'NO') echo "selected"; ?>>آبونمان نشده</option>
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <select class="p-1 col-12 iranSans" name="administrator" id="administrator" onchange="validate(/^(YES)|(NO)$/, this)">
                        <option value="" <?php if(!isset($_POST['administrtor']) || empty($_POST['administrator'])) echo 'selected'; ?> >نوع کاربری</option>
                        <option value="YES" <?php if(isset($_POST['administrator']) && $_POST['administrator'] == "YES") echo 'selected'; ?> >ادمین</option>
                        <option value="NO" <?php if(isset($_POST['administrator']) && $_POST['administrator'] == "NO") echo 'selected'; ?> >عادی</option>
                    </select>
                </div>
                <input type="submit" class="iranSans btn btn-primary displayNone" name="user_search" value="جستجو"></input>
            </form> 
            <div class="result">
                <?php search_result(); ?>
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
    <script src="JS/explorer_warning.js"></script>
</body>
</html>