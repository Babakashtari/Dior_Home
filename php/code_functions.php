<?php
function jumbotron_generator(){
    echo '  <div class="jumbotron mb-0 mx-sm-0 bg-light text-dark">
                <h1 class="mx-0 px-0 ">پیشگامان پودینه</h1>
                <p class="mx-0 px-0 ">به سایت رسمی شرکت پیشگامان پودینه خوش آمدید.</p>
                <div itemscope itemtype="https://schema.org/LocalBusiness">
                    <p itemprop="name">
                        <span itemprop="telephone"><a class="text-dark" href="tel:02155158815"> 55158815 21<i class="fa fa-phone px-1"></i></a></span>
                    </p>
                </div>
            </div>
        ';
}
function header_generator(){
    echo '    <header class="container-fluid sticky-top mx-0 py-1">
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
        echo '<div class="modal-closable">';
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
                <div class="modal-closable modal_box hidden position-absolute py-5 px-5">
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
    echo "<canvas class='background-canvas' style='z-index: -1;position:fixed;top:0;left:0;right:0;bottom:0;background-color:black;'>your browser does not support canvas</canvas>";
}

function customers_logo_generator(){
    $customers_logo_src = ['images/logos/army_logo.png','images/logos/Kowsarbaft_logo.png', 'images/logos/Institute_of_Childrens_Education.png', 'images/logos/Social_security.jpg', 'images/logos/municipality.jpg', 'images/logos/Saipa_logo.png', 'images/logos/seda_logo.png', 'images/logos/iran_air.jpg', 'images/logos/ata_airlines.jpg', 'images/logos/erfan_hospital.jpg', "images/logos/erfan_niyayesh_hospital.png", 'images/logos/fire_fighting_logo.jpg', 'images/logos/Ministry_of_Education.png'];
    $customers_logo_alts = ['ارتش جمهوري اسلامي ايران', 'کوثر بافت نوین', 'کانون پرورش فکری کودکان و نوجوانان', 'سازمان تامین اجتماعی', 'شهرداری تهران', 'سايپا خودرو', 'صدا و سيماي جمهوري اسلامي ايران', 'هما جمهوري اسلامي ايران', 'شركت هواپيمايي آتا','بيمارستان عرفان', 'بیمارستان عرفان نیایش', 'سازمان آتش نشانی تهران', 'آموزش و پرورش استان تهران'];
    $customers_logo_hrefs = ['https://aja.ir', "https://kowsarbaft.ir", 'https://kanoonnews.ir', 'https://tamin.ir', 'https://tehran.ir', 'https://saipacorp.com', 'https://irib.ir', 'https://iranair.com', 'https://ataair.ir', 'https://erfanhospital.ir', 'https:///niayeshhospital.ir', 'https://fa.wikipedia.org/wiki/%D8%B3%D8%A7%D8%B2%D9%85%D8%A7%D9%86_%D8%A2%D8%AA%D8%B4%E2%80%8C%D9%86%D8%B4%D8%A7%D9%86%DB%8C', 'https://medu.ir' ];
    
    echo '<div class="customers-container d-flex justify-content-around">';
        for($i = 0 ; $i<count($customers_logo_src) ; $i++){
            echo '<a target="_blank" href="' . $customers_logo_hrefs[$i] .'"><img class="" src="' . $customers_logo_src[$i] . '" alt="' . $customers_logo_alts[$i] . '"></a>';
        }
    echo '</div>';
}

function footer_generator(){
    echo '<footer class="container-fluid d-flex p-4 position-relative">';
    echo    '<div class="row border border-primary">
                <a href="#"><img src="images/Dior_logo.png" alt="لوگوی پیشگامان پودینه"></a>
                <p class="col-12 text-light text-center">دسترسی سریع</p>
            </div>';
    echo    '<nav class="container">';
    echo        '<section class="row">';
    // footer first column:
    echo            '<div class="col">';
    echo                '<h3 class="text-right text-light">پیشگامان پودینه</h3>';
    echo                '<ul>';
    echo                    '<li><a class="py-3 px-1" href="#">درباره ما</a></li>';
    echo                    '<li><a class="py-3 px-1" href="#">ارتباط با ما</a></li>';
    echo                    '<li class="d-flex justify-content-between">
                                <a  class="p-1" href="#"><i class="fab fa-telegram"></i></a>
                                <a  class="p-1" href="#"><i class="fab fa-whatsapp-square"></i></a>
                                <a  class="p-1" href="#"><i class="fab fa-instagram"></i></a>
                                <a  class="p-1" href="#"><i class="fab fa-facebook"></i></a>
                            </li>';
    echo                '</ul>';
    echo            '</div>';
    // footer second column:
    echo            '<div class="col col text-center">';
    echo                    '<ul>';
    echo                        '<li class="container">';
    echo                            '<div class="row">';
    echo                                '<div class="col-12 d-flex align-items-center justify-content-center"><p class="m-1 text-light">دفتر مرکزی</p></div>';
    echo                            '</div>';
    echo                        '</li>';
    echo                        '<li class="container">';
    echo                            '<div class="row">';
    echo                                '<div class="col-2  d-flex align-items-center justify-content-start"><i class=" px-1 fas fa-address-card"></i></div>';
    echo                                '<div class="col-10  d-flex align-items-center justify-content-start"><p class="m-0">آدرس: تهران، بازار بزرگ، عباس آباد، سرای آزادی، نبش دالان دوم، پلاك 320، پيشگامان پودينه</p></div>';
    echo                            '</div>';
    echo                        '</li>';
    echo                        '<li class="container">';
    echo                            '<div class="row">';
    echo                                '<div class="col-12 d-flex align-items-center justify-content-center"><p class="m-1 text-light">کارخانه</p></div>';
    echo                            '</div>';
    echo                        '</li>';
    echo                        '<li class="container">';
    echo                            '<div class="row">';
    echo                                '<div class="col-2 d-flex align-items-center justify-content-start"><i class=" px-1 fas fa-address-card"></i></div>';
    echo                                '<div class="col-10 d-flex align-items-center justify-content-start"><p class="m-0">آدرس: تهران، بازار بزرگ، عباس آباد، سرای آزادی، نبش دالان دوم، پلاك 320، پيشگامان پودينه</p></div>';
    echo                            '</div>';
    echo                        '</li>';
    echo                        '<li class="container">';
    echo                            '<div class="row">';
    echo                                '<div class="col-2 d-flex align-items-center justify-content-start"><i class=" px-1 fas fa-phone-square"></i></div>';
    echo                                '<div class="col-10 d-flex align-items-center justify-content-start"><p class="m-0">09121158204 - 55158815 - 33789024</p></div>';
    echo                            '</div>';
    echo                        '</li>';
    echo                    '</ul>';
    echo            '</div>';
    // footer third column:
    echo            '<div class="col">';
    echo                '<ul>';
    // echo                    '<li>';
    // echo                        '<iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d810.286884581503!2d51.420977829182945!3d35.67336899876224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQwJzI0LjEiTiA1McKwMjUnMTcuNSJF!5e0!3m2!1sen!2sus!4v1579936178686!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';
    // echo                    '</li>';
    echo                '</ul>';
    echo            '</div>';
    echo        '</section>';
    echo    '</nav>';
    echo '</footer>';
}

?>
