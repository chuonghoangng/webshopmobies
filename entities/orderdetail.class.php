<?php //IDEA
require_once("/xampp/htdocs/Shopmobies/config/db.class.php");

class Orderproduct
{
    protected $orderID;
    protected $productID;
    protected $quantity;

    public function __construct($orderID, $productID, $quantity)
    {
        $this->orderID = $orderID;
        $this->productID = $productID;
        $this->quantity = $quantity;
    }

    // Lưu sản phẩm
    public function save()
    {
        $db = new Db();
        $query = "INSERT INTO orderdetail (OrderID, ProductID, Quantity) VALUES('" . $this->orderID . "', '" . $this->productID . "','" . $this->productID . "')";
        $result = $db->query_execute($query);
        return $result;
    }
    //lấy danh sách chi tiết order detail
    public static function list_orderdetail()
    {
        $db = new Db();
        $sql = "SELECT * FROM orderdetail";
        $result = $db->select_to_array($sql);
        return $result;
    }
    //lấy danh sách chi tiết order detail bằng orderId
    public static function list_orderdetail_by_OrderID($userid)
    {
        $db = new Db();
        $sql = "SELECT * FROM orderdetail where OrderID='$userid'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    //lấy chi tiết hóa đơn cụ thể bằng order id và product id
    public static function get_orderdetail($orderId,$productId)
    {
        $db = new Db();
        $sql = "SELECT * FROM orderdetail WHERE OrderID='$orderId' and ProductID = '$productId'";
        $result = $db->select_to_array($sql);
        return $result;
    }

}