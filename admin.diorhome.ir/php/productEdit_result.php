<?php
$errors = [];
$result = [];
require "../httpdocs/php/database_connection.php";
if(isset($_GET['product_ID'])){
    array_push($result, "<p class='text-center text-dark iranSans'>در زیر می توانید اطلاعات محصول را اصلاح کنید:</p>");
    $product_ID = $_GET['product_ID'];
    if(!$database_connection){
        die('connection failed:'.mysqli_connect_error());
    }else{
        $query = "SELECT * FROM products WHERE product_ID = '$product_ID' ";
        $query_result = mysqli_query($database_connection, $query);
        if(mysqli_num_rows($query_result)>0){
            $row = mysqli_fetch_assoc($query_result);
            $product_name = $row['product_name'];
            $product_dimensions = $row['product_dimensions'];
            $product_directory = $row['product_directory'];
            $product_category = $row['product_category'];
            $product_subcategory = $row['product_subcategory'];
            $product_description = $row['product_description'];

        }
    }
}elseif(isset($_POST['edit'])){
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
    $product_ID = $_POST['product_ID'];
    $product_name = test_input($_POST['product_name'], "/^[a-zA-Z\d\s]{3,15}$/");
    $product_dimensions = test_input($_POST['product_dimensions'], "/^(single|double|all)$/");
    $product_category = test_input($_POST['product_category'], "/^(sleeping_products|living_room_products|carpet_products)$/" );
    $product_subcategory = test_subcategory_input($_POST['product_subcategory'], "/^(کوسن|روبالشی|روتختی|ملافه|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/");
    $product_description = test_subcategory_input($_POST['product_description'], '/[a-zA-Z0-9ا-يئءیکآ]{1,}/');
    $product_directory = $_POST['product_directory'];

    if(empty($product_ID)){
        array_push($errors, "<p class='text-center text-danger iranSans'>آیدی محصول مشخص نیست.</p>");
    }
    if(empty($product_name)){
        array_push($errors, "<p class='text-center text-danger iranSans'>نام محصول درست وارد نشده است.</p>");
    }
    if(empty($product_dimensions)){
        array_push($errors, "<p class='text-center text-danger iranSans'>ابعاد محصول درست وارد نشده است.</p>");
    }
    if(empty($product_category)){
        array_push($errors, "<p class='text-center text-danger iranSans'>دسته محصول درست وارد نشده است.</p>");
    }
    if(empty($product_subcategory)){
        array_push($errors, "<p class='text-center text-danger iranSans'>زیردسته مورد نظر درست وارد نشده است.</p>");
    }
    if(empty($product_description)){
        array_push($errors, "<p class='text-center text-danger iranSans'>توضیحات محصول درست وارد نشده است.</p>");
    }
    if(empty($product_directory)){
        array_push($errors, "<p class='text-center text-danger iranSans'>محل تصویر محصول درست وارد نشده است.</p>");
    }
    if(empty($errors)){
        $updates = [];
        // checking to see if user input fields are updated:
        $select_query = "SELECT * FROM products WHERE product_ID = '$product_ID' ";
        $select_result = mysqli_query($database_connection, $select_query);
        $select_array = mysqli_fetch_assoc($select_result);
        if($product_name !== $select_array['product_name']){
            // checking to see if a product with the same name is stored in the database:
            $check_query = "SELECT * FROM products WHERE product_name = '$product_name' ";
            $check_query_result = mysqli_query($database_connection, $check_query);
            if(mysqli_num_rows($check_query_result)>0){
                array_push($errors, "<p class='text-center text-danger iranSans'>محصولی قبلا با این نام ثبت شده است.</p>");
            }else{
                array_push($updates, "product_name = '$product_name' ");
            }
        }
        if($product_dimensions !== $select_array['product_dimensions']){
            array_push($updates, "product_dimensions = '$product_dimensions' ");
        }
        if($product_category !== $select_array['product_category']){
            array_push($updates, "product_category = '$product_category' ");
        }
        if($product_subcategory !== $select_array['product_subcategory']){
            array_push($updates, "product_subcategory = '$product_subcategory' ");
        }
        if($product_description !== $select_array['product_description']){
            array_push($updates, "product_description = '$product_description' ");
        }
        if(!empty($updates)){
            $update_query = "UPDATE products SET ";
            for($l = 0 ; $l<count($updates); $l++){
                array_push($result, "<p class='text-center text-success iranSans'>$updates[$l] با موفقیت اعمال شد</p>");
                if($l == 0){
                    $update_query .= $updates[$l];
                }else{
                    $update_query .= ", " . $updates[$l];
                }
            }
            $update_query .= " WHERE product_ID = '$product_ID' ";
            $update_query_result = mysqli_query($database_connection, $update_query);

        }else{
            array_push($errors, "<p class='text-center text-primary iranSans'>تمامی فیلد ها ثابت بودند. تغییری ثبت نشد.</p>");
        }
    }

}else{
    header('location:signed_in_admin.php');
}

// this is where subcategory options are generated on load of the page:
function subcategory_generator(){
    $product_category = $GLOBALS['product_category'];
    $product_subcategory = $GLOBALS['product_subcategory'];
    $categories = ["sleeping_products", "living_room_products", "carpet_products"];
    $values = [["روبالشی", "روتختی", "ملافه", "کوسن"] ,["پرده", "رومبلی", "کوسن", "رومیزی"],["فرش", "روفرشی", "تابلوفرش"]];
    for($i = 0; $i<count($categories); $i++){
        if($categories[$i] == $product_category){
            foreach($values[$i] as $value){
                ?>
                <option class="<?php echo $product_category; ?>" <?php if($value == $product_subcategory) echo 'selected'; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php
            }
        }
    }
}

?>