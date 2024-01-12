<?php

namespace App\Controllers;

use App\classes\Controller;


class BackOfficeControoler extends Controller
{
    public function index()
    {
        $this->render('dashboard');
    }
    public function createwiki()
    {
        $this->render('createwiki');
    }
    public function showWikies()
    {
        $this->render('showWikies');
    }
    public function showtags()
    {
        $this->render('tags');
    }
    public function showcategories()
    {
        $this->render('categories');
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
