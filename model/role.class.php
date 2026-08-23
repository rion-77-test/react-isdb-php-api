<?php
class Role{
    public $id;
    public $name;
    public function __construct($_id, $_name){
        $this->id = $_id;
        $this->name = $_name;
    }
    public static function getAll(){
        global $db;
        $sql = "SELECT * FROM roles";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);   
    }
}
?>