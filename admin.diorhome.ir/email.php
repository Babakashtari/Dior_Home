<?php require "php/admin_expiration.php" ?>
<?php require 'php/explorer_warning.php' ?>
<?php require 'php/email_sending_analysis.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"    content="  - ارسال ایمیل از پنل ادمین" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline';
        img-src 'self' https://diorhome.ir;
        font-src 'self' https://diorhome.ir;
        frame-src https://www.google.com;
        "  >

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

    <meta name="description"    content="  - ارسال ایمیل از پنل ادمین" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/Normalizer.css">
    <link rel="stylesheet" href="CSS/fonts.css">
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/email.css">

    <title>Admin Panel - send mail</title>
</head>
<body>
    <main class=" row d-flex justify-content-center align-items-center m-0 p-0">
        <section class="col-10 col-sm-8">
            <div class="text-center py-1 pt-3">
                <img class="m-1" src="https://diorhome.ir/images/Dior_logo.jpg" alt="لوگوی پیشگامان پودینه">
            </div>
            <form class=" p-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="message">
                <div class="sending_result">
                    <?php mailing_report(); ?>
                </div>
                <div class="form-group row">
                    <label for="sender" class="iranSans col-3 col-md-2 text-primary m-0">از:</label>
                    <input type="email" class="form-control iranSans col-9 col-md-10 " name="sender" id="sender" placeholder="noreply@diorhome.ir" value="noreply@diorhome.ir" oninput="validate(/^[a-zA-Z0-9_]{3,20}@[a-z]{3,15}[\.][a-z]{2,3}$/, this)">
                    <p class='iranSans text-danger pt-1 displayNone col-12'>ایمیل وارد شده صحیح نمی باشد.</p>
                </div>
                <div class="form-group row">
                    <!-- مخاطبین ایمیل ها در اینجا لیست می شوند: -->
                    <?php create_fields(); ?>

                    <p class='iranSans text-danger pt-1 displayNone col-12'>ایمیل وارد شده صحیح نمی باشد.</p>
                </div>
                <div class="form-group row">
                    <label for="topic" class="iranSans col-3 col-md-2 text-primary m-0">موضوع:</label>
                    <input type="text" class="form-control iranSans col-9 col-md-10 " name="topic" id="topic" value="
                        <?php 
                            if(isset($_GET['activation_code'])){
                                echo 'ثبت کاربری در پیشگامان پودینه آتا';
                            }elseif(isset($_POST['topic'])){
                                echo $_POST['topic'];
                            }elseif(isset($subject)){
                                echo $subject;
                            } 
                        ?>">
                    <p class='iranSans text-danger pt-1 displayNone col-12'>ایمیل وارد شده صحیح نمی باشد.</p>
                </div>
                <div class="form-group row">
                    <p class="iranSans px-2" style='direction:rtl;text-align:right'>
                        <?php 
                            if(isset($_GET['activation_code']) && isset($_GET['username']) && !empty($_GET['username'])){
                                echo htmlentities($_GET['username']) . ' گرامی، ';
                            }else{
                                echo 'کاربر گرامی،';
                            }
                        ?>
                    </p>
                    <textarea class="form-control iranSans col-12 " id="message_body" name="message_body" form="message" rows="<?php if(isset($_GET['activation_code'])){echo 1;}else{echo 5;} ?>" >
                        <?php 
                            if(isset($_POST['message_body'])){
                                echo $_POST['message_body'];
                            } 
                        ?>
                    </textarea>
                    <?php
                        if(isset($_GET['activation_code']) && isset($_GET['username']) && !empty($_GET['username'])){
                            echo "<p class='iranSans text-right p-0 m-0 col-12'>ضمن خیر مقدم بابت ثبت نام در سایت  پیشگامان پودینه آتا، لینک فعال سازی ایمیل شما عبارت است از:</p>";
                            $activation_link = "https://diorhome.ir/emailActivation.php?email=" . htmlentities($_GET['recipient']) . "&code=" . htmlentities($_GET['activation_code']);
                            $activation_username = htmlentities($_GET['username']) . " گرامی، ";
                            echo "<p class='text-right p-0 m-0 col-12'><a href ='" . $activation_link . "'>$activation_link</a></p>";
                            echo "<input type='hidden' name='activation_username' id='activation_username' value='$activation_username'>";
                            echo "<input type='hidden' name='activation_link' id='activation_link' value='$activation_link' >";
                        }
                    ?>
                    <p class="iranSans text-left px-2 col-12" style='direction:rtl;text-align:left'>گروه پشتیبانی پیشگامان پودينه آتا</p>
                    <p class="iranSans text-left px-2 col-12" style='direction:rtl;text-align:left'>تلفن: 02155615148  - 02155983072 </p>
                    <p class="iranSans text-left px-2 col-12" style='direction:rtl;text-align:left'>تهران: بازار بزرگ، سرای آزادی، طبقه اول پلاک 48</p>
                    <p class="iranSans text-left px-2 col-12" style='direction:rtl;text-align:left'>اردبیل: ميدان ايثار، شهرك صنعتی فاز 1 خيابان پنج شرقی پيشگامان پودينه آتا</p>
                </div>
                <button type="submit" name="send_mail" id="send_mail" class="iranSans btn btn-primary col-5 col-md-2" ><i class="fas fa-paper-plane p-1"></i>ارسال</button>
                <div class="mail-links">
                    <p class="iranSans text-center p-1 col-12"><a href="signed_in_admin.php">بازگشت به پنل ادمین</a></p>
                </div>

            </form>
        </section>
        <?php show_warning(); ?>
    </main>
    <script src="JS/email.js"></script>
    <script src="JS/explorer_warning.js"></script>
</body>
</html>