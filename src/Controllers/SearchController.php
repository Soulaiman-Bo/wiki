<?php

namespace App\Controllers;

use App\Models\WikiModel;
use App\classes\Controller;
use App\Models\CategoryModel;
use App\Models\TagModel;

class SearchController extends Controller {

    public function searchforTags(){
        $param = $_GET['query'];

        $tagModel = new TagModel();
        $result =  $tagModel->searchforTag($param);

        echo json_encode($result);

    }

    public function searchforWikies(){
        $param = $_GET['query'];

        $wikimodel = new WikiModel();
        $result =  $wikimodel->searchforWiki($param);

        echo json_encode($result);

    }

    public function getwikisbyTag(){

        $tag = $_GET['tag'];

        $tagModel = new TagModel();
        $result =  $tagModel->selectWikiesByTag($tag);

        echo json_encode($result);
    }
    public function getwikisbyCategory(){

        $tag = $_GET['category'];

        $categorymodel = new CategoryModel();
        $result =  $categorymodel->selectWikiesByCategory($tag);

        echo json_encode($result);
    }
}