<?php
if($_GET['endpoint']) {
    $endpoint = $_GET['endpoint'];
    $method = $_SERVER['REQUEST_METHOD'];
    echo $method;

    if($endpoint == 'users' && $method == "GET") {
        echo "<h1>User List</h1>";
    }elseif($endpoint == "user-create" && $method == "POST") {
        echo "<h1>User Created</h1>";
    } elseif($endpoint == "user-update" && $method == "PUT") {
        echo "<h1>User Updated</h1>";
    } elseif($endpoint == "user-delete" && $method == "DELETE") {
        echo "<h1>User Deleted</h1>";
    } elseif($endpoint == "user-details" && $method == "GET") {
        echo "<h1>User Details</h1>";
    }

} else {
    echo "<h2>No endpoint found</h2>";  
}
?>
<h1>API/APi.php</h1>