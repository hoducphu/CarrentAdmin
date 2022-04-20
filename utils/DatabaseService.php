<?php
class DatabaseService
{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dack_carrent";
    private $conn = null;

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getRow($sql)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $e) {
            echo "<script>console.log(" . $e->getMessage() . " " . $sql . ")</script>";
        }
    }

    public function getAllData($sql)
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<script>console.log(" . $e->getMessage() . " " . $sql . ")</script>";
        }
    }

    public function getData($sql, $arr = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($arr);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "<script>console.log(" . $e->getMessage() . " " . $sql . ")</script>";
        }
    }

    public function insertData($sql, $arr = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($arr);
        } catch (PDOException $e) {
            echo $sql . "<script>console.log(" . $e->getMessage() . " " . $sql . ")</script>";
        }
    }

    public function deleteData($sql, $arr = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($arr);
        } catch (PDOException $e) {
            echo $sql . "<script>console.log(" . $e->getMessage() . " " . $sql . ")</script>";
        }
    }

    public function editData($sql, $arr = array())
    {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($arr);
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

    public function disconnect()
    {
        $this->conn = null;
    }
}
