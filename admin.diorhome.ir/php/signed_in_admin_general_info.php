<?php 
    require "../httpdocs/php/database_connection.php";
    $get_users_number_query = "SELECT * FROM users";
    $users_count_query_result = mysqli_query($database_connection, $get_users_number_query);
    $number_of_users = mysqli_num_rows($users_count_query_result);

    $get_admin_users_number_query = "SELECT * FROM users WHERE administrator = 'YES' ";
    $admin_users_count_query_result = mysqli_query($database_connection, $get_admin_users_number_query);
    $number_of_admin_users = mysqli_num_rows($admin_users_count_query_result);

    $get_number_of_not_verified_query = "SELECT * FROM users WHERE verified = 'NO' ";
    $get_number_of_not_verified_results = mysqli_query($database_connection, $get_number_of_not_verified_query);
    $number_of_not_verified_users = mysqli_num_rows($get_number_of_not_verified_results);

    $user_disabled = 'disabled';
    $get_number_of_disabled_query = "SELECT * FROM users WHERE $user_disabled = 'YES' ";
    $get_number_of_disabled_results = mysqli_query($database_connection, $get_number_of_disabled_query);
    $number_of_disabled_users = mysqli_num_rows($get_number_of_disabled_results);

    $get_number_of_products_query = "SELECT * FROM products";
    $get_number_of_products_result = mysqli_query($database_connection, $get_number_of_products_query);
    $number_of_products = mysqli_num_rows($get_number_of_products_result);
    
    $get_number_of_sleeping_products_query = "SELECT * FROM products WHERE product_category = 'sleeping_products' ";
    $get_number_of_sleeping_products_result = mysqli_query($database_connection, $get_number_of_sleeping_products_query);
    $number_of_sleeping_products = mysqli_num_rows($get_number_of_sleeping_products_result);

    $get_number_of_living_room_products_query = "SELECT * FROM products WHERE product_category = 'living_room_products' ";
    $get_number_of_living_room_products_result = mysqli_query($database_connection, $get_number_of_living_room_products_query);
    $number_of_living_room_products = mysqli_num_rows($get_number_of_living_room_products_result);

    $get_number_of_carpet_products_query = "SELECT * FROM products WHERE product_category = 'carpet_products' ";
    $get_number_of_carpet_products_result = mysqli_query($database_connection, $get_number_of_carpet_products_query);
    $number_of_carpet_products = mysqli_num_rows($get_number_of_carpet_products_result);

    ?>