<?php
require_once("/xampp/htdocs/Shopmobies/config/db.class.php");
class Category
{
    public $cateID;
    public $categoryName;
    public $description;

    public function __construct($cate_name, $desc)
    {
        $this->categoryName = $cate_name;
        $this->description =$desc;
    
    }
    public static function list_category(){
        $db = new Db();
        $sql = "SELECT * FROM category";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>