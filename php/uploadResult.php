<?php
    function validator(){
        if(isset($_POST['submit'])){

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
            
            $user_inserted_name = test_input($_POST['file_name'], "/^[a-zA-Z0-9]{3,15}$/");
            $file_dimension = test_input($_POST['dimensions'], "/^[0-9][X*\/][0-9]$/");
            $category = test_input($_POST['category'], '/^(فرش|کالای اتاق پذیرایی|کالای خواب)$/' );
            $sub_category = test_input($_POST['subcategory'], '/^(روتختی|روبالشی|ملافه|کوسن|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/');
            $uploader_ID = $_SESSION['user_ID'];
            $file = $_FILES['uploadingfile'];

            $file_name= $file['name'];
            $file_TMP_name= $file['tmp_name'];
            $file_size= $file['size'];
            $file_errors= $file['error'];
            $file_type= $file['type'];
            
            if(!empty($file) && !empty($user_inserted_name) && !empty($category) && !empty($sub_category)){

            }else{
                echo '<p class="text-danger pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="text-center text-danger error" >فیلد های نام سفارش، فایل، گروه و زیرگروه مربوطه الزامی هستند. </p>';
            }
            // getting the file extension:
            $name_array = explode('.', $file_name);  // cut the name string into pieces before and after "." and putting them into an associative array called name_array
            $file_extension = strtolower(end($name_array));
    
            // allowed file extensions:
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            if(in_array($file_extension, $allowed_extensions)){
                if($file_errors === 0){
                    if($file_size< 512000){
                        $file_new_name_numbered = uniqid('', true). ".". $file_extension;
                        $file_destination = "images/products/". $file_new_name_numbered;
                        move_uploaded_file($file_TMP_name, $file_destination);

                        if(!empty($user_inserted_name)){
                            // connection to the database:
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
                                    // insert sql:
                                    $insert_query = "INSERT INTO products (product_directory, product_dimensions, product_name, product_category, product_subcategory, uploader_ID) VALUES ('$file_destination', '$file_dimension', '$user_inserted_name', '$category', '$sub_category', '$uploader_ID')";
                                    mysqli_query($database_connection, $insert_query);
                                    echo "<p class='text-success text-center successful'>فایل مورد نظر با موفقیت آ‍پلود شد.</p>";
                                }       
                            }
                        }else{
                            echo '<p class="text-danger pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                            echo '<p class="text-center text-danger error" >فیلد نام سفارش اجباری است. نمی تواند خالی بماند. </p>';
                        }
                    }else{
                       echo '<p class="text-danger pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                       echo '<p class="text-center text-danger error" >سایز فایل سنگین است. تنها عکس هایی که کمتر از 3 مگابایت حجم دارند قابل قبول هستند. </p>';
                    }
                }else{
                    echo '<p class="text-danger pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                    echo '<p class="text-center text-danger error" >مشکلی در آپلود فایل بوجود آمد. لطفا بعدا دوباره تلاش کنید. </p>';
                }
            }else{
                echo '<p class="text-danger pt-4 pb-1"><span class=" fas fa-exclamation-circle" aria-hidden="true"></span></p>';
                echo '<p class="text-center text-danger error" >فرمت فایل مجاز نیست. تنها فایل های با فرمت jgp, jpeg و png مجاز هستند. </p>';
            }
        }
    }
?>