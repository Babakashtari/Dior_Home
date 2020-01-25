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
    <link rel="stylesheet" href="CSS/footer.css">
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
                <h3 class="p-2 p-md-4 mx-2 mx-md-4 ">ایده از شما، کار از ما</h3>
                <p class="p-2 px-md-4 pb-4 mx-2 mx-md-4 mb-4 ">اثاثيه اتاق خواب و نشيمن خود را آنگونه كه می پسنديد طراحی كنيد و به ما بدهيد تا برايتان توليد كنيم. پيشگامان پودينه از سال 1380 و با بيش از 18 سال تجربه، طرح و الگوی شما را به صورت سفارشی دریافت و برایتان به صورت چاپ دیجیتالی روی پارچه تولید می کند.</p>
                <table class="container px-1">
                    <tr class="row">
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#"><img class="border border-primary" src="images/index_images/carpet_board1.jpg" alt="روتختی نمونه کار پیشگامان پودینه"></a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#"><img class="border border-primary" src="images/index_images/curtain2.jpg" alt="پرده نمونه چاپی پیشگامان پودینه"></a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#"><img class="border border-primary" src="images/index_images/sleeping_products.jpg" alt="كالاي خواب شامل كوسن، روتختي و روملافه اي"></a></td>
                    </tr>
                    <tr class="row label">
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#">تابلوفرش</a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#">پرده ای</a></td>
                        <td class="col-3 py-2 px-2 px-md-4"><a href="#">كالای خواب</a></td>
                    </tr>
                    <tr class="row">
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#"><img class="border border-primary" src="images/index_images/carpet3.jpg" alt="روفرشی تولید پیشگامان پودینه"></a></td>
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#"><img class="border border-primary" src="images/index_images/sofa_cover.jpg" alt="رومبلی تولید پیشگامان پودینه"></a></td>
                    </tr>
                    <tr class='row label'>
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#">روفرشی</a></td>
                        <td class="col-6 py-2 px-2 px-md-4"><a href="#">رومبلی</a></td>
                    </tr>
                </table>
        </section>
        <section class="cooperation">
            <div>
                <h3 class="py-2 text-center">تولیدی ها و شرکت های عمده فروشی</h3>
                <p class="px-4 pb-2 container">عمده فعالیت شركت پيشگامان پودينه همکاری با شركت های عمده فروشی و توليدی های پارچه است که جهت انجام انواع چاپ های ديجيتالی و سابليميشن روی پارچه در تيراژ بالا به پیشگامان پودینه مراجعه می کنند. از جمله تسهيلات در نظر گرفته شده برای اين همكاران می توان به خدمات طاقه پيچی پارچه و ترنسفر آن به صورت طاقه اشاره کرد كه نزد مشتریان عمده فروش از اهميت بسيار بالايی برخوردار است. پيشگامان پودينه همچنين طرح ها و لوگو های چاپ شده روی پارچه را به فرمت سابليميشن برای دفعات بعدی در اختيار مشتریان گرامی قرار می دهد و لذا هيچگونه تجديد چاپ الگو در پيشگامان پودينه شامل هزينه مجدد طراحی نمي شود. </p>
                <div class="container">
                    <div class="customers mx-3">
                        <?php customers_logo_generator();customers_logo_generator();  ?>
                    </div>
                </div>
            </div>
            <div class="cooperation-talented container my-4">
                <div class="container">
                    <h3 class="text-center pt-4 pb-2"> کادر مجرب</h3>
                    <img src="images/index_images/expertise.jpg" alt="همکاری با نیروی متخصص" width="100%" height="auto">
                    <p class="text-justify py-4">
                  سرمايه پيشگامان پودينه به نيروهای متخصص و خلاق آن است.  در صورتی كه در هر یک از موارد زير متخصص هستيد و تمايل به همكاری با ما به صورت دوركاری را داريد، رزومه کاری خود را همراه با نمونه کار هایتان برایمان ارسال کنید.
                    </p>
                    <ul class="row">
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">نقاشی</li>
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">طراحی سیاه قلم</li>
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">تصویر برداری</li>
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">طراحی انیمیشنی </li>
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">طراحی سه بعدی</li>
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">فتوشاپ</li>
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">کورل</li>
                        <li class=" col-xs-12 col-sm-6 col-md-3 ">ایلاستریتور</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <footer class="container-fluid position-relative">
        <section class="container">
            <div class="row">
                <p class="col-12 text-light text-right py-2 px-1"><i class="px-2 fas fa-tags"></i>دسترسی سریع</p>
                <img src="images/Dior_logo.png" alt="لوگوی پیشگامان پودینه">
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-3">
                    <p class="text-light text-right">پیشگامان پودینه:</p>
                    <ul>
                        <li class="text-right py-2"><a class="text-light" href="#">ارتباط با ما</a></li>
                        <li class="text-right py-2"><a class="text-light" href="#">درباره ما</a></li>
                        <li class="container py-2">
                            <div class="row text-right">
                                <a class=" text-light" href="#"><i class="col-3 fab fa-telegram"></i></a>
                                <a class=" text-light" href="#"><i class="col-3 fab fa-whatsapp-square"></i></a>
                                <a class=" text-light" href="#"><i class="col-3 fab fa-instagram"></i></a>
                                <a class=" text-light" href="#"><i class="col-3 fab fa-facebook"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

    </footer>
    <?php canvas_generator() ?>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/index.js"></script>
</body>
</html>