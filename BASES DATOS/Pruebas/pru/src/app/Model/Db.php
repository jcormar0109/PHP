<?php

namespace app\Model;

use PDO;
use app\Model\User;
use app\Model\Book;

const HOSTNAME = "db";
const DBNAME = "my_application_db";
const USERNAME = "app_user";
const PASSWORD = "app_password";

class Db
{
    private static ?PDO $pdo = null;
    private static ?Db $instance = null;

    private function __construct(){
        self::conectar();
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
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }
    }

    public static function getInstance():Db{
        if(is_null(self::$instance)){
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function getAllBooks(){
        $sql = "SELECT * FROM BOOKS LIMIT 10";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public function getBooksByTitle(string $name){
        $sql = "SELECT * FROM BOOKS WHERE title LIKE :name";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([":name" => "%$name%" ]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    public function createUser(User $user ): bool{
        $sql = "INSERT INTO USERS (USERNAME, PASSWD, FIRST_NAME, SECOND_NAME, EMAIL, ADDRESS) VALUES (:name, :password, :firstname, :lastname, :email, :address)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
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
            $newUser = new User($rows[0]["USERNAME"], $rows[0]["PASSWD"],$rows[0]["FIRST_NAME"],$rows[0]["SECOND_NAME"],$rows[0]["EMAIL"],$rows[0]["ADDRESS"],);
        }
        return $newUser;
    }

    public function validBook(Book $book ): bool|Book{
        $sql = "SELECT * FROM BOOKS WHERE TITLE = :title AND AUTHOR = :author";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            ":title" => $book->getTitle(),
            ":author"=>$book->getAuthor(),
        ]);
        $rows = $stmt->fetchAll();
        if (empty($rows)) {
            return false;
        } else {
            $newBook = new Book($rows[0]["ID"], $rows[0]["TITLE"],$rows[0]["AUTHOR"],$rows[0]["PVP"],$rows[0]["PVP_IVA"]);
            return $newBook;
        }
    }
}