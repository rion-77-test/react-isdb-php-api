<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// Handle browser preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

require_once "../config/db.php";
require_once "../helpers/img-upload-helper.php";
// require_once "../model/user.class.php";
foreach(glob("../model/*.class.php") as $modalfile) {
    require_once $modalfile;
}
// require_once "user-api.php";
// require_once "role-api.php";
foreach(glob("*-api.php") as $apifile) {
    require_once $apifile;
}

if ($_GET['endpoint']) {
    $endpoint = $_GET['endpoint'];
    $method = $_SERVER['REQUEST_METHOD'];

    // if($endpoint == "test" && $method == "GET") {
    //     echo "API Working";
    // }
    // else if($endpoint == "test" && $method == "POST") {
    //     echo "POST API Working";
    // }else{
    //     http_response_code(404);
    //     echo "No endpoint found!";
    // }

    if ($endpoint == "users" && $method == "GET") {
        // echo "<h2>Users</h2>";
        getUsers();
    } elseif ($endpoint == "user-create" && $method == "POST") {
        $data = json_decode(file_get_contents("php://input"),true);
        // print_r($data);
        // $data = [
        //     "name"      => "Shafi",
        //     "email"     => "LX9QY@example.com",
        //     "role_id"   => 2,
        //     "password"  => "123"
        // ];
        addNew($data);
    } elseif ($endpoint == "user-update" && $method == "PUT") {
        $data = json_decode(file_get_contents("php://input"), true);
        updateUser($data);
    } elseif ($endpoint == "user-delete" && $method == "DELETE") {
        $id = $_GET['id'];
        deleteUser($id);
    } elseif ($endpoint == "user-details" && $method == "GET") {
        // $id = 15;    // static
        $id = $_GET['id'];
        getUserById($id);
    } elseif ($endpoint == "roles" && $method == "GET") {
        getRoles();
    } elseif ($endpoint == "categories" && $method == "GET") {
        getCategories();
    } elseif ($endpoint == "brands" && $method == "GET") {
        getBrands();
    } elseif ($endpoint == "products" && $method == "GET") {
        getProducts();
    } elseif ($endpoint == "product-create" && $method == "POST") {
        // echo json_encode($_POST);
        // exit;
        // print_r($_POST);
        // print_r($_FILES);
        createProduct($_POST, $_FILES);
    } else {
        http_response_code(404);
    }
} else {
    http_response_code(404);
    echo "<h2>No endpoint found!</h2>";
}
