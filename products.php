<?php require "php/code_functions.php" ?>
<?php require 'php/productsResults.php' ?>
<?php session_start(); ?>
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
        <meta name="description"    content="کاتالوگ محصولات دیجیتالی و ساللیمیشن پیشگامان پودینه آتا، کاتالوگ محصولات به دو صورت دیجیتالی و سابلیمیشن در ابعاد متفاوت عرضه می شود" />
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
        <link rel="stylesheet" href="CSS/products.css">

    <title>پیشگامان پودینه آتا - کاتالوگ محصولات</title>
</head>
<body>
<?php head(); ?>
    <main class="container-fluid">
        <section class="filter">
            <div class="container p-2">
            <fieldset class=" p-4 border border-primary">
                <legend class="text-center text-light">جستجو بر اساس:</legend>
            <form class=" row form-inline" method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group py-1">
                    <input type="text" class="form-control border border-primary" id="product_name" name="product_name" placeholder="نام محصول: violet">
                </div>
                <div class="form-group py-1">
                    <input type="text" class="form-control border border-primary" id="product_dimensions" name="product_dimensions" placeholder="ابعاد محصول: 40X60">
                </div>
                <div class="form-group py-1">
                    <select class="form-control border border-primary" id="product_category" name="product_category" onchange="subcategory_generator(this)">
                        <option value="">دسته بندی محصولات</option>
                        <?php category_option_generator(); ?>
                    </select>
                </div>
                <div class="form-group sub displayNone py-1">
                    <select class="form-control border border-primary" id="product_subcategory" name="product_subcategory" >
                        <!-- subcategory option elements are generated here via javascript -->
                        <?php subcategory_option_generator(); ?>
                    </select>
                </div>
                <div class="form-group py-1 col-12 ">
                    <textarea id="product_description" name="product_description" class="form-control border border-primary" placeholder="توضیحات" ></textarea>
                </div>
                <div class="form-group col-12 py-1">
                    <input class="btn btn-primary text-light col-12 border border-primary" id="submit" name="submit" type="submit" value="جستجو کن">
                </div>
                </form>            
            </fieldset>
            </div>
        </section>
        <section class=" row justify-content-center py-5">
            <div class="container-fluid row badge-container mx-3 pb-2">
                <h4 class="col-12 text-light text-center access-header py-4">کاتالوگ محصولات - دسترسی سریع</h4>
                <div class="col-12  col-md-6 col-lg-4 p-2 ">
                    <div class="row p-2">
                        <p class="text-light category text-center col-sm-12 col-md-11 py-2">  کالای خواب: </p>
                        <a href="products.php?product_category=sleeping_products&product_subcategory=روتختی" type="button" class="btn btn-primary   col-sm-2"><span class="badge badge-light Yekan">444</span><br> روتختی </a>
                        <a href="products.php?product_category=sleeping_products&product_subcategory=روبالشی" type="button" class="btn btn-primary   col-sm-2"><span class="badge badge-light Yekan">444</span><br> روبالشی </a>
                        <a href="products.php?product_category=sleeping_products&product_subcategory=کوسن" type="button" class="btn btn-primary   col-sm-2"><span class="badge badge-light Yekan">444</span><br> کوسن </a>
                        <a href="products.php?product_category=sleeping_products&product_subcategory=ملافه" type="button" class="btn btn-primary   col-sm-2"><span class="badge badge-light Yekan">4</span><br> ملافه </a>
                    </div>
                </div>
                <div class="col-12  col-md-6 col-lg-4 p-2 ">
                    <div class="row p-2">
                        <p class="text-light category text-center col-sm-12 col-md-11 py-2">  کالای اتاق پذیرایی:</p>
                        <a href="products.php?product_category=living_room_products&product_subcategory=رومیزی" type="button" class="btn btn-primary  col-sm-2"><span class="badge badge-light Yekan">4</span><br> رومیزی </a>
                        <a href="products.php?product_category=living_room_products&product_subcategory=پرده" type="button" class="btn btn-primary  col-sm-2"><span class="badge badge-light Yekan">444</span><br> پرده </a>
                        <a href="products.php?product_category=living_room_products&product_subcategory=کوسن" type="button" class="btn btn-primary  col-sm-2"><span class="badge badge-light Yekan">4</span><br> کوسن </a>
                        <a href="products.php?product_category=living_room_products&product_subcategory=رومبلی" type="button" class="btn btn-primary  col-sm-2"><span class="badge badge-light Yekan">4</span><br> رومبلی </a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 p-2 ">
                    <div class="row p-2">
                        <p class="text-light category text-center col-sm-12 col-md-11 py-2">  کالای فرش:</p>
                        <a href="products.php?product_category=carpet_products&product_subcategory=فرش" type="button" class="btn btn-primary col-sm-2 col-lg-3"><span class="badge badge-light Yekan">444</span><br> فرش </a>
                        <a href="products.php?product_category=carpet_products&product_subcategory=روفرشی" type="button" class="btn btn-primary col-sm-2 col-lg-3"><span class="badge badge-light Yekan">4</span><br> روفرشی </a>
                        <a href="products.php?product_category=carpet_products&product_subcategory=تابلوفرش" type="button" class="btn btn-primary col-sm-2 col-lg-3"><span class="badge badge-light Yekan">4</span><br> تابلوفرش </a>
                    </div>
                </div>
            </div>

            <?php card_generators(); ?>
        </section>
        <section class="products-pagination">
            <div>
                <?php pagination(); ?>
            </div>
        </section>
    </main>

<?php footer_generator();?>
    <?php canvas_generator(); ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/footer.js"></script>
    <script src="JS/products.js"></script>
</body>
</html>