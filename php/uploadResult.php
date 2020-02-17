<?php
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];

        $file_name= $file['name'];
        $file_TMP_name= $file['tmp_name'];
        $file_size= $file['size'];
        $file_errors= $file['error'];
        $file_type= $file['type'];

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