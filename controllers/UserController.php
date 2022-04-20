<?php
include("../models/user.php");
include("../utils/DatabaseService.php");
include("../utils/FileUpload.php");

class UserController
{
    public function __construct($action)
    {
        $user = new User("", "", "", "", "", "", "", "", "");
        $uploadFile = new FileUpload();
        switch ($action) {
            case "login":
                $username = $_POST['username'];
                $password = $_POST['password'];

                $user = new User("", "", "", "", "", "", "", "", "");
                if ($user->isUser($username, $password)) {
                    header("Location: ../controllers/OrderPendingController.php?page=1");
                }
                break;
            case "logout":
                if (!isset($_SESSION)) {
                    session_start();
                }
                session_unset();
                session_destroy();
                header("Location: ../views/login");
                break;

            case "create":
                $username = $_POST['username'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $phonenumber = $_POST['phonenumber'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $gender = $_POST['gender'];
                $role = $_POST['role'];
                $avatar = $_FILES['avatar']['name'];
                $role === "admin" ? $role_id = 1 : $role_id = 2;

                $arrUser = array("username" => $username, "password" => $password, "fullname" => $fullname, "phonenumber" => $phonenumber, "email" => $email, "address" => $address, "gender" => $gender, "avatar" => $avatar, "role" => $role_id);
                $user->insertUser($arrUser);
                $uploadFile->uploadFile('avatar');


                if ($this->isLogin()) {
                    header("Location: ../controllers/UserController.php?page=1");
                } else {
                    header("Location: ../views/login");
                }
                break;
            case "editFormShow":
                $id = $_REQUEST['id'];
                $arr_param = array("id" => $id);
                $user = new User("", "", "", "", "", "", "", "", "");
                $userInfo = $user->getUserById($arr_param);
                include '../views/user.edit/index.php';
                break;
            case "edit":
                $id = $_REQUEST['id'];
                $fullname = $_REQUEST['fullname'];
                $phonenumber = $_REQUEST['phonenumber'];
                $email = $_REQUEST['email'];
                $address = $_REQUEST['address'];
                $gender = $_REQUEST['gender'];
                $role = $_REQUEST['role'];
                $avatar = $_FILES['avatar'];
                $role === "admin" ? $role_id = 1 : $role_id = 2;

                $updateInfo = array("fullname" => $fullname, "phonenumber" => $phonenumber, "email" => $email, "address" => $address, "gender" => $gender,  "avatar" => $avatar, "role_id" => $role_id, ":id" => $id);
                $user->editUser($updateInfo);
                header("Location: ../controllers/UserController.php?page=1");
                break;
            case "delete":
                $username = $_GET['username'];
                echo $username;
                $arr = [":username" => $username];
                $user->deleteUser($arr);
                header("Location: ../controllers/UserController.php?page=1");
                break;
            default:
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION["is_login"])) {
                    if ($_SESSION["role"] === "admin") {
                        $page = $_REQUEST['page'];
                        $start = ($page - 1) * 6;

                        $row = $user->getRow();
                        $page_count = ceil($row / 6);

                        $user = new User("", "", "", "", "", "", "", "", "");
                        $arrUser = $user->getAllUser($start);
                        include '../views/user/index.php';
                    } else {
                        header("Location: ../404NotFound");
                    }
                }
                break;
        }
    }
    private function isLogin()
    {
        if (!isset($_SESSION)) {
            session_start();
            if ($_SESSION["is_login"]) {
                return true;
            }
        }
        return false;
    }
}

$action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}

$userController = new UserController($action);
