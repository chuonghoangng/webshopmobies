<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="site.css" rel="stylesheet" type="" media="all" />
  <title>Project training - website bán hàng</title>
</head>
<body>
  
</body>
</html>
<?php
//require_once("/entities/product.class.php");
require_once("/xampp/htdocs/Shopmobies/entities/product.class.php");
require_once("/xampp/htdocs/Shopmobies/entities/category.class.php");
require_once("/xampp/htdocs/Shopmobies/entities/trademark.class.php");
require_once("/xampp/htdocs/Shopmobies/entities/promotion.class.php");
if (isset($_POST["btnsubmit"])) {
    //Lay gid trị từ form coLlection
    $productName = $_POST["txtName"];
    $cateID = $_POST["txtCateID"];
    $price = $_POST["txtprice"];
    $quantity = $_POST["txtquantity"];
    $description = $_POST["txtdesc"];
    $picture = $_FILES["txtpic"];
    $tradeID = $_POST["txtTrademarkID"];
    $pro_ID =$_POST["txtpro"];
    
    //khởi tạo đốt tượng 
    $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture,$pro_ID,$tradeID);
    //$newProduct ->_construct();
    
    $result = $newProduct->save();
    
    if (!$result) {
        //truy văn Lốt
        header("Location: add_product.php?failure");
    } else {
        header("Location: add_product.php?inserted");
        
    }
    
    
    
}
?>
<?php include_once("header.php"); ?>


<form method="post" enctype="multipart/form-data">
  <!-- Tên sốn phẩm -->
  <div class="row">
    <div class="lbltitle">
      <label><b>Tên sản phẩm</b> </label>
    </div>
    <div class="lblinput">
    <input type="text" name="txtName" value="<?php echo isset ($_POST ["txtName"]) ? $_POST["txtName"] :""; ?>"></input>
    </div>
  </div>
  <!-- mở tổ són phẩm -->
  <div class="row">
    <div class="lbltitle">
      <label><b>Mô tả sản phẩm</b></label>
    </div>
    <div class="lblinput">
      <input type="text" name="txtdesc" cols="21" rows="10" value="<?php echo isset ($_POST ["txtdesc"]) ? $_POST["txtdesc"] :""; ?>"></input>
    </div>
  </div>
  <!-- số Lượng sản phẩm -->
  <div class="row">
    <div class="lbltitle">
      <label><b>Số lượng sản phẩm</b></label>
    </div>
    <div class="lblinput">
      <input type="number" name="txtquantity"  value="<?php echo isset ($_POST ["txtquantity"]) ? $_POST["txtquantity"] :""; ?>"></input>
    </div>
  </div>
  <!-- gió sản phẩm -->
  <div class="row">
    <div class="lbltitle">
      <label><b>Giá sản phẩm</b></label>
    </div>
    <div class="lblinput">
      <input type="number" name="txtprice"  value="<?php echo isset ($_POST ["txtprice"]) ? $_POST["txtprice"] :""; ?>"></input>
    </div>
  </div>
  <!-- Loai sản phẩm-->
  <!-- <div class="row">
    <div class="lbltitle">
      <label> Loại sản phẩm</label>
    </div>
    <div class="lblinput">
      <textarea name="txtCateID"  value="<?php echo isset ($_POST ["txtCateID"]) ? $_POST["txtCateID"] :""; ?>"></textarea>
    </div>
  </div> -->
<div class="row">
 <div class="lbltitle">
   <label><b>Chọn loại sản phẩm</b></label>
 </div>
 <div class="lblinput">
   <select name="txtCateID">
    <option value="" selected>--Chọn Loại--</option>
       <?php
       $cates =Category::list_category();
       foreach ($cates as $item) {
        echo "<option value=".$item["CateID"].">".$item["CategoryName"]."</option>";
       }
    ?>
   </select>
 </div>
</div>
<div class="row">
 <div class="lbltitle">
   <label><b>Chọn loại loại khuyến mãi</b></label>
 </div>
 <div class="lblinput">
   <select name="txtpro">
    <option value="" selected>--Chọn Loại--</option>
       <?php
       $promi =Promotion::list_promotion();
       foreach ($promi as $item) {
        echo "<option value=".$item["PromotionID"].">".$item["Description"]."</option>";
       }
    ?>
   </select>
 </div>
</div>

<div class="row">
 <div class="lbltitle">
   <label><b>Chọn loại thương hiệu</b></label>
 </div>
 <div class="lblinput">
   <select name="txtTrademarkID">
    <option value="" selected>--Chọn Loại--</option>
       <?php
       $trande =Trademark::list_trademark();
       foreach ($trande as $item) {
        echo "<option value=".$item["TrademarkID"].">".$item["TrademarkName"]."</option>";
       }
    ?>
   </select>
 </div>
</div>

  <!-- hình ảnh -->
  <div class="row">
    <div class="lbltitle">
      <label><b>Hình ảnh sản phẩm</b></label>
    </div>
    <div class="lblinput">
      <input type="file" id="txtpic" name="txtpic" accept=".PNG,.GIF,.JPG">
    </div>
  </div>
 <!-- Not giri form -->
  <div class="row">
    <div class="submit">
      <button type="submit" name="btnsubmit" >Thêm sản phẩm</button> 
    </div>
  </div>
</form>
<?php
if (isset($_GET["inserted"])) {
    echo "<h1>Thêm sản phẩm thành công</h2>";
}
?>
<?php include_once("footer.php"); ?>