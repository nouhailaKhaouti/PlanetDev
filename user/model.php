<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '.\gestion-hospital\Config\db.php');

session_start();

class User
{
    //les attributes d'une session
    private $id;
    private $userName;
    private $fullName;
    private $email;
    private $password;
    private $role;

    public function __construct($userName, $fullName, $email, $password, $role)
    {
        $this->userName = $userName;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }



    public static function login($email, $password)
    {
        $database = new Dbconnect();
        $db = $database->connect_pdo();
        $stmt = $db->prepare("SELECT * from user where email = '$email'");
        $stmt->execute();
        $row = $stmt->fetch();
        if (!$row) {

            $_SESSION['message'] = "Email Is not valid !";
        } else {
            if ($row['password'] == $password) {
                $_SESSION['ID'] = $row['id'];
                $_SESSION['ROLE'] = $row['role'];

                header('location: index.php');
            } else {
                $_SESSION['message'] = "Password Wrong !";
            }
        }
    }

    public function createUser()
    {
        $database = new Dbconnect();
        $bdd = $database->connect_pdo();
        $stmt = $bdd->prepare("SELECT * FROM user WHERE email = :email1");
        $stmt->bindParam(':email1', $this->email);
        $stmt->execute();
        $row = $stmt->fetch();
        if (!$row) {
            echo "create User";
            $req = $bdd->prepare("INSERT INTO user(userName,fullName,email,password,role)VALUES(:userName,:fullName,:email,:password,:role)") or die(print_r($bdd->errorInfo()));
            $req->bindParam(':userName', $this->userName);
            $req->bindParam(':fullName', $this->fullName);
            $req->bindParam(':password', $this->password);
            $req->bindParam(':email', $this->email);
            $req->bindParam(':role', $this->role);
            $userI = $req->execute();
            if ($userI) {
                echo "done";
            }
            return ($req);
        } else {
            $_SESSION['message'] = "email alredy exist";
        }
    }
    public function updateUser($id)
    {
        $database = new Dbconnect();
        $bdd = $database->connect_pdo();
        $req = $bdd->prepare("UPDATE user SET userName=:userName,fullName=:fullName,email=:email,role=:role WHERE id=:ID") or die(print_r($bdd->errorInfo()));
        $req->bindParam(':userName', $this->userName);
        $req->bindParam(':fullName', $this->fullName);
        $req->bindParam(':password', $this->password);
        $req->bindParam(':email', $this->email);
        $req->bindParam(':role', $this->role);
        $req->bindParam(':ID', $id);
        $userU = $req->execute();
        return ($userU);
    }

    public function getUserByEmail($email)
    {
        global $bdd;
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email') or die(print_r($bdd->errorInfo()));
        $req->bindParam(':email', $email);
        $user = $req->execute();
        return ($user);
    }
    public static function getById()
    {
        if (isset($_SESSION['ID'])) {
            $database = new Dbconnect();
            $db = $database->connect_pdo();
            $id = $_SESSION['ID'];
            $stmt = $db->prepare("SELECT * FROM user where id = '$id' ");
            $stmt->execute();


            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

    public static function count($role)
    {
        $database = new Dbconnect();
        $db = $database->connect_pdo();

        $stmt = $db->prepare("SELECT COUNT(role) FROM user WHERE role LIKE '%$role%'");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    //    public static function getAllByRole($role){
    //     $database = new dbconnect();
    //     $db = $database->connect_pdo();
    //     $stmt = $db->prepare(" SELECT * FROM `user` WHERE role LIKE '%$role%' ") ;
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //   } 
    
}
