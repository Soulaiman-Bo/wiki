<?php

namespace App\Controllers;

use App\classes\Controller;


class FrontOfficeControoler extends Controller
{
    public function home()
    {
        $this->render('home');
    }

    public function article()
    {
        $this->render('article');
    }
}



function isloggedin()
{
    if (isset($_SESSION['user_email'])) {
        return true;
    } else {
        http_response_code(403);
        echo json_encode(["message" => "Not Loged In"]);
        exit;
    }
}
