<?php 
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
            echo '<div class="col-xs-12 col-sm-6 col-md-3 p-3">';
            echo    '<div class="card border border-primary">';
            echo        '<img class="card-img-top" src="' . $card_images[$i]. '" alt="'. $card_header[$i] . '">';
            echo        '<div class="card-body text-center ">';
            echo            '<h6 class="card-title ">' . $card_header[$i] . '</h6>';
            echo            '<p class="card-text">' . $card_text[$i] . '<p class="card-text"></p>';
            echo            '<a href="#" class="btn btn-primary">' . 'افزودن به سبد خرید' . '</a>';
            echo        '</div>';
            echo    '</div>';    
            echo '</div>';
        }    
    }
?>