<?php

namespace App\Controllers;

use App\classes\Controller;
use App\Models\CategoryModel;
use App\Models\StatsModel;
use App\Models\TagModel;
use App\Models\UserModel;
use App\Models\WikiModel;


class BackOfficeControoler extends Controller
{
    public function index()
    {
        $statsModel = new StatsModel();
        $categories = $statsModel->numberofCategories();
        $users = $statsModel->numberofusers();
        $wiki = $statsModel->numberofwikies();
        $topusers = $statsModel->topUsers();
        $toptags = $statsModel->topTags();

        $this->render('dashboard', ['toptags' => $toptags ,'categories' => $categories, 'users' => $users, 'wiki' => $wiki, 'topUsers' => $topusers]);
    }
    public function createwiki()
    {

        $categories = new CategoryModel();
        $categories =  $categories->selectAllCategories();


        $this->render('createwiki', ['categories' => $categories]);
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

    public function deleteuser()
    {
        $id = $_GET['id'];

        $usermodel = new UserModel();
        $users = $usermodel->deleteUser($id);


        header('location: /dashboard/users');
    }


    public function showtags()
    {
        $usermodel = new TagModel();
        $tags = $usermodel->selectAllTags();

        $this->render('tags', ['tags' => $tags]);
    }

    public function showcategories()
    {
        $categorymodel = new CategoryModel();
        $categories = $categorymodel->selectAllCategories();

        $this->render('categories', ['categories' => $categories]);
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
