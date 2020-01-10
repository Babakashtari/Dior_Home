<?php



function canvas_generator(){
    echo "<canvas style='z-index: -1;position:fixed;top:0;left:0;right:0;bottom:0;background-color:black;'>your browser does not support canvas</canvas>";
}

function card_generator(){
    $card_images = ["images/search_images/cushion2.jpg", "images/search_images/carpet3.jpg", "images/search_images/sleeping_products2.jpg", "images/search_images/curtain.jpg", "images/search_images/towel_printing.jpg", "images/search_images/fabric_printing3.jpg", "images/search_images/T_shirt.jpg", "images/search_images/stationery.jpg", "images/search_images/purse.png", "images/search_images/boxer.jpg", "images/search_images/plate.jpg", "images/search_images/poster.jpg"];
    $card_header = ["مبلمان", "تابلو فرش", "کالای خواب", "پرده اي", "كالاي استحمام", "چاپ پارچه", "چاپ روي لباس", "لوازم التحریر", "چاپ روی چرم", "زیر پوش", "ظروف آشپزخانه", "پستر"];
    $card_text = ["کوسن، رومبلی، روبالشی", "طبیعت، چهره، عکس، نقاشی", "روتختی، روبالشی، ملافه", "چاپ طرح ملحفه و پرده", "چاپ طرح روي حوله همه سايز", "چاپ طرح های متفاوت روی انواع پارچه","چاپ انواع الگو و طرح روي پوشاك", "چاپ روی کتاب، دفتر، قلم، گیره ", "چاپ روی کیف و کفش و کوله و جاقلمی", " چاپ روی انواع زیرپوش و لباس زیر", "چاپ لوگو و عکس روی ظروف چینی و ملامین", "چاپ انواع تابلو و پستر تبليغاتي"];

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
