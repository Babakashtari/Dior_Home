<?php 
if(isset($_GET['request']) && isset($_GET['ID'])){
    $request = $_GET['request'];
    if($request == 'delete'){
        require "../httpdocs/php/database_connection.php";
        if(!$database_connection){
            die('connection failed:'.mysqli_connect_error());
        }else{
            $user_ID = $_GET['ID'];
            $query = "SELECT * FROM users WHERE ID = '$user_ID'";
            echo $query;
            $query_result = mysqli_query($database_connection, $query);
            $query_result_array = mysqli_fetch_assoc($query_result);
            if(mysqli_num_rows($query_result)>0){
                $username = $query_result_array['username'];
                $firstname = $query_result_array['first_name'];
                $lastname = $query_result_array['last_name'];
                $delete_warning = "آیا از حذف حساب کاربری $username اطمینان دارید؟";

            }else{
                $delete_warning= "کاربری با مشخصات فوق در سیستم یافت نشد";
            }

        }
    }
}
?>