<?php

namespace App\Controllers;

use App\classes\Controller;
use App\classes\Validation;
use App\classes\ValidationException;
use App\Models\CategoryModel;

class CategoryController extends Controller
{

    public function createCtaegory()
    {
        checkAdminStatusApi();

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
        checkAdminStatusApi();

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
        if (checkAdminStatusApi()) {
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
        } else {
            $this->render('404');
        }
    }
}



function checkAdminStatusApi()
{
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] === 1) {
            return true;
        } else {
            http_response_code(403);
            echo json_encode(["message" => "This route for Admin only"]);
            exit;
        }
    } else {
        http_response_code(403);
        echo json_encode(["message" => "Not Loged In"]);
        exit;
    }
}
