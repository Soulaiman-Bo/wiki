<?php

namespace App\Controllers;

use App\classes\Controller;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function createCtaegory()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data = [
                'name' => $_POST['categoryname']
            ];

            $categoryModel = new CategoryModel();
            $result = $categoryModel->insertCategory($data);

            if ($result) {
                $categoryModel->closeConnection();
                http_response_code(200);
                echo json_encode([
                    "message" => "Category Inserted Successfully",
                    "id" => $result
                ]);
            } else {
                $categoryModel->closeConnection();
                http_response_code(400);
                echo json_encode([
                    "message" => "Category faild to insert",
                ]);
            }
        }
    }

    public function getAllCtaegories()
    {
        $categoryModel = new CategoryModel();
        $result = $categoryModel->selectAllCategories();

        http_response_code(200);
        echo json_encode($result);
    }

    public function deleteCtaegory()
    {


        $id = $_GET['id'];

        try {
            $categoryModel = new CategoryModel();
            $categoryModel->deleteCtaegory($id);

            http_response_code(200);
            echo json_encode(['message' => 'Deleted Successfully']);
        } catch (\Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' => 'Faild to Delete']);
        }
    }

    public function updateCtagory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $name = $_POST['categoryname'];
            $id = $_POST['id'];


            $categortModel = new CategoryModel();
            $result = $categortModel->updateCategory($id, $name);

            if ($result) {
                $categortModel->closeConnection();
                http_response_code(200);
                echo json_encode([
                    "message" => "Category Updated Successfully",
                    "id" => $result
                ]);
            } else {
                http_response_code(400);
                echo json_encode([
                    "message" => "Category faild to update",
                ]);
            }
        }
    }

    public function getOneCategoryById()
    {
        $id = $_GET['id'];

        $CategoryModel = new CategoryModel();
        $result = $CategoryModel->getCategoryById($id);

        http_response_code(200);
        echo json_encode($result);
    }
}
