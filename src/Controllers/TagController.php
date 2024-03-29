<?php

namespace App\Controllers;

use App\classes\Controller;
use App\Models\TagModel;

class TagController extends Controller
{
    public function createTag()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'name' => $_POST['tagname']
            ];

            $TagModel = new TagModel();
            $result = $TagModel->insertTag($data);

            if ($result) {

                $TagModel->closeConnection();
                http_response_code(200);
                echo json_encode([
                    "message" => "Tag Inserted Successfully",
                    "id" => $result
                ]);
            } else {
                // $TagModel->closeConnection();
                // echo "404 ERROR";
                // exit;
                // header('location: /dashboard/tags');

                http_response_code(400);
                echo json_encode([
                    "message" => "Tag faild to insert",
                ]);
            }
        }
    }
    public function getAllTags()
    {
        $TagModel = new TagModel();
        $result = $TagModel->selectAllTags();

        http_response_code(200);
        echo json_encode($result);
    }

    public function getOneTagById()
    {
        $id = $_GET['id'];

        $TagModel = new TagModel();
        $result = $TagModel->getTagById($id);

        http_response_code(200);
        echo json_encode($result);
    }

    public function deleteTag()
    {
        $id = $_GET['id'];

        try {
            $TagModel = new TagModel();
            $TagModel->deleteTag($id);

            http_response_code(200);
            echo json_encode(['message' => 'Deleted Successfully']);
        } catch (\Throwable $th) {
            http_response_code(400);
            echo json_encode(['message' => 'Faild to Delete']);
        }
    }

    public function updateTag()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $name = $_POST['tagname'];
            $id = $_POST['id'];


            $TagModel = new TagModel();
            $result = $TagModel->updateTag($id, $name);

            if ($result) {
                $TagModel->closeConnection();
                http_response_code(200);
                echo json_encode([
                    "message" => "Tag Updated Successfully",
                    "id" => $result
                ]);
            } else {
                http_response_code(400);
                echo json_encode([
                    "message" => "Tag faild to update",
                ]);
            }
        }
    }
}
