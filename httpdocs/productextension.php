<?php require "php/code_functions.php" ?>
<?php require 'php/explorer_warning.php' ?>
<?php require 'php/product_extention_result.php' ?>


<!-- <?php session_start(); ?> -->
<!DOCTYPE html lang="fa">
<html lang="fa">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-155871160-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-155871160-2');
</script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-security-policy" content="default-src 'none'; 
        style-src 'self' 'unsafe-inline'; 
        script-src 'self' 'unsafe-inline' https://www.google-analytics.com;
        img-src 'self' https://www.w3.org https://www.google.com.ua https://www.google.com https://www.google-analytics.com https://www.googletagmanager.com https://stats.g.doubleclick.net;
        font-src 'self';
        frame-src https://www.google.com;
        "  >
    <meta name="description" content="<?php echo $product_description; ?>" />
    <meta name="author" content="Babak Ashtari" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- for SEO purposes -->
  <!-- open graph meta tags for SEO -->
  <meta property="og:type" content="product">
  <meta property="og:title" content="<?php echo $product_name; ?>">
  <meta property="og:url" content="productextension.php?product_ID=<?php echo $product_ID; ?>">
  <meta property="og:image" content="<?php echo $product_directory; ?>">
  <meta property="og:description" content="<?php echo $product_description; ?>" >
  <meta property="product:price:amount" content="4000000">
  <meta property="product:price:currency" content="irr">
  <!-- twitter card: -->
  <meta name="twitter:card" content="summary"></meta>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/fav_icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/fav_icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/fav_icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/fav_icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/fav_icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/fav_icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/fav_icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/fav_icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="images/fav_icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/fav_icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/fav_icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/fav_icon/favicon-16x16.png">
    <link rel="manifest" href="images/fav_icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/fav_icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- font awesome -->
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css.map">
    <link rel="stylesheet" href="CSS/bootstrap.min.css"/>
    <link rel="stylesheet" href="CSS/Normalizer.css">
    <link rel="stylesheet" href="Css/fonts.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/contact_us_modal.css">
    <link rel="stylesheet" href="CSS/explorer_warning.css">
    <link rel="stylesheet" href="CSS/productextension.css">
    <link rel="canonical" href="https://diorhome.ir/productextension.php" />
    <title>پيشگامان پودينه آتا - <?php echo $product_name; ?></title>
</head>
<body>
    <?php head(); ?>
    <main>
      <section class="product-info container p-3">
        <div class="photo-section">
          <img src="<?php echo $product_directory; ?>" alt="<?php echo $product_name; ?>">
        </div>
        <div class="info-section">
          
        </div>
        <div class="related-tags p-md-2">
          <p class="text-center position-relative">محصولات مرتبط:</p>
          <ul>
            <li class="text-right"><a href="products.php?product_category=<?php echo $product_category ?>"><?php echo $product_category_link; ?></a></li>
            <?php 
              if(isset($subcategories)){
                foreach ($subcategories as $key => $value) {
                  ?>
                  <li class="text-right">
                    <a href="products.php?product_subcategory=<?php echo $value; ?>"><?php echo $value; ?></a>
                  </li>
                  <?php
                }
              }else{
                echo '<p class="error">no subcategory!!!</p>';
              }
            ?>
            <li class="text-right"><a href="products.php?product_subcategory=<?php echo $second_main_category; ?>"><?php echo $second_main_category_link; ?></a></li>
            <li class="text-right"><a href="products.php?product_subcategory=<?php echo $third_main_category; ?>"><?php echo $third_main_category_link; ?></a></li>

          </ul>
        </div>
        <div class="clearfix"></div>
      </section>
      <?php show_warning(); ?>
    </main>
    <?php footer_generator();?>
    <?php contact_us_modal(); ?>
    <?php canvas_generator(); ?>
    <script src="JS/explorer_warning.js"></script>
    <script src="JS/canvas.js"></script>
    <script src="JS/jquery.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/header.js"></script>
    <script src="JS/productextension.js"></script>
    <script src="JS/footer.js"></script>

</body>
</html>