<?php require "php/admin_expiration.php"; ?>
<?php require "php/explorer_warning.php"; ?>
<?php require "php/productEdit_result.php"; ?>

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
    <meta name="description"    content="  - اصلاح اطلاعات کالا از پایگاه داده پیشگامان پودینه آتا" />
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
    <link rel="stylesheet" href="CSS/productEdit.css">

    <title>اصلاح اطلاعات محصول - سامانه ادمین پیشگامان پودینه آتا</title>
</head>
<body>
<main>
        <div class="text-results py-2">
            <!-- interaction message goes here -->
            <?php
                if(!empty($result)){
                    foreach($result as $value){
                        echo $value;
                    }
                }
                if(!empty($errors)){
                    ?>
                        <p class="text-center text-danger m-0"><i class="fas fa-exclamation-triangle" style="font-size:1.5rem;"></i></p>
                    <?php
                    foreach($errors as $value){
                        echo $value;
                    }
                }
            ?>
        </div>
        <div class="product-result col-xs-12 col-sm-6 mx-auto  col-lg-4 col-xl-3 p-3" >
            <div class="card border border-primary" itemscope itemtype="https://schema.org/Product">
                <img class="card-img-top" src="https://diorhome.ir/<?php echo $product_directory; ?>" alt="<?php echo $product_description; ?>" itemprop="image">
                <div class="card-body text-center ">
                    <!-- فرم اصلاح محصول: -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <table class="iranSans" itemprop="review" itemscope itemtype="http://schema.org/Review">
                            <tr>
                                <td><p class="card-text text-right">نام:</p></td>
                                <td class="form-group">
                                    <input type="text" name="product_name_edit" class="form-control card-title col-12 passed" value="<?php echo $product_name; ?>" oninput="input_validate(/^[a-zA-Z\d\s]{3,15}$/, this)">
                                    <p class="text-right text-danger displayNone">نام محصول فقط از حروف و اعداد کوچک یا بزرگ تشکیل شده و نمی تواند کمتر از 3 کاراکتر باشد.</p>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="card-text text-right" >ابعاد:</p></td>
                                <td class="form-group">
                                    <select class="form-control passed" id="product_dimensions_edit" name="product_dimensions_edit" onchange="select_validate(/^(single)|(double)|(all)$/, this)">
                                        <option value="single" <?php if(isset($product_dimensions) && $product_dimensions == "single") echo "selected"; ?>>یک نفره</option>
                                        <option value="double" <?php if(isset($product_dimensions) && $product_dimensions == "double") echo "selected"; ?>>دو نفره</option>
                                        <option value="all" <?php if(isset($product_dimensions) && $product_dimensions == "all") echo "selected"; ?>>فرقی نمی کند</option>
                                    </select>
                                    <p class="text-right text-danger displayNone">لطفا یکی از موارد 'یک نفره'، 'دونفره' یا 'فرقی نمی کند' را انتخاب کنید</p>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="card-text text-right">دسته بندی:</p></td>
                                <td class="form-group">
                                    <select class="form-control passed" id="product_category_edit" name="product_category_edit" onchange="create_subcategory(event)">
                                        <option value="sleeping_products" <?php if(isset($product_category) && $product_category == "sleeping_products") echo "selected"; ?>>کالای خواب</option>
                                        <option value="living_room_products" <?php if(isset($product_category) && $product_category == "living_room_products") echo "selected"; ?>>کالای اتاق پذیرایی</option>
                                        <option value="carpet_products" <?php if(isset($product_category) && $product_category == "carpet_products") echo "selected"; ?>>فرش</option>
                                    </select>
                                    <p class="text-right text-danger displayNone">دسته مربوطه به درستی انتخاب نشده است.</p>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="card-text text-right">زیرمجموعه:</p></td>
                                <td class="form-group">
                                    <select class="form-control passed" id="product_subcategory_edit" name="product_subcategory_edit" onchange="select_validate(/^(کوسن|روبالشی|روتختی|ملافه|پرده|رومبلی|رومیزی|فرش|روفرشی|تابلوفرش)$/, this)">
                                        <!-- product subcategory options are generated here via PHP -->
                                        <?php subcategory_generator(); ?>
                                    </select>
                                    <p class="text-right text-danger displayNone">زیرگروه مربوطه به درستی انتخاب نشده است.</p>
                                </td>
                            </tr>
                            <tr>
                                <td><p class="card-text text-right">توضیحات:</p></td>
                                <td class="form-group py-1" itemprop="description">
                                    <textarea class="form-control p-1 col-12 passed" name="product_description_edit" id="product_description_edit" placeholder="توضیحات مربوط به محصول"><?php if(isset($product_description) && !empty($product_description)) echo $product_description; ?></textarea>
                                </td>
                            </tr>
                        </table>
                        <!-- اطلاعات محصول مورد نظر -->
                        <input type="hidden" name="product_ID" value="<?php if(isset($product_ID)) echo $product_ID; ?>">
                        <input type="hidden" name="product_directory" value="<?php if(isset($product_directory)) echo $product_directory; ?>">
                        <!-- اطلاعات جستجوی انجام شده: -->
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
                        <button type="submit" class="btn btn-success mt-4 iranSans" name="edit"><i class="far fa-check-circle px-1"></i>اصلاح محصول</button>
                    </form>
                    <!-- فرم بازگشت: -->
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
                        <button type="submit" class="btn btn-primary mt-4 iranSans" name="back_to_signed_in_admin_page"><i class="fas fa-arrow-circle-left px-1"></i>بازگشت </button>
                    </form>
                </div>
            </div>    
        </div>
    </main>

    <script src="JS/explorer_warning.js"></script>
    <script src="JS/productEdit.js"></script>

</body>
</html>