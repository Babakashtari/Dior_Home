<?php
// when the admin user decides to press the delete button and actually delete the user from the database:
if(isset($_POST['ID']) && isset($_POST['delete'])){
    $ID = $_POST['ID'];
    require "../httpdocs/php/database_connection.php";
    if(!$database_connection){
        die('connection failed:'.mysqli_connect_error());
    }else{
        $query = "SELECT * FROM users WHERE ID = '$ID' ";
        $query_result = mysqli_query($database_connection, $query);
        if($query_result){
            $query_result_arr = mysqli_fetch_assoc($query_result);
            if(mysqli_num_rows($query_result)>0){
                $username = $query_result_arr['username'];
                $result= "کاربری <span> $username </span> با موفقیت از سیستم حذف شد.";
                $delete_query = "DELETE FROM users WHERE ID = '$ID' ";
                mysqli_query($database_connection, $delete_query);
            }else{
                $result = "متاسفانه کاربری مورد نظر یافت نشد.";
            }
    
        }
    }
}else{
    $result = "متاسفانه کاربری مورد نظر یافت نشد.";
}
if($result == "متاسفانه کاربری مورد نظر یافت نشد."){
    $icon = '<i class="fas fa-exclamation-circle text-danger p-1"></i>';
}else{
    $icon = '<i class="far fa-check-circle text-success p-1"></i>';
}
?>