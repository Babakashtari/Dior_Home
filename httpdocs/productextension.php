<?php require "php/code_functions.php" ?>
<?php require 'php/explorer_warning.php' ?>
<?php require 'php/product_extention_result.php' ?>

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
  <meta property="og:title" content="پیشگامان پودینه آتا - <?php echo $product_name; ?>">
  <meta property="og:url" content="productextension.php?product_ID=<?php echo $product_ID; ?>">
  <meta property="og:image" content="<?php echo $product_directory; ?>">
  <meta property="og:description" content="<?php echo $product_description; ?>" >
  <meta property="product:price:amount" content="4000000">
  <meta property="product:price:currency" content="irr">
  <!-- product structured data: -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "<?php echo $product_name; ?>",
      "author": "<?php echo $uploader_name; ?>"
      "image": [
        "<?php echo 'https://diorhome.ir/' . $product_directory; ?>"
       ],
      "description": "<?php echo $product_description; ?>",
      "sku": "0446310786",
      "mpn": "925872",
      "brand": {
        "@type": "Diorhome",
        "name": "پیشگامان پودینه آتا"
      }, 
      "review": {
        "@type": "Review",
        "reviewRating": {
          "@type": "Rating",
          "ratingValue": "4",
          "bestRating": "5"
        },
      "offers": {
        "@type": "Offer",
        "url": "https://diorhome.ir/productextension.php?product_ID=<?php echo $product_ID; ?>",
        "priceCurrency": "IRR",
        "price": "120000",
        "priceValidUntil": "2021-11-20",
        "availability": "https://schema.org/InStock",
        "seller": {
          "@type": "Organization",
          "name": "پیشگامان پودینه آتا"
        }
      }
    }
    </script>
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
    <!-- <link rel="canonical" href="https://diorhome.ir/productextension.php" /> -->
    <title>پيشگامان پودينه آتا - <?php echo $product_name; ?></title>
</head>
<body>
    <?php head(); ?>
    <main class="container-fluid p-0 m-0">
    <section class="modal fade" id="share_modal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header align-items-baseline">
              <h4>اشتراک محصول</h4>         
              <span class="close m-0" data-dismiss="modal">&times;</span>   
            </div>
            <div class="modal-body">
              <p class="text-right col-12">اشتراک گذاری از طریق لینک مستقیم:</p>
              <div class="link-container d-flex justify-content-around">
                <input class="mx-1" type="text" name="page-link" value="https://diorhome.ir/productextension.php?product_ID=<?php echo $product_ID;  ?>">
                <button class="p-1 text-success border border-success " id="copy_button">کپی لینک</button>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-start">
              <p class="text-right col-12">اشتراک درون برنامه ای:</p>
              <div class="link-container d-flex justify-content-between mr-auto">
                <a class="px-3" href="https://t.me/share/url?url=https://diorhome.ir/productextension.php?product_ID=<?php echo $product_ID; ?>&text=<?php echo 'محصولات پیشگامان پودینه آتا - ' . $product_name; ?>"><i class="fab fa-telegram text-primary"></i></a>
                <a class="px-3" href="https://www.facebook.com/sharer/sharer.php?u=https://diorhome.ir/productextension.php?product_ID=<?php echo $product_ID; ?>" target="_blank"><i class="fab fa-facebook text-primary"></i></a>
                <a class="px-3" href="whatsapp://send?text=محصولات پیشگامان پودینه آتا - <?php echo $product_name; ?>!" data-action="share/whatsapp/share"><i class="fab fa-whatsapp text-success"></i></a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="product-info row p-3 pb-5 mb-5 flex-row-reverse mx-auto bg-light">
        <div class="breadcrumb p-1 mx-auto m-md-0">
          <p class="p-0 m-0">
            <span class="p-2 bg-primary"><a class="text-light" href="products.php?product_category=<?php echo $product_category; ?>"><?php echo $product_category_link; ?></a></span> > 
            <span class="p-2 bg-primary"><a class="text-light" href="products.php?product_subcategory=<?php echo $product_subcategory; ?>"><?php echo $product_subcategory; ?></span></a> > 
            <span class="p-2 bg-secondary text-light"><?php echo $product_name; ?></span>
          </p>
        </div>
        <!-- title: name of the product -->
        <h1 class="text-center text-dark p-2 col-12 dancingScript m-0 mb-1"><?php echo $product_name; ?></h1>
        <div class="photo-section col-12 col-sm-6 col-md-4 px-0">
          <div class="photo-container">
            <a href="<?php echo 'productextension.php?product_ID=' . $product_ID ; ?>">
              <img src="<?php echo $product_directory; ?>" alt="<?php echo $product_name; ?>">
            </a>
            <ul class="left-icons-section m-0 p-0">
              <li class=''><a class="p-4" href="#" data-toggle="modal" data-target="#share_modal"><i class="fas fa-share-alt"></i></a></li>
              <li class=''><a class="p-4" href="<?php echo $product_directory; ?>"><i class="fas fa-download"></i></a></li>
              <li class=''>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?product_ID=<?php echo $product_ID; ?>" method="POST">
                  <button type="submit" name="like_submit" class="p-4" >
                    <i class="<?php echo $thumbs; ?>"></i>
                  </button>
                </form>
              </li>
            </ul>
          </div>
          <div class="sub-info py-3">
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?product_ID=<?php echo $product_ID; ?>">
                <p class="m-0 p-0 text-center dancingScript">
                  <?php echo $product_name; ?>
                </p>
                <p class="m-0 p-0 text-center dancingScript">
                  <?php echo $current_number_of_likes; ?>
                  <button type="submit" name="like_submit2"><i class="fas fa-heart <?php echo $heart_style; ?> px-1"></i></button>
                </p>
              </form>
            <p class="m-0 p-0 text-center"><?php echo $upload_date_formated; ?></p>
          </div>
        </div>
        <div class="info-section bg-light p-md-2 col-12 col-sm-6 col-md-5 ">
          <!-- body: product info -->
          <table class="table table-striped">
            <tr>
              <td>نام محصول:</td>
              <td><?php echo $product_name; ?></td>
            </tr>
            <tr>
              <td class="text-dark">کد محصول:</td>
              <td class="text-dark"><?php echo $product_ID; ?></td>
            </tr>
            <tr>
              <td class="text-dark">ابعاد:</td>
              <td class="text-dark"><?php echo $product_dimensions_link; ?></td>
            </tr>
            <tr>
              <td class="text-dark">دسته بندی:</td>
              <td class="text-dark"><?php echo $product_category_link; ?></td>
            </tr>
            <tr>
              <td class="text-dark">زیر مجموعه:</td>
              <td class="text-dark"><?php echo $product_subcategory; ?></td>
            </tr>
            <tr>
              <td class="text-dark">از:</td>
              <td class="text-dark"><?php echo $uploader_name; ?></td>
            </tr>
            <?php
              if(isset($product_description)){
                ?>
                  <tr><td colspan=2 class="text-dark"><?php echo $product_description; ?></td></tr>
                <?php
              }
            ?>
          </table>
        </div>
        <div class="related-tags p-md-2 col-12 col-md-3">
          <p class="text-center text-md-right position-relative pb-2">محصولات مرتبط:</p>
          <ul>
            <li class="text-right"><a href="products.php?product_category=<?php echo $product_category ?>"><i class="fas fa-tags py-3 px-2"></i><?php echo $product_category_link; ?>:</a>
              <ul>
                <?php 
                  if(isset($subcategories)){
                    foreach ($subcategories as $key => $value) {
                      ?>
                      <li class="text-right pr-0 pr-sm-3">
                        <a href="products.php?product_subcategory=<?php echo $value; ?>"><?php echo $value; ?></a>
                      </li>
                      <?php
                    }
                  }else{
                    echo '<p class="error">no subcategory!!!</p>';
                  }
                ?>
              </ul>
            </li>
            <li class="text-right"><a href="products.php?product_category=<?php echo $second_main_category; ?>"><i class="fas fa-tags py-3 px-2"></i><?php echo $second_main_category_link; ?>:</a>
              <ul>
                <?php 
                  if(isset($second_subcategories)){
                    foreach ($second_subcategories as $key => $value) {
                      ?>
                      <li class="text-right pr-0 pr-sm-3">
                        <a href="products.php?product_subcategory=<?php echo $value; ?>"><?php echo $value; ?></a>
                      </li>
                      <?php
                    }
                  }else{
                    echo '<p class="error">no subcategory!!!</p>';
                  }
                ?>
              </ul>
            </li>
            <li class="text-right"><a href="products.php?product_category=<?php echo $third_main_category; ?>"><i class="fas fa-tags py-3 px-2"></i><?php echo $third_main_category_link; ?>:</a>
              <ul>
                <?php 
                  if(isset($third_subcategories)){
                    foreach ($third_subcategories as $key => $value) {
                      ?>
                      <li class="text-right pr-0 pr-sm-3">
                        <a href="products.php?product_subcategory=<?php echo $value; ?>"><?php echo $value; ?></a>
                      </li>
                      <?php
                    }
                  }else{
                    echo '<p class="error">no subcategory!!!</p>';
                  }
                ?>
              </ul>
            </li>
          </ul>
        </div>
      </section>
      <section class="container mb-2 py-4 creativity">
        <h3 class="p-2 p-md-2 mx-2 mx-md-4"><i class="px-2 fas fa-tags"></i>دسته بندی محصولات:</h3>
        <?php five_photos_section(); ?>
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