<?php //IDEA
require_once("/xampp/htdocs/LAB03/config/db.class.php");

class Orderproduct
{
    public $orderID;
    public $orderDate;
    public $shipDate;
    public $shipName;
    public $shipAddress;
    public $userID;

    public function __construct($orderDate, $shipDate, $shipName, $shipAddress, $userID)
    {
        $this->orderDate = $orderDate;
        $this->shipDate = $shipDate;
        $this->shipName = $shipName;
        $this->shipAddress = $shipAddress;
        $this->userID = $userID;
    }

    

    // Luưu sản phẩm
    public function save()
    {
        $db = new Db();
        $query = "INSERT INTO orderproduct (OrderDate, ShipDate, ShipName, ShipAddress, UserID) VALUES('" . $this->orderDate . "', '" . $this->shipDate . "','" . $this->shipName . "','" . $this->shipAddress . "','" . $this->userID . "')";
        $result = $db->query_execute($query);
        return $result;
    }
    public static function list_orderproduct()
    {
        $db = new Db();
        $sql = "SELECT * FROM orderproduct";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function list_product_by_userid($userid)
    {
        $db = new Db();
        $sql = "SELECT * FROM orderproduct where UserId='$userid'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    
    public static function get_product($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM orderproduct WHERE OrderID='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }

}