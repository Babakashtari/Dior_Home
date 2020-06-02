<?php require "php/code_functions.php" ?>
<?php require 'php/explorer_warning.php' ?>

<!-- <?php session_start(); ?> -->
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
    <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline' https://www.google-analytics.com;
        img-src 'self' https://www.w3.org https://www.google.com.ua https://www.google.com https://www.google-analytics.com https://www.googletagmanager.com https://stats.g.doubleclick.net;
        font-src 'self';
        frame-src https://www.google.com;
        "  >
    <meta name="description" content="پيشگامان پودينه آتا، پيشرو در خدمات چاپ ديجيتال يا همان چاپ سابليميشن روی انواع پارچه." />
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
    <link rel="stylesheet" href="CSS/contact_us_modal.css">
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/index.css">
    <title>پيشگامان پودينه - صفحه اصلي</title>
</head>
<body>
    <?php head(); ?>
    <main>
        <section class="container-fluid px-0 m-0 position-relative main_image">
          <!-- carousel -->
          <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselId" data-slide-to="0" class="active"></li>
              <li data-target="#carouselId" data-slide-to="1"></li>
              <li data-target="#carouselId" data-slide-to="2"></li>
              <li data-target="#carouselId" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="rotate-img" src="images/index_images/photoslider/table_cloth.jpg" alt="رومیزی">
                <div class="carousel-caption">
                  <h3 class="p-3 p-md-4" id="first"> کالای اتاق پذیرایی</h3>
                  <h5 class="col-8 col-sm-10 py-2">چاپ دیجتالی انواع رومیزی، رو مبلی، كوسن و ...</h5>
                  <!-- لطفا این لینکها را به سایت هایی وصل کنید که در مورد این نوع نقاشی توضیح می دهند. برای سئو خوب است -->
                  <a class="text-light px-3 px-md-5 py-2" href="#">بیشتر ببینید</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/index_images/photoslider/bed2.jpg" alt="كالای خواب" width="100%" height="100%">
                <div class="carousel-caption">
                  <h3 class="p-3 p-md-4" id="second">کالای خواب</h3>
                  <h5 class="col-8 col-sm-10 py-2">چاپ سابلیمیشن روی انواع روتختی، ملافه، رو بالشی و كوسن</h5>
                  <!-- لطفا این لینکها را به سایت هایی وصل کنید که در مورد این نوع نقاشی توضیح می دهند. برای سئو خوب است -->
                  <a class="text-light px-3 px-md-5 py-2" href="#">بیشتر ببینید</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/index_images/photoslider/sea_carpet_board.jpg" alt="کالای فرش">
                <div class="carousel-caption">
                  <h3 class="p-3 p-md-4" id="third">روفرشی و تابلو فرش</h3>
                  <h5 class="col-8 col-sm-10 py-2"> چاپ دیجیتالی انواع فرش، روفرشی و تابلوفرش</h5>
                  <!-- لطفا این لینکها را به سایت هایی وصل کنید که در مورد این نوع نقاشی توضیح می دهند. برای سئو خوب است -->
                  <a class="text-light px-3 px-md-5 py-2" href="#">بیشتر ببینید</a>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/index_images/photoslider/cushion3.jpg" alt="کوسن و رو بالشی">
                <div class="carousel-caption">
                  <h3 class="p-3 p-md-4" id="third">کوسن و روبالشی</h3>
                  <h5 class="col-8 col-sm-10 py-2">چاپ دیجیتالی طرح ها و الگوهای واقعی و کارتونی روی روبالشی و انواع کوسن</h5>
                  <!-- لطفا این لینکها را به سایت هایی وصل کنید که در مورد این نوع نقاشی توضیح می دهند. برای سئو خوب است -->
                  <a class="text-light px-3 px-md-5 py-2" href="#">بیشتر ببینید</a>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon d-flex align-items-center justify-content-center">></span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
              <span class="carousel-control-next-icon d-flex align-items-center justify-content-center"><</span>
            </a>
          </div>
        </section>
        <section class="container my-4 py-4 creativity">
          <h3 class="p-2 p-md-4 mx-2 mx-md-4 ">مركز تخصصی چاپ ديجيتال يا سابليميشن روی پارچه</h3>
          <p class="p-2 px-md-4 pb-4 mx-2 mx-md-4 mb-4 "> افتخار داريم كه تمامی محصولات چاپی روی پارچه مورد نياز خانوار های ايرانی را تولید می کنیم. پيشگامان پودينه آتا از سال ۱۳۸۰ و با بيش از ۳۰ سال تجربه، الگوی شما را به صورت سفارشی دریافت و برایتان در هر ابعادی که دوست دارید به صورت دیجیتالی روی پارچه چاپ می کند.</p>
          <?php five_photos_section(); ?>
        </section>
        <section class="cooperation">
            <div>
                <h3 class="py-2 text-center">تولیدی ها و شرکت های عمده فروشی</h3>
                <p class="px-4 pb-2 container">عمده فعالیت شركت پيشگامان پودينه آتا همکاری با شركت های عمده فروشی و توليدی های پارچه است که جهت انجام انواع چاپ های ديجيتالی و سابليميشن روی پارچه در تيراژ بالا به پیشگامان پودینه مراجعه می کنند. از جمله تسهيلات در نظر گرفته شده برای اين همكاران می توان به خدمات طاقه پيچی پارچه و ترنسفر آن به صورت طاقه اشاره کرد كه نزد مشتریان عمده فروش از اهميت بسيار بالايی برخوردار است. پيشگامان پودينه آتا همچنين طرح ها و لوگو های چاپ شده روی پارچه را به فرمت سابليميشن برای دفعات بعدی در اختيار مشتریان گرامی قرار می دهد و لذا هيچگونه تجديد چاپ الگو در پيشگامان پودينه آتا شامل هزينه مجدد طراحی نمي شود. </p>
                <div class="container">
                    <div class="customers mx-3">
                        <?php customers_logo_generator(); customers_logo_generator(); ?>
                    </div>
                </div>
            </div>
            <div class="cooperation-talented container my-4">
                <div class="container">
                    <h3 class="text-center pt-4 pb-2"> کادر مجرب</h3>
                    <img src="images/index_images/expertise.jpg" alt="همکاری با نیروی متخصص" width="100%" height="auto">
                    <p class="text-justify py-4">
                  سرمايه پيشگامان پودينه آتا به نيروهای متخصص و خلاق آن است.  در صورتی كه در هر یک از موارد زير متخصص هستيد و تمايل به همكاری با ما به صورت دوركاری را داريد، رزومه کاری خود را همراه با نمونه کار هایتان برایمان ارسال کنید.
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
        <?php show_warning(); ?>
    </main>
    <?php contact_us_modal(); ?>
    <?php footer_generator();?>
    <?php canvas_generator(); ?>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/index.js"></script>
    <script src="JS/footer.js"></script>

</body>
</html>