<?php
require_once "../config/db.php";
require_once "../model/user.class.php";
require_once "user-api.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// header("Access-Control-Allow-Methods: POST");


if ($_GET['endpoint']) {
    $endpoint = $_GET['endpoint'];
    $method = $_SERVER['REQUEST_METHOD'];

    if ($endpoint == 'users' && $method == "GET") {
        getUsers();
    } elseif ($endpoint == "user-create" && $method == "POST") {
        echo "<h1>User Created</h1>";
    } elseif ($endpoint == "user-update" && $method == "PUT") {
        echo "<h1>User Updated</h1>";
    } elseif ($endpoint == "user-delete" && $method == "DELETE") {
        echo "<h1>User Deleted</h1>";
    } elseif ($endpoint == "user-details" && $method == "GET") {
        $id = $_GET['id'];
        getUserById($id);
    } else {
        http_response_code(404);
    }
} else {
    http_response_code(404);
    echo "<h2>No endpoint found</h2>";
}
