<?php 
    function test_input($data, $regex) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strtolower($data);
        if (preg_match($regex,$data)) {
            return $data;
        }else{
            return $data = "";
        }
    }
    // as subcategory values are in Persian there is no need for strtolower() function for validation:
    function test_subcategory_input($data, $regex) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        if (preg_match($regex,$data)) {
            return $data;
        }else{
            return $data = "";
        }        
    }
        
    if(isset($_GET['file_name'])){
        $product_name = test_input($_GET['file_name'], "/^[a-zA-Z\d\s]{3,15}$/");
    }
    if(isset($_GET['dimensions'])){
        $product_dimensions = test_input($_GET['dimensions'], "/^[0-9]{1,3}[X*\/][0-9]{1,3}$/");
    }
    if(isset($_GET['category'])){
        $product_category = test_input($_GET['category'], '/^(sleeping_products|living_room_products|carpet_products)$/' );
    }
    if(isset($_GET['subcategory'])){
        $product_subcategory = test_subcategory_input($_GET['subcategory'], '/^(کوسن|روبالشی|روتختی|ملافه|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/');
    }
    if(isset($_GET['description'])){
        $product_description = test_subcategory_input($_GET['description'], '/[a-zA-Z0-9ا-يئءیکآ]{1,}/');
    }

    $approved = "YES";

    $inputs_arr = [];

    if(!empty($_GET['file_name'])){
        $product_name = test_input($_GET['file_name'], "/^[a-zA-Z\d\s]{3,15}$/");
         array_push($inputs_arr, " product_name ='$product_name' ");
    }
    if(!empty($_GET['dimensions'])){
        $product_dimensions = test_input($_GET['dimensions'], "/^[0-9]{1,3}[X*\/][0-9]{1,3}$/");
        array_push($inputs_arr, " product_dimensions ='$product_dimensions' ");
    }
    if(!empty($_GET['category'])){
        $product_category = test_input($_GET['category'], '/^(sleeping_products|living_room_products|carpet_products)$/' );
        array_push($inputs_arr, " product_category ='$product_category' ");
    }
    if(!empty($_GET['subcategory'])){
        $product_subcategory = test_subcategory_input($_GET['subcategory'], '/^(کوسن|روبالشی|روتختی|ملافه|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/');
        array_push($inputs_arr, " product_subcategory ='$product_subcategory' ");
    }
    if(!empty($_GET['description'])){
        $product_description = test_subcategory_input($_GET['description'], '/[a-zA-Z0-9ا-يئءیکآ]{1,}/');
        array_push($inputs_arr, " product_description ='$product_description' ");
    }

    if(count($inputs_arr) == 0){
        $query = " SELECT * FROM products ";
    }else{
        $query = " SELECT * FROM products WHERE ";
        for($l=0;$l<count($inputs_arr); $l++){
            if($l == 0){
                $query .= $inputs_arr[$l];
            }else{
                $query .= "AND" . $inputs_arr[$l];
            }
        }
    }
    print_r($query);
    // pagination:
    if(isset($_GET['page_number'])){
        $page_number = $_GET['page_number'];
    }else{
        $page_number = 1;
    }
    // getting the total number of pages:
    
    $number_of_rows_per_page = 12;
    // starting point:
    // $offset = ($page_number-1) * $number_of_rows_per_page;
    // $query .= "LIMIT $number_of_rows_per_page OFFSET $offset";





function category_option_generator(){
    $values = ['sleeping_products', 'living_room_products', 'carpet_products'];
    $value_names = ['کالای خواب', 'کالای اتاق پذیرایی', 'فرش'];

        for($i = 0; $i<count($values); $i++){
            echo '<option value="' . $values[$i]. '"';
            if(isset($_GET['category']) && $_GET['category'] == $values[$i]){
                echo 'selected = "selected" ';
            }
            echo '>'. $value_names[$i] . '</option>';
        }
}

function subcategory_option_generator(){
    if(isset($_GET['subcategory']) && !empty($_GET['subcategory']) ){
        $subcategories = ['روبالشی', 'روتختی', 'ملافه', 'کوسن', 'پرده', 'رومبلی', 'رومیزی', 'فرش', 'روفرشی', 'تابلوفرش'];
        if(in_array($_GET['subcategory'], $subcategories)){
            echo '<option value="' . $_GET['subcategory'] . 'selected="selected">' . $_GET['subcategory'] . '</option>';
        }
    }
}

function card_generators(){
        $number_of_results_per_page = 12;
        $products_name = [];
        $products_directory = [];
        $products_dimensions = [];
        $products_category = [];
        $products_subcategory = [];
        $products_description = [];

        $card_images = ["images/search_images/sleeping_products3.jpg", "images/search_images/bedsheet.jpg", "images/search_images/pillow2.jpg", "images/search_images/home_furniture.jpg", "images/search_images/sofa_cover.jpg", "images/search_images/cushion4.jpg", "images/search_images/table_cloth.jpeg", "images/search_images/curtain.jpg", "images/search_images/carpet_printing.jpg", "images/search_images/carpet_cover.jpg", "images/search_images/carpet_board.jpg", "images/search_images/order.jpg"];
        $card_header = ["انواع کالای خواب", "روتختی", "روبالشی", "پارچه مبلی", "رومبلی", "کوسن", "رومیزی", "پرده" , "چاپ انواع فرش", "روفرشی", "تابلو فرش", "سفارشی"];
        $card_text = ["چاپ طرح روبالشی، روتختی و کوسن", "چاپ انواع طرح و الگوی روتختی", "چاپ انواع طرح و الگوی روبالشی", "چاپ انواع الگو و طرح روی پارچه مبل", "طراحی و چاپ انواع عکس، الگو و لوگو برای رومبلی", "چاپ انواع طرح و الگو روی کوسن", "طراحی و چاپ انواع عکس و الگوی رومیزی", "چاپ الگو و طرح ملحفه پرده ای", "چاپ الگو، طرح و عکس روی فرش، روفرشی و تابلوفرش", "چاپ انواع طرح و عکس برای روفرشی", "چاپ دیجیتالی عکس و الگو جهت تابلوفرش", "پذیرش هرگونه طرح و الگوی جدید جهت چاپ"];
    
        for($i = 0 ; $i < $number_of_results_per_page ; $i++){
            echo '<div class="col-xs-12 col-md-6 col-lg-4 p-3">';
            echo    '<div class="card border border-bottom-primary">';
            echo        '<img class="card-img-top" src="' . $card_images[$i]. '" alt="'. $card_header[$i] . '">';
            echo        '<div class="card-body text-center ">';
            echo            '<h6 class="card-title ">نام محصول: ' . $card_header[$i] . '</h6>';
            echo            '<p class="card-text text-right">ابعاد:</p>';
            echo            '<p class="card-text text-right">دسته بندی:</p>';
            echo            '<p class="card-text text-right">زیرمجموعه:</p>';
            echo            '<p class="card-text text-right">توضیحات:</p>';
            echo            '<p class="card-text text-right">' . $card_text[$i] . '</p>';
            echo            '<a href="#" class="btn btn-primary">' . 'افزودن به سبد خرید' . '</a>';
            echo        '</div>';
            echo    '</div>';    
            echo '</div>';
        }    
    }
?>