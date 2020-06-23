<?php 
    // database connection:
    if(isset($_GET['product_ID'])){
        $product_ID = $_GET['product_ID'];
        require "database_connection.php";
        if(!$database_connection){
            die('connection failed:'.mysqli_connect_error());
        }else{
            $query = "SELECT * from products WHERE product_ID = '$product_ID' AND approved = 'YES'";
            $query_result = mysqli_query($database_connection, $query);
            $product = mysqli_fetch_assoc($query_result);

            $product_directory = $product['product_directory'];
            $product_name = $product['product_name'];
            $product_category = $product['product_category'];
            $product_subcategory = $product['product_subcategory'];
            $product_description = $product['product_description'];
            
        }
    
    }else{
        echo 'the product not found!';
    }
?>