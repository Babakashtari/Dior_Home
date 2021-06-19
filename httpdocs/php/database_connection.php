<?php
    // website:
    // $database_connection = mysqli_connect("host", "username", "password", "database name", "port");
    $database_connection = mysqli_connect("localhost", "diorhome_ir_root", "joli1366", "diorhome_ir_DiorHome", "3306");
    // local:
    // $database_connection = mysqli_connect("localhost", "root", "joli1366", "DiorHome");

    mysqli_set_charset($database_connection,"utf8");
    mysqli_query($database_connection, "SET NAMES 'utf8';");
    mysqli_query($database_connection, "SET CHARACTER SET 'utf8';");
    mysqli_query($database_connection, "SET COLLATION_CONNECTION = 'utf8_general_ci';");
?>