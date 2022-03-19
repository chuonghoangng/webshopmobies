<?php
require_once("/xampp/htdocs/Shopmobies/config/db.class.php");
class Trademark
{
    public $trademarkID;
    public $trademarkName;
    public $description;

    public function __construct($trademark_name, $desc)
    {
        $this->trademarkName = $trademark_name;
        $this->description =$desc;
    
    }
    public static function list_trademark(){
        $db = new Db();
        $sql = "SELECT * FROM trademark";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>