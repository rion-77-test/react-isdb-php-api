<?php

class Auth
{
    public static function login($_email, $_password)
    {
        global $db;
        // $sql = "SELECT * FROM users WHERE email = $_email AND password = $_password";
        $sql = "SELECT * FROM users WHERE email = '$_email'";
        $result = $db->query($sql);

        if ($result) {
            $user = $result->fetch_assoc();
            if ($user) {
                if (password_verify($_password, $user["password"])) {
                    http_response_code(200);
                    return [
                        "token" => generateJWT($user),
                        "user" => $user
                    ];
                } else {
                    http_response_code(401);
                    return "Invalid Password";
                }
            } else {
                http_response_code(401);
                return "User not found";
            }
        } else {
            $db->error;
        }

        // ----------Alternate query---------
        // $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        // $stmt = $db->prepare($query);
        // $stmt->execute([
        //     ':email' => $_email,
        //     ':password' => $_password
        // ]);
        // return $stmt->fetch();
    }
}
