<?php require "php/admin_expiration.php"; ?>
<?php require "php/explorer_warning.php"; ?>
<?php require "php/deleteMessage_result.php"; ?>

<?php 
    session_start();
    expiration_test();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline';
        img-src 'self' https://diorhome.ir;
        font-src 'self' diorhome.ir;
        frame-src https://www.google.com;
        "  >
    <meta name="description"    content="  - حذف کالا از پایگاه داده پیشگامان پودینه آتا" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="apple-touch-icon" sizes="60x60" href="https://diorhome.ir/images/fav_icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://diorhome.ir/images/fav_icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://diorhome.ir/images/fav_icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://diorhome.ir/images/fav_icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://diorhome.ir/images/fav_icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://diorhome.ir/images/fav_icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://diorhome.ir/images/fav_icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://diorhome.ir/images/fav_icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="https://diorhome.ir/images/fav_icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://diorhome.ir/images/fav_icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://diorhome.ir/images/fav_icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://diorhome.ir/images/fav_icon/favicon-16x16.png">
    <link rel="manifest" href="https://diorhome.ir/images/fav_icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="https://diorhome.ir/images/fav_icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- font awesome -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/Normalizer.css">
    <link rel="stylesheet" href="CSS/fonts.css">
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/deleteMessage.css">

    <title>پیام حذف محصول - سامانه ادمین پیشگامان پودینه آتا</title>
</head>
<body>
    <main class="py-2">
        <div class="spinner-container text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="result mx-auto p-3 text-center py-2 displayNone">
            <?php
                if(isset($error)){
                    ?>
                        <p class="text-center text-danger"><i class="fas fa-exclamation-triangle"></i></p>
                    <?php
                    echo $error;
                }
                if(isset($result_paragraph)){
                    ?>
                        <p class="text-center text-success"><i class="fas fa-check-circle"></i></p>
                    <?php
                    echo $result_paragraph;
                }
                ?>
            <form action="signed_in_admin.php" method="post">
                <input type="hidden" name="search_page_number" value="<?php if(isset($_POST['search_page_number'])) echo $_POST['search_page_number']; ?>">
                <input type="hidden" name="search_product_name" value="<?php if(isset($_POST['search_product_name'])) echo $_POST['search_product_name']; ?>">
                <input type="hidden" name="search_product_dimensions" value="<?php if(isset($_POST['search_product_dimensions'])) echo $_POST['search_product_dimensions']; ?>">
                <input type="hidden" name="search_product_category" value="<?php if(isset($_POST['search_product_category'])) echo $_POST['search_product_category']; ?>">
                <input type="hidden" name="search_product_subcategory" value="<?php if(isset($_POST['search_product_subcategory'])) echo $_POST['search_product_subcategory']; ?>">
                <input type="hidden" name="search_product_description" value="<?php if(isset($_POST['search_product_description'])) echo $_POST['search_product_description']; ?>">
                <input type="hidden" name="search_uploader_username" value="<?php if(isset($_POST['search_uploader_username'])) echo $_POST['search_uploader_username']; ?>">
                <input type="hidden" name="search_before_upload_date" value="<?php if(isset($_POST['search_before_upload_date'])) echo $_POST['search_before_upload_date']; ?>">
                <input type="hidden" name="search_after_upload_date" value="<?php if(isset($_POST['search_after_upload_date'])) echo $_POST['search_after_upload_date']; ?>">
                <input type="hidden" name="search_approved" value="<?php if(isset($_POST['search_approved'])) echo $_POST['search_approved']; ?>">
                <input type="hidden" name="search_less_number_of_likes" value="<?php if(isset($_POST['search_less_number_of_likes'])) echo $_POST['search_less_number_of_likes']; ?>">
                <input type="hidden" name="search_more_number_of_likes" value="<?php if(isset($_POST['search_more_number_of_likes'])) echo $_POST['search_more_number_of_likes']; ?>">
                <button type="submit" class="text-center text-primary iranSans" name="back_to_signed_in_admin_page" style="background-color:transparent;border:none;text-decoration:underline;">بازگشت</button>
            </form>
        </div>
    </main>
<script src="JS/explorer_warning.js"></script>
<script src="JS/deleteMessage.js"></script>
</body>
</html>