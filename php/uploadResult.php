<?php
        // session_start();
        if(isset($_POST['submit'])){

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                if (!empty($data)) {
                    return $data;
                }else{
                    return $data = "";
                }
            }
            function dimensions_test_input($data, $regex){
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
            
            $user_inserted_name = test_input($_POST['file_name']);
            $file_dimension = dimensions_test_input($_POST['dimensions'], "/^[0-9][X*\/][0-9]$/");
            $category = test_input($_POST['category']);
            $sub_category = test_input($_POST['subcategory']);
            $uploader_ID = $_SESSION['user_ID'];
            $file = $_FILES['uploadingfile'];

            $file_name= $_FILES['uploadingfile']['name'];
            $file_TMP_name= $_FILES['uploadingfile']['tmp_name'];
            $file_size= $_FILES['uploadingfile']['size'];
            $file_errors= $_FILES['uploadingfile']['error'];
            $file_type= $_FILES['uploadingfile']['type'];
    
            // getting the file extension:
            $name_array = explode('.', $file_name);  // cut the name string into pieces before and after "." and putting them into an associative array called name_array
            $file_extension = strtolower(end($name_array));
    
            // allowed file extensions:
            $allowed_extensions = ['jpg', 'jpeg', 'png'];
            if(in_array($file_extension, $allowed_extensions)){
                if($file_errors === 0){
                    if($file_size< 3000){
                        $file_new_name_numbered = uniqid('', true). ".". $file_extension;
                        $file_destination = "images/products". $file_new_name_numbered;
                        move_uploaded_file($file_TMP_name, $file_destination);

                        if(!empty($user_inserted_name)){
                            // connection to the database:
                            require "php/database_connection.php";
                            if(!$database_connection){
                                die('connection failed:'.mysqli_connect_error());
                            }else{
                                // check if the file already exists:
                                $search_query = "SELECT * FROM products WHERE product_name = 'user_inserted_name' ";
                                $query_result = mysqli_query($database_connection, $search_query);
                                if($query_result){
                                    echo '<p class="text-center text-danger">فایلی با این نام قبلا در سیستم آپلود شده است.</p>';
                                }else{
                                    // insert sql:
                                    $insert_query = "INSERT INTO products (product_directory, product_dimensions, product_name, product_category, product_subcategory, uploader_ID) VALUES ('$file_destination', '$file_dimension', '$user_inserted_name', '$category', '$sub_category', '$uploader_ID')";
                                    mysqli_query($database_connection, $insert_query);
                                    echo "<p class='successful'>فایل مورد نظر با موفقیت آ‍پلود شد.</p>";
                                    // header("location:../userUpload.php");
                                }       
                            }
                        }else{
                            echo '<p class=text-center text-danger error" >فیلد نام سفارش اجباری است. نمی تواند خالی بماند. </p>';

                        }
                    }else{
                        echo '<p class=text-center text-danger error" >سایز فایل سنگین است. تنها عکس هایی که کمتر از 3 مگابایت حجم دارند قابل قبول هستند. </p>';
                    }
                }else{
                    echo '<p class=text-center text-danger error" >مشکلی در آپلود فایل بوجود آمد. لطفا بعدا دوباره تلاش کنید. </p>';
                }
            }else{
                echo '<p class=text-center text-danger error" >فرمت فایل مجاز نیست. تنها فایل های با فرمت jgp, jpeg و png مجاز هستند. </p>';
            }
        }
?>