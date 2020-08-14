<?php require "php/code_functions.php" ?>
<?php require 'php/productsResults.php' ?>
<?php require 'php/explorer_warning.php' ?>
<?php session_start(); ?>
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
        script-src 'self' 'unsafe-inline' https://www.google-analytics.com;
        img-src 'self' https://www.w3.org https://www.google.com.ua https://www.google.com https://www.google-analytics.com https://www.googletagmanager.com https://stats.g.doubleclick.net;
        font-src 'self';
        frame-src https://www.google.com;
        "  >
        <meta name="description"    content="کاتالوگ انواع محصولات چاپ دیجیتالی يا كاتالوگ محصولات چاپ ساللیمیشن پیشگامان پودینه آتا، کاتالوگ محصولات چاپي روی پارچه در ابعاد متفاوت" />
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
        <link rel="canonical" href="https://diorhome.ir/products.php" />
        <!-- for SEO purposes: -->
        <meta property="og:title" content="صنايع نساجي پيشگامان پودينه آتا - محصولات">
        <meta property="og:site_name" content="پيشگامان پودينه آتا">
        <meta property="og:url" content="https://diorhome.ir/products.php">
        <meta property="og:description" content="كاتالوگ انواع محصولات چاپ ديجيتالي يا كاتالوگ محولات چاپ سابليميشن پيشگامان پودينه آتا، كاتالوگ محصولات چاپي روي پارچه در ابعاد متفاوت">
        <meta property="og:locale:alternate" content="fa_IR">
        <meta property="og:type" content="product">
        <meta property="og:image" content="https://diorhome.ir/images/Dior_logo.jpg">
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
                        <input type="text" class="form-control border border-primary" id="product_name" name="product_name" placeholder="نام محصول: violet" value="<?php if(isset($_GET['product_name'])){echo $_GET['product_name'];} ?>">
                    </div>
                    <div class="form-group py-1">
                        <input type="text" class="form-control border border-primary" id="product_dimensions" name="product_dimensions" placeholder="ابعاد محصول: دونفره" value="<?php if(isset($_GET['product_dimensions'])){echo $_GET['product_dimensions'];} ?>">
                    </div>
                    <div class="form-group py-1">
                        <select class="form-control border border-primary" id="product_category" name="product_category" onchange="subcategory_generator(this)">
                            <option value="">دسته بندی محصولات</option>
                            <?php category_option_generator(); ?>
                        </select>
                    </div>
                    <div class="form-group sub displayNone py-1">
                        <select class="form-control border border-primary" id="product_subcategory" name="product_subcategory" >
                            <!-- subcategory option elements are generated here -->
                            <?php subcategory_option_generator(); ?>
                        </select>
                    </div>
                    <div class="form-group py-1 col-12 ">
                        <textarea id="product_description" name="product_description" class="form-control border border-primary" placeholder="توضیحات" ><?php if(isset($_GET['product_description'])){echo $_GET['product_description'];} if(isset($_POST['search_criterion'])){echo $_POST['search_criterion'];}?></textarea>
                    </div>
                    <div class="form-group col-12 py-1">
                        <input class="btn btn-primary text-light col-12 border border-primary" id="submit" name="submit" type="submit" value="جستجو کن">
                    </div>
                </form>            
            </fieldset>
            </div>
        </section>
        <section class="row justify-content-center py-5">
            <?php card_generators(); ?>
        </section>
        <section class="products-pagination">
            <div>
                <?php pagination(); ?>
            </div>
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
    <script src="JS/footer.js"></script>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/products.js"></script>
</body>
</html>