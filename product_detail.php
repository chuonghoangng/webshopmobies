<?php
include_once("header.php");
require_once("/xampp/htdocs/ShopMobies/entities/product.class.php");
require_once("/xampp/htdocs/ShopMobies/entities/category.class.php");
?>
<?php

if (!isset($_GET["id"])) {
    //đường dẫn xem chi tiết sản phẩm không đúng
    //dẫn tới trang not found
    header('Location: not_found.php');
} else {
    $id = $_GET["id"];
    $x = Product::get_product($id);
    $prod = reset($x);
    $prods_relate = Product::list_product_relate($prod["CateID"], $id);
}
$cates = Category::list_category();
?>

<div class="container text-center">
    <div class="col-sm-3 panel panel-danger">
        <h3 class="panel-heading">Danh mục</h3>
        <ul class="list-group">
            <?php
            foreach ($cates as $item) {
                echo "<li class ='list-group-item'><a
     href=/ShopMobies/list_product.php?cateid=" . $item["CateID"] . ">" . $item["CategoryName"] . "</a></li>";
            } ?>
        </ul>
    </div>
    <div class="col-sm-9 panel panel-info">
        <h3 class="panel-heading">Chi tiết sản phẩm</h3>
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo "/ShopMobies/upload/" . $prod["Picture"]; ?>" class="img-responsive" style="width:100%" alt="Image">
            </div>
            <div class="col-sm-6">
                <!-- in thông tin chi tiết sản phẩm -->
                <div style="padding-left:10px">
                    <h3 class="text-info">
                        <?php echo $prod["ProductName"]; ?>
                    </h3>
                    <p>
                        Giá: <?php echo $prod["Price"]; ?>
                    </p>
                    <p>
                        Mô tả: <?php echo $prod["Description"]; ?>
                    </p>
                    <p>

                        <button type="button" class="btn btn-danger" onclick="location.href='/ShopMobies/shopping_cart.php?id=<?php echo $prod["ProductID"]; ?>'">Mua hàng</button>

                    </p>
                </div>
            </div>

        </div>
        <h3>Binh luân facebook</h3>
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6"></script>

        <!-- Your embedded comments code -->
        <div class="fb-comment-embed" data-href="https://www.facebook.com/zuck/posts/10102735452532991?comment_id=1070233703036185" data-width="500"></div>

        <h3 class="panel-heading">Sản phẩm liên quan</h3>
        <div class="row">

            <?php
            foreach ($prods_relate as $item) {
            ?>
                <div class="col-sm-4">
                    <a href="/ShopMobies/product_detail.php?id=<?php echo $item["ProductID"]; ?>">
                        <img src="<?php echo "/ShopMobies/upload/" . $item["Picture"]; ?>" class="img-responsive" style="width:100%" alt="Image">
                    </a>
                    <p class="text-danger"><?php echo $item["ProductName"]; ?></p>
                    <p class="text-info"><?php echo $item["Price"]; ?></p>
                    <p>
                        <button type="button" class="btn btn-primary">Mua hàng</button>
                        </р>
                </div>
            <?php } ?>
        </div>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="DQAgH3hK"></script>
    <div class="fb-comments" data-href="https://www.facebook.com/chuong.nguyenhoang.927/posts/1594400777568471" data-width="500" data-numposts="50"></div>
    <?php
    include_once("footer.php");
    ?>