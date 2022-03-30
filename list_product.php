<?php
include_once("header.php");
require_once("/xampp/htdocs/Shopmobies/entities/product.class.php");
require_once("/xampp/htdocs/Shopmobies/entities/category.class.php");
//$prods = Product::list_product ();
?>

<?php
if (!isset($_GET["cateid"])) {
	$prods = Product::list_product_name();
} else {
	$cateid = $_GET["cateid"];
	$prods = Product::list_product_by_cateid($cateid);
}
$cates = Category::list_category();
?>


<div class="container text-center">

	
		<div class="col-sm-3">
			<h3>Danh mục</h3>
			<ul class="list-group">
				<?php
				foreach ($cates as $item) {
					echo "<li class ='list-group-item'><a
            href=/Shopmobies/list_product.php?cateid=" . $item["CateID"] . ">" . $item["CategoryName"] . "</a></li>";
				} ?>
			</ul>
		</div>

		<div class="col-sm-9">
			<h3>SẢN PHẨM CỬA HÀNG</h3>
			<div class="row">
				<?php
				foreach ($prods as $item) {
				?>
					<div class="col-sm-4">
					<a href="/Shopmobies/product_detail.php?id=<?php echo $item["ProductID"]; ?>">

						<img src="<?php echo "/Shopmobies/upload/" . $item["Picture"]; ?> " class="img-responsive" style="width:100%" alt="Image">
					</a>
						<p class="text-danger">
							<?php echo $item["ProductName"]; ?>
						</p>
						<p class="text-info">
							<?php echo $item["Price"]; ?>
						</p>
						<p class="text-info">
							<?php echo $item["CategoryName"]; ?>
						</p>
                        <p class="text-info">
							<?php echo $item["TrademarkName"]; ?>
						</p>
						<p class="text-info">
							khuyến mãi: <?php echo $item["value"]; ?> %
						</p>
						<p>
						<a href="/Shopmobies/shopping_cart.php?id=<?php echo $item["ProductID"]; ?>">
						<button type="button" class="btn btn-danger" >Mua hàng</button>
						</a>
						</p>
					</div>
				<?php } ?>
			</div>
		</div>
</div>

	<?php
	include_once("footer.php");
	?>