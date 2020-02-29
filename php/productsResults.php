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
        
    $inputs_arr = [];
    array_push($inputs_arr, "approved='YES'");
    if(!empty($_GET['product_name'])){
        $product_name = test_input($_GET['product_name'], "/^[a-zA-Z\d\s]{3,15}$/");
        if(!empty($product_name)){
            array_push($inputs_arr, "product_name='$product_name'");
        }
    }
    if(!empty($_GET['product_dimensions'])){
        $product_dimensions = test_input($_GET['product_dimensions'], "/^[0-9]{1,3}[X*\/][0-9]{1,3}$/");
        if(!empty($product_dimensions)){
            array_push($inputs_arr, "product_dimensions='$product_dimensions'");
        }
    }
    if(!empty($_GET['product_category'])){
        $product_category = test_input($_GET['product_category'], '/^(sleeping_products|living_room_products|carpet_products)$/' );
        if(!empty($product_category)){
            array_push($inputs_arr, "product_category='$product_category'");
        }
    }
    if(!empty($_GET['product_subcategory'])){
        $product_subcategory = test_subcategory_input($_GET['product_subcategory'], '/^(کوسن|روبالشی|روتختی|ملافه|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/');
        if(!empty($product_subcategory)){
            array_push($inputs_arr, "product_subcategory='$product_subcategory'");
        }
    }
    if(!empty($_GET['product_description'])){
        $product_description = test_subcategory_input($_GET['product_description'], '/[a-zA-Z0-9ا-يئءیکآ]{1,}/');
        if(!empty($product_description)){
            array_push($inputs_arr, "product_description='$product_description'");
        }
    }
        $query = " SELECT * FROM products WHERE ";
        for($l=0;$l<count($inputs_arr); $l++){
            if($l == 0){
                $query .= " " . $inputs_arr[$l];
            }else{
                $query .= " AND" . " ". $inputs_arr[$l];
            }
        }
    // getting the total number of pages:
    require "database_connection.php";
    if(!$database_connection){
        die('connection failed:'.mysqli_connect_error());
    }else{
        $query_result = mysqli_query($database_connection, $query);
        $total_number_of_rows = mysqli_num_rows($query_result);
        $number_of_rows_per_page = 12;
        $total_number_of_pages = ceil($total_number_of_rows / $number_of_rows_per_page);
        if(!empty($_GET['page_number'])){
            $page_number = $_GET['page_number'];
        }else{
            $page_number = 1;
        }
        // show only $number_of_rows_per_page and start from $page_number -1 * number_of_rows_per_page:
        $offset = ($page_number - 1) * $number_of_rows_per_page;
        $query .= " LIMIT " . $offset . "," . $number_of_rows_per_page;
    }

    function pagination(){
        $page_number = $GLOBALS['page_number'];
        $total_number_of_rows = $GLOBALS['total_number_of_rows'];
        $total_number_of_pages = $GLOBALS['total_number_of_pages'];
        $total_number_of_rows_per_page = $GLOBALS['number_of_rows_per_page'];
        $inputs_arr = $GLOBALS['inputs_arr'];
        $href='';

        foreach ($inputs_arr as $key => $value) {
            $href .= '&' . $value;
        }
        $href = str_replace("'", "", $href);

        // صفحه اول:
        if($page_number == 1){
            // اگر هیچ نتیجه ای یافت نشد:
            if($total_number_of_rows<=0){
                $from = 0;
                // اگر نتیجه ای یافت شد:
            }else{
                $from = 1;
            }
            // اگر نتایج یافت شده کمتر از 12 بود:
            if($total_number_of_rows< $total_number_of_rows_per_page){
                $to = $total_number_of_rows;
                // اگر نتایج یافت شده بیشتر از 12 بود:
            }else{
                $to = $total_number_of_rows_per_page;
            }
            // صفحه آخر:
        }elseif($page_number == $total_number_of_pages){
            $from = ($page_number -1) * $total_number_of_rows_per_page;
            $to = $total_number_of_rows;
            // صفحات وسطی:
        }else{
            $from = ($page_number -1) * $total_number_of_rows_per_page;
            $to = $from + $total_number_of_rows_per_page;
        }

        if($total_number_of_rows > 0){
            echo '<p class="text-light text-center">نمایش نتایج <span class="Yekan">' . $from . '</span> تا  <span class="Yekan">' . $to . '</span> از <span class="Yekan">' . $total_number_of_rows . '</span> مورد یافت شده</p>';
        }
        echo '<ul class="pagination justify-content-center">';

        if($total_number_of_pages<=3){
            for($m = 1 ; $m<=$total_number_of_pages ; $m++){
                if($m == $page_number){
                    echo '<li class="page-item active"><a class="page-link Yekan" href="#">'. $m.'</a></li>';
                }else{
                    echo '<li class="page-item"><a class="page-link Yekan" href="?page_number='. $m. $href. '">'. $m.'</a></li>';
                }
            }
        }else{
            if($page_number<=1){
                echo    '                    
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                        ';
                for($m = 1 ; $m<=3 ; $m++){
                    if($m == $page_number){
                        echo '<li class="page-item active"><a class="page-link Yekan" href="#">'. $m.'</a></li>';
                    }else{
                        echo '<li class="page-item"><a class="page-link Yekan" href="?page_number='. $m. $href .'">'. $m.'</a></li>';
                    }
                }
                echo    '
                    <li class="page-item">
                        <a class="page-link Yekan" href="?page_number='.$total_number_of_pages. $href. '" aria-label="Next">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                        ';
            }elseif($page_number>= $total_number_of_pages){
                echo    '
                    <li class="page-item">
                        <a class="page-link" href="?page_number=1'. $href. '" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                        ';
                for($m = $total_number_of_pages - 2 ; $m<=$total_number_of_pages ; $m++){
                    if($m == $page_number){
                        echo '<li class="page-item active"><a class="page-link Yekan" href="#">'. $m.'</a></li>';
                    }else{
                        echo '<li class="page-item"><a class="page-link Yekan" href="?page_number='. $m. $href. '">'. $m.'</a></li>';
                    }
                }
                echo    '
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                        ';
            }else{
                echo    '
                    <li class="page-item">
                        <a class="page-link Yekan" href="?page_number=1'. $href .'" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                        ';
                for($m = $page_number - 1 ; $m<=$page_number + 1 ; $m++){
                    if($m == $page_number){
                        echo '<li class="page-item active"><a class="page-link Yekan" href="#">'. $m.'</a></li>';
                    }else{
                        echo '<li class="page-item"><a class="page-link Yekan" href="?page_number='. $m. $href .'">'. $m.'</a></li>';
                    }
                }
                echo    '
                    <li class="page-item">
                        <a class="page-link" href="?page_number='. $total_number_of_pages . $href . '" aria-label="Next">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                        ';
            }
        }
        echo '</ul>';
    }


function category_option_generator(){
    $values = ['sleeping_products', 'living_room_products', 'carpet_products'];
    $value_names = ['کالای خواب', 'کالای اتاق پذیرایی', 'فرش'];

        for($i = 0; $i<count($values); $i++){
            echo '<option value="' . $values[$i]. '"';
            if(isset($_GET['product_category']) && $_GET['product_category'] == $values[$i]){
                echo 'selected = "selected" ';
            }
            echo '>'. $value_names[$i] . '</option>';
        }
}

function subcategory_option_generator(){
    if(!empty($_GET['product_subcategory']) ){
        $subcategories = ['روبالشی', 'روتختی', 'ملافه', 'کوسن', 'پرده', 'رومبلی', 'رومیزی', 'فرش', 'روفرشی', 'تابلوفرش'];
        if(in_array($_GET['product_subcategory'], $subcategories)){
            echo '<option value="' . $_GET['product_subcategory']. '"' . ' selected="selected">' . $_GET['product_subcategory'] . '</option>';
        }
    }
}

function card_generators(){
    $number_of_rows_per_page = $GLOBALS['number_of_rows_per_page'];

    $query = $GLOBALS['query'];
    require "database_connection.php";
    if(!$database_connection){
        die('connection failed:'.mysqli_connect_error());
    }else{
        // code for the badges:
        $bedsheet_query = "SELECT COUNT(*) AS bedsheet FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'روتختی' ";
        $bedsheet_query_result = mysqli_query($database_connection, $bedsheet_query);
        $bedsheet_query_result_array = mysqli_fetch_assoc($bedsheet_query_result);
            echo '<p class="text-light">' . $bedsheet_query_result_array['bedsheet'] . '</p>';
        $pillow_query = "SELECT COUNT(*) AS pillow FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'روبالشی' ";
        $pillow_query_result = mysqli_query($database_connection, $pillow_query);
        $pillow_query_result_array = mysqli_fetch_assoc($pillow_query_result);
            echo '<p class="text-light">' . $pillow_query_result_array['pillow'] . '</p>';
        $bedroom_cushion_query = "SELECT COUNT(*) AS bedroom_cushion FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'کوسن' ";
        $bedroom_cushion_query_result = mysqli_query($database_connection, $bedroom_cushion_query);
        $bedroom_cushion_query_result_array = mysqli_fetch_assoc($bedroom_cushion_query_result);
            echo '<p class="text-light">' . $bedroom_cushion_query_result_array['bedroom_cushion'] . '</p>';
        $bedcover_query = "SELECT COUNT(*) AS bedcover FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'ملافه' ";
        $bedcover_query_result = mysqli_query($database_connection, $bedcover_query);
        $bedcover_query_result_array = mysqli_fetch_assoc($bedcover_query_result);
            echo '<p class="text-light">' . $bedcover_query_result_array['bedcover'] . '</p>';
        $table_cloth_query = "SELECT COUNT(*) AS tablecloth FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'رومیزی' ";
        $table_cloth_query_result = mysqli_query($database_connection, $table_cloth_query);
        $table_cloth_query_result_array = mysqli_fetch_assoc($table_cloth_query_result);
            echo '<p class="text-light">' . $table_cloth_query_result_array['tablecloth'] . '</p>';
        $curtain_query = "SELECT COUNT(*) AS curtain FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'پرده' ";
        $curtain_query_result = mysqli_query($database_connection, $curtain_query);
        $curtain_query_result_array = mysqli_fetch_assoc($curtain_query_result);
            echo '<p class="text-light">' . $curtain_query_result_array['curtain'] . '</p>';
        $livingroom_cushion_query = "SELECT COUNT(*) AS cushion FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'کوسن' ";
        $livingroom_cushion_query_result = mysqli_query($database_connection, $livingroom_cushion_query);
        $livingroom_cushion_query_result_array = mysqli_fetch_assoc($livingroom_cushion_query_result);
            echo '<p class="text-light">' . $livingroom_cushion_query_result_array['cushion'] . '</p>';
        $sofacover_query = "SELECT COUNT(*) AS sofacover FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'رومبلی' ";
        $sofacover_query_result = mysqli_query($database_connection, $sofacover_query);
        $sofacover_query_result_array = mysqli_fetch_assoc($sofacover_query_result);
            echo '<p class="text-light">' . $sofacover_query_result_array['sofacover'] . '</p>';
        $carpet_query = "SELECT COUNT(*) AS carpet FROM products WHERE product_category = 'carpet_products' AND product_subcategory = 'فرش' ";
        $carpet_query_result = mysqli_query($database_connection, $carpet_query);
        $carpet_query_result_array = mysqli_fetch_assoc($carpet_query_result);
            echo '<p class="text-light">' . $carpet_query_result_array['carpet'] . '</p>';
        $carpet_cover_query = "SELECT COUNT(*) AS carpet_cover FROM products WHERE product_category = 'carpet_products' AND product_subcategory = 'روفرشی' ";
        $carpet_cover_query_result = mysqli_query($database_connection, $carpet_cover_query);
        $carpet_cover_query_result_array = mysqli_fetch_assoc($carpet_cover_query_result);
            echo '<p class="text-light">' . $carpet_cover_query_result_array['carpet_cover'] . '</p>';
        $carpetboard_query = "SELECT COUNT(*) AS carpetboard FROM products WHERE product_category = 'carpet_products' AND product_subcategory = 'تابلوفرش' ";
        $carpetboard_query_result = mysqli_query($database_connection, $carpetboard_query);
        $carpetboard_query_result_array = mysqli_fetch_assoc($carpetboard_query_result);
            echo '<p class="text-light">' . $carpetboard_query_result_array['carpetboard'] . '</p>';
    


        $query_result = mysqli_query($database_connection, $query);
        $total_number_of_rows = mysqli_num_rows($query_result);
        if($total_number_of_rows<=0){
            echo '<div class="col-12 text-center text-danger"><p class="my-4">هیچ نتیجه ای بر اساس معیار های جستجو یافت نشد.</p></div>';
        }else{
            while ($row = mysqli_fetch_array($query_result)) {
                echo '<div class=" product-results col-xs-12 col-sm-6  col-lg-4 col-xl-3 p-3">';
                echo    '<div class="card border border-primary">';
                echo        '<img class="card-img-top" src="' . $row['product_directory']. '" alt="'. $row['product_description'] . '">';
                echo        '<div class="card-body text-center ">';
                echo            '<h6 class="card-title ">نام محصول:<span class="text-success"> ' . $row['product_name'] . '</span></h6>';
                echo            '<table>';
                echo            '<tr><td><p class="card-text text-right">ابعاد:</p></td><td><p><span class="text-success"> ';
                if(!empty($row['product_dimensions'] )){
                  echo  $row['product_dimensions']; 
                }else{
                    echo 'همه ابعاد';
                }
                echo            '</span></p></td></tr>';
                echo            '<tr><td><p class="card-text text-right">دسته بندی:</p></td><td><p><span class="text-success"> ';
                if($row['product_category'] == "sleeping_products"){
                    echo "کالای خواب";
                } elseif($row['product_category'] == "living_room_products"){
                    echo "کالای اتاق پذیرایی";
                }elseif($row['product_category'] == "carpet_products"){
                    echo "فرش";
                }
                echo '</span></p></td></tr>';
                echo            '<tr><td><p class="card-text text-right">زیرمجموعه:</p></td><td><p><span class="text-success"> '. $row['product_subcategory'] .'</span></p></td></tr>';
                echo            '<tr><td><p class="card-text text-right">توضیحات:</p></td><td><p><span class="text-success"> ';
                if(!empty($row['product_description'])){
                    echo    $row['product_description']; 
                }else{
                    echo 'ندارد';
                }
                echo            '</span></p></td></tr>';
                echo            '</table>';
                echo            '<a href="#" class="btn btn-primary mt-4">' . 'افزودن به سبد خرید' . '</a>';
                echo        '</div>';
                echo    '</div>';    
                echo '</div>';
            }    
        }
    }      
}
?>