<?php 
// اگر در سرچ محصولی جستجو شد و یا از طریق منوی پیجینیشن به صفحه بعدی محصولات رفتیم:
if(isset($_POST['page_number'])){
    echo "the post array is: <br>";
    print_r($_POST);
    echo "<br>";
    function product_test_input($data, $regex) {
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
    function test_date($date){
        $date = trim($date);
        $date = stripslashes($date);
        $date = htmlspecialchars($date);
        $date = strtotime($date);
        // if the user date input isn't valid strtotime() will return 0:
        if($date){
            $date = date("Y-m-d H:i:s", $date);
            return $date;
        }else{
            return $date = "";
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
    $hidden_inputs = [];
    $errors = [];
    if(!empty($_POST['product_name'])){
        $product_name = product_test_input($_POST['product_name'], "/^[a-zA-Z\d\s]{1,15}$/");
        if(!empty($product_name)){
            array_push($inputs_arr, "product_name like '%$product_name%'");
            $hidden_inputs['product_name'] = $product_name;
        }else{
            array_push($errors, "نام محصول فقط باید لاتین باشد و می تواند فاصله و عدد داشته باشد.");
        }
    }
    if(!empty($_POST['product_dimensions'])){
        $product_dimensions = product_test_input($_POST['product_dimensions'], "/^(double|single|all)$/");
        if(!empty($product_dimensions)){
            array_push($inputs_arr, "product_dimensions='$product_dimensions'");
            $hidden_inputs['product_dimensions'] = $product_dimensions;
        }else{
            array_push($errors, "ابعاد محصول فقط می تواند تک نفره، دونفره یا هر دو باشد.");
        }
    }
    if(!empty($_POST['product_category'])){
        $product_category = product_test_input($_POST['product_category'], '/^(sleeping_products|living_room_products|carpet_products)$/' );
        if(!empty($product_category)){
            array_push($inputs_arr, "product_category='$product_category'");
            $hidden_inputs['product_category'] = $product_category;
        }else{
            array_push($errors, "دسته بندی محصول درست انتخاب نشده است.");
        }
    }
    if(!empty($_POST['product_subcategory'])){
        $product_subcategory = test_subcategory_input($_POST['product_subcategory'], '/^(کوسن|روبالشی|روتختی|ملافه|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/');
        if(!empty($product_subcategory)){
            array_push($inputs_arr, "product_subcategory='$product_subcategory'");
            $hidden_inputs['product_subcategory'] = $product_subcategory;
        }else{
            array_push($errors, "زیرمجموعه محصول درست انتخاب نشده است.");
        }
    }
    if(!empty($_POST['product_description'])){
        $product_description = test_subcategory_input($_POST['product_description'], '/[a-zA-Z0-9ا-يئءیکآ]{1,}/');
        if(!empty($product_description)){
            array_push($inputs_arr, "product_description='$product_description'");
            $hidden_inputs['product_description'] = $product_description;
        }else{
            array_push($errors, "توضیحات محصول درست وارد نشده است.");
        }
    }
    if(!empty($_POST['uploader_username'])){
        $uploader_username = product_test_input($_POST['uploader_username'], '/^[A-Z][a-z0-9]{2,}$/');
        if(!empty($uploader_username)){
            require "../httpdocs/php/database_connection.php";
            if(!$database_connection){
                die('connection failed:'.mysqli_connect_error());
            }else{
                $uploader_username_query = "SELECT ID FROM users WHERE username = '$uploader_username' ";
                $uploader_ID = mysqli_query($database_connection, $uploader_username_query);
                if(mysqli_num_rows($uploader_ID)>0){
                    $uploader_ID_arr = mysqli_fetch_assoc($uploader_ID);
                    $uploaderID = $uploader_ID_arr['ID'];
                    array_push($inputs_arr, "uploader_ID='$uploaderID'");
                    $hidden_inputs['uploader_username'] = $uploader_username;
                }else{
                    array_push($errors, "کاربری $uploader_username یافت نشد");
                }
            }
        }else{
            array_push($errors, "نام کاربری شخص ارسال کننده درست وارد نشده است.");
        }
    }
    if(!empty($_POST['before_upload_date'])){
        $before_upload_date = test_date($_POST['before_upload_date']);
        if(!empty($before_upload_date)){
            array_push($inputs_arr, "upload_date <= '$before_upload_date'");
            $hidden_inputs['before_upload_date'] = $_POST['before_upload_date'];
        }else{
            array_push($errors, "'قبل از تاریخ' ارسال درست وارد نشده است. لطفا به لاتین تاریخ وارد کنید.");
        }
    }
    if(!empty($_POST['after_upload_date'])){
        $after_upload_date = test_date($_POST['after_upload_date']);
        if(!empty($after_upload_date)){
            array_push($inputs_arr, "upload_date >= '$after_upload_date'");
            $hidden_inputs['after_upload_date'] = $_POST['after_upload_date'];
        }else{
            array_push($errors, "'بعد از تاریخ' ارسال درست وارد نشده است. لطفا به لاتین تاریخ وارد کنید.");
        }
    }
    if(!empty($_POST['approved'])){
        $approved = product_test_input($_POST['approved'], '/^YES|NO$/');
        if(!empty($approved)){
            array_push($inputs_arr, "approved='$approved'");
            $hidden_inputs['approved'] = $approved;
        }else{
            array_push($errors, "وضعیت تایید' درست انتخاب نشده است'.");
        }
    }
    if(!empty($_POST['less_number_of_likes'])){
        $less_number_of_likes = product_test_input($_POST['less_number_of_likes'], '/^\d{1,}$/');
        if(!empty($less_number_of_likes)){
            array_push($inputs_arr, "number_of_likes < '$less_number_of_likes'");
            $hidden_inputs['less_number_of_likes'] = $less_number_of_likes;
        }else{
            array_push($errors, "لایک کمتر از' فقط می تواند عدد باشد'.");
        }
    }
    if(!empty($_POST['more_number_of_likes'])){
        $more_number_of_likes = product_test_input($_POST['more_number_of_likes'], '/^\d{1,}$/');
        if(!empty($more_number_of_likes)){
            array_push($inputs_arr, "number_of_likes > '$more_number_of_likes'");
            $hidden_inputs['more_number_of_likes'] = $more_number_of_likes;
        }else{
            array_push($errors, "لایک بیشتر از' فقط می تواند عدد باشد'.");
        }
    }
    
    // preparing the search query:
    if(!empty($inputs_arr)){
        $query = " SELECT * FROM products WHERE ";
        for($l = 0; $l < count($inputs_arr); $l++){
            if($l == 0){
                $query .= $inputs_arr[$l];
            }else{
                $query .= " AND " . $inputs_arr[$l];
            }
        }
    }else{
        $query = "SELECT * FROM products";
    }
    echo " the query is: " . $query;
    // getting the total number of pages:
    require "../httpdocs/php/database_connection.php";
    if(!$database_connection){
        die('connection failed:'.mysqli_connect_error());
    }else{
        $query_result = mysqli_query($database_connection, $query);

        echo "<br>"; 

        $total_number_of_rows = mysqli_num_rows($query_result);
        echo "<br> total number of rows is:  $total_number_of_rows ";
        $number_of_rows_per_page = 12;
        $total_number_of_pages = ceil($total_number_of_rows / $number_of_rows_per_page);
        echo "<br> total number of pages is:  $total_number_of_pages ";

        echo "<br> the post variable array is: " ; print_r($_POST);
        if(isset($_POST['page_number'])){
            $page_number = $_POST['page_number'];
            if($page_number == "جستجو" || $page_number == "<"){
                $page_number = 1;
            }elseif($page_number == ">"){
                $page_number = $total_number_of_pages;
            }
            echo "<br> page number is:  $page_number";
        }
        // show only $number_of_rows_per_page and start from $page_number -1 * number_of_rows_per_page:
        $offset = ($page_number - 1) * $number_of_rows_per_page;
        $query .= " LIMIT $offset , $number_of_rows_per_page ";
        echo "<br>" . $query;
    }
    function pagination(){
        $page_number = $GLOBALS['page_number'];
        $total_number_of_rows = $GLOBALS['total_number_of_rows'];
        $total_number_of_pages = $GLOBALS['total_number_of_pages'];
        $total_number_of_rows_per_page = $GLOBALS['number_of_rows_per_page'];
        $inputs_arr = $GLOBALS['inputs_arr'];
        $hidden_inputs = $GLOBALS['hidden_inputs'];
        
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
            <p class="text-dark iranSans text-center">نمایش نتایج <span class="Yekan"><?php echo $from; ?></span> تا  <span class="Yekan"><?php echo $to; ?></span> از <span class="Yekan"><?php echo $total_number_of_rows; ?></span> مورد یافت شده</p>
            <?php
        }
        ?>
            <ul class="pagination justify-content-center">
        <?php
        // اگر تعداد صفحاتمون کمتر از 3 صفحه بود
        if($total_number_of_pages<=3){
            for($m = 1 ; $m<=$total_number_of_pages ; $m++){
                ?>
                <li class="page-item <?php if($m == $page_number) echo "active" ?>"><input type="submit" class="page-link Yekan " name="page_number" value="<?php echo $m; ?>" /></li>
                <?php
            }
        //  اگر تعداد صفحاتمون بیشتر از 3 صفحه بود
        }else{
            // اگر صفحه اول بودیم:
            if($page_number<=1){
                ?>         
                <!-- دکمه برو به صفحه اول: -->
                <li class="page-item disabled">
                    <input type="submit" class="page-link" aria-label="Previous" name="page_number" value="<" />
                </li>
                <?php
                // دکمه صفحات وسطی:
                for($m = 1 ; $m<=3 ; $m++){
                ?>
                    <li class="page-item <?php if($m == $page_number) echo "active" ?>"><input type="submit" class="page-link Yekan " name="page_number" value="<?php echo $m; ?>" /></li>
                    <?php
                }
                // دکمه برو به صفحه آخر:
                ?>
                <li class="page-item">
                    <input type="submit" class="page-link" aria-label="Next" name="page_number" value=">" />
                </li>
                <?php
            // اگر صفحه آخر بودیم:
            }elseif($page_number>= $total_number_of_pages){
                ?>
                <!-- دکمه برو به صفحه اول: -->
                <li class="page-item ">
                    <input type="submit" class="page-link" aria-label="Previous" name="page_number" value="<" />
                </li>
                <?php
                // دکمه صفحات وسطی:
                for($m = $total_number_of_pages - 2 ; $m<=$total_number_of_pages ; $m++){
                    ?>
                    <li class="page-item <?php if($m == $page_number) echo 'active' ?>"><input type="submit" class="page-link Yekan" name="page_number" value="<?php echo $m; ?>" /></li>
                    <?php
                }
                // دکمه برو به صفحه آخر:
                ?>
                <li class="page-item disabled">
                    <input type="submit" class="page-link" aria-label="Next" name="page_number" value=">" />
                </li>
                <?php
            // اگر صفحات وسطی بودیم $page_number>0 && $page_number < $total_number_of_pages:
            }else{
                ?>
                <!-- دکمه برو به صفحه اول: -->
                <li class="page-item">
                    <input type="submit" class="page-link"  aria-label="Previous" name="page_number" value="<" />
                </li>
                <?php
                // دکمه های صفحات وسطی:
                for($m = $page_number - 1 ; $m<=$page_number + 1 ; $m++){
                    ?>
                    <li class="page-item <?php if($m == $page_number) echo "active"; ?>"><input type="submit" class="page-link Yekan" name="page_number" value="<?php echo $m; ?>" /></li>
                    <?php
                }
                // دکمه برو به صفحه آخر:
                ?>
                <li class="page-item">
                    <input type="submit" class="page-link" aria-label="Next" name="page_number" value=">" />
                </li>
                <?php
            }
        }
        ?>
        </ul>
        <?php
    }
    function card_generators(){
        $number_of_rows_per_page = $GLOBALS['number_of_rows_per_page'];
        
        $query = $GLOBALS['query'];
        require "../httpdocs/php/database_connection.php";
        if(!$database_connection){
            die('connection failed:'.mysqli_connect_error());
        }else{
            $query_result = mysqli_query($database_connection, $query);
            $total_number_of_rows = mysqli_num_rows($query_result);
            if($total_number_of_rows<=0){
                ?>
                    <div class="col-12 text-center text-danger"><p class="my-4">هیچ نتیجه ای بر اساس معیار های جستجو یافت نشد.</p></div>
                <?php
            }else{
                while ($row = mysqli_fetch_array($query_result)) {
                    ?>
                    <div class="product-results col-xs-12 col-sm-6  col-lg-4 col-xl-3 p-3" >
                        <div class="card border border-primary" itemscope itemtype="https://schema.org/Product">
                            <img class="card-img-top" src="https://diorhome.ir/<?php echo $row['product_directory']; ?>" alt="<?php echo $row['product_description']; ?>" itemprop="image">
                            <div class="card-body text-center ">
                                <h6 class="card-title "><span class="text-gray" itemprop="name"><?php echo ucfirst($row['product_name']); ?></span></h6>
                                <table class="iranSans" itemprop="review" itemscope itemtype="http://schema.org/Review">
                                    <tr>
                                        <td><p class="card-text text-right" >ابعاد:</p></td>
                                        <td><p><span class="text-gray">
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
                                        </span></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="card-text text-right">دسته بندی:</p></td><td><p><span class="text-gray" itemprop="category">
                                            <?php
                                                if($row['product_category'] == "sleeping_products"){
                                                    echo "کالای خواب";
                                                } elseif($row['product_category'] == "living_room_products"){
                                                    echo "کالای اتاق پذیرایی";
                                                }elseif($row['product_category'] == "carpet_products"){
                                                    echo "فرش";
                                                }
                                            ?>
                                        </span></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="card-text text-right">زیرمجموعه:</p></td><td><p><span class="text-gray"><?php echo $row['product_subcategory']; ?></span></p></td>
                                    </tr>
                                    <tr>
                                        <td><p class="card-text text-right">توضیحات:</p></td><td><p><span class="text-gray" itemprop="description">
                                            <?php
                                                if(!empty($row['product_description'])){
                                                    echo    $row['product_description']; 
                                                }else{
                                                    echo 'ندارد';
                                                }
                                            ?>
                                        </span></p></td>
                                    </tr>
                                </table>
                                    <a href="productEdit.php?product_ID=<?php echo $row['product_ID']; ?>" class="btn btn-primary mt-4"><i class="fas fa-edit"></i></a>
                                    <a href="productDelete.php?product_ID=<?php echo $row['product_ID']; ?>" class="btn btn-danger mt-4"><i class="far fa-trash-alt"></i></a>
                                </div>
                        </div>    
                    </div>
                    <?php
                }   
            }
        }      
    }

    
}




?>