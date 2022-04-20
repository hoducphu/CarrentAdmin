<?php
class Order
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    // get row
    public function getRow()
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $getRowQuery = "SELECT * FROM dack_carrent.order, dack_carrent.order_detail WHERE order.id = order_detail.order_id";
        $row = $dbCon->getRow($getRowQuery);
        $dbCon->disconnect();
        return $row;
    }

    // get list order
    public function getAllOrder($start)
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $limit = "limit " . $start . ", 6";
        $sql = "SELECT customer.fullname as customer, account.fullname as staff, car.id as carid, order.id as orderid, order_detail.total_price, order.order_date, order.conform_order_date, role.rolename, car.car_name, order.state from dack_carrent.car, dack_carrent.order_detail, dack_carrent.order, dack_carrent.customer, dack_carrent.account, dack_carrent.role where car.id = order_detail.car_id and order.id = order_detail.order_id and order.staff_id = account.id and order.customer_id = customer.id  and account.role_id = role.id  ORDER BY order.state DESC " . $limit;
        $arrUser = array();
        $arrUser = $dbCon->getAllData($sql);
        $dbCon->disconnect();
        return $arrUser;
    }

    public function getAllPendingOrder($start)
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $limit = "limit " . $start . ", 6";
        $sql = "SELECT  customer.fullname as customer, car.id as carid, order.id as orderid, order_detail.total_price, order.order_date, order.conform_order_date, car.car_name, order.state from dack_carrent.car, dack_carrent.order_detail, dack_carrent.order, dack_carrent.customer where car.id = order_detail.car_id and order.id = order_detail.order_id and  order.customer_id = customer.id and order.state = '0' " . $limit;
        $arrUser = array();
        $arrUser = $dbCon->getAllData($sql);
        $dbCon->disconnect();
        return $arrUser;
    }

    // get order by id
    public function getOrderById($id)
    {
        $sql = "SELECT customer.fullname as customer, account.fullname as staff, car.id as carid, order.id as orderid, order_detail.total_price, order.order_date, order.conform_order_date, role.rolename, car.car_name, order.state from dack_carrent.car, dack_carrent.order_detail, dack_carrent.order, dack_carrent.customer, dack_carrent.account, dack_carrent.role where car.id = order_detail.car_id and order.id = order_detail.order_id and order.staff_id = account.id and order.customer_id = customer.id  and account.role_id = role.id and  order.id = " . $id;
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $user = $dbCon->getAllData($sql);
        $dbCon->disconnect();
        return $user;
    }

    // reject order
    public function rejectOrder($arr_param)
    {
        $sql = "UPDATE dack_carrent.order SET state = '2', staff_id = :staff_id, conform_order_date = current_timestamp() where id = :id";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->editData($sql, $arr_param);
        $dbCon->disconnect();
    }

    // conform order
    public function conformOrder($arr_param)
    {
        $sql = "UPDATE dack_carrent.order SET state = '1', staff_id = :staff_id, conform_order_date = current_timestamp() where id = :id";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->editData($sql, $arr_param);
        $dbCon->disconnect();
    }
}
