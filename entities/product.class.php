<?php //IDEA
require_once("/xampp/htdocs/shopmobies/config/db.class.php");

class Product
{
    //public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public $promotion_ID ;
    public $trademarkID;
    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture,$promotion_ID,$trademark_ID)
    {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
        $this->promotion_ID = $promotion_ID;
        $this->trademarkID = $trademark_ID;
    }

    // Luưu sản phẩm
    public function save()
    {
        //xử Lý upload hinhentT
        $file_temp = $this->picture['tmp_name'];
        $user_file = $this->picture['name'];
        $timestamp = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");
        $filepath = "upload/" . $timestamp . $user_file;
        
        if (move_uploaded_file($file_temp, "upload/" . $user_file))
            echo "File is valid, and was successfully uploaded!";
        else
            echo "Possible file upload attack!";
        //end upload
        

        $db = new Db();
        $pictureimg = $this->picture['name'];
        
        $sql = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture, PromotionID, TrademarkID) VALUES('".$this->productName."', '".$this->cateID."','".$this->price."','".$this->quantity."','".$this->description."','".$pictureimg."','".$this->promotion_ID."','".$this->trademarkID."')";
        //$query = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture, PromotionID, TrademarkID) VALUES(?,?,?,?,?,?,?,?)";
        $result = $db->query_execute($sql); 
        //$result = $db->query_execute_statement($query,$this->productName,$this->cateID,$this->price,$this->quantity,$this->description,$pictureimg,$this->promotionID,$this->trademarkID);
        return $result;
    }
    public static function list_product()
    {
        $db = new Db();
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function list_product_name()
    {
        $db = new Db();
        $sql = "SELECT a.ProductID, a.ProductName, b.CategoryName, a.Price, a.Quantity, a.Description, a.Picture, d.TrademarkName, c.value FROM product a, category b, promotion c, trademark d WHERE a.CateID =b.CateID and a.TrademarkID = d.TrademarkID and a.PromotionID = c.PromotionID";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function list_product_by_cateid($cateid)
    {
        $db = new Db();
        $sql = "SELECT a.ProductID, a.ProductName, b.CategoryName, a.Price, a.Quantity, a.Description, a.Picture, d.TrademarkName, c.value FROM product a, category b, promotion c, trademark d WHERE a.CateID =b.CateID and a.TrademarkID = d.TrademarkID and a.PromotionID = c.PromotionID and a.CateId='$cateid'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function list_product_by_trademark($trademarkid)
    {
        $db = new Db();
        $sql = "SELECT a.ProductID, a.ProductName, b.CategoryName, a.Price, a.Quantity, a.Description, a.Picture, d.TrademarkName, c.value FROM product a, category b, promotion c, trademark d WHERE a.CateID =b.CateID and a.TrademarkID = d.TrademarkID and a.PromotionID = c.PromotionID and d.TrademarkID='$trademarkid'";
        //$sql = "SELECT * FROM product where TrademarkID ='$trademarkid'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    //Lấy danh sách sản phẩm cùng Loại khac
    public static function list_product_relate($cateid, $id)
    {
        $db = new Db();
        $sql = "SELECT * FROM product WHERE CateID='$cateid' AND ProductID!='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function get_product($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM product WHERE productID='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function get_product_name($id)
    {
        $db = new Db();
        $sql = "SELECT a.ProductID, a.ProductName, b.CategoryName, a.Price, a.Quantity, a.Description, a.Picture, d.TrademarkName, c.VALUE FROM product a, category b, promotion c, trademark d WHERE ProductID = '$id' and a.CateID =b.CateID and a.TrademarkID = d.TrademarkID and a.PromotionID = c.PromotionID;";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function delete_product($productId)
    {
        $db = new Db();
        $sql = "DELETE FROM product WHERE productID='$productId'";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function update_product($productId,$pro_name, $cate_id, $price, $quantity, $desc, $picture,$promotion_ID,$trademark_ID)
    {
        $db = new Db();
        $sql = "UPDATE product
                SET ProductName= $pro_name , CateID= $cate_id , Price= $price , Quantity= $quantity , Description= $desc , Picture= $picture , PromotionID= $promotion_ID , TrademarkID = $trademark_ID
                WHERE productID='$productId'";
        $result = $db->query_execute($sql);
        return $result;
    }

}