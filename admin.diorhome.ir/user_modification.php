<?php require "php/admin_expiration.php" ?>
<?php require "php/explorer_warning.php" ?>
<?php require 'php/user_modification_result.php' ?>

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
    <meta name="description"    content=" کاربران ادمین محترم از این پنل می توانند تمامی اطلاعات کاربری یوزر های پیشگامان پودینه آتا را اطلاح و بازنگری کنند." />
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
    <link rel="stylesheet" href="CSS/user_modification.css">

    <title>سامانه ادمین پیشگامان پودینه آتا - اصلاح اطلاعات کاربری</title>
</head>
<body>
    <header>
        <div class="logo-section px-2 py-4">
            <img src="https://diorhome.ir/images/Dior_logo.jpg" alt="لوگوی پیشگامان پودینه آتا">
        </div>
        <!-- ارور ها در اینجا نمایش داده می شوند -->
        <div class="errors text-center">
            <?php
                if(isset($errors) && count($errors)>0){
                ?>
                    <p class="text-danger"><i class="fas fa-exclamation-circle"></i></p>
                <?php
                    foreach ($errors as $key => $value) {
                        echo "<p class='text-danger iranSans'>$value</p>";
                    }
                }else{
                    if(isset($_POST['modification']) && count($updated_inputs)>0){
                    ?>
                        <p class="text-success"><i class="fas fa-check"></i></p>
                        <?php
                            foreach ($updated_inputs as $key => $value) {
                                echo "<p class='text-success iranSans'>$key = $value با موفقیت به روز رسانی شد.</p>";
                            }
                        ?>
                    <?php
                    }
                }
            ?>
        </div>
    </header>
    <main>
        <p class="text-center text-dark iranSans">برای خالی کردن هر فیلد کافی است مقدار "-" برایش مشخص کنید.</p>
        <table class="table table-striped container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <caption>کاربری: <?php echo $username; ?> - کد شناسایی: <?php echo $ID;?><caption>
            <!-- user's general info section: -->
            <tr>
                <th class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('first_name', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>نام:</p></td>
                <th class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('last_name', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>نام خانوادگی:</p></td>
                <th class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('age', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>سن:</p></td>
                <th class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('gender', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>جنسیت:</p></td>
                <th class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('username', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>نام کاربری:</p></td>
                <th class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('pass', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>رمز عبور:</p></th>
            </tr>
            <tr><td class="col-2"><input class="m-0 py-1 text-center col-12" type="text" name="first_name" value="<?php if($first_name == "-" || empty($first_name)){echo "-";}else echo $first_name; ?>" placeholder="Babak"></td>
                <td class="col-2"><input class="m-0 py-1 text-center col-12" type="text" name="last_name" value="<?php if($last_name == "-" || empty($last_name)){echo "-";}else echo $last_name; ?>" placeholder="Ashtari"></td>
                <td class="col-2"><input class="m-0 py-1 text-center col-12" type="text" name="age" value="<?php if($age == "-" || empty($age)){echo "-";}else echo $age; ?>" placeholder="32"></td>
                <td class="col-2"><select class="m-0 py-1 text-center col-12" name="gender"><option class="text-center" value="-" <?php if($gender == "-" || empty($gender))echo 'selected'; ?>>-</option><option class="text-center" value="male" <?php if($gender == 'male'){echo 'selected';} ?> >مذکر</option><option value="female" <?php if($gender == 'female'){echo 'selected';} ?> >مونث</option></select></td>
                <td class="col-2"><input class="m-0 py-1 text-center col-12" type="text" name="username" value="<?php if($username == "-" || empty($username)){echo "-";}else echo $username; ?>" placeholder="Babak1366"></td>
                <td class="col-2"><input class="m-0 py-1 text-center col-12" type="password" name="pass" value=""></td>
            </tr>
            <tr>
                <td class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('verified', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>وضعیت تایید:</p></td>
                <td class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('mobile_phone', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>موبایل:</p></td>
                <td class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('website', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>وبسایت:</p></td>
                <td class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('disabled', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>غیر فعال:</p></td>
                <td class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('newsletter', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>خبرنامه:</p></td>
                <td class="col-2"><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('administrator', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>کاربر ادمین:</p></td>
            </tr>
            <tr>
                <td class="col-2"><select class="m-0 py-1 text-center col-12" name="verified"><option value="YES" <?php if($verified == 'YES'){echo 'selected';} ?> >بله</option><option value="NO" <?php if($verified == 'NO'){echo 'selected';} ?> >خیر</option></select></td>
                <td class="col-2"><input class="m-0 py-1 text-center col-12" type="text" name="mobile_phone" value="<?php echo $mobile_phone; ?>"></td>
                <td class="col-2"><input class="m-0 py-1 text-center col-12" type="text" name="website" value="<?php if($website == "-" || empty($website)){echo "-";}else echo $website; ?>"></td>
                <td class="col-2"><select class="m-0 py-1 text-center col-12" name="disabled"><option value="YES" <?php if($disabled == 'YES'){echo 'selected';} ?> >بله</option><option value="NO" <?php if($disabled == 'NO'){echo 'selected';} ?> >خیر</option></select></td>
                <td class="col-2"><select class="m-0 py-1 text-center col-12" name="newsletter"><option value="YES" <?php if($newsletter == 'YES'){echo 'selected';} ?> >بله</option><option value="NO" <?php if($newsletter == 'NO'){echo 'selected';} ?> >خیر</option></select></td>
                <td class="col-2"><select class="m-0 py-1 text-center col-12" name="administrator"><option value="YES" <?php if($administrator == 'YES'){echo 'selected';} ?> >بله</option><option value="NO" <?php if($administrator == 'NO'){echo 'selected';} ?> >خیر</option></select></td>
            </tr>
            <tr>
                <td colspan="3" class=""><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('email', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?> آدرس ایمیل:</p></td>
                <td colspan="3" class=""><p class="m-0 py-1"><?php if(isset($updated_inputs) && array_key_exists('home_address', $updated_inputs)) echo '<i class="fas fa-check-circle text-success px-1"></i>'; ?>آدرس پستی:</p></td>
            </tr>
            <tr>
                <td colspan="3"><input class="m-0 py-1 text-center col-12 border border-none" type="text" name="email" value="<?php echo $email; ?>" placeholder="ashtaribabak@rocketmail.com"></td>
                <td colspan="3" class=""><textarea class="text-center col-12 border border-none" name="home_address"><?php if($home_address == "-" || empty($home_address)){echo "-";}else echo $home_address; ?></textarea></td>
            </tr>
            <tr>
                <td colspan="6">
                    <input type="hidden" name="ID" value="<?php echo $ID; ?>">
                    <input class="btn btn-success" type="submit" name="modification" value="اعمال تغییرات">
                </td>
            </tr>
        </form>
        </table>
        <div class="homepage-link">
            <p class="text-center iranSans">
                <a href="signed_in_admin.php">بازگشت به پنل ادمین</a>
            </p>
        </div>
        <!-- on load opening modal: -->
        <div class="warning p-2" id="warning">
            <div class="center p-4 target">
                <p class="text-center text-danger m-0 icon align-items-baseline pb-2 target"><?php echo $tableau; ?></i></p>
                <p class="text-center text-light iranSans py-2 target"><?php echo $warning; ?></p>
                <div class="button-container d-flex justify-content-around target">
                    <?php echo $close_btn; ?>
                    <?php if(isset($delete_form)) echo $delete_form; ?>
                </div>
                <p class="text-center target my-2">
                    <a class="text-primary iranSans" href="signed_in_admin.php">بازگشت به پنل ادمین</a>
                </p>
            </div>
        </div>
    </main>
    <footer>
    
    </footer>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/user_modification.js"></script>
</body>
<?php
    
?>