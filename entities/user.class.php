<?php // IDE
require_once("config/db.class.php");
class User{
    public $userId;
    public $userName;
    public $password;
    public $address;
    public $email;    
    public $number;
    public $permissionID;

    public function __construct($u_name,$u_email,$u_pass,$u_address,$u_number,$u_permission){
        $this->userName = $u_name;
        $this->email=$u_email;
        $this->password=$u_pass;
        $this->address = $u_address;
        $this->number=$u_number;
        $this->permissionID=$u_permission;
    }
    
    
    public function save(){
        $db=new Db();
        $x_user=mysqli_real_escape_string($db->connnect(),$this->userName);
        $x_email=mysqli_real_escape_string($db->connnect(),$this->email);
        $x_pass= md5(mysqli_real_escape_string($db->connnect(), $this->password));
        $x_address=mysqli_real_escape_string($db->connnect(),$this->address);
        $x_number=mysqli_real_escape_string($db->connnect(),$this->number);
        $x_permissionID=mysqli_real_escape_string($db->connnect(),$this->permissionID);
        $sql = "INSERT INTO users (UserName, Email, PassWord, Address, Number, PermissionID) VALUES ('".$x_user."','".$x_email."','".$x_pass."','".$x_address."','".$x_number."','".$x_permissionID."')";

        $result = $db->query_execute($sql);
        return $result;
    }
    public static function checkLogin ($username, $password){
        $password = md5($password);
        $db = new Db();
        $sql = "SELECT * FROM users where UserName ='$username' and PassWord = '$password'";
        $result = $db->select_to_array($sql);
        return $result;
    }
    
}


?>