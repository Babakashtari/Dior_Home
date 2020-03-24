<?php require "../php/expiration.php" ?>
<?php require '../php/explorer_warning.php' ?>
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
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="../CSS/Normalizer.css">
    <link rel="stylesheet" href="../CSS/fonts.css">
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
            <form class="row my-2 p-2 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="نام">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="نام خانوادگی">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="number" class="form-control" name="age" id="age" placeholder="سن">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="gender" id="gender" placeholder="جنسیت">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="home_address" id="home_address" placeholder="آدرس منزل">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="landline" id="landline" placeholder="تلفن ثابت">
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" placeholder="موبایل">
                </div>
                <div class="checkbox col-4 displayNone">
                    <label for="verified"><input type="checkbox" id="verified" name="verified"> کاربر تایید شده</label>
                </div>
                <div class="checkbox col-4 displayNone">
                    <label for="newsletter"><input type="checkbox" id="newsletter" name="newsletter"> خبرنامه</label>
                </div>
                <div class="checkbox col-4 displayNone">
                    <label for="administrator"><input type="checkbox" id="administrator" name="administrator">ادمین</label>
                </div>
                <button type="submit" class="btn btn-primary displayNone">جستجو</button>
            </form> 
            <div class="general-info p-3">
                <h5 class="iranSans">اطلاعات عمومی:</h5>
                <table class="table table-dark">
                    <thead>
                        <th>
                            <p class="iranSans pb-0">ردیف</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">نام</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">نام خانوادگی</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">نام کاربری</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">رمز عبور</p>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="contact-info p-3">
                <h5 class="iranSans">اطلاعات تماس:</h5>
                <table class="table table-dark">
                    <thead>
                        <th>
                            <p class="iranSans pb-0">ردیف</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">آدرس ایمیل</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">تلفن ثابت</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">موبایل</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">آدرس پستی</p>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="miscellaneous p-3">
                <h5 class="iranSans">اطلاعات تکمیلی:</h5>
                <table class="table table-dark">
                    <thead>
                        <th>
                            <p class="iranSans pb-0">ردیف</p>
                        </th>

                        <th>
                            <p class="iranSans pb-0">سن</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">جنسیت</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">وضعیت تایید</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">خبرنامه</p>
                        </th>
                        <th>
                            <p class="iranSans pb-0">آدرس وبسایت</p>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                            <td>
                                <p class="iranSans"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
            <form class="row my-2 p-2 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                <button type="submit" class="btn btn-primary displayNone">جستجو</button>
            </form> 
        </section>
    </main>
    <script src="JS/signed_in_admin.js"></script>
</body>
</html>