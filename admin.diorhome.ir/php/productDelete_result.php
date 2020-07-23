<?php
$results = [];
// when admin user came to this page:
    if(isset($_GET['product_ID'])){
        $product_ID = $_GET['product_ID'];
        require "../httpdocs/php/database_connection.php";
        if(!$database_connection){
            die('connection failed:'.mysqli_connect_error());
        }else{
            $query = "SELECT * FROM products WHERE product_ID = '$product_ID' ";
            $query_result = mysqli_query($database_connection, $query);
            if(mysqli_num_rows($query_result)>0){
                $row = mysqli_fetch_assoc($query_result);
                $product_directory = $row['product_directory'];
                $product_description = $row['product_description'];
                $product_name = $row['product_name'];
                $product_dimensions = $row['product_dimensions'];
                $product_category = $row['product_category'];
                $product_subcategory = $row['product_subcategory'];
                if(!isset($_POST['delete'])){
                    // when user has not yet pressed the delete button:
                    array_push($results, "<p class='text-center text-danger m-0'><i class='fas fa-exclamation-triangle text-danger'></i></p>");
                    array_push($results, "<p class='text-center text-danger iranSans'>از حذف این محصول اطمینان دارید؟</p>");
                }
            }else{
                array_push($results, "<p class='text-danger text-center m-0'><i class='fas fa-exclamation-circle text-danger'></i></p>");
                array_push($results, "<p class='text-danger text-center'>آیدی محصول مورد نظر در دیتابیس یافت نشد!</p>");
            }
        }
    }else{
        header('location:signed_in_admin.php');
    }
?>