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
        $wikies = $wikimodel->getAllWikiesForTheWeb();
        $this->render('home', ['wikies' => $wikies]);
    }

    public function article()
    {
        $id = $_GET['id'];
        
        $wikimodel = new WikiModel();
        $wikies = $wikimodel->getSinglewiki($id);

        $wikimodel = new TagModel();
        $tags = $wikimodel->selectTagsByWiki($id);

        $this->render('article', ['wiki' => $wikies, 'tags'=> $tags] );
    }
    public function search()
    {
        $tags = new TagModel();
        $tags = $tags->selectAllTags();

        $categories = new CategoryModel();
        $categories =  $categories->selectAllCategories();

        $wikimodel = new WikiModel();
        $wikies = $wikimodel->getAllWikiesForTheWeb();

        $this->render('search', ['wikies' => $wikies, 'tags' => $tags, 'categories' => $categories]);
    }

    public function searchbyTag()
    {
        $tag = $_GET['tag'];

        $tags = new TagModel();
        $tags = $tags->selectAllTags();

        $categories = new CategoryModel();
        $categories =  $categories->selectAllCategories();

        $tagModel = new TagModel();
        $wikies =  $tagModel->selectWikiesByTag($tag);

        $this->render('search', ['wikies' => $wikies, 'tags' => $tags, 'categories' => $categories]);
    }

    public function searchbyCat()
    {
        $id = $_GET['id'];

        $tags = new TagModel();
        $tags = $tags->selectAllTags();

        $categoryModel = new CategoryModel();
        $categories =  $categoryModel->selectAllCategories();
        $wikies =  $categoryModel->selectWikiesByCategory($id);

        $this->render('search', ['wikies' => $wikies, 'tags' => $tags, 'categories' => $categories]);
    }
}

