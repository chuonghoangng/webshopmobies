<?php // IDEA:

class DB
{
    //biến kết noi CSOL
    protected static $connection;
    // hàm khở i tọo kết nối
    public function connnect()
    {
        if(!isset(self::$connection)){
            //Lấy thông tin kết nối từ tập tin config.ini
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);
          }
          //Xử lý looix nếu không kết nối được tới CSDL
          if(self::$connection==false){
            //Xử lý ghi file tại đây // your todo advanced
            return false;
          }
          return self::$connection;
    }
    public function query_execute($queryString)
    {
        $connection = $this->connnect();
        $connection->query("SET NAMES utf8");

        $result = $connection->query($queryString);
        return $result;

    }
    public function query_execute_statement($queryString,$productName,$cateID,$price,$quantity,$description,$pictureimg,$promotin,$trademark)
    {
        $connection = $this->connnect();
        $connection->query("SET NAMES utf8");

        $stmt = $connection->prepare($queryString);
        $result=$stmt -> bind_param("sidissii", $productName,$cateID,$price,$quantity,$description,$pictureimg,$promotin,$trademark);
        
        //$connection->close();
        return $result;

    }
    public function select_to_array($queryString)
    {
       
        $rows = array();
        $result = $this->query_execute($queryString);
        if($result==false) return false;
        while($item = $result->fetch_assoc()){
        $rows[] = $item;
        }
        return $rows;
        
    }
}
