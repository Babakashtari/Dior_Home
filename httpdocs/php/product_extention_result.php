<?php 
    $error = [];
    // database connection:
    if(isset($_GET['product_ID'])){
        $product_ID = $_GET['product_ID'];
        require "database_connection.php";
        if(!$database_connection){
            die('connection failed:'.mysqli_connect_error());
        }else{
            $query = "SELECT * from products WHERE product_ID = '$product_ID'";
            $query_result = mysqli_query($database_connection, $query);
            if($query_result){
                $product = mysqli_fetch_assoc($query_result);
                if($product['approved'] == 'YES'){
                    $product_directory = $product['product_directory'];
                    $product_name = $product['product_name'];
                    $product_category = $product['product_category'];
        
                    $product_categories = ['sleeping_products', 'living_room_products', 'carpet_products'];
                    $product_category_links = ['كالای خواب', 'كالای اتاق پذیرايی', 'فرش' ];
                    $category_index = array_search($product_category, $product_categories);
                    $product_category_link = $product_category_links[$category_index];

                    $product_subcategory = $product['product_subcategory'];
                    $product_sleeping_product_subcategory = ['روتختی', 'روبالشی', 'ملافه'];
                    $product_living_room_products_subcategory = ['رومیزی', 'پرده', 'کوسن', 'رومبلی'];
                    $product_carpet_products_subcategory = ['فرش', 'روفرشی', 'تابلوفرش'];
                    
                    switch($product_category){
                        case 'sleeping_products':
                            $subcategories = $product_sleeping_product_subcategory;
                            $second_main_category = 'living_room_products';
                            $third_main_category = 'carpet_products';
                        break;
                        case 'living_room_products':
                            $subcategories = $product_living_room_products_subcategory;
                            $second_main_category = 'sleeping_products';
                            $third_main_category = 'carpet_products';
                        break;
                        case 'carpet_products':
                            $subcategories = $product_carpet_products_subcategory;
                            $second_main_category = 'sleeping_products';
                            $third_main_category = 'living_room_products';
                        break;
                    }
                    switch($second_main_category){
                        case 'sleeping_products':
                            $second_main_category_link = "کالای خواب";
                        break;
                        case 'living_room_products':
                            $second_main_category_link = ' کالای اتاق پذیرايی ';
                        break;
                        case 'carpet_products':
                            $second_main_category_link = 'فرش';
                    }
                    switch($third_main_category){
                        case 'sleeping_products':
                            $third_main_category_link = "کالای خواب";
                        break;
                        case 'living_room_products':
                            $third_main_category_link = ' کالای اتاق پذیرايی ';
                        break;
                        case 'carpet_products':
                            $third_main_category_link = 'فرش';
                    }

                    $product_description = $product['product_description'];

                }else{
                   array_push($error, '<p class="error">محصول مورد نظر در سایت بارگذاری شده و در دست بررسی است. به محض تایید توسط کاربران ادمین در سایت نمایش داده خواهد شد.</p>');
                }
            }else{
                array_push($error, '<p class="error">محصولی با این آیدی در پايگاه داده سایت یافت نشد.</p>');

            }
        }
    
    }else{
        array_push($error, '<p class="error">آیدی محصول مورد نظر یافت نشد.</p>');
    }
?>