<?php
class Product
{
    private $description;
    private $car_img;
    private $car_name;
    private $cate_id;
    private $brand;
    private $engine;
    private $wattage;
    private $capacity;
    private $vehical_size;
    private $licence_plates;
    private $color;
    private $price;
    private $seat;
    private $undercarriage;
    private $gearbox;

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getCarImg()
    {
        return $this->car_img;
    }
    public function setCar_img($car_img)
    {
        $this->car_img = $car_img;
    }

    public function getCar_name()
    {
        return $this->car_name;
    }
    public function setCar_name($car_name)
    {
        $this->car_name = $car_name;
    }

    public function getCate_id()
    {
        return $this->cate_id;
    }
    public function setCate_id($cate_id)
    {
        $this->cate_id = $cate_id;
    }

    public function getBrand()
    {
        return $this->brand;
    }
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getEngine()
    {
        return $this->engine;
    }
    public function setEngine($engine)
    {
        $this->engine = $engine;
    }

    public function getWattage()
    {
        return $this->wattage;
    }
    public function setWattage($wattage)
    {
        $this->wattage = $wattage;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    public function getVehical_size()
    {
        return $this->vehical_size;
    }
    public function setVehical_size($vehical_size)
    {
        $this->vehical_size = $vehical_size;
    }

    public function getLicence_plates()
    {
        return $this->licence_plates;
    }
    public function setLicence_plates($licence_plates)
    {
        $this->licence_plates = $licence_plates;
    }

    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getSeat()
    {
        return $this->seat;
    }
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }

    public function getUndercarriage()
    {
        return $this->undercarriage;
    }
    public function setUndercarriage($undercarriage)
    {
        $this->undercarriage = $undercarriage;
    }

    public function getGearbox()
    {
        return $this->gearbox;
    }
    public function setGearbox($gearbox)
    {
        $this->gearbox = $gearbox;
    }

    public function __construct(
        $description,
        $car_img,
        $car_name,
        $cate_id,
        $brand,
        $engine,
        $wattage,
        $capacity,
        $vehical_size,
        $licence_plates,
        $color,
        $price,
        $seat,
        $undercarriage,
        $gearbox
    ) {
        $this->description = $description;
        $this->car_img = $car_img;
        $this->car_name = $car_name;
        $this->cate_id = $cate_id;
        $this->brand = $brand;
        $this->engine = $engine;
        $this->wattage = $wattage;
        $this->capacity = $capacity;
        $this->vehical_size = $vehical_size;
        $this->licence_plates = $licence_plates;
        $this->color = $color;
        $this->price = $price;
        $this->seat = $seat;
        $this->undercarriage = $undercarriage;
        $this->gearbox = $gearbox;
    }

    // get row
    public function getRow()
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $getRowQuery = "SELECT * FROM car, car_detail WHERE car.id = car_detail.car_id";
        $row = $dbCon->getRow($getRowQuery);
        $dbCon->disconnect();
        return $row;
    }
    // get list product
    public function getAllProduct($start)
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $limit = "limit " . $start . ", 6";
        $sql = "SELECT car.id AS carid, car.state, car.description, car.car_img, car.car_name, car_detail.*, category.* FROM car, car_detail, category WHERE car.id = car_detail.car_id AND car.cate_id = category.id " . $limit;
        $arrUser = array();
        $arrUser = $dbCon->getAllData($sql);
        $dbCon->disconnect();
        return $arrUser;
    }

    // get product by id
    public function getProductById($arr = array())
    {
        $sql = "SELECT car.id AS carid, car.state, car.description, car.car_img, car.car_name, car_detail.*, category.* FROM car, car_detail, category WHERE car.id = :carid AND car.id = car_detail.car_id AND car.cate_id = category.id";
        $user = array();
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $user = $dbCon->getData($sql, $arr);
        $dbCon->disconnect();
        return $user;
    }

    // create product
    public function getLastRecord()
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $sql = "SELECT id FROM car ORDER BY id DESC LIMIT 1;";
        $lastRecord = $dbCon->getAllData($sql);
        $dbCon->disconnect();
        return $lastRecord;
    }

    public function insertProduct($arr_param)
    {
        $sql = "INSERT INTO car (cate_id, description, car_img, car_name) VALUES (:cate_id, :description , :car_img , :car_name);";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->insertData($sql, $arr_param);
        $dbCon->disconnect();
    }

    public function insertProductDetail($arr_param)
    {
        $sql = "INSERT INTO car_detail (brand, engine, wattage, capacity, vehical_size, licence_plates, color, car_id, price, seat, undercarriage, gearbox) VALUES ( :brand, :engine, :wattage, :capacity, :vehical_size, :licence_plates, :color, :car_id, :price, :seat, :undercarriage, :gearbox)";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->insertData($sql, $arr_param);
        $dbCon->disconnect();
    }

    // update product
    public function editProduct($arr_param)
    {
        $sql = "UPDATE car SET cate_id = :cate_id,  description = :description, car_img = :car_img, car_name = :car_name where id = :id";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->editData($sql, $arr_param);
        $dbCon->disconnect();
    }

    public function editProductDetail($arr_param)
    {
        $sql = "UPDATE car_detail SET brand = :brand, engine = :engine, wattage = :wattage, capacity = :capacity, vehical_size = :vehical_size, licence_plates = :licence_plates, color = :color, price = :price, seat = :seat, undercarriage = :undercarriage, gearbox = :gearbox where car_id = :id";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->editData($sql, $arr_param);
        $dbCon->disconnect();
    }

    //delete product
    public function deleteProduct($arr_param)
    {
        $sql = "DELETE FROM car WHERE id = :id";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->deleteData($sql, $arr_param);
        $dbCon->disconnect();
    }

    public function deleteProductDetail($arr_param)
    {
        $sql = "DELETE FROM car_detail WHERE car_id = :id";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->deleteData($sql, $arr_param);
        $dbCon->disconnect();
    }
}
