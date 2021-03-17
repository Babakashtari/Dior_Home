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
        $product_name = test_input($_GET['product_name'], "/^[a-zA-Z\d\s]{1,15}$/");
        if(!empty($product_name)){
            array_push($inputs_arr, "product_name like '%$product_name%'");
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
            array_push($inputs_arr, "product_description REGEXP '$product_description' ");
        }
    }
    // اگر در قسمت سرچ هدر چیزی سرچ شده بود:
    if(isset($_POST['search_button'])){
        $search_criterion = $_POST['search_criterion'];
        if(!empty($search_criterion)){
            $product_description = test_subcategory_input($_POST['search_criterion'], '/[a-zA-Z0-9ا-يئءیکآ]{1,}/');
            if(!empty($product_description)){
                array_push($inputs_arr, "product_description REGEXP '$product_description' ");
            }       
        }
    }

        // in order to sort results according to their date of upload:
        array_push($inputs_arr, "ORDER BY product_ID DESC");

        $query = " SELECT * FROM products WHERE ";
        for($l=0;$l<count($inputs_arr); $l++){
            if($l <= 0 ||  $l>= count($inputs_arr) - 1){
                $query .= " " . $inputs_arr[$l];
            }
            else{
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
        if(isset($GLOBALS['product_name'])){
            $product_name = $GLOBALS['product_name'];
        }else{
            $product_name = null;
        }
        $page_number = $GLOBALS['page_number'];
        $total_number_of_rows = $GLOBALS['total_number_of_rows'];
        $total_number_of_pages = $GLOBALS['total_number_of_pages'];
        $total_number_of_rows_per_page = $GLOBALS['number_of_rows_per_page'];
        $inputs_arr = $GLOBALS['inputs_arr'];
        $href='';

        foreach ($inputs_arr as $key => $value){
            if($value == "product_name like '%$product_name%'"){
                $href .= '&' . "product_name=$product_name";
            }else{
                $href .= '&' . $value;
            }
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
            ?>
                <p class="text-light text-center">نمایش نتایج <span class="Yekan"> <?php echo $from; ?></span> تا  <span class="Yekan"><?php echo $to; ?></span> از <span class="Yekan"><?php echo $total_number_of_rows; ?></span> مورد یافت شده</p>
            <?php
        }
        ?>
            <ul class="pagination justify-content-center">
        <?php
        if($total_number_of_pages<=3){
            for($m = 1 ; $m<=$total_number_of_pages ; $m++){
                if($m == $page_number){
                    ?>
                        <li class="page-item active"><a class="page-link Yekan" href="#"><?php echo $m; ?></a></li>
                    <?php
                }else{
                    ?>
                        <li class="page-item"><a class="page-link Yekan" href="?page_number=<?php echo $m . $href; ?>"><?php echo $m; ?></a></li>
                    <?php
                }
            }
        }else{
            if($page_number<=1){
                ?>                   
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php
                for($m = 1 ; $m<=3 ; $m++){
                    if($m == $page_number){
                        ?>
                            <li class="page-item active"><a class="page-link Yekan" href="#"><?php echo $m; ?></a></li>
                        <?php
                    }else{
                        ?>
                            <li class="page-item"><a class="page-link Yekan" href="?page_number=<?php echo $m. $href; ?>"><?php echo $m; ?></a></li>
                        <?php
                    }
                }
                ?>
                    <li class="page-item">
                        <a class="page-link Yekan" href="?page_number= <?php echo $total_number_of_pages. $href; ?>" aria-label="Next">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php
            }elseif($page_number>= $total_number_of_pages){
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?page_number=1<?php echo $href; ?>" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php
                for($m = $total_number_of_pages - 2 ; $m<=$total_number_of_pages ; $m++){
                    if($m == $page_number){
                        ?>
                            <li class="page-item active"><a class="page-link Yekan" href="#"><?php echo $m; ?></a></li>
                        <?php
                    }else{
                        ?>
                            <li class="page-item"><a class="page-link Yekan" href="?page_number=<?php echo $m. $href; ?>"><?php echo $m; ?></a></li>
                        <?php
                    }
                }
                ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php
            }else{
                ?>
                    <li class="page-item">
                        <a class="page-link Yekan" href="?page_number=1<?php echo $href; ?>" aria-label="Previous">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                <?php
                for($m = $page_number - 1 ; $m<=$page_number + 1 ; $m++){
                    if($m == $page_number){
                        ?>
                            <li class="page-item active"><a class="page-link Yekan" href="#"><?php echo $m; ?></a></li>
                        <?php
                    }else{
                        ?>
                            <li class="page-item"><a class="page-link Yekan" href="?page_number=<?php echo $m. $href ;?>"><?php echo $m; ?></a></li>
                        <?php
                    }
                }
                ?>
                    <li class="page-item">
                        <a class="page-link" href="?page_number=<?php echo $total_number_of_pages . $href; ?>" aria-label="Next">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                <?php
            }
        }
        ?>
            </ul>
        <?php
    }


function category_option_generator(){
    $values = ['sleeping_products', 'living_room_products', 'carpet_products'];
    $value_names = ['کالای خواب', 'کالای اتاق پذیرایی', 'فرش'];

        for($i = 0; $i<count($values); $i++){
            ?>
                <option value="<?php echo $values[$i]; ?>"
            <?php
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
            ?>
                <option value="<?php echo $_GET['product_subcategory']; ?>" selected="selected"><?php echo $_GET['product_subcategory']; ?></option>
            <?php
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

        // --- queries for the badges ---

        $bedsheet_query = "SELECT * FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'روتختی' AND approved = 'YES' ";
        $bedsheet_query_result = mysqli_query($database_connection, $bedsheet_query);
        $bedsheet_number = mysqli_num_rows($bedsheet_query_result);

        $pillow_query = "SELECT * FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'روبالشی' AND approved = 'YES' ";
        $pillow_query_result = mysqli_query($database_connection, $pillow_query);
        $pillow_number = mysqli_num_rows($pillow_query_result);

        $bedroom_cushion_query = "SELECT * FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'کوسن' AND approved = 'YES' ";
        $bedroom_cushion_query_result = mysqli_query($database_connection, $bedroom_cushion_query);
        $bedroom_cushion_number = mysqli_num_rows($bedroom_cushion_query_result);

        $bedcover_query = "SELECT * FROM products WHERE product_category = 'sleeping_products' AND product_subcategory = 'ملافه' AND approved = 'YES' ";
        $bedcover_query_result = mysqli_query($database_connection, $bedcover_query);
        $bedcover_number = mysqli_num_rows($bedcover_query_result);

        $table_cloth_query = "SELECT * FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'رومیزی' AND approved = 'YES' ";
        $table_cloth_query_result = mysqli_query($database_connection, $table_cloth_query);
        $table_cloth_number = mysqli_num_rows($table_cloth_query_result);

        $curtain_query = "SELECT * FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'پرده' AND approved = 'YES' ";
        $curtain_query_result = mysqli_query($database_connection, $curtain_query);
        $curtain_number = mysqli_num_rows($curtain_query_result);

        $livingroom_cushion_query = "SELECT * FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'کوسن' AND approved = 'YES' ";
        $livingroom_cushion_query_result = mysqli_query($database_connection, $livingroom_cushion_query);
        $livingroom_cushion_number = mysqli_num_rows($livingroom_cushion_query_result);

        $sofacover_query = "SELECT * FROM products WHERE product_category = 'living_room_products' AND product_subcategory = 'رومبلی' AND approved = 'YES' ";
        $sofacover_query_result = mysqli_query($database_connection, $sofacover_query);
        $sofacover_number = mysqli_num_rows($sofacover_query_result);

        $carpet_query = "SELECT * FROM products WHERE product_category = 'carpet_products' AND product_subcategory = 'فرش' AND approved = 'YES' ";
        $carpet_query_result = mysqli_query($database_connection, $carpet_query);
        $carpet_carpet_number = mysqli_num_rows($carpet_query_result);

        $carpet_cover_query = "SELECT * FROM products WHERE product_category = 'carpet_products' AND product_subcategory = 'روفرشی' AND approved = 'YES' ";
        $carpet_cover_query_result = mysqli_query($database_connection, $carpet_cover_query);
        $carpet_cover_number = mysqli_num_rows($carpet_cover_query_result);

        $carpetboard_query = "SELECT * FROM products WHERE product_category = 'carpet_products' AND product_subcategory = 'تابلوفرش' AND approved = 'YES' ";
        $carpetboard_query_result = mysqli_query($database_connection, $carpetboard_query);
        $carpetboard_number = mysqli_num_rows($carpetboard_query_result);
    
        // --- html for the badges ---
        if(!empty($_GET['product_category'])){
            $product_category = $_GET['product_category'];
        }else{
            $product_category = null;
        }
        if(!empty($_GET['product_subcategory'])){
            $product_subcategory = $_GET['product_subcategory'];
        }else{
            $product_subcategory = null;
        }

        ?>
        <div class="container-fluid row badge-container mx-3 pb-2">
            <h4 class="col-12 text-light text-center access-header py-4">کاتالوگ محصولات - دسترسی سریع</h4>
            <div class="col-12  col-md-6 col-lg-4 p-2 ">
                <div class="row p-2">
                    <p class="text-light category text-center col-sm-12 col-md-11 py-2">کالای خواب:</p>
                    <a href="products.php?product_category=sleeping_products&product_subcategory=روتختی" type="button" class="btn
                    <?php
                    if($product_category == "sleeping_products" && $product_subcategory == "روتختی"){
                        echo ' btn-success ';
                    }else{
                        echo ' btn-primary ';
                    } 
                    ?>
                        col-sm-2 col-lg-3"><span class="badge badge-light Yekan"><?php echo $bedsheet_number; ?></span><br>روتختی</a>
                    <a href="products.php?product_category=sleeping_products&product_subcategory=روبالشی" type="button" class="btn
                    <?php
                    if($product_category == "sleeping_products" && $product_subcategory == "روبالشی"){
                        echo ' btn-success ';
                    }else{
                        echo ' btn-primary ';
                    }
                    ?>
                        col-sm-2 col-lg-3"><span class="badge badge-light Yekan"><?php echo $pillow_number; ?></span><br>روبالشی</a>
                    <a href="products.php?product_category=sleeping_products&product_subcategory=ملافه" type="button" class="btn
                    <?php
                    if($product_category == "sleeping_products" && $product_subcategory == "ملافه" ){
                        echo " btn-success ";
                    }else{
                        echo " btn-primary ";
                    }
                    ?>
                        col-sm-2 col-lg-3"><span class="badge badge-light Yekan"><?php echo $bedcover_number; ?></span><br> ملافه </a>
                </div>
            </div>
            <div class="col-12  col-md-6 col-lg-4 p-2 ">
                <div class="row p-2">
                    <p class="text-light category text-center col-sm-12 col-md-11 py-2">  کالای اتاق پذیرایی:</p>
                    <a href="products.php?product_category=living_room_products&product_subcategory=رومیزی" type="button" class="btn
                    <?php
                    if($product_category == "living_room_products" && $product_subcategory == "رومیزی"){
                        echo ' btn-success';
                    }else{
                        echo ' btn-primary ';
                    }
                    ?>
                        col-sm-2"><span class="badge badge-light Yekan"><?php echo $table_cloth_number; ?></span><br> رومیزی </a>
                    <a href="products.php?product_category=living_room_products&product_subcategory=پرده" type="button" class="btn
                    <?php
                    if($product_category == "living_room_products" && $product_subcategory == "پرده" ){
                        echo ' btn-success';
                    }else{
                        echo ' btn-primary';
                    }
                    ?>
                        col-sm-2"><span class="badge badge-light Yekan"><?php echo $curtain_number; ?></span><br> پرده </a>
                    <a href="products.php?product_category=living_room_products&product_subcategory=کوسن" type="button" class="btn
                    <?php
                    if($product_category == "living_room_products" && $product_subcategory == "کوسن"){
                        echo ' btn-success ';
                    }else{
                        echo ' btn-primary ';
                    }
                    ?>
                        col-sm-2"><span class="badge badge-light Yekan"><?php echo $livingroom_cushion_number; ?></span><br> کوسن </a>
                    <a href="products.php?product_category=living_room_products&product_subcategory=رومبلی" type="button" class="btn
                    <?php
                    if($product_category="living_rom_products" && $product_subcategory == "رومبلی"){
                        echo ' btn-success ';
                    }else{
                        echo ' btn-primary ';
                    }
                    ?>
                        col-sm-2"><span class="badge badge-light Yekan"> <?php echo $sofacover_number; ?></span><br> رومبلی </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 p-2 ">
                <div class="row p-2">
                    <p class="text-light category text-center col-sm-12 col-md-11 py-2">  کالای فرش:</p>
                    <a href="products.php?product_category=carpet_products&product_subcategory=فرش" type="button" class="btn
                    <?php
                    if($product_category="carpet_products" && $product_subcategory == "فرش"){
                        echo ' btn-success ';
                    }else{
                        echo ' btn-primary ';
                    }
                    ?>
                        col-sm-2 col-lg-3"><span class="badge badge-light Yekan"><?php echo $carpet_carpet_number; ?></span><br> فرش </a>
                    <a href="products.php?product_category=carpet_products&product_subcategory=روفرشی" type="button" class="btn
                    <?php
                    if($product_category="carpet_products" && $product_subcategory == "روفرشی"){
                        echo ' btn-success ';
                    }else{
                        echo ' btn-primary ';
                    }
                    ?>
                        col-sm-2 col-lg-3"><span class="badge badge-light Yekan"><?php echo $carpet_cover_number; ?></span><br> روفرشی </a>
                    <a href="products.php?product_category=carpet_products&product_subcategory=تابلوفرش" type="button" class="btn
                    <?php
                    if($product_category="carpet_products" && $product_subcategory == "تابلوفرش"){
                        echo ' btn-success';
                    }else{
                        echo ' btn-primary ';
                    }
                    ?>
                    col-sm-2 col-lg-3"><span class="badge badge-light Yekan"><?php echo $carpetboard_number;?></span><br> تابلوفرش </a>
                </div>
            </div>
        </div>
        <?php
        $query_result = mysqli_query($database_connection, $query);
        $total_number_of_rows = mysqli_num_rows($query_result);
        if($total_number_of_rows<=0){
            ?>
                <div class="col-12 text-center text-danger"><p class="my-4">هیچ نتیجه ای بر اساس معیار های جستجو یافت نشد.</p></div>
            <?php
        }else{
            while ($row = mysqli_fetch_array($query_result)) {
                // getting the upload date:
                $upload_date = strtotime($row['upload_date']);
                $upload_year = date('Y', $upload_date);
                if($upload_year < date('Y')){
                    $archived = 'YES';
                }else{
                    $archived =NULL;
                }
                // getting the uploader info:
                $uploader_ID = $row['uploader_ID'];
                $get_uploader_name_query = "SELECT * FROM users WHERE ID = '$uploader_ID' ";
                $uploader_name_query_result = mysqli_query($database_connection, $get_uploader_name_query);
                $uploader_name_array = mysqli_fetch_array($uploader_name_query_result);
                $administrator = $uploader_name_array['administrator'];
                if($administrator == 'YES'){
                    $uploader_name = 'کاربر ادمین';
                }else{
                    $uploader_name = $uploader_name_array['username'];
                }
                ?>
                <div class=" product-results col-xs-12 col-sm-6  col-lg-4 col-xl-3 p-3" >
                    <div class="card border border-primary pt-3 <?php if($archived){ echo 'bg-warning';} ?>" itemscope itemtype="https://schema.org/Product">
                        <img class="card-img-top" src="<?php echo $row['product_directory']; ?>" alt="<?php echo $row['product_description']; ?>" itemprop="image">
                            <div class="card-body text-center ">
                                <h6 class="card-title "><span class="text-gray" itemprop="name"><?php echo ucfirst($row['product_name']); ?></span></h6>
                                <table itemprop="review" itemscope itemtype="http://schema.org/Review">
                                    <tr><td><p class="card-text text-right" >ابعاد:</p></td><td><p><span class="text-gray">
                                        <?php
                                            if(!empty($row['product_dimensions'] )){
                                                $dimension = $row['product_dimensions'];
                                                if(empty($dimension) || $dimension == "all"){
                                                    echo 'همه ابعاد';
                                                }elseif($dimension == 'single'){
                                                    echo 'تک نفره';
                                                }elseif($dimension == 'double'){
                                                    echo 'دونفره';
                                                }
                                            }
                                        ?>
                                    </span></p></td></tr>
                                    <tr><td><p class="card-text text-right">دسته بندی:</p></td><td><p><span class="text-gray" itemprop="category">
                                        <?php
                                            if($row['product_category'] == "sleeping_products"){
                                                echo "کالای خواب";
                                            } elseif($row['product_category'] == "living_room_products"){
                                                echo "کالای اتاق پذیرایی";
                                            }elseif($row['product_category'] == "carpet_products"){
                                                echo "فرش";
                                            }
                                        ?>
                                    </span></p></td></tr>
                                    <tr><td><p class="card-text text-right">زیرمجموعه:</p></td><td><p><span class="text-gray"><?php echo $row['product_subcategory']; ?></span></p></td></tr>
                                    <tr><td><p class="card-text text-right">توضیحات:</p></td><td><p><span class="text-gray" itemprop="description">
                                        <?php
                                            if(!empty($row['product_description'])){
                                                echo    $row['product_description']; 
                                            }else{
                                                echo 'ندارد';
                                            }
                                        ?>
                                    </span></p></td></tr>
                                    <tr>
                                        <td><p class="card-text text-right">توسط:</p></td>
                                        <td><p class="text-gray" itemprop="author"><?php echo $uploader_name; ?></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="card-text text-right">آرشیو:</p></td>
                                        <td><p class="text-gray Yekan" itemprop="datePublished"><?php echo $upload_year; ?></p></td>
                                    </tr>
                                </table>
                                <a href="productextension.php?product_ID=<?php echo $row['product_ID']; ?>" class="btn btn-primary mt-4">مشاهده و بررسی</a>
                            </div>
                    </div>    
                </div>
            <?php
            }   
        }
    }      
}
?>