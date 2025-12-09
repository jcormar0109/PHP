<?php

namespace App\Model;


const HOSTNAME = "db";
const DBNAME = "my_application_db";
const USERNAME = "app_user";
const PASSWORD = "app_password";

use ArrayIterator;
use PDO;
use PDOException;
use IteratorAggregate;
use Traversable;

class Db implements IteratorAggregate
{
    private static ?Db $instance = null;
    private static ?PDO $pdo = null;

    private function __construct(){
        self::connect();
    }
    private static function connect(){
        $dsn = "mysql:host=" . HOSTNAME . ";dbname=" . DBNAME . ";charset=utf8mb4";
        try {
            self::$pdo = new PDO(
                $dsn,
                USERNAME,
                PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function getInstance(): Db{
        if(self::$instance == null){
            self::$instance = new Db();
        }
        return self::$instance;
    }

    private function __clone(){

    }

    public function validUser(User $user): bool|User{
        try{
            $sql = "SELECT * FROM USERS WHERE USERNAME = :username AND PASSWD = :passwd";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute([
                ":username" => $user->getUsername(),
                ":passwd" => $user->getPasswd()
            ]);
            $result = $stmt->fetch();
            if (empty($result)) {
                return false;
            }
            else return new User($result["ID"], $result["USERNAME"],$result["PASSWD"]);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public function getIterator(): Traversable
    {
        try {
            $sql = "SELECT * FROM BOOKS";
            $stmt = self::$pdo->prepare($sql);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            $books = array();
            foreach ($rows as $row) {
                $book = new Book($row["ID"], $row["TITLE"], $row["AUTHOR"], $row["PVP"]);
                $books[] = $book;
            }
            return new ArrayIterator($books);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

}