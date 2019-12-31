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
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/Normalizer.css">
    <link rel="stylesheet" href="Css/fonts.css">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Dior Home</title>
</head>
<body>
    <header class="container-fluid">
        <nav class="row d-flex">
            <!-- left ul -->
            <div class="left col-5 ">
                <ul class="row d-flex">
                    <li class="col"><a class="text-white p-2" href="#" target="_self">پرده</a></li>
                    <li class="col"><a class="text-white p-2" href="#" target="_self">تابلو فرش</a></li>
                    <li class="col"><a class="text-white p-2" href="#" target="_self">كالاي خواب</a></li>
                </ul>
            </div>
            <!-- logo -->
            <div class="logo col-2 text-center"><img src="images/Dior_logo.png" alt="Dior Home logo"></div>
            <!-- right ul -->
            <div class="right col-5">
                <ul class="row d-flex ">
                    <li class="col">
                        <input class="p-1" type="search" name="search" id="search" placeholder="جستجو..."/>
                        <i class="fa fa-search"></i>
                    </li>
                    <li class="col"><a href="homepage.php"><i class="fa fa-shopping-cart"></i></a></li>
                    <li class="col"><a href="#"><i class="fa fa-user"></i></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <?php canvas_generator() ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/index.js"></script>
</body>
</html>