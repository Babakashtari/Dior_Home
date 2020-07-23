<?php require "php/admin_expiration.php"; ?>
<?php require "php/explorer_warning.php"; ?>
<?php require "php/productDelete_result.php"; ?>


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
    <link rel="stylesheet" href="CSS/productDelete.css">

    <title>حذف محصول - سامانه ادمین پیشگامان پودینه آتا</title>
</head>
<body>
    <main>
        <div class="text-results py-2">
            <?php
                foreach ($results as $key => $value) {
                    echo $value;
                }
            ?>
        </div>
        <div class="product-result col-xs-12 col-sm-6 mx-auto  col-lg-4 col-xl-3 p-3" >
            <div class="card border border-primary" itemscope itemtype="https://schema.org/Product">
            <img class="card-img-top" src="https://diorhome.ir/<?php echo $product_directory; ?>" alt="<?php echo $product_description; ?>" itemprop="image">
            <div class="card-body text-center ">
                <h6 class="card-title "><span class="text-gray" itemprop="name"><?php echo ucfirst($product_name); ?></span></h6>
                <table class="iranSans" itemprop="review" itemscope itemtype="http://schema.org/Review">
                    <tr>
                        <td><p class="card-text text-right" >ابعاد:</p></td>
                        <td><p><span class="text-gray">
                        <?php
                            if(!empty($product_dimensions )){
                                if(empty($product_dimensions) || $product_dimensions == "all"){
                                    echo 'همه ابعاد';
                                }elseif($product_dimensions == 'single'){
                                    echo 'تک نفره';
                                }elseif($product_dimensions == 'double'){
                                    echo 'دونفره';
                                }
                            }
                        ?>
                        </span></p></td>
                    </tr>
                    <tr>
                        <td><p class="card-text text-right">دسته بندی:</p></td><td><p><span class="text-gray" itemprop="category">
                            <?php
                                if($product_category == "sleeping_products"){
                                    echo "کالای خواب";
                                } elseif($product_category == "living_room_products"){
                                    echo "کالای اتاق پذیرایی";
                                }elseif($product_category == "carpet_products"){
                                    echo "فرش";
                                }
                            ?>
                        </span></p></td>
                    </tr>
                    <tr>
                        <td><p class="card-text text-right">زیرمجموعه:</p></td><td><p><span class="text-gray"><?php echo $product_subcategory; ?></span></p></td>
                    </tr>
                    <tr>
                        <td><p class="card-text text-right">توضیحات:</p></td><td><p><span class="text-gray" itemprop="description">
                            <?php
                                if(!empty($product_description)){
                                    echo $product_description; 
                                }else{
                                    echo 'ندارد';
                                }
                            ?>
                        </span></p></td>
                    </tr>
                </table>
                    <form action="deleteMessage.php" method="POST">
                        <input type="hidden" name="product_ID" value="<?php if(isset($product_ID)) echo $product_ID; ?>">
                        <button type="submit" class="btn btn-danger mt-4 iranSans" name="delete">مطمئنم</button>
                        <a href="signed_in_admin.php" class="btn btn-primary mt-4 iranSans">بیخیال </a>
                    </form>
                </div>
            </div>    
        </div>
    </main>

    <script src="JS/explorer_warning.js"></script>
</body>
</html>