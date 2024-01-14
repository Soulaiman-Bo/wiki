<?php

namespace App\Controllers;

use App\Traits\ValidationHelper;
use App\Models\WikiModel;
use App\Models\ImageModel;
use App\classes\Controller;
use App\classes\Validation;
use App\classes\ValidationException;
use App\Models\TagModel;

class WikiController extends Controller
{
    use ValidationHelper;

    public function createWiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $validation = new Validation();
            try {
                $validation->key('title')->value($this->sanitize($_POST['title']))->required()->lengthBetween(6, 150, true);
                $validation->key('description')->value($this->sanitize($_POST['description']))->required()->lengthBetween(4, 500, true);
                $validation->key('author')->value($this->sanitize($_POST['author']))->required()->isNumber();
                $validation->key('content')->value($this->sanitize($_POST['content']))->required()->lengthBetween(100, 8000, true);
                $validation->key('category')->value($this->sanitize($_POST['category']))->required()->isNumber();
                $validation->key('header_img')->value($_FILES["header_img"])->required()->isImage();
                $validation->key('tags')->value($this->sanitize($_POST['tags']))->required();

                $tags_i_array = convertStringToArray($_POST['tags']);

                if (!$tags_i_array) {
                    $validation->setError('tags', "Invalid element in input string");
                }

                if (!$validation->isValid()) {
                    throw new ValidationException("Invalid Input");
                }
            } catch (ValidationException $e) {

                $errors =  $validation->getErrors();
                http_response_code(400);
                echo json_encode($errors);
                exit;
            }


            if (isset($_FILES["header_img"])) {
                $file = $_FILES["header_img"];
                $fileName = $file["name"];
                $fileTmpName = $file["tmp_name"];
                $fileError = $file["error"];
                $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                $profile_img  =   "wiki_" . uniqid('', true) . "." . $fileExt;
                $uploadDir = "images/wiki/";

                if ($fileError === 0) {
                    try {

                        move_uploaded_file($fileTmpName, $uploadDir . $profile_img);
                        $imagesModel = new ImageModel();

                        $result = $imagesModel->InsertImage([
                            'src' => $profile_img,
                            'alt' => "article header image"
                        ]);

                        $header_image = $result;
                    } catch (\Throwable $th) {
                        http_response_code(400);
                        echo json_encode([
                            "message" => "Error Saving Image.",
                        ]);
                        exit;
                    }
                } else {
                    http_response_code(400);
                    echo json_encode([
                        "message" => "Error Uploading Image.",
                    ]);
                    exit;
                }
            }

            $data = [
                'title' => $this->sanitize($_POST['title']),
                'description' => $this->sanitize($_POST['description']),
                'author' => $this->sanitize($_POST['author']),
                'content' => $this->sanitize($_POST['content']),
                'category' => $this->sanitize($_POST['category']),
                'header_img' => $header_image,
            ];

            $imagesModel = new WikiModel();
            $result = $imagesModel->InserWiki($data);
            $imagesModel->InserWikistatus($result);


            $tags_article_id = mergeArrays($tags_i_array, [$result]);

            $tagmodel = new TagModel();
            $tags_result = $tagmodel->assignTagsToWiki($tags_article_id);



            if ($result && $tags_result) {
                $imagesModel->closeConnection();
                http_response_code(200);
                echo json_encode([
                    "message" => "Wiki Inserted Successfully",
                    "id" => $result
                ]);
            } else {
                $imagesModel->closeConnection();
                http_response_code(400);
                echo json_encode([
                    "message" => "Faild to Create a Wiki",
                ]);
            }
        }
    }
    public function acceptwiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];

            $wikimodel = new WikiModel();
            $wikimodel->setwikistatus($id, 2);

            header('location: /dashboard/wikies');
        }
    }

    public function rejectwiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];

            $wikimodel = new WikiModel();
            $wikimodel->setwikistatus($id, 3);

            header('location: /dashboard/wikies');
        }
    }

    public function archivewiki()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['id'];

            $wikimodel = new WikiModel();
            $wikimodel->archivewiki($id, 'archived');

            header('location: /dashboard/wikies');
        }
    }

    public function getAllWikies()
    {

        $wikimodel = new WikiModel();
        $wikies = $wikimodel->getAllWikies();


        http_response_code(200);
        echo json_encode($wikies);
    }
}


function convertStringToArray($input)
{
    $values = explode(', ', $input);
    $result = [];
    foreach ($values as $value) {
        if (is_numeric($value)) {
            $result[] = (float) $value;
        } else {
            return false;
        }
    }
    return $result;
}

function mergeArrays($keys, $values)
{
    $repeatedValues = array_pad($values, count($keys), reset($values));
    $result = array_combine($keys, array_map('intval', $repeatedValues));
    return $result;
}


