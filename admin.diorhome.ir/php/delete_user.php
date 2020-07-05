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
            $query_result = mysqli_query($database_connection, $query);
            $query_result_array = mysqli_fetch_assoc($query_result);
            if(mysqli_num_rows($query_result)>0){
                $firstname = $query_result_array['first_name'];
                $lastname = $query_result_array['last_name'];
                $age = $query_result_array['age'];
                $gender = $query_result_array['gender'];
                $username = $query_result_array['username'];
                $email_address = $query_result_array['email'];
                $home_address = $query_result_array['home_address'];
                $delete_warning = "شما در آستانه حذف کاربری <span>$username</span> از سیستم هستید. آیا اطمینان دارید؟";
                $sign_up_token = $query_result_array['sign_up_token'];
                if(is_null($sign_up_token)){
                    $sign_up_token = "-";
                }
                $verified = $query_result_array['verified'];
                $forgot_password_token = $query_result_array['token'];
                $disabled = $query_result_array['disabled'];
                $newsletter = $query_result_array['newsletter'];
                $administrator = $query_result_array['administrator'];
            }else{
                $delete_warning= "کاربری با مشخصات فوق در سیستم یافت نشد";
            }

        }
    }
}
?>