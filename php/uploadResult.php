<?php
    function validator(){
        
        if(isset($_POST['submit'])){  

            if(!empty($_FILES['uploadingfile']) && !empty($_POST['file_name']) && !empty($_POST['category']) && !empty($_POST['subcategory'])){
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

                $user_inserted_name = test_input($_POST['file_name'], "/^[a-zA-Z0-9]{3,15}$/");
                $file_dimension = test_input($_POST['dimensions'], "/^[0-9]{1,3}[X*\/][0-9]{1,3}$/");
                $category = test_input($_POST['category'], '/^(sleeping_products|living_room_products|carpet_products)$/' );
                $sub_category = test_subcategory_input($_POST['subcategory'], '/^(کوسن|روبالشی|روتختی|ملافه|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/');
                $uploader_ID = $_SESSION['user_ID'];
                $file = $_FILES['uploadingfile'];
                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_TMP_name = $file['tmp_name'];
                if(empty($user_inserted_name)){
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger error" >نام سفارش به درستی وارد نشده است. </p>';
                }
                if(empty($category)){
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger error" >گروه مربوطه به درستی انتخاب نشده است. </p>';
                }
                if(empty($sub_category)){
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger error" >زیرگروه مربوطه به درستی انتخاب نشده است. </p>';
                }
                if(!empty($_POST['dimensions']) && empty($file_dimension)){
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger error" >ابعاد تصویر به درستی وارد نشده است. </p>';
                }
                if(!is_uploaded_file($file_TMP_name)){
                    echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger error" >فایلی برای آپلود انتخاب نشده است. </p>';
                }
                if(!empty($user_inserted_name) && !empty($category) && !empty($sub_category) && is_uploaded_file($file_TMP_name) && (empty($_POST['dimensions']) || (!empty($_POST['dimension']) && !empty($file_dimension)))){
                    // check the format of the image:
                    $name_array = explode('.', $file_name);
                    $file_extension = strtolower(end($name_array));
                    $allowed_extensions = ['jpg', 'jpeg', 'png'];
                    if(!in_array($file_extension, $allowed_extensions)){
                        echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="text-center text-danger error" >تنها فرمت های png و jpeg مجاز هستند. </p>';
                    }
                    // check if the file size is bigger than 500KB:
                    if($file_size> 512000){
                        echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                        echo '<p class="text-center text-danger error" >حجم فایل نباید از 500 کیلو بایت بیشتر شود. </p>';
                    }
                    if(in_array($file_extension, $allowed_extensions) && $file_size<= 512000){
                        require "database_connection.php";
                        if(!$database_connection){
                            die('connection failed:'.mysqli_connect_error());
                        }else{
                        // check if the file already exists:
                            $search_query = "SELECT * FROM products WHERE product_name = '$user_inserted_name' LIMIT 1 ";
                            $query_result = mysqli_query($database_connection, $search_query);
                            $query_result_array = mysqli_fetch_assoc($query_result);
                            if($query_result_array){
                                echo '<p class="text-danger pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                                echo '<p class="text-center text-danger">فایلی با این نام قبلا در سیستم آپلود شده است.</p>';
                            }else{
                                // checking if the uploader is admin:
                                $admin_query = "SELECT * FROM users WHERE ID = '$uploader_ID' ";    
                                $admin_query_result = mysqli_query($database_connection, $admin_query);
                                $admin_query_result_array = mysqli_fetch_assoc($admin_query_result);
                                if($admin_query_result_array['administrator'] === "YES"){
                                    $approved = "YES";
                                }else{
                                    $approved = "NO";
                                }
                                // uploading image to the products folder on server:
                                $file_new_name = $user_inserted_name. ".". $file_extension;
                                $file_destination = "images/products/". $file_new_name;
                                move_uploaded_file($file_TMP_name, $file_destination);
                                // inserting data into database using sql:
                                $insert_query = "INSERT INTO products (product_directory, product_dimensions, product_name, product_category, product_subcategory, uploader_ID, approved) VALUES ('$file_destination', '$file_dimension', '$user_inserted_name', '$category', '$sub_category', '$uploader_ID', '$approved')";
                                mysqli_query($database_connection, $insert_query);
                                echo "<p class='text-success text-center successful'>فایل مورد نظر با موفقیت آ‍پلود شد.</p>";
                            }
                        }
                    }
                }
            }else{
                echo '<p class="text-danger text-center pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="text-center text-danger error" >فیلد های ستاره دار الزامی هستند. </p>';
            }
        }
    }
?>