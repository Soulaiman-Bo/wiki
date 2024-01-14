<?php 

namespace App\Traits;


trait IsAuthor {
    private function authorOnly() {
        if ($_SESSION['user_role'] === 1) {
            return true;
        } else {
            header('location: /');
            exit();
        }  
    }
}