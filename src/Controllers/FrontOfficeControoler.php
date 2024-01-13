<?php

namespace App\Controllers;

use App\classes\Controller;
use App\Models\CategoryModel;
use App\Models\TagModel;
use App\Models\WikiModel;

class FrontOfficeControoler extends Controller
{
    public function home()
    {

        $wikimodel = new WikiModel();
        $wikies = $wikimodel->getAllWikies();
        // var_dump( $wikies);
        // exit;
        $this->render('home', ['wikies'=> $wikies]);

    }

    public function article()
    {
        $this->render('article');
    }
    public function search()
    {
        $tags = new TagModel();
        $tags = $tags->selectAllTags();

        $categories = new CategoryModel();
        $categories =  $categories->selectAllCategories();

        $wikimodel = new WikiModel();
        $wikies = $wikimodel->getAllWikies();
        

        $this->render('search', ['wikies'=> $wikies, 'tags' => $tags, 'categories' => $categories]);
    }

    public function searchbyTag()
    {
        // $tag = $_GET['tag'];

        // $tagModel = new TagModel();
        // $wikies =  $tagModel->selectWikiesByTag($tag);

        // $this->render('search', ['tags' => $tags, 'categories' => $categories]);
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
