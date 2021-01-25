
<?php
function jumbotron_generator(){
    ?>
        <?php session_start(); ?>
        <div class="jumbotron mb-0 mx-sm-0 bg-light text-dark">
            <h1 class="mx-0 px-0 ">پیشگامان پودینه آتا</h1>
            <h2 class="mx-0 px-0 mb-3" style="font-size:1rem;">
    <?php
    user_name_show();
    ?>
        به چاپخانه دیجیتال پارچه پیشگامان پودینه آتا خوش آمدید.</h2>
    <?php
    if(!empty($_SESSION['user_username'])){
    ?>
        <p class="mx-0 px-0"><a class="text-danger" href="php/session_destroyer.php">از اينجا خارج شويد!</a></p>
    <?php
    }else{
    ?>
        <p class="mx-0 px-0"><a class="text-primary" href="login.php">از اينجا وارد شويد!</a></p>
    <?php
    }
    ?>
        <div itemscope itemtype="https://schema.org/LocalBusiness">
            <p itemprop="name">
                <span itemprop="telephone"><a class="text-dark" href="tel:09121158204"><span class="Yekan">09121158204</span><i class="fa fa-phone px-1"></i></a></span>
            </p>
            <p itemprop="name">
                <span itemprop="telephone"><a class="text-dark" href="tel:09122084055"><span class="Yekan">09122084055</span><i class="fa fa-phone px-1"></i></a></span>
            </p>
        </div>
    </div>
    <?php
}
function header_generator(){
    ?>
        <header class="container-fluid sticky-top mx-0 py-1">
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
                        <li class="col"><a class="text-white pb-2 pt-2" href="aboutUs.php" target="_self">درباره ما</a></li>
                        <li class="col"><a class="text-white pb-2 pt-2" href="index.php" target="_self">خانه</a></li>
                    </ul>
                </div>
                <!-- logo -->
                <div class="logo col-2 text-center">
                    <p class="">Dior Home</p>
                    <img src="images/Dior_logo.jpg" alt="Dior Home logo">
                </div>
                <!-- right ul -->
                <div class="right col-5">
                    <ul class="row">
                        <li class="col search">
                            <input class="modal-closable p-1" type="search" name="search" placeholder="جستجو..." />
                        </li>
                        <li class="col">
                            <a href="shoppingcart.php">
    <?php
                                shopping_cart_logged_in_icon_generator(); 
    ?>       
                            </a>
                        </li>
                        <li class="col">
    <?php
                            header_logged_in_icon_generator();
    ?>
                        </li>
                    </ul>
                </div>
                <!-- products collapse bars: -->
                <div class="collapse text-white m-0 row flex-row-reverse" id="products">
                    <div class="card col-6 col-sm-3 border border-right-1">
                        <div class="card-header text-dark"><a href="products.php?product_category=sleeping_products">کالای خواب</a></div>
                        <div class="card-body">
                            <ul>
                                <li><a href="products.php?product_category=sleeping_products&product_subcategory=روبالشی">روبالشی</a></li>
                                <li><a href="products.php?product_category=sleeping_products&product_subcategory=روتختی">روتختی</a></li>
                                <li><a href="products.php?product_category=sleeping_products&product_subcategory=ملافه">ملافه</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card col-6 col-sm-3 border border-right-1">
                        <div class="card-header text-dark"><a href="products.php?product_category=living_room_products">اتاق نشیمن</a></div>
                        <div class="card-body">
                            <ul>
                                <li><a href="products.php?product_category=living_room_products&product_subcategory=پرده">پرده</a></li>
                                <li><a href="products.php?product_category=living_room_products&product_subcategory=رومبلی">رومبلی</a></li>
                                <li><a href="products.php?product_category=living_room_products&product_subcategory=کوسن">کوسن</a></li>
                                <li><a href="products.php?product_category=living_room_products&product_subcategory=رومیزی">رومیزی</a></li> 
                            </ul>
                        </div>
                    </div>
                    <div class="card col-6 col-sm-3 border border-right-1">
                        <div class="card-header text-dark"><a href="products.php?product_category=carpet_products">فرش</a></div>
                        <div class="card-body">
                            <ul>
                                <li><a href="products.php?product_category=carpet_products&product_subcategory=فرش">فرش</a></li>
                                <li><a href="products.php?product_category=carpet_products&product_subcategory=تابلوفرش">تابلوفرش</a></li>
                                <li><a href="products.php?product_category=carpet_products&product_subcategory=روفرشی">روفرشی</a></li>
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
                                    <a href="userUpload.php">ثبت سفارش</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
<?php
}
// products hamburger menu for small screens:
function hamburger_menu_generator(){
?>
        <section class="hamburger-close">
            <ul class="hamburger_opened_menu hamburger-close bg-dark d-flex flex-column">
                <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="index.php" target="_self">خانه</a></li>
                <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="products.php?product_category=sleeping_products" target="_self">کالای خواب</a></li>
                <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="products.php?product_category=living_room_products" target="_self">اتاق ‍پذیرایی</a></li>
                <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="products.php?product_category=carpet_products" target="_self">فرش</a></li>
                <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="#" target="_self">خدمات طاقه پیچی</a></li>
                <li class="hamburger-close d-flex justify-content-end p-2 align-items-center"><a class="hamburger-close text-white py-1" href="userUpload.php" target="_self">ثبت سفارش</a></li>
            </ul>
        </section>
<?php
}
function Search_card_generator(){
    $card_images = ["images/search_images/sleeping_products3.jpg", "images/search_images/bedsheet.jpg", "images/search_images/pillow2.jpg", "images/search_images/home_furniture.jpg", "images/search_images/sofa_cover.jpg", "images/search_images/cushion4.jpg", "images/search_images/table_cloth.jpeg", "images/search_images/curtain.jpg", "images/search_images/carpet_printing.jpg", "images/search_images/carpet_cover.jpg", "images/search_images/carpet_board.jpg", "images/search_images/order.jpg"];
    $card_header = ["انواع کالای خواب", "روتختی", "روبالشی", "پارچه مبلی", "رومبلی", "کوسن", "رومیزی", "پرده" , "چاپ انواع فرش", "روفرشی", "تابلو فرش", "سفارشی"];
    $card_text = ["چاپ طرح روبالشی، روتختی و کوسن", "چاپ انواع طرح و الگوی روتختی", "چاپ انواع طرح و الگوی روبالشی", "چاپ انواع الگو و طرح روی پارچه مبل", "طراحی و چاپ انواع عکس، الگو و لوگو برای رومبلی", "چاپ انواع طرح و الگو روی کوسن", "طراحی و چاپ انواع عکس و الگوی رومیزی", "چاپ الگو و طرح ملحفه پرده ای", "چاپ الگو، طرح و عکس روی فرش، روفرشی و تابلوفرش", "چاپ انواع طرح و عکس برای روفرشی", "چاپ دیجیتالی عکس و الگو جهت تابلوفرش", "پذیرش هرگونه طرح و الگوی جدید جهت چاپ"];
    $card_links = ['products.php?product_category=sleeping_products', 'products.php?product_category=sleeping_products&product_subcategory=روتختی', 'products.php?product_category=sleeping_products&product_subcategory=روبالشی', 'products.php?product_category=living_room_products&product_subcategory=رومبلی', 'products.php?product_category=living_room_products&product_subcategory=رومبلی', 'products.php?product_category=living_room_products&product_subcategory=کوسن', 'products.php?product_category=living_room_products&product_subcategory=رومیزی', 'products.php?product_category=living_room_products&product_subcategory=‍پرده', 'products.php?product_category=carpet_products', 'products.php?product_category=carpet_products&product_subcategory=روفرشی', 'products.php?product_category=carpet_products&product_subcategory=تابلوفرش', "userUpload.php"];
    
    for($i=0; $i<count($card_images); $i++){
?>
    <div class="modal-closable">
        <div class="modal-closable card border border-primary">
            <img class="modal-closable card-img-top" src="<?php echo $card_images[$i]; ?>" alt="<?php echo $card_header[$i]; ?>">
            <div class="modal-closable card-body text-center d-flex flex-column justify-content-between">
                <h6 class="modal-closable card-title "><?php echo $card_header[$i]; ?></h6>
                <p class="modal-closable card-text"><?php echo $card_text[$i]; ?></p>
                <a href="<?php echo $card_links[$i]; ?>" class="modal-closable btn btn-primary">بازدید</a>
            </div>
        </div>    
    </div>
<?php
    }
}

function search_menu_generator(){
    ?>
    <!-- search modal -->
        <div class="modal-closable modal_box hidden position-absolute py-5 px-5">
            <span class="close position-absolute text-red">&times;</span>
                <div class="modal-closable modal_content">
                    <form class="modal-closable form-inline" action="products.php" method="POST">
                        <input class="modal-closable iranSans form-control col-11" type="search" name="search_criterion" placeholder=" جستجو در توضیحات محصول" pattern="[a-zA-Z0-9ا-يئگءیکآ]{1 ,}" title="لطفا حداقل یک کلمه به فارسی تایپ کنید">
                        <button class="modal-closable col-1 text-left" type="submit" name="search_button" value="search"><i class="modal-closable fa fa-search"></i></button>
                    </form>
                    <div class="modal-closable products_gallery d-flex flex-wrap pt-2 justify-content-around">
    <?php
                        search_card_generator();
    ?>
                    </div>            
                </div>
        </div>
    <?php
}

function head(){
    jumbotron_generator();
    header_generator();
    hamburger_menu_generator();
    search_menu_generator();
}

function canvas_generator(){
?>
    <canvas class='background-canvas' style='z-index: -1;position:fixed;top:0;left:0;right:0;bottom:0;background-color:black;'>your browser does not support canvas</canvas>
<?php
}

function customers_logo_generator(){
    $customers_logo_src = ['images/logos/army_logo.jpg','images/logos/Kowsarbaft_logo.png', 'images/logos/Institute_of_Childrens_Education.png', 'images/logos/Social_security.jpg', 'images/logos/municipality.jpg', 'images/logos/patan_jame.png', 'images/logos/Seda_logo.jpg', 'images/logos/iran_air.jpg', 'images/logos/ata_airlines.jpg', 'images/logos/erfan_hospital.jpg', "images/logos/erfan_niyayesh_hospital.png", 'images/logos/fire_fighting_logo.jpg', 'images/logos/Ministry_of_Education.png'];
    $customers_logo_alts = ['ارتش جمهوري اسلامي ايران', 'کوثر بافت نوین', 'کانون پرورش فکری کودکان و نوجوانان', 'سازمان تامین اجتماعی', 'شهرداری تهران', 'پاتن جامه', 'صدا و سيماي جمهوري اسلامي ايران', 'هما جمهوري اسلامي ايران', 'شركت هواپيمايي آتا','بيمارستان عرفان', 'بیمارستان عرفان نیایش', 'سازمان آتش نشانی تهران', 'آموزش و پرورش استان تهران'];
    $customers_logo_hrefs = ['https://aja.ir', "https://kowsarbaft.ir", 'https://kanoonnews.ir', 'https://tamin.ir', 'https://tehran.ir', 'http://patanjameh.ir/', 'https://irib.ir', 'http://www.iranair.com/Portal/Home/', 'https://ataair.ir', 'http://erfanhospital.ir/fa/', 'http://erfanhospital.ir/fa/', 'https://fa.wikipedia.org/wiki/%D8%B3%D8%A7%D8%B2%D9%85%D8%A7%D9%86_%D8%A2%D8%AA%D8%B4%E2%80%8C%D9%86%D8%B4%D8%A7%D9%86%DB%8C', 'https://medu.ir' ];
?>
    <div class="customers-container d-flex justify-content-around">
<?php
        for($i = 0 ; $i<count($customers_logo_src) ; $i++){
?>
            <a target="_blank" href="<?php echo $customers_logo_hrefs[$i]; ?>"><img class="" src="<?php echo $customers_logo_src[$i]; ?>" alt="<?php echo $customers_logo_alts[$i]; ?>"></a>
<?php
        }
?>
    </div>
<?php
}

function footer_generator(){
?>
    <footer class="container-fluid position-relative">
        <img src="images/Dior_logo.jpg" alt=" لوگوی پیشگامان پودینه آتا">
        <div id="devider" class="container py-2">
            <div class="row">
                <p class="col-12 text-right text-light pb-3 pt-5"><span class="bg-primary p-2"><i class="px-2 fas fa-tags"></i>دسترسی سریع</span><span class=" p-2 mr-sm-2"><i class="px-2 fas fa-map-marker-alt"></i> کارخانه و دفاتر زیر مجموعه</span></p>
            </div>
        </div>
        <section class="container">
            <div class="row">
                <div class="col-12 col-sm-4">
                    <p class="text-light text-right font-weight-bold"><span>پیشگامان پودینه:</span></p>
                    <ul>
                        <li class="text-right py-2"><button class="text-light font-weight-italic" data-toggle="modal" data-target="#contact_us_modal">ارتباط با ما</button></li>
                        <li class="text-right py-2"><a class="text-light font-weight-italic" href="aboutUs.php">درباره ما</a></li>
                        <li class="text-right py-2"><a class="text-light font-weight-italic" href="#">مقالات و اخبار</a></li>
                        <li class="container py-sm-3 py-md-0 pr-0">
                            <div class="row flex-nowrap text-right py-3 py-sm-0 py-md-0 justify-content-start" itemscope itemtype="http://schema.org/Organization">
                                <span itemprop="name" class="displayNone">صنایع نساجی پیشگامان پودینه آتا</span>
                                <link itemprop="url" href="diorhome.ir"></link>
                                <a class=" text-light py-0 py-md-2 displayNone" itemprop="sameAs" href="https://t.me/pishgaman_poudineh_ata"><i class="col-3 fab fa-telegram mx-md-2"></i></a>
                                <a class=" text-light py-0 py-md-2" itemprop="sameAs" href="https://wa.me/989122084055"><i class="col-3 fab fa-whatsapp mx-md-2"></i></a>
                                <a class=" text-light py-0 py-md-2" itemprop="sameAs" href="https://instagram.com/sublimation_diorhome"><i class="col-3 fab fa-instagram mx-md-2"></i></a>
                                <a class=" text-light py-0 py-md-2 displayNone" itemprop="sameAs" href="#"><i class="col-3 fab fa-facebook mx-md-2"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-4">
                    <p class="text-light text-right font-weight-bold"><span>خدمات:</span></p>
                    <ul>
                        <li class="text-right py-2"><a class="text-light " href="products.php">کاتالوگ محصولات</a></li>
                        <li class="text-right py-2 "><a class="text-light " href="sublimation.php">چاپ دیجیتال/سابلیمیشن</a></li>
                        <li class="text-right py-2"><a class="text-light " href="userUpload.php">ثبت سفارش</a></li>
                        <li class="text-right py-2"><a class="text-light " href="#">پیشنهادات ویژه</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-4 d-flex flex-column justify-content-start">
                    <p class="text-light text-right font-weight-bold"><span>نقشه کارخانه :</span></p>
                    <div class="my-2" id="map">
                        <a href="https://www.google.com/maps/place/%D9%BE%D9%8A%D8%B4%DA%AF%D8%A7%D9%85%D8%A7%D9%86+%D9%BE%D9%88%D8%AF%D9%8A%D9%86%D9%87+%D8%A2%D8%AA%D8%A7%E2%80%AD/@35.6730548,51.4207958,18z/data=!4m5!3m4!1s0x3f8e01bb8e939549:0xca7c6bafb1e2040c!8m2!3d35.6732989!4d51.4216058?hl=en">
                            <img src="images/map_location.jpg" alt="نقشه محل دفتر مرکزی شرکت پیشگامان پودینه آتا" width="100%" height="auto" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <p class="text-light text-right font-weight-bold"><span>کارخانه:</span></p>
                    <ul>
                        <li class="text-right py-2"><p class="text-light text-right"><i class="fas fa-address-card pl-2"></i>اردبیل، ميدان ايثار، شهرك صنعتی فاز <span class="Yekan">1</span>  خيابان پنج شرقی پيشگامان پودينه آتا</p></li>
                        <li class="text-right py-2 "><p class="text-light text-right"><i class="fas fa-phone pl-2"></i> <span class="Yekan">55637991 </span>- <span class="Yekan">09122084055 </span></p></li>
                        <li class="text-right py-2"><p class="text-light text-right"><i class="fas fa-envelope pl-2"></i>support@diorhome.ir</p></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6">
                    <p class="text-light text-right font-weight-bold"><span>دفتر مرکزی:</span></p>
                    <ul>
                        <li class="text-right py-2"><p class="text-light text-right"><i class="fas fa-address-card pl-2"></i>تهران، بازار بزرگ، سرای آزادی، طبقه اول پلاک <span class="Yekan">48</span></p></li>
                        <li class="text-right py-2 "><p class="text-light text-right"><i class="fas fa-phone pl-2"></i> <span class="Yekan">55615148 </span>- <span class="Yekan"><span class="Yekan">55983072</span></span> - <span class="Yekan"><span class="Yekan"><span class="Yekan"><span class="Yekan">09121158204</span></span></span></span></p></li>
                        <li class="text-right py-2"><p class="text-light text-right"><i class="fas fa-envelope pl-2"></i>info@diorhome.ir</p></li>
                    </ul>
                </div>
            </div>
        </section>
    </footer>
<?php
}
// showing username in the jumbotron after signing in:
function user_name_show(){
    if(!empty($_SESSION['user_username'])){
        echo $_SESSION['user_username'] . " عزیز ";
    }else{
        echo 'کاربر گرامی ';
    }
}
// showing check on the user icon in the header after user signed in:
function header_logged_in_icon_generator(){
    if(empty($_SESSION['user_username'])){
?>
       <a href="login.php"><i class="fa fa-user" style=""></i></a>
<?php
    }else{
?>
        <a href="userModification.php"><i class="fa fa-user position-relative" style=""><i class="fa fa-check text-success position-absolute" style="left:50%;transform:translateX(-50%);text-shadow:1px 1px 1px white;"></i></i></a>
<?php
    }
}
function shopping_cart_logged_in_icon_generator(){
    if(empty($_SESSION['user_username'])){
?>
        <i class="fa fa-shopping-cart" style=""></i>
<?php
     }else{
?>
        <i class="fa fa-shopping-cart position-relative" style=""><i class="fa fa-check text-success position-absolute" style="left:50%;transform:translateX(-50%);"></i></i>
<?php
     }
}
function user_modification_form_generator(){
    // database connection:
    require "database_connection.php";
    if(!$database_connection){
        die('connection failed:'.mysqli_connect_error());
    }else{
        $username =  $_SESSION['user_username'];
        $user_finder_query = "SELECT * FROM users WHERE username = '$username'";
        $query_check = mysqli_query($database_connection, $user_finder_query);
        if (mysqli_num_rows($query_check) === 1){
            $user_row = mysqli_fetch_assoc($query_check);

            $first_name = $user_row['first_name'];
            $last_name = $user_row['last_name'];
            $age = $user_row['age'];
            $gender = $user_row['gender'];
            $age = $user_row['age'];
            $email = $user_row['email'];
            $landline = $user_row['landline'];
            $mobile_phone = $user_row['mobile_phone'];
            $website = $user_row['website'];
            $home_address = $user_row['home_address'];

?>
        <div class="row d-flex justify-content-around p-4 pb-5">
            <fieldset class="col-11 col-lg-3">
                <legend class="text-light text-center">اطلاعات هویتی:</legend>
                <form action="#" method="post" class="text-light personal-info">
                    <div class="form-group">
                        <label class="required" for="first_name">نام:</label>
                        <input type="text" class="form-control form-input" id="first_name" name="first_name" placeholder="Babak" oninput="form_validator(/^[A-Z][a-z]{2,}$/, this)" value="<?php if(!empty($first_name)){echo $first_name;} ?>" >
                        <p class="displayNone">نام باید به لاتين باشد با حرف بزنگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>
                    </div>
                    <div class="form-group">
                        <label class="required" for="last_name">نام خانوادگی:</label>
                        <input type="text" class="form-control form-input" id="last_name" name="last_name" placeholder="Ashtari" oninput="form_validator(/^[A-Z][a-z]{2,}$/, this)" value="<?php if(!empty($last_name)){echo $last_name;} ?>" >
                        <p class="displayNone">نام خانوادگی باید با حروف بزنگ آغاز شود و حداقل 3 کاراکتر داشته باشد.</p>
                    </div>
                    <div class="form-group">
                        <label for="age">سن:</label>
                        <input type="number" min="0" max="80" class="form-control form-input" id="age" name="age" placeholder="25" oninput="form_validator(/^(([1][2-9])|([2-7][0-9]))$/, this)" value="<?php if(!empty($age)){echo $age;} ?>" >
                        <p class="displayNone">تنها اعداد بین 12 و 80 قابل قبول هستند.</p>
                    </div>
                    <div class="form-group">
                        <label for="gender">جنسیت:</label>
<?php
                        if(empty($gender)){
?>
                                <select class="p-1" name="gender" id="gender" onchange="form_validator(/^(male)|(female)$/, this)">
                                    <option value="">انتخاب کنید</option>
                                    <option value="male">مذکر</option>
                                    <option value="female">مونث</option>
                                </select>
<?php
                        }else{
                            if($gender === "male"){
?>
                                    <select class="p-1" name="gender" id="gender" onchange="form_validator(/^(male)|(female)$/, this)">
                                        <option value="default">انتخاب کنید</option>
                                        <option value="male" selected="selected">مذکر</option>
                                        <option value="female">مونث</option>
                                    </select>
<?php
                            }elseif ($gender === "female") {
?>
                                    <select class="p-1" name="gender" id="gender" onchange="form_validator(/^(male)|(female)$/, this)">
                                        <option value="default">انتخاب کنید</option>
                                        <option value="male">مذکر</option>
                                        <option value="female" selected="selected">مونث</option>
                                    </select>
<?php
                            }
                        }
?>
                    </div>
                    <input class="p-2 btn btn-primary" type="submit" name="personal_info" onclick="user_info_validator(event);" value="اعمال تغییرات">
                </form> 
            </fieldset>
            <fieldset class="col-11 col-lg-3">
                <legend class="text-light text-center">اطلاعات تماس:</legend>
                <form action="#" method="post" class="text-light contact-info">
                    <div class="form-group">
                        <label class="required" for="mobile_phone">شماره تلفن همراه:</label>
                        <input type="text" class="form-control form-input" id="mobile_phone" name="mobile_phone" placeholder="09127621031" oninput="form_validator(/^09[0-9]{9}$/, this)" value="<?php if(!empty($mobile_phone)){echo $mobile_phone;} ?>" >
                        <p class="displayNone">شماره موبایل صحیح نیست.</p>
                    </div>
                    <div class="form-group">
                        <label for="landline">شماره تلفن ثابت:</label>
                        <input type="text" class="form-control form-input" id="landline" name="landline" placeholder="02177822661" oninput="form_validator(/^0[0-9]{7,}$/, this)" value="<?php if(!empty($landline)){echo $landline;} ?>" >
                        <p class="displayNone">شماره تلفن را با پیش شماره شهر وارد کنید.</p>
                    </div>
                    <div class="form-group">
                        <label class="required" for="email">آدرس ایمیل:</label>
                        <label for="newsletter">(دریافت خبرنامه)</label>
<?php
                        function newsletter_check(){
                            // database connection:
                            require "database_connection.php";
                            // connect_database();
                            if(!$database_connection){
                                die('connection failed:'.mysqli_connect_error());
                            }else{
                                $user = $_SESSION['user_username'];
                                $query = "SELECT * FROM users WHERE username = '$user' ";
                                $result = mysqli_query($database_connection, $query);
                                $result_arr = mysqli_fetch_assoc($result);
                                if($result_arr['newsletter'] === "YES"){
?>
                                    <input type="checkbox" value="YES" id="newsletter" name="newsletter" checked="true">
<?php
                                }elseif($result_arr['newsletter'] === "NO"){
?>
                                    <input type="checkbox" value="YES" id="newsletter" name="newsletter" >
<?php
                                }
                            }
                        }
                        newsletter_check();

?>
                        <input type="email" class="form-control form-input" id="email" name="email" placeholder="ashtaribabak@rocketmail.com" oninput="form_validator(/^[a-z0-9]{3,}@[a-z]{3,}\.[a-z]{0,3}$/,this)" value="<?php if(!empty($email)){echo $email;} ?>" >
                        <p class="displayNone">فرمت ایمیل صحیح نیست.</p>
                    </div>
                    <div class="form-group">
                        <label class="required" for="home_address">آدرس پستی:</label>
                        <input type="text" class="form-control" id="home_address" name="home_address" placeholder="تهران، بازار بزرگ، سرای آزادی، طبقه اول پلاک 48" value="<?php if(!empty($home_address)){echo $home_address;} ?>">
                    </div>
                    <input class="p-2 btn btn-primary" type="submit" name="contact_info" onclick="user_info_validator(event);" value="اعمال تغییرات">
                </form> 
            </fieldset>
            <fieldset class="col-11 col-lg-3">
                <legend class="text-light text-center">اطلاعات کاربری:</legend>
                <form action="#" method="post" class="text-light user-info">
                    <div class="form-group">
                        <label class="required" for="user_name">نام کاربری:</label>
                        <input type="text" class="form-control form-input" id="user_name" name="user_name" placeholder="Babak" oninput="form_validator(/^[A-Z][a-z0-9]{3,15}$/,this)" value="<?php if(!empty($username)){echo $username;} ?>">
                        <p class="displayNone">نام کاربری باید لاتین باشد، با حرف بزرگ آغاز شود و فقط از حروف و اعداد تشکیل شده باشد</p>
                    </div>
                    <div class="form-group">
                        <label class="required" for="old_pass">رمز عبور قدیمی:</label>
                        <input type="password" class="form-control form-input" id="old_pass" name="old_pass" oninput="form_validator(/^[a-zA-Z0-9]{5,15}$/,this)">
                        <p class="displayNone">رمز باید از اعداد و حروف کوچک و بزرگ تشکیل شده باشد و بین 5 تا 15 کاراکتر باشد.</p>
                    </div>
                    <div class="form-group">
                        <label class="required" for="new_pass">رمز عبور جدید:</label>
                        <input type="password" min="0" max="80" class="form-control form-input" id="new_pass" name="new_pass" oninput="form_validator(/^[a-zA-Z0-9]{5,15}$/,this)">
                        <p class="displayNone">رمز باید از اعداد و حروف کوچک و بزرگ تشکیل شده باشد و بین 5 تا 15 کاراکتر باشد.</p>
                    </div>
                    <div class="form-group">
                        <label for="website">آدرس وبسایت:</label>
                        <input type="text" min="0" max="80" class="form-control form-input" id="website" name="website" placeholder="babakashtari.ir" oninput="form_validator(/^(www\.|https?:\/\/)([a-z0-9]{2,}\.){1,3}[a-z]{1,3}$/, this)" value="<?php if(!empty($website)){echo $website;} ?>" >
                        <p class="displayNone">فرمت وبسایت صحیح نیست.</p>
                    </div>
                    <input class="p-2 btn btn-primary" type="submit" name="user_info" onclick="user_info_validator(event);" value="اعمال تغییرات">
                </form> 
            </fieldset>
        </div>
<?php  
        }
    }
}

function contact_us_modal(){
?>
    <!-- Modal -->
<div class="modal fade" id="contact_us_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header row m-0">
            <div class="col-12">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="text-center col-12">
                <img src="images/Dior_logo.jpg" alt="آرم سایت رسمی پيشگامان پودينه آتا">
            </div>
            <h5 class="modal-title text-dark col-12 text-center pt-1" id="exampleModalLabel">پیشگامان پودینه آتا:</h5>
        </div>
        <div class="modal-body">
            <p><i class="fas fa-address-card pl-2 "></i> دفتر مرکزی: تهران، بازار بزرگ، سرای آزادی، طبقه اول پلاک 48</p>
            <p><i class="fas fa-address-card pl-2 "></i> کارخانه: اردبیل، ميدان ايثار، شهرك صنعتی فاز 1 خيابان پنج شرقی پيشگامان پودينه آتا</p>
        </div>
        <div class="modal-footer">
            <p class="col-12 row p-0"> 
                <span class="label col-12">
                    <i class="fas fa-phone pl-2"></i>دفتر مرکزی:
                </span>
                <span class="col-4" itemdrop="telephone">
                    <a class="Yekan " href="tel:55615148 ">55615148</a>
                </span>
                <span class="col-4" itemdrop="telephone">
                    <a class="Yekan " href="tel:55983072">55983072</a>
                </span>
                <span class="col-4" itemdrop="telephone">
                    <a class="Yekan " href="tel:09121158204">09121158204</a>
                </span>
            </p>
            <p class="col-12 row p-0">
                <span class="label col-12">
                    <i class="fas fa-phone pl-2"></i>کارخانه:
                </span>
                <span class="col-4" itemdrop="telephone">
                    <a class="Yekan" href="tel:55637991">55637991</a>
                </span>
                <span class="col-4" itemdrop="telephone">
                    <a class="Yekan" href="tel:09122084055">09122084055</a>
                </span>
            </p>
        </div>
    </div>
  </div>
</div>

<?php
}
function five_photos_section(){ 

?>
    <table class="container px-1">
        <tr class="row">
            <td class="col-6 py-2 px-2 px-md-4"><a href="products.php?product_category=carpet_products&product_subcategory=تابلوفرش"><img class="border border-primary" src="images/index_images/carpet_board1.jpg" alt="روتختی نمونه کار پیشگامان پودینه"></a></td>
            <td class="col-3 py-2 px-2 px-md-4"><a href="products.php?product_category=living_room_products&product_subcategory=پرده"><img class="border border-primary" src="images/index_images/curtain.png" alt="پرده نمونه چاپی پیشگامان پودینه"></a></td>
            <td class="col-3 py-2 px-2 px-md-4"><a href="products.php?product_category=sleeping_products"><img class="border border-primary" src="images/index_images/bedsheet.png" alt="كالاي خواب شامل كوسن، روتختي و روملافه اي"></a></td>
        </tr>
        <tr class="row label">
            <td class="col-6 py-2 px-2 px-md-4"><a href="products.php?product_category=carpet_products&product_subcategory=تابلوفرش">تابلوفرش</a></td>
            <td class="col-3 py-2 px-2 px-md-4"><a href="products.php?product_category=living_room_products&product_subcategory=پرده">پرده </a></td>
            <td class="col-3 py-2 px-2 px-md-4"><a href="products.php?product_category=sleeping_products">كالای خواب</a></td>
        </tr>
        <tr class="row">
            <td class="col-6 py-2 px-2 px-md-4"><a href="products.php?product_category=carpet_products&product_subcategory=روفرشی"><img class="border border-primary" src="images/index_images/carpet3.jpg" alt="روفرشی تولید پیشگامان پودینه"></a></td>
            <td class="col-6 py-2 px-2 px-md-4"><a href="products.php?product_category=living_room_products&product_subcategory=رومبلی"><img class="border border-primary" src="images/index_images/sofa_cover.jpg" alt="رومبلی تولید پیشگامان پودینه"></a></td>
        </tr>
        <tr class='row label'>
            <td class="col-6 py-2 px-2 px-md-4"><a href="products.php?product_category=carpet_products&product_subcategory=روفرشی">روفرشی</a></td>
            <td class="col-6 py-2 px-2 px-md-4"><a href="products.php?product_category=living_room_products&product_subcategory=رومبلی">رومبلی</a></td>
        </tr>
    </table>
<?php 
}

?>