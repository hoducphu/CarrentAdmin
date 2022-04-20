<?php
include("../models/order.php");
include("../utils/DatabaseService.php");
include("../utils/FileUpload.php");

class UserController
{
    public function __construct($action)
    {
        $order = new Order("");
        switch ($action) {
            case "conform":
                $id = $_REQUEST['id'];
                if (!isset($_SESSION)) {
                    session_start();
                }
                $arr = ["staff_id" => $_SESSION['staff_id'], "id" => $id];
                $order->conformOrder($arr);
                header("Location: ../controllers/OrderPendingController.php?page=1");
                break;
            case "reject":
                $id = $_REQUEST['id'];
                if (!isset($_SESSION)) {
                    session_start();
                }
                $arr = ["staff_id" => $_SESSION['staff_id'], "id" => $id];
                $order->rejectOrder($arr);
                header("Location: ../controllers/OrderPendingController.php?page=1");
                break;
            case "search":
                $id = $_REQUEST['order_id'];
                $page = $_REQUEST['page'];
                $start = ($page - 1) * 6;

                $row = $order->getRow();
                $page_count = ceil($row / 6);
                $arrOrder = $order->getOrderById($id);
                include '../views/orderpending/index.php';
                break;
            default:
                $page = $_REQUEST['page'];
                $start = ($page - 1) * 6;

                $row = $order->getRow();
                $page_count = ceil($row / 6);
                $arrOrder = $order->getAllPendingOrder($start);
                include '../views/orderpending/index.php';
                break;
        }
    }
}

$action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}

$userController = new UserController($action);
