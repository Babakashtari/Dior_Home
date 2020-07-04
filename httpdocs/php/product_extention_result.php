<?php 
    session_start();

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
                    $product_name = ucfirst($product['product_name']);
                    $product_category = $product['product_category'];
                    $product_dimensions = $product['product_dimensions'];
                    $product_categories = ['sleeping_products', 'living_room_products', 'carpet_products'];
                    $product_category_links = ['كالای خواب', 'كالای اتاق پذیرايی', 'کالای فرش' ];
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
                            $second_subcategories = $product_living_room_products_subcategory;
                            $third_main_category = 'carpet_products';
                            $third_subcategories = $product_carpet_products_subcategory;
                        break;
                        case 'living_room_products':
                            $subcategories = $product_living_room_products_subcategory;
                            $second_main_category = 'sleeping_products';
                            $second_subcategories = $product_sleeping_product_subcategory;
                            $third_main_category = 'carpet_products';
                            $third_subcategories = $product_carpet_products_subcategory;
                        break;
                        case 'carpet_products':
                            $subcategories = $product_carpet_products_subcategory;
                            $second_main_category = 'sleeping_products';
                            $second_subcategories = $product_sleeping_product_subcategory;
                            $third_main_category = 'living_room_products';
                            $third_subcategories = $product_living_room_products_subcategory;
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
                            $second_main_category_link = 'کالای فرش';
                    }
                    switch($third_main_category){
                        case 'sleeping_products':
                            $third_main_category_link = "کالای خواب";
                        break;
                        case 'living_room_products':
                            $third_main_category_link = ' کالای اتاق پذیرايی ';
                        break;
                        case 'carpet_products':
                            $third_main_category_link = 'کالای فرش';
                    }
                    if(isset($product_dimensions)){
                        switch($product_dimensions){
                            case 'all':
                                $product_dimensions_link = 'فرقی نمی کند.';
                            break;
                            case 'single':
                                $product_dimensions_link = 'یک نفره';
                            break;
                            case 'double':
                                $product_dimensions_link = 'دونفره';
                            break;
                        }
                    }else{
                        $product_dimensions_link = "no dimension is set";
                    }
                    $product_description = $product['product_description'];

                    // getting the name of the uploader:
                    $uploader_ID = $product['uploader_ID'];
                    $user_query = " SELECT username, administrator  FROM users WHERE ID = '$uploader_ID'";
                    $user_query_result = mysqli_query($database_connection, $user_query);
                    if($user_query_result){
                        $uploader = mysqli_fetch_assoc($user_query_result);
                        if($uploader['administrator'] == 'YES'){
                            $uploader_name = 'کاربر ادمین';
                        }else{
                            $uploader_name = $uploader['username'];
                        }
                    }
                    // getting the date of the upload:
                    $upload_date = strtotime($product['upload_date']);
                    $upload_date_formated = date('Y-m-d', $upload_date);

                    // like button:
                    $thumbs = 'fas fa-thumbs-up';
                    
                    // finding the current likes number for the product:
                    $number_of_likes_query = "SELECT number_of_likes FROM products WHERE product_ID = '$product_ID'";
                    $number_of_likes_query_result = mysqli_query($database_connection, $number_of_likes_query);
                    $product_array_likes = mysqli_fetch_assoc($number_of_likes_query_result);
                    $current_number_of_likes = $product_array_likes['number_of_likes'];
                    if(isset($_SESSION['user_username'])){
                        $user_ID = $_SESSION['user_ID'];
                        $like_check_query = " SELECT * FROM likes WHERE user_ID = '$user_ID' AND product_ID = '$product_ID' ";
                        $like_check_query_result = mysqli_query($database_connection, $like_check_query);
                        if(mysqli_num_rows($like_check_query_result)>0){
                            $heart_style = 'text-danger';
                            $thumbs = 'fas fa-thumbs-up';
                        }else{
                            $heart_style = 'text-dark';
                            $thumbs = 'far fa-thumbs-up';
                        }
                    }else{
                        $heart_style= 'text-dark';
                        $thumbs = 'far fa-thumbs-up';

                    }
                    // at the start up of the page:
                    if(isset($_POST['like_submit']) || isset($_POST['like_submit2'])){
                        // check for login status:
                        if(isset($_SESSION['user_username'])){
                            // a logged in user found so checking for timeout:
                            $now = time();
                            if($now > $_SESSION['login_expiration_time']){
                                // if the user signin is timed out:
                                unset($_SESSION['user_username']);
                                $_SESSION['location'] = "productextension.php?product_ID=$product_ID";
                                header('location:login.php');
                            }else{
                                // if a valid user is logged in within the timeout limits:
                                    
                                    
                                if(mysqli_num_rows($like_check_query_result) > 0){
                                    // user has liked it previously so we remove the like of the user from the database altogether:
                                    // decreasing product like rate by one:
                                    $number_of_likes = $current_number_of_likes - 1;
                                    // deleting the entire corresponding like row in the likes table:
                                    $delete_query = "DELETE FROM likes WHERE product_ID = '$product_ID' AND user_ID = '$user_ID' ";
                                    mysqli_query($database_connection, $delete_query);
                                    $heart_style = 'text-dark';
                                    $thumbs = 'far fa-thumbs-up';

                                }else{
                                    // user has not liked the product yet:
                                    // inserting the like of the user in the likes table:
                                    $like_insert_query = "INSERT INTO likes (product_ID, user_ID) VALUES('$product_ID', '$user_ID')"; 
                                    mysqli_query($database_connection, $like_insert_query);
                                    // increasing product like rate by one:
                                    $number_of_likes = $current_number_of_likes + 1;
                                    $heart_style = 'text-danger';
                                    $thumbs = 'fas fa-thumbs-up';
                                }
                                // updating the products table with the new like value:
                                $likes_update_query = "UPDATE products SET number_of_likes = '$number_of_likes' WHERE product_ID = '$product_ID' ";
                                mysqli_query($database_connection, $likes_update_query);
                                $current_number_of_likes = $number_of_likes;
                            }
                        }else{
                            // no logged in user found:
                            $_SESSION['location'] = "productextension.php?product_ID=$product_ID";
                            header('location:login.php');
                        }
                    }
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
