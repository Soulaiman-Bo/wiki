<?php

namespace App\Controllers;

use App\classes\Controller;
use App\Models\UserModel;
use App\Models\WikiModel;


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
        $wikimodel = new WikiModel();
        if (isAdmin()) {
            $wikies = $wikimodel->getAllWikies();
            $count = $wikimodel->countwikies();
            $this->render('showWikies', ['wikies' => $wikies, 'count' => $count]);
        } else {
            $id =  $_SESSION['user_id'];
            $wikies = $wikimodel->getAllWikiesByUserId($id);
            $this->render('showWikiesAuthor', ['wikies' => $wikies]);
        }
        $wikimodel->closeConnection();
    }
    public function showusers()
    {
        $usermodel = new UserModel();
        $users = $usermodel->GetAllUsers();

        $this->render('users', ['users' => $users]);
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

function isAdmin()
{
    if ($_SESSION['user_role'] === 1) {
        return true;
    } else {
        return false;
    }
}
