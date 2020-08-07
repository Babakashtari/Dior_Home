<?php
    $return_link = "<p class='m-0 p-0'><a class='text-center text-primary iranSans' href='signed_in_admin.php'>بازگشت</a></p>";   
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
                    $delete_query = "DELETE FROM products WHERE product_ID = '$product_ID' ";
                    $delete_result = mysqli_query($database_connection, $delete_query);
                    $result_paragraph = "<p class='text-center text-success iranSans py-2'>محصول مورد نظر حذف شد.</p>"; 
                }else{
                    $error = "<p class='text-center text-danger iranSans py-2' >هیچ محصولی با مشخصات مورد نظر یافت نشد.</p>";
                }
            }
        }else{
            // when the admin user has come here by mistake. no ID is provided to identify the product:
            header('location:signed_in_admin.php');
        }
    }
?>