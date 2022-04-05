<?php include_once('header.php'); ?>
<?php

require_once("/xampp/htdocs/ShopMobies/entities/product.class.php");
require_once("/xampp/htdocs/ShopMobies/entities/category.class.php");
require_once("/xampp/htdocs/Shopmobies/entities/trademark.class.php");
$cates = Category::list_category();
$trades = Trademark::list_trademark();
// khởi động session
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// hiển thị Lỗi
error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', '1');
// thêm mới sản phẩm vào gió hàng
if (isset($_GET["id"])) {
  $pro_id = $_GET["id"];
  //biến xác nhận sản phẩm đã tồn tại trong gió hàng hay chưa
  //was found = true --> sản phẩm đã có trong gió hàng, tăng số Lượng Lên 1
  //was_found = false --> sản phẩm chưa có trong gió hàng, thêm sản phẩm vào gió hàng, mặc định số Lượng Là 1
  $was_found = false;
  $i = 0;
  //kiểm tra session được khới tạo hay chưa
  if (!isset($_SESSION["cart_items"]) || count($_SESSION["cart_items"]) < 1) {
    $_SESSION["cart_items"] = array(0 => array("pro_id" => $pro_id, "quantity" => 1));
  } else {
    //giỏ hàng đã được khởi tạo
    //duyệt tất cả các sản phẩm trong gió hàng
    //nếu đã tồn tại sản phẩm thì tăng số Lượng Lên 1
    //nếu chưa tồn tại thì sẽ thêm mới sản phẩm vào gió hàng với số Lượng Là 1
    foreach ($_SESSION["cart_items"] as $item) {
      $i++;
      reset($item);
      foreach ($item as $key => $val) {
        if ($key == "pro_id" && $val == $pro_id) {
          //sản phẩm đã tồn tại trong giỏ hàng, tăng số Lượng Lên 1
          array_splice($_SESSION["cart_items"], $i - 1, 1, array(array("pro_id" => $pro_id, "quantity" =>
          $item["quantity"] + 1)));
          $was_found = true;

          
        }
      }
    }
    if ($was_found == false) {
      array_push($_SESSION["cart_items"], array("pro_id" => $pro_id, "quantity" => 1));
    }
  }
  header("location: shopping_cart.php");
}
?>

<div class="container text-center">


  <div class="col-sm-3">
    <h3>Danh mục</h3>
    <ul class="list-group">
      <?php
      foreach ($cates as $item) {
        echo "<li class ='list-group-item'><a
      href=/ShopMobies/list_product.php?cateid=" . $item["CateID"] . ">" . $item["CategoryName"] . "</a></li>";
      } ?>
    </ul>
  </div>
  <div class="col-sm-1">

		<ul class="list-group">
			<?php
			foreach ($trades as $item) {
				echo "<li class ='list-group-item'><a
            href=/ShopMobies/list_product.php?trademarkid=" . $item["TrademarkID"] . ">" . $item["TrademarkName"] . "</a></li>";
			}
			?>
		</ul>
	</div>

  <div class="col-sm-9">
    <h3>Thông tin giỏ hàng</h3><br>
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Tên sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Số lượng</th>
          <th>Đơn giá </th>
          <th>Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_money = 0;
        if (isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"]) > 0) {
          foreach ($_SESSION["cart_items"] as $item) {
            $id = $item["pro_id"];
            $product = Product::get_product($id);
            $prod = reset($product);
            $sum = $prod["Price"] * $item["quantity"];
            $total_money += $item["quantity"] * $prod["Price"];
            $file = "upload/";
            echo "<tr><td>" . $prod["ProductName"] . "</td><td><img style='width:90px; height:80px' src=" . $file . $prod["Picture"] . "
      /></td><td>" . $item["quantity"] . "</td><td>" . $prod["Price"] . "</td><td>" . $sum . "</td></tr>";
          }
          echo "<tr> <td colspan=5><p class='text-right text-danger'>Tổng tiền: " . $total_money . "</p></td> </tr>";
          echo "<tr><td colspan=3><p class='text-right'> <a href='/ShopMobies/list_product.php'><button type='button' class='btn btn-primary'>Tiếp tục mua
    hàng</button> </a></p></td><td colspan=2><p class='text-right'> <button type='button' class='btn btn-success' >Thanh
    toán</button> </p></td></tr>";
        } else {
          echo "Không có sản phẩm nào trong giỏ hàng!";
        }
        ?>
      </tbody>

    </table>
  </div>
</div>
<!-- hiến thị shopping cart -->
<?php include_once('footer.php'); ?>