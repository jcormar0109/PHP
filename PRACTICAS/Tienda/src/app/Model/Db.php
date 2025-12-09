<?php

namespace App\Model;

use PDO;

const HOSTNAME = "db";
const DBNAME = "my_application_db";
const USERNAME = "app_user";
const PASSWORD = "app_password";
class Db
{
    private static ?Db $instance = null;
    private static ?PDO $pdo = null;

    private function __construct(){
        self::conectar();
    }
    public static function getInstance(): self{
        if(self::$instance ===null) {
            self::$instance = new Db();
        }
        return self::$instance;
    }
    private static function conectar(): void{
        $dsn = "mysql:host=" . HOSTNAME . ";dbname=" . DBNAME;
        if (self::$pdo == null) {
            self::$pdo = new PDO(
                $dsn,
                USERNAME,
                PASSWORD,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
    }

    public function getAllBooks()
    {
        $sql = "SELECT * FROM BOOKS LIMIT 10";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }

    public function getBookByTitle(string $title):array{
        $sql = "SELECT * FROM BOOKS WHERE TITLE LIKE :title";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([":title" => "%$title%"]);
        $row = $stmt->fetchAll();
        return $row;
    }
    public function createUser(User $user ): bool{
        $sql = "INSERT INTO USERS (DNI, USERNAME, PASSWD, FIRST_NAME, SECOND_NAME, EMAIL, ADDRESS) VALUES (:dni, :name, :password, :firstname, :lastname, :email, :address)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            ":dni" => $user->getDni(),
            ":name" => $user->getUsername(),
            ":password"=>$user->getPasswd(),
            "firstname"=>$user->getFisrtName(),
            "lastname"=>$user->getSecondName(),
            "email"=>$user->getEmail(),
            "address"=>$user->getAddress()]);
        $rows = $stmt->rowCount();
        if($rows !== 0){
            return true;
        } else{
            return false;
        }
    }

    public function validUser(User $user ): bool|User{
        $sql = "SELECT * FROM USERS WHERE USERNAME = :name AND PASSWD = :password";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            ":name" => $user->getUsername(),
            ":password"=>$user->getPasswd()
        ]);
        $rows = $stmt->fetchAll();
        if (empty($rows)) {
            return false;
        } else {
            $newUser = new User($rows[0]["ID"],$rows[0]["DNI"],$rows[0]["USERNAME"], $rows[0]["PASSWD"],$rows[0]["FIRST_NAME"],$rows[0]["SECOND_NAME"],$rows[0]["EMAIL"],$rows[0]["ADDRESS"],);
        }
        return $newUser;
    }

    public function validBook(Book $book): bool|Book{
            $sql = "SELECT * FROM BOOKS WHERE ISBN = :isbn";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":isbn" => $book->getIsbn()
            ]);
            $rows = $stmt->fetchAll();
            if (empty($rows)) {
                return false;
            } else {
                $newBook = new Book($rows[0]["ID"],$rows[0]["ISBN"],$rows[0]["TITLE"], $rows[0]["AUTHOR"],$rows[0]["PVP"],$rows[0]["STOCK"]);
            }
            return $newBook;
    }
}