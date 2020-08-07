<?php require "php/admin_expiration.php"; ?>
<?php require "php/explorer_warning.php"; ?>
<?php require 'php/user_search_analysis.php'; ?>
<?php require 'php/products_search_analysis.php'; ?>
<?php require 'php/signed_in_admin_general_info.php'; ?>

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
        style-src 'self' 'unsafe-inline' https://www.gstatic.com; 
        script-src 'self' 'unsafe-inline'  https://www.gstatic.com;
        img-src 'self' https://diorhome.ir https://www.gstatic.com;
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
    <link rel="stylesheet" href="CSS/google_charts_styles.css">
    <link rel="stylesheet" href="CSS/signed_in_admin.css">


    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {
          'packages':['corechart']
      });

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawPieChart);
      google.charts.setOnLoadCallback(drawAreaChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawPieChart() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
          ['کاربر', 'تعداد'],
          ['ادمین',     2],
          ['عضوخبرنامه',  6],
          ['تایید نشده',      2],
          ['مسدود', 1],
          ['وبسایت داران',    3]
        ]);

        // Set chart options
        var options = {
            legend:{
                position:'labeled'
            },
            legendTextStyle:{
                    color:'blue',
                    fontSize:15,
                    fontName: 'iranSans'
            },
            title:'آمار کاربران پیشگامان پودینه آتا',
            titleTextStyle:{ 
                color: 'gray',
                fontName: 'iranSans',
                fontSize: 15,
                bold: true,
                width:"100%"
            },
            is3D: true,
            // pieHole: 0.4,
            pieSliceText: 'percentage',
            // backgroundColor: 'red',
            slices: {  
                2: {offset: 0.2},
                3: {offset: 0.4},
                // 14: {offset: 0.4},
                // 15: {offset: 0.5},
            },
            // pieStartAngle: 50,
            tooltip:{
                textStyle:{
                    color:"blue",
                    fontName:"iranSans"
                },
                showColorCode:true,
                isHTML:true,
                ignoreBounds:true

            },
            // width:650,
            // height:600,
            colors:['blue','lightgray','orange','red', 'rgb(0, 128, 0)'],
            chartArea: {
                left:'25%',
                top:20,
                width: '50%',
                height:150
            }
        }

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
        chart.draw(data, options);
      }
      function drawAreaChart(){
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('AreaChart'));
        chart.draw(data, options);

      }
    </script>

    <title>Admin Panel</title>
</head>
<body>
    <main class=" p-md-3">
        <div class="logo-section text-center py-1 py-3">
            <img src="https://diorhome.ir/images/Dior_logo.jpg" alt="لوگوی پیشگامان پودینه آتا">
            <p class="text-dark iranSans p-2 m-0">
                <?php echo $_SESSION['username']; ?> عزیز به پنل ادمین خوش آمدید. برای خروج <a class="text-danger" href="php/session_destroyer.php">اینجا</a> کلیک کنید.
            </p>
        </div>
         <!--Divs that will hold the charts-->
         <section class="charts-section row mx-0 my-2 mb-4">
            <div class="col-12 col-md-6 p-2" id="pie-chart"></div>
            <div class="col-12 col-md-6 p-2" id="AreaChart"></div>
         </section>

        <table class="users-general-info table table-striped iranSans text-center col-10 mx-auto border border-primary">
            <thead class="bg-dark text-light">
                <tr>
                    <td colspan="4">تعداد کاربران</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="">تعداد کل</td>
                    <td class="">ادمین</td>
                    <td class="">تاییدشده</td>
                    <td class="">مسدودشده</td>
                </tr>
                <tr>
                    <td class=""><?php echo $number_of_users; ?></td>
                    <td class=""><?php echo $number_of_admin_users; ?></td>
                    <td class=""><?php echo $number_of_not_verified_users; ?></td>
                    <td class=""><?php echo $number_of_disabled_users; ?></td>
                </tr>
            </tbody>
        </table>
        <table class="products-general-info table table-striped iranSans text-center col-10 mx-auto border border-primary">
            <thead class="bg-dark text-light">
                <tr>
                    <td colspan="4">درباره محصولات</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="">تعداد کل</td>
                    <td class="">کالای خواب</td>
                    <td class="">کالای اتاق پذیرایی</td>
                    <td class="">کالای فرش</td>
                </tr>
                <tr>
                    <td class=""><?php echo $number_of_products; ?></td>
                    <td class=""><?php echo $number_of_sleeping_products; ?></td>
                    <td class=""><?php echo $number_of_living_room_products; ?></td>
                    <td class=""><?php echo $number_of_carpet_products; ?></td>
                </tr>
            </tbody>
        </table>

        <section class="users-info">
            <h3 class="iranSans">جستجوی کاربران</h3>
            <div class="search_criteria row text-right p-1">
                <h5 class="text-center col-12 iranSans">جستجو بر اساس:</h5>
                <?php users_search_criteria(); ?>
            </div>
            <form class="row my-2 p-2 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(isset($_POST['first_name']) && !empty($_POST['first_name'])){echo htmlentities($_POST['first_name']) ;} ?>" placeholder="نام" oninput="validate(/^[A-Z][a-z]{2,}$/, this)">
                    <p class="displayNone text-danger iranSans">نام باید به لاتين باشد با حرف بزرگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php if(isset($_POST['last_name']) && !empty($_POST['last_name'])){echo htmlentities($_POST['last_name']) ;} ?>" placeholder="نام خانوادگی" oninput="validate(/^[A-Z][a-z]{2,}$/, this)">
                    <p class="displayNone text-danger iranSans">نام خانوادگی باید با حروف بزرگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" name="age" id="age" value="<?php if(isset($_POST['age']) && !empty($_POST['age'])){echo htmlentities($_POST['age']) ;} ?>" placeholder="سن" oninput="validate(/^(([1][2-9])|([2-7][0-9]))$/, this)">
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
                    <textarea class="form-control" name="home_address" id="home_address" placeholder="آدرس منزل"><?php if(isset($_POST['home_address']) && !empty($_POST['home_address'])){echo htmlentities($_POST['home_address']) ;} ?></textarea>
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
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="product_name" id="product_name" <?php if(isset($product_name) && !empty($product_name)) echo "checked"; ?> >نام </span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="product_dimensions" id="product_dimensions" <?php if(isset($product_dimensions) && !empty($product_dimensions)) echo "checked"; ?> >ابعاد</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="product_category" id="product_category" <?php if(isset($product_category) && !empty($product_category)) echo "checked"; ?> >دسته بندی</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="product_subcategory" id="product_subcategory" <?php if(isset($product_subcategory) && !empty($product_subcategory)) echo "checked"; ?> >زیرمجموعه</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="product_description" id="product_description" <?php if(isset($product_description) && !empty($product_description)) echo "checked"; ?> >توضیحات</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="uploader_ID" id="uploader_ID" <?php if(isset($uploader_ID) && !empty($uploader_ID)) echo "checked"; ?> >ارسال کننده</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="before_upload_date" id="before_upload_date" <?php if(isset($before_upload_date) && !empty($before_upload_date)) echo "checked"; ?> >قبل از تاریخ</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="after_upload_date" id="after_upload_date" <?php if(isset($after_upload_date) && !empty($after_upload_date)) echo "checked"; ?> >بعد از تاریخ</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="approved" id="approved" <?php if(isset($approved) && !empty($approved)) echo "checked"; ?> >وضعیت تایید</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="less_number_of_likes" id="less_number_of_likes" <?php if(isset($less_number_of_likes) && !empty($less_number_of_likes)) echo "checked"; ?> >لایک کمتر از</span>
                </div>
                <div class="iranSans col-12 col-sm-4">
                    <span class="iranSans"><input type="checkbox" name="more_number_of_likes" id="more_number_of_likes" <?php if(isset($more_number_of_likes) && !empty($more_number_of_likes)) echo "checked"; ?> >لایک بیشتر از</span>
                </div>
            </div>
            <form class="row my-2 p-2 text-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="نام محصول" value="<?php if(isset($product_name) && !empty($product_name)) echo $product_name; ?>" oninput="validate(/^[a-zA-Z\d\s]{3,15}$/, this)">
                    <p class='displayNone text-danger iranSans text-right'>نام محصول باید یک کلمه ای و بین 3 تا 15 کاراکتر باشد.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <select class="form-control" id="product_dimensions" name="product_dimensions">
                        <option value="" <?php if(isset($product_dimensions) && empty($product_dimensions)) echo "selected"; ?>>انتخاب ابعاد محصول</option>
                        <option value="single" <?php if(isset($product_dimensions) && $product_dimensions == "single") echo "selected"; ?>>یک نفره</option>
                        <option value="double" <?php if(isset($product_dimensions) && $product_dimensions == "double") echo "selected"; ?>>دو نفره</option>
                        <option value="all" <?php if(isset($product_dimensions) && $product_dimensions == "all") echo "selected"; ?>>فرقی نمی کند</option>
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <select class="form-control" id="product_category" name="product_category">
                        <option value="" <?php if(isset($product_category) && empty($product_category)) echo "selected"; ?>>انتخاب دسته بندی</option>
                        <option value="sleeping_products" <?php if(isset($product_category) && $product_category == "sleeping_products") echo "selected"; ?>>کالای خواب</option>
                        <option value="living_room_products" <?php if(isset($product_category) && $product_category == "living_room_products") echo "selected"; ?>>کالای اتاق پذیرایی</option>
                        <option value="carpet_products" <?php if(isset($product_category) && $product_category == "carpet_products") echo "selected"; ?>>فرش</option>
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <select class="form-control" id="product_subcategory" name="product_subcategory">
                        <option value="" <?php if(isset($product_subcategory) && empty($product_subcategory)) echo "selected"; ?>>انتخاب زیرمجموعه</option>
                        <option value="کوسن" <?php if(isset($product_subcategory) && $product_subcategory == "کوسن") echo "selected"; ?> >کوسن</option>
                        <option value="روبالشی" <?php if(isset($product_subcategory) && $product_subcategory == "روبالشی") echo "selected"; ?>>روبالشی</option>
                        <option value="روتختی" <?php if(isset($product_subcategory) && $product_subcategory == "روتختی") echo "selected"; ?>>روتختی</option>
                        <option value="ملافه" <?php if(isset($product_subcategory) && $product_subcategory == "ملافه") echo "selected"; ?>>ملافه</option>
                        <option value="پرده" <?php if(isset($product_subcategory) && $product_subcategory == "پرده") echo "selected"; ?>>پرده</option>
                        <option value="رومبلی" <?php if(isset($product_subcategory) && $product_subcategory == "رومبلی") echo "selected"; ?>>رومبلی</option>
                        <option value="رومیزی" <?php if(isset($product_subcategory) && $product_subcategory == "رومیزی") echo "selected"; ?>>رومیزی</option>
                        <option value="فرش" <?php if(isset($product_subcategory) && $product_subcategory == "فرش") echo "selected"; ?>>فرش</option>
                        <option value="روفرشی"> <?php if(isset($product_subcategory) && $product_subcategory == "روفرشی") echo "selected"; ?>روفرشی</option>
                        <option value="تابلوفرش" <?php if(isset($product_subcategory) && $product_subcategory == "تابلوفرش") echo "selected"; ?>>تابلوفرش</option>    
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <textarea class="p-1" name="product_description" id="product_description" placeholder="توضیحات مربوط به محصول"><?php if(isset($product_description) && !empty($product_description)) echo $product_description; ?></textarea>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="uploader_username" name="uploader_username" placeholder="نام شخص ارسال کننده" value="<?php if(isset($uploader_username) && !empty($uploader_username)) echo $uploader_username; ?>" oninput="validate(/^[A-Z][a-z0-9]{2,}$/, this)">
                    <p class='displayNone text-danger iranSans text-right'>نام کاربر آپلود کننده باید به لاتین باشد، حداقل 3 حرف داشته باشد و با حروف بزرگ آغاز شود.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="before_upload_date" name="before_upload_date" placeholder="ارسال قبل از تاریخ ex: 22 Jan 2000" value="<?php if(isset($before_upload_date) && !empty($before_upload_date)) echo $before_upload_date; ?>" oninput="validate(/^[a-zA-Z\d]{3,}$/, this)">
                    <p class='displayNone text-danger iranSans text-right'>به لاتین زمان بنویسید مانند : yesterday, tomorrow, today, February 25 2020,...</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="after_upload_date" name="after_upload_date" placeholder="ارسال بعد از تاریخ ex: 22 Jan 2000" value="<?php if(isset($after_upload_date) && !empty($after_upload_date)) echo $after_upload_date; ?>" oninput="validate(/^[a-zA-Z\d]{3,}$/, this)">
                    <p class='displayNone text-danger iranSans text-right'>به لاتین زمان بنویسید مانند : yesterday, tomorrow, today, February 25 2020,...</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <select type="text" class="form-control" id="approved" name="approved">
                        <option value="" <?php if(isset($approved) && empty($approved)) echo "selected"; ?>>انتخاب وضعیت تایید</option>
                        <option value="YES" <?php if(isset($approved) && $approved == "YES") echo "selected"; ?>>تایید شده</option>
                        <option value="NO" <?php if(isset($approved) && $approved == "NO") echo "selected"; ?>>تایید نشده</option>
                    </select>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="less_number_of_likes" name="less_number_of_likes" placeholder="پست با لایک کمتر از ex:100" value="<?php if(isset($less_number_of_likes) && !empty($less_number_of_likes)) echo $less_number_of_likes; ?>" oninput="validate(/^[\d]{1,6}$/, this)">
                    <p class='displayNone text-danger iranSans text-right'>لطفا فقط عدد وارد کنید. تا 6 رقم.</p>
                </div>
                <div class="form-group col-12 displayNone">
                    <input type="text" class="form-control" id="more_number_of_likes" name="more_number_of_likes" placeholder="پست با لایک بیشتر از ex:100" value="<?php if(isset($more_number_of_likes) && !empty($more_number_of_likes)) echo $more_number_of_likes; ?>" oninput="validate(/^[\d]{1,6}$/, this)">
                    <p class='displayNone text-danger iranSans text-right'>لطفا فقط عدد وارد کنید. تا 6 رقم</p>
                </div>
                <input type="submit" class="iranSans btn btn-primary displayNone" name="page_number" value="جستجو"></input>
            </form> 
            <div class="result container-fluid">
                <div class="row justify-content-center <?php if(isset($_POST['page_number']) || isset($_POST['back_to_signed_in_admin_page'])) echo "py-5"; ?>">
                    <?php if(isset($_POST['page_number']) || isset($_POST['back_to_signed_in_admin_page'])) card_generators(); ?>
                </div>
                <!-- pagination section: -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input type="hidden" name="product_name" value="<?php if(!empty($product_name)) echo $product_name; ?>">
                    <input type="hidden" name="product_dimensions" value="<?php if(!empty($product_dimensions)) echo $product_dimensions; ?>">
                    <input type="hidden" name="product_category" value="<?php if(!empty($product_category)) echo $product_category; ?>">
                    <input type="hidden" name="product_subcategory" value="<?php if(!empty($product_subcategory)) echo $product_subcategory; ?>">
                    <input type="hidden" name="product_description" value="<?php if(!empty($product_description)) echo $product_description; ?>">
                    <input type="hidden" name="uploader_username" value="<?php if(!empty($uploader_username)) echo $uploader_username; ?>">
                    <input type="hidden" name="before_upload_date" value="<?php if(!empty($before_upload_date)) echo $before_upload_date; ?>">
                    <input type="hidden" name="after_upload_date" value="<?php if(!empty($after_upload_date)) echo $after_upload_date; ?>">
                    <input type="hidden" name="approved" value="<?php if(!empty($approved)) echo $approved; ?>">
                    <input type="hidden" name="less_number_of_likes" value="<?php if(!empty($less_number_of_likes)) echo $less_number_of_likes; ?>">
                    <input type="hidden" name="more_number_of_likes" value="<?php if(!empty($more_number_of_likes)) echo $more_number_of_likes; ?>">

                    <div class="pagination-section">
                        <!-- if product_search submit button either in the original form or in the pagination itself is pressed load the pagination section -->
                        <?php if(isset($_POST['page_number']) || isset($_POST['back_to_signed_in_admin_page'])) pagination(); ?>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="JS/signed_in_admin.js"></script>
    <script src="JS/explorer_warning.js"></script>
</body>
</html>