<?php
    if(isset($_POST['delete'])){
        if(isset($_POST['product_ID']) && !empty($_POST['product_ID'])){
            $product_ID = $_POST['product_ID'];
            require "../httpdocs/php/database_connection.php";
            if(!$database_connection){
                die('connection failed:'.mysqli_connect_error());
            }else{
                $select_query = "SELECT * FROM products WHERE product_ID = '$product_ID' ";
                $selection_result = mysqli_query($database_connection, $select_query);
                if(mysqli_num_rows($selection_result)>0){
                    $selection_result_array = mysqli_fetch_assoc($selection_result);
                    $product_name = $selection_result_array['product_name'];
                    $result_paragraph = "<p class='text-center text-success iranSans py-2'>$product_name با موفقیت حذف شد.</p>"; 
                    $delete_query = "DELETE FROM products WHERE product_ID = '$product_ID' ";
                    $delete_result = mysqli_query($database_connection, $delete_query);
                }else{
                    $error = "<p class='text-center text-danger iranSans py-2' >هیچ محصولی با مشخصات مورد نظر یافت نشد.</p>";
                }
            }
        }else{
            // when the admin user has come here by mistake. no ID is provided to identify the product:
            header('location:signed_in_admin.php');
        }
    }else{
        // when the admin user has come here by mistake. no ID is provided to identify the product:
        header('location:signed_in_admin.php');
    }
?>