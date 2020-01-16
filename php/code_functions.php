<?php



function canvas_generator(){
    echo "<canvas style='z-index: -1;position:fixed;top:0;left:0;right:0;bottom:0;background-color:black;'>your browser does not support canvas</canvas>";
}

function Search_card_generator(){
    $card_images = ["images/search_images/sleeping_products3.jpg", "images/search_images/bedsheet.jpg", "images/search_images/pillow2.jpg", "images/search_images/home_furniture.jpg", "images/search_images/cushion4.jpg", "images/search_images/table_cloth.jpeg", "images/search_images/curtain.jpg", "images/search_images/fabric_printing.jpg", "images/search_images/carpet_printing.jpg", "images/search_images/carpet_cover.jpg", "images/search_images/carpet_board.jpg", "images/search_images/order.jpg"];
    $card_header = ["انواع کالای خواب", "روتختی", "روبالشی", "رومبلی", "کوسن", "رومیزی", "پرده" , "طرح پارچه", "چاپ انواع فرش", "روفرشی", "تابلو فرش", "سفارش"];
    $card_text = ["چاپ طرح روبالشی، روتختی و کوسن", "چاپ انواع طرح و الگوی روتختی", "چاپ انواع طرح و الگوی روبالشی", "چاپ انواع الگو و طرح برای رومبلی", "چاپ انواع طرح و الگو روی کوسن", "طراحی و چاپ انواع عکس و الگوی رومیزی", "چاپ الگو و طرح ملحفه پرده ای", "طراحی و چاپ انواع عکس و الگو روی پارچه ", "چاپ الگو، طرح و عکس روی فرش، روفرشی و تابلوفرش", "چاپ انواع طرح و عکس برای روفرشی", "چاپ دیجیتالی عکس و الگو جهت تابلوفرش", "پذیرش هرگونه طرح و الگوی جدید جهت چاپ"];

    for($i=0; $i<count($card_images); $i++){
        echo '<div class="px-1">';
        echo    '<div class="card border border-primary">';
        echo        '<img class="card-img-top" src="' . $card_images[$i]. '" alt="'. $card_header[$i] . '">';
        echo        '<div class="card-body text-center d-flex flex-column justify-content-between">';
        echo            '<h6 class="card-title ">' . $card_header[$i] . '</h6>';
        echo            '<p class="card-text">' . $card_text[$i] . '<p class="card-text"></p>';
        echo            '<a href="#" class="btn btn-primary">' . 'بازدید' . '</a>';
        echo        '</div>';
        echo    '</div>';    
        echo '</div>';
    }
}

?>
