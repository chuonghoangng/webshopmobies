<?php
require_once("/xampp/htdocs/Shopmobies/config/db.class.php");
class Permission
{
    public $permissionID;
    public $permissionName;
    public $description;

    public function __construct($permission_name, $desc)
    {
        $this->permissionName = $permission_name;
        $this->description =$desc;
    
    }
    public static function list_category(){
        $db = new Db();
        $sql = "SELECT * FROM permission";
        $result = $db->select_to_array($sql);
        return $result;
    }
}
?>