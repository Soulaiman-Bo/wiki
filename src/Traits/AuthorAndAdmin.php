<?php

namespace App\Traits;


trait AuthorAndAdmin
{
    private function AuthorAndAdmin()
    {
        if ($_SESSION['user_role'] === 1 || $_SESSION['user_role'] === 2) {
            return true;
        } else {
            header('location: /');
            exit();
        }  
    }
}
