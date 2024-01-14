<?php

namespace App\Traits;


trait AuthHelpers
{
    public function unsetSesion()
    {
        session_unset();
        session_destroy();
    }



    public function hashPassword($password)
    {
        $options = ['cost' => 5];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        return $hashedPassword;
    }

    public function verifyPassword($enteredPassword, $hashedPassword)
    {
        return password_verify($enteredPassword, $hashedPassword);
    }

    public function isloggedin()
    {
        if (isset($_SESSION['user_email'])) {
            return true;
        } else {
            http_response_code(403);
            echo json_encode(["message" => "Not Loged In"]);
            exit;
        }
    }
}
