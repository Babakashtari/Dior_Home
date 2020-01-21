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
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/index.css">
    <title>Dior Home</title>
</head>
<body>
    <?php head(); ?>
    <main>
        <section class="container-fluid px-0 position-relative main_image">
            <img class="border border-dark" src="images/index_images/frontpage.jpg" alt="پرده، کوسن و رومبلی اتاق نشیمن">
            <h3 class="position-absolute p-1 p-sm-3">خلاقیت از شما</h3>
            <h3 class="position-absolute p-1 p-sm-3">تولید با کیفیت و مرغوب از ما</h3>
        </section>
        <section class="container my-4 py-4 creativity">
                <table class="container px-1">
                    <tr class="row">
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#"><img class="border border-dark" src="images/index_images/carpet_board.jpg" alt="روتختی نمونه کار پیشگامان پودینه"></a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#"><img class="border border-dark" src="images/index_images/curtain2.jpg" alt="پرده نمونه چاپی پیشگامان پودینه"></a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#"><img class="border border-dark" src="images/index_images/sleeping_products.jpg" alt="كالاي خواب شامل كوسن، روتختي و روملافه اي"></a></td>
                    </tr>
                    <tr class="row label">
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#">تابلوفرش</a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#">پرده اي</a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#">كالاي خواب</a></td>
                    </tr>
                    <tr class="row">
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#"><img class="border border-dark" src="images/index_images/carpet2.jpg" alt="روفرشی تولید پیشگامان پودینه"></a></td>
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#"><img class="border border-dark" src="images/index_images/sofa_cover.jpg" alt="رومبلی تولید پیشگامان پودینه"></a></td>
                    </tr>
                    <tr class='row label'>
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#">روفرشي</a></td>
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#">رومبلي</a></td>
                    </tr>
                </table>
                <hr>
                <h3 class="p-2">ایده از شما، کار از ما</h3>
                <p class="py-2 px-4">اثاثيه اتاق خواب و نشيمن خود را آنگونه كه مي پسنديد طراحي كنيد و به ما بدهيد تا برايتان توليد كنيم. پيشگامان پودينه از سال 1380 و با بيش از 20 سال تجربه به كمك 80 طرح و الگوي متنوع رو تختي، روبالشي، كوسن،‌ رومبلي،‌ فرش، روفرشي و پرده، زينت بخش محل سكونت شما عزيزان می باشد.</p>
        </section>
    </main>
    <footer></footer>
    <?php canvas_generator() ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/index.js"></script>
</body>
</html>