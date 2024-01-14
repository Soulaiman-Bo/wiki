<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\classes\Controller;
use App\classes\Validation;
use App\classes\ValidationException;
use App\Traits\AuthHelpers;
use App\Traits\ValidationHelper;

class UserController extends Controller

{
  use AuthHelpers;
  use ValidationHelper;

  //WEB 
  public function login()
  {
    if (isset($_SESSION['user_email'])) {
      header('location: /');
    } else {
      $this->render('login');
    }
  }

  public function register()
  {
    if (isset($_SESSION['user_email'])) {
      header('location: /');
    } else {
      $this->render('register');
    }
  }

  // API
  public function loginAction()
  {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $validation = new Validation();

      try {
        $validation->key('email')->value($this->sanitize($_POST['email']))->required()->isEmail()->lengthBetween(4, 40, true);
        $validation->key('password')->value($this->sanitize($_POST['password']))->required()->lengthBetween(8, 40, true);


        $usermodel = new UserModel();
        $email =  $this->sanitize($_POST['email']);
        $user = $usermodel->GetUser($email);

        if (empty($user)) {
          $validation->setError('user', "There is no user with This Email");
        }

        if (!$validation->isValid()) {
          throw new ValidationException("Invalid Input");
        }
      } catch (ValidationException $e) {
        $usermodel->closeConnection();
        $errors =  $validation->getErrors();
        http_response_code(400);
        echo json_encode($errors);
        exit;
      }


      if ($this->verifyPassword($this->sanitize($_POST['password']), $user[0]['password'])) {

        $_SESSION['user_email'] = $user[0]['email'];
        $_SESSION['user_role'] = $user[0]['role'];
        $_SESSION['user_firstname'] = $user[0]['firstname'];
        $_SESSION['user_lastname'] = $user[0]['lastname'];
        $_SESSION['user_id'] = $user[0]['id'];

        http_response_code(200);
        echo json_encode(["login" => "log in successfull"]);

        exit;
      } else {
        http_response_code(400);
        echo json_encode(["login" => "log in failed"]);
        exit;
      }
    }
  }
  public function registerAction()
  {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $validation = new Validation();
      try {


        $validation->key('firstname')->value($this->sanitize($_POST['firstname']))->required()->lengthBetween(4, 25, true);
        $validation->key('lastname')->value($this->sanitize($_POST['lastname']))->required()->lengthBetween(4, 25, true);
        $validation->key('email')->value($this->sanitize($_POST['email']))->required()->isEmail()->lengthBetween(4, 40, true);
        $validation->key('title')->value($this->sanitize($_POST['title']))->required()->lengthBetween(8, 60, true);
        $validation->key('description')->value($this->sanitize($_POST['description']))->required()->lengthBetween(8, 300, true);
        $validation->key('password')->value($this->sanitize($_POST['password']))->required()->lengthBetween(8, 40, true);
        $validation->key('confirmpassword')->value($this->sanitize($_POST['confirmpassword']))->required()->IsPasswordsMatch($_POST['password']);
        $validation->key('profile_img')->value($_FILES["profile_img"])->required()->isImage();


        $usermodel = new UserModel();
        $email =  $this->sanitize($_POST['email']);
        $result = $usermodel->GetUser($email);

        if (!empty($result)) {
          $validation->setError('user', "a user with This Email: " . $_POST['email'] . " Already Exists");
        }

        if (!$validation->isValid()) {
          throw new ValidationException("Invalid Input");
        }
      } catch (ValidationException $e) {
        $usermodel->closeConnection();
        $errors =  $validation->getErrors();
        http_response_code(400);
        echo json_encode($errors);
        exit;
      }

      if (isset($_FILES["profile_img"])) {
        $file = $_FILES["profile_img"];
        $fileName = $file["name"];
        $fileTmpName = $file["tmp_name"];
        $fileError = $file["error"];
        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $profile_img  =   "_" . uniqid('', true) . "." . $fileExt;
        $uploadDir = "images/profile/";

        if ($fileError === 0) {


          try {
            move_uploaded_file($fileTmpName, $uploadDir . $profile_img);
            $result = $usermodel->InsertUserProfileImage([
              'src' => $profile_img,
              'alt' => "profile image"
            ]);

            $profile_img_if = $result;
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
        'firstname' => $this->sanitize($_POST['firstname']),
        'lastname' => $this->sanitize($_POST['lastname']),
        'email' => $this->sanitize($_POST['email']),
        'password' => $this->hashPassword($this->sanitize($_POST['password'])),
        'title' => $this->sanitize($_POST['title']),
        'description' => $this->sanitize($_POST['description']),
        'role' => 2,
        'profile_img' => $profile_img_if,
      ];

      $result = $usermodel->InsertUser($data);

      if ($result) {
        $usermodel->closeConnection();
        http_response_code(200);
        echo json_encode([
          "message" => "User Registered Successfully",
          "id" => $result
        ]);
      } else {
        $usermodel->closeConnection();
        http_response_code(400);
        echo json_encode([
          "message" => "Faild to register",
        ]);
      }
    }
  }

  public function logoutAction()
  {
    $this->isloggedin();
    $this->unsetSesion();
    header('Location: /');
    exit;
  }
}
