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
            case "search":
                $id = $_REQUEST['order_id'];
                $page = $_REQUEST['page'];
                $start = ($page - 1) * 6;

                $row = $order->getRow();
                $page_count = ceil($row / 6);
                $arrOrder = $order->getOrderById($id);
                include '../views/order/index.php';
                break;
            default:
                $page = $_REQUEST['page'];
                $start = ($page - 1) * 6;

                $row = $order->getRow();
                $page_count = ceil($row / 6);
                $arrOrder = $order->getAllOrder($start);
                include '../views/order/index.php';
                break;
        }
    }
}

$action = "";
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}

$userController = new UserController($action);
