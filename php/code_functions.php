<?php



function canvas_generator(){
    echo "<canvas style='z-index: -1;position:fixed;top:0;left:0;right:0;bottom:0;background-color:black;'>your browser does not support canvas</canvas>";
}

function card_generator(){
    $card_images = ["images/search_images/cushion2.jpg", "images/search_images/carpet3.jpg", "images/search_images/sleeping_products2.jpg"];
    $card_header = ["مبلمان", "تابلو فرش", "کالای خواب"];
    $card_text = ["کوسن، رومبلی، روبالشی", "طبیعت، چهره، عکس، نقاشی", "روتختی، روبالشی، ملافه"];

    for($i=0; $i<count($card_images); $i++){
        echo '<div class="card col-4">';
        echo '<img class="card-img-top" src="' . $card_images[$i]. '" alt="'. $card_header[$i] . '">';
        echo '<div class="card-body">';
        echo '<h4 class="card-title">' . $card_header[$i] . '</h4>';
        echo '<p class="card-text">' . $card_text[$i] . '<p class="card-text"></p>';
        echo '<a href="#" class="btn btn-primary">' . 'بازدید' . '</a>';
        echo '</div>';
        echo '</div>';    
    }
}
?>
