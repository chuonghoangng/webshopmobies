<?php
require_once("/xampp/htdocs/Shopmobies/config/db.class.php");
class Promotion
{
    public $promotionID ;
    public $value;
    public $description;

    public function __construct($desc,$value_1)
    {
        $this->value = $value_1;
        $this->description =$desc;
    
    }
    public static function list_promotion(){
        $db = new Db();
        $sql = "SELECT * FROM promotion";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>