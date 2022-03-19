<?php //IDEA
require_once("/xampp/htdocs/LAB03/config/db.class.php");

class Product
{
    //public $productID;
    public $productName;
    public $cateID;
    public $price;
    public $quantity;
    public $description;
    public $picture;

    public $promotionID ;
    public $trademarkID;
    public function __construct($pro_name, $cate_id, $price, $quantity, $desc, $picture,$promotion_ID,$trademark_ID)
    {
        $this->productName = $pro_name;
        $this->cateID = $cate_id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->description = $desc;
        $this->picture = $picture;
        $this->promotionID = $promotion_ID;
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
        // if(move_uploaded_file($file_temp, $filepath)==false)
        // {
        // return false;
        // }
        if (move_uploaded_file($file_temp, "upload/" . $user_file))
            echo "File is valid, and was successfully uploaded!";
        else
            echo "Possible file upload attack!";
        //end upload


        $db = new Db();
        $pictureimg = $this->picture['name'];
        $query = "INSERT INTO product (ProductName, CateID, Price, Quantity, Description, Picture, PromotionID, TrademarkID ) VALUES('" . $this->productName . "', '" . $this->cateID . "','" . $this->price . "','" . $this->quantity . "','" . $this->description . "','" . $pictureimg . "','" . $this->promotionID . "','" . $this->trademarkID . "')";
        //$query = "INSERT INTO". 'product( ProductName, CateID, Price, Quantity, Description, Picture) VALUES'.' ('.$this->getProductName().', '.$this->getCateID().','.$this-> getPrice().','.$this-> getQuantity().','.$this->getDescription().','.$this->getPicture().')';
        echo $query;

        $result = $db->query_execute($query);
        return $result;
    }
    public static function list_product()
    {
        $db = new Db();
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function list_product_by_cateid($cateid)
    {
        $db = new Db();
        $sql = "SELECT * FROM product where CateId='$cateid'";
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

}