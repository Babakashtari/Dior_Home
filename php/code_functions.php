<?php
function jumbotron_generator(){
    echo '  <div class="jumbotron mb-0 mx-sm-0 bg-light text-dark">
                <h1 class="mx-0 px-0 ">پیشگامان پودینه</h1>
                <p class="mx-0 px-0 ">به سایت رسمی شرکت پیشگامان پودینه خوش آمدید.</p>
            </div>
        ';
}
function header_generator(){
    echo '    <header class="container-fluid sticky-top mx-0">
    <nav class="row">
        <!-- left ul -->
        <div class="left col-5">
            <!-- hamburger menu for small screens -->
            <ul class="d-flex hamburger_menu">
                <li class="col">
                    <div class="hamburger_button hamburger-close">
                        <span class="hamburger-close"></span>
                        <span class="hamburger-close"></span>
                        <span class="hamburger-close"></span>
                    </div>
                </li>
                <li class="col search">
                    <a class="modal-closable text-white pb-2 pt-2 " href="#">
                        <i class="modal-closable fa fa-search"></i>
                    </a>
                </li>
            </ul>
            <ul class="row">
                <li class="col"><a id="products_link" class=" text-white pb-2 pt-2" data-toggle="collapse" href="#products">محصولات</a></li>
                <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">درباره ما</a></li>
                <li class="col"><a class="text-white pb-2 pt-2" href="#" target="_self">خانه</a></li>
            </ul>
        </div>
        <!-- logo -->
        <div class="logo col-2 text-center">
            <p class="">Dior Home</p>
            <img src="images/Dior_logo.png" alt="Dior Home logo">
        </div>
        <!-- right ul -->
        <div class="right col-5">
            <ul class="row">
                <li class="col search">
                        <input class="modal-closable p-1" type="search" name="search" placeholder="جستجو..." />
                </li>
                <li class="col"><a href="homepage.php"><i class="fa fa-shopping-cart"></i></a></li>
                <li class="col"><a href="#"><i class="fa fa-user"></i></a></li>
            </ul>
        </div>
<!-- products collapse bars: -->
        <div class="collapse text-white m-0 row flex-row-reverse" id="products">
            <div class="card col-6 col-sm-3 border border-right-1">
                <div class="card-header text-dark"><a href="#">کالای خواب</a></div>
                <div class="card-body">
                    <ul>
                        <li><a href="#">روبالشی</a></li>
                        <li><a href="#">روتختی</a></li>
                        <li><a href="#">ملافه</a></li>
                        <li><a href="#">کوسن</a></li>
                    </ul>
                </div>
            </div>
            <div class="card col-6 col-sm-3 border border-right-1">
                <div class="card-header text-dark"><a href="#">اتاق نشیمن</a></div>
                <div class="card-body">
                    <ul>
                        <li><a href="#">پرده</a></li>
                        <li><a href="#">رومبلی</a></li>
                        <li><a href="#">کوسن</a></li>
                        <li><a href="#">رومیزی</a></li> 
                    </ul>
                </div>
            </div>
            <div class="card col-6 col-sm-3 border border-right-1">
                <div class="card-header text-dark"><a href="#">فرش</a></div>
                <div class="card-body">
                    <ul>
                        <li><a href="#">فرش</a></li>
                        <li><a href="#">تابلوفرش</a></li>
                        <li><a href="#">روفرشی</a></li>
                    </ul>
                </div>
            </div>
            <div class="card col-6 col-sm-3 border border-right-1">
                <div class="card-header text-dark"><a href="#">خدمات</a></div>
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="#">طاقه پیچی و ارسال </a>
                        </li>
                        <li>
                            <a href="#">پذیرش سفارش</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
         ';
}
// products hamburger menu for small screens:
function hamburger_menu_generator(){
    echo '  <section class="hamburger-close">
                <ul class="hamburger_opened_menu hamburger-close bg-dark d-flex flex-column">
                    <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="#" target="_self">کالای خواب</a></li>
                    <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="#" target="_self">اتاق نشیمن</a></li>
                    <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="#" target="_self">فرش</a></li>
                    <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="#" target="_self">خدمات طاقه پیچی</a></li>
                    <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="#" target="_self">پذیرش سفارش</a></li>
                </ul>
            </section>
         ';
}
function Search_card_generator(){
    $card_images = ["images/search_images/sleeping_products3.jpg", "images/search_images/bedsheet.jpg", "images/search_images/pillow2.jpg", "images/search_images/home_furniture.jpg", "images/search_images/sofa_cover.jpg", "images/search_images/cushion4.jpg", "images/search_images/table_cloth.jpeg", "images/search_images/curtain.jpg", "images/search_images/carpet_printing.jpg", "images/search_images/carpet_cover.jpg", "images/search_images/carpet_board.jpg", "images/search_images/order.jpg"];
    $card_header = ["انواع کالای خواب", "روتختی", "روبالشی", "پارچه مبلی", "رومبلی", "کوسن", "رومیزی", "پرده" , "چاپ انواع فرش", "روفرشی", "تابلو فرش", "سفارشی"];
    $card_text = ["چاپ طرح روبالشی، روتختی و کوسن", "چاپ انواع طرح و الگوی روتختی", "چاپ انواع طرح و الگوی روبالشی", "چاپ انواع الگو و طرح روی پارچه مبل", "طراحی و چاپ انواع عکس، الگو و لوگو برای رومبلی", "چاپ انواع طرح و الگو روی کوسن", "طراحی و چاپ انواع عکس و الگوی رومیزی", "چاپ الگو و طرح ملحفه پرده ای", "چاپ الگو، طرح و عکس روی فرش، روفرشی و تابلوفرش", "چاپ انواع طرح و عکس برای روفرشی", "چاپ دیجیتالی عکس و الگو جهت تابلوفرش", "پذیرش هرگونه طرح و الگوی جدید جهت چاپ"];

    for($i=0; $i<count($card_images); $i++){
        echo '<div class="modal-closable px-1">';
        echo    '<div class="modal-closable card border border-primary">';
        echo        '<img class="modal-closable card-img-top" src="' . $card_images[$i]. '" alt="'. $card_header[$i] . '">';
        echo        '<div class="modal-closable card-body text-center d-flex flex-column justify-content-between">';
        echo            '<h6 class="modal-closable card-title ">' . $card_header[$i] . '</h6>';
        echo            '<p class="modal-closable card-text">' . $card_text[$i] . '<p class="card-text"></p>';
        echo            '<a href="#" class="modal-closable btn btn-primary">' . 'بازدید' . '</a>';
        echo        '</div>';
        echo    '</div>';    
        echo '</div>';
    }
}

function search_menu_generator(){
    echo '    <!-- search modal -->
                <div class="modal-closable modal_box hidden position-relative py-5 px-5">
                    <span class="close position-absolute text-red">&times;</span>
                    <div class="modal-closable modal_content">
                        <form class="modal-closable form-inline" action="#" method="get">
                            <input class="modal-closable form-control col-11" type="search" name="search" placeholder="جستجو">
                            <button class="modal-closable col-1 text-left" type="submit"><i class="modal-closable fa fa-search"></i></button>
                        </form>
                        <div class="modal-closable products_gallery d-flex flex-wrap pt-2 justify-content-around">
         ';
                        search_card_generator();
    echo '              </div>            
                    </div>
                </div>
         ';
}

function head(){
    jumbotron_generator();
    header_generator();
    hamburger_menu_generator();
    search_menu_generator();
}

function canvas_generator(){
    echo "<canvas style='z-index: -1;position:fixed;top:0;left:0;right:0;bottom:0;background-color:black;'>your browser does not support canvas</canvas>";
}


?>
