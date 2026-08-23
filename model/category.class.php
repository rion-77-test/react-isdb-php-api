<?php
class Category{
    public $id;
    public $name;
    public function __construct($_id, $_name){
        $this->id = $_id;
        $this->name = $_name;
    }
    public static function getAll(){
        global $db;
        $sql = "SELECT * FROM categories";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);   
    }
}
?>