<?php

namespace App\Traits;


trait IsAdmin
{
    private function adminOnly()
    {
        if ($_SESSION['user_role'] === 1) {
            return true;
        } else {
            header('location: /');
            exit();
        }  
    }
}
