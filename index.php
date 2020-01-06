<?php require "php/code_functions.php" ?>
<!DOCTYPE html lang="fa">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="CSS/index.css">
    <title>Dior Home</title>
</head>
<body>
<div class="jumbotron mb-0 bg-light text-dark">
        <h1>پیشگامان پودینه</h1>
        <p>به سایت رسمی شرکت پیشگامان پودینه خوش آمدید.</p>
    </div>
    <header class="container-fluid">
        <nav class="row">
            <!-- left ul -->
            <div class="left col-5 ">
                <!-- hamburger menu for small screens -->
                <ul class="d-flex hamburger_menu">
                    <li class="col">
                        <div class="hamburger_button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </li>
                    <li class="col search">
                        <a class="text-white pb-2 pt-2 " href="#">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                </ul>
                <ul class="row">
                    <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">محصولات</a></li>
                    <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">درباره ما</a></li>
                    <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">صفحه اصلی </a></li>
                </ul>
            </div>
            <!-- logo -->
            <div class="logo col-2 text-center"><img src="images/Dior_logo.png" alt="Dior Home logo"></div>
            <!-- right ul -->
            <div class="right col-5">
                <ul class="row">
                    <li class="col search">
                            <input class="p-1 " type="search" name="search" placeholder="جستجو...">
                            </input>
                    </li>
                    <li class="col"><a href="homepage.php"><i class="fa fa-shopping-cart"></i></a></li>
                    <li class="col"><a href="#"><i class="fa fa-user"></i></a></li>
                </ul>
            </div>
            <ul class="hamburger_opened_menu">
                <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">محصولات</a></li>
                <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">درباره ما</a></li>
                <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">صفحه اصلی</a></li>
            </ul>
        </nav>
    </header>
    <!-- search modal -->
    <div class="modal_box hidden">
        <span class="close">&times;</span>
        <div class="modal_content">
            <form class="form-inline" action="#" method="get">
                <input class="form-control col-11" type="search" name="search" placeholder="جستجو">
                <button class="col-1 text-left" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <div class="products_gallery d-flex">
                <?php card_generator();?>
            </div>            
        </div>
    </div>
    <main></main>

    <?php canvas_generator() ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/index.js"></script>

</body>
</html>