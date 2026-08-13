<?php
class User
{
    public $id;
    public $name;
    public $email;
    public $role_id;
    private $password;

    public function __construct($id, $name, $email, $role_id, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->role_id = $role_id;
        $this->password = $password;
    }

    public static function getAll()
    {
        global $db;
        $query = "SELECT u.id, u.name, u.email, u.role_id, r.name AS role 
        FROM users u, roles r 
        WHERE u.role_id = r.id ORDER BY id DESC";
        $result = $db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public static function getById($id)
    {
        global $db;
        $query = "SELECT u.id, u.name, u.email, u.role_id, r.name AS role 
        FROM users u, roles r 
        WHERE u.role_id = r.id AND u.id = $id";
        $result = $db->query($query);
        return $result->fetch_assoc();
    }
}
