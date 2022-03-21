<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web shop mobies</title>
</head>

<body>
    <h1> Web shop mobies</h1>
    <?php
    include_once("header.php");
    require_once("/xampp/htdocs/ShopMobies/entities/category.class.php");
    //$prods = Product::list_product ();
    ?>
    <?php include_once("header.php"); ?>
    <ul class="menu">
        <li>
            <a href="/lab03/list_product.php"> Danh sách sản phẩm</a>
        </li>
        
    </ul>
    <?php

    $cates = Category::list_category();

    foreach ($cates as $item) {
        echo "<li class ='list-group-item'><a
            href=/ShopMobies/list_product.php?cateid=" . $item["CateID"] . ">" . $item["CategoryName"] . "</a></li>";
    }
    ?>
    <?php include_once("footer.php"); ?>


    

</body>

</html>