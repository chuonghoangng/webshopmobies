<?php // IDE
require_once("config/db.class.php");
class Comment{
    protected $CommentID;
    protected $ProductID;
    protected $Commentator;
    protected $Content;
    protected $Datatime;
    

    public function __construct($ProductID,$Commentator,$Content,$Datatime)
    {
        
        $this->ProductID = $ProductID;
        $this->Commentator = $Commentator;
        $this->Content = $Content;
        $this->Datatime = $Datatime;
    }

    public function save()
    {
        $db = new Db();
        $query = "INSERT INTO comment (ProductID, Commentator, Content, Datatime ) VALUES('" . $this->ProductID . "', '" . $this->Commentator . "','" . $this->Content . "','" . $this->Datatime . "')";
        $result = $db->query_execute($query);
        return $result;
    }
    public static function list_comment()
    {
        $db = new Db();
        $sql = "SELECT * FROM product";
        $result = $db->select_to_array($sql);
        return $result;
    }
    public static function list_comment_by_productid($productid)
    {
        $db = new Db();
        $sql = "SELECT * FROM comment where ProductId='$productid'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    
    public static function get_comment($id)
    {
        $db = new Db();
        $sql = "SELECT * FROM comment WHERE CommentID='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    

    
    

    

    
    
    
}


?>