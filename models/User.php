<?php
class User
{
    private $username;
    private $password;
    private $fullname;
    private $phonenumber;
    private $email;
    private $address;
    private $gender;
    private $avatar;
    private $role;

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getFullname()
    {
        return $this->fullname;
    }
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    public function getPhonenumber()
    {
        return $this->phonenumber;
    }
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getGender()
    {
        return $this->gender;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function __construct($username, $password, $fullname, $phonenumber, $email,  $address, $gender,  $avatar, $role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->fullname = $fullname;
        $this->phonenumber = $phonenumber;
        $this->email = $email;
        $this->address = $address;
        $this->gender = $gender;
        $this->avatar = $avatar;
        $this->role = $role;
    }

    // get row
    public function getRow()
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $getRowQuery = "SELECT account.*, role.rolename FROM account, role WHERE account.role_id = role.id";
        $row = $dbCon->getRow($getRowQuery);
        $dbCon->disconnect();
        return $row;
    }

    public function getRowById($id)
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $getRowQuery = "SELECT account.*, role.rolename FROM account, role WHERE account.role_id = role.id and account.id = " . $id;
        $row = $dbCon->getRow($getRowQuery);
        $dbCon->disconnect();
        return $row;
    }
    // get list user
    public function getAllUser($start)
    {
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $limit = "limit " . $start . ", 6";
        $sql = "SELECT account.*, role.rolename FROM account, role WHERE account.role_id = role.id " . $limit;
        $arrUser = array();
        $arrUser = $dbCon->getAllData($sql);
        $dbCon->disconnect();
        return $arrUser;
    }

    // get user by id
    public function getUserById($id)
    {
        $sql = "SELECT account.*, role.rolename FROM account, role WHERE account.role_id = role.id and account.id = " . $id;
        $user = array();
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $user = $dbCon->getData($sql);
        $dbCon->disconnect();
        return $user;
    }

    // login
    private function getUserByUserName($sql, $arr = array())
    {
        $user = array();
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $user = $dbCon->getData($sql, $arr);
        $dbCon->disconnect();
        return $user;
    }

    public function isUser($uname, $pass)
    {
        $username = "";
        $password = "";
        $avatar = "";
        $role = "";
        $staffid = "";
        $arrUsers = array();
        $sql = "SELECT account.id, account.username, account.password, account.avatar, role.rolename FROM account, role where account.username = :username and account.role_id = role.id";
        $arr_param = array("username" => $uname);

        $arrUsers = $this->getUserByUserName($sql, $arr_param);

        if (count($arrUsers) > 0) {
            $username = $arrUsers[0]["username"];
            $password = $arrUsers[0]["password"];
            $avatar = $arrUsers[0]["avatar"];
            $role = $arrUsers[0]["rolename"];
            $staffid = $arrUsers[0]["id"];

            if ($uname == $username && $pass == $password) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION["is_login"] = true;
                $_SESSION["username"] = $uname;
                $_SESSION["staff_id"] = $staffid;
                $_SESSION["avatar"] = $avatar;
                $_SESSION["role"] = $role;
                return true;
            }
        }
        return false;
    }

    // create user
    public function insertUser($arr_param)
    {
        $sql = "INSERT INTO account(username, password, fullname, phonenumber, email, address, gender, avatar, role_id) values(:username, :password, :fullname, :phonenumber, :email, :address, :gender, :avatar, :role)";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->insertData($sql, $arr_param);
        $dbCon->disconnect();
    }

    // update user
    public function editUser($arr_param)
    {
        $sql = "UPDATE account SET fullname = :fullname,  phonenumber = :phonenumber, email = :email, address = :address, gender = :gender, role_id = :role_id where id = :id";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->editData($sql, $arr_param);
        $dbCon->disconnect();
    }

    //delete user
    public function deleteUser($arr_param)
    {
        $sql = "DELETE FROM account WHERE username = :username";
        $dbCon = new DatabaseService();
        $dbCon->connect();
        $dbCon->deleteData($sql, $arr_param);
        $dbCon->disconnect();
    }
}
