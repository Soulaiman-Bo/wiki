<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\classes\Controller;
use App\classes\Validation;
use App\classes\ValidationException;



class UserController extends Controller
{
  //WEB 
  public function login()
  {
    $this->render('login');
  }

  public function register()
  {
    $this->render('register');
  }


  
  // API
  public function loginAction()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      // unsetSesion();
      $validation = new Validation();

      try {
        $validation->key('email')->value(sanitize($_POST['email']))->required()->isEmail()->lengthBetween(4, 40, true);
        $validation->key('password')->value(sanitize($_POST['password']))->required()->lengthBetween(8, 40, true);


        $usermodel = new UserModel();
        $email =  sanitize($_POST['email']);
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


      if (verifyPassword(sanitize($_POST['password']), $user[0]['password'])) {

        $_SESSION['user_email'] = $user[0]['email'];
        $_SESSION['user_role'] = $user[0]['role'];
        $_SESSION['user_firstname'] = $user[0]['firstname'];
        $_SESSION['user_lastname'] = $user[0]['lastname'];

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


        $validation->key('firstname')->value(sanitize($_POST['firstname']))->required()->lengthBetween(4, 25, true);
        $validation->key('lastname')->value(sanitize($_POST['lastname']))->required()->lengthBetween(4, 25, true);
        $validation->key('email')->value(sanitize($_POST['email']))->required()->isEmail()->lengthBetween(4, 40, true);
        $validation->key('title')->value(sanitize($_POST['title']))->required()->lengthBetween(8, 60, true);
        $validation->key('description')->value(sanitize($_POST['description']))->required()->lengthBetween(8, 300, true);
        $validation->key('password')->value(sanitize($_POST['password']))->required()->lengthBetween(8, 40, true);
        $validation->key('confirmpassword')->value(sanitize($_POST['confirmpassword']))->required()->IsPasswordsMatch($_POST['password']);
        $validation->key('profile_img')->value($_FILES["profile_img"])->required()->isImage();


        $usermodel = new UserModel();
        $email =  sanitize($_POST['email']);
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
        'firstname' => sanitize($_POST['firstname']),
        'lastname' => sanitize($_POST['lastname']),
        'email' => sanitize($_POST['email']),
        'password' => hashPassword(sanitize($_POST['password'])),
        'title' => sanitize($_POST['title']),
        'description' => sanitize($_POST['description']),
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


  public function logoutAction(){
    isloggedin();
    unsetSesion();
    header('Location: /login');
    exit;
  }


}

function unsetSesion(){
  session_unset();
  session_destroy();
}

function sanitize($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
  return $data;
};

function hashPassword($password)
{
  $options = ['cost' => 5];
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
  return $hashedPassword;
}

function verifyPassword($enteredPassword, $hashedPassword)
{
  return password_verify($enteredPassword, $hashedPassword);
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
