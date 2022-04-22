<?php
include("../models/Product.php");
include("../utils/DatabaseService.php");
include("../utils/FileUpload.php");

class ProductController
{
    public function __construct($action)
    {
        $product = new Product("", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
        $uploadFile = new FileUpload();
        switch ($action) {
            case "create":
                $cate_id = $_POST['cate_id'];
                $carname = $_POST['carname'];
                $brand = $_POST['brand'];
                $engine = $_POST['engine'];
                $wattage = $_POST['wattage'];
                $capacity = $_POST['capacity'];
                $vehicalsize = $_POST['vehicalsize'];
                $licenceplates = $_POST['licenceplates'];
                $color = $_POST['color'];
                $price = $_POST['price'];
                $undercarriage = $_POST['undercarriage'];
                $gearbox = $_POST['gearbox'];
                $description = $_POST['description'];
                $carimg = $_FILES['carimg']['name'];

                $cate_id === 1 ? $seat = 4 : $seat = 7;

                $arrProduct = array("cate_id" => $cate_id, "description" => $description, "car_img" => $carimg, "car_name" => $carname);
                $product->insertProduct($arrProduct);
                $newProduct = $product->getLastRecord();
                $lastID =  (int)$newProduct[0]['id'];
                $arrProductDetail = array("brand" => $brand, "engine" => $engine, "wattage" => $wattage, "capacity" => $capacity, "vehical_size" => $vehicalsize, "licence_plates" => $licenceplates, "color" => $color, "car_id" => $lastID, "price" => $price, "seat" => $seat, "undercarriage" => $undercarriage, "gearbox" => $gearbox);
                $product->insertProductDetail($arrProductDetail);
                $uploadFile->uploadFile('carimg');


                if ($this->isLogin()) {
                    header("Location: ../controllers/ProductController.php?page=1");
                } else {
                    header("Location: ../views/login");
                }
                break;
            case "editFormShow":
                $id = $_REQUEST['id'];
                $productInfo = $product->getProductById($id);
                include '../views/product.edit/index.php';
                break;
            case "edit":
                $carid = $_POST['carid'];
                $cate_id = $_POST['cate_id'];
                $carname = $_POST['carname'];
                $brand = $_POST['brand'];
                $engine = $_POST['engine'];
                $wattage = $_POST['wattage'];
                $capacity = $_POST['capacity'];
                $vehicalsize = $_POST['vehicalsize'];
                $licenceplates = $_POST['licenceplates'];
                $color = $_POST['color'];
                $price = $_POST['price'];
                $undercarriage = $_POST['undercarriage'];
                $gearbox = $_POST['gearbox'];
                $description = $_POST['description'];

                $cate_id === 1 ? $seat = 4 : $seat = 7;

                $updateInfo = array("cate_id" => $cate_id, "description" => $description,  "car_name" => $carname, "id" => (int)$carid);
                $product->editProduct($updateInfo);
                $updateInfoDetail = array("brand" => $brand, "engine" => $engine, "wattage" => $wattage, "capacity" => $capacity, "vehical_size" => $vehicalsize, "licence_plates" => $licenceplates, "color" => $color, "price" => $price, "seat" => $seat, "undercarriage" => $undercarriage, "gearbox" => $gearbox, "id" => (int)$carid);
                $product->editProductDetail($updateInfoDetail);
                header("Location: ../controllers/ProductController.php?page=1");
                break;
            case "delete":
                $id = (int)$_GET['id'];
                $arr = [":id" => $id];
                $product->deleteProductDetail($arr);
                $product->deleteProduct($arr);
                header("Location: ../controllers/ProductController.php?page=1");
                break;
            case "search":
                $id = $_REQUEST['carid'];
                $page = $_REQUEST['page'];
                $start = ($page - 1) * 6;

                $row = $product->getRowById($id);
                $page_count = ceil($row / 6);
                $arrProduct = $product->getProductById($id);
                include '../views/product/index.php';
                break;
            default:
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION["is_login"])) {
                    if ($_SESSION["role"] === "admin") {
                        $page = $_REQUEST['page'];
                        $start = ($page - 1) * 6;
                        $row = $product->getRow();
                        $page_count = ceil($row / 6);
                        $arrProduct = $product->getAllProduct($start);
                        include '../views/product/index.php';
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

$ProductController = new ProductController($action);
