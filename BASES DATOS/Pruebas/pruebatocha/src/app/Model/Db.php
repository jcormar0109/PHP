<?php

namespace App\Model;

use App\Model\User;
use PDO;

const HOSTNAME = "db";
const BDNAME = "my_application_db";
const USERNAME = "app_user";
const PASSWORD = "app_password";
class Db
{
    private static ?Db $instance = null;
    private static ?PDO $pdo = null;

    private function __construct(){
        self::conectar();
    }

    private static function conectar():void{
        $dsn = "mysql:host=" . HOSTNAME . ";dbname=" . BDNAME;
        self::$pdo = new PDO($dsn,
            USERNAME,
            PASSWORD,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

    }

    public static function getInstance():Db{
        if(is_null(self::$instance)){
            self::$instance = new Db();
            return self::$instance;
        }
        return self::$instance;
    }

    public function validUser(User $user):bool | User{
        $sql = "SELECT * FROM USERS WHERE USERNAME = :username AND PASSWD = :password";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            ":username" => $user->getName(),
            ":password" => $user->getPassword()
        ]);
        $row = $stmt->fetch();
        if($row !== false){
            $user1 = new User($row["ID"], $user->getName(), $user->getPassword(), $row["ROL"]);
            return $user1;
        }
        else return false;
    }

    public function createUser(User $user):void{
        $sql = "INSERT INTO USERS (USERNAME, PASSWD, ROL) VALUES (:username, :password, 0)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            ":username" => $user->getName(),
            ":password" => $user->getPassword()
        ]);
    }

    public function getBooks():array{
        $sql = "SELECT * FROM BOOKS";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}