
<?php 

function copy_right(){    
    echo    '<div class=" links row col-12 m-0">
                <div class=" link-container pb-2 pt-2 pb-sm-4 pt-sm-4 d-flex col-12 col-sm-6 justify-content-around align-items-center mx-auto">
                    <a class="text-light text-center" href="index.php">خانه</a>
                    <a class="text-light text-center" href="#">درباره ما</a>
                    <a class="text-light text-center" href="#">اخبار</a>
                    <a class="text-light text-center" href="products.php">محصولات</a>
                </div>
                <div class="footer row col-12" >
                    <p class="text-light text-center col-12 mb-0 mb-sm-1">کلیه حقوق مادی و معنوی این وبسایت به شرکت چاپ و نساجی پیشگامان پودینه آتا تعلق دارد.</p>
                    <p class="copy-right text-light text-center col-12 m-0" style="direction:ltr;">&copy; 2010-' . date("Y") . "</p>" . '
                </div>
             </div>
            ';
}
?>